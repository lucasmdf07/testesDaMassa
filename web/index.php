<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Home page for CS-313</title>
        <meta name="description" content="This is the homepage for my BYU-I CS-313 Class">
        
        <?php include_once('common/head.php'); ?>
    </head>
 
  <body>
    <section class="content">
        <?php include('common/header.php'); ?>
        <main class="home">
            <h1>Welcome to my CS-313 Homepage</h1>
            <p>Some of the things I enjoy doing is riding horses, ham radio and spending time with the family. The image below was taken about a year ago when we spent 3 days on horseback supporting a youth pioneer trek. That was not with out stake, but a stake next to us. They needed a nurse for the trek and asked my wife to be that nurse. This was done during the week between the winter and spring semesters in 2017.</p>
            <p>My horse is a cross between a quarter horse and a Belgium draft horse. He is 18 hands tall and weighs about 16oo lbs. My wife is on a standard quarter horse that only weighs about 1000 lbs.</p>
            <p>I am the Vice-President of the Desert RATS club in Palm Springs. This is a ham radio club. I am also the ARES Emergency coordinator for the entire valley where we live. I have about 45 ham radio operators that report to me and will be actived during a disaster.</p>
            <figure>
                <img src="images/day-1-0306.jpg" width="600">
                <figcaption>On horseback during a Pioneer Trek for 3 days</figcaption>
            </figure>

            <p>Since I live in sunny Southern California I thought I would share the current temp. Sorry if these temps make you jealous during the winter months. Someone has to live where it is warm during the winter.</p>
            <section id="forecast">
                <h2 id="hiddenitems">Weather forecast table.</h2>
                <div class="forecast">
                    <div class="cityname" id="cityname"></div>
                    <div class="flex-order">Weather Forecast Data</div>
                    <div class="flex-order1 bolding" id="summary1">Currently</div>
                    <div class="flex-order1" id="summary2"></div>
                    <div class="flex-order2 bolding" id="high">Forecast High</div>
                    <div class="flex-order2" id="hightemp"></div>
                    <div class="flex-order3 bolding" id="low">Forecast Low</div>
                    <div class="flex-order3" id="lowtemp"></div>
                    <div class="flex-order4 bolding" id="chanceperc">Chance Precipitation</div>
                    <div class="flex-order4" id="chancepercperc"></div>
                    <div class="flex-order5 bolding" id="maxwind">Today's Max Wind</div>
                    <div class="flex-order5" id="maxwindspeed"></div>
                    <div class="flex-order9 bolding hiddenitems" id="windchill">Current Windchill</div>
                    <div class="flex-order9 hiddenitems" id="windchillnow"></div>
                    <div class="flex-order6 bolding" id="10day">10 Day Forecast</div>
                    <div class="flex-order7" id="day0"></div>
                    <div class="flex-order7" id="day1"></div>
                    <div class="flex-order7" id="day2"></div>
                    <div class="flex-order7" id="day3"></div>
                    <div class="flex-order7" id="day4"></div>
                    <div class="flex-order7" id="day5"></div>
                    <div class="flex-order7" id="day6"></div>
                    <div class="flex-order7" id="day7"></div>
                    <div class="flex-order7" id="day8"></div>
                    <div class="flex-order7" id="day9"></div>
                    <div class="flex-order8" id="day0temp"></div>
                    <div class="flex-order8" id="day1temp"></div>
                    <div class="flex-order8" id="day2temp"></div>
                    <div class="flex-order8" id="day3temp"></div>
                    <div class="flex-order8" id="day4temp"></div>
                    <div class="flex-order8" id="day5temp"></div>
                    <div class="flex-order8" id="day6temp"></div>
                    <div class="flex-order8" id="day7temp"></div>
                    <div class="flex-order8" id="day8temp"></div>
                    <div class="flex-order8" id="day9temp"></div>
                </div>
            </section>
        </main>
    </section>
    <?php include('common/footer.php'); ?>
<!--/******************************************************************
**               Weather Forecast scripts - Begin
*******************************************************************/-->
<?php 
$state = 'CA'; 
$city = 'Palm Springs';
?>
<script src="js/weather.js"></script>
<script>
        var state = "<?php echo $state; ?>";
        if (state.length == 2) {
            var state = "<?php echo $state; ?>";
            var city = "<?php echo $city; ?>";
            currentWeather(state, city);
            forecastWeather(state, city);
        }
    </script>
<!--/******************************************************************
**               Weather Forecast scripts - End
*******************************************************************/-->

    </body>


</html>
