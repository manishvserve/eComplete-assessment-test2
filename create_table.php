<?php
    $databasePath = '/database.db';

    // Create a new SQLite3 database object
    $database = new SQLite3($databasePath);

    // Check if the database connection is successful
    if (!$database) {
        die("Failed to connect to SQLite database.");
    }

    // Create the table query
    $query = "CREATE TABLE IF NOT EXISTS import_csv (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT,
        surname TEXT,
        initials TEXT,
        age INTEGER,
        dob DATE
    )";

    // Execute the query
    $result = $database->exec($query);

    if ($result) {
        echo "Table created successfully.";
    } else {
        echo "Failed to create table.";
    }

    // Close the database connection
    $database->close();
?>