<?php
    require_once  __DIR__ . '\config.php';

    // CSV file processing
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
        // Validate and process the uploaded CSV file
        $csvFile = $_FILES['csv_file']['tmp_name'];
        if (($handle = fopen($csvFile, 'r')) !== false) {
            
            // Skip the header row if it exists
            $headerRow = fgetcsv($handle);

            // Read and insert data from each row
            while (($data = fgetcsv($handle)) !== false) {
                $id = $data[0];
                $name = $data[1];
                $surname = $data[2];
                $initials = $data[3];
                $age = $data[4];
                $birthdate = $data[5];

                // Create the insert query
                $query = "INSERT INTO import_csv (id, name, surname, initials, age, dob) 
                        VALUES ('$id', '$name', '$surname', '$initials', '$age', '$birthdate')";

                // Execute the query
                $result = $database->exec($query);
                
                if (!$result) {
                    die("Failed to insert data: " . $database->lastErrorMsg());
                }
            }

            fclose($handle);
        }
    }

    // Close the database connection
    $database->close();

    // Redirect to a success page
    $response = array(
        'err' => '',
        'msg' => 'Import successfully',
    );
    
    $queryString = http_build_query($response);
    header("Location: index.php?" . $queryString);
    exit();
?>