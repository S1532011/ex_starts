<?php
    $date1 = filter_input(INPUT_POST, 'date1');
    $date2 = filter_input(INPUT_POST, 'date2');
    $detailed = filter_input(INPUT_POST, 'detailed');

    include_once('database.php');

    try {
        $query = "SELECT concat(em.firstName, ' ', em.lastName) AS fullName, sum(ex.amount) AS amount FROM expenses.expenses AS ex INNER JOIN expenses.employees AS em ON ex.employeeID = em.employeeID WHERE ex.date >= DATE(:date1) and ex.date <= DATE(:date2) group by em.employeeID";
        if($detailed == true) {
            $query = "SELECT concat(em.firstName, ' ', em.lastName) AS fullName, ex.amount, ex.date, ex.description, ex.category, ex.paymentMethod, ex.reimbursable FROM expenses.expenses AS ex INNER JOIN expenses.employees AS em ON ex.employeeID = em.employeeID WHERE ex.date >= DATE(:date1) and ex.date <= DATE(:date2)";
        }
        $statement2 = $db -> prepare($query);
        $statement2 -> bindValue(":date1", $date1);
        $statement2 -> bindValue(":date2", $date2);
        $statement2 -> execute();
        $expenses = $statement2 -> fetchAll();
        $statement2 -> closeCursor();

        include('expenses_display.php');
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
    }
?>