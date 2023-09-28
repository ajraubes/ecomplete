<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="web/styles.css">

    <title>eComplete Generate CSV</title>

</head>
<body class="antialiased">
<div class="main-block">
    <h1>eComplete Generate Data</h1>
    <form action="generate-controller.php" method="post">

        <!-- Number of Data to generate -->
        <label for="limit">Enter Number of Records to Generate</label>
        <input type="number" name="limit" id="limit" placeholder="Number of Records to Generate" required/>

        <!-- Generate Button -->
        <div class="btn-block">
            <button type="submit">Generate</button>
        </div>

    </form>
</div>
</body>
</html>