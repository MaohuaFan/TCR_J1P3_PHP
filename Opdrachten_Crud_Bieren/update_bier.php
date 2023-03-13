<a href="crud_bieren.php">Terug naar crud_bieren</a>
<?php
// Functie: ---
// Auteur: ---   

// Initialisatie
include 'functions.php';

// Main

// Print ---
echo "<h1>Update Bier</h1>";
echo "Data uit het vorige formulier: <br>";
echo "Biercode: " . $_GET['biercode'];
echo "<br><br>";

#echo "debug information var_dump <br>";
#var_dump($_POST);
echo "<br>";
#var_dump($_GET);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="post">
    <label for="1">Naam: </label><input type="text" name="naam" value="" id="1" placeholder="biernaam" required><br>
    <label for="2">Soort: </label><input type="text" name="soort" value="" id="2" placeholder="stijl" required><br>
    <label for="3">Stijl: </label><input type="text" name="stijl" value="" id="3" placeholder="soort" required><br>
    <label for="4">Alcohol: </label><input type="number" name="alcohol" value="" id="4" placeholder="4" required><br>
    <label for="5">Brouwcode: </label><input type="number" name="brouwcode" value="" id="5" placeholder="999" required><br>
    <input type="submit" name="submit" value="submit" id="submit">
</form>    
</body>
</html>
