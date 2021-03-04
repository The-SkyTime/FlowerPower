<?php

session_start();

    include("../login/connection.php");
    include("../login/functions.php");

    check_login($con);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />  
        
        <!-- Update these with your own fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,900|Source+Sans+Pro:300,900&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
        <?php
            if(isset($_SESSION['idmedewerker']))
            {
                    echo 
                    "<nav class='nav'>
                        <ul class='nav__list'>
                            <li class=''><a href='../index.php' class='nav__link'>Home</a></li>
                            <li class=''><a href='' class='nav__link active'>Shop(Comming Soon)</a></li>
                            <li class=''><a href='../medewerker/profile.php' class='nav__link'>Profile</a></li>
                            <li class=''><a href='../medewerker/members.php' class='nav__link'>Members</a></li>
                            <li class=''><a href='../medewerker/settings.php' class='nav__link'>Settings</a></li>
                            <li class=''><a href='../login/logout.php' class='nav__link'>Logout</a></li>
                        </ul>
                    </nav>";
                } else if(isset($_SESSION['idklant']))
		        {
                    echo 
                    "<nav class='nav'>
                        <ul class='nav__list'>
                            <li class=''><a href='../index.php' class='nav__link active'>Home</a></li>
                            <li class=''><a href='' class='nav__link'>Shop(Comming Soon)</a></li>
                            <li class=''><a href='../klant/profile.php' class='nav__link'>Profile</a></li>
                            <li class=''><a href='../klant/settings.php' class='nav__link'>Settings</a></li>
                            <li class=''><a href='../login/logout.php' class='nav__link'>Logout</a></li>
                        </ul>
                    </nav>";
                } else {
                    echo 
                    "<nav class='nav'>
                        <ul class='nav__list'>
                            <li class=''><a href='../index.php' class='nav__link active'>Home</a></li
                            <li class=''><a href='' class='nav__link'>Shop(Comming Soon)</a></li>
                            <li class=''><a href='../login/login.php' class='nav__link'>Login</a></li>
                        </ul>
                    </nav>";
                }
                
        ?>
        </header>
</body>
</html>