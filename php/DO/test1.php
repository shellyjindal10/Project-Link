<?php 

		include "../common/databaseConnected.php";
	   	$dbConn=connectToDb();

	   	 $SignUp_Table_creation_query="CREATE TABLE jinshelly_signup(FirstName VARCHAR(100) NOT NULL,LastName VARCHAR(100) NOT NULL,Email VARCHAR(100),
       								Password VARCHAR(100),Birthday_Date timestamp(6) NOT NULL, sexuilty varchar(10))";
       		$alter_jinshelly_signup_query="ALTER TABLE jinshelly_signup
									    ADD COLUMN zipcode VARCHAR(20),
									    ADD COLUMN job_title VARCHAR(200),
									    ADD COLUMN company_name VARCHAR(100),
										ADD COLUMN summary VARCHAR(300),
										ADD COLUMN experience VARCHAR(300),
										ADD COLUMN education VARCHAR(300)";
	  $alter_jinshelly_signup_query="ALTER TABLE jinshelly_signup
									    ADD COLUMN display_image VARCHAR(30)";
	  $alter_jinshelly_signup_query1="ALTER TABLE jinshelly_signup
									    ADD COLUMN Mail_sendTo VARCHAR(50),
									    ADD COLUMN Mail_message text";

       if (mysqli_query($dbConn,$SignUp_Table_creation_query)) {
       	        echo "<br/>";
		  		echo "Table login_information created successfully";
	   }
       if (mysqli_query($dbConn,$alter_jinshelly_signup_query)) {
       	        echo "<br/>";
		  		echo "Table jinshelly_signup created successfully";
	   }
	   if (mysqli_query($dbConn,$alter_jinshelly_signup_query)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$alter_jinshelly_signup_query1)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }

?>