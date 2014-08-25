<?php 
          
           include "common/databaseConnected.php";	

           $action = $_GET['action'];
           $message_id = $_GET['messageid'];

           if($action=='delete'){
           						   $dbConn=connectToDb();
       							   $mail_delete_query = "DELETE FROM message where Message_id='$message_id'";
       							   $messageId_delete_query = "DELETE FROM receipt WHERE Message_id='$message_id'";
				        		   $mssages_mail_result = mysqli_query($dbConn,$mail_delete_query);
				        		   $messageId_delete_result = mysqli_query($dbConn,$messageId_delete_query);
				        		   header('Refresh: 1; URL=http://localhost:8080/Shelly/php/showMessages.php');
           }

           if($action=='reply'){ 
				                   $dbConn=connectToDb();
				                   $reply_mail_query = "SELECT * FROM message WHERE Message_id='$message_id'";
				                   $reply_mail_result = mysqli_query($dbConn,$reply_mail_query);
				                   while ($row = mysqli_fetch_array($reply_mail_result)){
                                          $email_id = $row['Sender_Email_Id'];
                                          $subject = $row['Sender_subject'];
				                   }
				                   header('Refresh: 0; URL=http://localhost:8080/Shelly/php/inbox.php?email_to='.$email_id.'&subject='.$subject);
			}
			if($action=='forward'){
									
				                   header('Refresh: 0; URL=http://localhost:8080/Shelly/php/inbox.php?message_id='.$message_id);
			}

			



?>