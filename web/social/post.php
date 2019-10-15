<?php
session_start();

require('dbConnect.php');

$db = dbConnect();

$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
$author_id = $_SESSION["user_id"];
$date = date("Y-m-d h:i");

try
{
    $query = 'INSERT INTO post(content, author_id, date) VALUES(:content, :author_id, :date)';
    $statement = $db->prepare($query);
    // Now we bind the values to the placeholders. This does some nice things
    // including sanitizing the input with regard to sql commands.
    $statement->bindValue(':content', $content);
    $statement->bindValue(':author_id', $author_id);
    $statement->bindValue(':date', $date);
    $statement->execute();

}
catch (Exception $ex)
{
    // Please be aware that you don't want to output the Exception message in
    // a production environment
    echo "Error with DB. Details: $ex";
    die();
}
header("location: social.php");
?>
