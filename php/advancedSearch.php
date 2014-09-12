<?php 						session_start();
?>
<!DOCTYPE html>
<html>
<head>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.js"></script>
		<script language="Javascript" type="text/javascript" src="../lib/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/AdvancedPage.css" media="screen" />
		<script src="../js/HomePage.js"></script>
		        		           
</head>
<body id="advancedPageBackground" background="../image/background_advancedPage.jpg">
		<div id="advanced_Search_MainDiv">

		<div id="header_main_container">
		        		      <div id="hi_container">
		        		      		<p class="hi">
		        		      		    <a href="../ui/HomePage.php">
		        		      				hi!
		        		      		    </a>
		        		      		</p>
		                 	  </div>
		                 	  <div id="serach_box">
		                 	  		<form id="search_box_form" method="post" action="../php/search.php">
		                 	  			<input type="text" class="search_box" name="search_input_box" size="21" maxlength="120">
		                 	  			<input type="submit" value="search" class="searchbutton">
		                 	  		</form>
                 	         </div>
		                 	  <div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout"><p id="logout">Logout</p></a>
			        		  </div>		                 	                   
		</div>
		<div class ="advanced_container">
			<div class="advanced_left_container">
               <form action="" method="get">
				  <p id="search_label">Keywords<br>
				  		<input type="text" name="keyword" id="advanced_input_type">
				  </p>
				  <p id="search_label">First Name<br>
				  		<input type="text" name="fname" id="advanced_input_type">
				  </p>
				  <p id="search_label">Last Name<br>
				  		<input type="text" name="lname" id="advanced_input_type">
				  </p>
				  <p id="search_label">Job Title<br>
				  		<input type="text" name="jobTitle" id="advanced_input_type">
				  </p>
				  <p id="search_label">Company<br>
				  		<input type="text" name="company" id="advanced_input_type">
				  </p>
				  <p id="search_label">Country<br>
				  		<input type="text" name="country" id="advanced_input_type">
				  </p>				  
				  <input type="submit" value="Search" class="search_button">

				</form> 
			</div>
			<div class="advanced_right_container">
			     	<p id="advanced_people_search">Advanced People Search</p>
			</div>
                   
		</div>

		</div>
</body>
</html>
<?php 

			include "common/databaseConnected.php";

			$keyword="";
            $firstName="";
            $lastName="";
            $jobTitle="";
            $company="";
            $country="";
            $param = "";


            if((isset($_GET["keyword"])) && $_GET['keyword']!=""){ 
					$keyword = $_GET["keyword"];
					$param.= "keyword LIKE '%".$keyword."%' AND ";
		    }
		    if((isset($_GET["fname"])) && $_GET['fname']!=""){ 
					$firstName=$_GET["fname"];
					$param.= "FirstName LIKE '%".$firstName."%' AND ";

		    }
			if((isset($_GET["lname"])) && $_GET['lname']!=""){ 
					$lastName=$_GET["lname"];
					$param.= "LastName LIKE '%".$lastName."%' AND ";
			}
			if((isset($_GET["jobTitle"])) && $_GET['jobTitle']!=""){ 
					$jobTitle=$_GET["jobTitle"];
					$param.= "job_title LIKE '%".$jobTitle."%' AND ";
			}
			if((isset($_GET["company"])) && $_GET['company']!=""){  
					$company=$_GET["company"];
					$param.= "company_name LIKE '%".$company."%' AND ";
			}
			if((isset($_GET["country"])) && $_GET['country']!=""){  
					$country=$_GET["country"];
					$param.= "country LIKE '%".$country."%' AND ";
			}

            $dbConn1=connectToDb();
            $query= "SELECT * FROM jinshelly_signup WHERE $param 1=1 ";
		    $result = mysqli_query($dbConn1,$query);
		    ?>
		    <div id ="advaced_search_results">


		    <?php 
			while ($row = mysqli_fetch_array($result)){
							    $name = $row['FirstName'];
                                createSearchIdDiv($row['FirstName'],$row['LastName'],$row['company_name'],$row['job_title'],$row['country'],$row['Email']);
			}?>
            </div>
            <?php 
			function createSearchIdDiv($firstName,$lastName,$companyName,$jobTitle,$Country,$email_id){
			?>
			<link rel="stylesheet" type="text/css" href="../css/AdvancedPage.css" media="screen" />
			<div class="searchId">
					<div class="search_profile_pic">
					        <a href="../ui/HomePage.php?user=<?php echo $email_id?>">
							<?php echo "<img id='profile_image' border='0' src='../uploadedImages/".$email_id.".jpg"."' 
							             name='profile_pic'  width='100%' height='100%' >"?>
							</a>				
					</div>
					<div class="search_result_desc">
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
						$user= $_SESSION['login_username'];
						if ($email_id!= $user) {?>
					<div id="inboxDiv">
							<a href ="../php/inbox.php?email_to=<?php echo $email_id?>" title="advancedSearch">
							        <input type="submit" value="Message" class="inbox_button">
							</a>
					</div>
					<?php } ?>
			
			</div>
	<?php 
}



			
			
			
			
			
			



?>
