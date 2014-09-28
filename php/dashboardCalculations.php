<?php

	session_start();
	include "common/databaseConnected.php";

	$userName = $_SESSION['login_username'];
	$action=$_GET['action'];

	if($action=='youOwed'){

				$dbConn=connectToDb();
				$doublearray = array();
				$personNAME="";
				$total_amount=0;
				$youOweQuery = "select * from MoneyDistribution where Person_who_needs_To_ReturnMoney='$userName'";
				$youOweQueryResult = mysqli_query($dbConn,$youOweQuery) or trigger_error("Query Failed! SQL: $conn - Error: ".mysqli_error(), E_USER_ERROR);
				$checkrows=mysqli_num_rows($youOweQueryResult);
				$count = 0;
					if($checkrows==0){
						echo "<br/>"."You do not owe any money.";						
					}else{
						while ($row = mysqli_fetch_array($youOweQueryResult)){
							       
							        $doublearray[$count] = array();
									$amount=$row['amount_to_be_Returned'];
									$doublearray[$count]['amount'] = $amount;
									$personWhoOwed = $row['Person_who_Paid_the_Money'];
									$nameQuery = "select * from jinshelly_signup where Email='$personWhoOwed'";
									$nameQueryResult = mysqli_query($dbConn,$nameQuery);
									if(mysqli_num_rows($nameQueryResult)>0){
					           						while ($rowName = mysqli_fetch_array($nameQueryResult)){
					           								$personNAME = $rowName['FirstName']." ".$rowName['LastName'];
					           								$doublearray[$count]['name'] = $personNAME;	

					           						}
					           		}
					           		$count = $count+1;

						}
						$calculatedArray = computeOutcome($doublearray);
                        foreach ($calculatedArray as $key => $value) {
                        		echo "<br/>".'You Owe '.$key.' $ '.$value.'<br/>';
                        }
					}						
	}
	else{// for action youAreOwed
				$db=connectToDb();
				$doublearray = array();
				$personNAME="";
				$total_amount=0;
				$count = 0;
				$sql = "select * from MoneyDistribution where Person_who_Paid_the_Money='$userName'";
				$sqlResult = mysqli_query($db,$sql);
				$checkrows=mysqli_num_rows($sqlResult);
				if($checkrows==0){
						echo "<br/>"."You are not owed any money.";
				}else{
			           while ($row = mysqli_fetch_array($sqlResult)){

			           		$doublearray[$count] = array();
			           		$amount=$row['amount_to_be_Returned'];
			           		$doublearray[$count]['amount'] = $amount;
			           		$personWhoOwed = $row['Person_who_needs_To_ReturnMoney'];
			           		$nameQuery = "select * from jinshelly_signup where Email='$personWhoOwed'";
			           		$nameQueryResult = mysqli_query($db,$nameQuery);
			           		if(mysqli_num_rows($nameQueryResult)>0){
			           						while ($rowName = mysqli_fetch_array($nameQueryResult)){
			           								$personNAME = $rowName['FirstName']." ".$rowName['LastName'];
			           								$doublearray[$count]['name'] = $personNAME;
			           						}
			           		}
			           		$count = $count+1;
			           }
                        $calculatedArray = computeOutcome($doublearray);
                        foreach ($calculatedArray as $key => $value) {
                        		echo "<br/>".$key. " owes you ".'$ '.$value;
                        }

				}
	}


	function computeOutcome($array) {
												    $result=array();
												    foreach ($array as $item) {
												        $id=$item['name'];
												        if (isset($result[$id])) {
												            $result[$id]=$result[$id]+$item['amount'];
												        } else {
												            $result[$id]=$item['amount'];
												        }
												    }
												    return $result;
						}



?>