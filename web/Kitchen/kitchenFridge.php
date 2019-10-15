<?php
require "dbConnect.php";
$db = get_db();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Kitchen Fridge</title>
  <link rel="stylesheet" type="text/css" href="kitchen.css">
</head>

<body>
<h1>What's in the Kitchen?<h1>
<div class="topnav">
  <a href="homepage.php">Homepage</a>
  <a class="active" href="kitchenFridge.php">Kitchen Fridge</a>
  <a href="communityFridge.php">Community Fridge</a>
  <a href="pantry.php">Pantry</a>
  <a href="storageCloset.php">Storage Closet</a>
</div> 

<h1>Kitchen Fridge</h1>
<p>The YSA 1st ward fridge. If locked, contact the food committee chairman.</p>

<?php
    $entity = "5";
    $stmt = $db->prepare('SELECT * FROM inventory JOIN item ON inventory.item_id=item.id 
                        JOIN username ON inventory.username_id=username.id 
                        JOIN types ON item.types_id=types.id 
                        JOIN entitylist ON inventory.entitylist_id=entitylist.id 
                        WHERE entitylist_id=:entitylist_id');
    $stmt->bindValue(':entitylist_id', $entity, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h2>" . $r["entity_description"] . "</h2>";
    echo "<table><th>Username</th><th>Item</th><th>Type</th><th>Expiration Date</th><th>Quantity</th><tr>";
    foreach ($rows as $r) {
        echo "<tr><td>" . $r['username_name'] . "</td><td>" . $r['item_name'] . "</td><td>" . $r['types_name'] . "</td><td>" . $r['expdate'] . "</td><td>" . $r['quantity'] . "</td></tr>";
    }

    echo "</table>";
    ?>
    </body>
    </html>