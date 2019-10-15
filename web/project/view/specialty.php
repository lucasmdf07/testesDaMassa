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
    <section class="header">
        <?php include_once 'common/header.php'; ?>
    </section>
    <main>
        <h1>Specialties</h1>
        <section id="specialty">
            <label for="category">Select a Specialty: </label>
            <input id="category" name="category" autocomplete="off" list="specialties" tabindex="1" title="Select the category." onChange="javascript:updateDocBySpecialty();" >
            <?php echo $specialties; ?> 
        </section>
        <section id="docbyspecialty">
        </section>
    </main>
    <footer>
        <?php include 'common/footer.php'; ?>
    </footer>
</body>
</html>