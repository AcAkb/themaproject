<?php
if(array_key_exists("button_one", $_POST)) {
    button_one();
};
function button_one() {
    header("location: index.php");
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
	<link rel="stylesheet" type="text/css" href="data/css/main1.css">
	<link rel="stylesheet" type="text/css" href="data/css/responsive.css">
	<title>💼 Thema Project</title>
</head>
<body>
	<header>
		<div class="container">
			<form method="post">
				<input type="submit" name="button_one" value="Overzicht" class="button_one">
			</form>

				
			</form>
		</div>
	</header>
	<div class="viewport">
		<div class="main">
			<div class="info">
                
			</div>
            <div class="wrapper">
        <form name="contactForm" action="versturen.php" method="post">
          <label>Naam:</label>
          <input type="text" name="name" placeholder="Uw voornaam..." id="firstName" >
          <span id="firstNameError"></span>
          <br><br>

          <label for="achternaam">E-mail:</label>
          <input type="text" name="mail" placeholder="Your last name.." id="lastName">
          <span id="lastNameError"></span>
          <br><br>

          <label for="achternaam">Telefoon:</label>
          <input type="text" name="phone" placeholder="Your last name.." id="lastName">
          <span id="lastNameError"></span>
          <br><br>

          <label for="achternaam">Informatie:</label>
          <input type="text" name="information" placeholder="Your last name.." id="lastName">
          <span id="lastNameError"></span>
          <br><br>

          <label for="achternaam">Lokatie:</label>
          <input type="text" name="location " placeholder="Your last name.." id="lastName">
          <span id="lastNameError"></span>
          <br><br>  

          

          
          <input type="submit" name="submit" value="submit">
          <span id="submitError"></span>
        </form>
      </div>
			</div>
		</div>
	</div>
	<footer>
		<h5>&copy; Copyright 2023-2024</h5>
	</footer>
	<script src="data/js/main.js"></script>
</body>
</html>