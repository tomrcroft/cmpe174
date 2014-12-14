<?php
session_start();
?>
<html>
<head>
<title>Homepage</title>
<link rel="stylesheet" type="text/css" href="../css/viewVideos.css">

</head>
<body>

<ul>
	<li><a href='./homepage.php'>Home</a></li>
				<li><a href='./index.php'>Start Up</a></li>

	<li><a href='./addVideo.php'>Add Video</a></li>
	<li><a href='./viewVideos.php'>View Videos</a></li>
	<li><a href='./editProfile.php'>Edit Profile</a></li>
	<li><a href='./logout.php'>Logout</a></li>
</ul>


<h1> Welcome to the Homepage! </h1>






<?php
	/**
	This needs to be hidden is the user is not an admin.
	*/
	
	if($_SESSION['admin'])
	{
		print ("<p  id='mya'><h3>Admin Functions:</h3>");
		print ("<h3><a href='./editVideo.php'>Edit a Video!</a></h3></p>");
		//print ("<br><a href='./cleandata.php'>Clean the data</a>");
	}
	
	print("<p> <h1> Your List of Favorites </h1> </p>");
	
	session_write_close();
	
	include 'sessionHandle.php';	
	$output = array();
	
	
	foreach($_SESSION as $value)
	{//echo "value is: " .$value;
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$result = mysqli_query($con,"select * from fun_video_all WHERE videolink='$value'");
		$resultArray = array();
	while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
		array_push($resultArray, $row);
	}
		array_push($output, $resultArray[0]);
	}

	if(isset($output[0]))
	{
		print("<table id='videos'>
				<tr>
					<th>Video Image</th>
					<th>Video Link</th>
					<th>Video Title</th>
					<th>Video Length</th>
					<th>Highest Resolution</th>
					<th>Video Description</th>
					<th>Video Language</th>
					<th>View Count</th>
					<th>Video Type</th>
					<th>Tags</th>
					<th>Delete From Favorites</th>
				</tr>");
		
		for($x = 0; $x < sizeof($output); $x++)
				{
					print("<tr>");
					print("<td><a target='_blank' href='{$output[$x][2]}'>
	  <img src='{$output[$x][9]}' alt='video image' style='width:42px;height:42px;border:0'>
	</a></td>");
					print("<td>{$output[$x][2]}</td>");
					print("<td>{$output[$x][1]}</td>");
					print("<td>{$output[$x][3]}</td>");
					print("<td>{$output[$x][4]}</td>");
					print("<td>{$output[$x][5]}</td>");
					print("<td>{$output[$x][6]}</td>");
					print("<td>{$output[$x][7]}</td>");
					print("<td>{$output[$x][8]}</td>");
					print("<td>{$output[$x][10]}</td>");
				
					print("<td>
							<form id='delete' action='deleteFavorite.php' method='POST'>
								<input type='text' style='display:none' name='linkToDelete' value='{$output[$x][2]}'>
								<input type='submit' name='addToFav' value='Delete'>
							</form>
						   </td>");
				
					print("</tr>");
				}
				
				print("</table>");
	}
	
?>
<!-- <a href='./addVideo.php'>Add Video!</a> -->

<br>




</body>
</html>
