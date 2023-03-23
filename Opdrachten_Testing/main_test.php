<?php
// Set filter parameters
if(isset($_POST['filter']) && isset($_POST['filter_column'])){
    $_SESSION['filter'] = $_POST['filter'];
    $_SESSION['filter_column'] = $_POST['filter_column'];
}

function ConnectDb(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fietsenmaker"; // <--- DatabaseName
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #echo 'Connected successfully 1<br>';
    } catch(PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    #echo 'Connected successfully 2<br>';
    return $conn;
}

function OvzFietsen(){
    $result = GetData("fietsen"); // <--- TableName
    PrintFietsen($result);
}

function GetDataFilter($table){
    // Connect database
    $conn = ConnectDb();
    #var_dump($conn);

    // Get filter parameters from session
    $filter = isset($_SESSION['filter']) ? $_SESSION['filter'] : '';
    $filter_column = isset($_SESSION['filter_column']) ? $_SESSION['filter_column'] : '';

    if(!empty($filter) && !empty($filter_column)){
        // Select data uit de opgegeven table 
        $query = $conn->prepare("SELECT * FROM $table WHERE $filter_column = :filter");
        $query->bindParam(':filter', $filter);
    }else{
        // Select data uit de opgegeven table // GEEN Filter
        $query = $conn->prepare("SELECT * FROM $table");
    }
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function PrintFietsen($result){
    echo '<form action="" method="post">';
        echo '<select name="filter_column">';
            echo '<option value="id">ID</option>';
            echo '<option value="merk">Merk</option>';
            echo '<option value="type">Type</option>';
            echo '<option value="prijs">Prijs</option>';
        echo '</select>';
        echo '<input type="text" name="filter" value="">';
        echo '<input type="submit" value="Filter">';
    echo '</form>';
}

?>