<?php
	ini_set("display_errors", 1);
	ini_set("display_startup_errors", 1);
	error_reporting(E_ALL);

	include "data/private/database.php";

	if(array_key_exists("button-one", $_POST)) {
		buttonOne();
	};
	function buttonOne() {
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
	<script src="https://kit.fontawesome.com/9ab1f6c7e9.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="data/css/main.css">
	<link rel="stylesheet" type="text/css" href="data/css/responsive.css">
	<title>💼 Thema Project</title>
</head>
<body>
	<header>
		<div class="container">
			<form method="post">
				<input type="submit" name="button-one" value="Add Item" class="button-one">
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
				<p>Naam</p>
				<p>Mail</p>
				<p>Telefoon</p>
				<p>Informatie</p>
				<p>Locatie</p>
			</div>
				<?php
					$sql = "SELECT id, name, mail, phone, information, location FROM data";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo "<div class='data standard'>";
								echo "<form action='index.php' method='post'>";
									echo "<input type='submit' name='remove' value='&#xf057' class='remove-button'>";
									echo "<input type='hidden' name='remove-id' value='". $row['id'] ."'>";		
								echo "</form>";
								echo "<div class='item_name'>".$row["name"]."</div>";
								echo "<div class='item_mail'>".$row["mail"]."</div>";
								echo "<div class='item_phone'>".$row["phone"]."</div>";
								echo "<div class='item_information'>".$row["information"]."</div>";
								echo "<div class='item_location'>".$row["location"]."</div>";
							echo "</div>";
						};
					} else {
						echo "Geen resultaat";
					};
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
								print(
									"
										<script>
											alert('Geen resultaat!');
										</script>
									"
								);
							}
						}
						else {
							echo "Minimum lengte is ".$min_length;
						};
					};
					if(isset($_POST["remove"])) {
						$id = $_POST["remove-id"];
						$sql = "DELETE FROM `data` WHERE `ID` = ?";
						$statement = $conn->prepare($sql);
						$statement->bind_param("s", $id);
						$statement->execute();
						print(
							"
								<script>
									alert('Geselecteerde data is verwijderd!');
								</script>
							"
						);
						header("Refresh:0.1");
					};
				?>
			</div>
		</div>
	</div>
	<footer>
		<h5>&copy; Copyright 2023-2024</h5>
	</footer>
	<script src="data/js/main.js"></script>
</body>
</html>