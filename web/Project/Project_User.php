<?php
   session_start();

   require('DB_Connect.php');
   $db = connectToDB();

   if(isset($_GET['already']))
      echo "<strong style='font-size:20px;'>User Already Exists!<strong>";
   if(isset($_GET['correct']))
      echo "<strong style='font-size:20px;'>Incorrect Password<strong>";
   try
   {
      $username;
      $password;
      $firstname;
      $lastname;
      if(isset($_SESSION['user']))
      {
         session_destroy();
         header("Location: ProjectHome.php");
      }

      if(isset($_POST['fname']))
      {
         $username = htmlspecialchars($_POST['uname']);
         $password = password_hash(htmlspecialchars($_POST['pname']), PASSWORD_DEFAULT);
         $firstname = htmlspecialchars($_POST['fname']);
         $lastname = htmlspecialchars($_POST['lname']);
         $queryStmt = "select username From user_table where username = :username";
         $queryStmt = $db->prepare($queryStmt);
         $queryStmt->bindValue(':username', $username);
         $queryStmt->execute();
         $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);

         if(count($results) > 0){
            header("Location: Project_User.php?already=true");
         }
         else
         {            
            $insertStmt ="Insert into user_table (username, firstname, lastname, password) values (:username, :first, :last, :password);";
            $insertIn = $db->prepare($insertStmt);
            $insertIn->bindValue(':username', $username);
            $insertIn->bindValue(':first', $firstname);
            $insertIn->bindValue(':last', $lastname);
            $insertIn->bindValue(':password', $password);
            $insertIn->execute();
         }
      
      }
   
      if(isset($_POST['user']))
      {
         $username = $_POST['user'];
         $password = $_POST['pass'];
         $queryStmt = "select username, password From user_table where username = :username;";
         $queryStmt = $db->prepare($queryStmt);
         $queryStmt->bindValue(':username', $username);
         $queryStmt->execute();
         $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);
      
         if(count($results) > 0)
         {
            if(password_verify($password, $results[0][password]))
            {
               $_SESSION['user'] = $username;
               header("Location: ProjectHome.php");         
            }
            else
               header("Location: Project_User.php?correct=no");         
               
         }   
         else
            header("Location: Project_create.html");
      
      }
   }
   catch (PDOException $ex)
   {
      echo 'Error!: ' . $ex->getMessage();
      die();
   }
?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta charset="utf-8" />
   <title>User Login</title>
   <link href="Project.css" rel="stylesheet">
   <script src="ProjectJS.js"></script>
</head>
<body id="userbody">   
   <header id="user">User Login</header>
   <div id='userdiv'>
      <form id="formid" action="Project_User.php" method="post">
         <input name="user" type="text" placeholder="username" required></br>
         <label>Username</label></br>
         <input name="pass" type="password" placeholder="password"  required></br>
         <label>Password</label></br>
         <label><a href="Project_create.html" value="Create User" >Create User</a></label>
         <input type="submit" value="SignIn">
      </form>
   </div>
</body>
</html>