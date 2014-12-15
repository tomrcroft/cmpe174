<?php
	
	include 'sessionHandle.php';
	
	$favorites = array();
	unset($favorites[0]);

	
	foreach($_SESSION as $value)
	{
		echo $value;
		array_push($favorites, "$value");
	}
	
?>