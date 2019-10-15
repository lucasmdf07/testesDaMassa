<?php 
    if ($_SESSION['loggedin'] <> TRUE){
        header('location:' . $basepath. '?action=login');
    } 
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "utf-8">
    <meta http-equiv = "X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Doctor Lookup Admin Page</title>
   
    <?php include 'common/head.php'; ?>


</head>
<body>
    <div class="content">
        <?php require 'common/header.php'; ?>

        <main>

            <h1><?php echo  $clientData['firstname'] . " " .  $clientData['lastname']; ?></h1>
            <?php
                if (isset($message)) {
                echo $message;
                }
            ?>
            <ul>
                <li>FirstName: <strong><?php echo $_SESSION['clientData']['firstname']; ?></strong></li>
                <li>LastName: <strong><?php echo $_SESSION['clientData']['lastname']; ?></strong></li>
                <li>Email: <strong><?php echo  $_SESSION['clientData']['email']; ?></strong></li>
                
            </ul>
            <?php if( $_SESSION['clientData']['usrlevel'] > 1) { ?>
                <h3>Please click on this link if you wish to go to the Doctor Management.</h3> 
                <a href="<?php echo $basepath; ?>/?action=doc-mgt">Doctor Management Page</a>
            <?php  }   ?>
            <h3>You may edit your reviews below.</h3> 
            <?php echo $reviewList; ?>
            
          
        </main>
    <?php require "common/footer.php" ?>
    </div>
    <!-- Latest jQuery Library un-comment if needed-->
    <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- JavaScript files -->
    


</body>
</html>