<?php 
    session_start();
	include "common/databaseConnected.php";


	$url=$_SERVER['REQUEST_URI'];
	$email = $_GET['email'];
	$description = $_GET['description'];
	$amount = $_GET['amount'];
	$person_who_paid_money = $_SESSION['login_username'];
	$message =" ";
	$doesEmailIdExists = "";
	$dbConn=connectToDb();
	$kind_of_user = "";

	
	class MessageForSplitsWise {
	    public $check_for_dublicate_entry = "";
	    public $check_for_emailExists_In_System  = "";
	}

	$jsonMessage = new MessageForSplitsWise();


	
	if (strpos($email,',') !== false) {// multilpe email id are there 
    								$myArray = explode(',', $email);
									for ($i = 0; $i < count($myArray); $i++){
										$doesEmailIdExists=checkEmailIdExistsInDatabaseSystem($myArray[$i]);
										if($doesEmailIdExists=='true'){
											$check=mysqli_query($dbConn,"select * from MoneyDistribution where Person_who_Paid_the_Money='$person_who_paid_money' 
												                         and amount_to_be_Returned='$amount' 
												                         and Person_who_needs_To_ReturnMoney='$myArray[$i]'
												                         and Description_ofTheBill = '$description'");
    										$checkrows=mysqli_num_rows($check);
   											if($checkrows>0){
   												$jsonMessage->check_for_dublicate_entry = "dublicate entry";
   											}  
											else{ 
													    $query = "insert into MoneyDistribution(Person_who_Paid_the_Money, amount_to_be_Returned, Person_who_needs_To_ReturnMoney,Description_ofTheBill) 
									  							  values ('$person_who_paid_money', '$amount', '$myArray[$i]','$description')";
														$result = mysqli_query($dbConn,$query);
														//$jsonMessage->check_for_dublicate_entry="new entry";
										    }
										}else{
														$jsonMessage->check_for_emailExists_In_System="Email Id does not exits in the system";
										}
									}
	}else{// single email id 
						            $doesEmailIdExists=checkEmailIdExistsInDatabaseSystem($email);
						            if($doesEmailIdExists=='true'){
						            	$check=mysqli_query($dbConn,"select * from MoneyDistribution where Person_who_Paid_the_Money='$person_who_paid_money' 
												                         and amount_to_be_Returned='$amount' 
												                         and Person_who_needs_To_ReturnMoney='$email'
												                         and Description_ofTheBill = '$description'");
    									$checkrows=mysqli_num_rows($check);
   										if($checkrows>0){
   											$jsonMessage->check_for_dublicate_entry = "dublicate entry";
   										}  
										else{ 
											      
											       				$query = "insert into MoneyDistribution(Person_who_Paid_the_Money, amount_to_be_Returned, Person_who_needs_To_ReturnMoney,Description_ofTheBill) 
															  			  values ('$person_who_paid_money', '$amount', '$email','$description')";
																$result = mysqli_query($dbConn,$query);
											       
													
													//$jsonMessage->check_for_dublicate_entry="new entry";
										}
						            }else{
						            			    $message = "Email Id does not exits in the system";
						            			    $jsonMessage->check_for_emailExists_In_System="Email Id does not exits in the system";
						            }						            
	}

	echo json_encode($jsonMessage);


	function checkEmailIdExistsInDatabaseSystem($emailId){
									$databaseConn = connectToDb();
									$sql = "select * from login_information where Username = '$emailId'";
									$sql_result = mysqli_query($databaseConn,$sql);
									$number_of_rows = mysqli_num_rows($sql_result);
									if($number_of_rows!=0){
											return 'true';			
									}else{
							                return 'false';
									}		
	}


	function checkForSameEmailIdAsLoginPerson($emailId){
									$login_user = $person_who_paid_money;
									if($emailId!=$login_user){
											return "unique_user";
									}else{
										    return "login_user";
									}
	}

																	





?>