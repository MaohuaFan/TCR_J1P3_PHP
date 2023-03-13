<?php
// Functie: Algemene functies tbv hergebruik
// Auteur: 

// Main

// 
function ConnectDb(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully 1<br>";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    echo "Connected successfully 2<br>";
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


function OvzBieren(){
    $result = GetData("bier");
    PrintTable($result);

}

function OvzBrouwers(){
    $result = GetData('brouwer');  
    PrintTable($result);
}

function PrintTable($result) {
    echo "<table border=1px>";
        foreach($result[0] as $COULUMN_NAME => $cell){
            echo "<th>". $COULUMN_NAME . "</th>";
        }
        CRUD_Header();
        echo "<tr>";
            foreach($result as &$row) {
                echo "<tr>";
                    foreach($row as &$cell){
                        echo "<td>" . $cell . "</td>";
                    }
                    CRUD_Table();
                echo "</tr>";
                }
        echo "</tr>";
    echo "</table>";
}

function CRUD_Header(){
    echo "<th> Wijzigen </th>";
    echo "<th> Verwijderen </th>";
}
function CRUD_Table(){
    echo "<td> <a href=''>Wijzigen</a> </td>";
    echo "<td> <a href=''>Verwijderen</a> </td>";
}

function CRUD_Bier_Toevoegen(){
    $conn = ConnectDb();
    $biercode = 1620;
    $naam = $_POST['naam'];
    $soort = $_POST['soort'];
    $stijl = $_POST['stijl'];
    $alcohol = $_POST['alcohol'];
    $brouwcode = 1354;
    if(isset($_POST['submit'])){
        #$query = $conn->prepare("INSERT INTO bier(bierocde, naam, soort, stijl, alcohol, brouwcode) VALUES($biercode,$naam,$soort,$stijl,$alcohol, $brouwcode)");
        #$query->execute();
        echo"Bier is Toegevoegd. <br><br><br>";
        echo "Hello World!";
    } else {
        echo "<br>";
        echo "Er is een fout opgetreden! <br>";
        echo $biercode ."<br>", $naam ."<br>", $soort ."<br>", $stijl ."<br>", $alcohol ."<br>", $brouwcode ."<br>";
    }
    $conn = null;
}
?>
