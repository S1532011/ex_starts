<?php
    // Include cart functions
    require_once('cart.php');
    // get the data from the form
    $subtotal = filter_input(INPUT_POST, 'subtotal');
    $interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_INT);
    $years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

    $subtotal = (float)str_replace(',', '', $subtotal);

    // calculate the future value
    $future_value = Maenle\future_value($subtotal, $interest_rate, $years);

    // apply currency and percent formatting
    $subtotal_f = Maenle\format_currency($subtotal);
    $yearly_rate_f = Maenle\format_percent($interest_rate);
    $future_value_f = Maenle\format_currency($future_value);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header>
        <h1>My Guitar Shop</h1>
    </header>
    <main>
        <h1>Future Value Calculator</h1>

        <b>Subtotal:</b>
        <span><?php echo $subtotal_f; ?></span><br>

        <b>Yearly Interest Rate:</b>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <b>Number of Years:</b>
        <span><?php echo $years; ?></span><br>

        <b>Future Value:</b>
        <span><?php echo $future_value_f; ?></span><br>
    </main>
    <p><a href=".?action=show_cart">View Cart</a></p>
</body>
</html>