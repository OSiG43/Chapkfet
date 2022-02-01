<?php
require("../utils/user_utils.php");

$bucque = "admin";
$fams   = "0";
$pass   = "admin";

$res = creationCompte($bucque,$fams,$pass,0,'1,2,3,4,5,6','',True);
if($res){
	echo("Creation of admin user sucess !");
}
?>