<?php
  session_start();

  //On vérifie que la personne est connectée, sinon on la redirige vers la page de connection
  if(!isset($_SESSION['bucque'])){
    header("Location: ../login.php?p=hints/dent"); //Ne pas oublié de changer choucroute pour le nom du fichier.
  }
  
  require("../utils/user_utils.php"); // on importe user utils pour la suite.

  //variables à modifier
  $hintNumber = 13;
  $bonnesReponses = array('nono');
  $requestDay=4;
  $question="Qui s'est dejà pété une dent à la kfet ?";

  $neededLevels = range(1,$requestDay)
  $requestMonth=2;
  require('../hints/template.php');
?>