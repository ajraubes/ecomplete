<?php include 'header.php'; ?>
<h1 class="text-center">Data Entry Form</h1>
<div class="container">
    <form action="process_form_test_1.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>

        <div class="form-group">
            <label for="idNumber">ID Number:</label>
            <input type="text" class="form-control" id="idNumber" name="idNumber" required pattern="[0-9]{13}"
                title="ID Number must be 13 digits">
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth (ddmmyyyy):</label>
            <input type="text" class="form-control" id="dob" name="dob" required pattern="\d{8}"
                title="Date of Birth must be in ddmmyyyy format">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </form>
</div>
<?php include 'footer.php'; ?>