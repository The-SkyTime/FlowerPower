<?php

    include("../login/connection.php");

    $getid = $_GET['deleteid'];

    // Verwijderd de gegevens van de datanse
    $sel = "DELETE FROM `artikel` WHERE `idartikel` = '$getid'";
    $qry = mysqli_query($con, $sel);

    if($qry) {
        header("location: shop.php");
    }