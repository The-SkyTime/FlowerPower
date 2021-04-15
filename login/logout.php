<?php
// Logd je uit
session_start();

if(isset($_SESSION['idklant']))
{
	unset($_SESSION['idklant']);

} else if(isset($_SESSION['idmedewerker']))
{
	unset($_SESSION['idmedewerker']);

}

header("Location: login.php");
die;