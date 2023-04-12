<?php
//set default value
$message = '';

//get value from POST array
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

//process
switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        $format = "n/j/Y";

        $invoice_date = DateTime::createFromFormat($format, $invoice_date_s);
        $due_date = DateTime::createFromFormat($format, $due_date_s);

        // make sure the user enters both dates
        if($invoice_date_s === "") {
            $message = "Please enter an invoice date";
        } else if(!($invoice_date && $invoice_date -> format($format) === $invoice_date_s)) {
            $message = "Please enter a valid invoice date (mm/dd/yyyy)";
        } else if($due_date_s === "") {
            $message = "Please enter a due date";
        } else if(!($due_date && $due_date -> format($format) === $due_date_s)) {
            $message = "Please enter a valid due date (mm/dd/yyyy)";
        } else {
            // convert date strings to DateTime objects
            // and use a try/catch to make sure the dates are valid

            // make sure the due date is after the invoice date

            // format both dates
            $invoice_date_f = $invoice_date_s;
            $due_date_f = $due_date_s;
            
            // get the current date and time and format it
            $current_date = new DateTime();
            $current_date_f = $current_date->format("n/j/Y");
            $current_time_f = $current_date->format("h:i:s a");
            
            // get the amount of time between the current date and the due date
            // and format the due date message
            if($due_date > $current_date) {
                $diff_date = $due_date->diff($current_date);
                $years = $diff_date->y;
                $months = $diff_date->m;
                $days = $diff_date->d;
                $due_date_message = "This invoice is due in " . $years . " years, " . $months . " months, and " . $days . " days.";
            } else {
                $diff_date = $current_date->diff($due_date);
                $years = $diff_date->y;
                $months = $diff_date->m;
                $days = $diff_date->d;
                $due_date_message = "This invoice is " . $years . " years, " . $months . " months, and " . $days . " days overdue.";
            }
        }

        break;
}
include 'date_tester.php';
?>