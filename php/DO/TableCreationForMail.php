<?php 

	include "../common/databaseConnected.php";
	$dbConn=connectToDb();



       $Reciept_Table_creation_query="CREATE TABLE receipt(Email VARCHAR(100) NOT NULL,Message_id VARCHAR(100) NOT NULL,
       	PRIMARY KEY (Message_id))";

       $Message_Table_creation_query="CREATE TABLE message(Message_id VARCHAR(100) NOT NULL,Sender_Email_Id VARCHAR(100) NOT NULL,Sender_subject VARCHAR(100),
       	                             MessageToMailId text,ReplyToMailId text,messageInInbox text,PRIMARY KEY (Message_id))";
       
       


	  
       if (mysqli_query($dbConn,$Reciept_Table_creation_query)) {
       	        echo "<br/>";
		  		echo "Table receipt created successfully";
	   }
       if (mysqli_query($dbConn,$Message_Table_creation_query)) {
       	        echo "<br/>";
		  		echo "Table jinshelly_signup created successfully";
	   }

?>