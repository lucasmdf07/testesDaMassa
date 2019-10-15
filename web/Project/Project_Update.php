<?php
   require('DB_Connect.php');
   $db = connectToDB();
      
   $signin;
   if(!isset($_SESSION['user'])){
      $signin = "SignIn";      
   }
   else
      $signin = "SignOut";

   $count = count($_POST);
   $typeID = $_POST['type0'];
   $ingredID = $_POST['ingred0'];
   $direct = $_POST['direct'];
   $recID = $_POST['recid'];
   $count = ($count - 3) / 4;

   $stmt = "Update recipe set recipename = '" . $_POST['recipenam'] . "', directions = '" . $direct . "' where id = " . $recID . ";";
   $q = $db->prepare($stmt);
   $q->execute();

   $selectString = "Select id from recipe where recipename = '$_POST[recipenam]';";
   $qzs = $db->prepare($selectString);
   $qzs->execute();
   $recipeID;
   foreach($qzs as $qz)
     $recipeID = $qz[id];
   
   for($i = 0; $i < $count; $i++)
    {
      $tempsize = "size" . $i;
      $temptype = "type" . $i;
      $tempingred = "ingred" . $i;
      $temprecid = "recitemid" . $i;
      $ingredStmt = "Update recipeitems Set measurementsize_id = $_POST[$tempsize], ";
	   $ingredStmt .= "measurementtype_id = $_POST[$temptype], ingredient = '$_POST[$tempingred]' ";
      $ingredStmt .= "Where recipe_id = $recipeID and id = $_POST[$temprecid]; ";
      $updateStmt = $db->prepare($ingredStmt);
      $updateStmt->execute();
    }

    echo "<span>Recipe Saved </span>";
    header("Location: Project_2.php?updated=updated");

?>

