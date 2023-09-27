<!DOCTYPE html>
<html>
<head>
    <title>Page 1</title>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
        <h1>Data Entry Form</h1>
    </header>

    <div class="container">
        <form action="process_form_test_1.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" required>

            <label for="idNumber">ID Number:</label>
            <input type="text" id="idNumber" name="idNumber" required pattern="[0-9]{13}" title="ID Number must be 13 digits">

            <label for="dob">Date of Birth (ddmmyyyy):</label>
            <input type="text" id="dob" name="dob" required pattern="\d{8}" title="Date of Birth must be in ddmmyyyy format">

            <button type="submit" name="submit">Submit</button>
            <button type="reset">Cancel</button>
        </form>
    </div>
</body>
</html>