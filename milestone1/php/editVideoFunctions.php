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