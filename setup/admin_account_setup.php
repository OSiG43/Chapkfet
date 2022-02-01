<?php
require("../utils/user_utils.php");

$bucque = "admin";
$fams   = "0";
$pass   = "admin";

$res = creationCompte($bucque,$fams,$pass,0,'','',True);
if($res){
	echo("Creation of admin user sucess !");
}
?>