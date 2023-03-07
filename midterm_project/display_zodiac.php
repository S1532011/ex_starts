<?php
    $year = filter_input(INPUT_POST, "year", FILTER_VALIDATE_INT);
    $zodiacList = ["monkey", "rooster", "dog", "pig", "rat", "ox", "tiger", "rabbit", "dragon", "snake", "horse", "goat"];
    $zodiac = $zodiacList[$year % 12];
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <div id="main-page" class="flex column">
            <h1>The Zodiac Animal for <?php echo $year ?> is: <?php echo $zodiac ?></h1>
        </div>
    </body>
</html>