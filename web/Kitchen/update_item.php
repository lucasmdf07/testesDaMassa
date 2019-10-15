<?php
session_start();
require "dbConnect.php";
$db = get_db();

// Set userId based on the username in Session
$userID = $_SESSION['userID'];

include("db_functions.php");

// Save all Posted data
$data['id'] = filter_var($_POST['updateID'], FILTER_SANITIZE_STRING);
$data['item']    = filter_var($_POST['updateItem'], FILTER_SANITIZE_STRING);
$data['type'] = filter_var($_POST['updateType'], FILTER_SANITIZE_STRING);
$data['description']   = filter_var($_POST['updateDescription'], FILTER_SANITIZE_STRING);
$data['expdate'] =  date('Y-m-d', strtotime($_POST['updateDate']));
$data['quantity'] = htmlspecialchars($_POST['updateQuantity']);
$data['storage'] = filter_var($_POST['updateStorage'], FILTER_SANITIZE_STRING);
$itemID = updateItem($data);

$updateRow = updateRow($data, $itemID, $userID);
$_SESSION['itemID'] = $data['id'];

// Return to homepage
$new_page = "homepage.php";
header("Location: $new_page");
die();
?>