<?php
function baseurl() {
    if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
    {
        $basepath = '/cs313/web/project/';
   } else {
       $basepath = '/project';
   }
   return $basepath;
}

function getDoctors($docs) {
    
    $docDisplay = '';
    foreach ($docs as $key => $doctor) {
        if($key & 1) {
            $rowoddeven = 'odd';
        } else {$rowoddeven = 'even';} 
        $docDisplay .= "<article class='$rowoddeven doclist'>\n ";
        $docDisplay .= "<div id='docname'>$doctor[doctorlastname], $doctor[doctorfirstname]</div>\n";
        $docDisplay .= "<div>$doctor[docaddress1]</div>\n";
        $docDisplay .= "<div>$doctor[docaddress2]</div>\n";
        $docDisplay .= "<div>$doctor[docaddress3]</div>\n";
        $docDisplay .= "<div>$doctor[doccity], $doctor[docstate] $doctor[doczip]</div>\n";
        $docDisplay .= "</article>\n";
    }
 
    return $docDisplay;
}

function makeSpecialties($specialties){
    // build category list for drop down list.
    // This must come after the navigation so that the $specialties variable has data
    $catList = "<datalist id='specialties'>";
    foreach ($specialties as $category) {
        $catList .= "<option value='" . $category['specialty_name'] . "'></option>";
    }
    $catList .= "</datalist>";
    return $catList;
}

function allSpecialties($specialties){
    // build category list for drop down list.
    // This must come after the navigation so that the $specialties variable has data
    $catList = "<datalist id='specialties'>";
    foreach ($specialties as $category) {
        $catList .= "<option data-value='" . $category['specialty_id'] . "'>" . $category['specialty_name'] . "</option>";
    }
    $catList .= "</datalist>";
    return $catList;
}

function makeCities($cities){
    $catList = "<datalist id='cities'>";
    $catList .= "<option selected value=''></option>";
    foreach ($cities as $category) {
        $catList .= "<option value='" . $category['doccity'] . "'></option>";
    }
    $catList .= "</datalist>";
    return $catList;
}

function getDoctorsByCity($docs) {
    
    $docDisplay = '<section>';
    foreach ($docs as $key => $doctor) {
        if($key & 1) {
            $rowoddeven = 'odd';
        } else {$rowoddeven = 'even';} 
        $docDisplay .= "<article class='$rowoddeven doclist'>\n ";
        $docDisplay .= "<div id='docname'>$doctor[doctorlastname], $doctor[doctorfirstname]</div>\n";
        $docDisplay .= "<div>$doctor[docaddress1]</div>\n";
        $docDisplay .= "<div>$doctor[docaddress2]</div>\n";
        $docDisplay .= "<div>$doctor[docaddress3]</div>\n";
        $docDisplay .= "<div>$doctor[doccity], $doctor[docstate] $doctor[doczip]</div>\n";
        $docDisplay .= "</article>\n";
    }
    $docDisplay .= "</section>";
    return $docDisplay;
}

// Check to make sure the user enter a valid e-mail address
function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}


// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
function checkPassword($clientPassword){
    $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
    return preg_match($pattern, $clientPassword);
}


function createDocMgt($docs) {
    $basepath = baseurl();
    $docDisplay = "<section class='docmgt'>\n";
    $docDisplay .= "<div class='docName bold'>Last Name, First Name</div>\n";
    $docDisplay .= "<div class='docCityState bold'>City, State Zip</div>\n";
    $docDisplay .= "<div class='modify bold'>Modify</div>\n";
    $docDisplay .= "<div class='delete bold'>Delete</div>\n";

    foreach ($docs as $key => $doctor) {
        if($key & 1) {
            $rowoddeven = 'odd';
        } else {$rowoddeven = 'even';} 
        $docDisplay .= "<article class='$rowoddeven doclist'>\n ";
        $docDisplay .= "<div class='docName'>$doctor[doctorlastname], $doctor[doctorfirstname]</div>\n";
        $docDisplay .= "<div class='docCityState'>$doctor[doccity], $doctor[docstate] $doctor[doczip]</div>\n";
        $docDisplay .= "<div class='modify'><a href='$basepath/?action=modifyDoc&id=$doctor[doctor_id]&add_id=$doctor[address_id]'>Modify</a></div>\n";
        $docDisplay .= "<div class='delete'><a href='$basepath/?action=DeleteDoc&id=$doctor[doctor_id]&add_id=$doctor[address_id]'>Delete</a></div>\n";
        $docDisplay .= "</article>\n";
    }
    
    $docDisplay .= "</section>\n";
    return $docDisplay;
}