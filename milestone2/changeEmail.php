<html>
	<head>
		<title>Change Email</title>
	</head>
	<body>
	<?php
		include 'DBconstants.php';
		session_start();
		
		$currentuser = $_SESSION['username'];
		
		$newusername = $_POST['myusername'];
		$thepword = $_POST['pass'];
		
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);


		$sql = "UPDATE userInfo " . 
					"SET username = '$newusername' ". 
					"WHERE username = '$currentuser' " . 
					"AND pword = '$thepword'"; 
			
			
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
	?>		
	</body>
</html>
