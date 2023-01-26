<?php
	include "database.php";
	header("refresh:0.2; url=../../index.php" );
	if(isset($_POST["send"])) {
		$name = htmlspecialchars($_POST["name"]);
		$mail = htmlspecialchars($_POST["mail"]);
		$phone = htmlspecialchars($_POST["phone"]);
		$information = htmlspecialchars($_POST["information"]);
		$location = htmlspecialchars($_POST["location"]);

		$sql = "INSERT INTO `data` (name, mail, phone, information, location) VALUES ('$name', '$mail', '$phone', '$information', '$location')";
		$result = $conn->query($sql);
		print("
			<script>
				alert('Data is toegevoegd!')
			</script>
		");
	}
?>