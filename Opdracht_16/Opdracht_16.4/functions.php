<?php
// Functie: Algemene functies tbv hergebruik
// Auteur: 

// Main

// 
function ConnectDb(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cijfersysteem";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #echo "Connected successfully 1<br>";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    #echo "Connected successfully 2<br>";
    return $conn;
}

function GetData($table) {
    // Connect database
    $conn = ConnectDb();
    #var_dump($conn);
    
    // Select data uit de opgegeven table
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function OvzTable(){
    $result = GetData("cijfersysteem"); // SQL Table
    PrintTable($result);
}

function PrintTable($result) {
    echo "<table border=1px>";
    echo "<tr>";
    echo "<td>" . "Leerling ID" . "</td>";
    echo "<td>" . "Leerling Naam" . "</td>";
    echo "<td>" . "Leerling Cijfer" . "</td>";
    echo "</tr>";
    foreach ($result as &$data) {
        echo "<tr>";
        echo "<td>" . $data["id"] . "</td>";
        echo "<td>" . $data["leerling"] . "</td>";
        echo "<td>" . $data["cijfer"] . "</td>";
        echo "</tr>";
    }
    echo "<table>";
}
function Ovzcijfersysteem(){
    $conn = ConnectDb();
    AVG($conn);
    Maximun($conn);
    Minimun($conn);
}

function AVG($conn){
    $query = $conn->prepare("SELECT AVG(cijfer) AS cijfer FROM cijfersysteem");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $gem) {
        echo "het gemiddelde cijfer is een " . $gem["cijfer"];
        echo "<br>";
    }
}

function Maximun($conn){
    $query = $conn->prepare("SELECT MAX(cijfer) AS cijfer FROM cijfersysteem");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);    
    foreach ($result as $hoogst) {
        echo "het hoogste cijfer is een " . $hoogst["cijfer"];
        echo "<br>";
    }
}

function Minimun($conn){
    $query = $conn->prepare("SELECT MIN(cijfer) AS cijfer FROM cijfersysteem");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $laagst) {
        echo "het laagste cijfer is een " . $laagst["cijfer"];
    }
}
?>