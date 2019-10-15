<?php
$conts['na'] = "North America";
$conts['sa'] = "South America";
$conts['eu'] = "Europe";
$conts['as'] = "Asia";
$conts['au'] = "Australia";
$conts['af'] = "Africa";
$conts['an'] = "Antarctica";
?>

<!doctype html>
<html>
    <head>
        <title>Group 3 Rocks!</title>
    </head>
    <body>
<?php
  $name     = htmlspecialchars($_POST['name']);
  $email    = htmlspecialchars($_POST['email']);
  $major    = htmlspecialchars($_POST['major']);
  $continents = $_POST['continents'];
  $comments = htmlspecialchars($_POST['comments']);
?>    
        
        <div>
            <h1>Hello <?php echo $name; ?>!</h1>
            
            <p>Your email: <?php echo $email; ?></p>
            
            <p>Your major: <?php echo $major; ?></p>
            
            <p>Continents that you have visited:<br>
            <?php foreach($continents as $c){ 
                echo htmlspecialchars($conts[$c]);
                echo "<br>";
            
             } ?>
            </p>
            
            <p>Your comments: <?php echo $comments; ?></p>
        </div>
    </body>
</html>