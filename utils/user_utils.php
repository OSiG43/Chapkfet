<?php
require("../config/config_db.php");

/*
Getters
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

function getPlayerPoint($bucque){
	global $conn;

	$query = "SELECT points FROM `users` WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  	if (mysqli_num_rows($result) == 1) {
  		$user = mysqli_fetch_assoc($result);
  		return $user['points'];
  	}
}

function getPlayerHints($bucque){
	global $conn;

	$query = "SELECT hints FROM `users` WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  	if (mysqli_num_rows($result) == 1) {
  		$user = mysqli_fetch_assoc($result);
  		$hints=[];

  	}
}

/**
* Fonction qui permet de récupérer des informations sur l'ensemble des joueurs.

@param string $order Optionel : Permet de donner l'ordre de classement souhaité pour la liste des joueurs, les valeurs possibles sont : id, bucque, points, currentHint
@return array L'ensemble des joueurs avec leurs informations (id, buque, points, currentHint, admin) classé suivant $order
*/
function getAllPlayerInfo($order = "id"){
	global $conn;

	$query = "SELECT id, bucque, points, currentHint, admin FROM `users` ORDER BY ".$order.";";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getPlayerInfo($bucque){
	global $conn;

	$query = "SELECT id, bucque, points, currentHint, admin FROM `users` WHERE bucque=".$bucque.";";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  	if (mysqli_num_rows($result) == 1) {
  		$user = mysqli_fetch_assoc($result);
  		return $user;
  	}else{
  		return null;
  	}
}


/*
Setters
*/
function addPlayerPoint($bucque, $point){
	global $conn;

	$query = "UPDATE `users` SET points = points +".$point." WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  	return $result;
}

function setPlayerPoint($bucque, $point){
	global $conn;

	$query = "UPDATE `users` SET points= ".$point." WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	return $result;
}

function addPlayerHint($bucque, $hintId){
	global $conn;

	$query = "UPDATE `users` SET currentHint= ".$hintId." WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	return $result;
}

function setPlayerPassword($bucque, $psw){
	global $conn;

	$query = "UPDATE `users` SET password= ".hash('sha256', $psw)." WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	return $result;
}

?>