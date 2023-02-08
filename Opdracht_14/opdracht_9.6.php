<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!--Placeholder nog niet af-->
    <?php
        try { 
            $db = new PDO("mysql:host=localhost;dbname=DatabaseNaam", "root", "");
            $query = $db->prepare("SELECT * FROM DatabaseTabel");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as &$data) {
                echo "<br>";
            }
        }   catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
        ?>
    ?>
</body>
</html>