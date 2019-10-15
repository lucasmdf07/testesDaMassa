function currentWeather(state, city) {
    /*******************************************************************
     ** Defining table 
     ** input:  get from the function call the State and City to get the weather for
     ** Processing: Lookup the current weather conditions via JSON call
     ** Output: This function outputs the City and State name.
     **          Current Temprature
     **          What the current summary is I.E.  Clear, Cloudy, etc
     */
    $(function($) {
        $.ajax({
            url: "//api.wunderground.com/api/d704f31a50bce41f/conditions/q/" + state + "/" + city + ".json",
            dataType: "jsonp",
            success: function(parsed_json) {
                var parsedjson = parsed_json['current_observation'];

                var location = parsedjson['display_location']['full'];
                var temp_f = parsedjson['temp_f'];
                var obser_time = parsedjson['observation_time'];
                var windchill = parsedjson['windchill_f'];
                // var windchill = "38.3"
                if (windchill != "NA") {
                    $(".flex-order9").removeClass("hiddenitems");
                    document.getElementById('windchillnow').innerHTML = windchill + "&deg; F";
                }
                document.getElementById('cityname').innerHTML = "Current temp for " + location + " is " + temp_f + "&deg; F";
                document.getElementById('summary2').innerHTML = parsedjson['weather'];
            }
        });
    });
}

function forecastWeather(state, city) {
    /*******************************************************************
     ** Defining table 
     ** input:  get from the function call the State and City to get the weather for
     ** Processing: Lookup the 10 day forecast weather via JSON call
     ** Output: This function outputs the forecasted information for the following:
     **          High and Low Temps for today
     **          Max Wind Speed and chance of percipitation for today
     **          It then fills in the 10 day forecast starting today and show only the
     **          forecasted high fo that day
     */
    $(function($) {
        $.ajax({
            url: "//api.wunderground.com/api/d704f31a50bce41f/forecast10day/q/" + state + "/" + city + ".json",
            dataType: "jsonp",
            success: function(parsed_json) {
                var v1 = parsed_json['forecast']['simpleforecast']['forecastday'];
                var day, daytemp, tmp, tmp1, todayhigh, todaylow, percip, maxwind;

                for (index in v1) {
                    day = "day" + index;
                    daytemp = "day" + index + "temp";
                    tmp = v1[index]['date']['weekday_short'];
                    tmp1 = v1[index]['high']['fahrenheit']
                    document.getElementById(day).innerHTML = tmp;
                    document.getElementById(daytemp).innerHTML = tmp1;
                }
                todayhigh = v1['0']['high']['fahrenheit'];
                todaylow = v1['0']['low']['fahrenheit'];
                percip = v1['0']['pop'];
                maxwind = v1['0']['maxwind']['mph'] + " mph";

                document.getElementById('maxwindspeed').innerHTML = maxwind;
                document.getElementById('hightemp').innerHTML = todayhigh + "&deg F";
                document.getElementById('lowtemp').innerHTML = todaylow + "&deg F";
                document.getElementById('chancepercperc').innerHTML = percip;

            }

        });

    })
}