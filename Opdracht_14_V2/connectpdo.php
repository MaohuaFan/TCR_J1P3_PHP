<?php
/*function ConnectDb(){
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fietsenmaker";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully 1<br>";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    // echo "Connected successfully 2<br>";
    return $conn;
}*/

// SERVER-instellingen voorbeeld PDO connectie //
// https://www.ictacademie.info/connectpdovoorbeeld.php
// login: tcr
// wachtwoord: tcr
// de database heet fietsenmaker (gastenboek) (PHPMyAdmin)

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fietsenmaker";

// Connectie maken met de PDO.
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>