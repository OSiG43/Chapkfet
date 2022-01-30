<?php
	session_start();
	if(!isset($_SESSION['bucque'])){
		header("Location: ../login.php");
	}
	
	require("../utils/user_utils.php");
	if(!isAdmin($_SESSION['bucque'])){
		header("Location: ../index.php");
	}	
?>
