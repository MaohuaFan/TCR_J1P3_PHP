<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht Toevoegen</title>
</head>
<body>
    <h1>PHP Opdracht: Opdracht 9.6 van het boek</h1>
    <!--Auteur: Zelf-->
    <form action="#" method="post">
        <label for="naam">Naam: </label>
            <input type="text" name="naam" placeholder="Naam" required><br><br>
        <label for="bericht">Bericht: </label> <br>
            <textarea name="bericht" id="bericht" placeholder="Enter text here" required></textarea><br>
            <!--<input type="text" name="bericht" placeholder="Bericht" required><br>-->
        <input type="submit" name="opslaan" required>
    </form><br>
    <?php
        include 'functions_9.6.php';
        $conn = ConnectDb();
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
        try {
            $query = $conn->prepare("SELECT * FROM gastenboek");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                echo "[" . $data['id'] . "] ";
                echo $data['naam'] . " - ";
                echo "[" . $data['datumtijd'] . "] ";
                echo "<br>";
                echo $data['bericht'] . " ";
                echo "<br><br>";
            }} catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage() . "<br><br>";
            }
    ?>
    <br><br><br>
    <a href="opdracht_9.6.php">Terug naar berichten</a>
</body>
</html>