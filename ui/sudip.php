<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>sudip.php</title>
</head>
<body
<?php
		include "../php/common/databaseConnected.php";
		$id = $_GET['id'];
		$action=$_GET['action'];		
		$test_url=$_SERVER['REQUEST_URI'];	
		$username=$_SESSION["username"];
		$dbConn=connectToDb();

					if($action=='onEdit'){
						$query = "select $id from jinshelly_signup where Email ='$username'";
						$result = mysqli_query($dbConn,$query);
						while ($row = mysqli_fetch_array($result)){
							    $text = $row[0]; 
							    ?> 
							    <div id="summary_title_xyz"><?php echo $id?></div> 
							    <textarea rows="4" cols="30" class='text_area' id='text_area_id_<?php echo $id ?>' ><?php echo $text ?></textarea> <br>
							    <input type='submit' class='save' value='save' onclick="saveonclick('<?php echo $id ?>')"/>
							    <?php    
						}
					}else if($action=='onLoad'){
						$query = "select $id from jinshelly_signup where Email ='$username'";
						$result = mysqli_query($dbConn,$query);
						while ($row = mysqli_fetch_array($result)){
							    $text = $row[0]; 
							    ?>  
							    <div id="summary_title_xyz"><?php echo $id?></div>
							    <textarea  rows="5" cols="40" class='text_area' id='text_area_id_<?php echo $id ?>' ><?php echo $text ?></textarea> <br>
							    <?php    
						}
					}
?>


</script>
</body>
</html>

