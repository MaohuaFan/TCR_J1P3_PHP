<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="test3.css">
    <title>Subpagina 3 Action</title>
</head>
<body>
    <header>
        <?php
            include '../nav.php';
        ?>
    </header>
    <main>
        <section>
            <?php
            echo "<h2>Opdracht Inlogformulier</h2>";
                $name = $_POST['name']; /*Store username in variable*/
                $pass = $_POST['pass']; /*Store password in variable*/
                echo "Today is " . date("d/m/Y") . "<br>";
                echo "<table>";
                    if(strlen($name) <= 5) {    /*Print foutmelding als username kleiner dan of gelijk aan 5 tekens*/
                        echo"Error the username is less than 5 characters <br>";
                        echo "<tr>";
                            echo "<td style='font-weight: bold;'> Login Gegevens </td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td> Username: $name </td> <br>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td> Password: $pass </td> <br>";
                        echo "</tr>";
                    } else {
                        echo "<tr>";
                            echo "<td style='font-weight: bold;'> Inlog Gegevens </td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td> Username: $name </td> <br>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td> Password: $pass </td> <br>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<br><br>";
            echo "<h2>Opdracht Array</h2><br>";
                /*
                    $a[0] = "rob";
                    $a[1] = "jan";
                */            
                $a = array("rob", "jan", "piet");
                echo "$a[1]" . "<br><br>";
                var_dump($a);
                echo "<br><br>";
            echo "<table>";
                    echo "<tr>";
                        echo "<td style='font-weight: bold;'> Overzicht namen </td>";
                    echo "</tr>";
                    foreach($a as &$data) {
                        echo "<tr>";
                            echo "<td> $data </td>";
                        echo "</tr>";
                    }
                echo "</table>";
            ?>
        </section>
        <section>
            <?php
                echo "<br><br>";
                $str = "abcdefghijklmnopqrstuvwxyz";
                echo strlen($str);
                echo "<br><br>";
            ?>
            <a href="overzicht_bieren3.php">Overzicht Bieren</a>
        </section>
    </main>
</body>
</html>
