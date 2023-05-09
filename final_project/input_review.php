<?php
    $employeeID = filter_input(INPUT_POST, 'employeeID');
    $amount = filter_input(INPUT_POST, 'amount');
    $date = filter_input(INPUT_POST, 'date');
    $description = filter_input(INPUT_POST, 'description');
    $category = filter_input(INPUT_POST, 'category');
    $paymentMethod = filter_input(INPUT_POST, 'paymentMethod');
    $reimbursable = filter_input(INPUT_POST, 'reimbursable');

    if($reimbursable == NULL) {
        $reimbursable = 0;
    }

    require_once("database.php");

    try {
        $queryEmployee = "SELECT * FROM expenses.employees WHERE employeeID = :employeeID";
        $statement1 = $db -> prepare($queryEmployee);
        $statement1 -> bindValue(":employeeID", $employeeID);
        $statement1 -> execute();
        $employee = $statement1 -> fetch();
        $employeeName = $employee["firstName"] . " " . $employee["lastName"];
        $statement1 -> closeCursor();

        // Add the expense to the database  
        $query = "INSERT INTO `expenses`.`expenses` (employeeID, amount, date, description, category, paymentMethod, reimbursable) VALUES (:employeeID, :amount, :date, :description, :category, :paymentMethod, :reimbursable)";
        $statement = $db -> prepare($query);
        $statement -> bindValue(":employeeID", $employeeID);
        $statement -> bindValue(":amount", $amount);
        $statement -> bindValue(":date", $date);
        $statement -> bindValue(":description", $description);
        $statement -> bindValue(":category", $category);
        $statement -> bindValue(":paymentMethod", $paymentMethod);
        $statement -> bindValue(":reimbursable", $reimbursable);
        $statement -> execute();
        $statement -> closeCursor();

        $date = new DateTimeImmutable($date);

        include('review_display.php');
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
    }
?>