<?php
    if ($_SESSION['loggedin'] <> TRUE){
        header('location:' . $basepath. '?action=login');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include 'common/head.php'; ?>
</head>
<body>
    
        <?php include 'common/header.php'; ?>
    
    <main>
        <form action="<?php echo $basepath; ?>/?action=DocAdd" method="post" id="editDoc" >
            <fieldset>
                <div>
                    <input id="docfirstname" name="docfirstname" type="text" required tabindex="1"
                    title="Doctor First Name" <?php if (isset($doctor)) {echo "value='" . $doctor['doctorfirstname'] . "'";} ?> />
                    <label for="docfirstname">Doctor First Name</label>
                </div>
                <div>
                    <input id="doclastname" name="doclastname" type="text" required tabindex="2"
                    title="Doctor last Name" <?php if (isset($doctor)) { echo "value='" . $doctor['doctorlastname'] . "'";} ?> />
                    <label for="doclastname">Doctor Last Name</label>
                </div>
                <div>
                    <input id="docsex" name="docsex" type="text" tabindex="3"
                    title="Doctor Sex" <?php if (isset($doctor)) { echo "value='" . $doctor['doctorsex'] . "'";} ?> />
                    <label for="docsex">Doctor Sex</label>
                </div>
                <div>
                    <input id="doctitle" name="doctitle" type="text" tabindex="4"
                    title="Doctor Title" <?php if (isset($doctor)) { echo "value='" . $doctor['doctortitle'] . "'";} ?> />
                    <label for="doctitle">Doctor Title</label>
                </div>
                <div>
                    <input id="docaddress1" name="docaddress1" type="text" required tabindex="5"
                    title="Doctor Address Line 1" <?php if (isset($doctor)) { echo "value='" . $doctor['docaddress1'] . "'";} ?> />
                    <label for="docaddress1">Address Line 1</label>
                </div>
                <div>
                    <input id="docaddress2" name="docaddress2" type="text" tabindex="6"
                    title="Address Line 2" <?php if (isset($doctor)) {  echo "value='" . $doctor['docaddress2'] . "'";} ?> />
                    <label for="docaddress2">Address Line 2</label>
                </div>
                <div>
                    <input id="docaddress3" name="docaddress3" type="text" tabindex="7"
                    title="Address Line 3" <?php if (isset($doctor)) {  echo "value='" . $doctor['docaddress3'] . "'";} ?> />
                    <label for="docaddress3">Address Line 3</label>
                </div>
                <div>
                    <input id="doccity" name="doccity" type="text" required tabindex="8"
                    title="City" <?php if (isset($doctor)) {  echo "value='" . $doctor['doccity'] . "'";} ?> />
                    <label for="doccity">City</label>
                </div>
                <div>
                    <input id="docstate" name="docstate" type="text" required tabindex="9"
                    title="State" <?php if (isset($doctor)) {  echo "value='" . $doctor['docstate'] . "'";} ?> />
                    <label for="docstate">State</label>
                </div>
                <div>
                    <input id="doczip" name="doczip" type="text" required tabindex="10"
                    title="Zip Code" <?php if (isset($doctor)) {  echo "value='" . $doctor['doczip'] . "'";} ?> />
                    <label for="doczip">Zip Code</label>
                </div>
                <div>
                    <input id="docphone" name="docphone" type="text" required tabindex="10"
                    title="Phone Number" <?php if (isset($doctor)) {  echo "value='" . $doctor['docphone'] . "'";} ?> />
                    <label for="docphone">Phone Number</label>
                </div>
                <div>
                    <input id="category" name="category" autocomplete="off" list="specialties" required tabindex="11" title="Select the category." onChange="javascript:updateDocBySpecialty();" />
                    <?php echo $specialtiesDisplay; ?> 
                    <label for="category">Select a Specialty: </label>
                </div>
                  
            </fieldset>
            <input type="submit" name="submit" value="Submit" />
            <input type="hidden" name="action" value="DocAdd" />

    

        </form>
    </main>
</body>
</html> 