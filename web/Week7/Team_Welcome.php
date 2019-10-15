<?php
   session_start();

   require('DB_Connect.php');
   $db = connectToDB();
   echo "here";
   $signin;
   if(!isset($_SESSION['user'])){
      header("Location: Team_SignIn.php");     
   }
   else
      $signin = "SignOut";
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>Welcome</title>
   <link href="Team.css" rel="stylesheet">
   <script src="Team.js"></script>
</head>
<body id="userbody">   
   <header id="user">Welcome 
   <?php 
      if(isset($_SESSION['user']))
         echo $_SESSION['user']; 
      else
         header("Location: Team_SignIn.php"); 
   ?></header>
   <div id='userdiv'>
      <label><a href="Team_SignIn.php" value="SignIn" >Sign In</a></label>
   </div>
</body>
</html>