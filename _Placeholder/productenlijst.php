<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section>
        <?php
            try {
                $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");        
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        ?>
    </section>
    <section>
        <?php
            try {
            $query = $db->prepare("SELECT * FROM fietsen");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                echo "<a href='opdracht_9.2_detail.php?id=" . $data['id'] . "'>";
                echo $data["id"] . " " . $data["merk"] . " " . $data["type"];
                echo "<br>";
            }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        ?>
    </section>
    <section>
        <?php
            try {
            $query = $db->prepare("SELECT * FROM fietsen WHERE ");
            $query->execute();
            $result = $query->fetchALL(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                echo"<br><br><br>";
                    echo $data["id"] . " " . $data["merk"] . " " . $data["type"];
                echo "<br>";
            }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        ?>
    </section>
    <section>
        <?php 
            try {
            $query = $db->prepare("SELECT * FROM fietsen");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                echo"<br><br><br>";
                echo "Artikelnummer: " . $data['id'] . "<br>";
                echo "Merk: " . $data['merk'] . "<br>";
                echo "Type: " . $data['type'] . "<br>";
                echo "Prijs: &euro; " . number_format($data["prijs"], 2, ",", ".") . "<br><br>";
            }
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        ?>
    </section>
</body>
</html>