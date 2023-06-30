<?php
    $name = ['James','Emma','Ethan','Olivia','Benjamin','Ava','Alexander','Sophia','William','Mia',
    'Daniel','Isabella','Michael','Charlotte','Matthew','Harper','Christopher','Amelia','Joseph','Abigail'];
    $surname = ['Smith','Johnson','Williams','Brown','Davis','Taylor','Martinez','Anderson','Miller','Thomas',
    'Garcia','Wilson','Clark','Rodriguez','Lewis','Moore','Lee','Young','Hernandez','King'];

    $csvFile = 'output.csv'; // Specify the filename for the CSV file
    
    if($_POST['record_limit'] != null){
        $record_limit = $_POST['record_limit'];
    }else{
        $record_limit = 1000;
    }
    
    $handle = fopen($csvFile, 'w');
    if (!$handle) {
    die("Failed to open CSV file.");
    }

    $header = ['Id', 'Name', 'Surname', 'Initials', 'Age', 'Date Of Birth'];
    fputcsv($handle, $header);

    $usedIds = [];
    
    

    for ($i = 0; $i < $record_limit; $i++) {
        $id = $i+1;
        $nameIndex = array_rand($name);
        $surnameIndex = array_rand($surname);
        $birthdate = generateRandomBirthdate();
        $birthdate = $birthdate->format('d-m-Y');

        // Current date
        $currentDate = date('d-m-Y');

        // Calculate the difference
        $diff = date_diff(date_create($birthdate), date_create($currentDate));

        // Get the calculated age
        $age = $diff->format('%y');

        $data = [
            $id,
            $name[$nameIndex],
            $surname[$surnameIndex],
            $name[$nameIndex][0],
            $age,
            $birthdate
        ];

        fputcsv($handle, $data);
    }

    fclose($handle);

    // echo "CSV file generated successfully.";
    // $response = array(
    //     'err' => '',
    //     'msg' => 'CSV file generated successfully',
    // );
    
    // $queryString = http_build_query($response);
    // header("Location: index.php?" . $queryString);

    $fileUrl = '/sqlite/output.csv';
    $fileName = 'output.csv';

    // Set the headers for redirect and file download
    header('Location: ' . $fileUrl);
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($fileUrl));

    // Make sure to disable any output buffering
    while (ob_get_level()) {
        ob_end_clean();
    }

    // Force the browser to download the file
    readfile($fileUrl);

    function generateUniqueId(array &$usedIds, $record_limit) {
        $id = mt_rand(1, $record_limit);
        while (in_array($id, $usedIds)) {
            $id = mt_rand(1, $record_limit);
        }
        $usedIds[] = $id;
        return $id;
    }

    function generateRandomBirthdate() {
        $year = rand(1960, 2005);
        $month = rand(1, 12);
        $day = rand(1, 28);
        return DateTime::createFromFormat('Y-m-d', "$year-$month-$day");
    }
?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 