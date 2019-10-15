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
            <h1>User Login</h1>
            <?php
                if (isset($message)) {
                echo $message;
                }
            ?>
            <form action="<?php echo $basepath; ?>/?action=Login" method="post" id="loginform">
                <fieldset>
                    <div>
                        <input class="requiredinvalid" id="email" name="email"
                        type="email" required placeholder="email@address.com" tabindex="1"
                        title="E-mail address must be a valid e-mail address format." readonly <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>
                        onfocus="if (this.hasAttribute('readonly')) {
                            this.removeAttribute('readonly');
                            // fix for mobile safari to show virtual keyboard
                            this.blur();    this.focus();  }"/>
                        <label for="email">e-Mail Address</label>
                    </div>
                    <div>
                        <input class="requiredinvalid" id="password" name="password"
                        type="password" required tabindex="2" title="Passwords are case sensitive. Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character." pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                        readonly onfocus="if (this.hasAttribute('readonly')) {
                            this.removeAttribute('readonly');
                            // fix for mobile safari to show virtual keyboard
                            this.blur();    this.focus();  }" />
                        <label for="password">Password</label>
                    </div>
                    <input type="submit" name="login" value="Login" />
                    <input type="hidden" name="action" value="Login">
                    <p>forgot password? <a href="#">send reset email</a></p>
                    <input type="button" name="register" value="Create an Account" onclick="registration();" />
                </fieldset>
                
            </form>

        </main>
    <footer>
        <?php include 'common/footer.php'; ?>
    </footer>
    <script>
        function registration() {
            var basepath = '<?php echo $basepath ?>';
            location.href = basepath + '?action=registration';
        }
    </script>
</body>
</html>