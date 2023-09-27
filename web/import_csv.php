<?php include 'header.php'; ?>

<?php
if (isset($_POST['import'])) {
    // Generate a unique timestamp
    $timestamp = date("YmdHis");

    // Create a new database file with a timestamp in the name
    $dbFileName = 'user_data_import_' . $timestamp . '.db';
    $db = new SQLite3($dbFileName);

    // Create a table for CSV data
    $db->exec("CREATE TABLE IF NOT EXISTS csv_import (Id INTEGER, Name TEXT, Surname TEXT, Initials TEXT, Age INTEGER, DateOfBirth TEXT)");

    // Import CSV file
    if ($_FILES['csvFile']['error'] == 0) {
        $csvFile = fopen($_FILES['csvFile']['tmp_name'], 'r');

        $firstRow = true;
        $importedCount = 0;

        while (($row = fgetcsv($csvFile)) !== false) {
            if ($firstRow) {
                $firstRow = false;
                continue;
            }

            // Insert data into SQLite table
            $query = "INSERT INTO csv_import (Id, Name, Surname, Initials, Age, DateOfBirth) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->bindParam(1, $row[0], SQLITE3_INTEGER);
            $stmt->bindParam(2, $row[1], SQLITE3_TEXT);
            $stmt->bindParam(3, $row[2], SQLITE3_TEXT);
            $stmt->bindParam(4, $row[3], SQLITE3_TEXT);
            $stmt->bindParam(5, $row[4], SQLITE3_INTEGER);
            $stmt->bindParam(6, $row[5], SQLITE3_TEXT);
            $stmt->execute();

            $importedCount++;

            // Display the progress every 1000 records
            if ($importedCount % 1000 == 0) {
                echo "Importing record $importedCount | ";
                flush();
            }
        }

        fclose($csvFile);
        echo "Imported $importedCount records into the SQLite database ($dbFileName).";
    } else {
        echo "Error uploading the CSV file.";
    }
}
?>

<?php include 'footer.php'; ?>
