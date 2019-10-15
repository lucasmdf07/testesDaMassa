<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Shopping Page</title>
   <link href="AssignWeek3.css" rel="stylesheet">
   <script src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Checkout</header>
   <div id='itemdiv'>
      <form action="AssignWeek3_Confirm.php" method="post">
         <p></p></br>
         <input name="street" type="text" required>Street Address</br></br>
         <input name="city" type="text" required>City</br></br>
         <input name="state" type="text" required>State</br></br>
         <input name="zip" type="text" required>Zip</br></br>
         <p><a href="AssignWeek3_Cart.php">Return to Cart</a></p>
         <input type="submit" value="Submit">
      </form>
   </div>
</body>
</html>