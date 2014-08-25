<?php 

	   include "../common/databaseConnected.php";
	   $dbConn=connectToDb();



       $alterMessageTableScript="ALTER TABLE  message
									    ADD COLUMN messageInInbox text";

       if (mysqli_query($dbConn,$alterMessageTableScript)) {
       	        echo "<br/>";
		  		echo "Alter table message successfully";
	   }

?>