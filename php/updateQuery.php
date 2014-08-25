<?php


$id = $_GET['id'];
$val = $_GET['edit'];

echo "\n $val";
updateData($val,$id);
?>


<?php

function updateData($edited_text,$id) {
    $sql = "UPDATE jinshelly_signup SET $id='$edited_text' WHERE Email ='jinshelly@gmail.com'";
    try {
        $db = connectToDb();
        mysqli_query($db,$sql);

    	} catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function connectToDb(){

				       	$con=mysqli_connect("localhost","db1","shellybelly10","my_db_shelly");
						if (mysqli_connect_errno()) {
							echo "<br/>";
							echo "DB Connection Failed";
						}
						return $con;
}
?>