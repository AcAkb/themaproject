<?php
	ini_set("display_errors", 1);
	ini_set("display_startup_errors", 1);
	error_reporting(E_ALL);

	include "data/private/database.php";

	if(array_key_exists("button_one", $_POST)) {
		button_one();
	};
	function button_one() {
		echo "This is a button";
	};
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html">
	<meta name="robots" content="noindex, nofollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="data/css/main.css">
	<title>Document</title>
</head>
<body>
	<header>
		<div class="container">
			<form method="post">
				<input type="submit" name="button_one" value="Button" class="button_one">
			</form>
		</div>
	</header>
	<div class="viewport">
		<div class="main"></div>
	</div>
	<footer>
		<h5>&copy; Copyright 2023-2024</h5>
	</footer>
</body>
<script type="text/javascript" src="data/js/main.js"></script>
</html>