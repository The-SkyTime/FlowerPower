<?php

session_start();

    include("../login/connection.php");
    include("../login/functions.php");

    $user_data = check_login_medewerker($con);

    $getid = $_GET['edit'];

$seledittwo = "SELECT * FROM `medewerker` WHERE $getid";
$qry = mysqli_query($con, $seledittwo);

$sellassoc = mysqli_fetch_assoc($qry);

$id = $sellassoc['idmedewerker'];
$voornaam = $sellassoc['medewerkervoornaam'];
$tussenvoegsel = $sellassoc['medewerkertussenvoegsel'];
$achternaam = $sellassoc['medewerkerachternaam'];
$adres = $sellassoc['medewerkeradres'];
$huisnummer = $sellassoc['medewerkerhuisnummer'];
$postcode = $sellassoc['medewerkerpostcode'];
$plaats = $sellassoc['medewerkerplaats'];
$telefoon = $sellassoc['medewerkertelefoon'];
$email = $sellassoc['medewerkeremail'];

if(isset($_POST['updateedit'])) {

    $upid = $_POST['upid'];
    $upvoornaam = $_POST['upvoornaam'];
    $uptussenvoegsel = $_POST['uptussenvoegsel'];
    $upachternaam = $_POST['upachternaam'];
    $upadres = $_POST['upadres'];
    $uphuisnummer = $_POST['uphuisnummer'];
    $uppostcode = $_POST['uppostcode'];
    $upplaats = $_POST['upplaats'];
    $uptelefoon = $_POST['uptelefoon'];
    $upemail = $_POST['upemail'];


    $seleditt = "UPDATE `medewerker` SET `medewerkervoornaam`='$upvoornaam' ,`medewerkertussenvoegsel`='$uptussenvoegsel',`medewerkerachternaam`='$upachternaam',
    `medewerkeradres`='$upadres',`medewerkerhuisnummer`='$uphuisnummer',`medewerkerpostcode`='$uppostcode', 
    `medewerkerplaats`='$upplaats',`medewerkertelefoon`='$uptelefoon',`medewerkeremail`='$upemail'  WHERE `id` = '$upid'";
    $qry = mysqli_query($con, $seleditt);

    if($qry) {
        header("location: settings.php");
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
		
		<form method="POST" action="">
			<div>Login</div>
            <input id='text' type="text" name="upid" value="<?php echo $id; ?>" hidden>
            <input id='text' type="text" name="upvoornaam" value="<?php echo $voornaam; ?>"><br><br>
            <input id='text' type="text" name="uptussenvoegsel" value="<?php echo $tussenvoegsel; ?>"><br><br>
            <input id='text' type="text" name="upachternaam" value="<?php echo $achternaam; ?>"><br><br>
            <input id='text' type="text" name="upadres" value="<?php echo $adres; ?>"><br><br>
            <input id='text' type="text" name="uphuisnummer" value="<?php echo $huisnummer; ?>"><br><br>
            <input id='text' type="text" name="uppostcode" value="<?php echo $postcode; ?>"><br><br>
            <input id='text' type="text" name="upplaats" value="<?php echo $plaats; ?>"><br><br>
            <input id='text' type="text" name="uptelefoon" value="<?php echo $telefoon; ?>"><br><br>
            <input id='text' type="text" name="upemail" value="<?php echo $email; ?>"><br><br>
			<input class="btn" name="updateedit" type="submit" value="Aanpassen"><br><br>
		</form>
	</div>
</body>
</html>