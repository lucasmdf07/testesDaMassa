<?php
   session_start();
 
   $street = htmlspecialchars($_POST['street']);
   $city = htmlspecialchars($_POST['city']);
   $state = htmlspecialchars($_POST['state']);
   $zip = htmlspecialchars($_POST['zip']);
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Confirmation</title>
   <link href="AssignWeek3.css" rel="stylesheet">
   <script src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Confirmation</header>
   <div id="itemdiv">
      <?php
         echo "$street <br/>";
         echo "$city, "  . "$state " . "$zip <br/>";
      ?>
   </div
   <div id="itemdiv">
      <?php
         foreach($_SESSION as $name => $value)
         {
            echo "<div id='cartitem' ><p>$value</p></div>";
         }
      ?>
   </div>
   
</body>
</html>