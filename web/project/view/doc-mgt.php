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
    <title>Doctor Management</title>
    <?php include 'common/head.php'; ?>

</head>
<body>
    <section class="header">
        <?php include_once 'common/header.php'; ?>
    </section>
    <main>
    <input type="button" value="Add Doctor" id="addDoc" onClick="javascript:window.open('<?php echo $basepath ."/?action=addDoc"; ?>', '_self', false)">
<?php 
    if(isset($message)) { echo "<h2>$message</h2>"; }

    echo $docMgt;

?>

</main>
    
</body>
</html>