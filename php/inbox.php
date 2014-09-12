<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/AdvancedPage.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/Inbox.css" media="screen" />
		<script src="../js/HomePage.js"></script>
		
		
		
		        		           
</head>
<body id="inboxPageBackground" background="../image/background_inboxPage.jpg">
		<div id="advanced_Search_MainDiv">
		<div id="header_main_container">
		        		      <div id="hi_container">
		        		      		<p class="hi">
		        		      		    <a href="../ui/HomePage.php">
		        		      				hi!
		        		      		    </a>
		        		      		</p>
		                 	  </div>
		                 	  <div class ="logout_profile">
		                 	         shelly
			        		        <a href="../php/logout.php" tite="Logout"><p id="logout">Logout</p></a>
			        		  </div>		                 	  		                 	                   
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
				        											//session_start();
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
				        <div class="inboxSummaryRight">
				               <form method="post" action="">
		                               <div class="inboxSummaryTo"><!--To  -->
		                                   <?php //check if it is for the forward mail
				                               $url=$_SERVER['REQUEST_URI'];
				                               $checkItem = "message_id";
				                               if (strpos($url, $checkItem) !== false){
				                           ?>
		                                    	<input type="text" name="to" class="summaryTo" value placeholder="To">
		                                    <?php
		                                      }else {
		                                     ?>
		                               		<input type="text" name="to" class="summaryTo" value="<?php 
		                               																	$url=$_SERVER['REQUEST_URI'];
		                               																	$ampersant = '&';
				                               															if (strpos($url, $ampersant) !== false){
		                               																	     	preg_match('~=(.*?)&~', $url, $username);
																										        echo $username[1];
																										}else{
                                                                                                                $sentTo=substr(strstr($url, '='), 1);
                                                                                                                echo $sentTo;
																										}

																								  ?>">
											<?php } ?>													  
		                               </div>
		                               <?php
				                               $url=$_SERVER['REQUEST_URI'];
				                               $subject = "subject";
				                               //$message_id = "message_id";
				                               if (strpos($url, $subject) !== false){
				                       ?>
				                               	<div class="inboxSummarySubject">
		                               				<input type="text" name="subject" class="summarySubject" 
		                               		       		value="<?php 
							                               		        $url=$_SERVER['REQUEST_URI'];                 
																		$strArray = explode('=',$url);
																		$subject = $strArray[2];
																		echo "RE:"." ".$subject;			                                                    
		                               			   				?>">                         
		                                        </div>
		                                <?php 
		                                    }elseif(strpos($url, "message_id") !== false){
		                                    	$url=$_SERVER['REQUEST_URI'];                 
												$strArray = explode('=',$url);
												$message_id = $strArray[1];																		
		                                    	$dbConn=connectToDb();
				                                $forward_mail_query = "SELECT * FROM message WHERE Message_id='$message_id'";
				                                $forward_mail_result = mysqli_query($dbConn,$forward_mail_query);
				                                while ($row = mysqli_fetch_array($forward_mail_result)){
                                                    $subject = $row['Sender_subject'];
                                                    $messageTobeForwarded = $row['messageInInbox'];
				                                }
		                                ?>
		                                     <div class="inboxSummarySubject">
		                               				<input type="text" name="subject" class="summarySubject" value ="<?php echo $subject?>">                         
		                                     </div>

				                        <?php
				                                   }else{
				                        ?>
				                               <div class="inboxSummarySubject">
		                               				<input type="text" name="subject" class="summarySubject" value placeholder="Enter the subject">                         
		                                       </div>
		                                <?php 
		                                           }
		                                ?>

		                               	<?php
				                               $url=$_SERVER['REQUEST_URI'];
				                               $messageTobeForwarded='null';
				                               if (strpos($url, "message_id") !== false){
						                               	$url=$_SERVER['REQUEST_URI'];                 
														$strArray = explode('=',$url);
														$message_id = $strArray[1];
														$databaseConn=connectToDb();
						                                $forward_mail_query = "SELECT * FROM message WHERE Message_id='$message_id'";
						                                $forward_mail_result = mysqli_query($databaseConn,$forward_mail_query);
						                                while ($row = mysqli_fetch_array($forward_mail_result)){
		                                                    $messageTobeForwarded = $row['messageInInbox'];
						                               
				                       ?>
				                       <div class="inboxSummaryMessage">
		                               		<textarea rows="15" cols="72" name="message" id="message_fonts">
		                               		<?php echo $messageTobeForwarded?>
		                               		</textarea>
		                               </div>
		                               <?php }}else{?>	                               
		                               <div class="inboxSummaryMessage">
		                               		<textarea rows="15" cols="72" name="message" value placeholder="Type your message..." id="message_fonts"></textarea>
		                               </div>
		                               <?php }?>
		                               <div class="inboxSummarySendOrCancel">
				                               <input type="submit" value="SendMessage" class="search_button" id="sendMessage">
				                               <input type="submit" value="Cancel" class="search_button">
		                               </div>
                               </form>
				        </div>
		        </div>
        </div>
</body>
</html>

<?php 
           
            //include "common/databaseConnected.php";

            if(isset($_POST['to'])){
            						$to = $_POST['to'];      	
            }
            if(isset($_POST['subject'])){
            							$subject= $_POST['subject'];      	
            }
            if(isset($_POST['message'])){
            							$message=$_POST['message'];
            }
    
			

            $dbConn=connectToDb();
            $senderEmailId=$_SESSION['login_username'];

            if($to){
		            	$check_query = "SELECT * FROM receipt WHERE Email='$to'";
			            $result = mysqli_query($dbConn,$check_query);
			            $row_cnt = mysqli_num_rows($result);

			            $check_message_query = "SELECT * FROM message WHERE MessageToMailId ='$to' and Sender_subject ='$subject' and messageInInbox='$message'";
			            $message_result = mysqli_query($dbConn,$check_message_query);            
			            $row_cnt_message = mysqli_num_rows($message_result);

			          
						if($row_cnt!=0){
							            $string=$to;
							            if($string){
							                        $ranMessageId = createmessageId($string);						  	           
						                }
										while ($row = mysqli_fetch_array($result)){
											                                        $email_id = $row['Email'];
																				    $message_id = $row['Message_id'];
																				    if($ranMessageId!=$message_id){//Insert the data 

																				    	$insert_into_receipt="INSERT INTO receipt (Email, Message_id) VALUES ('$to', '$ranMessageId')";
																				    	$insert_into_message="INSERT INTO message(Message_id ,Sender_Email_Id ,Sender_subject ,
															       	                             			MessageToMailId,messageInInbox) VALUES ('$ranMessageId','$senderEmailId',
															       	                             			'$subject','$to','$message')";
																				       	mysqli_query($dbConn,$insert_into_receipt);
																				       	mysqli_query($dbConn,$insert_into_message);
																				    }else{//Update the data 

																				    	$Update = "UPDATE receipt SET Email ='$to' WHERE Message_id='$message_id'";
																				    	mysqli_query($dbConn,$Update);
																				    	//also update the message table 
																				    }

										}
						}else{
							           $string = $to;
			                           if($string){
							                           $message_id =createmessageId($string);
										  	           $insert_into_receipt="INSERT INTO receipt (Email, Message_id) VALUES ('$to', '$message_id')";
										  	           $insert_into_message="INSERT INTO message(Message_id ,Sender_Email_Id ,Sender_subject,MessageToMailId,messageInInbox) VALUES ('$message_id','$senderEmailId',
															       	        '$subject','$to','$message')";
												       mysqli_query($dbConn,$insert_into_receipt);
												       mysqli_query($dbConn,$insert_into_message);
						               }                          
						}

            }
            

		function createmessageId($string){
											$string = explode('@', $string);
											array_pop($string);
											$string = implode('@', $string);
											$ranMessageId = $string.rand();
											return $ranMessageId;
								   }

			


?>
