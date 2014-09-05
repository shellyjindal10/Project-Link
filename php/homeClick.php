<?php 

session_start();
$original_username=$_SESSION['login_username'];

header('Refresh: 1; URL=http://localhost/Project-Link/ui/HomePage.php?user='.$original_username);




?>