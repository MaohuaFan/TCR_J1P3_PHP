<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_9.3.css">
    <title>Document</title>
</head>
<body>
    <?php
        try {
        $db = new PDO("mysql:host=localhost;dbname=cijfersysteem", "root", "");
        $query = $db->prepare("SELECT * FROM cijfersysteem");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo"<table>";
            echo "<tr>";
                echo "<td>" . "Leerling ID" . "</td>";
                echo "<td>" . "Leerling Naam" . "</td>";
                echo "<td>" . "Cijfer" . "</td>";
            echo "</tr>";
            foreach($result as &$data) {
                echo "<tr>";
                    echo "<td>" . $data["id"] . "</td>";
                    echo "<td>" . $data["leerling"] . "</td>";
                    echo "<td>" . $data["cijfer"] . "</td>";
                echo "</tr>";
            }
        echo"<table>";
        }   catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
    ?>
</body>
</html>