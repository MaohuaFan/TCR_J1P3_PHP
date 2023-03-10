<?php
function ConnectDb(){
    
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
}

function GetData($table) {
    // Connect database
    $conn = ConnectDb();
    
    // Select data uit de opgegeven table
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>