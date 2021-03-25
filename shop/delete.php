<?php

    include("../login/connection.php");

    $getid = $_GET['deleteid'];

    $sel = "DELETE FROM `artikel` WHERE `idartikel` = '$getid'";
    $qry = mysqli_query($con, $sel);

    if($qry) {
        header("location: shop.php");
    }