<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Toevoegen</title>
</head>
<body>
    <form action="#" method="post">
    <input type="submit" name="registreer" value="Registreer">
    </form>
    <?php
        if(isset($_POST['registreer'])) {
            try {
                $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
                $password = password_hash("geheim", PASSWORD_DEFAULT);
                $query = $db->prepare("INSERT INTO gebruikers(username, password) VALUES('ik','".$password."')");
                if($query->execute()) {
                    echo "De nieuwe gegevens zijn toegevoed.";
                } else {
                    echo "Er is een fout opgetreden!";
                }
            }   catch(PDOException $e) {
                die("Error!: " . $e->getMessage());
            }
        }
    ?>
    <br><br><br>
    <a href="9.4_inloggen.php">Terug naar inlog pagina</a>
</body>
</html>