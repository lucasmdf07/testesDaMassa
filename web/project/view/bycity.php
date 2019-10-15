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
        <h1>Cities</h1>
        <section>
            <label for="city1">Select a City: </label>
            <input id="city1" name="city1" autocomplete="off" list="cities" tabindex="1" title="Select the city." onChange="javascript:updateDocByCity();">
            <?php echo $cityList; ?> 
        </section>
        <!-- <section id="docbycity"></section> -->
    </main>
    <footer>
        <?php include 'common/footer.php'; ?>
    </footer>
</body>
</html>