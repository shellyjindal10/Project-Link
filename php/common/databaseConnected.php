<?php

function connectToDb(){
	                    
                       	$con=mysqli_connect("localhost","db1","shellybelly10","my_db_shelly");
						if (mysqli_connect_errno()) {
							echo "<br/>";
							echo "DB Connection Failed";
						}
						return $con;
}
?>

