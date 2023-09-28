<?php
set_time_limit(100200); //Restarts the timeout counter from zero
ini_set('memory_limit', '2048M'); //Set memory limit in MB
ini_set('max_execution_time', 100200 ) ; //Set max execution time in seconds

if(isset($_POST['submit'])){

    if(!empty($_FILES['csv_file']['tmp_name'])){

        // If the file is uploaded
        if(is_uploaded_file($_FILES['csv_file']['tmp_name'])){

            echo "arrived here";
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['csv_file']['tmp_name'], 'r');

            // Skip the first line
            fgetcsv($csvFile);

            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $idNumber = $line[0];
                $name = $line[1];
                $surname = $line[2];
                $initial = $line[3];
                $age = $line[4];
                $dob = $line[5];

                // Check whether member already exists in the database with the same id_number
                $prevQuery = "SELECT COUNT(*) FROM csv_import WHERE id_number = '".$line[0]."'";
                $prevResult = createDb()->query($prevQuery);



//                if($prevResult){
//                    // Update user data in the database
//                    createDb()->query("UPDATE csv_import SET name = '".$name."', surname = '".$surname."', initial = '".$initial."', age = '".$age."', dob = '".$dob."' WHERE id_number = '".$idNumber."'");
//                }else{
                    // Insert user data in the database
                    createDb()->query("INSERT INTO csv_import (id_number, 
                                                                    name, 
                                                                    surname, 
                                                                    initial, 
                                                                    age, 
                                                                    dob) 
                                            VALUES ('".$idNumber."', 
                                                    '".$name."', 
                                                    '".$surname."', 
                                                    '".$initial."', 
                                                    '".$age."', 
                                                    '".$dob."'
                                                    )");
//                }
            }

            // Close opened CSV file
            fclose($csvFile);

            $baseUrl = '/import_success.php';
            // Redirect to the Success page
            return header("Location:".$baseUrl, true, 301);

        }
    }
}

function createDb(){

    $db = new SQLite3('database/database.sqlite');
    $db->exec('CREATE TABLE IF NOT EXISTS "csv_import" (
                                                    "id" integer not null primary key autoincrement, 
                                                    "id_number" integer, 
                                                    "name" varchar, 
                                                    "surname" varchar, 
                                                    "initial" varchar, 
                                                    "age" varchar, 
                                                    "dob" date, 
                                                    "created_at" datetime default CURRENT_TIMESTAMP, 
                                                    "updated_at" datetime default CURRENT_TIMESTAMP);');

    return $db;
}