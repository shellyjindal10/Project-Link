<?php
		session_start();
		include "../php/common/databaseConnected.php";
		$id = $_GET['id'];
		$action=$_GET['action'];		
		$username=$_SESSION["username"];
		$dbConn=connectToDb();

					if($action='basicInformation'){
						$query = "select * from jinshelly_signup where Email ='$username'";
						$result = mysqli_query($dbConn,$query);
						while ($row = mysqli_fetch_array($result)){
							    $text = $row[$id]; 
							    echo $text ;
							    $image_name=$row['display_image'];

							    ?>
							    <script type="text/javascript">
							    document.getElementById("image").setAttribute("src",<?php echo $image_name?>);;								 
								</script>
							    <?php
						}
					}

?>

