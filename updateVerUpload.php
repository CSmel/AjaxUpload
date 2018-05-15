
<?php date_default_timezone_set('Etc/GMT+5'); ?>
<?php include 'includes/connection.php' ?>

<?php
// set parameters
$name=$_POST['name'];
$comment=$_POST['comment'];
$dateVal= date("ymd");
$timeVal= date("H+:i");

//Create connection and select DB
try {
    $connection = new PDO('mysql:host=localhost;dbname=creativedb', $dbUsername, $dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Check connection
if(empty($name)|| empty($comment)){
  echo "-1";
}
else{
        if (empty($_FILES['image']['tmp_name']) === true) {
            //echo 'Please choose a file';
						echo "0";
        } else {
            $check = getimagesize($_FILES["image"]['tmp_name']);
            if ($check !== false) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = (file_get_contents($_FILES["image"]['tmp_name']));
                if ($_FILES["image"]['size'] > 100000) {
                    //echo "File is too big!";
										echo "1";
                } else {
                    // insert data into database(prepared and binded)
                    $insert = $connection->prepare(/** @lang text */
                        'INSERT INTO  commenter (name, comment, dateVal, timeVal, image) VALUES (?, ?, ?, ?, ?)');
                    $insert->bindParam(5, $_FILES["image"]['tmp_name'], PDO::PARAM_LOB);
                    $insert->execute(array($name, $comment, $dateVal, $timeVal,  $imgContent ));
                    if ($insert) {
                        //echo "File uploaded successfully.<br> go back?";
												echo "2";
                    } else {
                        //echo "File upload failed, please try again.";
												echo "3";
                    }
                }
            }
        }
    }
  }
 catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$connection=null;
