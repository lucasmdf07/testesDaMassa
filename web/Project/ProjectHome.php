<?php
   session_start();

   $signin;
   if(!isset($_SESSION['user'])){
      $signin = "SignIn";      
   }
   else
      $signin = "SignOut";
?>

<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
   <meta name="viewport" content="width=device-width, initial-scale1" />
   <link href="Project.css" rel="stylesheet">
   <script type="text/javascript" src="ProjectJS.js"></script>
</head>
<body>
   <div class="contain" id="container">
      <header>Family Recipes</header>
      <div class="menudiv" id="menu">
         <div id="item">
            <a href="ProjectHome.php">Home</a>
         </div>
         <div id="item">
            <a href="Project_1.php">Add Recipes</a>
         </div>
         <div id="item">
            <a href="Project_2.php?type=edit">Edit Recipes</a>
         </div>
         <div id="item">
            <a href="Project_2.php">Search Recipes</a>
         </div>
         <div id="item">
            <a id="signin" href="Project_User.php?user:in" value="SignIn"><?php echo $signin; ?></a>
         </div>
      </div>
      <div id="textdiv">
         Welcome to our recipe storage site.</br>  The purpose of the site is to give us a place where 
         we can store and share our favorite recipes.</br> Please create a user and enter any recipe you would like to share.
      </div>
   </div>
   <footer id="foot">
      
   </footer>
</body>
</html>