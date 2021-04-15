<?php

include("../login/connection.php");

$getid = $_GET['editart'];

$seledittwo = "SELECT * FROM `artikel` WHERE `idartikel` = '$getid' ";
$qry = mysqli_query($con, $seledittwo);

$sellassoc = mysqli_fetch_assoc($qry);

$id = $sellassoc['idartikel'];
$naam = $sellassoc['naam'];
$omschrijving = $sellassoc['omschrijving'];
$prijs = $sellassoc['prijs'];
$img = $sellassoc['img'];


if(isset($_POST['updateart'])) {

    $upid = $_POST['upid'];
    $upnaam = $_POST['upnaam'];
    $upomschrijving = $_POST['upomschrijving'];
    $upprijs = $_POST['upprijs'];
    $upimg = $sellassoc['upimg'];



    $seleditt = "UPDATE `artikel` SET `naam`='$upnaam',`omschrijving`='$upomschrijving',`prijs`='$upprijs' WHERE `idartikel` = '$upid'";
    $qry = mysqli_query($con, $seleditt);

    if($qry) {
        header("location: shop.php");
    } else {
            echo "<h1>Error</h1>";
        }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Artikel</title>
    <link rel="stylesheet" href="../css/shop.css">
</head>
<body>
    <form method="POST" action="">
        <input id='text' type="text" name="upid" value="<?php echo $id; ?>" hidden>
        <p>
        <label for="artikel">Selecteer de foto die u bij het artikel wilt gebruiken: </label><br>
        <input id="artikel" name="artikel" type="file">
        </p>
        <p>
            <label for="upnaam">Naam van het artikel: </label><br>
            <input id="upnaam" name="upnaam" type="text" value="<?php echo $naam; ?>">
        </p>
        <p>
            <label for="upomschrijving">Omschrijving van het artikel: </label><br>
            <input id="upomschrijving" name="upomschrijving" type="text" value="<?php echo $omschrijving; ?>">
        </p>
        <p>
            <label for="upprijs">Prijs van het artikel: </label><br>
            <input id="upprijs" name="upprijs" type="number" placeholder="0" step=".01" value="<?php echo $prijs; ?>">
        </p>
        <img id="flower" src="../<?php echo $img; ?>" alt="Your image" class='img-responsive'><br>
        <input type="submit" name="updateart" value="Update"class='btn btn-success'>
    </form>
    <br>
    <a class='btn btn-success' href="shop.php">Return to Shop</a>
    <script>
        function readURL(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#flower').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); //convert to base64 string
            }
        }

        $("#artikel").change(function() {
            readURL(this);
        });
    </script>
</body>
</html>