<?php
//ini_set("error_log", "http://www.sjsu-cs.org/classes/cs174/sec1/croft/project/php-error.log");
	session_start();
		if(!isset($_POST["sortBy"]))
			$display = "Title";
		else
			$display = $_POST["sortBy"];
			
		if(isset($_GET["sortby"]))
			$display = $_GET["sortby"];
			
		if(isset($_POST['search']))
			$search = htmlentities($_POST['search']);
		else
			$search = htmlentities($_GET['search']);
			
	$output=getVideos();
	
	$pagenum = 0;
			
	if(isset($_GET['pagenum']))
		$pagenum = $_GET['pagenum'];
			//echo "before $pagenum";

	if(isset($_GET['prev']))
		{
			if($pagenum == 0 || $pagenum == 9)
				$pagenum = 0;
			else 
				$pagenum = $pagenum - 10;
		}
	
	if(isset($_GET['next']))
		{
			if($pagenum == 0 && !((sizeof($output) - $pagenum) < 10))
				$pagenum = $pagenum + 9;
			else if((sizeof($output) - $pagenum) < 10)
				$pagenum = $pagenum;
			else
				$pagenum += 10;
		}
		if($pagenum == 0)
			$realpagenum = 1;
		else
			$realpagenum = round($pagenum / 10) + 1;
	//echo "after $pagenum";
		
			
			
	?>
<html>
<head>
<title>Wing Chun Videos</title>
<link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
                     <?
            if ( isset($_SESSION["username"]))
            {
                $username = $_SESSION["username"];
                echo "<div>";
                echo ("Hello, $username!<br>");
                echo "</div>";
            }
            ?>
<ul>
	<li><a href='./homepage.php'>Home</a></li>
	<li><a href='./index.php'>Start Up</a></li>

	<li><a href='./addVideo.php'>Add Video</a></li> 
	<li><a href='./editProfile.php'>Edit Profile</a></li>
	<li><a href='./logout.php'>Logout</a></li>
</ul>


     <?php
        if(!isset($_SESSION['username']))
        {
            echo "<div class='topcorner'>
            <form name='loginForm' action='loginFile.php' method='post' >
            <p>Login here!<br></p>
		    Username:
		    <input name='username' type='email' id='usernameInput'>
            <br>
		    Password:
		    <input name='password' type='password' id='passwordInput'>
            <br>
            <input class='b' type='submit' name='submit' value='Login'>
            <br>
	        <a href='registration.php' ><span style ='color:blue;'> Click here to register</span></a>
            <br><input type='checkbox' name='cookiecheck' value='Yes' /> Remember Username and Password? <br
            </form><br><br>";
        }
        else
        {
            $username = $_SESSION["username"];
            echo "<div>";
            echo ("<br>Hello, $username!<br>");
            echo "<a href='homepage.php'> <span stile ='color:blue;'>Go to Homepage</span></a><br>";
            echo "<a href='./logout.php'>Logout</a>";
            echo "</div>";
        }

           
        ?>
</div>
    			<?php

                echo("<form id='search' action='search.php' method='POST'>");
                echo("<input type='submit' value='Search'><input type='text' name='search'>");
                echo("</form>");

            ?>
    <br><br>
    <form id="selectForm" action="index.php" method="post">
			<select id='sortBy' name='sortBy'>
				<option value="Title" selected>Title</option>
				<option value="Length">Length</option>
				<option value="Resolution">Resolution</option>
				<option value="Language">Language</option>
				<option value="Views">Views</option>
				<option value="Video type">Video Type</option>
			</select>
			
			<input type='submit' value='Submit'>
			
						<br>
			

			
			Currently Sorted by: <?= $display;?>
			<div id="addVideoDiv">
			<a href="./addVideo.php">Add a Video!</a>
			<br>
			</div>
			
			<?php
			if($_SESSION['admin'])
			{
				echo "<div id='editVideoDiv'>";
				echo "<a href='./editVideo.php'>Edit a Video!</a>";
				echo "<br>";
				echo "</div>";
			}
			?>
			
		</form>

		<?php
		

	    print("<br><br>");
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
                if(isset($_SESSION['username']))
				{
                    print("<th>Add To Favorite</th>");
                }
			print("</tr>");
			//$output=getVideos();
			if((sizeof($output) - $pagenum) < 10)
				$pagenumindex = sizeof($output);
			else 
				$pagenumindex = $pagenum + 10;

			for($x = $pagenum; $x < $pagenumindex; $x++)
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
                if(isset($_SESSION['username']))
				{
                    print("
				    <td>
					<form action='addFavorite.php' method='post'>
						<input type='text' style='display:none' name='linkToAdd' value='{$output[$x][2]}'>
						<input type='submit' name='addToFav' value='Add'>
					</form>
				    </td>");
				    print("</tr>");
                }
				
				
			}
			
			print("<div id='paginationDiv'>");
				echo("<form id='pagination' action='search.php' method='GET'>");
				echo "<input type='text' style='display:none' name='search' value='$search'>";
				echo "<input type='text' style='display:none' name='pagenum' value='$pagenum'>";
				echo "<input type='text' style='display:none' name='sortby' value='$display'>";
                echo("<input type='submit' name='prev' value='Previous'>");
				echo("$realpagenum");
				echo("<input type='submit' name='next' value='Next'>");
                echo("</form>");
				print("</div>");
			
			function getVideos(){
                include 'DBconstants.php';


	            global $display;
                global $search;
               
                $con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
	            $query = "select * from fun_video_all where tag like '%$search%';";
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
		</table>
</body>
</html>
