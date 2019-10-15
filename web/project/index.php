<?php

session_start();

include_once 'config/database.php';
include_once 'library/functions.php';
include_once 'model/model_lookup.php';
include_once 'model/accounts_model.php';
include_once 'model/doctors_model.php';

$basepath = baseurl();

// Get the action to perform.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}


// Check if the firstname cookie exists, get its value
if (isset($_SESSION['loggedin'])) {
    $clientData = getClient($_SESSION['clientData']['email']);
    array_pop($clientData);
} 
 

switch ($action) {

    case 'anything':
    break;

    case 'specialty':
    
        $spec = getSpecialties();
        $specialties = makeSpecialties($spec);
        include 'view/specialty.php';
    break;

    case 'city':
    
        $cities = getCities();
        $cityList = makeCities($cities);
        include 'view/bycity.php';
    break;

    case 'Logout':
        session_destroy();
        setcookie('firstname', $_SESSION['clientData']['first_name'], time() - 3600, $basepath);
        header('location:' . $basepath);
    break;

    case 'registration':
    
        include 'view/registration.php';
    break;

    case 'Register':
    
        // Filter and store the data
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        $emailname = checkEmail($email);
        $checkPassword = checkPassword($password);

        $existingEmail = checkExistingEmail($email);
        
        // Check for existing email address in the table
        if($existingEmail){
        $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
        include 'view/login.php';
        exit;
        }

        // Check for missing data
        if(empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($checkPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include 'view/registration.php';
            exit; 
        }

        // Hash the checked password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Send the data to the model
        $regOutcome = regClient($first_name, $last_name, $username, $email, $hashedPassword);

        // Check and report the result
        if($regOutcome === 1){
            setcookie('firstname', $first_name, strtotime('+1 year'), $basepath);
            $message = "<p>Thanks for registering $first_name. Please use your email and password to login.</p>";
            include 'view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $first_name, but the registration failed. Please try again.</p>";
            include 'view/registration.php';
            exit;
        }
        include 'view/registration.php';
    break;

    case 'login':
    
        include 'view/login.php'; 
    break;

    case 'Login':
    
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = checkEmail($email);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($password);
        
        // Run basic checks, return if errors
        if (empty($email) || empty($passwordCheck)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            include 'view/login.php';
            exit;
        }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($email);

        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($password, $clientData['userpassword']);

        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include 'view/login.php';
            exit;
        }

        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;

        $_SESSION['clientData'] = $clientData;
        setcookie('firstname', $_SESSION['clientData']['firstname'], time() - 3600, $basepath);
        
        $docs = getAllrecords();
        $doctors = getDoctors($docs);
        include 'view/home.php';
    break;

    case 'doc-mgt':
    
        if ($_SESSION['loggedin'] <> TRUE){
            header('location:' . $basepath. '?action=login');
        }
        $doctors = getDocRecords();
        $docMgt = createDocMgt($doctors);
        include 'view/doc-mgt.php';
    break;

    case 'modifyDoc':
        
        if ($_SESSION['loggedin'] <> TRUE){
            header('location:' . $basepath. '?action=login');
        }
        $id = filter_input(INPUT_GET, 'id');
        $addId = filter_input(INPUT_GET, 'add_id');
        $doctor = getDoctor($id, $addId);
        
        include 'view/docedit.php';
    break;

    case 'ModDoc':
    
        $error1 = modDoctor($_POST['docid'],  $_POST['docfirstname'], $_POST['doclastname'], "");
        if($error1 == '0') {
            $message = "The Doctor Name was not updated";
        }
        $error2 = modDocAddress($_POST['docid'], $_POST['addid'], $_POST['docaddress1'], $_POST['docaddress2'], $_POST['docaddress3'], $_POST['doccity'], $_POST['docstate'], $_POST['doczip']);
        if($error2 == '0') {
            $message = "The Doctor Address was not updated";
        }
        $doctors = getDocRecords();
        $docMgt = createDocMgt($doctors);
        
       include 'view/doc-mgt.php';
    break;

    case 'addDoc':
    
        if ($_SESSION['loggedin'] <> TRUE){
            header('location:' . $basepath. '?action=login');
        }
        $specialties = getAllSpecialties();
        $specialtiesDisplay = allSpecialties($specialties);
        include 'view/docadd.php';
    break;

    case 'DocAdd':
    
        if ($_SESSION['loggedin'] <> TRUE){
            header('location:' . $basepath. '?action=login');
        }
       
        $specialty = getSpecialty($_POST['category']);
        $return = addDoctor($_POST['docfirstname'], $_POST['doclastname'], $_POST['docsex'], $_POST['doctitle']);
        $return2 = addDocAddress($return['1'], $_POST['docaddress1'], $_POST['docaddress2'], $_POST['docaddress3'], $_POST['doccity'], $_POST['docstate'], $_POST['doczip'], $_POST['docphone']);
        $return3 = addDocSpec($return['1'], $specialty['specialty_id']);
        $doctors = getDocRecords();
        $docMgt = createDocMgt($doctors);
        include 'view/doc-mgt.php';

    break;

    case 'user-mgt' :
        include 'view/mgt-account.php';
    break;

    default:
        $docs = getAllrecords();
        $doctors = getDoctors($docs);
        include 'view/home.php';
    break;

}

