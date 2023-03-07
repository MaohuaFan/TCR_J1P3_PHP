<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="test3.css">
    <title>Database Bieren</title>
</head>
<body>
    <?php
        try {
        $db = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
        $query = $db->prepare("SELECT * FROM bier");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo"<table>";
            echo "<tr>";
                echo "<td>" . "Bier Code " . "</td>";
                echo "<td>" . "Bier Naam " . "</td>";
                echo "<td>" . "Alcohol % " . "</td>";
            echo "</tr>";
            foreach($result as &$data) {
                echo "<tr>";
                    echo "<td>" . $data["biercode"] . "</td>";
                    echo "<td>" . $data["naam"] . "</td>";
                    echo "<td>" . $data["alcohol"] . "</td>";
                echo "</tr>";
            }
        echo"<table>";
        }   catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
        
    ?>
</body>
</html>