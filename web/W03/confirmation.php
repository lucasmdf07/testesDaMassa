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
        <?php
        $street = test_input($_POST["street"]);
        $city = test_input($_POST["city"]);
        $state = test_input($_POST["state"]);
        $zip = test_input($_POST["zip"]);

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <h1>Thank you for your purchase, your items will be shipped to the following address</h1>
        <h1><?php echo $street . "<br>" . $city . ", " . $state . " " . $zip ?></h1>
            <div class="column">
                <?php
                if (isset($_SESSION["cart"])) {
                    echo "</br>";
                    foreach ($_SESSION['cart'] as $value)
                    // Check for which items are in the array, if it's there dsiplay picture and option to delete item.
                    if ($value == "Spider Geddon") {
                        echo "<div class='row'>
                        <img src='/W03/comics/comic_1.jpg' alt='Spider Geddon' class='comicImages'>Spider Geddon #1
                        </div>";
                    } else if($value == "Incredible Hulk #1") {
                        echo "<div class='row'>
                        <img src='/W03/comics/comic_2.jpg' alt='Incredible Hulk #1' class='comicImages'>The Incredible Hulk #1
                        </div>";
                    } else if($value == "Incredible Hulk #3") {
                        echo "<div class='row'>
                        <img src='/W03/comics/comic_3.jpg' alt='Incredible Hulk #2' class='comicImages'>The Incredible Hulk #3
                        </div>";
                    } else if($value == "Captain America") {
                        echo "<div class='row'>
                        <img src='/W03/comics/comic_4.jpg' alt='Captain America' class='comicImages'>Captain America #1
                        </div>";
                    } else if($value == "Iron-Man") {
                        echo "<div class='row'>
                        <img src='/W03/comics/comic_5.jpg' alt='Iron-Man' class='comicImages'>The Invincible Iron-Man #51
                        </div>";
                    } else if($value == "Warlock") {
                        echo "<div class='row'>
                        <img src='/W03/comics/comic_6.jpg' alt='Warlock' class='comicImages'>Warlock and the Infinity Watch #1
                        </div>";
                    }
                }
                ?>
            </div>
    </body>
</html>
