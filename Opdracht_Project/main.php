<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
    <h3>Lakkleur</h3>
    <form action="#" method="post">
        <label for="1">Color 1: <input type="radio" name="radio" value="1" id="1" checked></label>
        <label for="2">Color 2: <input type="radio" name="radio" value="2" id="2"></label>
        <label for="3">Color 3: <input type="radio" name="radio" value="3" id="3"></label>
        </form><br>
    <?php
    /*
        echo'<form action="" method="post">';
        echo'<label for=""></label>';
        echo'<input type="radio" name="radio" id="1" checked>';
        echo'<input type="submit" value="">';
        echo'</form>';
    */
    echo"Echo: ";
    $radio = $_POST['radio'];
        if(isset($_POST['submit'])){
            switch($radio){
                case 1:
                    echo "Color 1";
                    break;
                case 2:
                    echo "Color 2";
                    break;
                case 3:
                    echo "Color 3";
                    break;
            }
        }
    ?>

</body></html>