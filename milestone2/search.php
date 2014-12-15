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
<?php
        if(!isset($_SESSION['username']))
        {
            #echo $_SESSION["username"];
			echo ("<div>");
            echo ("<ul id='navlist'>");
            echo ("<li><form name='loginForm' action='loginFile.php' method='post' ></li>");
            echo ("<li>Login here! Username:<input name='username' type='email' id='usernameInput'></li>");
            echo ("<li>Password: <input name='password' type='password' id='passwordInput'> <input class='b' type='submit' name='submit' value='Login'></li>");
	        echo ("<li><a href='registration.php' ><span style ='color:blue;'> Click here to register</span></a></li>");
            echo ("<li><input type='checkbox' name='cookiecheck' value='Yes' /> Remember Username and Password?</form></li>");
            
			echo ("<li><a href='./index.php'>Start Up</a></li>");
			echo ("<li><a href='./addVideo.php'>Add Video</a></li>"); 
            echo ("</ul>"); 
			 #$_SESSION["username"]
        }
        else
        {
            $username = $_SESSION["username"];
            //echo "<div class='topcorner'>";
			echo "<div>";
			echo ("<ul id='navlist'>");
            echo ("<li>Hello, $username!</li>");
			echo "<li><a href='./homepage.php'>Home</a></li>";
			echo "<li><a href='./index.php'>Start Up</a></li>";
			echo "<li><a href='./addVideo.php'>Add Video</a></li>"; 
			echo "<li><a href='./editProfile.php'>Edit Profile</a></li>";
			echo "<li><a href='./logout.php'>Logout</a></li>";
			echo "</ul>";
        }
        echo  "</div>";
           
        ?>
</div>
    			<?php
           
                 
                echo("<form id='search' action='search.php' method='POST'>");
                echo ("<ul id='search_bar'>");
                echo ("<li>Video Length <select name='length'>
                    <option value='0'>0-5min</option>
                    <option value='1'>5-10min</option>
                    <option value='2'>10-30min</option>
                    <option value='3'>30-60min</option>
                    <option value='4'>60min+</option>
                    </select>
                </li>");
                echo ("<li>Highest Resolution <select name='res'>
                    <option value='144'>144p</option>
					<option value='240'>240p</option>
					<option value='360'>360p</option>
					<option value='480'>480p</option>
					<option value='720'>720p</option>
					<option value='1080'>1080p</option>
                    </select>
                </li>");
                echo ("<li>Video Language <select name='language'>
                    <option value='English'>English</option>
                    <option value='Non-English'>Non-English</option>
                    </select>
                </li>");
                echo ("<li>View Count <select name='count'>
                    <option value='0'>0-100,000</option>
                    <option value='1'>100,000-200,000</option>
                    <option value='2'>200,000-300,000</option>
                    <option value='3'>300,000-400,000</option>
                    <option value='4'>400,000-500,000</option>
                    <option value='5'>500,000+</option>
                    </select>
                </li>");
                echo ("<li>Video Type(Multiple) <select multiple name='type[]'>
                    <option value='Tutorial'>Tutorial</option>
                    <option value='Entertainment'>Entertainment</option>
                    <option value='Application'>Application</option>
                    <option value='Weapon'>Weapon</option>
                    <option value='Group Demo'>Group Demo</option>
                    <option value='Others'>Others</option>
                    </select>
                </li>");
                echo ("<li>Category <select name='category'>
                    <option value='Yang Taichi'>Yang Taichi</option>
                    <option value='Chen Taichi'>Chen Taichi</option>
                    <option value='Sun Taichi'>Sun Taichi</option>
                    <option value='Wu Taichi'>Wu Taichi</option>
                    <option value='QiGong'>QiGong</option>
                    <option value='Shaolin'>Shaolin</option>
                    <option value='Tae kwon do'>Tae kwon do</option>
                    <option value='Wing Chun'>Wing Chun</option>
                    <option value='Aikido'>Aikido</option>
                    <option value='Judo'>Judo</option>
                    <option value='KungFu Movie'>KungFu Movie</option>
                    </select>
                </li>");
                echo ("</ul>");
                echo ("<br>Tags <input type='text' name='search'><br><input type='submit' value='Search'>");
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
			/*if($_SESSION['admin'])
			{
				echo "<div id='editVideoDiv'>";
				echo "<a href='./editVideo.php'>Edit a Video!</a>";
				echo "<br>";
				echo "</div>";
			}*/
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
                

	            $query = "select * from fun_video_all where";
                if (isset($search) and strlen($search) != 0 )
                {
                    print "what is : " . strlen($search);
                    $query = $query . " tag like '%$search%'";
                }
                else
                {
                    $query = $query . " id > 0";
                }
                if(isset($_POST["length"]))
                {
                    $index = $_POST["length"];
                    $length = array( " AND videolength < 5", 
                    " AND videolength >= 5 AND videolength < 10", 
                    " AND videolength >= 10 AND videolength < 30", 
                    " AND videolength >= 30 AND videolength < 60",
                    " AND videolength >= 60");
                    $query = $query . $length[$index];
                }
                if(isset($_POST["res"]))
                {
                    $result = $_POST["res"];
                    $query = $query . " AND highestresolution = '$result'";
                }
                if(isset($_POST["language"]))
                {
                    $result = $_POST["language"];
                    $query = $query . " AND language = '$result'";
                }
                if(isset($_POST["count"]))
                {
                    $index = $_POST["count"];
                    $count = array( " AND viewcount < 100000", 
                    " AND viewcount >= 100000 AND viewcount < 200000", 
                    " AND viewcount >= 200000 AND viewcount < 300000", 
                    " AND viewcount >= 300000 AND viewcount < 400000",  
                    " AND viewcount >= 400000 AND viewcount < 500000", 
                    " AND viewcount >= 500000");
                    $query = $query . $count[$index];
                }
                if(isset($_POST["type"]))
                {
                    $query = $query . " AND ( ";
                    foreach($_POST["type"] as $type)
                    {
                        $query = $query . " videotype LIKE '%$type%' OR";
                    }
                    $query = substr($query, 0, -3);
                    $query = $query . ")";
                }
                if(isset($_POST["category"]))
                {
                    $cat = $_POST["category"];
                    $query = $query . " AND category = '$cat'";
                }
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
