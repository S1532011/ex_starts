<?php
    require("database.php");

    $productID = filter_input(INPUT_POST, "productID", FILTER_VALIDATE_INT);
    $categoryID = filter_input(INPUT_POST, "categoryID", FILTER_VALIDATE_INT);
    $productCode = filter_input(INPUT_POST, "productCode");
    $productName = filter_input(INPUT_POST, "productName");
    $listPrice = filter_input(INPUT_POST, "listPrice", FILTER_VALIDATE_FLOAT);

    if ($categoryID == FALSE || $categoryID == NULL || $productID == FALSE || $productID == NULL || $productCode == NULL || $productName == NULL || $listPrice == FALSE || $listPrice == NULL) {
            $error = "Problem with the submitted data";
            include("error.php");
            die();
    }

    $query = "SELECT * FROM categories ORDER BY categoryID";
    $statement = $db -> prepare($query);
    $statement -> execute();
    $categories = $statement -> fetchAll();
    $statement -> closeCursor();
?>

<!DOCTYPE html>
<html>

    <!-- the head section -->
    <head>
        <title>My Guitar Shop</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <!-- the body section -->
    <body>
        <header><h1>Product Manager</h1></header>

        <main>
            <h1>Edit Product</h1>
            <form action="edit_product.php" method="post"
                id="edit_product_form">

                <label>Category:</label>
                <select name="category_id">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category["categoryID"];?>" <?php if($category["categoryID"] == $categoryID) { echo "selected";} ?>>
                            <?php echo $category["categoryName"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label>Code:</label>
                <input type="text" name="code" value="<?php echo $productCode?>">
                <br>

                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $productName?>">
                <br>

                <label>List Price:</label>
                <input type="text" name="price" value="<?php echo $listPrice?>">
                <br>

                <input type="hidden" name="ID" value="<?php echo $productID?>">

                <label>&nbsp;</label>
                <input type="submit" value="Update Product">
                <br>
            </form>
            <p><a href="index.php">View Product List</a></p>
        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
        </footer>
    </body>
</html>