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
		<link rel="stylesheet" type="text/css" href="../css/ImageGallery.css" media="screen" />
		<link type ="text/css" rel="stylesheet" href="../lib/css/bootstrap.css" />
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
		<link rel="stylesheet" href="../css/bootstrap-image-gallery.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="../js/bootstrap-image-gallery.min.js"></script>
			        		           
</head>
<body id="imageGalleryBackground" background="../image/background_1.jpg" >
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
			        					Photos - ImageGallery<b class="caret"></b>
			        				</a>
			        				<ul class="dropdown-menu">
			        				    <li><a href ="../php/photos.php?user=<?php echo $_SESSION['login_username'];?>">View Photos</a></li>
			        				</ul>
			        			</li>
			        			<li><a href="../php/friends.php?user=<?php echo $_SESSION['login_username'];?>">Friends</a></li>
			        		</ul>
			        		<div class ="logout_profile">
			        		        <a href="../php/logout.php" tite="Logout">Logout</a>
			        		</div>
        		</div> 

        		
        </div>
        <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery" >
		    <!-- The container for the modal slides -->
		    <div class="slides"></div>
		    <!-- Controls for the borderless lightbox -->
		    <h3 class="title">Image Gallery</h3>
		    <a class="prev">‹</a>
		    <a class="next">›</a>
		    <a class="close">×</a>
		    <a class="play-pause"></a>
		    <ol class="indicator"></ol>
		    <!-- The modal dialog, which will be used to wrap the lightbox content -->
		    <div class="modal fade">
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" aria-hidden="true">&times;</button>
		                    <h4 class="modal-title"></h4>
		                </div>
		                <div class="modal-body next"></div>
		                <div class="modal-footer">
		                    <button type="button" class="btn btn-default pull-left prev">
		                        <i class="glyphicon glyphicon-chevron-left"></i>
		                        Previous
		                    </button>
		                    <button type="button" class="btn btn-primary next">
		                        Next
		                        <i class="glyphicon glyphicon-chevron-right"></i>
		                    </button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>

		<div id="links" class="linksForImageGallery">
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
									//$count=0;

									foreach($results_array as $value){
										if($value!="." || $value!= ".." ){
												
			    ?>

			    <a href="../uploadedImages/<?php echo $userName?>/<?php echo $value ?>" title="<?php echo $value ?>" data-gallery>
			        <img src="../uploadedImages/<?php echo $userName?>/<?php echo $value ?>" alt="<?php echo $value ?>" id="thumbnail_image">
			    </a>
			    <?php } }?>
		</div>
</body>
</html>