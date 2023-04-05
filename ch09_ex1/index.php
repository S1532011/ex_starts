<?php
//set default values
$name = "";
$email = "";
$phone = "";
$message = "";

//process
$action = filter_input(INPUT_POST, 'action');

switch ($action) {
    case 'process_data':
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $phone = filter_input(INPUT_POST, 'phone');

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        // 2. display the name with only the first letter capitalized
        
        if($name == "") {
            $message = "Please enter a name.";
        } else

        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        // 2. make sure the email address has at least one @ sign and one dot character
        if($email == "") {
            $message = "Please enter an email.";
        } else if(!preg_match("/.+@.+\..+/", $email)) {
            $message = "Please enter a 'VALID' email.";
        } else

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
        // 2. format the phone number like this 123-4567 or this 123-456-7890
        if($phone == "") {
            $message = "Please enter a phone number.";
        } else if(!preg_match('/[0-9]{7,}+$/', preg_replace("/[^0-9]/", "", $phone))) {
            $message = "Please enter a 'VALID' phone number.";
        }

        /*************************************************
         * Display the validation message
         ************************************************/
        if($message == "") {
            $message = "Hello " . strtok($name, " ") . ",\n\nThank you for entering this data:\n\n";
            $name_message = "Name: " . $name . "\n";
            $email_message = "Email: " . $email . "\n";
            $phone_message = "Phone: " . $phone;
            $message = $message . $name_message . $email_message . $phone_message;
        }
        // $message = "This page is under construction.\n" .
        //            "Please write the code that processes the data.";

        break;
}
include 'string_tester.php';
?>