<?php
    require_once("database.php");

    // Get ids
    $category_id = filter_input(INPUT_POST, "category_id", FILTER_VALIDATE_INT);

    // Validate inputs
    if ($category_id != null || $category_id != false) {
        // Delete category from the database  
        $query = "DELETE FROM categories WHERE categoryID = :category_id";
        $statement = $db->prepare($query);
        $statement->bindValue(":category_id", $category_id);
        $statement->execute();
        $statement->closeCursor();

        // Display the category list page
        include("category_list.php");
    } else {
        $error = "Invalid category ID";
        include("error.php");
    }
?>