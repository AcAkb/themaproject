<?php
	ini_set("display_errors", 1);
	ini_set("display_startup_errors", 1);
	error_reporting(E_ALL);

	include "../private/database.php";

	if(array_key_exists("button-one", $_POST)) {
		buttonOne();
	};
	function buttonOne() {
		header("location: ../../index.php");
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
	<script src="https://kit.fontawesome.com/9ab1f6c7e9.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/toevoegen.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<title>💼 Thema Project</title>
</head>
<body>
	<header>
		<div class="container">
			<form method="post">
				<input type="submit" name="button-one" value="Terug" class="button-one">
			</form>
			<form action="index.php" method="get">
				<input type="text" placeholder="Zoeken.. (op naam)" name="search" class="searchbar">
				<button type="submit" class="icon-parent"><i class="fa fa-search icon"></i></button>
				<button type="submit" class="icon-parent"><i class="fa fa-xmark icon"></i></button>
			</form>
		</div>
	</header>
	<div class="viewport">
		<div class="main">
			<div class="info">
				<p>Formulier</p>
			</div>
			<div class="container-form">
				<form action="../private/versturen.php" method="post" class="custom-form">
					<input type="text" name="name" placeholder="Voer je naam in...">
					<input type="text" name="mail" placeholder="Voer je mail in...">
					<input type="text" name="phone" maxlength="10" placeholder="Voer je telefoon nummer in...">
					<input type="text" name="information" placeholder="Voer (eventueel) informatie in...">
					<input type="text" name="location" placeholder="Voer de locatie in...">
					<input type="submit" name="send" value="Done">
				</form>
			</div>
		</div>
	</div>
	<footer>
		<h5>&copy; Copyright 2023-2024</h5>
	</footer>
	<script src="../js/main.js"></script>
</body>
</html>