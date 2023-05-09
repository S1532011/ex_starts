<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <div id="main-page" class="flex column">
            <h1>Expenses Tracker:</h1>
            <a href="input.php"><button class="form-item input-item hover-styles">Input New Expense</button></a>
            <br/>

            <h2>View Expenses:</h2>
            <form action="view_expenses.php" method="post">
                <label>Start Date:</label>
                <input class="form-item input-item" type="date" name="date1" value="<?php echo date("Y-m-d")?>" />

                <label>End Date:</label>
                <input class="form-item input-item" type="date" name="date2" value="<?php echo date("Y-m-d")?>" />

                <label>Detailed:</label>
                <input class="form-item input-item" type="checkbox" name="detailed" />

                <div class="form flex row">
                    <input class="form-item input-item hover-styles" type="submit" value="Submit" />
                    <input class="form-item input-item hover-styles" type="reset" value="Reset" />
                </div>
            </form>
        </div>
    </body>
</html>