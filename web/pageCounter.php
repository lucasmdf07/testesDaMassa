<?php
session_start()

if (isset($_SESSION['visits'])) {
	$_SESSION['visits']++;
}
else {
	$_SESSION['visits'] = 0;
}

?>

<html>
	<head>
	<title>Visits counter</title>
	</head>
	
	<body>
		<p>Number of times visited: <?php echo $_SESSION ?></p>
	</body>
</html>