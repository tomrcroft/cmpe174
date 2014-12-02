<?php
	include 'DBconstants.php';

	$username = $_POST['username'];
	$pword = $_POST['password'];

$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
if (mysqli_connect_errno()) {
				die("Failed to connect to MySQL: " . mysqli_connect_error());}
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
						session_start();
						$_SESSION['username'] = $username;
						$_SESSION['password'] = md5($pword);
						$_SESSION['admin'] = $resultArray[2];
						setcookie('usernameCookie', $username, time()+60, '/');
						setcookie('passwordCookie', md5($pword), time()+60, '/');
						setcookie('admin', $resultArray[2], time()+60, '/');
						ob_end_clean();
						header('Location: homepage.php');
						exit();
				}
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = md5($pword);
				$_SESSION['admin'] = $resultArray[2];
				ob_end_clean();
				header('Location: homepage.php');
				exit();
			}
			else
				header('Location: index.php');
		}
		

?>