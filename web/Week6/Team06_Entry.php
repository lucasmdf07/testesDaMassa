<?php

   require('DB_Connect.php');
   $db = connectToDB();

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ScriptureEntry</title>
</head>
<body>
   <form method="post" action="Team06_Display.php">
      <input name="book" type="text" required />Book</br></br>
      <input name="chpt" type="text" required />Chapter</br></br>
      <input name="verse" type="text" required />Verse</br></br>
      <textarea name="content" type="text" required>Content</textarea></br></br>
      <?php
         $count = 0;
         foreach($db->query('SELECT * FROM topics order by id;') as $row){
            echo "<input type='checkbox' name='topic" . $count . "' >" . $row['name'] . "</br></br>";
            $count++;
         }
         
      ?>
      <button type="submit" value="Submit">Submit</button>
   </form>
</body>
</html>