<?php

session_start();

    include("login/connection.php");
    include("login/functions.php");

    check_login($con);
    

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flower Power</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />  
        
        <!-- Update these with your own fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,900|Source+Sans+Pro:300,900&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <header>
        <?php
                // Ingelogd als medewerker
            if(isset($_SESSION['idmedewerker']))
            {
                    echo 
                    "<nav class='nav'>
                        <ul class='nav__list'>
                            <li class=''><a href='' class='nav__link active'>Home</a></li>
                            <li class=''><a href='shop/shop.php' class='nav__link'>Shop</a></li>
                            <li class=''><a href='medewerker/profile.php' class='nav__link'>Profile</a></li>
                            <li class=''><a href='medewerker/members.php' class='nav__link'>Members</a></li>
                            <li class=''><a href='medewerker/settings.php' class='nav__link'>Settings</a></li>
                            <li class=''><a href='../login/logout.php' class='nav__link'>Logout</a></li>
                        </ul>
                    </nav>";
                } 
                    // Ingelogd als klant
                else if(isset($_SESSION['idklant']))
		        {
                    echo 
                    "<nav class='nav'>
                        <ul class='nav__list'>
                            <li class=''><a href='' class='nav__link active'>Home</a></li>
                            <li class=''><a href='shop/shop.php' class='nav__link'>Shop</a></li>
                            <li class=''><a href='klant/profile.php' class='nav__link'>Profile</a></li>
                            <li class=''><a href='klant/settings.php' class='nav__link'>Settings</a></li>
                            <li class=''><a href='../login/logout.php' class='nav__link'>Logout</a></li>
                        </ul>
                    </nav>";
                }
                 // Niet ingelogd
                else {
                    echo 
                    "<nav class='nav'>
                        <ul class='nav__list'>
                            <li class=''><a href='' class='nav__link active'>Home</a></li>
                            <li class=''><a href='shop/shop.php' class='nav__link'>Shop</a></li>
                            <li class=''><a href='login/login.php' class='nav__link'>Login</a></li>
                        </ul>
                    </nav>";
                }
                
        ?>
        </header>
        
        <!-- Introduction -->
        <section class="intro" id="home">
            <h1 class="section__title section__title--intro">
                Welkom bij <strong>Flower Power</strong>
            </h1>
            <p class="section__subtitle section__subtitle--intro">Bloemen winkel</p>
            <img src="img/bloemen3.jpg" alt="Een mooie foto van bloemen" class="intro__img">
        </section>
        
        
        <!-- My services -->
        <section class="my-services" id="services">
            <h2 class="section__title section__title--services">Service</h2>
            <div class="services">
                <div class="service">
                    <h3>Ophalen</h3>
                    <p>U kunt bij ons de bloemen komen ophalen bij ons in de winkel: Begoniaweg 8 Almere</p>
                </div> <!-- / service -->
                
                <div class="service">
                    <h3>Bezorgen</h3>
                    <p>Wij bezorgen de bloemen voor uw deur thuis zodat u de deur er niet uit voor hoeft te gaan.</p>
                </div> <!-- / service -->
                
                <!-- <div class="service">
                    <h3>Comming Soon</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div> / service -->
            </div> <!-- / services -->
        </section>
        
        
        <!-- About me -->
        <section class="about-me" id="about">
           <h2 class="section__title section__title--about">Wie zijn wij</h2>
           <p class="section__subtitle section__subtitle--about">Comming Soon</p>
           
           <div class="about-me__body">
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
           </div>
           
           <img src="img/bloemen2.jpg" alt="Een mooie foto van bloemen" class="about-me__img">
        </section>        
        
        <!-- Footer -->
        <footer class="footer">
            <!-- replace with your own email address -->
            <a href="mailto:flower.power@hotmail.com" class="footer__link">flower.power@hotmail.com</a>
        </footer>

    </body>
</html>