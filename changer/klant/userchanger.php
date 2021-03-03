<?php

session_start();

    include("../../login/connection.php");
    include("../../login/functions.php");

    $getid = $_GET['edit'];

$seledittwo = "SELECT * FROM `klant` WHERE $getid";
$qry = mysqli_query($con, $seledittwo);

$sellassoc = mysqli_fetch_assoc($qry);

$id = $sellassoc['idklant'];
$voornaam = $sellassoc['klantvoornaam'];
$tussenvoegsel = $sellassoc['klanttussenvoegsel'];
$achternaam = $sellassoc['klantachternaam'];
$adres = $sellassoc['klantadres'];
$huisnummer = $sellassoc['klanthuisnummer'];
$postcode = $sellassoc['klantpostcode'];
$plaats = $sellassoc['klantplaats'];
$telefoon = $sellassoc['klanttelefoon'];
$email = $sellassoc['klantemail'];

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


    $seleditt = "UPDATE `klant` SET `klantvoornaam`='$upvoornaam' ,`klanttussenvoegsel`='$uptussenvoegsel',`klantachternaam`='$upachternaam',
    `klantadres`='$upadres',`klanthuisnummer`='$uphuisnummer',`klantpostcode`='$uppostcode', 
    `klantplaats`='$upplaats',`klanttelefoon`='$uptelefoon',`klantemail`='$upemail'  WHERE `idklant` = '$upid'";
    $qry = mysqli_query($con, $seleditt);

    if($qry) {
        header("location: ../../klant/settings.php");
    } else {
        echo "<h1>Error</h1>";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="../../css/login.css">
</head>
<body>

	<div id="box">
		
		<form method="POST" action="">
			<div>Gegevens aanpassen</div>
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