<?php
session_start();
require "dbConnect.php";
$db = get_db();

// Set userId based on the username in Session
$userID = $_SESSION['userID'];

include("db_functions.php");

// Save all Posted data
$data['newItem']    = filter_var($_POST['newItem'], FILTER_SANITIZE_STRING);
$data['type'] = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
$data['newDescription']   = filter_var($_POST['newDescription'], FILTER_SANITIZE_STRING);
$data['expdate'] =  date('Y-m-d', strtotime($_POST['expdate']));
$data['quantity'] = htmlspecialchars($_POST['quantity']);
$data['storage'] = filter_var($_POST['storage'], FILTER_SANITIZE_STRING);

$itemID = insertItem($data);

$newRow = addRow($data, $itemID, $userID);

// Return to homepage
$new_page = "homepage.php";
header("Location: $new_page");
die();
?>