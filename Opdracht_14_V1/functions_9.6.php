<?php
// Functie: Algemene functies tbv hergebruik
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

function BerichtToevoegen($conn){
    try {
        if(isset($_POST["opslaan"]) && isset($_POST["naam"]) && isset($_POST["bericht"])){
            $query = $conn->prepare("INSERT INTO gastenboek(naam, bericht) VALUES('".$_POST['naam']."','".$_POST['bericht']."')");
            $query->execute();
            echo"Bericht Toegevoegd. <br><br><br>";
        } else {
            echo "Er is een fout opgetreden! <br><br>";
        }} catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br><br>";
    }
}
function OvzBerichten($conn){
    try {
        $query = $conn->prepare("SELECT * FROM gastenboek");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as &$data) {
            #echo "[" . $data['id'] . "] ";
            echo $data['naam'] . " - ";
            echo "[" . $data['datumtijd'] . "] ";
            echo "<br>";
            echo $data['bericht'] . " ";
            echo "<a href='verwijderbericht_9.6.php?id=". $data['id']. "'>Verwijderen</a>";
            echo "<br><br>";
        }} catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "<br><br>";
    }
}
/*function VerwijderBericht($conn) {
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo"$id";
        try {
            // SQL to delete a record
            $sql = "DELETE FROM gastenboek WHERE id='$id'";
            $conn->exec($sql);
            echo "Records deleted successfully";
            header('Location: opdracht_9.6.php');
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}*/
?>