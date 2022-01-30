<?php
	session_start();

  //On vérifie que la personne est connectée, sinon on la redirige vers la page de connection
	if(!isset($_SESSION['bucque'])){
		header("Location: ../login.php?p=unlocklvl3"); //Ne pas oublié de changer choucroute pour le nom du fichier.
	}
	
  require("../utils/user_utils.php"); // on importe user utils pour la suite.
  $levelToUnlock = 3;

?>


<!DOCTYPE html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Débloquage zone n°<?php echo($levelToUnlock); ?></title> <!-- Changer pour le bon num d'indice -->


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/level.css">


  </head>
  <body>

  <?php
      //Avant de débloquer la zone et mettre à jour la base de donner, plusieurs vérifications sont nécéssaires

      //Variables pour vérifier que les zones précédentes ont bien été débloquées.
      $userLevels = getPlayerLevels($_SESSION['bucque']);
      $neededLevels = range(1,$levelToUnlock-1);

      //$date['mday'] recupère le numero du jour, par ex mardi prochain on sera le 1, donc il faut vérifier que le jour actuelle ne soit pas plus petit que 1 (à mardi) pour que la question soit accessible. On vérifie également que le mois n'est pas différent de février soit 2. 
      $date = getdate();
      $requestDay=$levelToUnlock-1;
      $requestMonth=2;
	  
			//remodification des variables pour pouvoir effectuer des tests
			/*
      $userLevels = $neededLevels;
			$requestDay=$date['mday'];
      $requestMonth=$date['mon'];
			*/
		
      //test si le débloquage de la zone peut se faire ou si il est trop tôt
      if(($date['mday']<$requestDay || $date['mon']!=$requestMonth)){ 
      ?>
        <div >
          <p class="errorMessage">Pas lar's de débloquer cette zone !</p>

          <!--Un petit gif parce qu'on s'amuse : On trouve ça sur https://giphy.com/ -->
          <img class="noImg" src="https://media2.giphy.com/media/RiuNsymGB8ilATGiDu/giphy.gif?cid=790b7611f9b686a4849b55027a5d45cc70955b4b43bb22f7&rid=giphy.gif&ct=g">

        </div>
       

      <?php
        exit(); //Avec exit, on empeche au serveur d'envoyé ce qui suit.
      }

      //test si la zone a déjà été débloquée
      if(in_array( $levelToUnlock , $userLevels )){
      ?>
        <div>
          <h1>Tu as déjà débloqué la zone n°<?php echo($levelToUnlock)?> !</h1>

          <?php
          if($date['mday']==$requestDay){
            ?>
            <p>Revient demain pour tenter de trouver les questions de cette nouvelle zone, et débloquer la suivante</p>

            <?php
          }
          ?>

          <a href="../index.php" class="button">Retour à la carte</a>
        </div>
        
      <?php
        exit(); //Avec exit, on empeche au serveur d'envoyé ce qui suit.
        
      }

      //test si l'utilisateur à débloqué les zones précédentes nécéssaires
      if (sizeof(array_diff($neededLevels, $userLevels))!=0){ 
      ?>
        <div >
          <p class="errorMessage">Pas lar's de débloquer cette zone !</p>

       <!--Un petit gif parce qu'on s'amuse : On trouve ça sur https://giphy.com/ -->
       
         <img class="noImg" src="https://media2.giphy.com/media/RiuNsymGB8ilATGiDu/giphy.gif?cid=790b7611f9b686a4849b55027a5d45cc70955b4b43bb22f7&rid=giphy.gif&ct=g">

        </div>
       
      <?php
        exit(); //Avec exit, on empeche au serveur d'envoyé ce qui suit.
      }

      //on met à jour la base de donnée, car si on arrive jusque là, le joueur peut débloquer la zone
      addPlayerArea($_SESSION['bucque'], $levelToUnlock);

      ?>


<!-- 
Pour toucher au visuel de la question c'est ici
-->
    <div >
  		<h1>Felicitation ! Tu as déjà débloqué la zone n°<?php echo($levelToUnlock)?></h1>
      <p>
      <?php
          if($date['mday']==$requestDay){
            ?>
            <p>Revient demain pour tenter de trouver les questions de cette nouvelle zone, et débloquer la suivante</p>

            <?php
          }
          ?>
      </p>
      <a href="../index.php" class="button">Retour à la carte</a>
    </div >
  </body>
</html>