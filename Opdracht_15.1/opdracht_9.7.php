<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_9.7.css">
    <title>Poll</title>
</head>
<body>
    <form method="post">
        <label for="1">1</label>
            <input type="radio" name="choice" value="1" required><br>
        <label for="2">2</label>
            <input type="radio" name="choice" value="2" required><br>
        <label for="3">3</label>
            <input type="radio" name="choice" value="3" required><br>
        <label for="4">4</label>
            <input type="radio" name="choice" value="4" required><br>
        <input type="submit">
    </form>
    <?php
        $conn = ConnectDb();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $choice = $_POST["choice"];
            switch($choice){
                case 1:
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=1";
                    break;
                case 2:
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=2";
                    break;
                case 3:
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=3";
                    break;
                case 4:
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=4";
                    break;
            }
        }
        $query($conn, $sql);
        $sql = "SELECT stem1, stem2, stem3, stem4 FROM poll";
        $result = $query($conn, $sql);
 
        echo "<h2>Poll Results</h2>";
        echo "<table>";
            echo "<tr><th>Choice</th><th>Count</th></tr>";
            foreach($result as &$data) {
                echo "<tr>";
                    echo "<td>";
                        echo $data["id"];
                    echo "</td>";
                    echo "<td>";
                        echo $data["stemmen"];
                    echo "</td>";
                echo "</tr>";
            }
        echo "</table>"; 
        $conn = null;
    ?>
</body>
</html>