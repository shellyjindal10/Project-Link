<?php



       $dbConn=connectToDb();

       $Table_creation_query="CREATE TABLE login_information(Username VARCHAR(100) NOT NULL,Password VARCHAR(100) NOT NULL)";
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

	  $update_query="update jinshelly_signup set summary = 'I am keen learner about the new technology and my objective is to gain more knowledge 
	  				about the best technology to keep with with the rapid changing technology trend. I pride myself in being a hardworker and a 
	  				results-oriented person.' WHERE Email ='jinshelly@gmail.com'";

      $update_query2="update jinshelly_signup set experience = 'My work at Arvind was Senior Developer, involving in active participation in design
                     of web application both frontend as well as backend.' WHERE Email ='jinshelly@gmail.com'";

      $update_query3="update jinshelly_signup set education = 'Hemwati Nandan Bahuguna Garhwal University B.tech, Computer Science' WHERE Email ='jinshelly@gmail.com'";

      $update_query4="update jinshelly_signup set country = 'USA' WHERE Email ='gautam.sudeep@gmail.com'";

      $update_query5="update jinshelly_signup set company_name = 'Amazon' WHERE Email ='sudip.bindra@gmail.com'";

      $update_query6="update jinshelly_signup set job_title = 'Senior Software Engineer' WHERE Email ='sudip.mishra@gmail.com'";

      $update_query7="update jinshelly_signup set zipcode = '56003' WHERE Email ='jinshelly@gmail.com'";

      $update_query8="update jinshelly_signup set job_title = 'Technical Architect' WHERE Email ='gautam.sudeep@gmail.com'";

      $update_query9="update jinshelly_signup set company_name = 'Yahoo' WHERE Email ='gautam.sudeep@gmail.com'";

      $update_query10="update jinshelly_signup set summary = 'Worked in Core Linux skills. Performance improvement of system & monitoring.Specialties:Core Linux knowledge ,
      				 Networking , Scripting in Perl, bash.Apache webserver, Mysql DB management. Worked on : Javascript, PHP, HTML, CSS' WHERE Email ='gautam.sudeep@gmail.com'";

      $update_query11="update jinshelly_signup set education = 'Indian Institute Of Information Technology' WHERE Email ='gautam.sudeep@gmail.com'";

      $update_query12="update jinshelly_signup set experience = 'Working on deployment, development and Monitoring platform of Yahoo! System.' WHERE Email ='gautam.sudeep@gmail.com'";
      

       if (mysqli_query($dbConn,$Table_creation_query)) {
       	        echo "<br/>";
		  		echo "Table login_information created successfully";
	   }
       if (mysqli_query($dbConn,$SignUp_Table_creation_query)) {
       	        echo "<br/>";
		  		echo "Table jinshelly_signup created successfully";
	   }
	   if (mysqli_query($dbConn,$update_query)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query2)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query3)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query4)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query5)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query6)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query7)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query8)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query9)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query10)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query11)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   if (mysqli_query($dbConn,$update_query12)) {
       	        echo "<br/>";
		  		echo "updated the value";
	   }
	   $result = mysqli_query($dbConn,$alter_jinshelly_signup_query);
		if ( false===$result ) {
		  echo "error: "."<br/>".mysqli_error($dbConn);
		}
		else {
		  echo 'done.';
		}
	  $result1 = mysqli_query($dbConn,$alter_jinshelly_signup_query1);
		if ( false===$result1) {
		  echo "error: "."<br/>".mysqli_error($dbConn);
		}
		else {
		  echo 'done.';
		}
	   






		function connectToDb(){

				       	$con=mysqli_connect("localhost","db1","shellybelly10","my_db_shelly");
						if (mysqli_connect_errno()) {
							echo "<br/>";
							echo "DB Connection Failed";
						}else{
							echo "<br/>";
							echo "succesfully connected to database";
						}
						return $con;
		}





?>