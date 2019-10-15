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

        <form id="editDoc" action="<?php echo $basepath; ?>" method="post">
            <fieldset>
                <div>
                    <input id="docfirstname" name="docfirstname"
                    type="text" required tabindex="1"
                    title="Doctor First Name" readonly <?php echo "value='" . $doctor['doctorfirstname'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="docfirstname">Doctor First Name</label>
                </div>
                <div>
                    <input id="doclastname" name="doclastname"
                    type="text" required tabindex="2"
                    title="Doctor last Name" readonly <?php echo "value='" . $doctor['doctorlastname'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="doclastname">Doctor Last Name</label>
                </div>
                <div>
                    <input id="docaddress1" name="docaddress1"
                    type="text" required tabindex="3"
                    title="Doctor Address Line 1" readonly <?php echo "value='" . $doctor['docaddress1'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="docaddress1">Address Line 1</label>
                </div>
                <div>
                    <input id="docaddress2" name="docaddress2"
                    type="text" tabindex="4"
                    title="Address Line 2" readonly <?php echo "value='" . $doctor['docaddress2'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="docaddress2">Address Line 2</label>
                </div>
                <div>
                    <input id="docaddress3" name="docaddress3"
                    type="text"tabindex="5"
                    title="Address Line 3" readonly <?php echo "value='" . $doctor['docaddress3'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="docaddress3">Address Line 3</label>
                </div>
                <div>
                    <input id="doccity" name="doccity"
                    type="text" required tabindex="6"
                    title="City" readonly <?php echo "value='" . $doctor['doccity'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="doccity">City</label>
                </div>
                <div>
                    <input id="docstate" name="docstate"
                    type="text" required tabindex="7"
                    title="State" readonly <?php echo "value='" . $doctor['docstate'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="docstate">State</label>
                </div>
                <div>
                    <input id="doczip" name="doczip"
                    type="text" required tabindex="8"
                    title="Zip Code" readonly <?php echo "value='" . $doctor['doczip'] . "'"; ?>
                    onfocus="if (this.hasAttribute('readonly')) {
                        this.removeAttribute('readonly');
                        // fix for mobile safari to show virtual keyboard
                        this.blur();    this.focus();  }"/>
                    <label for="doczip">Zip Code</label>
                </div>
                
            </fieldset>
            <input type="submit" name="login" value="Update" />
            <input type="hidden" name="action" value="ModDoc" />
            <input type="hidden" name="docid" value="<?php echo $doctor['doctor_id']; ?>" />
            <input type="hidden" name="addid" value="<?php echo $doctor['address_id']; ?>" />
           
        </form>
    </main>
</body>
</html>