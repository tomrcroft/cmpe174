<html>
<head>
<title>add Favorite</title>
<link rel="stylesheet" type="text/css" href="loginPageStyle.css">

</head>
<body>

<?php
	$link = $_POST['linkToAdd'];
	include 'sessionHandle.php';
	
	if(isset($_SESSION["$link"]))
		print ("<p><h1>This Video is already in your favorites!</h1></p>");
	else
		{$_SESSION["$link"] = $link; 		print ("<p><h1>This Video has been added to your favorites!</h1></p>");}
		
		print ("<p><a href='./viewVideos.php'>Back to View Videos</a></p>");
?>

</body>
</html>