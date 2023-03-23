<?php
// Functie: Algemene functies tbv hergebruik
// Auteur: 

// Main

// 
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

function GetData($table) {
    // Connect database
    $conn = ConnectDb();
    #var_dump($conn);
    
    // Select data uit de opgegeven table
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function OvzTable(){
    $result = GetData("fietsen"); // <--- TableName
    PrintTable($result);
}

function PrintTable($result) {
    echo '<table border=1px>';
        foreach($result[0] as $COULUMN_NAME => $cell){
            echo '<th>'. $COULUMN_NAME . '</th>';
        }
        echo '<tr>';
            foreach($result as &$row) {
                echo '<tr>';
                    foreach($row as &$cell){
                        echo '<td>' . $cell . '</td>';
                    }
                echo '</tr>';
                }
        echo '</tr>';
    echo '</table>';
}


// Overzicht Fietsen Placeholder

/*
function OvzTableFietsen(){
    $result = GetData("fietsen"); // <--- TableName
    PrintTable($result);
}*/


function PrintTableFietsen($result) {
    echo '<table border=1px>';
        foreach($result[0] as $COULUMN_NAME => $cell){
            echo '<th>'. $COULUMN_NAME . '</th>';
        }
        echo '<tr>';
            foreach($result as &$row) {
                echo '<tr>';
                    foreach($row as &$cell){
                        echo '<td>' . $cell . '</td>';
                    }
                echo '</tr>';
                }
        echo '</tr>';
    echo '</table>';
}

// Overzicht Fietsen met Filter

function OvzFietsen(){
    $result = GetData("fietsen"); // <--- TableName
    PrintFietsen($result);
}
/*
function PrintFietsen($result) {
    // Get filter parameters from session
    $filter = isset($_SESSION['filter']) ? $_SESSION['filter'] : '';
    $filter_column = isset($_SESSION['filter_column']) ? $_SESSION['filter_column'] : '';
    
    echo '<form action="" method="post">';
    echo '<select name="filter_column">';
    
    // Dynamically generate select options based on column names
    foreach ($result[0] as $column_name => $column_value) {
        echo '<option value="' . $column_name . '" ' . 
             ($filter_column === $column_name ? 'selected' : '') . '>' . 
             ucfirst($column_name) . '</option>';
    }
    
    echo '</select>';
    echo '<input type="text" name="filter" value="' . $filter . '">';
    echo '<input type="submit" value="Filter">';
    echo '</form>';

    // Print the results as a table
    echo '<table border=1px>';
    foreach($result[0] as $COULUMN_NAME => $cell){
        echo '<th>'. $COULUMN_NAME . '</th>';
    }
    foreach($result as &$data) {
        if(!empty($filter) && !empty($filter_column) && $data[$filter_column] !== $filter){
            continue; // skip this row if it doesn't match the filter
        }
        echo '<tr>';
        echo '<td>' . $data['id'] . '</td>';
        echo '<td>' . htmlspecialchars($data['merk']) . '</td>';
        echo '<td>' . htmlspecialchars($data['type']) . '</td>';
        echo '<td>' . $data['prijs'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

}
*/

function PrintFietsen($result) {
    // Get filter parameters from session
    $filter = isset($_SESSION['filter']) ? $_SESSION['filter'] : null;
    $filter_column = isset($_SESSION['filter_column']) ? $_SESSION['filter_column'] : null;
    
    // Create column name select options
    echo '<form action="" method="post">';
    echo '<select name="filter_column" id="filter_column">';
    foreach ($result[0] as $column_name => $column_value) {
        echo '<option value="' . $column_name . '" ' . ($filter_column === $column_name ? 'selected' : '') . '>' . ucfirst($column_name) . '</option>';
    }
    echo '</select>';
    // Get column items from the database based on the selected column name
    $column_items = array();
    foreach ($result as $data) {
        $column_item = $data[$filter_column];
        $column_items[$column_item] = true;
    }

    // Create select options based on column items
    foreach (array_keys($column_items) as $column_item) {
        echo '<option value="' . $column_item . '" ' . ($filter === $column_item ? 'selected' : '') . '>' . $column_item . '</option>';
    }
    
    echo '<select name="filter" id="filter"></select>';
    
    echo '<input type="submit" value="Filter">';
    echo '</form>';
    
    // Print the results as a table
    echo '<table>';
    echo '<tr><th>ID</th><th>Merk</th><th>Type</th><th>Prijs</th></tr>';
    foreach($result as &$data) {
        if(!empty($filter) && !empty($filter_column) && $data[$filter_column] !== $filter){
            continue; // skip this row if it doesn't match the filter
        }
        echo '<tr>';
        echo '<td>' . $data['id'] . '</td>';
        echo '<td>' . htmlspecialchars($data['merk']) . '</td>';
        echo '<td>' . htmlspecialchars($data['type']) . '</td>';
        echo '<td>' . $data['prijs'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}




// DetailsPage

function OvzTableDetails(){
    $result = GetDataFilter("fietsen"); // <--- TableName
    PrintTableDetails($result);
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

function PrintTableDetails($result) {
    foreach($result as &$data) { 
        echo '<article>';
            echo 'Artikelnummer: ' . $data["id"] . '<br>';
            echo 'Merk: ' . $data["merk"] . '<br>';
            echo 'Type: ' . $data["type"] . '<br>';
            echo 'Prijs: &euro; ' .
                number_format($data["prijs"], 2, ',', '.') . '<br><br>';
        echo '</article>';
    }
}


?>
