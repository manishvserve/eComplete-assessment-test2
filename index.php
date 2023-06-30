<?php 
    if($_GET){
        $value1 = $_GET['err'];
        $value2 = $_GET['msg'];
    }else{
        $value1 = "";
        $value2 = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Test1</title>
</head>
<body>
    <div class="container-fluid">
        
        <div class="row text-center">
            <!-- Heading -->
            <div class="col-12 ">
                <h2>Test 2</h2>
            </div>
            <!-- Success Msg -->
            <div class="col-12">
                <b><p class="mb-3 text-success"><?php echo $value2; ?></p></b>
            </div>
        </div>
        <!-- Generate CSV Form -->
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <form action="generate_csv.php" method="post">
                    <!-- Record Limit -->
                    <label for="record_limit"><strong>Record Limit</strong></label>
                    <input class="form-control mb-3" type="number" name="record_limit" id="record_limit" required>
                    <!-- Post Button -->
                    <input class="btn btn-primary mb-3" type="submit" value="GENERATE CSV">
                    <!-- Cancel Button -->
                    <input class="btn btn-danger mb-3" type="reset" value="CANCEL">
                </form>
            </div>
            <div class="col-4">
            </div>
        </div>
        <!-- Import CSV Form -->
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <form action="import_csv.php" method="post" enctype="multipart/form-data">
                    <!-- Imput File -->
                    <label for="csv_file"><strong>Input File</strong></label>
                    <input class="form-control mb-3" type="file" name="csv_file" accept=".csv" required>
                    <!-- Post Button -->
                    <input class="btn btn-primary mb-3" type="submit" value="IMPORT CSV">
                    <!-- Cancel Button -->
                    <input class="btn btn-danger mb-3" type="reset" value="CANCEL">
                    <!-- Truncate Button -->
                    <a class="btn btn-warning mb-3" href="truncate.php">TRUNCATE</a>
                </form>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>
</body>
</html>
