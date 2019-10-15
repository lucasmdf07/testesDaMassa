<!DOCTYPE html>
<html>
    <head>
        <title>Week05 Team Activity</title>
        <link rel="stylesheet" type="text/css" href="team05.css">
    </head>
    <body>
    <h1>Scripture Resources</h1>
    <?php
        try
            {
            $dbUrl = getenv('DATABASE_URL');

            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts["host"];
            $dbPort = $dbOpts["port"];
            $dbUser = $dbOpts["user"];
            $dbPassword = $dbOpts["pass"];
            $dbName = ltrim($dbOpts["path"],'/');

            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch (PDOException $ex)
            {
            echo 'Error!: ' . $ex->getMessage();
            die();
            }
    ?>
    <?php
    $book = $_POST['book'];
    $stmt = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r) {
        echo '<p><a href="display.php?scripture=' . $r['id'] . '">';
        echo $r['chapter'];
        echo ':' . $r['verse'];
        echo '</a></p>';
    }
    ?>
    </body>
    </html>