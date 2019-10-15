<?php
   session_start();
 
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Shopping Cart</title>
   <link href="AssignWeek3.css" rel="stylesheet">
   <script src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Shopping Cart</header>
   <?php
      foreach($_SESSION as $name => $value)
      {
         echo "<div id='cartitem' ><p>$value</p></div>";
      }
   ?>
   <div id='cartitem'>
      <p><a href="http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_Check.php"</a>Continue Shopping</p>
      <input type="button" value="Proceed to Checkout">
   </div>
</body>
</html>