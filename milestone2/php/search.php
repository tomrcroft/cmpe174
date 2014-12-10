<?php
session_start();
if(!isset($_POST["sortBy"]))
	$display = "Title";
else
	$display = $_POST["sortBy"];
#$search = $_POST['search'];
#echo($search);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        		<title>Searching..</title>
		<link rel="stylesheet" type="text/css" href="viewVideos.css"> 
    </head>
    <body>
        		<form id="selectForm" action="viewVideos.php" method="post">
			<select id='sortBy' name='sortBy'>
				<option value="Title" selected>Title</option>
				<option value="Length">Length</option>
				<option value="Resolution">Resolution</option>
				<option value="Language">Language</option>
				<option value="Views">Views</option>
				<option value="Video type">Video Type</option>
			</select>
			
			<input type='submit' value='Submit'>
                    			
			Currently Sorted by: <?= $display;?>
			<div id="addVideoDiv">
			<a href="./addVideo.php">Add another Video!</a>
			<br>

			<a href="./homepage.php">Go back Home!</a>
			</div>
			
		</form>
        		            <?php
                          $search = $_POST['search'];
                echo("Search by tag: ");
                echo("<form id='search' action='search.php' method='POST'>");
                echo("<input type='text' name='search' value='$search'><input type='submit' value='Search'>");
                echo("</form>");

            ?>

        <?php
		

	
		print("<table id='videos'>");
			print("<tr>");
				print("<th>Video Image</th>");
				print("<th>Video Link</th>");
				print("<th>Video Title</th>");
				print("<th>Video Length</th>");
				print("<th>Highest Resolution</th>");
				print("<th>Video Description</th>");
				print("<th>Video Language</th>");
				print("<th>View Count</th>");
				print("<th>Video Type</th>");
				print("<th>Tags</th>");
				print("<th>Add To Favorite</th>");
			print("</tr>");
			$output=getVideos();
            for($x = 0; $x < sizeof($output); $x++)
			{
				print("<tr>");
				print("<td><a target='_blank' href='{$output[$x][2]}'>
  <img src='{$output[$x][9]}' alt='video image' style='width:42px;height:42px;border:0'>
</a></td>");
				print("<td>{$output[$x][2]}</td>");
				print("<td>{$output[$x][1]}</td>");
				print("<td>{$output[$x][3]}</td>");
				print("<td>{$output[$x][4]}</td>");
				print("<td>{$output[$x][5]}</td>");
				print("<td>{$output[$x][6]}</td>");
				print("<td>{$output[$x][7]}</td>");
				print("<td>{$output[$x][8]}</td>");
				print("<td>{$output[$x][10]}</td>");
				
				//add favorite form
				print("
				<td>
					<form action='addFavorite.php' method='post'>
						<input type='text' style='display:none' name='linkToAdd' value='{$output[$x][2]}'>
						<input type='submit' name='addToFav' value='Add'>
					</form>
				</td>");
				print("</tr>");
			}
            function getVideos(){
                include 'DBconstantsR.php';


	            global $display;
                $search = htmlentities($_POST['search']);
               
                $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
	            $query = "select * from fun_video where tag like '%$search%';";
                #echo($query);
	            if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                } 


	            $result = mysqli_query($con, $query);
	            $resultArray = array();
	            while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
		            array_push($resultArray, $row);
	            }
	
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
				            usort($resultArray, "sortTitle");
			            }
			            break;
			
		            case "Length":
			            {
				            usort($resultArray, "sortLength");
			            }
			            break;
			
		            case "Resolution":
			            {
				            usort($resultArray, "sortResolution");
			            }
			            break;
			
		            case "Language":
			            {
				            usort($resultArray, "sortLanguage");
			            }
			            break;
			
		            case "Views":
			            {
				            usort($resultArray, "sortViews");
			            }
			            break;
			
		            case "Video type":
			            {
				            usort($resultArray, "sortType");
			            }
			            break;
	            }
	            return $resultArray;
	
}

function sortTitle($a, $b) {
					return strcmp($a[1],$b[1]);
				}
				
function sortLength($a, $b) {
					return $b[3] - $a[3];
				}
				
function sortResolution($a, $b) {
					return $b[4] - $a[4];
				}
				
function sortLanguage($a, $b) {
					return strcmp($a[6],$b[6]);
				}
				
function sortViews($a, $b) {
					return $b[7] - $a[7];
				}
				
function sortType($a, $b) {
					return strcmp($a[8],$b[8]);
				}
	
	

			?>
    </body>
</html>
