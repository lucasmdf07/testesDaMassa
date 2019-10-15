function footerDate() {
    /***********************************
     *    Defining Table                *
     *                                  *
     *   Input:  None                   *
     *   Processing: Determine date     *
     *   Output: Write date as          *
     *       Monday, 6 May, 2020        *
     ***********************************/
    var d = new Date(); //Get current system date
    var day, month; // Create empty variables for string values
    var year = d.getFullYear(); // Get the 4 digit year
    var currdate = d.getDate(); // Get the current date number

    // Get the day of the week number and translate to string name
    switch (d.getDay()) {
        case 0:
            day = "Sunday";
            break;
        case 1:
            day = "Monday";
            break;
        case 2:
            day = "Tuesday";
            break;
        case 3:
            day = "Wednesday";
            break;
        case 4:
            day = "Thursday";
            break;
        case 5:
            day = "Friday";
            break;
        case 6:
            day = "Saturday";
    }

    // Get current month number and convert to string name
    switch (d.getMonth()) {
        case 0:
            month = "January";
            break;
        case 1:
            month = "February";
            break;
        case 2:
            month = "March";
            break;
        case 3:
            month = "April";
            break;
        case 4:
            month = "May";
            break;
        case 5:
            month = "June";
            break;
        case 6:
            month = "July";
            break;
        case 7:
            month = "August";
            break;
        case 8:
            month = "September";
            break;
        case 9:
            month = "October";
            break;
        case 10:
            month = "November";
            break;
        case 11:
            month = "December";

    }

    // write output the the currentdate ID in the HTML code
    document.getElementById("currentdate").innerHTML = day + ", " + currdate + " " + month + " " + year;
}

var ajax1 = getHTTPObject();

function getHTTPObject() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function updateDocByCity() {

    if (ajax1) {
        var city = document.getElementById("city1").value;
        var base_url = document.getElementById('baseurl').value;
        var url = "//" + window.location.host + base_url + "/json/getbycity.php?action=" + city;
        ajax1.onreadystatechange =
            function() {

                // This next line checks to make sure that the file has finished being read and that it was read correctly.
                if (ajax1.readyState == 4 && ajax1.status == 200) {
                    // document.getElementById('serverState').innerHTML += "Ready State: " + ajax1.readyState + "  Status: " + ajax1.status + " start<BR>";
                    // var data = JSON.parse(ajax1.responseText);
                    document.getElementById('docbycity').innerHTML = ajax1.responseText;
                    document.getElementById('city1').value = "";
                } else {
                    // document.getElementById('serverState').innerHTML += "Ready State: " + ajax1.readyState + "  Status: " + ajax1.status + "<BR>";
                }
            }
        ajax1.open("GET", url, true);
        ajax1.send();
    }


}

function updateDocBySpecialty() {

    if (ajax1) {
        var specialty = document.getElementById("category").value;
        var base_url = document.getElementById('baseurl').value;
        var url = "//" + window.location.host + base_url + "/json/getbyspecialty.php?action=" + specialty;
        ajax1.onreadystatechange =
            function() {

                // This next line checks to make sure that the file has finished being read and that it was read correctly.
                if (ajax1.readyState == 4 && ajax1.status == 200) {
                    // document.getElementById('serverState').innerHTML += "Ready State: " + ajax1.readyState + "  Status: " + ajax1.status + " start<BR>";
                    // var data = JSON.parse(ajax1.responseText);
                    document.getElementById('specialty').innerHTML = "<h1>" + specialty + "</h1>";
                    document.getElementById('docbyspecialty').innerHTML = ajax1.responseText;
                    document.getElementById('category').value = "";
                } else {
                    // document.getElementById('serverState').innerHTML += "Ready State: " + ajax1.readyState + "  Status: " + ajax1.status + "<BR>";
                }
            }
        ajax1.open("GET", url, true);
        ajax1.send();
    }


}