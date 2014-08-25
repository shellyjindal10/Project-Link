<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
		<script src="../js/HomePage.js"></script>
		        		           <script type="text/javascript">
                                   function updatepicture(pic){
		        		           			document.getElementById("image").setAttribute("src",pic);
		        		           			$('.choose_file').hide();
		        		           			$('.upload_file').hide();
		        		           }

		        		           function call_backend(page,div) {
				        		         	var xmlhttp;
											if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
											  xmlhttp=new XMLHttpRequest();
											  }
											else{// code for IE6, IE5
											  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
											  }
											xmlhttp.onreadystatechange=function(){
											  if (xmlhttp.readyState==4 && xmlhttp.status==200){
											    document.getElementById(div).innerHTML=xmlhttp.responseText;
											    }
											  }
											xmlhttp.open("GET",page,true);
											xmlhttp.send();
									}
									</script>	
</head>
<body>
      <?php
		      	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				session_start();
				if ((!(isset($_SESSION['username']))) && (!(isset($_GET['user'])))){
					Header('location:login.html');
				}
				if($url=='http://localhost:8080/Shelly/ui/HomePage.php'){
					$_SESSION['username']=$_SESSION['login_username'];
				}else{
					$_SESSION['username']=substr(strstr($url, '='), 1);
				} 
       ?>
       
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
        			<p id="search_message"></p>
        		<div id ="profile">
		        		<div id="profile_top_container">
		<div id="profile_picture">
		          <form action ="../php/homePage.php" method="POST" enctype="multipart/form-data" target="iframe">
		                <?php  $image_name=$_SESSION["username"].'.jpg'; ?>
		                <?php echo "<img id='image' border='0' src='../uploadedImages/".$image_name."' name='profile_pic'  width='100%' height='50%'>" ?>
		          		<input class="choose_file" type="file" name="file" id="file">
		          		<input class="upload_file" type="submit" value="Upload">
		          </form>
		          <iframe style="display:none;" name="iframe"></iframe>
		          

		</div>
		<div id="profile_title">
                  <p id="profile_name">
                  		<script type="text/javascript">
							call_backend('test.php?id=FirstName&action=basicInformation','profile_name');
						</script></p>
                  <p id="Job_Title">
                  		<script type="text/javascript">
							call_backend('test.php?id=job_title&action=basicInformation','Job_Title');
						</script></p>
                  <p id="Industry">
                  		<script type="text/javascript">
							call_backend('test.php?id=company_name&action=basicInformation','Industry');
						</script></p>
                  <p id="current_position">Current : Employed </p>

		</div>
</div>

<div id="profile_bottom_container">
        <div id="profile_backround">
        		<div id="background">
        				<p id="background_title">Background</p>
        		</div>
        </div>
		<div id="profile_summary">
				<div id="summary_image">
				<img border="0" src="../image/summary.png" alt="Pulpit rock" width="10%" height="10%">
				
				</div>
				<div id="summary_title">
						<script type="text/javascript">
						call_backend('sudip.php?id=Summary&action=onLoad','summary_title');
						</script>
				Summary
				</div>
				<div id="edit_button">
				         <?php				        		
				        		if($_SESSION['login_username']== $_SESSION['username']){
				        			?>
				        			<p id="edit_text" onclick="call_backend('sudip.php?id=summary&action=onEdit','summary_title')">Edit</p>
				        			<?php 
				        		}else{
				        			?>
				        			<p id="edit_text" onclick="call_backend('sudip.php?id=summary&action=onEdit','summary_title')"></p>
				        			<script type="text/javascript">
						        			$('.choose_file').hide();
				        		           	$('.upload_file').hide();
		        		           	</script>
				        			<?php
				        		}
				         ?>							
				</div>
		</div>
		<div id="profile_experience">
		        <div id="summary_image">
		        <img border="0" src="../image/experience.jpg" alt="Pulpit rock" width="10%" height="10%">
				</div>
				<div id="Experience_title">
						<script type="text/javascript">
						call_backend('sudip.php?id=Experience&action=onLoad','Experience_title');
						</script>
				Experience
				</div>
				<div id="edit_button">
				        <?php				        		
				        		if($_SESSION['login_username']== $_SESSION['username']){
				        			?>
				        			<p id="edit_text" onclick="call_backend('sudip.php?id=experience&action=onEdit','Experience_title')">Edit</p>
				        			<?php 
				        		}else{
				        			?>
				        			<p id="edit_text" onclick="call_backend('sudip.php?id=experience&action=onEdit','Experience_title')"></p>
				        			<?php

				        		}
				         ?>						
				</div>
		</div>
		<div id="profile_education">
		        <div id="summary_image">
		        <img border="0" src="../image/education.jpg" alt="Pulpit rock" width="10%" height="10%">
				</div>
				<div id="Education_title" onLoad="call_backend('sudip.php?id=Education&action=onLoad','profile_education')">
						<script type="text/javascript">
						call_backend('sudip.php?id=Education&action=onLoad','Education_title');
						</script>
				Education
				</div>
				<div id="edit_button">
						<?php				        		
				        		if($_SESSION['login_username']== $_SESSION['username']){
				        			?>
				        			<p id="edit_text" onclick="call_backend('sudip.php?id=education&action=onEdit','Education_title')">Edit</p>
				        			<?php 
				        		}else{
				        			?>
				        			<p id="edit_text" onclick="call_backend('sudip.php?id=education&action=onEdit','Education_title')"></p>
				        			<?php
				        		}
						?>					
				</div>
		</div>
		<div id="profile_addition_info">
		        <div id="summary_image">
		        <img border="0" src="../image/additional_info.jpg" alt="Pulpit rock" width="10%" height="10%">
				</div>
				<div id="summary_title">
				Additional Info
				</div>
				<div id="edit_button">
						<?php				        		
				        		if($_SESSION['login_username']== $_SESSION['username']){
				        			?>
				        			<p id="edit_text">Edit</p>
				        			<?php 
				        		}else{
				        			?>
				        			<p id="edit_text"></p>
				        			<?php
				        		}
						?>				
				</div>
				<p id="addition_info_title">Interest</p>
				<p></p>
				<p id="addition_info_title">Personal Details</p>
						<p id="personal_details">Birthday : </p>
						<p id="personal_details">Marital Status : </p>
				<p id="addition_info_title">Email Id</p>
		</div>		
</div>
	       
			    </div>
			    <div class="right_side_container">
					    <div class="right_side_upper_container">
						    <div class="right_side_title_container">
						        <p class= "People_Title">People You May Know</p>
						    </div>
						    <?php
								    include "../php/common/databaseConnected.php";
								    $userName=$_SESSION['login_username'];
								    $dbConnection = connectToDb();
									$limit = '3';
									$name_array = array();
									$email_array = array();
									$count = 0;
									$query = "SELECT * FROM jinshelly_signup where Email !='$userName' LIMIT $limit";
									$result = mysqli_query($dbConnection,$query);
									while ($row = mysqli_fetch_array($result)){
                                                    $firstName = $row['FirstName'];
                                                    $lastName = $row['LastName'];
                                                    $name_array[$count] = $firstName." ".$lastName;
                                                    $email_array[$count] = $row['Email'];
                                                    $count = $count +1;
                                    }

						    ?>
						    <div id="people_container1">
									<?php 
									         connectToFriendDiv($name_array[0],$email_array[0]);
									?>
						    </div>
						    <div id="people_container1">
									<?php 
									        connectToFriendDiv($name_array[1],$email_array[1]);
									?>
						    </div>
						    <div id="people_container1">
									<?php 
									    	connectToFriendDiv($name_array[2],$email_array[2]);
									?>
						    </div>
						    <div class="show_more_container">
						            <a href="../php/showMore.php" tite="Show-More" id="showMore">
									    <p id ="see_more">
									       Show more >>
									    </p>
								    </a>
						    </div>
					    </div>

				</div>

        </div>

</body>
</html>

<?php 
         function connectToFriendDiv($name,$email_id){
         	                           ?>
         								<div class="image_connect">
		         								<?php echo "<img id='person_image' border='0' src='../uploadedImages/".$email_id.".jpg"."' 
									             name='profile_pic'  width='100%' height='100%' >"?>
									    </div>
									    <div class="person_information">
									    		<p id="person_connect_name"><?php echo $name ?></p>
									    		<p id="person_connect_icon">
											    		<img id='connect_icon' border='0' src='../image/plus-icon.png' 
											             name='connect_profile_pic'  width='4%' height='4%'>Connect
									    		</p>
									    </div>
									    <?php 
         }


?>