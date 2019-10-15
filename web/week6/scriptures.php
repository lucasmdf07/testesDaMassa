<?php
session_start();

    require_once 'database.php';
    require_once 'scripture_model.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PGSQL Connect to DB</title>
</head>
<body>
    <main>

        <h1>Scripture Resources</h1>
        <div id="options"><a href="$basepath/?action=newtopic">Add New Topic</a></div>
        <?php
            
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
            echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] .':' . $row['verse'] . ' </b>- ' . $row['content'] . '</p>';
            }
        ?>
    </main>
</body>
</html>