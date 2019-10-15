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
                <h2><?php echo $_POST["item"]?></h2>
                <img class="itemImage" src="<?php echo $_POST["pic"]?>">
                <form action="set.php" method="post">
                    <input type="hidden" name="item" value="<?php echo $_POST["item"]?>">
                    <input id="checkoutBtn" type="submit" value="Add"></form>
            </main>
        </div>
    </body>

</html>
