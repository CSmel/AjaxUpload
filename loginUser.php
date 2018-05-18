<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Creative Sakas: Resume</title>
    <meta content="Melanie Sakas" name="author">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/gitProject.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <link href="bower_components/jquery-ui/themes/flick/jquery-ui.css" rel="stylesheet">
    <script src="includes/jquery.js"></script>
    <script src="js/modal-dialog.js"></script>

    <style>
        .wrapperComment {
            display: grid;
            padding: 0;
            min-height: 100%;
            grid-gap: 0;
            grid-row-gap: 10px;
            grid-template-areas: "comment comment" "footer footer";
        }

        .wrapperSection {
            display: grid;
            padding: 0;
            min-height: 100%;
            grid-gap: 0;
            grid-row-gap: 10px;
            grid-template-areas: "section section" "footer footer";
        }</style>
</head>
<body>

<div id="wrapper" class="wrapperComment">
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
    $connection = null;
    ?>
    <section class="section">
        <div id="load"></div>
    </section>
    <footer class="footer">
        ;-/
    </footer>
</div> <!-- close wrapper -->

</body>
</html>
