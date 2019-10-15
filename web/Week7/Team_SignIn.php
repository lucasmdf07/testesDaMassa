<?php
   session_start();

   require('DB_Connect.php');
   $db = connectToDB();

   if(isset($_GET['already']))
   {
      unset($_GET['already']);
      echo "This user already exists.";
   }
   try
   {
      $username;
      $password;
      if(isset($_POST['uname']))
      {
         $username = htmlspecialchars($_POST['uname']);
         $password = password_hash($_POST['pname'], PASSWORD_DEFAULT);
         $queryStmt = "select username From usersignin_table where username = :username";
         $queryStmt = $db->prepare($queryStmt);
         $queryStmt->bindValue(':username', $username);
         $queryStmt->execute();
         $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);

         if(count($results) > 0){
            header("Location: Team_SignIn.php?already=true");
         }
         else
         {            
            $insertStmt ="Insert into usersignin_table (username, password) values (:username, :password);";
            $insertIn = $db->prepare($insertStmt);
            $insertIn->bindValue(':username', $username);
            $insertIn->bindValue(':password', $password);
            $insertIn->execute();
         }
         unset($_POST['uname']);
      
      }
   
      if(isset($_POST['user']))
      {
         $username = $_POST['user'];
         $password = $_POST['pass'];
         $queryStmt = "select username, password From usersignin_table where username = :username";
         $queryStmt = $db->prepare($queryStmt);
         $queryStmt->bindValue(':username', $username);
         $queryStmt->execute();
         $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);
      
         if(count($results) > 0)
         {
            if(password_verify($password, $results[0][password]) )
              {
                  
                  $_SESSION['user'] = $username;
                  header("Location: Team_Welcome.php"); 
              }
              else
                  echo "The password was incorrect!";
         }   
         else
            header("Location: Team_SignUp.php");
         //unset($_POST['user']);
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
      <form id="formid" action="Team_SignIn.php" method="post">
         <input name="user" type="text" placeholder="username" required></br>
         <label>Username</label></br>
         <input name="pass" type="password" placeholder="password"  required></br>
         <label>Password</label></br>
         <label><a href="Team_SignUp.php" value="Create User" >Create User</a></label>
         <input type="submit" value="SignIn">
      </form>
   </div>
</body>
</html>