<!DOCTYPE html>
<html>
<head>
    <title>Poll</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
<form action="#" method="post">
        <label for="1">1: <input type="radio" name="radio" value="1" id="1" checked required></label><br>
        <label for="2">2: <input type="radio" name="radio" value="2" id="2" required></label><br>
        <label for="3">3: <input type="radio" name="radio" value="3" id="3" required></label><br>
        <label for="4">4: <input type="radio" name="radio" value="4" id="4" required></label><br>
        <input type="submit" name="submit" value="submit" id="submit">
        </form><br>
    <?php
        include 'functions.php';
        $conn = ConnectDb();
        $radio = $_POST['radio'];
        stemmen();/*
        if(isset($_POST['submit'])){
            switch($radio){
                case 1:
                    #echo "1: ";
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=1";
                    break;
                case 2:
                    #echo "2: ";
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=2";
                    break;
                case 3:
                    #echo "3: ";
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=3";
                    break;
                case 4:
                    #echo "4: ";
                    $sql = "UPDATE optie SET stemmen = stemmen + 1 WHERE id=4";
                    break;
            }
            $conn->exec($sql);
        }*/
        echo"<br><br>";
        echo "<table border=1px>";
            OvzPoll();
            OvzTotaleStemmen();
            OvzOptie();
            #OvzPercentageStemmen();
        echo "</table>";
        

    ?>
</body>
</html>