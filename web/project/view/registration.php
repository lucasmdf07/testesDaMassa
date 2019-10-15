<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <?php include 'common/head.php'; ?>
</head>
<body>
    <section class="header">
        <?php include_once 'common/header.php'; ?>
    </section>
    <main>
        <h1>User Registration</h1>
            <?php
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form method="post" action="<?php echo $basepath ?>/?action=Register" id="registrationform">
                <fieldset>
                    <div>
                        <input id="first_name" name="first_name"
                        type="text" required placeholder="First Name" tabindex="1"
                        title="Enter your First Name" <?php if(isset($first_name)){echo "value='$first_name'";} ?> />
                        <label for="first_name">First Name</label>
                    </div>
                    <div>
                        <input id="last_name" name="last_name"
                        type="text" required placeholder="Last Name" tabindex="2"
                        title="Enter your Last Name" <?php if(isset($last_name)){echo "value='$last_name'";} ?>/>
                        <label for="last_name">Last Name</label>
                    </div>
                    <div>
                        <input id="username" name="username"
                        type="text" required placeholder="username" tabindex="3" 
                        title="Username must be a valid username format." <?php if(isset($username)){echo "value='$username'";} ?>/>
                        <label for="username">Username</label>
                    </div>
                    <div>
                        <input id="email" name="email"
                        type="email" required placeholder="email@address.com" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" tabindex="4" 
                        title="E-mail address must be a valid e-mail address format." <?php if(isset($email)){echo "value='$email'";} ?>/>
                        <label for="email">e-Mail Address</label>
                    </div>
                    <div>
                        <input id="password" name="password"
                        type="password" required tabindex="5" 
                        pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                        title="Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character."/>
                        <label for="password">Password</label>
                    </div>
                </fieldset>

                <input type="submit" name="submit" value="Register">
                <!-- Add the action name - value pair -->
                <input type="hidden" name="action" value="Register">
                
            </form>
        </main>
</body>
</html>