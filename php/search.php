<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/AdvancedPage.css" media="screen" />
		<script src="../js/HomePage.js"></script>
		        		           
</head>
<bodyid="searchPageBackground" background="../image/background_searchPage.jpg" >
		<div id="advanced_Search_MainDiv">

		<div id="header_main_container">
		        		      <div id="hi_container">
		        		      		<p class="hi">
		        		      			<a href="../ui/HomePage.php">
		        		      				hi!
		        		      		    </a>
		        		      		</p>
		                 	  </div>		                 	                   
		</div>
		</div>
</body>
</html>




<?php 

include "common/databaseConnected.php";

$searchItem =  $_POST['search_input_box'];
$is_item_emailId=validate_email_id($searchItem);
$dbConn=connectToDb();

if($is_item_emailId==0){//search item is email id 
						$query = "select * from jinshelly_signup where Email ='$searchItem'";
						$result = mysqli_query($dbConn,$query);
						while ($row = mysqli_fetch_array($result)){
							    $email_id = $row['Email'];
							    header('Refresh: 1; URL=http://localhost/Project-Link/ui/HomePage.php?user='.$email_id);	
						}
}
if($is_item_emailId==1){// search item is not an email id, it can be First Name or Last Name
						$query = "select * from jinshelly_signup where FirstName ='$searchItem'";
						$result = mysqli_query($dbConn,$query);
						$result1 = mysqli_query($dbConn,$query);
						$countFirstName=0;
						$countLastName=0;
						//echo $result1;
						if (count(mysqli_fetch_array($result1)) > 1){
										while ($row = mysqli_fetch_array($result)){
												    $text = $row['FirstName'];
												    $email_id=$row['Email'];
												    $countFirstName=$countFirstName+1;												    
												    createSearchIdDiv($row['FirstName'],$row['LastName'],$row['company_name'],$row['job_title'],$row['country'],$row['Email']);
										}
										if($countFirstName==1){
											header('Refresh: 1; URL=http://localhost/Project-Link/ui/HomePage.php?user='.$email_id);	
										}
						}else{
										$query = "select * from jinshelly_signup where LastName  ='$searchItem'";
										$result = mysqli_query($dbConn,$query);
										$result1 = mysqli_query($dbConn,$query);
										if (count(mysqli_fetch_array($result1)) > 1){
												while ($row = mysqli_fetch_array($result)){
															$text = $row['LastName'];
														    $email_id=$row['Email'];
														    $countLastName=$countLastName+1;
														    createSearchIdDiv($row['FirstName'],$row['LastName'],$row['company_name'],$row['job_title'],$row['country'],$row['Email']);
														    //header('Refresh: 1; URL=http://localhost:8080/Shelly/ui/HomePage.php?user='.$email_id);							    
												}
												if($countLastName==1){
															header('Refresh: 1; URL=http://localhost/Project-Link/ui/HomePage.php?user='.$email_id);	
												} 
										}else{//No Such Record in the Database
															echo "<br/>"."No Such Records";
															session_start();
															header('Refresh: 1; URL=http://localhost/Project-Link/ui/HomePage.php?user='.$_SESSION['login_username']);
															?>
															<script type="text/javascript">
																	     $("#search_message").html("No Such Records!");
																	    document.getElementById('search_message').innerHTML = '<?php echo "No Such Records!"?>';																	
															</script>
															<?php
															
										}
						}		     
}


function validate_email_id($searchItem){// Regex Expression
						if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$searchItem)) {
										  $emailErr = "Invalid email format";
										  return 1;}
						else{
							return 0;
						}
}

function createSearchIdDiv($firstName,$lastName,$companyName,$jobTitle,$Country,$email_id){
	?>
			<link rel="stylesheet" type="text/css" href="../css/SearchPage.css" media="screen" />
			<div class="searchId">
					<div class="search_profile_pic">
					        <a href="../ui/HomePage.php?user=<?php echo $email_id?>">
							<?php echo "<img id='profile_image' border='0' src='../uploadedImages/".$email_id.".jpg"."' 
							             name='profile_pic'  width='100%' height='100%' >"?>
							</a>				
					</div>
					<p class="search_profile_name">
						<a href="../ui/HomePage.php?user=<?php echo $email_id?>">
									<?php echo $firstName." ".$lastName?>
						</a>
					</p>
					<?php 
									if($companyName!=null && $jobTitle!=null){
					?><p class="search_professional_title"><?php echo $jobTitle." "."at"." ".$companyName ?></p>
					<?php }			elseif($companyName==null&&$jobTitle!=null){
					?><p class="search_professional_title"><?php echo $jobTitle." "?></p>
					<?php }			elseif($jobTitle==null && $companyName!=null){
					?><p class="search_professional_title"><?php echo $companyName." "?></p>
					<?php }	?>
					<p class="search_country"><?php ?><?php echo $Country?></p>
			</div>
	<?php 
}

?>