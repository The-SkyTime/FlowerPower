<?php

session_start();

    include("../login/connection.php");
    include("../login/functions.php");

    // Checkt of je bent ingelogd
    check_login($con);
    $user_data = check_login_klant($con);

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $user_data['klantvoornaam']; ?>'s Settings </title>
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
                    <li class=""><a href="" class="nav__link active">Settings</a></li>
                    <li class=""><a href="../login/logout.php" class="nav__link">Logout</a></li>
                </ul>
            </nav>
        </header>
        
        <div style="margin-left:15%;padding:1px 16px;height:1000px;">

            <!-- Plaatst een foto van bloemen -->
            <section class="my-intro" id="intro">
                <div class="services">
                </div>
            </section>

            <!-- Change Username --> <!-- Change Password -->
            <?php

                // Pakt je gegevens van de database
                $sel = "SELECT * FROM `klant` where idklant = $user_data[idklant]";
                $qrydisplay = mysqli_query($con, $sel);

                while($row = mysqli_fetch_array($qrydisplay)) {
                    $id = $row['idklant'];
                    $voornaam = $row['klantvoornaam'];
                    $tussenvoegsel = $row['klanttussenvoegsel'];
                    $achternaam = $row['klantachternaam'];
                    $adres = $row['klantadres'];
                    $huisnummer = $row['klanthuisnummer'];
                    $postcode = $row['klantpostcode'];
                    $plaats = $row['klantplaats'];
                    $telefoon = $row['klanttelefoon'];
                    $email = $row['klantemail'];
                    $password = $row['klantpassword'];

                    // Verander je Gegevens
                    echo "<section class='data-edit' id='edit'>
                            <form method='post' action='../changer/klant/userchanger.php?edit=" . $id . "'>
                                <h2 class='section__title section__title--changer'>Uw gegevens </h2><br>
                                <div class='edit'>
                                    <p><input id='text' type='text' value=" . $voornaam . " name='voornaam' readonly></p>";
                                        if ($tussenvoegsel != "") {
                                            echo "<p><input id='text' type='text' value=" . $tussenvoegsel . " name='tussenvoegsel' readonly></p>";
                                        }else {
                                            echo "<p><input id='text' type='text' value=&nbsp name='tussenvoegsel' readonly></p>";
                                        }                             
                                    echo "<p><input id='text' type='text' value=" . $achternaam . " name='achternaam' readonly></p>
                                    <p><input id='text' type='text' value=" . $adres . " name='adres' readonly></p>
                                    <p><input id='text' type='text' value=" . $huisnummer . " name='huisnummer' readonly></p>
                                    <p><input id='text' type='text' value=" . $postcode . " name='postcode' readonly></p>
                                    <p><input id='text' type='text' value=" . $plaats . " name='plaats' readonly></p>
                                    <p><input id='text' type='text' value=" . $telefoon . " name='telefoon' readonly></p>
                                    <p><input id='text' type='text' value=" . $email . " name='email' readonly></p>
                                    <input type='submit' value='Aanpassen' class='btn' name='updateuser'>
                                </div>
                            </form>
                        </section>";

                        // Verander je Wachtwoord
                        echo "<section class='data-edit' id='edit'>
                                <form method='post' action='../changer/klant/passchanger.php?edit=" . $id . "'>
                                    <h2 class='section__title section__title--changer'>Uw wachtwoord</h2><br>
                                    <div class='edit'>
                                        <p><input id='password' type='password' value=" . $password . " name='password' readonly><br></p>
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