<?php
//Uploaded the file code

include "common/databaseConnected.php";
session_start();

$name=$_FILES['file']['name'];


$extension=strtolower(substr($name,strpos($name,'.')+1));
$size=$_FILES['file']['size'];
$type=$_FILES['file']['type'];

$tmp_name=$_FILES['file']['tmp_name'];
$max_size=2097152;

if(isset($name)){
		if(!empty($name)){
				if(($extension=='jpg' || $extension=='jpeg')&&($type=='image/jpeg')&& $size<=$max_size){
							$location = '../uploadedImages/';
							$name=$_SESSION["username"];
							if(move_uploaded_file($tmp_name,$location.$name.'.'.$extension)){
								 $imagename=$name.'.'.$extension;
								 imageNameUpdatedInDatabase($imagename);
								 ?>
								 <script type="text/javascript">
								 window.parent.updatepicture("<?php echo '../uploadedImages/'.$_SESSION["username"].'.'.$extension?>");
								 
								 </script>
								 <?php
							}else{
								echo 'Please choose a file';
							}
				}else{
				            echo "Extension of file is not jpg/jpeg and must be 2mb or less"."<br/>"."Reload the file again";
				            header("Refresh: 1; URL=http://localhost:8080/Shelly/ui/HomePage.php");
				}			
		}
}


function imageNameUpdatedInDatabase($imageName){
     		  $dbConn=connectToDb();
     		  $username=$_SESSION["username"];
     		  echo $username;

     		  $check_query = "SELECT display_image FROM jinshelly_signup WHERE Email='$username'";
       	      $result = mysqli_query($dbConn,$check_query);
			  $row_cnt = mysqli_num_rows($result);
     	      $result->close();

			  if($row_cnt!=0){
			       	        echo "<br/>";
					       	echo "This UserName already exisits ,hence the Record is Updated ";
					       	$Update = "UPDATE jinshelly_signup SET display_image ='$imageName' WHERE Email='$username'";
					        mysqli_query($dbConn,$Update);
			  }else{
			  	            $insert="INSERT INTO jinshelly_signup (display_image) VALUES $imageName WHERE Email='$username'";
					       	mysqli_query($dbConn,$insert);
							echo "<br/>";
							echo "The New Record is Inserted";
			  }
}


?>