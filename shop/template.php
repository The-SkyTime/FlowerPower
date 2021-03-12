<?php
session_start();

include("../login/connection.php");
include("../login/functions.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  if (is_uploaded_file($_FILES['artikel']['tmp_name'])) 
  { 

    $naam_artikel = $_POST['naam-artikel'];
    $omschrijving_artikel = $_POST['omschrijving-artikel'];
    $prijs_artikel = $_POST['prijs-artikel'];

      //First, Validate the file name
      if(empty($_FILES['artikel']['name']))
      {
          echo " File name is empty! ";
          exit;
      }

      $upload_file_name = $_FILES['artikel']['name'];
      //Too long file name?
      if(strlen ($upload_file_name)>100)
      {
          echo " too long file name ";
          exit;
      }

      //replace any non-alpha-numeric cracters in th file name
      $upload_file_name = preg_replace("/[^A-Za-z0-9 \.\-_]/", '', $upload_file_name);

      //set a limit to the file upload size
      if ($_FILES['artikel']['size'] > 1000000) 
      {
        echo " too big file ";
          exit;        
    }

    //Check if file is a jpeg or a png
    if (exif_imagetype($_FILES['artikel']['tmp_name'])  != IMAGETYPE_PNG && exif_imagetype($_FILES['artikel']['tmp_name'])  != IMAGETYPE_JPEG) {
        echo " Invalid file format! ";
        exit;
    }

    //Save the file
    $dest=__DIR__.'../../img/'.$upload_file_name;
    if (move_uploaded_file($_FILES['artikel']['tmp_name'], $dest)) 
    {
        echo 'File Has Been Uploaded !';

        $query = "insert into artikel (naam, omschrijving, prijs, img) 
			values ('$naam_artikel','$omschrijving_artikel','$prijs_artikel','$dest')";

			mysqli_query($con, $query);
    }

            
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Template</title>
    <link rel="stylesheet" href="../css/shop.css">
</head>
<body>
<form action="template.php" method="post" enctype="multipart/form-data">
	<p>
	<label for="artikel">Selecteer de foto die u bij het artikel wilt gebruiken: </label><br>
	<input id="artikel" name="artikel" type="file">
	</p>
    <p>
        <label for="naam-artikel">Naam van het artikel: </label><br>
        <input id="naam-artikel" name="naam-artikel" type="text">
    </p>
    <p>
        <label for="omschrijving-artikel">Omschrijving van het artikel: </label><br>
        <input id="omschrijving-artikel" name="omschrijving-artikel" type="text">
    </p>
    <p>
        <label for="prijs-artikel">Prijs van het artikel: </label><br>
        <input id="prijs-artikel" name="prijs-artikel" type="number" placeholder="0" step=".01">
    </p>
    <img id="flower" src="#" alt="Your image"><br>
	<input type="submit" value="Upload Now">
	</form>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#flower').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); //convert to base64 string
            }
        }

        $("#artikel").change(function() {
            readURL(this);
        });
    </script>
</body>
</html>
