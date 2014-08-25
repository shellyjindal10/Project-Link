<?php


$firstName =  $_POST['first_name'];
$lastName = $_POST['last_name'];
$Email = $_POST['email'];
$ReEnterEmail = $_POST['re-email'];
$Password = $_POST['password'];
$birthday_day = $_POST['daydropdown'];
$birthday_month = $_POST['monthdropdown'];
$birthday_year = $_POST['yeardropdown'];
$sexuilty = $_POST['sex'];


$birth_date = birthday_date($birthday_day,$birthday_month,$birthday_year);
$email_valid = validate_email_id($Email,$ReEnterEmail);
$check_forNonNull_Enteries = valid_all_enteries_are_not_null($firstName,$lastName,$Email,$Password,$birth_date,$sexuilty);

if($email_valid=='Validated' && $check_forNonNull_Enteries=='valided'){

       $dbConn=connectToDb();
       $check_for_entry = insertOrUpdate($firstName,$lastName,$Email,$Password,$birth_date,$sexuilty,$dbConn);
}
else
{
	header('Refresh: 5; URL=http://localhost:8080/Shelly/ui/Login.html');
}




//$check_for_entry = insertOrUpdate($username,$password,$dbConn);

function connectToDb(){

		       	$con=mysqli_connect("localhost","db1","shellybelly10","my_db_shelly");
				if (mysqli_connect_errno()) {
					echo "<br/>";
					echo "DB Connection Failed";
				}else{
					echo "<br/>";
					//echo "succesfully connected to database";
				}
				return $con;
}

function birthday_date($birthday_day,$birthday_month,$birthday_year){
	            $b_Month=0;
				
				
			    if("Jan"){
			        $b_Month=01;
			        }
			    if("Feb"){
			    	$b_Month=02;
			    }
			    if("Mar"){
			    	$b_Month=03;
			    }
			    if("Apr")
			    {
			    	$b_Month=04;
			    }
			    if("May"){
                    $b_Month=05;
			    }
			    if("Jun"){
			    	$b_Month=06;
			    }
			    if("Jul"){
			    	$b_Month=07;
			    }
			    if("Aug"){
			    	$b_Month=08;
			    }
			    if("Sep"){
			    	$b_Month=09;
			    }
			    if("Oct"){
			    	$b_Month=10;
			    }
			    if("Nov"){
			    	$b_Month=11;
			    }
			    if("Dec"){
			    	$b_Month=12;
			    }

			    $date=$birthday_year."-".$b_Month."-".$birthday_day;
			    return $date;			
}

function validate_email_id($Email,$ReEnterEmail){
	//apply the regex expression 
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$Email)) {
					  $emailErr = "Invalid email format";
					  echo "<br/>";
					  echo $emailErr;
					  //header('Refresh: 5; URL=http://localhost:8080/Shelly/ui/Login.html');
					  return "nonValidated";
					}
	if($Email!=$ReEnterEmail){
					  echo "<br/>"." Enail Id and Re-Enter Email id is not matching ..... resubmit the sign Up Form";
					  //header('Refresh: 5; URL=http://localhost:8080/Shelly/ui/Login.html');
					  return "nonValidated";
	}
	else{
		return "Validated";
	}
}


function valid_all_enteries_are_not_null($firstName,$lastName,$Email,$Password,$birth_date,$sexuilty){
	if($firstName!=null && $lastName!=null && $Email!=null && $Password!= null &&  $birth_date!=null && $sexuilty!=null){
		return "valided";
	}else{
		echo "<br/>"."The Sign up has a null entry";
		//header('Refresh: 5; URL=http://localhost:8080/Shelly/ui/Login.html');
		return "nonValidated";
	}
}


function insertOrUpdate($firstName,$lastName,$Email,$Password,$birth_date,$sexuilty,$dbConn){

			  $check_query = "SELECT * FROM jinshelly_signup WHERE Email='$Email'";
       	      $result = mysqli_query($dbConn,$check_query);
			  $row_cnt = mysqli_num_rows($result);
     	      $result->close();

			  if($row_cnt!=0){
			       	        echo "<br/>";
					       	echo "This UserName already exisits ,hence the Record is Updated ";
					       	$Update = "UPDATE jinshelly_signup SET Password ='$Password',FirstName='$firstName',LastName='$lastName',Birthday_Date='$birth_date',sexuilty='$sexuilty'
					       	WHERE Email='$Email'";
					        mysqli_query($dbConn,$Update);
			  }else{
			  	            $insert="INSERT INTO jinshelly_signup (FirstName, LastName,Email,Password,Birthday_Date,sexuilty)
			  	            VALUES ('$firstName', '$lastName','$Email','$Password','$birth_date','$sexuilty')";
					       	mysqli_query($dbConn,$insert);
							echo "<br/>";
							echo "The New Record is Inserted";
							header('Refresh: 1; URL=http://localhost:8080/Shelly/ui/Login.html');
			  }
}



?>