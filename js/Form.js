


console.log('hey i am in Form.js');
$(document).ready(function()
{
	$("#person_submit").click(function(){
		$name=$("#person_name").val();
		if($name.length <1){
			alert("Please enter the  name");
		}
		//console.log($name);

		$email_id=$("#person_email_id").val();
		//valid_emailId($email_id);		

		$phone_number=$("#person_phone_nunber").val();
		if($phone_number.length <1){
			alert("Please enter the  phone number of the person");
		}

		$event_date=$("#person_event_date").val();
		if($event_date.length <1){
			alert("Please enter the event date");
		}

		$event_name=$("#person_event_name").val();
		if($event_name.length <1){
			alert("Please enter the name of event");
		}

	});

		

});


