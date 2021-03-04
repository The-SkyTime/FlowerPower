<?php

function check_login($con) {
	function check_login_klant($con)
	{
	
		if(isset($_SESSION['idklant']))
		{
	
			$id = $_SESSION['idklant'];
			$query = "select * from klant where idklant = '$id' limit 1";
	
			$result = mysqli_query($con,$query);
			if($result && mysqli_num_rows($result) > 0)
			{
	
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}
	
		//redirect to login
		header("Location: login.php");
		die;
	
	}
	
	function check_login_medewerker($con) {
		if(isset($_SESSION['idmedewerker']))
		{
	
			$id = $_SESSION['idmedewerker'];
			$query = "select * from medewerker where idmedewerker = '$id' limit 1";
	
			$result = mysqli_query($con,$query);
			if($result && mysqli_num_rows($result) > 0)
			{
	
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}
	
		//redirect to login
		header("Location: login.php");
		die;
	}
}


