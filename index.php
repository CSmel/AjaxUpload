<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="css/gitProject.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	      <script src="bower_components/jquery/dist/jquery.js"></script>
	<script src="bower_components/jquery-validation/dist/jquery.validate.js"></script>
	<script src="js/form-validation.js"></script>
	<style>
	.wrapper {
		display: grid;
		grid-template-rows: repeat(3, .5fr);
		min-height: 100%;
		grid-gap: 10px;
		grid-column-gap: 10px;
		grid-template-areas: "nav nav" "login login" "footer footer";
	}</style>
</head>

<body>
	<div class="wrapper">
<?php include 'includes/nav.php' ?>
<?php include 'includes/loginForm.php' ?>
<footer class="footer">
;-/
</footer>
</div><!-- close wrapper -->
</body>
</html>
