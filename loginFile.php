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
			{
				if(isset($_POST['cookiecheck']) && $_POST['cookiecheck'] == 'Yes')
				{
						setcookie('usernameCookie', $username, time()+60, '/');
						setcookie('passwordCookie', md5($pword), time()+60, '/');
						setcookie('admin', $resultArray[2], time()+60, '/');
				}
				header('Location: homepage.php');
			}
			else
				header('Location: index.php');
		}
		

?>