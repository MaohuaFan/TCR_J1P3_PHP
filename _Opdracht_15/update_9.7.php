<?php
    // Database gegevens includen.
    include('functions_9.6.php');
    $conn = ConnectDb();
    // ID ophalen
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo"$id";
        try {
            // SQL to delete a record
            $sql = "DELETE FROM gastenboek WHERE id='$id'";

            // Use exec() because no result are returned
            $conn->exec($sql);
            echo "Records deleted successfully";
            // Terug naar homepage
            header('Location: opdracht_9.6.php');
        } catch(PDOException $e) {
            //echo "$sql . "<br>" . $e->getMessage();
        }
    }

?>