<?php

?>
<html>
<head>
<title>Wing Chun Videos</title>
<link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>

        <?php
            session_start();
            $username = $_SESSION["username"];
            //echo "<div class='topcorner'>";
			echo "<div>";
			echo ("<ul id='navlist'>");
            echo ("<li>Hello, $username!</li>");
			echo "<li><a href='./homepage.php'>Home</a></li>";
			echo "<li><a href='./index.php'>Start Up</a></li>";
			echo "<li><a href='./addVideo.php'>Add Video</a></li>"; 
			echo "<li><a href='./editProfile.php'>Edit Profile</a></li>";
			echo "<li><a href='./logout.php'>Logout</a></li>";
			echo "</ul>";
?>

<?php
	$link = $_POST['linkToDelete'];
	 include 'sessionHandle.php';
	
	if(!isset($_SESSION["$link"]))
		print ("<p><h1>This Video is not in your favorites!</h1></p>");
	else
		{
			unset($_SESSION["$link"]); 	
			
			if(isset($_SESSION["$link"]))
				print ("<p><h1>This Video has not been deleted from your favorites!</h1></p>");
            else
				print ("<p><h1>This Video has been deleted from your favorites!</h1></p>");
		}
	print("<p><a href='./homepage.php'>Go back to homepage.</a></p>");
		
?>
</body>
</html>