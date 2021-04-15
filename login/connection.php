<?php 
// Maakt een connectie met de database
$user = "root";
$password = "";
$dbname = "flowerpower";
$dbhost = "localhost";

if(!$con = mysqli_connect($dbhost, $user, $password, $dbname)) {
    die("failed to connect to database!");
}