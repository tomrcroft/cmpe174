<html>
	<head>
		<title>View Videos</title>
		<link rel="stylesheet" type="text/css" href="viewVideos.css">
	</head>
	
	<body>
	<?php
		if(!isset($_POST["sortBy"]))
			$display = "Title";
		else
			$display = $_POST["sortBy"];
	?>
		<form id="selectForm" action="viewVideos.php" method="post">
			<select id='sortBy' name='sortBy'>
				<option value="Title" selected>Title</option>
				<option value="Length">Length</option>
				<option value="Resolution">Resolution</option>
				<option value="Language">Language</option>
				<option value="Views">Views</option>
				<option value="Video type">Video Type</option>
			</select>
			
			<input type='submit' value='Submit'>
			
						<br>
			
			
			
			Currently Sorted by: <?= $display;?>
			<div id="addVideoDiv">
			<a href="./index.php">Add another Video!</a>
			<br>
			<a href="./homepage.php">Go back Home!</a>
			</div>
			
		</form>
		
		
	
		<table id='videos'>
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
			</tr>
			<?php
			$output=getVideos();
			//$sizez = sizeof($output[0]);
			//print($output[0][1]);
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
			?>
		</table>
	</body>

</html>

<?php

function getVideos()
{
include 'DBconstants.php';

	global $display;
$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

	$query = "
		select *
		from fun_video;";

	$result = mysqli_query($con, $query);
	$resultArray = mysqli_fetch_all($result, MYSQLI_BOTH);
	
	$sortedBy = $display;
	
	// <option value="Title" selected>Title</option>
				// <option value="Length">Length</option>
				// <option value="Resolution">Resolution</option>
				// <option value="Description">Description</option>
				// <option value="Language">Language</option>
				// <option value="Views">Views</option>
				// <option value="Video type">Video Type</option>
				// <option value="Tag">Tag</option>
	
	switch($sortedBy)
	{
		case "Title":
			{
				usort($resultArray, function($a, $b) {
					return strcmp($a[1],$b[1]);
				});
			}
			break;
			
		case "Length":
			{
				usort($resultArray, function($a, $b) {
					return $b[3] - $a[3];
				});
			}
			break;
			
		case "Resolution":
			{
				usort($resultArray, function($a, $b) {
					return $b[4] - $a[4];
				});
			}
			break;
			
		case "Language":
			{
				usort($resultArray, function($a, $b) {
					return strcmp($a[6],$b[6]);
				});
			}
			break;
			
		case "Views":
			{
				usort($resultArray, function($a, $b) {
					return $b[7] - $a[7];
				});
			}
			break;
			
		case "Video type":
			{
				usort($resultArray, function($a, $b) {
					return strcmp($a[8],$b[8]);
				});
			}
			break;
	}
	
	return $resultArray;
	
}
?>