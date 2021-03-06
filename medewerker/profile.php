<?php

session_start();

    include("../login/connection.php");
    include("../login/functions.php");

    check_login($con);
    $user_data = check_login_medewerker($con);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $user_data['medewerkervoornaam']; ?>'s Profile </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />  
        
        <!-- Update these with your own fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,900|Source+Sans+Pro:300,900&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="../css/profile.css">

    </head>
    <body>
        <header>
            <nav class="nav">
                <ul class="nav__list">
                    <li class=""><?php echo "<a href='../index.php?id=" . $user_data['idmedewerker'] ."' class='nav__link'>Home</a>"?></li>
                    <li class=''><a href='../shop/shop.php' class='nav__link'>Shop</a></li>
                    <li class=""><a href="" class="nav__link active">Profile</a></li>
                    <li class=""><a href="members.php" class="nav__link">Members</a></li>
                    <li class=""><a href="settings.php" class="nav__link">Settings</a></li>
                    <li class=""><a href="../login/logout.php" class="nav__link">Logout</a></li>
                </ul>
            </nav>
        </header>
        
        

            <!-- Plaatst een foto van bloemen -->
            <section class="my-intro" id="intro">
                <div class="services">
                </div>
            </section>
            
            <div style="margin-left:15%;padding:1px 16px;height:1000px;">
            
            <!-- My services -->
            <section class="my-services" id="services">
                <h1 class="section__title section__title--intro">
                    Hallo <strong><?php echo $user_data['medewerkervoornaam'],' ', $user_data['medewerkerachternaam']; ?></strong>
                </h1>
            </section>
        </div>

    </body>
</html>