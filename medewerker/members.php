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
        <title>Members</title>
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
                    <li class=""><a href="../index.php" class="nav__link">Home</a></li>
                    <li class=''><a href='../shop/shop.php' class='nav__link'>Shop</a></li>
                    <li class=""><a href="profile.php" class="nav__link">Profile</a></li>
                    <li class=""><a href="" class="nav__link active">Members</a></li>
                    <li class=""><a href="settings.php" class="nav__link">Settings</a></li>
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
                <h2 class="section__title section__title--services">Gegevens</h2>
                <table>
                    <tr>
                        <tr><td>Voornaam</td><td>Tussenvoegsel</td><td>Achternaam</td><td>E-mail</td><td>Medewerker</td></tr>
                        <input id="showKlant" type="checkbox">Show Klanten<br><input id="showMedewerker" type="checkbox"> Show Medewerkers
                        <?php
                            $selklant = "SELECT * FROM klant ORDER BY idklant ASC";
                            $result = mysqli_query($con, $selklant);
                            if(mysqli_num_rows($result) > 0)
				            {
                                while($row = mysqli_fetch_array($result))
                                {
                                    $klantvoornaam = $row['klantvoornaam'];
                                    $klanttussenvoegsel = $row['klanttussenvoegsel'];
                                    $klantachternaam = $row['klantachternaam'];
                                    $klantemail = $row['klantemail'];
                                    
                                    echo "<tr id='klant' style='visibility: hidden; display: none;'><td>" . $klantvoornaam ." </td> <td>" . $klanttussenvoegsel ." </td> <td>" . $klantachternaam ." </td> <td>" . $klantemail ." </td> <td> <input type='checkbox'> </tr>";
                                }
                            }
                            $selmedewerker = "SELECT * FROM medewerker ORDER BY idmedewerker ASC";
                            $qrydisplay = mysqli_query($con, $selmedewerker);
                            while($row = mysqli_fetch_array($qrydisplay)) {
                                $medewerkervoornaam = $row['medewerkervoornaam'];
                                $medewerkertussenvoegsel = $row['medewerkertussenvoegsel'];
                                $medewerkerachternaam = $row['medewerkerachternaam'];
                                $medewerkeremail = $row['medewerkeremail'];
                                
                                echo "<tr id='medewerker' style='visibility: hidden; display: none;'><td>" . $medewerkervoornaam ." </td> <td>" . $medewerkertussenvoegsel ." </td> <td>" . $medewerkerachternaam ." </td> <td>" . $medewerkeremail ." </td> <td> <input type='checkbox' checked> </tr>";
                            }
                        ?>
                    </tr>
                </table>
            </section>
        </div>
        <script src="../js/members.js"></script>
    </body>
</html>