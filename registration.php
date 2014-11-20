<?php

if (isset($_POST['submit'])) {
    if (register($_POST['myusername'], $_POST['mypass'], $_POST['mypass2'], $_POST['myemail']) == 1) {
        header("location:mainLogin.php");
    }
}
if (isset($_POST['cancel'])) {
    header("location:mainLogin.php");
}
?>
<html>
    <head>
        <title>Registration</title>

        <link rel="stylesheet" type="text/css" href="loginPageStyle.css">
    </head>
    <body>

       
        <div class="register">
            <form action="register.php" method="post">

                    <div id='usernameDiv'>
						Username:
						<input type="text" name="myusername">
					</div>
                    
					<div id='passwordDiv'>
						Password:
						<input type="password" name="mypass">
					</div>
                    
					<input type="submit" name="submit" value="Register">

            </form>
        </div>
    </body>
</html>