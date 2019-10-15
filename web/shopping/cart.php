<?php
session_start();

require 'info.php';
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
            <main>
                <h2>Cart</h2>
                <div class="shop">
                <?php
                foreach($_SESSION['items'] as $item)
                {
                    echo '<form class="browse" action="remove.php" method="post">
                    <img src="' . $things[$item] . '"/>
            <input type="hidden" name="item" value="' . $item . '"><div class="thing">'  . $item . '</div><input type="submit" value="Remove"></form>';
                }
                ?>
                </div>
                <br><a id="cartCheck" href="/shopping/checkout.php">Checkout</a>

            </main>
        </div>
    </body>

</html>
