<?php include 'header.php'; ?>
<h1 class="text-center">CSV Generation and Import</h1>
<div class="container">
    <!-- Form for generating CSV -->
    <form action="generate_csv.php" method="post">
        <div class="form-group">
            <label for="recordCount">Enter the number of records to generate:</label>
            <input type="number" class="form-control" id="recordCount" name="recordCount" required>
        </div>
        <button type="submit" class="btn btn-primary" name="generate" id="generateButton">Generate CSV</button>
    </form>

    <!-- Progress display -->
    <div id="progress" class="mt-3">Progress: 0%</div>
    <hr />
    <!-- Form for importing CSV into SQLite -->
    <form action="import_csv.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="csvFile">Choose a CSV file to import:</label>
            <input type="file" class="form-control-file" id="csvFile" name="csvFile" accept=".csv" required>
        </div>
        <button type="submit" class="btn btn-primary" name="import">Import CSV</button>
    </form>

    <script>
    function checkProgress() {
        // Make an AJAX request to a PHP script that checks the progress
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_progress.php', true);
        xhr.onreadystatechange = function() {
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
<?php include 'footer.php'; ?>