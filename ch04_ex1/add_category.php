<?php
    require_once("database.php");

    // Get the category data
    $name = filter_input(INPUT_POST, "name");

    // Validate inputs
    if ($name != null) {
        // Add the category to the database  
        $query = "INSERT INTO categories (categoryName) VALUES (:category_name)";
        $statement = $db->prepare($query);
        $statement->bindValue(":category_name", $name);
        $statement->execute();
        $statement->closeCursor();

        // Display the category list page
        include("category_list.php");
    } else {
        $error = "Invalid category data";
        include("error.php");
    }
?>