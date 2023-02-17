<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Opdracht: Opdracht 9.6 van het boek</title>
</head>
<body>
    <h1>PHP Opdracht: Opdracht 9.6 van het boek</h1>
    <!--Had eerst de code nagetypt doordat ik problemen had met mijn eige code om te achterhalen wat ik verkeerd had en is nu opgelost-->
    <form action="#" method="post" id="form">
        Naam: <input type="text" name="naam" id="naam" placeholder="Naam" required><br><br>
        Bericht: <textarea name="bericht" id="bericht" form="form"></textarea><br><br>
        <input type="submit" name="opslaan" id="submit" required>
    </form>
    <?php
        include('connectpdo.php');

        try {
            // INSERT quary uitvoeren
            $stmt = $conn->prepare("INSERT INTO gastenboek(naam, bericht) VALUES (:naam, :bericht)");
            $stmt->bindParam(':naam', $naam);
            $stmt->bindParam(':bericht', $bericht);
            
            // Insert rij
            if(isset($_REQUEST['naam'])){
                $naam = $_POST['naam'] ; 
                $bericht = $_POST['bericht'];
                $datumtijd = date('d-m-Y');
                $stmt->execute();
                // Terug naar de hoofdpagina
                header('Location: opdracht_9.6.php');
            }} catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage() . "<br><br>";
            }
        $sqlselect = "SELECT * FROM berichten";
        $query = $conn->prepare("SELECT * FROM gastenboek");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as &$row) {
            echo $row['id'] . " ";
            echo $row['datumtijd'] . " ";
            echo $row['naam'] . " ";
            echo $row['bericht'] . " ";
            echo "<a href='verwijderbericht.php?id=". $row['id']. "'>Verwijderen</a>";
            echo "<br>";
        }
    ?>
</body>
</html>