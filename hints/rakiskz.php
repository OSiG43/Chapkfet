<?php
  session_start();

  //On vérifie que la personne est connectée, sinon on la redirige vers la page de connection
  if(!isset($_SESSION['bucque'])){
    header("Location: ../login.php?p=hints/picars"); //Ne pas oublié de changer choucroute pour le nom du fichier.
  }
  
  require("../utils/user_utils.php"); // on importe user utils pour la suite.

  //variables à modifier
  $hintNumber = 14;
  $bonnesReponses = array('eytan','arnaud','lysandre');
  $requestDay=5;
  $question="Qui à vomi à SKZ ?";

  $neededLevels = range(1,$requestDay);
  $requestMonth=2;
  require('../hints/template.php');
?>