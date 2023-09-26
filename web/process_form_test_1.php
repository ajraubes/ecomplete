<?php
if (isset($_POST['submit'])) {
    // Validate input fields
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
    $idNumber = filter_input(INPUT_POST, 'idNumber', FILTER_VALIDATE_INT);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/\d{8}/")));

    if (!$name || !$surname || !$idNumber || !$dob) {
        // Validation failed
        echo "Validation error. Please check your inputs.";
    } else {
        // Connection to MongoDB
        $mongoClient = new MongoDB\Driver\Manager("mongodb://mongodb_host:27017");
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
