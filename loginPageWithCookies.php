<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="loginPageStyle.css">

</head>
<body>


<form name="loginForm" action="loginFile.php" method="post" >
	<div id='usernameDiv'>
		Username:
		<input name="username" type="text" id="usernameInput">
	</div>
	
	<div id='passwordDiv'>
		Password:
		<input name="password" type="password" id="passwordInput">
	</div>
	
<input class="b" type="submit" name="submit" value="Login" style="margin-right:10px;">
	<a href="registration.php" ><span style ="color:blue;"> click here to register</span></a>

	<br><input type="checkbox" name="cookiecheck" value="Yes" /> Remember Username and Password? <br>
</form>

<?php
if(isset($_POST['cookiecheck']) && $_POST['cookiecheck'] == 'Yes')
{
	if (isset($_POST['usernameInput']) && isset($_POST['passwordInput'])) 
	{
		setcookie('usernameCookie', $_POST['usernameInput'], time()+60, '/');
		setcookie('passwordCookie', md5($_POST['passwordInput']), time()+60, '/');
	}
}

?> 
</body>
</html>