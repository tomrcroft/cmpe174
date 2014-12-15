<?php
//ini_set("error_log", "http://www.sjsu-cs.org/classes/cs174/sec1/croft/project/php-error.log");
	session_start();
		if(!isset($_POST["sortBy"]))
			$display = "Title";
		else
			$display = $_POST["sortBy"];
			
		if(isset($_GET["sortby"]))
			$display = $_GET["sortby"];
	
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
			if($pagenum == 0)
				$pagenum = $pagenum + 9;
			else if($pagenum == 49)
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

<script LANGUAGE="JavaScript">
 		var timeDelay = 10;
 		var videoOptions =  "?controls=0&amp;showinfo=1&amp;autoplay=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org"
 		var randomVideoOptions =  "?controls=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org"
 		var randomVideos = [];
 		var videos = 
 		[
 			"https://www.youtube.com/embed/uVkjj8568d8" 
 			,"https://www.youtube.com/embed/NkJ6x1tIlY4"
 			,"https://www.youtube.com/embed/dTGeH5Fr8p0"
 			,"https://www.youtube.com/embed/5AKFNCIJdvA"	
 			,"https://www.youtube.com/embed/YWQKA18ADLs"
 			,"https://www.youtube.com/embed/6LhRIk_yCQU"
 			,"https://www.youtube.com/embed/hBxqptNa6"
 			,"https://www.youtube.com/embed/Iq4IdP1YiL8"
 			,"https://www.youtube.com/embed/Gd2A8L87v2I"
 			,"https://www.youtube.com/embed/g4fKTwi1F_o"
 			,"https://www.youtube.com/embed/HEH3kzYCEDs"
 			,"https://www.youtube.com/embed/upwyWKzozII"
 			,"https://www.youtube.com/embed/QH13kYFzfFk"
 			,"https://www.youtube.com/embed/DhETnNWajrA"
 		];

 		var arrayLength = videos.length;
 		timeDelay *= 1000;
 		var PicCurrentNum = 0;
 		var PicCurrent = new Image();
 		PicCurrent.src = videos[PicCurrentNum];

 		function getNextRandomVideo() {
 			var idx = Math.floor(Math.random() * 100);
 			idx = idx % arrayLength;
 			return idx; 
 		}

 		function randomVideoIndexes(requiredVideos) {
 			var arr = []
 			while(arr.length < requiredVideos){
 				var randomnumber=getNextRandomVideo();
 				var found=false;
 				for(var i=0;i<arr.length;i++){
 					if(arr[i]==randomnumber){found=true;break}
 				}
 				if(!found)arr[arr.length]=randomnumber;
 			}
 			return arr;
 		}

 		function startVideos() {
 			var randomIndexes = randomVideoIndexes(4);
 			document.getElementById("ytplayer1").src = videos[randomIndexes[0]]+randomVideoOptions;
 			document.getElementById("ytplayer2").src = videos[randomIndexes[1]]+randomVideoOptions;
 			document.getElementById("ytplayer3").src = videos[randomIndexes[2]]+randomVideoOptions;
 			document.getElementById("ytplayer4").src = videos[randomIndexes[3]]+randomVideoOptions;

 			setInterval("slideshow()", timeDelay);

 		}
 		function slideshow() {
 			PicCurrentNum++;
 			if (PicCurrentNum == arrayLength) {
 				PicCurrentNum = 0;
 			}
 			PicCurrent.src = videos[PicCurrentNum];
 			var srcString = PicCurrent.src + videoOptions
 			document.getElementById("ytplayer").src = srcString;

			//document.getElementById('ytplayer').mute();
		}

	</script>

</head>
<body OnLoad="startVideos()">

<div id='slideshow'>
<iframe id="ytplayer" width="100%" height="75%" volume: silent
	src="https://www.youtube.com/embed/uVkjj8568d8?controls=0&amp;showinfo=1&amp;autoplay=1&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org">
	</iframe>

<div class="slideshow-overlay">
	<h1>Wing Chun</h1>
</div>

<!--
PART C3
-->
<div align="center">
	<iframe id="ytplayer1" width="20%" height="25%" volume: silent
	src="https://www.youtube.com/embed/uVkjj8568d8?controls=0&amp;showinfo=1&amp;autoplay=0&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org">
	</iframe>

	<iframe id="ytplayer2" width="20%" height="25%" volume: silent
	src="https://www.youtube.com/embed/uVkjj8568d8?controls=0&amp;showinfo=1&amp;autoplay=0&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org">
	</iframe>

	<iframe id="ytplayer3" width="20%" height="25%" volume: silent
	src="https://www.youtube.com/embed/uVkjj8568d8?controls=0&amp;showinfo=1&amp;autoplay=0&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org">
	</iframe>

	<iframe id="ytplayer4" width="20%" height="25%" volume: silent
	src="https://www.youtube.com/embed/uVkjj8568d8?controls=0&amp;showinfo=1&amp;autoplay=0&amp;enablejsapi=1&amp;origin=http%3A%2F%2Fwww.sjsu-cs.org">
	</iframe>

</div>
</div>


		<div id='start'>
		<h1>Start Up Page!</h1>
		</div>


     <?php
        if(!isset($_SESSION['username']))
        {
            #echo $_SESSION["username"];
			echo "<div>
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
			echo  "</div>"; #$_SESSION["username"]
        }
        else
        {
            $username = $_SESSION["username"];
            //echo "<div class='topcorner'>";
			echo "<div>";
            echo ("<br>Hello, $username!<br>");
			echo "<ul>";
			echo "<li><a href='./homepage.php'>Home</a></li>";
			echo "<li><a href='./index.php'>Start Up</a></li>";
			echo "<li><a href='./addVideo.php'>Add Video</a></li>";
			//echo "<li><a href='./viewVideos.php'>View Videos</a></li>";
			echo "<li><a href='./editProfile.php'>Edit Profile</a></li>";
			echo "<li><a href='./logout.php'>Logout</a></li>";
			echo "</ul>";
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

			
			<?php
			if(isset($_SESSION['admin']))
			{
				if($_SESSION['admin'])
				{
					echo "<div id='editVideoDiv'>";
					echo "<a href='./editVideo.php'>Edit a Video!</a>";
					echo "<br>";
					echo "</div>";
				}
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
				print("<th>Category</th>");
				if(isset($_SESSION['username']))
				{
                    print("<th>Add To Favorite</th>");
                }
			print("</tr>");
			$output=getVideos();
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
				print("<td>{$output[$x][11]}</td>");
				
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
				echo("<form id='pagination' action='index.php' method='GET'>");
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
$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
	$query = "select * from fun_video_all;";
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
