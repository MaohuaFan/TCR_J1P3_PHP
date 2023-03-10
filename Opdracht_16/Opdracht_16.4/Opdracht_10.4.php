<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cijferlijst</title>
</head>

<body>
    <?php
    try {
        $db = new PDO("mysql:host=localhost;dbname=studenten", "root", "");
        $query = $db->prepare("SELECT * FROM cijfers");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>";
        echo "<tr>";
        echo "<td>" . "Leerling ID" . "</td>";
        echo "<td>" . "Leerling Naam" . "</td>";
        echo "<td>" . "Leerling Cijfer" . "</td>";
        echo "</tr>";
        foreach ($result as &$data) {
            echo "<tr>";
            echo "<td>" . $data["id"] . "</td>";
            echo "<td>" . $data["leerling"] . "</td>";
            echo "<td>" . $data["cijfer"] . "</td>";
            echo "</tr>";
        }
        echo "<table>";

        $query = $db->prepare("SELECT AVG(cijfer) AS cijfer FROM cijfers");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $gem) {
            echo "het gemiddelde cijfer is een " . $gem["cijfer"];
            echo "<br>";
        }

        $query = $db->prepare("SELECT MAX(cijfer) AS cijfer FROM cijfers");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $hoogst) {
            echo "het hoogste cijfer is een " . $hoogst["cijfer"];
            echo "<br>";
        }

        $query = $db->prepare("SELECT MIN(cijfer) AS cijfer FROM cijfers");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $laagst) {
            echo "het laagste cijfer is een " . $laagst["cijfer"];
        }
    
    } catch (PDOException $e){
        die("Error!: " . $e->getMessage());
    }




    ?>

    <style type="text/css">
        table{
            border-collapse: collapse;
            border: 1px solid black;
        }

        td{
            border: 1px solid black;
            width: 100px;
        }
    </style>
</body>

</html>