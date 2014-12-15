<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
		ob_end_clean();
		header('Location: index.php');
		exit();
    }
?>
<html>
<head>
<title>add Favorite</title>
<link rel="stylesheet" type="text/css" href="css/loginPageStyle.css">

</head>
<body>

<?php
	$link = $_POST['linkToAdd'];
	include 'sessionHandle.php';
	
	if(isset($_SESSION["$link"]))
		print ("<p><h1>This Video is already in your favorites!</h1></p>");
	else
		{$_SESSION["$link"] = $link; 		print ("<p><h1>This Video has been added to your favorites!</h1></p>");}
		
		print ("<p><a href='./index.php'>Back to to the index.</a></p>");
?>

</body>
</html>