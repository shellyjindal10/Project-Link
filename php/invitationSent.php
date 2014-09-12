<?php
session_start();
include "common/databaseConnected.php";
?>
<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/invitationSent.css" media="screen" />
    <link type ="text/css" rel="stylesheet" href="../lib/css/bootstrap.css" />
		<script src="../js/HomePage.js"></script>		
    <script src ="../lib/js/bootstrap.js"></script>        		           



</head>
<body id="invitationSentPageBackground" background="../image/background_invitationSentPage.jpg">
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

                          <div class="InvitationReceiveMainTab" onmouseover="document.getElementById('showThecontactsOnHover').style.display = 'block'" 
                                                                onmouseout="document.getElementById('showThecontactsOnHover').style.display = 'none'">
                                        <img border="0" src="../image/contacts.png" alt="contacts-icon" width="100%" height="100%">
                          </div>
                                        <p id="number_of_invitation">
                                        <?php
                                                $usertNameContacts = $_SESSION['login_username'];
                                                $databaseConn=connectToDb();  
                                                $how_many_invitation_query = "SELECT * FROM NumberofFriendsToConnect WHERE To_Email='$usertNameContacts'";
                                                $how_many_invitation_result = mysqli_query($databaseConn,$how_many_invitation_query);
                                                $rows = mysqli_num_rows($how_many_invitation_result);
                                                if($rows){
                                                     echo $rows;     
                                                }
                                                                                                 

                                        ?>
                                       </p>
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
                        <div id="showThecontactsOnHover">
                                  <div class="invitationsNumber">
                                        <p id="invitationsNumberTitle">Invitations(
                                               <?php
                                                        $usertNameContacts = $_SESSION['login_username'];
                                                        $databaseConn=connectToDb();  
                                                        $how_many_invitation_query = "SELECT * FROM NumberofFriendsToConnect WHERE To_Email='$usertNameContacts'";
                                                        $how_many_invitation_result = mysqli_query($databaseConn,$how_many_invitation_query);
                                                        $rows = mysqli_num_rows($how_many_invitation_result);
                                                        if($rows){
                                                             echo $rows;     
                                                        }                                       
                                               ?> )
                                        </p>
                                        <?php
                                                while ($row = mysqli_fetch_array($how_many_invitation_result)){
                                                        $dataOfPersonQuery = "SELECT * from jinshelly_signup WHERE Email='".$row['From_Email']."'";
                                                        $dataOfPersonQueryResult = mysqli_query($databaseConn,$dataOfPersonQuery);
                                                        while ($column = mysqli_fetch_array($dataOfPersonQueryResult)){
                                                                 invitationPeopleInformation($column['FirstName']." ".$column['LastName'],$column['Email']);
                                                        }
                                                }
                                        ?>           
                                       
                        </div>

        		<div class="InvitaionSendSucessfullyMainDiv">
        					<div class="successIcon">
        							<img border="0" src="../image/green_tick_sign.jpg" alt="green-tick_icon" width="100%" height="100%">
        					</div>
        					<p id ="InvitaionTitle">Invitation is Sent</p>
        		</div>

        		<div class="ConnectToMore">
				 	         <a href="../php/showMore.php" tite="connectMore" id="connectMore">
        							<p id="connectMoreTitle">Connect more >></p>
        					</a>
        		</div>
</div>
</body>
</html>

<?php 
	$relation=$_POST['relation'];
	$message = $_POST['textAreaConnectToFriends'];
        $to = $_POST['email_to'];
        $from = $_SESSION['login_username'];        
        $dbConn=connectToDb();        

      
        if($to){
                $check_query = "SELECT * FROM connectId WHERE To_Email='$to'";
                $result = mysqli_query($dbConn,$check_query);
                $row_cnt = mysqli_num_rows($result);
                //echo "<br/>"."row count 0 is :".$row_cnt;

                $check_message_query = "SELECT * FROM NumberofFriendsToConnect WHERE To_Email ='$to' and Message_To_Connect ='$message' and From_Email='$from'";
                $message_result = mysqli_query($dbConn,$check_message_query); 
                $row_cnt1 = mysqli_num_rows($message_result);
                //echo "<br/>"."row count 1 is ".$row_cnt1;

                if($row_cnt==0 && $row_cnt1==0){
                                $string=$to;
                                if($string){
                                            $ranConnectId = createmessageId($string);                                                                  
                                }
                                $email_id = $row['To_Email'];
                                $connect_id = $row['Connect_Id'];
                                if($ranConnectId!=$connect_id){//Insert the data
                                                $insert_into_receipt="INSERT INTO connectId (To_Email, Connect_Id) VALUES ('$to', '$ranConnectId')";
                                                $insert_into_message="INSERT INTO NumberofFriendsToConnect(Connect_Id ,Message_To_Connect ,From_Email ,
                                                                   To_Email,FromRelation) VALUES ('$ranConnectId','$message','$from','$to','$relation')";
                                                mysqli_query($dbConn,$insert_into_receipt);
                                                mysqli_query($dbConn,$insert_into_message);
                                }else{//Update the data 
                                                $Update = "UPDATE receipt SET To_Email ='$to' WHERE Connect_Id='$connect_id'";
                                                mysqli_query($dbConn,$Update);//also update the message table 
                                }
                 }
        }
            

        function createmessageId($string){
                                          $string = explode('@', $string);
                                          array_pop($string);
                                          $string = implode('@', $string);
                                          $ranConnectId = $string.rand();
                                          return $ranConnectId;
        }

        function invitationPeopleInformation($name,$email_id){
                ?>
                                        <div class="invitationsPersonMainDiv"> 
                                                <div class="InvitationPicture">
                                                <?php echo "<img id='invation_image' border='0' src='../uploadedImages/".$email_id.".jpg"."' 
                                                                     name='profile_pic'  width='100%' height='100%' >"?>
                                                </div>
                                                <div class="InvitationSecondDiv">
                                                        <p class="InvitationNameOfThePerson"><?php echo $name?></p>                                                       
                                                </div>
                                                <div class="addSign">
                                                        <img border="0" src="../image/green_tick_sign.jpg" alt="add_icon" width="100%" height="100%">
                                                </div>
                                                <div class="deleteSign">
                                                        <img border="0" src="../image/delete.png" alt="delete_icon" width="100%" height="100%">
                                                </div>
                                        </div>
                                  </div>
               <?php 
        }

?>