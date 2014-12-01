<?php
session_start();
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
	
	if($_SESSION['admin'])
	{
		print ("<h3>Admin Functions:</h3>");
		print ("<a href='./editVideo.php'>Edit a Video!</a>");
		print ("<br><a href='./cleandata.php'>Clean the data</a>");
	}
	if($_SESSION)
	{
		print ("<br><br><br><a href='./logout.php'>Logout</a>");
	}	
?>
<!-- <a href='./addVideo.php'>Add Video!</a> -->

<br>

</p>


</body>
</html>