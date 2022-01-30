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
  		$hintString = explode(",", mysqli_fetch_assoc($result)['hints']);
      $hints=[];

  		for ($i=0; $i < sizeof($hintString); $i++) { 
        array_push($hints, (int)$hintString[$i]);
      }

    return $hints;
  	}
}

function getPlayerLevels($bucque){
  global $conn;

  $query = "SELECT levels FROM `users` WHERE bucque='$bucque';";
  
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
    if (mysqli_num_rows($result) == 1) {
      $levelString = explode(",", mysqli_fetch_assoc($result)['levels']);
      $levels=[];

      for ($i=0; $i < sizeof($levelString); $i++) { 
        array_push($levels, (int)$levelString[$i]);
      }

    return $levels;
    }
}

function getNbPlayerAnswer($hintNum){
  global $conn;

  $query = "SELECT * FROM `users` WHERE hints LIKE '%".$hintNum."%';";

  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  return mysqli_num_rows($result);
}

/**
* Fonction qui permet de récupérer des informations sur l'ensemble des joueurs.

@param string $order Optionel : Permet de donner l'ordre de classement souhaité pour la liste des joueurs, les valeurs possibles sont : id, bucque, points, currentHint
@return array L'ensemble des joueurs avec leurs informations (id, buque, points, currentHint, admin) classé suivant $order
*/
function getAllPlayerInfo($order = "id"){
	global $conn;

	$query = "SELECT id, bucque, points, hints, admin FROM `users` ORDER BY ".$order.";";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getPlayerInfo($bucque){
	global $conn;

	$query = "SELECT id, bucque, hints, points, admin FROM `users` WHERE bucque=".$bucque.";";
  
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

  $currentsHints = getPlayerHints($bucque);
  array_push($currentsHints, $hintId);

	$query = "UPDATE `users` SET hints='".implode(",", $currentsHints)."' WHERE bucque='$bucque';";
  
  	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	return $result;
}

function addPlayerArea($bucque, $levelId){
  global $conn;

  $currentsLevels = getPlayerLevels($bucque);
  array_push($currentsLevels, $levelId);

  $query = "UPDATE `users` SET levels='".implode(",", $currentsLevels)."' WHERE bucque='$bucque';";
  
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  return $result;
}


function setPlayerHint($bucque, $hints){
  global $conn;


  $query = "UPDATE `users` SET hints= ".$hints." WHERE bucque='$bucque';";
  
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