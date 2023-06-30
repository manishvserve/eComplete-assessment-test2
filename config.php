<?php
    $databasePath = '/database.db';

    // Create a new SQLite3 database object
    $database = new SQLite3($databasePath);
    
    // Check if the database connection is successful
    if (!$database) {
        die("Failed to connect to SQLite database.");
    }


?>