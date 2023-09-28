<?php include 'header.php'; ?>

<h1 class="text-center">CSV Generation and Import</h1>
<div class="main-block">
    <!-- Form for generating CSV -->
    <h2>Generate CSV</h2>
    <!-- Generate Button -->
    <div class="btn-block">
        <button class="btn btn-primary" type="submit" onclick="window.location.href = 'generate.php'">Generate</button>
    </div>
    <hr />
    <!-- Form for importing CSV into SQLite -->
    <h2>Import CSV</h2>
    <!-- Import Button -->
    <div class="btn-block">
        <button class="btn btn-primary" type="submit" onclick="window.location.href = 'import.php'">Import</button>
    </div>
</div>

<?php include 'footer.php'; ?>