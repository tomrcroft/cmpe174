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
	 			<ul>
					<li><a href='./homepage.php'>Home</a></li>
					<li><a href='./addVideo.php'>Add Video</a></li> 
					<li><a href='./editProfile.php'>Edit Profile</a></li>
					<li><a href='./logout.php'>Logout</a></li>
				</ul>
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
