<?php
require("../config/config_db.php");

//Creation de la table users
$query = "CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `bucque` varchar(100) NOT NULL,
  `fams` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `points` int(11) DEFAULT 0 NOT NULL ,
  `hints` varchar(100) DEFAULT '' NOT NULL,
  `levels` varchar(100) DEFAULT '' NOT NULL,
  `admin` boolean NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
if($res){
	echo("Creation of users table success !");
}

/*
//Creation de la table hints
$query = "CREATE TABLE `hints` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `succeedMessage` varchar(255) NOT NULL,
  'previousHint' int(11) NOT NULL DEFAULT 0,
  'numberOfPoint' int(11) NOT NULL DEFAULT 0,
  'posX' int(11) NOT NULL DEFAULT 0,
  'posY' int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1_general_cs;";

$res = mysqli_query($conn, $query);
if($res){
	echo("Creation of hint table success !");
}

//Creation de la table areas
$query = "CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  'unlockHint' int(11) NOT NULL DEFAULT 0,
  'pos1X' int(11) NOT NULL DEFAULT 0,
  'pos1Y' int(11) NOT NULL DEFAULT 0,
  'pos2X' int(11) NOT NULL DEFAULT 0,
  'pos2Y' int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1_general_cs;";

$res = mysqli_query($conn, $query);
if($res){
	echo("Creation of zone table success !");
}
*/


?>