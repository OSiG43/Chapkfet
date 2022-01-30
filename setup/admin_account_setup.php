<?php
require("config/config_db.php");

$admin_username = "admin";
$admin_pass = "admin";

$query = "INSERT into `users` (bucque, password, admin)
        VALUES ('$admin_username', '".hash('sha256', $admin_pass)."',
    	'1')";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($res){
	echo("Creation of admin user sucess !");
}

$admin_username = "user";
$admin_pass = "user";

$query = "INSERT into `users` (bucque, password, admin)
        VALUES ('$admin_username', '".hash('sha256', $admin_pass)."',
    	'0')";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($res){
	echo("Creation of random user sucess !");
}

?>