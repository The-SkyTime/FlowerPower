<?php

session_start();

    include("../../login/connection.php");
    include("../../login/functions.php");

    $getid = $_GET['edit'];

$seledittwo = "SELECT * FROM `medewerker` WHERE $getid";
$qry = mysqli_query($con, $seledittwo);

$sellassoc = mysqli_fetch_assoc($qry);

$id = $sellassoc['idmedewerker'];

if(isset($_POST['updateedit'])) {

    $upid = $_POST['upid'];
    $uppassword = $_POST['uppassword'];
    $uppassword2 = $_POST['uppassword2'];

    if($uppassword2 == $uppassword) {
        $seleditt = "UPDATE `medewerker` SET `medewerkerpassword`='$uppassword' WHERE `idmedewerker` = '$upid'";
        $qry = mysqli_query($con, $seleditt);

        if($qry) {
            header("location: ../../medewerker/settings.php");
        } else {
            echo "<h1>Error</h1>";
        }
    } else {
        echo "<h1>Password is not the same!</h1>";
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
			<div>Wachtwoord aanpassen</div>
            <input id='text' type="text" name="upid" value="<?php echo $id; ?>" hidden>
            <input id='text' type="text" name="uppassword" value="<?php echo "New Password"; ?>"><br><br>
            <input id='text' type="text" name="uppassword2" value="<?php echo "Repeat Password"; ?>"><br><br>
			<input class="btn" name="updateedit" type="submit" value="Aanpassen"><br><br>
		</form>
	</div>
</body>
</html>