<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SESSION['login'] == true) {
            echo "Informatie die je alleen ziet als de login gelukt is. <br>";
            echo "Username is in de session bewaard. <br>";
            echo "Username: " . $_SESSION['username'] . "<br>";
            echo'<form action="beveiligdepagina.php" method="post">';
                echo'<input type="submit" name="break" value="Break">';
            echo'</form>';
        } else {
            echo "U heeft nog niet ingelogd!";
        }
    ?>
    <br><br>
    <a href="opdracht_9.5.php">Terug naar inlogpagina</a>
</body>
</html>