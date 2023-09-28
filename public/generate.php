<?php include 'header.php'; ?>
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
<?php include 'footer.php'; ?>