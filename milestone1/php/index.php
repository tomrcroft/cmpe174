<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="../css/loginPageStyle.css">

</head>
<body>


<form name="loginForm" action="loginFile.php" method="post" >
<h1> Login!</h1>
	<div id='usernameDiv'>
		Username:
		<input name="username" type="email" id="usernameInput">
	</div>
	<div id='passwordDiv'>
		Password:
		<input name="password" type="password" id="passwordInput">
	</div>
	
<input class="b" type="submit" name="submit" value="Login" style="margin-right:10px;">
	<a href="registration.php" ><span style ="color:blue;"> Click here to register</span></a>
<br><input type="checkbox" name="cookiecheck" value="Yes" /> Remember Username and Password? <br>

</form>

</html>