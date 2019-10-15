<?php

   $db;
   $book = $_POST['book'];
   $chpt = $_POST['chpt'];
   $verse = $_POST['verse'];
   $content = $_POST['content'];


   require('DB_Connect.php');
   $db = connectToDB();
    /*$insertStmt = $db->exec("Insert into scriptures (book, chapter, verse, content) values ('" . $book . "', '" . $chpt . "', '" . $verse . "', '" .$content . "');");
   */
    $insertStmt ="Insert into scriptures (book, chapter, verse, content) values (:book, :chpt, :verse, :content);";
    $insertIn = $db->prepare($insertStmt);
    $insertIn->bindValue(':book',$book);
    $insertIn->bindValue(':chpt',$chpt);
    $insertIn->bindValue(':verse',$verse);
    $insertIn->bindValue(':content',$content);
    $insertIn->execute();

   $newId = $db->lastInsertId('scriptures_id_seq');

   if(isset($_POST['topic0'])){
      $topic = $_POST['topic0'];   
      $insertValue = 1;
      /*$inserttop = $db->exec("insert into scripture_topic_link (scripture_id, topics_id) values ( " . $newId . ", 1);");//*/
      $insertStmt1 = "insert into scripture_topic_link (scripture_id, topics_id) values ( :newId, :one);";
      $inserttop = $db->prepare($insertStmt1);
      $inserttop->bindValue(':newId', $newId);
      $inserttop->bindValue(':one', $insertValue);
      $inserttop->execute();
   }
   if(isset($_POST['topic1'])){
      $topic1 = $_POST['topic1'];
      /*$inserttop1 = $db->exec("insert into scripture_topic_link (scripture_id, topics_id) values ( '" . $newId . "', 2);");//*/
      $insertValue = 2;
      $insertStmt2 = "insert into scripture_topic_link (scripture_id, topics_id) values ( :newId, :one);";
      $inserttop1 = $db->prepare($insertStmt2);
      $inserttop1->bindValue(':newId', $newId);
      $inserttop1->bindValue(':one', $insertValue);
      $inserttop1->execute();
   }
   if(isset($_POST['topic2'])){
      $topic2 = $_POST['topic2'];
      /*$inserttop2 = $db->exec("insert into scripture_topic_link (scripture_id, topics_id) values ('" . $newId . "', 3);");//*/
      $insertValue = 3;
      $insertStmt3 = "insert into scripture_topic_link (scripture_id, topics_id) values ( :newId, :one);";
      $inserttop2 = $db->prepare($insertStmt3);
      $inserttop2->bindValue(':newId', $newId);
      $inserttop2->bindValue(':one', $insertValue);
      $inserttop2->execute();
   }

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Scriptures Displayed</title>
</head>
<body>
   
      <?php
         $count = 0;
         foreach($db->query('SELECT * FROM scriptures;') as $row){
            echo $row['book'] . " " . $row['chapter'] . " " . $row['verse'] . " ";
            foreach($db->query("SELECT t.name from topics t join scripture_topic_link stl on t.id = stl.topics_id where stl.scripture_id = '" . $row['id'] . "';") as $row1){
               echo $row1['name'] . " ";
               }
               echo "</br>";
         }
         echo "</br>";
         /**/
      ?>
      
</body>
</html>