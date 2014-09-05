<?php
		session_start();
    	$url=$_SERVER['REQUEST_URI'];                 
		$strArray = explode('=',$url);
		$email_id = $strArray[1];
?>


<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/ShowMore.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/connectToFriends.css" media="screen" />
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
        		<div class="connectToFriendsMainDiv">
			        		<div class="InviteNameforConnections">
			        				<div class="mailIcon">
			        						<img border="0" src="../image/emailIcon.jpg" alt="email_icon" width="100%" height="100%">
			        				</div>
			        				<p id="InviteTo">Invite <?php
			        												include "common/databaseConnected.php";
			        												$dbConn=connectToDb();
																	$query = "SELECT * FROM jinshelly_signup WHERE Email='$email_id'";
																	$result = mysqli_query($dbConn,$query);
																	while ($row = mysqli_fetch_array($result)){
                                                    															$name = $row['FirstName']." ".$row['LastName'];
                                                    															echo $name;
																	}
			        				                         ?> to connect on Jinshell</p>
			        		</div>
			        		<div class="ChoseRelationWithToConnect">
			        				<div class="ChoseRelationWithToConnectDiv1">
			        						<p id="howDuKnowDiv">How Do You Know <?php echo $name;?> ?</p>
			        				</div>
			        				<div class="radioButtonToConnect">			        				
			        						<form action="../php/invitationSent.php" method="post">
			        								<input type="hidden" name="email_to" value="<?php echo $email_id ?>" >
													<input type="radio" name="relation" value="collegue">Collegue<br>
													<input type="radio" name="relation" value="classmate">Classmate<br>
													<input type="radio" name="relation" value="We’ve done business together">We have done business together<br>
													<input type="radio" name="relation" value="Friend">Friend<br>
													<input type="radio" name="relation" value="Other">Other<br>
													<input type="radio" name="relation" value="I don’t know">I dont know <?php echo $name;?><br>
											
											<p id="personalNoteTitle">Include a personal note: (optional)</p>
											<textarea rows="9" cols="66" name="textAreaConnectToFriends"  id="textAreaConnectToFriends">
												    I had like to add you to my professional network on LinkedIn.
													- <?php
															
															$userName=$_SESSION['login_username'];															
        													$db = connectToDb();
        													$sql = "SELECT * FROM jinshelly_signup WHERE  Email ='$userName'";
        													$user_result = mysqli_query($db,$sql);
															while ($row = mysqli_fetch_array($user_result)){
																	$name_user = $row['FirstName']." ".$row['LastName'];
																	echo $name_user;
															}
													  ?>
											</textarea>
			        				</div>
			        				<input type="submit" value="Send Message" id="sendMessageForConnectingFriends">
			        				</form>
			        				or 
			        				<a href ="../php/homeClick.php" title="cancelToConnect" class="cancelToConnect">
			        						Cancel
			        				</a>
			        		</div>
        		</div>

</div>
</body>
</html>












<?php








?>