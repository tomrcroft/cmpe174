<?php
	include 'DBconstants.php';

	$username = $_POST['myusername'];
	$pword = $_POST['mypass'];
  
$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);


		$sql = "INSERT INTO userinfo
				VALUES('$username', '$pword');"; 

	    $result = mysqli_query($con, $sql);
		
		header('Location: loginPage.php');
		

?>