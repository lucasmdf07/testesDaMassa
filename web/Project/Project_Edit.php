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
   $id;
   $items;
   $db;
   try
   {

      $id = $_GET['id'];
      require('DB_Connect.php');
      $db = connectToDB();

      $selectString = "SELECT recipename as name, directions as directs FROM recipe where id = " . $id . ";";
      $rname = $db->query($selectString);
      $rname->execute();

      $search = "SELECT ri.id as rid, ri.ingredient as ingredient, ms.measurementsize as msize,";
      $search .= " mt.measurementname as mtype FROM recipeitems ri join measurementsize ";
      $search .= "ms on ri.measurementsize_id = ms.id join measurementtype mt on ";
      $search .= "ri.measurementtype_id = mt.id  where recipe_id = " . $id . ";";
      $items = $db->prepare($search);
      $items->execute();
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
   <title>Search Recipes</title>
   <link href="Project.css" rel="stylesheet">
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="ProjectJS.js"></script>
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
   </div>
   <header>Search Recipes</header>
   <div id='itemdiv'>
      <form id="searchforum" action="Project_Update.php" method="post">         
         <?php 
            $savedirect;
            $idrecitem;
            foreach($rname as $name)
            {
               echo "<input name='recipenam' size='35' type='text' value='" . $name[name] . "'>Recipe Name</br></br>"; 
               $savedirect = $name[directs];
            }
            $counter = 0;
            foreach($items as $item)
            {
               $sizes = $db->query("SELECT * FROM measurementsize;");
               $types = $db->query("SELECT * FROM measurementtype;");
    
               echo "<select name='size$counter' value='$item[id]' textcontent='$item[msize]'><option></option>";             
               foreach($sizes as $size){
                  if($size[measurementsize] == $item[msize])
                     echo "<option value='$size[id]' selected> $size[measurementsize]</option>";
                  else
                     echo "<option value='$size[id]'> $size[measurementsize]</option>";                     
               }
            
               echo "</select>Measurement Size";
               echo "<select name='type$counter' value='$item[rid]' textcontent='$item[mtype]'><option></option>";
             
               foreach($types as $type){
                  if($type[measurementname] == $item[mtype])
                     echo "<option value='$type[id]' selected> $type[measurementname]</option>";
                  else
                     echo "<option value='$type[id]'> $type[measurementname]</option>";
                     
               }
            
               echo "</select>Measurement Type";
               echo "<input name='ingred$counter' type='text' value='$item[ingredient]'>Ingredient</br></br>";
               echo "<input name='recitemid$counter' type='hidden' value='$item[rid]'>";

               $counter++;
            }
            echo "<textarea name='direct' rows='10' cols='50' >$savedirect</textarea></br></br>"; 
            echo "<input name='recid' type='hidden' value=$id>";
         ?>
         <input type="submit" value="Save Changes">
      </form>      
   </div>
</body>
</html>