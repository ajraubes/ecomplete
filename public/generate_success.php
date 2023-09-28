<?php include 'header.php'; ?>
    <div class="main-block">
    <h1>eComplete Generate CSV</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body" style="text-align: center;">
                            <h2>CSV Generate Successfully</h2>
                            <p><span style="font-weight: 900;"><?php echo $_GET['generatedCount'];?></span> have been populated to the CSV file</p>
                            <p>You can find and download the file output.csv under project root direct public/output.csv</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>