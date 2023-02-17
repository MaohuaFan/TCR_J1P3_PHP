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

function BerichtToevoegen(){
    try {
        if(isset($_POST['submit'])) {
            $query = $conn->prepare("INSERT INTO gastenboek(naam, bericht) VALUES('".$_POST['naam']."','".$_POST['bericht']."')");
            $query->execute();
            echo "De nieuwe gegevens zijn toegevoed. 1";
        } else {
            echo "Er is een fout opgetreden! 1";
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function OvzBerichten(){
    try {
        $query = $conn->prepare("SELECT * FROM gastenboek");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as &$data) {
            echo $data['naam'] . "<br>";
            echo $data['bericht'] . "<br>";
            echo $data['datumtijd'] . "<br>";
        }
        }   catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
}
?>
