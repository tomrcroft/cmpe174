<?php
	include 'DBconstants.php';

	$username = $_POST['username'];
	$pword = $_POST['password'];
  
$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

		$sql = "SELECT *
				FROM userinfo
				WHERE username='$username';";

	    $result = mysqli_query($con, $sql);
		
		if (mysqli_num_rows($result) == 0)
				header('Location: index.php');	
		else
		{
			$resultArray = mysqli_fetch_array($result, MYSQLI_NUM);
			
			if($resultArray[1] == $pword)
				header('Location: homepage.php');
			else
				header('Location: index.php');
		}
		

?>