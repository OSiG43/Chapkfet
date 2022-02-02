<?php
	session_start();

  //On vérifie que la personne est connectée, sinon on la redirige vers la page de connection
	if(!isset($_SESSION['bucque'])){
		header("Location: ../login.php?p=unlocklvl1"); //Ne pas oublié de changer choucroute pour le nom du fichier.
	}
	
  require("../utils/user_utils.php"); // on importe user utils pour la suite.
  $levelToUnlock = 1;

  $neededLevels = range(0,$levelToUnlock-1);
  $requestDay=$levelToUnlock;
  $requestMonth=2;

  require('../levels/templatelvl.php');
?>