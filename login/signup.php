<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$voornaam = $_POST['voornaam'];
		$tussenvoegsel = $_POST['tussenvoegsel'];
		$achternaam = $_POST['achternaam'];
		$adres = $_POST['adres'];
		$huisnummer = $_POST['huisnummer'];
		$postcode = $_POST['postcode'];
		$plaats = $_POST['plaats'];
		$telefoon = $_POST['telefoon'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$account = $_POST['account'];

		if(!empty($voornaam) && !empty($achternaam) && !is_numeric($voornaam) && !is_numeric($achternaam) 
		   && !empty($adres) && !empty($huisnummer) && !empty($postcode) && !empty($plaats) && !empty($telefoon) && !empty($email) && !empty($password) && $account == "klant")
		{

			//save to database
			$query = "insert into klant (klantvoornaam,klanttussenvoegsel,klantachternaam,klantadres,klanthuisnummer,klantpostcode,klantplaats,klanttelefoon,klantemail,klantpassword) 
			values ('$voornaam','$tussenvoegsel','$achternaam','$adres','$huisnummer','$postcode','$plaats','$telefoon','$email','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}
		if(!empty($voornaam) && !empty($achternaam) && !is_numeric($voornaam) && !is_numeric($achternaam) 
		   && !empty($adres) && !empty($huisnummer) && !empty($postcode) && !empty($plaats) && !empty($telefoon) && !empty($email) && !empty($password) && $account == "medewerker")
		{

			//save to database
			$query = "insert into medewerker (medewerkervoornaam,medewerkertussenvoegsel,medewerkerachternaam,medewerkeradres,medewerkerhuisnummer,medewerkerpostcode,medewerkerplaats,medewerkertelefoon,medewerkeremail,medewerkerpassword) 
			values ('$voornaam','$tussenvoegsel','$achternaam','$adres','$huisnummer','$postcode','$plaats','$telefoon','$email','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
			
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>

	<div id="box">
		
		<form method="post">
			<div>Signup</div>

			<input id="text" type="text" name="voornaam" placeholder="voornaam" required><br><br>
			<input id="text" type="text" name="tussenvoegsel" placeholder="tussenvoegsel"><br><br>
			<input id="text" type="text" name="achternaam" placeholder="achternaam" required><br><br>
			<input id="text" type="text" name="adres" placeholder="adres" required><br><br>
			<input id="text" type="text" name="huisnummer" placeholder="huisnummer" required><br><br>
			<input id="text" type="text" name="postcode" placeholder="postcode" required><br><br>
			<input id="text" type="text" name="plaats" placeholder="plaats" required><br><br>
			<input id="text" type="tel" name="telefoon" placeholder="telefoon" required><br><br>
			<input id="text" type="email" name="email" placeholder="email" required><br><br>
			<input id="text" type="password" name="password" placeholder="password" required><br><br>

			<select name="account">
				<option value="klant" name="klant">Klant</option>
				<option value="medewerker" name="medewerker">Medewerker</option>
			</select><br><br>

			<input class="btn" type="submit" value="Signup"><br><br>

			<a class="btn" href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>