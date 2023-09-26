<?php
if (isset($_POST['generate'])) {
    $recordCount = isset($_POST['recordCount']) ? intval($_POST['recordCount']) : 0;
    
    if ($recordCount > 0) {
        // Create a CSV file with unique data
        $csvData = []; // An array to store CSV rows
        
        // Your arrays for names and surnames (customize as needed)
        $names = [...];
        $surnames = [...];
        
        // Generate unique records
        for ($i = 1; $i <= $recordCount; $i++) {
            $name = $names[array_rand($names)];
            $surname = $surnames[array_rand($surnames)];
            $initials = substr($name, 0, 1);
            $age = rand(18, 99); // Adjust age range as needed
            $dob = date('d/m/Y', strtotime("-" . $age . " years"));

            // Ensure no duplicate rows
            $record = [$i, $name, $surname, $initials, $age, $dob];
            if (!in_array($record, $csvData)) {
                $csvData[] = $record;
            }
        }

        // Output CSV to a file
        $outputFilePath = 'output/output.csv';
        $csvFile = fopen($outputFilePath, 'w');
        
        // Write headers
        fputcsv($csvFile, ["Id", "Name", "Surname", "Initials", "Age", "Date Of Birth"]);

        // Write data
        foreach ($csvData as $row) {
            fputcsv($csvFile, $row);
        }
        
        fclose($csvFile);
        echo "CSV file generated successfully.";
    } else {
        echo "Invalid record count.";
    }
}
?>
