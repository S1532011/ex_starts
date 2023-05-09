<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <div id="main-page" class="flex column">
            <a href="index.php"><button class="form-item input-item hover-styles">&larr; Back</button></a>
            <h1>Input Expense:</h1>
            <form action="input_review.php" method="post">
                <label>Employee ID:</label>
                <input class="form-item input-item hover-styles" type="number" maxlength="10" name="employeeID" required/>
                <br/>

                <label>Amount: $</label>
                <input class="form-item input-item hover-styles" type="number" name="amount" min="0.00" max="999999999999.99" step="0.01" value="0.00" required/>
                <br/>

                <label>Date:</label>
                <input class="form-item input-item hover-styles" type="date" name="date" value="<?php echo date('Y-m-d')?>" required/>
                <br/>

                <label>Description:</label>
                <input class="form-item input-item hover-styles" type="text" maxlength="255" name="description" required/>
                <br/>

                <label>Category:</label>
                <select class="form-item input-item hover-styles" name="category" required>
                    <option value="" selected disabled>-not selected-</option>
                    <option value="tolls">tolls</option>
                    <option value="gas">gas</option>
                    <option value="food">food</option>
                    <option value="accommodations">accommodations</option>
                    <option value="mileage">mileage</option>
                    <option value="entertainment">entertainment</option>
                    <option value="car expenses">car expenses</option>
                    <option value="car rental">car rental</option>
                    <option value="personal">personal</option>
                </select>
                <br/>

                <label>Payment Method:</label>
                <select class="form-item input-item hover-styles" name="paymentMethod" required>
                    <option value="" selected disabled>-not selected-</option>
                    <option value="cash">cash</option>
                    <option value="credit">credit</option>
                    <option value="debit">debit</option>
                </select>
                <br/>

                <label>Reimbursable?:</label>
                <input class="form-item input-item hover-styles" type="checkbox" name="reimbursable"/>
                <br/>

                <!-- <div class="form flex row">
                    <h2 class="form-item">Birth Year:</h2>
                    <span class='number-wrapper'>
                        <input id="year" class="form-item input-item" type="number" name="year" min="1945" max="2019" step="1" value="2019" />
                    </span>
                </div> -->
                <div class="form flex row">
                    <input class="form-item input-item hover-styles" type="submit" value="Submit" />
                    <input class="form-item input-item hover-styles" type="reset" value="Reset" />
                </div>
            </form>
        </div>
    </body>
</html>