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
        <title>Change Email</title>
		  <link rel="stylesheet" type="text/css" href="css/editProfileStyle.css">
    </head>
    <body>
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
				<h1>Change Email</h1>
            <form action="changeEmail.php" method="post">
				<p>New Email:
				<input type="email" name="myusername"></p>
				<p>Password:
				<input type="password" name="pass"></p>
				<p><input type="submit" name="submit" value="Submit"></p>
            </form>
        </div>
    </body>
</html>
