<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bericht Toevoegen</title>
</head>
<body>
    <form action="#" method="post">
        Naam: <input type="text" name="naam" placeholder="Naam" required><br>
        Bericht: <input type="text" name="bericht" placeholder="Bericht" required><br>
        <input type="submit" name="opslaan" required>
    </form><br><br>
    <?php
        include 'functions_9.6.php';
        $conn = ConnectDb();
        // BerichtenToevoegen();
        try {
            if(isset($_POST["opslaan"]) && isset($_POST["naam"]) && isset($_POST["bericht"])){
                $query = $conn->prepare("INSERT INTO gastenboek(naam, bericht) VALUES('".$_POST['naam']."','".$_POST['bericht']."')");
                $query->execute();
                echo"Bericht Toegevoegd. <br><br>";
            } else {
                echo "Er is een fout opgetreden! <br><br>";
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // OvzBerichten();
        try {
            $query = $conn->prepare("SELECT * FROM gastenboek");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                echo $data['naam'] . " - ";
                echo $data['bericht'] . " ";
                echo "[" . $data['datumtijd'] . "] <br>";
            }
            }   catch(PDOException $e) {
                die("Error!: " . $e->getMessage());
            }

    ?>
    <br><br><br>
    <a href="opdracht_9.6.php">Terug naar berichten</a>
</body>
</html>