<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Verify</title>
</head>
<body>
    <?php
        try {
            $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
            if (isset($_POST["inloggen"])) {
                $username = filter_input(INPUT_POST, "username", FILTER_UNSAFE_RAW);
                $password = $_POST['password'];
                $query = $db->prepare("SELECT * FROM gebruikers WHERE username = :user");
                $query->bindParam("user", $username);
                $query->execute();
                if($query->rowCount() == 1){
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($password, $result["password"])) {
                        echo "Juiste gegevens";
                    } else {
                        echo "Onjuiste gegevens! <br>";
                        echo "Onjuist password_verify(password, result['password'])";
                    }
                } else {
                    echo "Onjuiste gegevens! <br>";
                    echo "Onjuist %query->rowCount() == 1";
                }
                echo "<br><br>";
                echo "Inlogveld password: $password <br>";
                echo "Database password: ". $result["password"];
            }
        }   catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
    ?>
    <br><br>
    <a href="9.4_inloggen.php">Terug naar inlog pagina</a>
</body>
</html>