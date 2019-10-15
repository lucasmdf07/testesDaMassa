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
    $scriptureid = $_GET['scripture'];
    $stmt = $db->prepare('SELECT * FROM scriptures WHERE id=:id');
    $stmt->bindValue(':id', $scriptureid, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p><span>" . $row['book'] . ' ';
      echo $row['chapter'];
      echo ':' . $row['verse'] . ' - ' . "</span>";
      echo '"' . $row['content'] . '"' . "</p>";
      echo '<br/>';
    ?>
    </body>
    </html>