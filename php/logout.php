<?php
		session_start();
		session_unset($_SESSION['username']);
		header("Refresh: 0; URL=http://localhost:8080/Shelly/ui/Login.html");
?>