<header>
<input type="hidden" id="baseurl" name="baseurl" value="<?php echo $basepath; ?>">
    <div class="logoarea">
            
        <div class="logo"><a href="<?php echo $basepath; ?>"><img src="<?php echo $basepath; ?>/images/mrb-logo-2.png" id="logo" alt="Company Logo"></a></div>
        <div class="right">
            <div class="account">
                <?php if (isset($_SESSION['loggedin'])) {
                    echo "<span id='welcome'><a href='$basepath?action=user-mgt'>Welcome " . $clientData['firstname'] . "</a></span>";
                    
                } ?>
                <?php
                    if (isset($_SESSION['loggedin'])) {
                        echo "<div id='loggedin'>";
                        echo "<div id='logout'><a href='$basepath?action=Logout'>Logout</a></div>";
                        echo "<div id='update'><a href='$basepath?action=user-mgt'>Manage Account</a></div>";
                        echo "</div>";
                    } else {
                        echo "<a href='$basepath?action=login' class='link'>
                        <img src='$basepath/images/account.gif' alt='Account Folder GIF' id='folder'>My Account</a>";
                    }
                ?>
            </div>
        </div>
        
    </div>
        <button class="hamburger" onclick="toggleHam()">&#9776;</button>
        <!-- <nav><?php echo $navList; ?></nav> -->
    <nav id="menu">
        <ul  class='navigation'>
            <li><a href="<?php echo $basepath; ?>">Home</a></li>
            <li><a href="<?php echo $basepath; ?>?action=specialty">By Specialty</a></li>
            <li><a href="<?php echo $basepath; ?>?action=city">By City</a></li>
        </ul>
    </nav>

</header>