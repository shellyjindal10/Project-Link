<?php 
    session_start();
	include "common/databaseConnected.php";


	
	$email = $_POST['email'];
	$description = $_POST['description'];
	$amount = $_POST['amount'];
	$person_who_paid_money = $_SESSION['login_username'];
	$message =" ";
	$doesEmailIdExists = "";
	$dbConn=connectToDb();

	if (strpos($email,',') !== false) {// multilpe email id are there 
    								$myArray = explode(',', $email);
									for ($i = 0; $i < count($myArray); $i++){
										$doesEmailIdExists=checkEmailIdExistsInDatabaseSystem($myArray[$i]);
										if($doesEmailIdExists=='true'){
													    $query = "insert into MoneyDistribution(Person_who_Paid_the_Money, amount_to_be_Returned, Person_who_needs_To_ReturnMoney,Description_ofTheBill) 
									  							  values ('$person_who_paid_money', '$amount', '$myArray[$i]','$description')";
														$result = mysqli_query($dbConn,$query);
										}else{
														$message = "Email Id does not exits in the system";
									            		echo $message;
										}
									}
	}else{// single email id 
						            $doesEmailIdExists=checkEmailIdExistsInDatabaseSystem($email);
						            if($doesEmailIdExists=='true'){
													$query = "insert into MoneyDistribution(Person_who_Paid_the_Money, amount_to_be_Returned, Person_who_needs_To_ReturnMoney,Description_ofTheBill) 
															  values ('$person_who_paid_money', '$amount', '$email','$description')";
													$result = mysqli_query($dbConn,$query);
						            }else{
						            			    $message = "Email Id does not exits in the system";
						            			    echo $message;
						            }						            
	}


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

																	





?>