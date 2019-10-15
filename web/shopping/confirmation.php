<?php
session_start();
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$first = filter_input(INPUT_POST, 'lineOne', FILTER_SANITIZE_SPECIAL_CHARS);
$second = filter_input(INPUT_POST, 'lineTwo', FILTER_SANITIZE_SPECIAL_CHARS);
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
$state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS);
$zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_SPECIAL_CHARS);

?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Shopping</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="shopping.css">
    </head>

    <body>
        <div>
            <?php include 'header.php';?>
            <main id="confirm">
                <h2>Thanks for Shopping</h2>
                <p>You bought:</p>
                <ul>
                    <?php
                    foreach($_SESSION['items'] as $item)
                    {
                        echo '<li>' . $item.'</li>';
                    }
                    ?>
                </ul>

                <h2>It will be shipped to:</h2>
                <p>
                <?php
                    echo $name . "<br>";
                    echo $first . "<br>";
                    if($second != "")
                    {
                        echo $second . "<br/>";
                    }
                    echo $city . ", ";
                    echo $state . "<br>";
                    echo $zip . "<br>";
                    ?>

                </p>
            </main>
        </div>
    </body>

</html>
