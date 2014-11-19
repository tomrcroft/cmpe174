<?php
session_start();
/*
 * Created on Apr 7, 2014
 *
 *The script help login in the users into the system by taking information from the form
 *and checking it with the database. 
 *
 */
?>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="loginStyle.css">

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

</form>


</body>
</html>