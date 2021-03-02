<?php

session_start();

    include("../login/connection.php");
    include("../login/functions.php");

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
                    <li class=""><a href="" class="nav__link active">Profile</a></li>
                    <li class=""><a href="../index.php" class="nav__link">Home</a></li>
                    <li class=""><a href="" class="nav__link">Comming Soon</a></li>
                    <li class=""><a href="" class="nav__link">Comming Soon</a></li>
                    <li class=""><a href="settings.php" class="nav__link">Settings</a></li>
                    <!-- <li class="nav__item"><a href="php/login.php" class="nav__link">Login</a></li> -->
                    <li class=""><a href="../login/logout.php" class="nav__link">Logout</a></li>
                </ul>
            </nav>
        </header>
        
        <div style="margin-left:15%;padding:1px 16px;height:1000px;">

            <!-- Introduction -->
            <section class="intro" id="home">
                <section class="intro--image">
                    <h1 class="section__title section__title--intro">
                        Hi <strong><?php echo $user_data['medewerkervoornaam']; ?></strong>
                    </h1>
                </section>
            </section>
            
            
            <!-- My services -->
            <section class="my-services" id="services">
                <h2 class="section__title section__title--services">Bestellingen</h2>
                <table>
                    <tr>
                        <tr><td>Voornaam</td><td>Tussenvoegsel</td><td>Achternaam</td><td>E-mail</td><td>Factuurnummer</td><td>Datum</td><td>Afgehaald</td><td>Medewerker</td></tr>
                        <?php
                            $sel = "SELECT * FROM klant";
                            $qrydisplay = mysqli_query($con, $sel);
                            while($row = mysqli_fetch_array($qrydisplay)) {
                                $voornaam = $row['klantvoornaam'];
                                $tussenvoegsel = $row['klanttussenvoegsel'];
                                $achternaam = $row['klantachternaam'];
                                $email = $row['klantemail'];
                                
                                echo "<tr><td>" . $voornaam ." </td> <td>" . $tussenvoegsel ." </td> <td>" . $achternaam ." </td> <td>" . $email ." </td> </tr>";
                            }
                        ?>
                    </tr>
                </table>
            </section>
        </div>

    </body>
</html>