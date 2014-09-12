<?php
session_start();

$name=$_FILES['file']['name'];
$extension=strtolower(substr($name,strpos($name,'.')+1));
$size=$_FILES['file']['size'];
$type=$_FILES['file']['type'];

$tmp_name=$_FILES['file']['tmp_name'];
$max_size=2097152;
$error = $_FILES['file']['error'];

if(isset($name)){
		if(!empty($name)){
				if(($extension=='jpg' || $extension=='jpeg' || $extension=='.JPG')&&($type=='image/jpeg')&& $size<=$max_size){
							
							$directorName = $_SESSION['login_username'];
							//echo "<br/>"."directory name is :".$directorName;
							$location = "../uploadedImages/$directorName/";
							//echo "<br/>"."the final location is :".$location;
							if (!file_exists("../uploadedImages/$directorName")) {
    								mkdir("../uploadedImages/$directorName", 0777, true);
							}
							if(move_uploaded_file($tmp_name,$location.$name)){
								header('Location:http://localhost/Project-Link/php/photos.php?user='.$_SESSION['login_username']);
								 
							}else{
								echo 'Please choose a file';
							}
		}else{
				echo "Extension of file is not jpg/jpeg and must be 2mb or less"."<br/>"."Reload the file again";
				//header("Refresh: 1; URL=http://localhost/Project-Link/php/photos.php?user=$_SESSION['login_username']");
		}}
}



?>