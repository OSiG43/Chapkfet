<?php
	session_start();
	if(!isset($_SESSION['bucque'])){
		header("Location: ../login.php");
	}
	
	require("../utils/user_utils.php");
	if(!isAdmin($_SESSION['bucque'])){
		header("Location: ../index.php");
	}	
?>



<!DOCTYPE html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chapk'fet administration</title>


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">

  </head>
  <body>
  		
  		<div class="container">
  			<h1>Bienvenue dans l'espace d'administration <?php echo($_SESSION['bucque']) ?> !</h1>
  			<hr>
  			<div class="manageContainer">
  				<a href="manage_areas.php" class="button">Gérer les zones</a>
  				<a href="manage_players.php" class="button">Gérer les joueurs</a>
  				<a href="manage_hints.php" class="button">Gérer les indices</a>
  			</div>
  			<div class="navContainer">
  				<a href="../index.php" class="button">Accueil</a>
  				<a href="../logout.php" class="button">Déconnection</a>
  			</div>
  			
  		</div>
  		
  </body>
</html>