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
        BerichtToevoegen($conn);
        OvzBerichten($conn);   
        #VerwijderBericht($conn);     
    ?>
    <br><br><br>
    <a href="opdracht_9.6.php">Terug naar berichten</a>
</body>
</html>