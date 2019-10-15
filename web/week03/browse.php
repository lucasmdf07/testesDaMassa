<?php
include "items.php";

$selected = array ();

session_start();

if (!isset($_SESSION["shoppingCart"])) {
	$_SESSION["shoppingCart"] = $selected;
}

if ( isset($_GET["itemID"]) ) { 
	if (!array_search($_GET["itemID"], $_SESSION["shoppingCart"])) {
		array_push($_SESSION["shoppingCart"], $_GET["itemID"]);
	}
}
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="top">
	<h1>Browse</h1>
</div>

<div class="nav">
	<?php include('navbar.php'); ?>
</div>

<div class="bottom">
	<?php
	foreach ($items as $key=>$item) { 
	?>
		<form method="post" action="browse.php?itemID=<?php echo $key; ?>"> 
			<div class="item">
				<h2> <?php echo $item[0]; ?> </h2>
				<p> $<?php echo $item[2]; ?> </h2>
				<p>  <?php echo $item[1]; ?> </p>
				<button type="submit" class="toCart">Add to cart</button>
			</div>
		</form>
	<?php
	}
	?>
	
	<br>
</div>
</body>
</html>