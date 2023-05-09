<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <div id="main-page" class="flex column">
            <a href="input.php"><button class="form-item input-item hover-styles">&larr; Back</button></a>
            <h1>Review Expense:</h1>

            <p><strong>Employee ID:</strong> <?php echo $employeeID ?></p>
            <p><strong>Employee Name:</strong> <?php echo $employeeName ?></p>
            <p><strong>Amount:</strong> <?php echo $amount ?></p>
            <p><strong>Date:</strong> <?php echo $date->format('m/d/Y') ?></p>
            <p><strong>Description:</strong> <?php echo $description ?></p>
            <p><strong>Category:</strong> <?php echo $category ?></p>
            <p><strong>Payment Method:</strong> <?php echo $paymentMethod ?></p>
            <p><strong>Reimbursable:</strong> <?php if($reimbursable == true) {echo "Yes";} else {echo "No";} ?></p>

            <a href="index.php"><button class="form-item input-item hover-styles">&larr; Start Over</button></a>

        </div>
    </body>
</html>