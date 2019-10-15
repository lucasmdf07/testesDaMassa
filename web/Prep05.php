<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
   <meta name="viewport" content="width=device-width, initial-scale1" />
</head>
<body>
  <?php
         $db;
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
         catch(PDOException $ex)
         {
            echo 'ERROR!: ' . $ex->getMessage();
            die();
         }
         
         foreach($db->query('SELECT username, password FROM note_user') as $row)
         {
            echo 'user: ' . $row['username'];
            echo 'password: ' . $row['password'];
            echo '<br/>';
         }
         $stmt = $db->prepare('SELECT * FROM note_user');
         $stmt->execute();
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

         print_r($rows);
      ?>
   
</body>
</html>