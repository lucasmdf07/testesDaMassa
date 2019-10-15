<html>
<head>
<title>Teach 06</title>
</head>

<body>
<h1>Teach 06</h1>
<form action="displayScripture.php" method="post">
	Book <input type="text" name="book"><br>
	Chapter <input type="text" name="chapter"><br>
	Verse <input type="text" name="verse"><br>
	Content <input type="textarea" name="content"><br>
	
	<?php
	$dbUrl = getenv('DATABASE_URL');

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	foreach ($db->query("SELECT * FROM topic") as $row) {
		echo $row["name"] . "<input name='topic[]' type='checkbox' value=" . $row["id"] . "><br>";
	}
	?>
	
	<button type="submit">Submit</button>
</form>
</body>
</html>