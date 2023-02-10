<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        #testing for username in session
        #session_start();
        #echo "Username: " . $_SESSION['username'] . "<br>"; 
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label>Username: </label>
            <input type="text" name="username" ><br>
        <label>Password: </label>
            <input type="password" name="password" ><br>
            <input type="submit" name="login" value="Inloggen">
            <br>
    </form>
    <?php
        try {
            $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");
            if (isset($_POST["login"])) {
                $username = filter_input(INPUT_POST, "username", FILTER_UNSAFE_RAW);
                $password = $_POST['password'];
                $query = $db->prepare("SELECT * FROM gebruikers WHERE username = :user");
                $query->bindParam("user", $username);
                $query->execute();
                if($query->rowCount() == 1){
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    if(password_verify($password, $result["password"])) {
                        echo "Juiste gegevens";
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION['username'] = $_POST['username'];
                        header('Location: beveiligdepagina.php');
                    } else {
                        echo "Onjuiste gegevens! <br>";
                        $_SESSION['login'] = false;
                        $_SESSION['username'] = NULL;
                    }
                } else {
                    echo "Onjuiste gegevens! <br>";
                    $_SESSION['login'] = false;
                    $_SESSION['username'] = NULL;
                }
                echo "<br><br>";
            }
        }   catch(PDOException $e) {
            die("Error!: " . $e->getMessage());
        }
    ?>
</body>
</html>