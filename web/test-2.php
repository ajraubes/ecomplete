<!DOCTYPE html>
<html>
<head>
    <title>Page 2</title>
</head>
<body>
    <h1>CSV Generation and Import</h1>

    <!-- Form for generating CSV -->
    <form action="generate_csv.php" method="post">
        <label for="recordCount">Enter the number of records to generate:</label>
        <input type="number" id="recordCount" name="recordCount" required>
        <button type="submit" name="generate">Generate CSV</button>
    </form>

    <!-- Form for importing CSV into SQLite -->
    <form action="import_csv.php" method="post" enctype="multipart/form-data">
        <label for="csvFile">Choose a CSV file to import:</label>
        <input type="file" id="csvFile" name="csvFile" accept=".csv" required>
        <button type="submit" name="import">Import CSV</button>
    </form>
</body>
</html>