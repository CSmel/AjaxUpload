<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Creative Sakas: Resume</title>
    <meta content="Melanie Sakas" name="author">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/gitProject.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <style>
      .wrapper {
        display: grid;
        grid-template-rows: .5fr.5fr .5fr .5fr;
        min-height: 100%;
        grid-gap: 10px;
        grid-column-gap: 0;
        grid-template-areas: "nav nav" "comment comment" "section section" "footer footer";
      }</style>
</head>
<body>
  <script src="bower_components/jquery/dist/jquery.js"></script>
  <script src="includes/jquery.js"></script>
  <div class="wrapper">
<?php include 'includes/nav.php' ?>

<?php include 'includes/connection.php' ?>

        <?php
$username = $_POST['loginName'];
$password = $_POST['loginPW'];

//Create connection and select DB
try {
    $connection = new PDO('mysql:host=localhost;dbname=creativedb', $dbUsername, $dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Check connection
    $verify = $connection->prepare("SELECT userAdmin From user WHERE userAdmin =?");

    $verify->bindValue(':loginName', $username, PDO::PARAM_STR);
    $verify->execute(array($_POST['loginName']));

    if ($verify->fetchColumn() == $_POST['loginName']) {
include 'includes/uploadForm.php';
    } else {
        echo 'OOPS- Wrong username, try again.';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$connection=null;
?>
<section class="section">
<div id="load"></div></section>
<footer class="footer">
;-/
</footer>
</div> <!-- close wrapper -->

</body>
</html>
