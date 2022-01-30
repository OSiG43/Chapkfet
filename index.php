<?php
session_start();
if(!isset($_SESSION['bucque'])){
	header("Location: login.php");
}

echo("bienvenue ".$_SESSION['bucque']);

?>