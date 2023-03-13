<?php
    function PrintTable($result){
        // Zet de hele table in een variable en print hem 1 keer 
        $table = "<table border = 1px>";
     
        // Print header table
     
        // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
        $headers = array_keys($result[0]);
        $table .= "<tr>";
        foreach($headers as $header){
            $table .= "<th bgcolor=gray>" . $header . "</th>";   
        }
     
        // print elke rij
        foreach ($result as $row) {
            
            $table .= "<tr>";
            // print elke kolom
            foreach ($row as $cell) {
                $table .= "<td>" . $cell . "</td>";
            }
            $table .= "</tr>";
        }
        $table.= "</table>";
     
        echo $table;
    }
?>