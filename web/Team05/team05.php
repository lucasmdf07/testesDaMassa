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
    foreach ($db->query('SELECT * FROM scriptures') as $row)
    {
      echo "<p><span>" . $row['book'] . ' ';
      echo $row['chapter'];
      echo ':' . $row['verse'] . ' - ' . "</span>";
      echo '"' . $row['content'] . '"' . "</p>";
      echo '<br/>';
    }
    ?>

    <form method="post" action="stretch05.php">
        <input type="text" name="book" placeholder="book">
        <input type="submit" value="search">
    </form>
    </body>
</html>