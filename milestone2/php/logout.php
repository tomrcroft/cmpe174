<?php
session_start();
unset($_SESSION);
$_session= array();
define('TITLE', 'Logout');
session_destroy();
?>

<html>
	<head>
		<title>Logout</title>
		<link rel="stylesheet" type="text/css" href="../css/loginPageStyle.css">
	</head>
<body>
	<h2> You are now logged out.</h2>
	<h3><a href="index.php">Back to the login.</a></h3>
</body>

</html>
