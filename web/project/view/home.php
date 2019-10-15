<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Lookup and Reviews</title>
    <?php include 'common/head.php'; ?>
</head>
<body>
    
        <?php include 'common/header.php'; ?>
    
    <main>
        <h1>List of Doctors</h1>
        <section class="doctorshome">
        <?php echo $doctors; ?>
        </section>
    </main>
    
        <?php include 'common/footer.php'; ?>
    

</body>
</html>