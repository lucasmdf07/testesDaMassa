<?php
    session_start();

$_SESSION['items'][$_POST["item"]] = $_POST["item"];

    header('Location: /shopping/shopping.php');
?>

