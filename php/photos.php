<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src ="../lib/js/bootstrap.js"></script>
		<script src="../lib/js/carousel.js"></script>			
		<link rel="stylesheet" type="text/css" href="../css/HomePage.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="../css/photosPage.css" media="screen" />		
		<link type ="text/css" rel="stylesheet" href="../lib/css/bootstrap.css" />
		<!-- Zooming scripts starts including here -->

		<script src='../lib/Zoom/jquery-1.8.3.min.js'></script>
		<script src='../lib/Zoom/jquery.elevatezoom.js'></script>

		<!-- Zooming scripts ends here -->
		<script type="text/javascript">
				$(document).ready(function(){
					//$('.carousel').carousel({
						//interval:1000
					//});
				});
				 $('#zoom_01').elevateZoom({
    										zoomType: "inner",
											cursor: "crosshair",
											zoomWindowFadeIn: 500,
											zoomWindowFadeOut: 750
   				}); 
				
		</script>	        		           
</head>
<body id="photosPageBackground" background="../image/background_photosPage.jpg">   


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
			        		     <li class="active">
			        				<a class="dropdown-toggle" data-toggle="dropdown" href ="#">
			        					Photos - View Photos<b class="caret"></b>
			        				</a>
			        				<ul class="dropdown-menu">
			        					<li><a href="../php/imageGallery.php?user=<?php echo $_SESSION['login_username'];?>">Image Gallery</a></li>
			        				</ul>
			        			</li>
			        			<li><a href="../php/friends.php?user=<?php echo $_SESSION['login_username'];?>">Friends</a></li>
			        		</ul>
			        		<div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout">Logout</a>
			        		</div>
        		</div> 
        		
        </div>

        
        <div id="profile_picture_forCorosel">
		          <form action ="../php/photoUpload.php?user=<?php echo $_SESSION['login_username'];?>" method="POST" enctype="multipart/form-data">
		          		<input class="choose_file" type="file" name="file" id="file">
		          		<input class="upload_file" type="submit" value="Upload">
		          </form>
		          
		</div>

        <div class=	"container" id="myCaroselHeader">
        		<div class="row">
        			<div class="span6 well">
        				<div id="myCarousel" class="carousel">
        				<div class="carousel-inner">
        							
			        				<?php 
			        				$url=$_SERVER['REQUEST_URI'];
			        				$userName=substr(strstr($url, '='), 1);
			        				$log_directory = "../uploadedImages/".$userName."/";
									$results_array = array();
									if (is_dir($log_directory)){
									        if ($handle = opendir($log_directory)){
									                while(($file = readdir($handle)) !== FALSE){
									                	if($file != "." && $file != ".."){

									                        $results_array[] = $file;
									                	}
									                }closedir($handle);
									        }
									}
									//Output findings
									$count=0;

									foreach($results_array as $value){
										$flag="";
										if($value!="." || $value!= ".." ){
											if ($count == 0){
												$flag="active";
												$count=1;
											}	
			        				?>	
			        		   		<div class="item <?php echo $flag ?>">	
			        		   		<!--- testing for zooming starts here -->	
			        		   		    		   			
			        		   		    <img id="zoom_01" src="../uploadedImages/<?php echo $userName?>/<?php echo $value ?>" class="img-responsive" data-zoom-image="../uploadedImages/gautam.sudeep@gmail.com.jpg"/>
			        		   		        <div class="carousel-caption">
			        		   		        	<h3><?php echo $value;?></h3>
			        		   		        </div>			        		   		     
			        		   		</div>
			        		   		<?php } } ?>
			        		   		
        				</div>
        				
        						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
        				</div>
        			</div>
                </div>
</div>       		
        		
</body>
</html>
