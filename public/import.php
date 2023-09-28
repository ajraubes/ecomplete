<?php include 'header.php'; ?>
    <div class="main-block">
        <h1>eComplete Import Data</h1>
        <form class="form-horizontal" method="POST" action="import-controller.php" name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data" onsubmit="return validateFile()">

            <div class="form-group">
                <label for="csv_file" class="control-label">Please Select The CSV file to import</label>
                <hr>
                <div class="col-md-12">
                    <input id="csv_file" type="file" class="form-control-file" name="csv_file" accept=".csv,.xls,.xlsx" required>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    <button type="submit" name="submit" class="btn btn-primary">
                        Import CSV
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php include 'footer.php'; ?>