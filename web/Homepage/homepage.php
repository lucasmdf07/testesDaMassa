<!DOCTYPE html>
<html>
    <head>
        <title>Kadous Homepage</title>
        <link rel="stylesheet" type="text/css" href="homepage.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="homepage.js"></script>
    </head>
    <body>
        <h1 class="Center">CS313 Kadous Homepage</h1>
        <!-- Using PHP, display the day of the week and the date -->
        <?php
        echo "<h3 class='Center'>Todays date is " .date("l ") . date("F d, Y") . "</h3>";
        ?>
        <!-- Button to Assignments page -->
        <div class="Center">
                <a href="assignments.html"><button>Assignments page</button></a>
        </div>
        <h2 class="Center">Introduction</h1>
        <p class="Center">Hi my name is Kyle Kadous and I am so excited to learn about server side web design this semester!<br>
            Being a big entertainment junkie, I have a lot of favorite movies, shows, and superheroes.<br>
            My top 2 favorite shows are The Simpsons and The X-Files.<br>
            My favorite comic group is Marvel, both MCU and comics.
        </p> 
        <h3 class="Center">My favorite superheroes are</h3>
        <!-- Display 3 Names on the same line -->
        <p class="supers">
            <span id="spidey">Spider-Man</span>
            <span id="ironman">Iron-Man</span>
            <span id="ff">The Fantastic Four</span>
        </p>
        <!-- Display 3 pictures along the same line -->
        <p class="supers">
                <span id="spidey">
                    <img src="/Homepage/homepageImages/spidey145.jpg" class="superImages" id="spideyImage">
                </span>
                <span id="ironman">
                    <img src="/Homepage/homepageImages/ironman25.jpg" class="superImages" id="ironmanImage">
                </span>
                <span id="ff">
                    <img src="/Homepage/homepageImages/FF52.jpg" class="superImages" id="ffImage">
                </span>
        </p>
    </body>
</html>
