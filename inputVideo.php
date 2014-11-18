<html>
	<head>
		<link rel="stylesheet" type="text/css" href="inputVideo.css">
	</head>
<body>
<?php
/**
1. Video Title

2. Video Link

3. Video Length (round to the closest minutes)

4. Highest resolution: 144p, 240p, 360p, 480p, 760p, 1080p (select one)

5. Video description

6. Language: English/Non-English

7. View Count

8. Video type: Tutorial, Entertainment, Application, Weapon, Group demo, Others (select one or more)

9. Video icon image

10. Tag (keywords about the site separated by commas)
**/

include 'DBconstants';

$title = $_POST["title"];
$link = $_POST["link"];
$length = $_POST["length"];
$res = $_POST["res"];
$description = $_POST["description"];
$language = $_POST["language"];
$views = $_POST["views"];
$type = implode(",",$_POST["type"]);
$image = $_POST["image"];
$tags = $_POST["tags"];



$con = mysqli_connect("localhost", "root", "password", "cs174bonushw");

if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " . mysqli_connect_error());}

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
</body>
</html>