<?php
session_start();
include "common/databaseConnected.php";
?>
<!DOCTYPE html>
<html>
<head>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src ="../lib/js/bootstrap.js"></script>
                <script src ="../lib/imageOnHover/jquery.contenthover.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
                <link rel="stylesheet" type="text/css" href="../css/FriendsPage.css" media="screen" />
		<link type ="text/css" rel="stylesheet" href="../lib/css/bootstrap.css" />
                
                <script type="text/javascript">
                $(document).ready(function(){
                                                $('#d1').contenthover({
                                                                    overlay_width:270,
                                                                    overlay_height:180,
                                                                    effect:'slide',
                                                                    slide_direction:'right',
                                                                    overlay_x_position:'right',
                                                                    overlay_y_position:'center',
                                                                    overlay_background:'#000',
                                                                    overlay_opacity:0.8
                                                })
                });

                </script>
		        		           
</head>
<body id="friendsPageBackground" background="../image/background_friendsPage.jpg">
		<div id="main_container">
        		<div id="header_main_container">
        		      <div id="hi_container">
        		      		<p class="hi">hi!</p>
                 	  </div>
                 	  <div id="serach_box">
                 	  		<form id="search_box_form" method="post" action="../php/search.php">
                 	  			<input type="text" class="search_box" name="search_input_box" size="21" maxlength="120">
                 	  			<input type="submit" value="search" class="searchbutton">
                 	  			<a href ="../php/advancedSearch.php" title="advancedSearch" class="avancedSearch"><p id="advaced_fonting">Advanced</p></a>
                 	  		</form>
                 	  </div>                  
        		</div>
        		<div id="header_sub_container">
        		            <ul class="nav nav-pills">
        		             	<li ><a href="../php/homeClick.php" tite="header_home" id="header_home">Home</a></li>
			        		    <li><a href="#">Profile</a></li>
			        			<li><a href ="../php/photos.php">Photos</a></li>
			        			<li class="active"><a href="../php/friends.php?user=<?php echo $_SESSION['login_username'];?>">Friends</a></li>
			        		</ul>
			        		<div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout">Logout</a>
			        		</div>
        		</div> 
        		
                </div> 

                <div class="imagesOfFriendsMainClass">
                    <?php
                        $usertNameContacts = $_SESSION['login_username'];
                        $databaseConn=connectToDb();  
                        $how_many_invitation_query = "SELECT * FROM NumberofFriendsToConnect WHERE To_Email='$usertNameContacts'";
                        $how_many_invitation_result = mysqli_query($databaseConn,$how_many_invitation_query);
                        $rows = mysqli_num_rows($how_many_invitation_result);
                        if($rows){
                                 // echo $rows;     
                        }                                       
                        while ($row = mysqli_fetch_array($how_many_invitation_result)){
                                                                                        $dataOfPersonQuery = "SELECT * from jinshelly_signup WHERE Email='".$row['From_Email']."'";
                                                                                        $dataOfPersonQueryResult = mysqli_query($databaseConn,$dataOfPersonQuery);
                                                                                        while ($column = mysqli_fetch_array($dataOfPersonQueryResult)){
                                                                                                ?>
                                                                                                <img id="d1" src="../uploadedImages/<?php echo $column['Email'].".jpg"?>" width="300" height="240" />
                                                                                                <div class="contenthover">
                                                                                                    <h3><?php echo $column['FirstName']." ".$column['LastName']?></h3>
                                                                                                    <p>
                                                                                                            <?php
                                                                                                             if($column['job_title']!=null && $column['company_name']!=null){
                                                                                                                echo $column['job_title'] . " " . "at ".$column['company_name'];
                                                                                                             }elseif($column['job_title']!=null && $column['company_name']==null){
                                                                                                                echo $column['job_title'];
                                                                                                             }else{
                                                                                                                echo $column['company_name'];
                                                                                                             }
                                                                                                            ?>
                                                                                                    </p>
                                                                                                    <p><a href="../ui/HomePage.php?user=<?php echo $column['Email']?>" class="mybutton"><?php echo $column['FirstName']." ".$column['LastName']?></a></p>
                                                                                                </div>
                                                                                                <?php                       
                                                                                        }
                        }
                        ?>         
                       
                </div>
</body>
</html>