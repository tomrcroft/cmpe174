<html>
	<head>
		<title>Register Error!</title>
		<link rel="stylesheet" type="text/css" href="../css/register_style.css">
	</head>
	<body>
	<?php
	include 'DBconstants.php';

	$username = $_POST['myusername'];
	$pword = $_POST['mypass'];
	
	if(strlen($pword) < 8)
		echo "<p id='error'>Registration was not successful, your password must be atleast 8 characters in length. Also make sure that there is atleast one number and one letter</p>";
	else if(is_numeric($pword))
		echo "<p id='error'>Registration was not successful, your password must contain atleast one letter. Also make sure that there is atleast one number</p>";
	else if (preg_match('/[a-z]+[0-9]+/', $pword) == 0)
		echo "<p id='error'>Registration was not successful, your password must contain letters and numbers</p>";
	else
	{
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);


		$sql = "INSERT INTO userInfo (username, pword, admin)
				VALUES('$username', '$pword', 0)"; 
	    if(mysqli_query($con, $sql))
	    {	error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		echo "<p id='redo'><a href='./index.php'>Login!</a></p>";
		exit();
	    }
		else 
		{
		    echo "Error inserting record: " . mysqli_error($con);
		}
		
	}

		echo "<p id='redo'><a href='./registration.php'>Register again</a></p>";
?>
</body>

</html>