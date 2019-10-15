<?php
include "items.php";
session_start();
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="top">
	<h1>Confirmation</h1>
</div>

<div class="nav">
	<?php include('navbar.php') ?>
</div>

<div class="bottom">
	<?php
	$listItems = $_SESSION["shoppingCart"];
	
	if (count($listItems) == 0) {
		echo "<div><p>No items were bought.</p></div>";
	}
	else {
		echo "<div><p> Items Total: " . count($listItems) . "</p></div>";
		
		foreach ($listItems as $keyNum=>$itemNum) { ?> 
			<div class='item'>
				<h2> <?php echo $items[$itemNum][0]; ?> </h2>
				<p> $<?php echo $items[$itemNum][2]; ?> </h2>
				<p>  <?php echo $items[$itemNum][1]; ?> </p>
			</div>
		<?php
		}
	}
	?>
	
	<div>
		<hr>
		<h2>Location Details</h2>
		<p>Address: <?php echo htmlspecialchars($_POST["address"]); ?> </p>
		<p>Zip Code: <?php echo htmlspecialchars($_POST["zip"]); ?> </p>
		<p>City: <?php echo htmlspecialchars($_POST["city"]); ?> </p>
		<p>State: <?php echo htmlspecialchars($_POST["state"]); ?> </p>
	</div>
	
	<br>
</div>
</body>
</html>

<?php
foreach ($listItems as $keyNum=>$itemNum) {
	unset($_SESSION["shoppingCart"][$keyNum]);
}
?>