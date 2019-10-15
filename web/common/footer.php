<!--******************************************************************
**                Footer section
*******************************************************************-->
<footer>
  <p>
    Site created and maintained by: Ralph Borcherds, &copy; 2018<br />
    <a href="../legal/terms.html">Terms of use</a> Date updated: <span id="currentdate" ><script>footerDate();</script></span>
  </p>

</footer>



<script>
      var urlString, urlArray, pageHREF, menu, i, currentURL;
      urlString = document.location.href;
      urlArray = urlString.split('/');
      pageHREF = urlArray[urlArray.length - 1];

      if (pageHREF !== "") {
          menu = document.querySelectorAll('ul#mainmenu li a');
          for (i = 0; i < menu.length; i++) {
              currentURL = (menu[i].getAttribute('href'));
              menu[i].parentNode.className = '';
              if (currentURL === pageHREF) {
                  menu[i].parentNode.className = 'active';
              }
          }
      } 

   </script>