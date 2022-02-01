<?php
require("../utils/user_utils.php");

$bucque = "admin";
$nom    = "moi";
$fams   = "0";
$pass   = "admin";

$res = creationCompte($bucque,$nom,$fams,$pass,0,'','',True);
if($res){
	echo("Creation of admin user sucess !");
}

$bucque = "user";
$nom    = "toi";
$fams   = "221";
$pass   = "user";

$res = creationCompte($bucque,$nom,$fams,$pass);
if($res){
	echo("Creation of random user sucess !");
}

?>