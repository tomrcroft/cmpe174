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
        <title>Change Password</title>
		  <link rel="stylesheet" type="text/css" href="css/editProfileStyle.css">
    </head>
    <body>

				<ul>
					<li><a href='./homepage.php'>Home</a></li>
					<li><a href='./addVideo.php'>Add Video</a></li> 
					<li><a href='./editProfile.php'>Edit Profile</a></li>
					<li><a href='./logout.php'>Logout</a></li>
				</ul>
				<h1>Change Password</h1>
            <form action="changePassword.php" method="post">
				<p>Old Password:
				<input type="password" name="oldpass"></p>
				<p>New Password:
				<input type="password" name="newpass"></p>
				<p><input type="submit" name="submit" value="Submit"></p>
            </form>
        </div>
    </body>
</html>
