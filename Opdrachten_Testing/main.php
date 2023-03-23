<?php
        echo '<table border=1px>';
        /*foreach($result[0] as $COULUMN_NAME => $data){
            echo '<th>'. $COULUMN_NAME . '</th>';
        }*/
        $array = array("1","2","3","4");
        foreach($array as &$data){
            echo '<tr>';
                echo '<td>';
                    echo '<a href="main.php';
                    switch($data){
                        case 1:
                            echo'?id=';
                            #echo $data['id'];
                            echo '1">'; // Placeholder
                            echo 'id';
                            break;
                        case 2:
                            echo'?merk=';
                            #echo $data['merk'];
                            echo '1">'; // Placeholder
                            echo 'merk';
                            break;
                        case 3:
                            echo'?type=';
                            #echo $data['type'];
                            echo '1">'; // Placeholder
                            echo 'type';
                            break;
                        case 4:
                            echo'?prijs=';
                            #echo $data['prijs'];
                            echo '1">'; // Placeholder
                            echo 'prijs';
                            break;
                    }
                    echo '</a>';
                    echo '<br>';
                echo '</td>';
            echo '</tr>';  
    }
    echo '</table>';
?>

<?php
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
    
    echo '<select name="filter" id="filter">';
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
    
    echo '</select>';
    
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


?>