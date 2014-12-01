<?php
session_start();
/*
 * Created on Apr 7, 2014
 *
 *The script help login in the users into the system by taking information from the form
 *and checking it with the database. 
 *
 */
?>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" type="text/css" href="loginPageStyle.css">

</head>
<body>


<form name="loginForm" action="loginFile.php" method="post" >
	<div id='usernameDiv'>
		Username:
		<input name="username" type="email" id="usernameInput">
	</div>
	<div id='passwordDiv'>
		Password:
		<input name="password" type="password" id="passwordInput">
	</div>
	
<input class="b" type="submit" name="submit" value="Login" style="margin-right:10px;">
	<a href="registration.php" ><span style ="color:blue;"> Click here to register</span></a>
<br><input type="checkbox" name="cookiecheck" value="Yes" /> Remember Username and Password? <br>

</form>


	<body>
		<form action="inputVideo.php" method="post">
			
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
			
			<div id='submitDiv'>
				<input type='submit' value='Submit'>
			</div>
			
		</form>
		<?php
				print("<h2><a href='./viewVideos.php'>View Videos!</a></h2>");
				
				/**
				This needs to be hidden if the user is not an admin.
				*/
				if(isset($_COOKIE['admin']))
				{
					print("<h2><a href='./cleandata.php'>Clean the data</a></h2>");
					print ("<h2><a href='./editVideo.php'>Edit a Video!</a></h2>");
				}
			?>
	</body>

	


</body>

</html>