<html>
<head>
<title>Teach 06</title>
</head>

<body>
<h1>Scriptures</h1>
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
	
	$book = $_POST["book"];
	$chapter = $_POST["chapter"];
	$verse = $_POST["verse"];
	$content = $_POST["content"];
	$topic = $_POST["topic"];
	
	$queryStuff = "INSERT INTO scripture (book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content)";
	$stmt = $db->prepare($queryStuff);
	$stmt->bindValue(':book', $book, PDO::PARAM_STR);
	$stmt->bindValue(':chapter', $chapter, PDO::PARAM_STR);
	$stmt->bindValue(':verse', $verse, PDO::PARAM_STR);
	$stmt->bindValue(':content', $content, PDO::PARAM_STR);
	$stmt->execute();
	$db->query($stmt);
	//$scripture_id = $pdo->lastInsertId('scripture_id_seq');
	$topic_id = $_POST["topic"];
	
	//$db->query("INSERT INTO topic_scripture (scripture_id, topic_id) VALUES ($scripture_id, $topic_id)");
	
	foreach ($db->query("SELECT * FROM topic") as $row) {
		echo "<h2>" . $row["name"] . "</h2>";
		
	}
	?>
</body>
</html>