<?php
// Functie: ---
// Auteur: ---   

// Initialisatie
#include 'functions.php';
require_once('functions.php');

// Main

// Print ---
echo "<h1>Update Bier</h1>";

echo "Data uit het vorige formulier: <br>";
$row = GetBier($_GET['biercode']);
echo "<br>";
#var_dump($row);
#echo "Biercode: " . $_GET['biercode'] . "<br>";
#echo "Debug information var_dump <br>";
#var_dump($_POST);
echo "<br>";
#var_dump($_GET);
#echo "<br>";
#echo "Create Read Update Delete";
// <!php echo $row['naam']!>" -> <!= $row['naam']!> ////  !-teken staat voor de ? /// ! => ? 

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
    <!--<label for="0">Biercode: </label>--><input type="number" name="biercode" value="<?php echo $_GET['biercode']?>" id="0" hidden required><br>
    <label for="1">Biernaam: </label><input type="text" name="biernaam" value="<?=$row['naam']?>" id="1" required><br>
    <label for="2">Soort: </label><input type="text" name="soort" value="<?=$row['soort']?>" id="2" required><br>
    <label for="3">Stijl: </label><input type="text" name="stijl" value="<?=$row['stijl']?>" id="3" required><br>
    <label for="4">Alcohol %: </label><input type="number" name="alcohol" value="<?=$row['alcohol']?>" id="4" required><br>
    <!--<label for="5">Brouwcode: </label>--><input type="number" name="brouwcode" value="<?=$row['brouwcode']?>" id="5" hidden required><br>
    <input type="submit" name="submit" value="Wijzigen" id="submit">
</form>    
    <a href="crud_bieren.php">Terug naar crud bieren</a>
</body>
</html>
