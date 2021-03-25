<?php

include("../login/connection.php");

$getid = $_GET['edit'];

$seledittwo = "SELECT * FROM `artikel` WHERE $getid";
$qry = mysqli_query($con, $seledittwo);

$sellassoc = mysqli_fetch_assoc($qry);

$id = $sellassoc['idartikel'];
$naam = $sellassoc['naam'];
$omschrijving = $sellassoc['omschrijving'];
$prijs = $sellassoc['prijs'];
$img = $sellassoc['img'];


if(isset($_POST['updateedit'])) {

    $upid = $_POST['upid'];
    $upnaam = $_POST['upnaam'];
    $upomschrijving = $_POST['upomschrijving'];
    $upprijs = $_POST['upprijs'];
    $upimg = $sellassoc['upimg'];



    $seleditt = "UPDATE `artikel` SET `naam`='$upnaam',`omschrijving`='$upomschrijving',`prijs`='$upprijs' WHERE `idartikel` = '$upid'";
    $qry = mysqli_query($con, $seleditt);

    if($qry) {
        header("location: shop.php");
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="upid" value="<?php echo $id; ?>"><br><br>
        <input type="text" name="upnaam" value="<?php echo $naam; ?>"><br><br>
        <input type="text" name="upomschrijving" value="<?php echo $omschrijving; ?>"><br><br>
        <input type="text" name="upprijs" value="<?php echo $prijs; ?>"><br><br>
        <input type="submit" name="updateedit" value="Update">
    </form>
</body>
</html>