<?php

session_start();

require_once 'database.php';
require_once 'insert_model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

// Check if the firstname cookie exists, get its value
if (isset($_SESSION['loggedin'])) {
    $clientData = getClient($_SESSION['clientData']['clientEmail']);
    array_pop($clientData);
}

switch ($action) {

    case 'anything':

    break;

    case 'newtopic':
        include 'insert.php';
    break;

    case 'topicinserted':
        include 'topic.php';
    break;

    default:
        include 'scripture.php';
    break;
}