<?php
$majors = array("CS"=>"Computer Science", "CE" => "Computer Engineering", "CIT" => "Computer Information Technology", "SE" => "Software Engineering", "WDD" => "Web Design and Development");
?>

<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <form action="results.php" method="post">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            Major:
            <?php
            foreach($majors as $x => $x_value)
            {
                echo '<input type="radio" name="major" value="' . $x . '"> ' . $x_value . '<br>';

            }
            ?>

            Comments:<br>
            <textarea name="comment"></textarea><br>

            Places I've visited: <br>

            <input type="checkbox" name="places[]" value="NA"> North America<br>
            <input type="checkbox" name="places[]" value="SA"> South America<br>
            <input type="checkbox" name="places[]" value="EU"> Europe<br>
            <input type="checkbox" name="places[]" value="AS"> Asia<br>
            <input type="checkbox" name="places[]" value="AU"> Australia<br>
            <input type="checkbox" name="places[]" value="AF"> Africa<br>
            <input type="checkbox" name="places[]" value="AN"> Antarctica<br>



            <input type="submit">
        </form>
    </body>

</html>
