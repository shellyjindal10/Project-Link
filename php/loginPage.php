<?php

       session_start();
       
	   $username = $_POST['username'];
	   $_SESSION['login_username']=$username;
       $password = $_POST['password'];
      // echo $username;
       //echo "<br/>".$password;
       

       $dbConn=connectToDb();
       $check_enter_for_sign_up=isSignUp($username,$dbConn);
       if($check_enter_for_sign_up=='signedUp'){
       	    $check_for_entry = insertOrUpdate($username,$password,$dbConn);
       	    if($username){
       	    	header('Refresh: 1; URL=http://localhost/Project-Link/ui/HomePage.php?user='.$username);
        		exit();
        }
       	    
       }else{
       	   echo "<br/>"."The user needs to Sign Up first!!";
       	   header('Refresh: 4; URL=http://localhost/Project-Link/ui/Login.html');
       }
       
       //check in the db has this entry on this in the db , if the 

       function connectToDb(){
		       	$con=mysqli_connect("localhost","db1","shellybelly10","my_db_shelly");
				if (mysqli_connect_errno()) {
					echo "<br/>";
					echo "DB Connection Failed";
				}
				return $con;
       }

       function insertOrUpdate($username,$password,$dbConn){
       	      $check_query = "SELECT * FROM login_information WHERE Username='$username'";
       	      $result = mysqli_query($dbConn,$check_query);
			  $row_cnt = mysqli_num_rows($result);
     	      $result->close();

			  if($row_cnt!=0){
			       	        //echo "<br/>";
					       	$Update = "UPDATE login_information SET Password ='$password' WHERE Username='$username'";
					        mysqli_query($dbConn,$Update);
			  }else{
			  	            $insert="INSERT INTO login_information (Username, Password) VALUES ('$username', '$password')";
					       	mysqli_query($dbConn,$insert);
							echo "<br/>";
							echo "The New Record is Inserted";
			  }

       }


       function isSignUp($username,$dbConn){
                 $check_query = "SELECT * FROM jinshelly_signup WHERE Email='$username'";
                 $result = mysqli_query($dbConn,$check_query);
				 $row_cnt = mysqli_num_rows($result);
	     	     $result->close();

				 if($row_cnt!=0){
				 	            return "signedUp";
				 }else{				  	            
				  	            return "needToSignUp";
				 }
       }


?>