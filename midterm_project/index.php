<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <div id="main-page"class="flex column">
            <form action="display_zodiac.php" method="post">
                <div id="zodiac-form" class="flex row">
                    <h2 class="form-item">Birth Year:</h2>
                    <span class='number-wrapper'>
                        <input class="form-item input-item" type="number" name="year" min="1945" max="2019" step="1" value="2019" />
                    </span>
                </div>
                <input class="form-item input-item" type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>