
<?php echo "1";?>
<?php date_default_timezone_set('Etc/GMT+5'); ?>
<?php include 'includes/connection.php' ?>
	<?php include 'includes/nav.php' ?>
<?php
// set parameters
$name=$_POST['name'];
$comment=$_POST['comment'];
$dateVal= date("ymd");
$timeVal= date("H:i");
$imgContent =  file_get_contents($_FILES["image"]['tmp_name']);
//Create connection and select DB
try {
    $connection = new PDO('mysql:host=localhost;dbname=creativedb', $dbUsername, $dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $insert = $connection->prepare("INSERT INTO  commenter (name, comment, dateVal, timeVal, image) VALUES (?, ?, ?, ?, ?)");
                    $insert->bindParam(5, $_FILES["image"]['tmp_name'], PDO::PARAM_LOB);
                    $insert->execute(array($name, $comment, $dateVal, $timeVal,  $imgContent ));
                    if ($insert) {
                        //echo "File uploaded successfully.<br> go back?";
												//echo "1"
                    } else {
                        //echo "File upload failed, please try again.";
                    }

} catch (PDOException $e) {
    //echo "Error: " . $e->getMessage();
}
$connection=null;
