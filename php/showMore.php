<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/ShowMore.css" media="screen" />
		<script src="../js/HomePage.js"></script>		        		           
</head>
<body>
<div id="main_container">
        		<div id="header_main_container">
        		      <div id="hi_container">
        		      		<p class="hi">hi!</p>
                 	  </div>
                 	  <div id="serach_box">
                 	  		<form id="search_box_form" method="post" action="../php/search.php">
                 	  			<input type="text" class="search_box" name="search_input_box" size="21" maxlength="120">
                 	  			<input type="submit" value="search" class="searchbutton">
                 	  			<a href ="../php/advancedSearch.php" title="advancedSearch" class="avancedSearch"><p id="advaced_fonting">Advanced</p></a>
                 	  		</form>
                 	  </div>                  
        		</div>
        		<div id="header_sub_container">
        		            <a href="../php/homeClick.php" tite="header_home" id="header_home">Home</a>
			        		<div id="header_profile">
			        				Profile
			        				<div id="header_profile_edit">
			        						<p id="edit_profile">Edit Profile</p>
			        						<p id="your_updates">Your Updates</p>
			        				</div>

			        		</div>
			        		<div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout">Logout</a>
			        		</div>
        		</div>
        		<div class="people_you_may_know_div">
			        		<div class="image_div_people_you_may_know">
                                    <img id='img_div_people_you_may_know' border='0' src='../image/peopleyouMayKnow.jpg' 
											             width='100%' height='100%'>


			        		</div>
			        		 <p id="people_you_know_title">People You May Know</p>
        		</div>
        		<div class="show_more_results">
        		<?php 
        				session_start();
        				include "common/databaseConnected.php";
        				$userName=$_SESSION['login_username'];
        				$db = connectToDb();
        				$sql = "SELECT * FROM jinshelly_signup WHERE  Email !='$userName'";
        				$result = mysqli_query($db,$sql);
        				echo "<table border=1><tr><td>&nbsp;</td>";
        				$count=0;
						while ($row = mysqli_fetch_array($result)){
							if(($count % 5) == 0){
								echo "</tr><tr>";
							}
								
							echo "<td><table><tr><td>";
							createPersonProfile($row['FirstName'],$row['LastName'],$row['job_title'],$row['company_name'],$row['country'],$row['Email']);
							echo "</td></tr></table></td>";
							$count=$count+1;
						}
						echo "</tr><table>";
        		?>        		
        		</div>

</div>
</body>
</html>




<?php 



			function createPersonProfile($firstName,$lastName,$jobTitle,$companyName,$country,$email){
				?>
				<div class="createPersonProfileMainDiv">
						<div class="person_image_div">
                        		<?php echo "<img id='person_image_div' border='0' src='../uploadedImages/".$email.".jpg"."' 
									             name='profile_pic'  width='100%' height='100%' >"?>
						</div>
						<div class="person_information_div">
								<p id="person_name"><?php echo $firstName." ".$lastName?></p>
								<?php 
											if($companyName!=null && $jobTitle!=null){
								?><p class="person_title"><?php echo $jobTitle." "."at"." ".$companyName ?></p>
								<?php }			elseif($companyName==null&&$jobTitle!=null){
								?><p class="person_title"><?php echo $jobTitle." "?></p>
								<?php }			elseif($jobTitle==null && $companyName!=null){
								?><p class="person_title"><?php echo $companyName." "?></p>
								<?php }	?>
								<p class="person_country"><?php echo $country?></p>
								
						</div>
						<p id="person_connect">Connect</p>
				</div>
				<br>
				<?php

			}


?>