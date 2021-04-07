<?php

session_start();

    include("../login/connection.php");
    include("../login/functions.php");

    check_login($con);
    
    if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
	}
    
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>window.location="shop.php"</script>';
			}
		}
	}
}

    
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
        
        <link rel="stylesheet" href="../css/shop.css">

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  -->
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
                            <li class=''><a href='#' class='nav__link active'>Shop</a></li>
                            <li class=''><a href='template.php' class='nav__link'>Artikel Toevoegen</a></li>
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
                            <li class=''><a href='' class='nav__link'>Shop</a></li>
                            <li class=''><a href='../klant/profile.php' class='nav__link'>Profile</a></li>
                            <li class=''><a href='../klant/settings.php' class='nav__link'>Settings</a></li>
                            <li class=''><a href='../login/logout.php' class='nav__link'>Logout</a></li>
                        </ul>
                    </nav>";
                } else {
                    echo 
                    "<nav class='nav'>
                        <ul class='nav__list'>
                            <li class=''><a href='../index.php' class='nav__link '>Home</a></li>
                            <li class=''><a href='' class='nav__link active'>Shop</a></li>
                            <li class=''><a href='../login/login.php' class='nav__link'>Login</a></li>
                        </ul>
                    </nav>";
                }
                
        ?>
        </header>

        <div class="container">
        <input id="showBloemen" type="checkbox"> Show Bloemen
        <br>
        <input id="showBoeketen" type="checkbox"> Show Boeketen<br>
        <?php
				$query = "SELECT * FROM artikel WHERE soort = '0'";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
                        $id = $row['idartikel'];
                        $naam = $row['naam'];
                        $omschrijving = $row['omschrijving'];
                        $prijs = $row['prijs'];
                        $img = $row['img'];

                        echo "<div class='bloem' style='visibility: hidden; display: none;'>
                        <div class='col-md-4'>";

                        if(isset($_SESSION['idmedewerker']))
                            { echo "
                                
                                    <div style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;' align='center' class='edit'>
                                    <img src='../" . $img . "' class='img-responsive' /><br />

                                    <h4 class='text-info'>" . $naam ."</h4>

                                    <h4 class='text-danger'>€ " . $prijs ."</h4>

                                    <input type='text' name='quantity' value='1' class='form-control' />

                                    <input type='hidden' name='hidden_name' value='" . $naam ."' />

                                    <input type='hidden' name='hidden_price' value='" . $prijs ."' />

                                    <a class='btn btn-success' href='artikel.php?editart=" . $id . "'>Edit</a>
                                    <a class='btn btn-success' href='delete.php?deleteid=" . $id . "'>Delete</a>";

                                } else 
                                { echo "<form method='post' action='shop.php?action=add&id=" . $id ."'>
                                    <div style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;' align='center'>
                                    <img src='../" . $img . "' class='img-responsive' /><br />

                                    <h4 class='text-info' >" . $naam ."</h4>

                                    <h4 class='text-danger'>€ " . $prijs ."</h4>

                                    <input type='text' name='quantity' value='1' class='form-control' />

                                    <input type='hidden' name='hidden_name' value='" . $naam ."' />

                                    <input type='hidden' name='hidden_price' value='" . $prijs ."' />

                                    <input type='submit' name='add_to_cart' style='margin-top:5px;' class='btn btn-success' value='Voeg toe' />";
                                }
                                echo "</div>
                                </div>
                            </form>
                        </div>";
                    }
                }

                $query = "SELECT * FROM artikel WHERE soort = '1'";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
                        $id = $row['idartikel'];
                        $naam = $row['naam'];
                        $omschrijving = $row['omschrijving'];
                        $prijs = $row['prijs'];
                        $img = $row['img'];

                        echo "<div class='boeket' style='visibility: hidden; display: none;'>
                        <div class='col-md-4'>";

                        if(isset($_SESSION['idmedewerker']))
                            { echo "
                                
                                    <div style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;' align='center' class='edit'>
                                    <img src='../" . $img . "' class='img-responsive' /><br />

                                    <h4 class='text-info'>" . $naam ."</h4>

                                    <h4 class='text-danger'>€ " . $prijs ."</h4>

                                    <input type='text' name='quantity' value='1' class='form-control' />

                                    <input type='hidden' name='hidden_name' value='" . $naam ."' />

                                    <input type='hidden' name='hidden_price' value='" . $prijs ."' />

                                    <a class='btn btn-success' href='artikel.php?editart=" . $id . "'>Edit</a>
                                    <a class='btn btn-success' href='delete.php?deleteid=" . $id . "'>Delete</a>";

                                } else 
                                { echo "<form method='post' action='shop.php?action=add&id=" . $id ."'>
                                    <div style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;' align='center'>
                                    <img src='../" . $img . "' class='img-responsive' /><br />

                                    <h4 class='text-info' >" . $naam ."</h4>

                                    <h4 class='text-danger'>€ " . $prijs ."</h4>

                                    <input type='text' name='quantity' value='1' class='form-control' />

                                    <input type='hidden' name='hidden_name' value='" . $naam ."' />

                                    <input type='hidden' name='hidden_price' value='" . $prijs ."' />

                                    <input type='submit' name='add_to_cart' style='margin-top:5px;' class='btn btn-success' value='Voeg toe' />";
                                }
                                echo "</div>
                                </div>
                            </form>
                        </div>";
                    }
                }
                ?>
                <div style="clear:both"></div>
                <br />
                <h3>Bestelling Details</h3>
                <form action="" method="post">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="40%">Artikelen</th>
                                <th width="10%">Hoeveelheid</th>
                                <th width="20%">Prijs</th>
                                <th width="15%">Totaal</th>
                                <th width="5%">Verwijderen</th>
                            </tr>
                            <?php
                            if(!empty($_SESSION["shopping_cart"]))
                            {
                                $total = 0;
                                foreach($_SESSION["shopping_cart"] as $keys => $values)
                                {
                            ?>
                            <tr>
                                <td name='naam'><?php echo $values["item_name"]; ?></td>
                                <td><?php echo $values["item_quantity"]; ?></td>
                                <td>€ <?php echo $values["item_price"]; ?></td>
                                <td>€ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                <td><a href="shop.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Verwijderen</span></a></td>
                            </tr>
                            <?php
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Totaal</td>
                                <td align="right">€ <?php echo number_format($total, 2); ?></td>
                                <td>
                                <input type="submit" name="factuur" value="Factuur">
                                <!-- <button type="submit"><span class="text-danger">Factuur</span></button> -->
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                                
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <script src="../js/artikel.js"></script>
</body>
</html>