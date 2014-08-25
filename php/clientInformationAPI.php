<?php 
        include "common/databaseConnected.php";

        echo "helo world!";
        $homePageData = array();

        //$query = "select summary,experience,education from jinshelly_signup";
        
        	$db_found = connectToDb();
        	if ($db_found) {

			$SQL = "SELECT * FROM jinshelly_signup";
			$result = mysqli_query($db_found,$SQL);

			while ( $db_field = mysqli_fetch_array($result) ) {			
					            $homePageData['summary']=$db_field['summary'];
					            $homePageData['experience']=$db_field['experience'];
					            $homePageData['education']=$db_field['education'];
					            $homePageData['country']=$db_field['country'];
					            $homePageData['company_name']=$db_field['company_name'];
					            $homePageData['job_title']=$db_field['job_title'];

					            echo "Summary :".$homePageData['summary'];
					            echo json_encode($homePageData);
			}
			mysqli_close($db_found);

			}
			else {

			echo  "Database NOT Found ";
			mysqli_close($db_found);

			}	

?>










