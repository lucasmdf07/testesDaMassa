<?php

include '../config/database.php';
include '../model/model_lookup.php';
include '../library/functions.php';

$action = filter_input(INPUT_GET, 'action');


$docsbycity = getDocsByCity($action);

$docs = getDoctorsByCity($docsbycity);
print_r($docs);

?>