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
	<title>Edit Profile</title>
	<link rel="stylesheet" type="text/css" href="css/editProfileStyle.css">
</head>
<body>
<ul>
        <?php
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
</ul>

<h1>Edit Profile</h1>

<p><a href="getEmail.php">Change Email</a></p>

<p><a href="getPassword.php">Change Password</a></p>
<br>

</body>
</html>
