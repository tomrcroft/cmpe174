<?php 
session_start();
?>
<html>
	<head>
		<title>Adding a video</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	
	<body>
        <?php
            
            //echo "<div class='topcorner'>";
			echo "<div>";
			echo ("<ul id='navlist'>");
            $has_username = FALSE;
            if (isset($_SESSION['username']))
            {
                $has_username = TRUE;
                $username = $_SESSION["username"];
                echo ("<li>Hello, $username!</li>");
			    echo "<li><a href='./homepage.php'>Home</a></li>";
            }
            else
            {
                echo ("<li><form name='loginForm' action='loginFile.php' method='post' ></li>");
                echo ("<li>Login here! Username:<input name='username' type='email' id='usernameInput'></li>");
                echo ("<li>Password: <input name='password' type='password' id='passwordInput'> <input class='b' type='submit' name='submit' value='Login'></li>");
	            echo ("<li><a href='registration.php' ><span style ='color:blue;'> Click here to register</span></a></li>");
                echo ("<li><input type='checkbox' name='cookiecheck' value='Yes' /> Remember Username and Password?</form></li>");
            
            }
            
			echo "<li><a href='./index.php'>Start Up</a></li>";
			echo "<li><a href='./addVideo.php'>Add Video</a></li>"; 
            if($has_username)
			{
                echo "<li><a href='./editProfile.php'>Edit Profile</a></li>";
			    echo "<li><a href='./logout.php'>Logout</a></li>";
            }
			echo "</ul>";
?>
		<form id='editVid' action="inputVideo.php" method="post">
			
			<div id='titleDiv'>
				Enter Video Title: <br>
				<input type="text" name="title">
			</div>
			
			<div id='linkDiv'>
				Enter Video Link: <br>
				<input type="text" name="link">
			</div>
			
			<div id='lengthDiv'>
				Enter Video Length: <br>
				<input type="number" name="length">
			</div>
			
			<div id='resolutionDiv'>
				Select maximum resolution:<br> 
				<select name="res">
					<option value="144">144p</option>
					<option value="240">240p</option>
					<option value="360">360p</option>
					<option value="480">480p</option>
					<option value="720">720p</option>
					<option value="1080">1080p</option>
				</select>
			</div>
			
			<div id='descriptionDiv'>
				Enter Video Description: <br>
				<textarea name='description'></textarea>
			</div>
			
			<div id='languageDiv'>
				Select Video Language:<br>
				<input type="radio" name="language" value="English">English<br>
				<input type="radio" name="language" value="Non-English">Non-English
			</div>
			
			<div id='viewsDiv'>
				Enter number of views:<br>
				<input type="number" name="views">
			</div>
			
			<div id='typeDiv'>
				Select video type (you can select more than one): <br>
					<input type="checkbox" name="type[]" value="Tutorial">Tutorial</input>
					<input type="checkbox" name="type[]" value="Entertainment">Entertainment</input>
					<input type="checkbox" name="type[]" value="Application">Application</input>
					<input type="checkbox" name="type[]" value="Weapon">Weapon</input>
					<input type="checkbox" name="type[]" value="Group Demo">Group Demo</input>
					<input type="checkbox" name="type[]" value="Others">Others</input>
				
			</div>
			
			<div id='imageDiv'>
				Enter Video image: <br>
				<textarea name='image'></textarea>
			</div>
			
			<div id='tagDiv'>
				Enter Video Tags (each must be seperated by a comma): <br>
				<textarea name='tags'></textarea>
			</div>
			<div id='categoryDiv'>
				Select category:<br> 
				<select name="category">
					<option value="Yang Taichi">Yang Taichi</option>
					<option value="Chen Taichi">Chen Taichi</option>
					<option value="Sun Taichi">Sun Taichi</option>
					<option value="Wu Taichi">Wu Taichi</option>
					<option value="QiGong">QiGong</option>
					<option value="Shaolin">Shaolin</option>
                    <option value="Tae kwon do">Tae kwon do</option>
					<option value="Wing Chun">Wing Chun</option>
                    <option value="Aikido">Aikido</option>
					<option value="Judo">Judo</option>
                    <option value="KungFu Movie">KungFu Movie</option>
				</select>
			</div>

			<div id='submitDiv'>
				<input type='submit' value='Submit'>
			</div>
			<?php
				// print("<h2><a href='./viewVideos.php'>View Videos!</a></h2>");
				// print("<h2><a href='./homepage.php'>Go Back Home!</a></h2>");	
				// if(isset($_SESSION))
				// {
					// print ("<a href='./logout.php'>Logout</a>");
				// }
                if(isset($_SESSION['admin']))
				{    
                    if($_SESSION['admin'])
				    {
					    print ("<h2><a href='./editVideo.php'>Edit a Video!</a></h2>");
					    //print ("<h2><a href='./cleandata.php'>Clean the data</a></h2>");
				    }
                }				

			?>
		</form>
	</body>
</html>
