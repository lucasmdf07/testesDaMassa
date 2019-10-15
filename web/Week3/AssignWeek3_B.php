<?php
   session_start();

   if(isset($_POST['item'])){
      if($_POST['item'] == "pants")
         $_SESSION['pants'] = "Pants";      
      else if($_POST['item'] == "lssbutton")
         $_SESSION['lsshirt'] = "Long Sleeve T_Shirt";
      else if($_POST['item'] == "sssbutton")
         $_SESSION['sssbutton'] ="Short Sleeve T-Shirt";
      else if($_POST['item'] == "sockbutton")
         $_SESSION['sockbutton'] = "Socks";
      else if($_POST['item'] == "sweatbutton")
         $_SESSION['sweatbutton'] = "Sweater";
      else if($_POST['item'] == "sweatsbutton")
         $_SESSION['sweatsbutton'] = "Sweatshirt";
   }
   
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Browsing Page</title>
   <link href="AssignWeek3.css" rel="stylesheet">
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript" src="AssignWeek3_B.js"></script>
</head>
<body>
   <header>Clothing Sale</header>
   <div id="itemdiv">
      <h1>Pants</h1>
         <input id="sendP" name='pants' value='Add to Cart' type="button" onclick="buttonClick('pants')"/>         
   </div>
   <div id="itemdiv">
      <h1>Long sleeve t-shirts</h1>
         <input id="lsshirt" type="button" name="lssbutton" value="Add to Cart" onclick="buttonClick('lssbutton')"/>
   </div>
   <div id="itemdiv">
      <h1>Short sleeve t-shirts</h1>
      <input id="ssshirt" type="button" name="sssbutton" value="Add to Cart"  onclick="buttonClick('sssbutton')"/>
   </div>
   <div id="itemdiv">
      <h1>Socks</h1>
      <input id="socks" type="button" name="sockbutton" value="Add to Cart" onclick="buttonClick('sockbutton')"/>
   </div>
   <div id="itemdiv">
      <h1>Sweater</h1>
      <input id="sweater" type="button" name="sweatbutton" value="Add to Cart"  onclick="buttonClick('sweatbutton')"/>
   </div>
   <div id="itemdiv">
      <h1>Sweatshirt</h1>
      <input id="swshirt" type="button" name="sweatsbutton" value="Add to Cart"  onclick="buttonClick('sweatsbutton')"/>
   </div>
   <div id="itemdiv">      
      <a href="AssignWeek3_Cart.php"><input id="gocart" type="button" name="gocart" value="View Cart" /></a>
   </div>
</body>
</html>