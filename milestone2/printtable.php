<?php
			$output=getVideos();
			//$sizez = sizeof($output[0]);
			//print($output[0][1]);
			for($x = 0; $x < sizeof($output); $x++)
			{
				
				print("<tr>");
				print("<form id='editForm' action='editForm.php' method='POST'>");
				print("<td><input type='hidden' name='id' value='{$output[$x][0]}'>
					<img src='{$output[$x][9]}' alt='video image' style='width:42px;height:42px;border:0'>
</td>");
				print("<td><input type='text' name='link' value='{$output[$x][2]}'></td>");
				print("<td><input type='text' name='imagelink' value='{$output[$x][9]}' ></td>");
				print("<td><input type='text' name='title' value='{$output[$x][1]}'></td>");
				print("<td><input type='number' name='length' value='{$output[$x][3]}'></td>");
				print("<td><select name='res'>");
				printResolution(144, $output[$x][4]);
				printResolution(240, $output[$x][4]);
				printResolution(360, $output[$x][4]);
				printResolution(480, $output[$x][4]);
				printResolution(720, $output[$x][4]);
				printResolution(1080, $output[$x][4]);
				print("</select></td>");
				print("<td><textarea name='desc'>{$output[$x][5]}</textarea></td>"); 
				print("<td><select name='lang'>");
				printLang("English", $output[$x][6]);
				printLang("Non-English", $output[$x][6]);
				print("</select></td>"); 
				print("<td><input type='number' name='views' value='{$output[$x][7]}'></td>");
				print("<td><select multiple name='type[]'>");
				printType("Tutorial", $output[$x][8]);
				printType("Entertainment", $output[$x][8]);
				printType("Application", $output[$x][8]);
				printType("Weapon", $output[$x][8]);
				printType("Group Demo", $output[$x][8]);
				printType("Others", $output[$x][8]);
				print("</select></td>");
				print("<td><input type='text' name='tags' value='{$output[$x][10]}'></td>");
				print("<td><input type='submit' value='Update'></td>");
				print("</tr>");
				print("</form>");
				
			}
			?>