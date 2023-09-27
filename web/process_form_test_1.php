<?php
if (isset($_POST['submit'])) {
    // Custom input validation and sanitation
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : null;
    $surname = isset($_POST['surname']) ? strip_tags(trim($_POST['surname'])) : null;
    $idNumber = isset($_POST['idNumber']) ? (int)$_POST['idNumber'] : null;
    $dob = isset($_POST['dob']) ? $_POST['dob'] : null;

    if (empty($name) || empty($surname) || !$idNumber || !preg_match("/\d{8}/", $dob)) {
        // Validation failed
        echo "Validation error. Please check your inputs.";
    } else {
        // Connection to MongoDB
        $mongoClient = new MongoDB\Driver\Manager("mongodb://mongodb:27017");
        $databaseName = "user_data";
        $collectionName = "user_records";
        $collection = $databaseName . "." . $collectionName;

        // Check for duplicate ID Number
        $filter = ['idNumber' => $idNumber];
        $query = new MongoDB\Driver\Query($filter);
        $cursor = $mongoClient->executeQuery($collection, $query);

        if (iterator_count($cursor) > 0) {
            // Duplicate ID Number found
            echo "Duplicate ID Number. Please use a different one.";
        } else {
            // Insert data into the MongoDB collection
            $document = [
                'name' => $name,
                'surname' => $surname,
                'idNumber' => $idNumber,
                'dob' => $dob,
            ];

            $bulkWrite = new MongoDB\Driver\BulkWrite;
            $bulkWrite->insert($document);
            $mongoClient->executeBulkWrite($collection, $bulkWrite);

            echo "Data saved successfully.";
        }
    }
} else {
    echo "Form not submitted.";
}
?>
