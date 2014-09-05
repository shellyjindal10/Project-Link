
<?php

        $con=mysqli_connect("localhost","db1","shellybelly10");
		if (mysqli_connect_errno()) {
		  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		$sql="CREATE DATABASE my_db_shelly";
		if (mysqli_query($con,$sql)) {
		 		 echo "Database my_db_shelly created successfully";
		} 

 // Create a Table if not exists 
		$con=mysqli_connect("localhost","db1","shellybelly10","my_db_shelly");
		if (mysqli_connect_errno()) {
		}
		else{
		 		echo "succesfully connected to database";
		}

		$query="CREATE TABLE people_information(Name VARCHAR(50),Email_Id VARCHAR(100) NOT NULL,Phone_Number VARCHAR(20),Event_Date timestamp(6) NOT NULL, Event_Name  VARCHAR(100))";

		// Execute query
		if (mysqli_query($con,$query)) {
		  		echo "Table People_Information created successfully";
		} 

       $name = $_POST['name'];
       $email_id = $_POST['email_id'];
       $phone_number = $_POST['phone_number'];
       $event_date=$_POST['event_date'];
       $event_name=$_POST['event_name'];
       $search_by_email_id=$_POST['searching_by_email_id'];
       echo "<br/>";
       echo "Searching by email id :";
       echo $search_by_email_id;

       

       $valid=are_enteries_valid($name,$email_id,$phone_number,$event_date);
       if($valid==0){      

			       // check if the email id already exists in the Database or not , 
			       // if email id is there then it will update else insert the record 
			       $Update_or_Insert_check = "SELECT * FROM People_Information WHERE Email_Id ='$email_id'";
			       $result = mysqli_query($con,$Update_or_Insert_check);
			       $row_cnt = mysqli_num_rows($result);

			       $result->close();
			       if($row_cnt!=0){
			       	        echo "<br/>";
					       	echo "This Email _id already exisits ,hence the Record is Updated ";
					       	$Update = "UPDATE people_information SET Name='$name' ,Phone_Number ='$phone_number',Event_Date='$event_date',Event_Name='$event_name' WHERE Email_Id ='$email_id' ";
					        mysqli_query($con,$Update);
			       }
			       else{
					       	mysqli_query($con,"INSERT INTO people_information (Name, Email_Id,Phone_Number,Event_Date,Event_Name)
							VALUES ('$name', '$email_id','$phone_number','$event_date' ,'$event_name')");
							echo "<br/>";
							echo "The New Record is Inserted";
			       }
			       sendMail($email_id,$name);

				    mysqli_close($con);

	 }else{
	 	echo "<br/>";
	 	echo "The Enteries are not Valid , Please RE-ENTER the values";
	 	header('Refresh: 5; URL=http://localhost:8080/Shelly/Form.html');
	 }

	    function are_enteries_valid($name,$email_id,$phone_number,$event_date){
		            $count =0;
			    	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					  $nameErr = "Only letters and white space allowed";
					  echo "<br/>";
					  echo $nameErr;
					  $count=$count+1;
					}

					if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email_id)) {
					  $emailErr = "Invalid email format";
					  echo "<br/>";
					  echo $emailErr;
					  $count=$count+1;
					}

					if( !preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone_number)) {
						echo "<br/>";
			    		echo "Please enter a valid phone number";
			    		$count=$count+1;
					}
					if (!preg_match('/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/',$event_date)){
                        $eventErr="Your hire date entry does not match the YYYY-MM-DD required format.";
                        echo "<br/>";
                        echo $eventErr;
                        $count=$count+1;
                    }

   				    return $count;
	    };

	    function sendMail($email_id,$name){

	    	require_once("../lib/PHPMailer/class.phpmailer.php");
	    	$mail = new PHPMailer();
	    	

            $mail->IsSMTP();  // telling the class to use SMTP
			$mail->Host     = "smtp.gmail.com"; // SMTP SERVER
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->SMTPDebug = 1;
			$mail->SMTPSecure = "tls";
			$mail->Username = "jinshelly08@gmail.com";
			$mail->Password = "mydreamparis";

			$mail->From     = "jinshelly@gmail.com";
			$mail->AddReplyTo("jinshelly@gmail.com","First Last");
			$mail->AddAddress("jinshelly@gmail.com","Shelly Jindal");
			$mail->Subject  = "First PHPMailer Message";
			$mail->Body     = "Hi! \n\n This is my first e-mail sent through PHPMailer.";
			$mail->WordWrap = 50;
			if(!$mail->Send()) {
				    echo "<br/>";
					echo 'Message was not sent.';
					echo "<br/>";
					echo 'Mailer error: ' . $mail->ErrorInfo;
			} else {
				    echo "<br/>";
					echo 'Message has been sent.';
					header('Refresh: 5; URL=http://localhost/Project-Link/ui/ThanksYouPage.html');
			}
	    };

?>