<?php
include "items.php";
session_start();

if ( isset($_GET["itemID"]) ) { 
	unset($_SESSION["shoppingCart"][$_GET["itemID"]]);
}
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="top">
	<h1>Cart</h1>
</div>

<div class="nav">
	<?php include('navbar.php') ?>
</div>

<div class="bottom">
	<?php
	$listItems = $_SESSION["shoppingCart"];
	
	if (count($listItems) == 0) {
		echo "<div><p>No items in the cart.</p></div>";
	}
	else {
		echo "<div><p> Items Total: " . count($listItems) . "</p></div>";
		
		foreach ($listItems as $keyNum=>$itemNum) { ?> 
			<form method="post" action="cart.php?itemID=<?php echo $keyNum; ?>">
				<div class='item'>
					<h2> <?php echo $items[$itemNum][0]; ?> </h2>
					<p> $<?php echo $items[$itemNum][2]; ?> </h2>
					<p>  <?php echo $items[$itemNum][1]; ?> </p>
					<button type="submit" class="fromCart">Remove from cart</button>
				</div>
			</form>
		<?php
		}
	}
	?>
	
	<div>
	<hr>
	<form method="post" action="checkout.php">
		<button type="submit">Proceed to checkout</button>
	</form>
	</div>
	
	<br>
</div>

</body>
</html>