<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$klant = "select * from klant where klantemail = '$email' limit 1";
            $klant_result = mysqli_query($con, $klant);

            $medewerker = "select * from medewerker where medewerkeremail = '$email' limit 1";
			$medewerker_result = mysqli_query($con, $medewerker);

			// Kijkt of je probeert in te loggen als een klant
			if($klant_result)
			{
				if($klant_result && mysqli_num_rows($klant_result) > 0)
				{

					$user_data = mysqli_fetch_assoc($klant_result);
					
					if($user_data['klantpassword'] === $password)
					{

						$_SESSION['idklant'] = $user_data['idklant'];
						header("Location: ../klant/profile.php");
						die;
					}
				}
			}
			// Kijkt of je probeert in te loggen als een medewerker
			if ($medewerker_result) {
                if($medewerker_result && mysqli_num_rows($medewerker_result) > 0)
				{

					$user_data = mysqli_fetch_assoc($medewerker_result);
					
					if($user_data['medewerkerpassword'] === $password)
					{

						$_SESSION['idmedewerker'] = $user_data['idmedewerker'];
						header("Location: ../medewerker/profile.php");
						die;
					}
				}
            }
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>

	<div id="box">
		
		<form method="post">
			<div>Login</div>

			<input id="text" type="email" name="email"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input class="btn" type="submit" value="Login"><br><br>

			<a class="btn" href="signup.php">Click to Signup</a><br><br>
		</form>
		
	</div>
</body>
</html>