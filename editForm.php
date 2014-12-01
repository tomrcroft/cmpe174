<?php
$title = $_POST["title"];
$link = $_POST["link"];
$length = $_POST["length"];
$res = $_POST["res"];
$description = $_POST["desc"];
$language = $_POST["lang"];
$views = $_POST["views"];
$type = implode(",",$_POST["type"]);
$image = $_POST["imagelink"];
$tags = $_POST["tags"];

$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " . mysqli_connect_error());}
$query = "UPDATE fun_video SET title=$title,"
$result = mysqli_query($con, "insert into fun_video (title, videolink, videolength, highestresolution, description, language, viewcount, videotype, iconimage, tag)
					VALUES('$title', '$link', $length, '$res', '$description', '$language', $views, '$type', '$image', '$tags');");
		

		
if($result == true)
{
	print("<h1><a href='./viewVideos.php'>View Videos!</a><h1>");
	print("<h1><a href='./index.php'>Add More Videos!</a><h1>");
}
else 
	echo $result;
?>