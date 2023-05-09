<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <div id="main-page" class="flex column">
        <a href="index.php"><button class="form-item input-item hover-styles">&larr; Back</button></a>
        <h3>Expenses between
            <?php echo $date1; ?> and
            <?php echo $date2; ?>:
        </h3>
        <table border=1>
            <tr>
                <th>Employee Name</th>
                <th>Amount</th>
                <?php
                    if($detailed == true) {
                        echo
                        "<th>Date</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Payment Method</th>
                        <th>Reimbursable</th>";
                    }
                ?>
            </tr>
            <?php
            foreach ($expenses as $expense) {
                $htmlCode = "<tr>
                    <td>" . $expense["fullName"] . "</td>
                    <td>" . $expense["amount"] . "</td>";
                if($detailed == true) {
                    $htmlCode .= "<td>" . $expense["date"] . "</td>
                        <td>" . $expense["description"] . "</td>
                        <td>" . $expense["category"] . "</td>
                        <td>" . $expense["paymentMethod"] . "</td>
                        <td>" . $expense["reimbursable"] . "</td>";
                }
                $htmlCode .="</tr>";
                echo $htmlCode;
            }
            ?>
    </div>
    </div>
</body>

</html>