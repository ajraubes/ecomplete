<?php include 'header.php'; ?>
<?php
set_time_limit(100200);
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 100200);

if (isset($_POST['generate'])) {
    $recordCount = isset($_POST['recordCount']) ? intval($_POST['recordCount']) : 0;

    if ($recordCount > 0) {
        $timestamp = date('Y-m-d_H-i-s');
        $outputFilePath = 'output/output_' . $timestamp . '.csv';

        $names = [
            "John",
            "Alice",
            "Bob",
            "Emma",
            "David",
            "Olivia",
            "Michael",
            "Sophia",
            "William",
            "Isabella",
            "James",
            "Ava",
            "Ethan",
            "Mia",
            "Benjamin",
            "Charlotte",
            "Liam",
            "Amelia",
            "Henry",
            "Ella",
        ];
        $surnames = [
            "Smith",
            "Johnson",
            "Brown",
            "Taylor",
            "Wilson",
            "Jones",
            "Martinez",
            "Davis",
            "Garcia",
            "Rodriguez",
            "Martinez",
            "Hernandez",
            "Lopez",
            "Gonzalez",
            "Williams",
            "Jackson",
            "Miller",
            "Moore",
            "Taylor",
            "Clark",
        ];

        $generatedRecords = [];
        $uniqueCombinations = [];

        $batchSize = 1000;
        $progress = 0;
        $headerWritten = false;

        for ($i = 1; $i <= $recordCount; $i++) {
            do {
                $name = $names[array_rand($names)];
                $surname = $surnames[array_rand($surnames)];
                $age = rand(18, 99);
                $dob = date('d/m/Y', strtotime("-" . $age . " years"));
                $combination = $name . ',' . $surname . ',' . $age . ',' . $dob;
            } while (isset($uniqueCombinations[$combination]));

            $uniqueCombinations[$combination] = true;

            $initials = substr($name, 0, 1);

            $record = [$i, $name, $surname, $initials, $age, $dob];

            // Update progress
            $progress = ($i / $recordCount) * 100;

            // Write progress to a text file
            file_put_contents('output/progress.txt', $progress . '%');

            // Write the batch and sleep for 2 seconds after each batch
            if ($i % $batchSize === 0) {
                $csvFile = fopen($outputFilePath, 'a');

                if (!$headerWritten) {
                    fputcsv($csvFile, ["Id", "Name", "Surname", "Initials", "Age", "Date Of Birth"]);
                    $headerWritten = true;
                }

                foreach ($generatedRecords as $record) {
                    fputcsv($csvFile, $record);
                }
                fclose($csvFile);
                $generatedRecords = [];

                // Sleep
                // sleep(2);
            }

            $generatedRecords[] = $record;
        }

        // Write any remaining records in the batch
        $csvFile = fopen($outputFilePath, 'a');
        foreach ($generatedRecords as $record) {
            fputcsv($csvFile, $record);
        }
        fclose($csvFile);

        // Remove progress file
        unlink('output/progress.txt');

        echo "CSV file generated successfully: $outputFilePath";
    } else {
        echo "Invalid record count.";
    }
}
?>
<?php include 'footer.php'; ?>
