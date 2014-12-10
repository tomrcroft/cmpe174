<?php
	$link = $_POST['linkToDelete'];
	include 'sessionHandle.php';
	
	if(!isset($_SESSION["$link"]))
		print ("<p><h1>This Video is not in your favorites!</h1></p>");
	else
		{$_SESSION["$link"] = $link; 		print ("<p><h1>This Video has been deleted from your favorites!</h1></p>");}
		
		
?>