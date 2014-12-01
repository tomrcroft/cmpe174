
<html>
	<head>
		<title>Let's edit a video...</title>
		<link rel="stylesheet" type="text/css" href="viewVideos.css">
		<script src="code.jquery.com/jquery-latest.min.js"></script>
	</head>
	<body>
	<?php
		if(!isset($_POST["sortBy"]))
			$display = "Title";
		else
			$display = $_POST["sortBy"];
	?>
		<form id="selectForm" action="editVideo.php" method="post">
			<select id='sortBy' name='sortBy'>
				<option value="Title" selected>Title</option>
				<option value="Length">Length</option>
				<option value="Resolution">Resolution</option>
				<option value="Language">Language</option>
				<option value="Views">Views</option>
				<option value="Video type">Video Type</option>
			</select>
			
			<input type='submit' value='Submit'>		
			
			
			Currently Sorted by: <?= $display;?>
			
			
		</form>
		<?php 
		echo("<p><a href='./homepage.php'>Go home</a></p>");
		?>
		
	
		<table id='videos'>
			<tr>
				<th>Video Image</th>
				<th>Video Link</th>
				<th>Image Link</th>
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
				print("<form id='editForm' action='editForm.php' method='POST'>");
				print("<td><input type='hidden' name='id' value='{$output[$x][0]}'>
					<img src='{$output[$x][9]}' alt='video image' style='width:42px;height:42px;border:0'>
</td>");
				print("<td><input type='text' name='link' value='{$output[$x][2]}'></td>");
				print("<td><input type='text' name='imagelink' value='{$output[$x][9]}' ></td>");
				print("<td><input type='text' name='title' value='{$output[$x][1]}'></td>");
				print("<td><input type='number' name='length' value='{$output[$x][3]}'></td>");
				print("<td><select name='res'>");
				printResolution(144, $output[$x][4]);
				printResolution(240, $output[$x][4]);
				printResolution(360, $output[$x][4]);
				printResolution(480, $output[$x][4]);
				printResolution(720, $output[$x][4]);
				printResolution(1080, $output[$x][4]);
				print("</select></td>");
				print("<td><textarea name='desc'>{$output[$x][5]}</textarea></td>"); 
				print("<td><select name='lang'>");
				printLang("English", $output[$x][6]);
				printLang("Non-English", $output[$x][6]);
				print("</select></td>"); 
				print("<td><input type='number' name='views' value='{$output[$x][7]}'></td>");
				print("<td><select multiple name='type[]'>");
				printType("Tutorial", $output[$x][8]);
				printType("Entertainment", $output[$x][8]);
				printType("Application", $output[$x][8]);
				printType("Weapon", $output[$x][8]);
				printType("Group Demo", $output[$x][8]);
				printType("Others", $output[$x][8]);
				print("</select></td>");
				print("<td><input type='text' name='tags' value='{$output[$x][10]}'></td>");
				print("<td><input type='submit' value='Update'></td>");
				print("</tr>");
				print("</form>");
				
			}
			?>
		</table>
	</body>

</html>

<?php
function printResolution($res, $actual)
{
	$printp = $res . "p";
	if ($actual == $res)
	{
		print ("<option value=$res selected=\"selected\" >$printp</option>");
	}
	else
	{
		print ("<option value='$res'>$printp</option>");
	}
}
function printType($type, $actual)
{
	$short = substr($type, 1);
	if(strpos($actual, $short))
	{
		print ("<option value=$type selected=\"selected\" >$type</option>");		
	}
	else
	{
		print ("<option value=$type >$type</option>");
	}
}
function printLang($lang, $actual)
{
	if($actual == $lang)
	{
		print ("<option value=$lang selected=\"selected\" >$lang</option>");
	}
	else
	{
		print ("<option value=$lang>$lang</option>");
	}
}
function getVideos()
{
include 'DBconstants.php';

	global $display;
$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

	$query = "
		select *
		from fun_video";

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
	</body>
</html>