<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <?php
			include("DBconstants.php");
            $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
            $query_all = "SELECT * FROM fun_video_all";
			$query_count = "DELETE FROM fun_video_all where id > 0 AND viewcount < 50000";
			$query_duplicate_title = "SELECT videolink, count(right(videolink,11)) AS x, id FROM fun_video_all GROUP BY videolink HAVING x > 1 ";
			$query_domain = "SELECT * FROM fun_video_all where title NOT LIKE '%Tai Chi%' AND title NOT LIKE '%Taichi%' AND title NOT LIKE '%Taiji%' AND title NOT LIKE '%tai ji%' AND title NOT LIKE '%Wing Chun%' AND title NOT LIKE '%Wing Tsun%' AND title NOT LIKE '%Yang Taichi%' AND 
            title NOT LIKE '%Chen Taichi%' AND title NOT LIKE '%Qi Gong%' AND title NOT LIKE '%Qigong%' AND title NOT LIKE '%Shaolin%' AND title NOT LIKE '%Taekwondo%' AND title NOT LIKE '%Tae kwon%' AND title NOT LIKE '%Tae-kwon%' AND title NOT LIKE '%Tae kwon do%' AND title NOT LIKE '%Aikido%' AND title NOT LIKE '%Judo%' AND id > 0";
			$query_tag = "SELECT id, tag, title from fun_video_all";
            $result = mysqli_query($conn, $query_count);
            $resultArray = mysqli_fetch_all($result, MYSQLI_BOTH);
            echo("<h2>Titles with count less than 50,000</h2><br>");
            if( mysqli_query($conn, $query_count))
            {
				printf("Affected rows (DELETE): %d\n", mysqli_affected_rows($conn));
			}
			else
			{
				#echo("<p>Nothing to see here, move along.<p>");
			}
            /*if(mysqli_query($conn, $query_count))
			{
				//printf("Affected rows (DELETE): %d\n", mysqli_affected_rows($conn));
			}
			else
			{
				echo("<p>Nothing to see here, move along.<p>");
			}*/
			$result = mysqli_query($conn, $query_duplicate_title);
			$resultArray = mysqli_fetch_all($result, MYSQLI_BOTH);
			echo "<h2>Videos with duplicate titles</h2>";
            $youtubeids = array();
			if($resultArray)
			{	
				
				for($x = 0; $x < sizeof($resultArray); $x++)
				{	
					echo "<b>Duplicate #", $x + 1, "</b>:";
					print("{$resultArray[$x][0]} ");
					print("<i>{$resultArray[$x][1]} time(s)</i><br/>");
					$youtubeids[] = substr($resultArray[$x][0], -11);
					//$query = "SELECT * FROM fun_video_all where videolink LIKE '%$videolink' ORDER BY id;";
					//print "$query<br>";
					//$result = mysqli_query($conn, $query);
                    //$resultA = mysqli_fetch_all($result, MYSQLI_BOTH);	

				}
			}
			else
			{
				echo("<p>Nothing to see here, move along.<p>");
			}
            $ids = array("");
            foreach($youtubeids as $id)
            {
                $query = "SELECT * FROM fun_video_all where videolink LIKE '%$id'";
                $result = mysqli_query($conn, $query);
                $resultA = mysqli_fetch_all($result, MYSQLI_BOTH);	
                if($resultA)
                {
                    echo("$id<br>");
                    for($x = 0; $x <sizeof($resultA); $x++)
                    {
                        echo("{$resultA[$x][0]}, {$resultA[$x][1]}, {$resultA[$x][2]}<br>");
                        if($x != 0)
                        {    
                            $ids[] = $resultA[$x][0];
                            echo("<br>{$resultA[$x][0]} added.<br>");
                        }
                    }
                }
            }
            echo("<br>");

            echo(count($ids));
            echo(" duplicate(s) to be deleted.<br>");
            foreach($ids as $id)
            {
                $query = "DELETE FROM fun_video_all where id = $id";
                if( mysqli_query($conn, $query))
                {
				    printf("Affected rows (DELETE): %d\n", mysqli_affected_rows($conn));
			    }
			    else
			    {
				    #echo("<p>Nothing to see here, move along.<p>");
			    }
            }

	
			/*echo "<h2>Videos outside Wing Chun/Tsun Domain</h2>";
			if(mysqli_query($conn, $query_domain))
			{
				printf("Affected rows (DELETE): %d\n", mysqli_affected_rows($conn));
			}
			else
			{
				echo("<p>Nothing to see here, move along.<p>");
			}*/


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

						$update = "UPDATE fun_video_all SET tag = '$query' WHERE id = {$resultArray[$x][0]}";
						echo $update;
						//echo "<br/>";
						//echo $update;
						//echo "<br/>";
						
						if (mysqli_query($conn, $update))
						{
							echo "<br>Record updated successfully!";
						}
						else 
						{
						    echo "<br>Error updating record: " . mysqli_error($conn);
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
						$update = "UPDATE fun_video_all SET tag = '$query' WHERE id = {$resultArray[$x][0]}";
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
