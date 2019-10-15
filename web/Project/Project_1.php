
<?php

   session_start();
   $signin;
   if(!isset($_SESSION['user'])){
      $signin = "SignIn";      
   }
   else
      $signin = "SignOut";

   if(!isset($_SESSION['user'])){
      header("Location: Project_User.php");
      die();
   }

   require('DB_Connect.php');
   $db = connectToDB();

   if(isset($_POST['amount0']))
   {
      $name = $_POST['recipename'];
      $count = $_POST['count'];
      $recipen = $_POST['recipename'];
      $direct = $_POST['direct'];
      $recfood = $_POST['food'];
      $reccat = $_POST['mealcat'];
      $username = $_SESSION['user'];

      $queryStmt = "select id From user_table where username = :username;";
      $queryStmt = $db->prepare($queryStmt);
      $queryStmt->bindValue(':username', $username);
      $queryStmt->execute();
      $results = $queryStmt->fetchAll(PDO::FETCH_ASSOC);

      $insertString = "Insert Into Recipe (recipename, Directions, FoodType_ID,";
      $insertString .= " mealcategory_id, user_id) Values (:recipename, :directions, :foodtype_id,";
      $insertString .= " :mealcategory_id, :user_id)";
      $insertUserID = $db->prepare($insertString);
      $insertUserID->bindValue(':recipename', $recipen);
      $insertUserID->bindValue(':directions', $direct);
      $insertUserID->bindValue(':mealcategory_id', $reccat);
      $insertUserID->bindValue(':foodtype_id', $recfood);
      $insertUserID->bindValue(':user_id', $results[0][id]);
      $insertUserID->execute();

      $lastID = $db->lastInsertId();
         
      for($i = 0; $i != ($count + 1); $i++)
      {
         $msize = $_POST['amount' . $i];
         $mtype = $_POST['meastype' . $i];
         $ingredient = $_POST['ingredient' . $i];
         $insertString = "Insert Into recipeitems (measurementsize_id, measurementtype_id, ingredient, recipe_id) Values (:amounts, :typem, :ingre, :last)";
         $insertUserID = $db->prepare($insertString);
         $insertUserID->bindValue(':amounts', $msize);
         $insertUserID->bindValue(':typem', $mtype);
         $insertUserID->bindValue(':ingre', $ingredient);
         $insertUserID->bindValue(':last', $lastID);
         $insertUserID->execute();
         
      }
   }
   $foodtype;
   $meals;
   try
   {
      $qString = "SELECT * FROM measurementsize;";
      $sizes = $db->prepare($qString);
      $sizes->execute();
      $qString = "SELECT * FROM measurementtype;";
      $types = $db->prepare($qString);
      $types->execute();
      $qString = "SELECT * FROM foodtype;";
      $foodtypes = $db->prepare($qString);
      $foodtypes->execute();
      $qString = "SELECT * FROM mealcategory;";
      $meals = $db->prepare($qString);
      $meals->execute();/**/
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
   <title>Add a Recipe</title>
   <link href="Project.css" rel="stylesheet">
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="ProjectJS.js"></script>
</head>
<body >   
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
   </div>
   <header>Add a Recipe</header>
   <div id='itemdiv'>
      <form id="formid" action="Project_1.php" method="post">
         <p>
         <?php
         if(isset($_POST['amount0']))
         {
            echo 'Recipe successfully saved!';
         }
         ?>
         </p></br>
            <input name="recipename" type="text" required>Recipe Name</br></br>
            <select id="food" name="food"  required>
               <? 
               foreach($foodtypes as $food){
                  echo "<option value=$food[id]> $food[typename]</option>";
               }
               ?>
            </select>Food Type
            <select id="mealcat" name="mealcat"  required>
               <? 
               foreach($meals as $meal){
                  echo "<option value=$meal[id]> $meal[categoryname]</option>";
               }
               ?>
            </select>Meal Category</br></br>
            
         <div id="ingred">
            <select id="amount0" name="amount0"  required>
               <? 
               foreach($sizes as $size){
               echo "<option value=$size[id]> $size[measurementsize]</option>";
               }
               ?>
            </select>Amount
            <select id="meastype0" name="meastype0" required>
               <? 
                  foreach($types as $type){
                  echo "<option value=$type[id]> $type[measurementname]</option>";
                  }
               ?>
            </select>Measurement Type
            <input id="ingredient0" name="ingredient0" type="text" required>Ingredient</br></br>
         </div>
         <input name="add" type="button" value="Add another Ingredient" onclick="addItem()"></br></br>
         <textarea id="direct" name="direct" rows="4" cols="50" required>Enter directions here....</textarea></br></br>
         <input id="count" name="count" type="hidden" value="0">
         <input type="submit" value="Submit">
      </form>
   </div>
</body>
</html>