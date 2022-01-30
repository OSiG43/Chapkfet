<?php
require("../config/config_db.php");

/*

*/

function isAdmin($bucque){
	global $conn;

	$query = "SELECT * FROM `users` WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  	if (mysqli_num_rows($result) == 1) {
  		$user = mysqli_fetch_assoc($result);
  		return $user['admin'];
  	}
}

?>