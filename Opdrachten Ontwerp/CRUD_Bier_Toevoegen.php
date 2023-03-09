<!--W.I./P-->

<link rel="stylesheet" href="test3.css">
<a href="CRUD_Bier.php">Terug naar CRUD bier</a><br><br>

<form action="#" method="post">
    <label for="naam">Naam: </label>
        <input type="text" id="naam" name="naam" placeholder="naam" required><br>
    <label for="soort">Soort: </label>
        <input type="text" id="soort" name="soort" placeholder="soort" required><br>
    <label for="stijl">Stijl: </label>
        <input type="text" id="stijl" name="stijl" placeholder="stijl" required><br>
    <label for="alcohol">Alcohol: </label>
        <input type="number" id="alcohol" name="alcohol" placeholder="1" required><br>
    <input type="submit" id="submit" name="submit" value="submit">
</form>

<?php
// Functie: Programma overzicht bieren
// Auteur: 

// Initiallisatie
include 'functions.php';

// Main

/*
echo'<form action="#" method="post">';
    echo'<label for="naam">Naam: </label>';
        echo'<input type="text" id="naam" name="naam" placeholder="naam"><br>';
    echo'<label for="soort">Soort: </label>';
        echo'<input type="text" id="soort" name="soort" placeholder="soort"><br>';
    echo'<label for="stijl">Stijl: </label>';
        echo'<input type="text" id="stijl" name="stijl" placeholder="stijl"><br>';
    echo'<label for="alcohol">Alcohol: </label>';
        echo'<input type="number" id="alcohol" name="alcohol" placeholder="1"><br>';
    echo'<input type="submit" value="submit">';
echo'</form>';*/

#CRUD_Bier_Toevoegen();
$conn = ConnectDb();
$biercode = 1620;
$naam = $_POST['naam'];
$soort = $_POST['soort'];
$stijl = $_POST['stijl'];
$alcohol = $_POST['alcohol'];
$brouwcode = NULL;
try {
    if(isset($_POST['submit']) && !empty($_POST['submit'])){
        $query = $conn->prepare("INSERT INTO bier(biercode, naam, soort, stijl, alcohol, brouwcode) VALUES($biercode,$naam,$soort,$stijl,$alcohol, $brouwcode)");
        $query->execute();
        echo"Bier is Toegevoegd. <br><br><br>";
    } else {
        echo "<br>";
        echo "Er is een fout opgetreden! <br>";
        echo $biercode ."<br>", $naam ."<br>", $soort ."<br>", $stijl ."<br>", $alcohol ."<br>", $brouwcode ."<br>";
    }} catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br><br>";
    $conn = null;
}
// Print bieren opdracht 9



// Print brouwers opdracht 10
#OvzBrouwers();
?>