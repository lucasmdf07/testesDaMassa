<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week 2 Team Assignment</title>
    
    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/week2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/week2.js"></script>
    
</head>
<body>
    <section id="container-fluid plain ">
        <section id="container-fluid boxes ">
            <a href="javascript:alert1();">
                <div id="button1">
                    Click Me
                </div>
            </a>
            <a href="javascript:alert1();">
                <div id="button2">
                    Click Me
                </div>
            </a>
            <a href="javascript:alert1();">

                <div id="button3">
                    Click Me
                </div>
            </a>
        </section>
        
        <section id="color container-fluid">

            <label for="colorChanger">Color:</label> 
            <input type="text" id="colorChanger" placeholder="#cccccc"><br />

            <a href="javascript:changeColor();">
                <div id="changecolor">
                    Change color
                </div>
            </a>
        </section>
    </section>

    <section id="stretch container-fluid">
        <section id="stboxes container-fluid">
            <div id="stbutton1" class="clickme">
                Click Me
            </div>
            <div id="stbutton2" class="clickme">
                Click Me
            </div>
            <div id="stbutton3" class="clickme">
                Click Me
            </div>
        </section>
        
        <section id="stcolor container-fluid">

            <label for="stcolorChanger">Color:</label> 
            <input type="text" id="stcolorChanger" placeholder="#cccccc"><br />

            
            <div id="stchangeColor">
                Change color
            </div>
            
        </section>
        <section id="fade">
            <div id="stFade">
                Toggle 3rd Box Display
            </div>

        </section>
    </section>
</body>
</html>