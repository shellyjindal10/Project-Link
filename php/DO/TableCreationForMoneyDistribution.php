<?php 


	include "../common/databaseConnected.php";
	$dbConn=connectToDb();

	
	$ConnectId_query = "CREATE TABLE MoneyDistribution(Person_who_Paid_the_Money VARCHAR(100) NOT NULL,      
		                                               amount_to_be_Returned VARCHAR(100) NOT NULL,
		                                               Person_who_needs_To_ReturnMoney VARCHAR(100) NOT NULL,
		                                               Description_ofTheBill text NOT NULL)";
    echo $ConnectId_query;


	if (mysqli_query($dbConn,$ConnectId_query)) {
       	        echo "<br/>";
		  		echo "Table connectId created successfully";
	}else{
				echo "<br/>";
				echo "Table Creation failed";
	}
		










?>