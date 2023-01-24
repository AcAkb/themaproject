<?php
	ini_set("display_errors", 1);
	ini_set("display_startup_errors", 1);
	error_reporting(E_ALL);

	include "data/private/database.php";

	if(array_key_exists("button_one", $_POST)) {
		button_one();
	};
	function button_one() {
		echo "FACK YOU MEOW";
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="data/css/main.css">
	<title>Document</title>
</head>
<body>
	<header>
		<div class="container">
			<form method="post">
				<input type="submit" name="button_one" value="Add Item" class="button_one">
			</form>
			<form action="index.php" method="post">
				<input type="text" placeholder="Zoeken.." name="search" class="searchbar">
				<button type="submit" class="icon_parent"><i class="fa fa-search icon"></i></button>
			</form>
			<form method="post">
				<input type="submit" name="button_two" value="Contact" class="button_two">
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