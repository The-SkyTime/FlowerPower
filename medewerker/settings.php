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
                    <li class=""><a href="../index.php" class="nav__link">Home</a></li>
                    <li class=""><a href="profile.php" class="nav__link">Profile</a></li>
                    <li class=""><a href="" class="nav__link">Comming Soon</a></li>
                    <li class=""><a href="" class="nav__link">Comming Soon</a></li>
                    <li class=""><a href="" class="nav__link active">Settings</a></li>
                    <!-- <li class="nav__item"><a href="php/login.php" class="nav__link">Login</a></li> -->
                    <li class=""><a href="../login/logout.php" class="nav__link">Logout</a></li>
                </ul>
            </nav>
        </header>
        
        <div style="margin-left:15%;padding:1px 16px;height:1000px;">

            <!-- Introduction -->
            <section class="intro" id="home">
                <h1 class="section__title section__title--intro">
                    Hi <strong><?php echo $user_data['medewerkervoornaam']; ?></strong>
                </h1>
                <p class="section__subtitle section__subtitle--intro">Your Profile Page</p>
                <img src="../img/stock-profile.jpg" alt="Your profile picture" class="intro__img">
            </section>

            <!-- Change Username --> <!-- Change Password -->
            <?php

                $sel = "SELECT * FROM `medewerker`";
                $qrydisplay = mysqli_query($con, $sel);

                while($row = mysqli_fetch_array($qrydisplay)) {
                    $id = $row['idmedewerker'];
                    $voornaam = $row['medewerkervoornaam'];
                    $tussenvoegsel = $row['medewerkertussenvoegsel'];
                    $achternaam = $row['medewerkerachternaam'];
                    $adres = $row['medewerkeradres'];
                    $huisnummer = $row['medewerkerhuisnummer'];
                    $postcode = $row['medewerkerpostcode'];
                    $plaats = $row['medewerkerplaats'];
                    $telefoon = $row['medewerkertelefoon'];
                    $email = $row['medewerkeremail'];
                    $password = $row['medewerkerpassword'];

                    echo "<section class='data-edit' id='edit'>
                            <form method='post' action='../changer/medewerker/userchanger.php?edit=" . $id . "'>
                                <h2 class='section__title section__title--changer'>Uw gegevens </h2><br>
                                <div class='edit'>
                                    <p><input id='text' type='text' value=" . $voornaam . " name='voornaam'></p>";
                                        if ($tussenvoegsel != "") {
                                            echo "<p><input id='text' type='text' value=" . $tussenvoegsel . " name='tussenvoegsel'></p>";
                                        }else {
                                            echo "<p><input id='text' type='text' value=&nbsp name='tussenvoegsel'></p>";
                                        }                             
                                    echo "<p><input id='text' type='text' value=" . $achternaam . " name='achternaam'></p>
                                    <p><input id='text' type='text' value=" . $adres . " name='adres'></p>
                                    <p><input id='text' type='text' value=" . $huisnummer . " name='huisnummer'></p>
                                    <p><input id='text' type='text' value=" . $postcode . " name='postcode'></p>
                                    <p><input id='text' type='text' value=" . $plaats . " name='plaats'></p>
                                    <p><input id='text' type='text' value=" . $telefoon . " name='telefoon'></p>
                                    <p><input id='text' type='text' value=" . $email . " name='email'></p>
                                    <input type='submit' value='Aanpassen' class='btn' name='updateuser'>
                                </div>
                            </form>
                        </section>";

                        echo "<section class='data-edit' id='edit'>
                                <form method='post' action='../changer/medewerker/passchanger.php?edit=" . $id . "'>
                                    <h2 class='section__title section__title--changer'>Uw wachtwoord</h2><br>
                                    <div class='edit'>
                                        <p><input id='password' type='password' value=" . $password . " name='password'><br></p>
                                        <p><input type='checkbox' id='showPassword'>
                                        <label for='showPassword'>Show Password</label></p>
                                        <input type='submit' value='Aanpassen' class='btn' name='updatepass'>
                                    </div>
                                </form>
                            </section>";
                }

            ?>
        </div>
        <script src="../js/password.js"></script>
    </body>
</html>