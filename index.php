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
	if(array_key_exists("button_two", $_POST)) {
		button_one();
	};
	function button_two() {
		echo "FACK YOU MEOW 2";
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
	<link rel="stylesheet" type="text/css" href="data/css/responsive.css">
	<title>Document</title>
</head>
<body>
	<header>
		<div class="container">
			<form method="post">
				<input type="submit" name="button_one" value="Add Item" class="button_one">
			</form>
			<form action="index.php" method="get">
				<input type="text" placeholder="Zoeken.." name="search" class="searchbar">
				<button type="submit" class="icon_parent"><i class="fa fa-search icon"></i></button>
			</form>
			<form method="post">
				<input type="submit" name="button_two" value="" class="button_two">
			</form>
		</div>
	</header>
	<div class="viewport">
		<div class="main">
			<div class="info">
				<p>Naam</p>
				<p>Mail</p>
				<p>Telefoon</p>
				<p>Informatie</p>
				<p>Locatie</p>
			</div>
				<?php
					$sql = "SELECT name, mail, phone, information, location FROM data";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "<div class='data standard'>";
								echo "<div class='item_name'>".$row["name"]."</div>";
								echo "<div class='item_mail'>".$row["mail"]."</div>";
								echo "<div class='item_phone'>".$row["phone"]."</div>";
								echo "<div class='item_information'>".$row["information"]."</div>";
								echo "<div class='item_location'>".$row["location"]."</div>";
							echo "</div>";
						};
					} else {
						echo "Geen resultaat";
					}
						if(!empty($_GET["search"])) {

					$query = $_GET["search"]; 
					$min_length = 3;
					if(strlen($query) >= $min_length) {
						$query = htmlspecialchars($query);
						$query = mysqli_real_escape_string($conn, $query);
						$raw_results = mysqli_query($conn, "SELECT * FROM data WHERE (`name` LIKE '%".$query."%') OR (`name` LIKE '%".$query."%')") or die(mysqli_error());
						if(mysqli_num_rows($raw_results) > 0) {
							while($row = mysqli_fetch_array($raw_results)){
								print(
								"
									<script>
										$('.standard').hide();
									</script>
								"
								);
								echo "<div class='data'>";
									echo "<div class='item_name'>".$row["name"]."</div>";
									echo "<div class='item_mail'>".$row["mail"]."</div>";
									echo "<div class='item_phone'>".$row["phone"]."</div>";
									echo "<div class='item_information'>".$row["information"]."</div>";
									echo "<div class='item_location'>".$row["location"]."</div>";
								echo "</div>";
							}	
						}
						else {
							echo "Geen resultaat";
						}
					}
					else {
						echo "Minimum lengte is ".$min_length;
					};
				};
				?>
			</div>
		</div>
	</div>
	<footer>
		<h5>&copy; Copyright 2023-2024</h5>
	</footer>
</body>
<script type="text/javascript" src="data/js/main.js"></script>
</html>