<?php
// Start the Session
session_start();

if (isset($_POST['Submit'])) {
    $_SESSION["cart"] = $_POST["cart"];
}


?>
<DOCTYPE! html>
<html>
    <head>
        <title>Comics R Us</title>
        <header>Comics R Us</header>
        <link rel="stylesheet" type="text/css" href="shopping.css">
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="browse.php">Home</a>
            <a href="cart.php">Shopping Cart</a>
            <a href="checkout.php">Checkout</a>
        </div> 
        <form action="browse.php" method="post">
            <h1>Select Your Comics!!</h1>
            <div class="column">
                <div class="row">
                    <img src="/W03/comics/comic_1.jpg" alt="Spider Geddon" class="comicImages">
                    <input type="checkbox" name="cart[0]" value="Spider Geddon">
                    Spider Geddon #1
                </div>
                <div class="row">
                    <img src="/W03/comics/comic_2.jpg" alt="Incredible Hulk #1" class="comicImages">
                    <input type="checkbox" name="cart[1]" value="Incredible Hulk #1">
                    The Incredible Hulk #1
                </div>
                <div class="row">
                    <img src="/W03/comics/comic_3.jpg" alt="Incredible Hulk #3" class="comicImages">
                    <input type="checkbox" name="cart[2]" value="Incredible Hulk #3">
                    The Incredible Hulk #3
                </div>
                <div class="row">
                    <img src="/W03/comics/comic_4.jpg" alt="Captain America" class="comicImages">
                    <input type="checkbox" name="cart[3]" value="Captain America">
                    Captain America #1
                </div>
                <div class="row">
                    <img src="/W03/comics/comic_5.jpg" alt="Iron-Man" class="comicImages">
                    <input type="checkbox" name="cart[4]" value="Iron-Man">
                    The Invincible Iron-Man #51
                </div>
                <div class="row">
                    <img src="/W03/comics/comic_6.jpg" alt="Warlock" class="comicImages">
                    <input type="checkbox" name="cart[5]" value="Warlock">
                    Warlock and the Infinity Watch
                </div>
            </div>
            <input type="submit" name="Submit" value="Add to Cart" />
        </form>
    </body>
</html>