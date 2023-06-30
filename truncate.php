<?php
    require_once  __DIR__ . '\config.php';

    $tableName = 'import_csv'; // Replace with the name of your table

    // Truncate the table
    $query = "DELETE FROM $tableName";
    
    // Execute the query
    $result = $database->exec($query);
    
    if ($result) {
        // echo "Table '$tableName' truncated successfully.";
        $response = array(
            'err' => '',
            'msg' => "Table '$tableName' truncated successfully",
        );
        
        $queryString = http_build_query($response);
        header("Location: index.php?" . $queryString);
    } else {
        die("Failed to truncate table: " . $database->lastErrorMsg());
    }
    
    // Close the database connection
    $database->close();
?>