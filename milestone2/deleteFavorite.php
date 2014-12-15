<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
		ob_end_clean();
		header('Location: index.php');
		exit();
    }
?>
<html>
<head>
<title>Wing Chun Videos</title>
<link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>

<ul>
	<li><a href='./homepage.php'>Home</a></li>
	<li><a href='./index.php'>Start Up</a></li>

	<li><a href='./addVideo.php'>Add Video</a></li>
	<li><a href='./editProfile.php'>Edit Profile</a></li>
	<li><a href='./logout.php'>Logout</a></li>
</ul>

<?php
	$link = $_POST['linkToDelete'];
	include 'sessionHandle.php';
	
	if(!isset($_SESSION["$link"]))
		print ("<p><h1>This Video is not in your favorites!</h1></p>");
	else
		{
			unset($_SESSION["$link"]); 	
			
			if(!isset($_SESSION["$link"]))
				print ("<p><h1>This Video has not been deleted from your favorites!</h1></p>");
			else
				print ("<p><h1>This Video has been deleted from your favorites!</h1></p>");
		}
		
		
?>
</body>
</html>