<?php
// Functie: Algemene functies tbv hergebruik
// Auteur: 

// Main

// 
function ConnectDb(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fietsenmaker"; // <--- DatabaseName
    
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
    $result = GetData("TableName"); // <--- TableName
    PrintTable($result);
}

function PrintTable($result) {
    echo "<table border=1px>";
        foreach($result[0] as $COULUMN_NAME => $cell){
            echo "<th>". $COULUMN_NAME . "</th>";
        }
        echo "<tr>";
            foreach($result as &$row) {
                echo "<tr>";
                    foreach($row as &$cell){
                        echo "<td>" . $cell . "</td>";
                    }
                echo "</tr>";
                }
        echo "</tr>";
    echo "</table>";
}
function OvzTableFietsen(){
    $result = GetData("fietsen"); // <--- TableName
    PrintTableFietsen($result);
}

function PrintTableFietsen($result){
    foreach($result as &$data) {
        echo "<a href='opdracht_9.2.php?id=" . $data['id'] . "'>";
        foreach($data as &$cell){
            echo $cell . " ";
        }        
        echo "</a>";
        echo "<br>";       
    }
}

// DetailsPage
function GetDataDetails($table) {
    // Connect database
    $conn = ConnectDb();
    #var_dump($conn);
    
    // Select data uit de opgegeven table
    $query = $conn->prepare("SELECT * FROM $table WHERE id = " . $_GET['id']);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function OvzTableDetails(){
    $result = GetDataDetails("fietsen"); // <--- TableName
    PrintTableDetails($result);
}

function PrintTableDetails($result) {
    foreach($result as &$data) {
        echo "Artikelnummer: " . $data['id'] . "<br>";
        echo "Merk: " . $data['merk'] . "<br>";
        echo "Type: " . $data['type'] . "<br>";
        echo "Prijs: &euro; " .
            number_format($data["prijs"], 2, ",", ".") . "<br><br>";
    }
}
?>
