<!DOCTYPE html>
<html>
<head>
    <title>Page 2</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <h1>CSV Generation and Import</h1>
    </header>

    <div class="container">
        <!-- Form for generating CSV -->
        <form action="generate_csv.php" method="post">
            <label for="recordCount">Enter the number of records to generate:</label>
            <input type="number" id="recordCount" name="recordCount" required>
            <button type="submit" name="generate" id="generateButton">Generate CSV</button>
        </form>

        <!-- Progress display -->
        <div id="progress">Progress: 0%</div>

        <!-- Form for importing CSV into SQLite -->
        <form action="import_csv.php" method="post" enctype="multipart/form-data">
            <label for="csvFile">Choose a CSV file to import:</label>
            <input type="file" id="csvFile" name="csvFile" accept=".csv" required>
            <button type="submit" name="import">Import CSV</button>
        </form>

        <script>
            function checkProgress() {
                // Make an AJAX request to a PHP script that checks the progress
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'check_progress.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var progress = xhr.responseText;
                        document.getElementById('progress').innerHTML = 'Progress: ' + progress;
                        if (progress === '100%') {
                            // CSV generation is complete, re-enable the button
                            document.getElementById('generateButton').removeAttribute('disabled');
                        }
                    }
                };
                xhr.send();
            }
            
            setInterval(checkProgress, 3000);
        </script>
    </div>
</body>
</html>