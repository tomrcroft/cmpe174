<html>
	<head>
		<title>Cleaning the data...</title>
	</head>
	<body>
		<?php
			include("DBconstants.php");
			print ( "<a href='./homepage.php'>Go Home</a>");
			echo "<h1>This doesn't actually clean anything yet, this just selects what needs to be cleaned</h1><br><br>";
			$conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);

			if (mysqli_connect_errno()) {
				die("Failed to connect to MySQL: " . mysqli_connect_error());}
			$query_all = "SELECT * FROM fun_video";
			$query_count = "DELETE FROM fun_video where id > 0 AND viewcount < 50000";
			$query_duplicate_title = "SELECT title, count(*) AS x, id FROM fun_video GROUP BY title HAVING x > 1 ";
			$query_domain = "DELETE FROM fun_video where title NOT LIKE '%Wing Chun%' AND title NOT LIKE '%Wing Tsun%'";
			$query_tag = "SELECT id, tag, title from fun_video" ;// where id = 5";
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
					print("<i>{$resultArray[$x][1]} time(s)</i><br/>");
					if ($x != 0)
					{
						$query = "DELETE from fun_video where id = {$resultArray[$x][2]}";
						echo $query;
					}
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


			$result = mysqli_query($conn, $query_tag);
			$resultArray = mysqli_fetch_all($result, MYSQLI_BOTH);

			if($resultArray)
			{
				$remove = "very,like,them,his,That,at,how,the,be,vs.,to,of,and,a,in,that,have,I,for,you,use,In,The,this,or,Here,This,is,to,my,Just,my,from,are,A,its,was,on";
				$remove = explode(",", $remove);
				print("<br><b>Let's work with tags</b><br>");
				for($x = 0; $x < sizeof($resultArray); $x++)
				{
					print("ID : {$resultArray[$x][0]}<br>");
					if($resultArray[$x][1] != "none")
					{
						$query = [];
						
						print("{$resultArray[$x][1]}<br>");
						$tag = trim($resultArray[$x][1], " ");
						$tag = explode(" ", $tag);
						print "<br>";
						foreach($tag as $value)
						{
							print $value . "<br>";
							if(!in_array($value, $remove) && !empty($value))
							{
								if ($value != "/\s/" && strlen($value) > 2)
								{
									echo "<b>$value</b><br/>";
									//$value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8', TRUE);
									$value = str_replace("'", "", $value);
									if (!empty($value))
										$query[] = $value;
								}
							}
						}
						$query = implode(",", $query);
						//echo $query;

						$update = "UPDATE fun_video SET tag = '$query' WHERE id = {$resultArray[$x][0]}";
						echo $update;
						//echo "<br/>";
						//echo $update;
						//echo "<br/>";
						
						if (mysqli_query($conn, $update))
						{
							echo "Record updated successfully!";
						}
						else 
						{
						    echo "Error updating record: " . mysqli_error($conn);
						}
						echo "<br/>";
					}
					else
					{
						$query = [];
						print "Result is none!<br/>";
						$title = $resultArray[$x][2];
						print "{$resultArray[$x][2]}<br/>";
						$title = explode(" ", $title);
						foreach($title as $value)
						{
							print $value . "<br>";
							if(!in_array($value, $remove) && !empty($value))
							{
								if ($value != "/\s/" && strlen($value) > 2)
								{
									echo "<b>$value</b><br/>";
									$value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8', TRUE);
									if (!empty($value))
										$query[] = $value;
								}
							}
						}
						$query = implode(",", $query);
						$update = "UPDATE fun_video SET tag = '$query' WHERE id = {$resultArray[$x][0]}";
						echo $update;
						if (mysqli_query($conn, $update))
						{
							echo "Record updated successfully!";
						}
						else 
						{
						    echo "Error updating record: " . mysqli_error($conn);
						}
					}
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
	</body>
</html>