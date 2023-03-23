<?php
    // Set filter parameters
    if(isset($_POST['filter']) && isset($_POST['filter_column'])){
        $_SESSION['filter'] = $_POST['filter'];
        $_SESSION['filter_column'] = $_POST['filter_column'];
    }
?>
<?php
    include 'functions.php';
    #OvzTableFietsen();
    echo "<br><br>";
    OvzFietsen();
    echo "<br><br>";
    OvzTableDetails();
?>