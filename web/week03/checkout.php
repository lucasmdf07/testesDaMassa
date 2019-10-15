<?php
session_start();
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
</head>

<body>
<div class="top">
	<h1>Checkout</h1>
</div>

<div class="nav">
	<?php include('navbar.php') ?>
</div>

<div class="bottom">
	<div>
	<form method="post" action="confirm.php">
		<p>Street Address: <input type="text" name="address"><br><br>
		Zip Code: <input type="text" name="zip"><br><br>
		City: <input type="text" name="city"><br><br>
		State: <input type="text" name="state"><br></p>
		<button type="submit">Complete Purchase</button>
	</form>
	</div>
	
	<br>
</div>
</body>
</html>