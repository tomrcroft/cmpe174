<html>
	<head>
		<title>Change Password</title>
	</head>
	<body>
	<?php
	include 'DBconstants.php';
	session_start();
		
	$currentuser = $_SESSION['username'];
	
	$oldpword = $_POST['oldpass'];
	$newpword = $_POST['newpass'];
	
	if(strlen($newpword) < 8)
		echo "<p id='error'>Your new password must be atleast 8 characters in length. Also make sure that there is atleast one number and one letter</p>";
	else if(is_numeric($newpword))
		echo "<p id='error'>Your new password must contain atleast one letter. Also make sure that there is atleast one number</p>";
	else if (preg_match('/[a-z]+[0-9]+/', $newpword) == 0)
		echo "<p id='error'>Your new password must contain letters and numbers</p>";
	else
	{
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);


		$sql = "UPDATE userInfo " . 
					"SET pword = '$newpword' ". 
					"WHERE username = '$currentuser' " . 
					"AND pword = '$oldpword'"; 
		
		
	   if(mysqli_query($con, $sql))
	   {	
			error_reporting(E_ALL);
			ini_set('display_errors', TRUE);
			echo "<p id='redo'><a href='./homepage.php'>Back to your homepage</a></p>";
			exit();
	   }
		else 
		{
		    echo "Error inserting record: " . mysqli_error($con);
		}
		
	}
	?>		
	</body>
</html>
