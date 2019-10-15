<?php
session_start();
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
                <h2>Checkout</h2>

                <form action="confirmation.php" method="post">
                    Name:
                    <input type="text" name="name"><br/>
                    Line one:
                    <input type="text" name="lineOne"><br/>
                    Line two:
                    <input type="text" name="lineTwo"><br/>
                    City:
                    <input type="text" name="city"><br/>
                    State:
                    <input type="text" name="state"><br/>
                    Zip Code:
                    <input type="text" name="zip"><br/>
                    <input id="checkoutBtn" type="submit" value="Checkout">
                </form>
            </main>
        </div>
    </body>

</html>
