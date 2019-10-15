<?php
session_start();

require('dbConnect.php');

$db = dbConnect();

$content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
$author_id = $_SESSION["user_id"];
$post_id = $_POST["post_id"];
$date = date("Y-m-d h:i");

try
{
    $query = 'INSERT INTO comment(content, author_id, date, post_id) VALUES(:content, :author_id, :date, :post_id)';
    $statement = $db->prepare($query);

    $statement->bindValue(':content', $content);
    $statement->bindValue(':author_id', $author_id);
    $statement->bindValue(':post_id', $post_id);
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
