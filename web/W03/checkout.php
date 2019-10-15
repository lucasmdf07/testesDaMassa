<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Comics R Us</title>
        <header>Comics R Us</header>
        <link rel="stylesheet" type="text/css" href="shopping.css">
    </head>
    <body>
        <div class="topnav">
            <a href="browse.php">Home</a>
            <a href="cart.php">Shopping Cart</a>
            <a class="active" href="checkout.php">Checkout</a>
        </div> 
        <form action="confirmation.php" method="post">
            <h1>Please Enter your address below</h1>
            <div class="checkout">
                Street: <input type="text" name="street"></br></br>
                City: <input type="text" name="city"></br></br>
                State: <input type="text" name="state"></br></br>
                Postal Code: <input type="text" name="zip"></br></br>
            </div>
            <input type="submit" name="Purchase" value="Complete Purchase" />
        </form>
    </body>
</html>