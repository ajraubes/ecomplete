<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="web/styles.css">
        <script type="text/javascript">
            function validateFile() {
                var csvInputFile = document.forms["frmCSVImport"]["file"].value;
                if (csvInputFile === "") {
                    error = "No source found to import. Please select a CSV file. ";
                    $("#response").html(error).addClass("error");
                    return false;
                }
                return true;
            }
        </script>
        <title>eComplete Import CSV</title>
    </head>
    <body class="antialiased">
        <div class="main-block">
            <h1>eComplete Import Data</h1>
            <form class="form-horizontal" method="POST" action="import-controller.php" name="frmCSVImport" id="frmCSVImport"
                  enctype="multipart/form-data" onsubmit="return validateFile()">

                <div class="form-group">
                    <label for="csv_file" class="col-md-4 control-label">Please Select The CSV file to import</label>
                    <hr>
                    <div class="col-md-6">
                        <input id="csv_file" type="file" class="form-control" name="csv_file" accept=".csv,.xls,.xlsx" required>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" name="submit" class="btn btn-primary">
                            Import CSV
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
