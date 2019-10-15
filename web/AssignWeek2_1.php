<!DOCTYPE html>
<html>
<head>
   <title>CS313</title>
   <meta name="viewport" content="width=device-width, initial-scale1" />
   <link href="AssignWeek2.css" rel="stylesheet">
   <script type="text/javascript" src="AssignWeek2.js"></script>
</head>
<body>
   <header>CS313 Collin Steel</header>
   <div id="container">
      <div id="FirstDiv">
         <a href="AssignWeek2_2.html">Assignments</a>
      </div>
      <div id="SecondDiv">
         <p>
            I work at <a href="www.powerteq.com">Powerteq</a> as a Test Engineer.  It has been a great place
            to work for the past 16 years. I really enjoy what I do. I support the production line with any needs 
            they have.  I create test equipment(hardware) and I create custom user interfaces to run the tests.
         </p>
      </div>
      <div id="ThirdDiv">
         <img src="me.jpg" alt="Picture of Me" />
      </div>
      <div id="video">
         <iframe width="420" height="345" src="https://www.youtube.com/embed/h7DCiAv88ow" align="center">
         </iframe>
      </div>
   </div>
   <button id="but" onclick="buttonClick()">Push</button><br />
   The time is:
   <?php
      print date('H:i:s', $_SERVER['REQUEST_TIME']);
   ?>
</body>
</html>