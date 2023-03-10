<?php
// Functie: Algemene functies tbv hergebruik
// Auteur: 

// Main

// 
function ConnectDb(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fietsenmaker";
    
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
    $result = GetData("table");
    PrintTable($result);
}
function OvzPoll(){
    $result = GetData("poll");
    PrintTablePoll($result);
}
function OvzOptie(){
    $result = GetData("optie");
    PrintTableOptie($result);
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

function PrintTablePoll($result){
    foreach($result as &$data) {
        echo "<th>". $data['vraag'] . "</th>";
        echo "<th> Stemmen </th>";
    }
}
function PrintTableOptie($result){
    foreach($result as &$data) {
        echo "<tr>";
            echo "<td>". $data['optie'] ."</td>";
            echo "<td>". $data['stemmen'] ."</td>";
        echo "</tr>";
    }
}
function stemmen(){
    $conn = ConnectDb();
    $radio = $_POST['radio'];
    if(isset($_POST['submit'])){
        switch($radio){
            case 1:
                #echo "1: ";
                $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=1";
                break;
            case 2:
                #echo "2: ";
                $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=2";
                break;
            case 3:
                #echo "3: ";
                $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=3";
                break;
            case 4:
                #echo "4: ";
                $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=4";
                break;
        }
        $conn->exec($sql);
    }
}
?>
