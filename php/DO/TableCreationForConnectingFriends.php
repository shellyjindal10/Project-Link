<?php 


	include "../common/databaseConnected.php";
	$dbConn=connectToDb();

	$ConnectId_query = "CREATE TABLE connectId(Connect_Id VARCHAR(100) NOT NULL,To_Email VARCHAR(100) NOT NULL,
       	PRIMARY KEY (Connect_Id))";

    $Connecting_query = "CREATE TABLE NumberofFriendsToConnect(Connect_Id VARCHAR(100) NOT NULL,Message_To_Connect text,From_Email VARCHAR(100) NOT NULL,
    	To_Email VARCHAR(100) NOT NULL,	FromRelation VARCHAR(100),PRIMARY KEY (Connect_Id))";


	if (mysqli_query($dbConn,$ConnectId_query)) {
       	        echo "<br/>";
		  		echo "Table connectId created successfully";
	}
    if (mysqli_query($dbConn,$Connecting_query)) {
       	        echo "<br/>";
		  		echo "Table NumberofFriendsToConnect created successfully";
	}










?>