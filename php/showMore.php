<?php
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<script src ="../lib/js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/ShowMore.css" media="screen" />
		 <link rel="stylesheet" type="text/css" href="../css/FriendsPage.css" media="screen" />
		<link type ="text/css" rel="stylesheet" href="../lib/css/bootstrap.css" />
		<script src="../js/HomePage.js"></script>
		<script src ="../lib/imageOnHover/jquery.contenthover.js"></script>
		<script type="text/javascript">
                $(document).ready(function(){	
											$('#d4').contenthover({
    																overlay_background:'#333'
											});
				});
        </script>

</head>
<body id="showMoreBackground" background="../image/background_showMore.jpg">
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
        		<div id="header_sub_container" class="navbar">
        				<div class="navbar-inner">
        		            <ul class="nav nav-pills">
        		             	<li><a href="../php/homeClick.php" tite="header_home" id="header_home">Home</a></li>
			        		    <li><a href="#">Profile</a></li>
			        			<li class="dropdown">
			        				<a class="dropdown-toggle" data-toggle="dropdown" href ="#">
			        					Photos<b class="caret"></b>
			        				</a>
			        				<ul class="dropdown-menu">
			        				    <li><a href ="../php/photos.php?user=<?php echo $_SESSION['login_username'];?>">View Photos</a></li>
			        			 		<li><a href="../php/imageGallery.php?user=<?php echo $_SESSION['login_username'];?>">Image Gallery</a></li>
			        				</ul>
			        			</li>
			        			<li><a href="../php/friends.php?user=<?php echo $_SESSION['login_username'];?>">Friends</a></li>
			        		</ul>
			        		<div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout">Logout</a>
			        		</div>
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
        				
        				include "common/databaseConnected.php";
        				$userName=$_SESSION['login_username'];
        				$db = connectToDb();
        				$sql = "SELECT * FROM jinshelly_signup WHERE  Email != '$userName'";
        				//$sql = "SELECT * FROM jinshelly_signup WHERE  Email NOT IN ('$userName','SELECT To_Email FROM NumberofFriendsToConnect WHERE From_Email = '$userName'')";
        				//echo $sql;
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
				<!--testing starts here -->
				<div id="d4" style="width:300px; height:240px; background:#eee; ">
    				<div style="padding:20px;">
		        		<p><img src="../uploadedImages/<?php echo $email.".jpg"?>" id="createPersonProfileImage" /></p>
		        		<p>
		        		<?php
                                if($jobTitle!=null && $companyName!=null){
                                										  echo $jobTitle . " " . "at ".$companyName;
                                                                          }elseif($jobTitle!=null && $companyName==null){
                                                                          echo $jobTitle;
                                                                          }else{
                                                                          echo $companyName;
                                                                          }
                        ?>
		        		</p>
   				 	</div>
				</div>
				<div class="contenthover">
				    <h3><?php echo $firstName. " ".$lastName?></h3>
				    <p>
				    <?php
                                if($jobTitle!=null && $companyName!=null){
                                										  echo $jobTitle . " " . "at ".$companyName;
                                                                          }elseif($jobTitle!=null && $companyName==null){
                                                                          echo $jobTitle;
                                                                          }else{
                                                                          echo $companyName;
                                                                          }
                    ?>
				    </p>
				    <p><a href="../php/connectToFriends.php?connect_to=<?php echo $email?>"class="mybutton">Connect</a></p>
				</div>


				<!--testing ends here -->
				
				
				<br>
				<?php

			}


?>