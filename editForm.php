<html>
<head>
	<title>Here's the edit</title>
	<link rel="stylesheet" type="text/css" href="loginPageStyle.css">
	</head>
	<body>
<?php
include 'DBconstants.php';
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
$id = $_POST["id"];

$conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " . mysqli_connect_error());}
$query = "UPDATE fun_video SET title='$title', videolink='$link', videolength='$length', highestresolution='$res', description='$description',
	language='$language', viewcount='$views', videotype='$type', iconimage='$image', tag='$tags' WHERE id = '$id'";
//print $query;
if (mysqli_query($conn, $query))
{
	echo "<h1><i>$title</i> updated successfully!</h1><br>";

	echo "<h2><a href='./editVideo.php'>Edit Another Video</h2><br>";
	echo "<h2><a href='./homepage.php'>Back to the homepage.</h2>";
}
else 
{
    echo "Error updating record: " . mysqli_error($conn);
}
?>
</body>
</html>
