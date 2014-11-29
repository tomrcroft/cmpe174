
<?php
	include("DBconstants.php");
	echo "<h1>This doesn't actually clean anything yet, this just selects what needs to be cleaned</h1><br><br>";
	$conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

	if (mysqli_connect_errno()) {
		die("Failed to connect to MySQL: " . mysqli_connect_error());}
	$query_count = "SELECT * FROM fun_video where id > 0 AND viewcount < 50000";
	$query_duplicate_title = "SELECT title, count(*) AS x FROM fun_video GROUP BY title HAVING x > 1 ";
	$query_domain = "SELECT title from fun_video where title NOT LIKE '%Wing Chun%' AND title NOT LIKE '%Wing Tsun%'";
	$result = mysqli_query($conn, $query_count);
	$resultArray = mysqli_fetch_all($result, MYSQLI_BOTH);
	echo "<h2>All rows with count less than 50000</h2>";
	if($resultArray)
	{
		for($x = 0; $x < sizeof($resultArray); $x++)
		{
			for($y = 1; $y < 11; $y++)
				print(" {$resultArray[$x][$y]} ");
		}
	}
	else
	{
		echo("<p>Nothing to see here, move along.<p>");
	}
	$result = mysqli_query($conn, $query_duplicate_title);
	$resultArray = mysqli_fetch_all($result, MYSQLI_BOTH);
	echo "<h2>Videos with duplicate titles</h2>";
	if($resultArray)
	{
		for($x = 0; $x < sizeof($resultArray); $x++)
		{	
			echo "<b>Duplicate #", $x + 1, "</b>:";
			print("{$resultArray[$x][0]} ");
			print("<i>{$resultArray[$x][1]} time(s)</i>");
		}
	}
	else
	{
		echo("<p>Nothing to see here, move along.<p>");
	}
	$result = mysqli_query($conn, $query_domain);
	$resultArray = mysqli_fetch_all($result, MYSQLI_BOTH);
	echo "<h2>Videos outside Wing Chun/Tsun Domain</h2>";
	if($resultArray)
	{
		for($x = 0; $x < sizeof($resultArray); $x++)
		{
			print(" {$resultArray[$x][0]} ");
		}
	}
	else
	{
		echo("<p>Nothing to see here, move along.<p>");
	}
	mysqli_close($conn);

	print("<h2><a href='./viewVideos.php'>View Videos!</a><h2>");
	print("<h2><a href='./index.php'>Back to the main page</a><h2>");
?>