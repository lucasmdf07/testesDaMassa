<?php
session_start();

$_SESSION['items'] = array_merge(array_diff($_SESSION['items'], [$_POST["item"]]));

header('Location: /shopping/cart.php');
?>
