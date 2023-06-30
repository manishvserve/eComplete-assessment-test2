<?php
    require_once  __DIR__ . '\config.php';

    // Execute a SELECT query
    $query = "SELECT * FROM import_csv ORDER BY id DESC;";
    $result = $database->query($query);

    // Fetch the values from the result set
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $column0Value = $row['id'];
        
        $column1Value = $row['name'];
        $column2Value = $row['surname'];
        $column3Value = $row['initials'];
        $column4Value = $row['age'];
        $column5Value = $row['dob'];

        // Do something with the values
        echo "ID: " . $column0Value . "<br>";
        exit;
        echo "Name: " . $column1Value . "<br>";
        echo "Surname: " . $column2Value . "<br>";
        echo "Initials: " . $column3Value . "<br>";
        echo "Age: " . $column4Value . "<br>";
        echo "Date of Birth: " . $column5Value . "<br>";
    }

    // Close the database connection
    $database->close();
?>