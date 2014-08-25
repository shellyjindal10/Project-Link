<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/ShowMessages.css" media="screen" />
</head>
<body>
		<div id="showMessages_MainDiv">

		<div id="header_main_container">
		        		      <div id="hi_container">
		        		      		<p class="hi">
		        		      		    <a href="../ui/HomePage.php">
		        		      				hi!
		        		      		    </a>
		        		      		</p>
		                 	  </div>
		                 	  <div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout"><p id="logout">Logout</p></a>
			        		  </div>		                 	                   
		</div>
		<div class="inbox_main_div">
		        <div class="inbox_title_div">
			        <div class="inbox_image">
                        <img src="../image/inbox3.jpg" alt="inbox_image" width='100%' height='100%' > 
			        </div>
			        <p id="image_name">Inbox</p>
		        </div>
		        <div class="blank_space">

		        </div>
		        <div class="inboxSummary">
				        <div class="inboxSummaryLeft">
				                <a href="../php/showMessages.php" tite="show_inbox_messages" class="show_inbox_messages">
				        		<p class="message">Messages(<?php 
				        											include "common/databaseConnected.php";				        											
				        											session_start();
				        											$dbConn2=connectToDb();
				        											$senderEmailId=$_SESSION['login_username'];
				        											$mail_query_countng = "select * from message where MessageToMailId='$senderEmailId'";
				        											$mssages_mail_result = mysqli_query($dbConn2,$mail_query_countng);
				        		                                    $message_mail_row_cnt = mysqli_num_rows($mssages_mail_result);
			            											echo $message_mail_row_cnt;

				        		?>)
				        		</a>
				        		</p>
				        		<p class="sendMessages">
				        		<a href="../php/showSendMessages.php" tite="show_inbox_messages" class="show_inbox_messages">
				        		Send Mail(<?php 
				        			                                    $dbConn1=connectToDb();
				        												$senderEmailId=$_SESSION['login_username'];
				        		                                        $query_send_mail_countng = "select * from message where Sender_Email_Id='$senderEmailId'";
				        		                                        $send_mail_result = mysqli_query($dbConn1,$query_send_mail_countng);
				        		                                        $send_mail_row_cnt = mysqli_num_rows($send_mail_result);
			            												echo $send_mail_row_cnt;
				        		?>)
				        		</a>
				        		</p>
				        </div>
				        
		        </div>
		        <div class="resultOfMessages">
		                                        <?php
		                                                $rec_limit = 5;	
		                                                if($send_mail_row_cnt!=0){
		                                                						$last = ceil($send_mail_row_cnt/$rec_limit);
								                                                if(isset($_GET['pagenum'])){
								                                                	$pagenum=$_GET['pagenum'];
								                                                } 
								                                                if (!(isset($pagenum))){ 
																				 						$pagenum = 1; 
																				}
																				if ($pagenum < 1) {
																			 							$pagenum = 1; 
																			 	}elseif ($pagenum > $last){
																			 							$pagenum = $last; 
																			 	}
																			 	$max = 'limit ' .($pagenum - 1) * $rec_limit .',' .$rec_limit;
																			 	$query="select * from message where Sender_Email_Id='$senderEmailId'
																                       $max";
								                                                $mssages_result = mysqli_query($dbConn2,$query);	

																                while ($row1 = mysqli_fetch_array($mssages_result)){
								                                						createSearchIdDiv($row1['Sender_subject'],$row1['messageInInbox'],$row1['Sender_Email_Id'],$row1['Message_id']);
																				}
																				echo "<p>"." --Page $pagenum of $last-- <p>";
																				if ($pagenum == 1){} 
						 														else {
						 																echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=1'> <<-First</a> ";
						 																echo " ";
						 																$previous = $pagenum-1;
						 																echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'> <-Previous</a> ";
						 															 }
						 														echo " ---- ";
						 														if ($pagenum == $last) {} 
						 														else {

																			 			 $next = $pagenum+1;
																						 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$next'>Next -></a> ";
																						 echo " ";
																						 echo " <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'>Last ->></a> ";
																			 		 } 
		                                                }			                                        	                                                
		                                                
 
										                
				        						?>
		        
		        </div>
        </div>


</body>
</html>






<?php 


//echo "Inside the showMessages.php file";

			function createSearchIdDiv($mailSubject,$mailInbox,$email_id,$message_id){
			?>
			<link rel="stylesheet" type="text/css" href="../css/AdvancedPage.css" media="screen" />
			<div class="searchId">
					<div class="search_profile_pic">
					        <a href="../ui/HomePage.php?user=<?php echo $email_id?>">
							<?php echo "<img id='profile_image' border='0' src='../uploadedImages/".$email_id.".jpg"."' 
							             name='profile_pic'  width='100%' height='100%' >"?>
							</a>				
					</div>
					<div class="search_result_desc">
							<p class="send_from">
											<?php echo $email_id?>
							</p>
							<p class="subject">								
											<?php echo $mailSubject?>								
							</p>
							<p class="inBox">
							    <?php echo $mailInbox?>
							</p>
					</div>
					<div class="delete_icon" >
					     <a href="../php/deleteAndReplyMail.php?action=delete&messageid=<?php echo $message_id?>">
					     <img src="../image/delete.jpg" alt="delete_image" width='100%' height='100%' title="Delete">
					     </a> 
					</div>
					<div class="replyTo">
					    <a href="../php/deleteAndReplyMail.php?action=reply&messageid=<?php echo $message_id?>">
						<img src="../image/reply-to.png" alt="replyTo_image" width='100%' height='100%' title="Reply">
						</a>
					</div>
					<div class="forward">
					    <a href="../php/deleteAndReplyMail.php?action=forward&messageid=<?php echo $message_id?>">
						<img src="../image/forwardTo.jpg" name="Forward" alt="replyTo_image" width='100%' height='100%' title="Forward">
						</a>
					</div>


					
			
			</div>
	<?php 
}
         function deleteMail($message_id){
       								$dbConn4=connectToDb();
       								$mail_delete_query = "DELETE FROM message where Message_id='$message_id'";
				        			$mssages_mail_result = mysqli_query($dbConn4,$mail_delete_query);				        		                                    
       		}


?>




<?php 


//echo "show Send Mesages.php file";


?>