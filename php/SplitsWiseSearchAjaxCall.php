<?php 
       		session_start();
			include "common/databaseConnected.php";
			$dbConn=connectToDb();

    
			$url=$_SERVER['REQUEST_URI'];
			$keyword = $_GET['keyword'];
			$emailArray = array();
			$count = 0;

			class EmailIdsForSplitsWise {
	   								 public $emailIds = "";
			}

			$jsonMessage = new EmailIdsForSplitsWise();

	        $sql = "select * from jinshelly_signup where Email like '%$keyword%' ";
	        //echo $sql;
	        $check=mysqli_query($dbConn,$sql);
	        $checkrows=mysqli_num_rows($check);
	        if($checkrows!=0){
	        	while ($row = mysqli_fetch_array($check)){
	        		                        $emailArray[$count]=$row['Email'];
	        		                        $count = $count +1;
	        		                        $jsonMessage->emailIds;
	        	}
	        }

	       echo json_encode($emailArray);
	        






?>