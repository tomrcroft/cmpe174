<?php
session_start();
?>
<html>
<head>
<title>Homepage</title>
<link rel="stylesheet" type="text/css" href="../css/viewVideos.css">

</head>
<body>

<p>

<h1> Welcome to the Homepage! </h1>

</p>

<p>

<a href='./addVideo.php'>Add Video!</a>

<br>

<a href='./viewVideos.php'>View Videos!</a>

<?php
	/**
	This needs to be hidden is the user is not an admin.
	*/
	
	if($_SESSION['admin'])
	{
		print ("<h3>Admin Functions:</h3>");
		print ("<a href='./editVideo.php'>Edit a Video!</a>");
		//print ("<br><a href='./cleandata.php'>Clean the data</a>");
	}
	if($_SESSION)
	{
		print ("<br><br><br><a href='./logout.php'>Logout</a>");
	}	
	
	//populate favorites
	
	print("<p> <h1> Your List Of Favorites </h1> </p>");
	
	session_write_close();
	
	include 'sessionHandle.php';	
	$output = array();
	
	
	foreach($_SESSION as $value)
	{
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$result = mysqli_query($con,"select * from fun_video WHERE videolink='$value'");
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
					
				
					print("</tr>");
				}
				
				print("</table>");
	}
	
?>
<!-- <a href='./addVideo.php'>Add Video!</a> -->

<br>

</p>


</body>
</html>