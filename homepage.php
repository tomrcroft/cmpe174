<?php
session_start();
var_dump($_SESSION);
?>
<html>
<head>
<title>Homepage</title>
<link rel="stylesheet" type="text/css" href="loginPageStyle.css">

</head>
<body>

<p>

<h1> Welcome to the Homepage! </h1>

</p>

<p>

<a href='./addVideo.php'>Add Video!</a>

<br>

<a href='./viewVideos.php'>View Videos!</a>

<br>
<?php
	/**
	This needs to be hidden is the user is not an admin.
	*/
	var_dump($_SESSION);
	if(True)
	{
		print ("<a href='./editVideo.php'>Edit a Video!</a>");
	}
			
?>
<!-- <a href='./addVideo.php'>Add Video!</a> -->

<br>

</p>


</body>
</html>