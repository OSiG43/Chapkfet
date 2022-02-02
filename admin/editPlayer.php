<?php
	session_start();
	if(!isset($_SESSION['bucque'])){
		header("Location: ../login.php");
	}
	
	require("../utils/user_utils.php");
	if(!isAdmin($_SESSION['bucque'])){
		header("Location: ../index.php");
	}	
	if(!isset($_GET['bucque'])){
		echo "Error ! Bad argument.";
		exit();
	}
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chapk'fet administration</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">

	<style type="text/css">
		@media screen and (max-width: 800px) {
	    	table tbody tr td:nth-child(1):before {
	   		 content: "Id";
	  		}
	  		table tbody tr td:nth-child(2):before {
	   		 content: "Bucque";
	  		}
	  		table tbody tr td:nth-child(3):before {
	   		 content: "Fam's";
	  		}
	  		table tbody tr td:nth-child(4):before {
	  		  content: "Points";
	  		}
	  		table tbody tr td:nth-child(5):before {
	  		  content: "Indices";
	  		}
	  		table tbody tr td:nth-child(6):before {
	   		 content: "Niveaux";
	  		}
	  		table tbody tr td:nth-child(7):before {
	   		 content: "Administrateur ?";
	  		}
	  		table tbody tr td:nth-child(8):before {
	   		 content: "Edit";
	  		}
	  	}
    </style>

  </head>
  <body>
  		
  		<div class="container" style="width: 100%">
  			<h1>Administration des joueurs.</h1>
  			<div class="navContainer">
  				<a href="../index.php" class="button">Accueil</a>
  				<a href="home.php" class="button">Accueil Admin</a>
  				<a href="manage_players.php" class="button">Gestion joueurs</a>
  				<a href="../logout.php" class="button" name="logout" style="text-align: right;">Déconnection</a>
  			</div>
  			<hr>
  			<div class="manageContainer">
  				<table>
						<thead>
							<tr class="table-head">
								<th class="column1">Id</th>
								<th class="column2">Bucque</th>
								<th class="column3">Fam's</th>
								<th class="column4">Points</th>
								<th class="column5">Indices</th>
								<th class="column6">Niveaux</th>
								<th class="column7">Administrateur ?</th>
								<th class="column8">Edit</th>
							</tr>
						</thead>
						<tbody>


						<?php
						    //Le code ci-dessous ne s'execute que lorsque le bouton valider à été appuyé.
						  if(isset($_POST['formSent'])){
								$player = getPlayerInfo($_GET['bucque']);
								$bucque = $player['bucque'];

		            $points = intval(stripslashes($_REQUEST['points']));
		            $hints = stripslashes($_REQUEST['hints']);
		            $levels = stripslashes($_REQUEST['levels']);
		 
		            if( !(isset($points)) ){
		            	$points=$player['points'];
		            }

		            if(empty($levels)){
		            	$levels=$player['levels'];
		            	if(empty($levels)){
		            		$levels="''";
		            	}
		            }
						    
		            if(!empty($_POST['is_admin'])){
									$admin=1;
								}else{
									$admin=0;
								}

								setPlayerData($bucque, $points, $hints, $levels, $admin);
						    header("Location: manage_players.php");
						  }
						  ?>

							<form method='post'>
								<?php
								$player = getPlayerInfo($_GET['bucque']);
								echo("
									<tr>
										
											<td class='column1'>".$player['id']."</td>
											<td class='column2'>".$player['bucque']."</td>
											<td class='column3'>".$player['fams']."</td>
											<td class='column4'><input type='text'  name='points' value=".$player['points']."></td>
											<td class='column5'><input type='text'  name='hints' value=".$player['hints']."></td>
											<td class='column6'><input type='text'  name='levels' value=".$player['levels']."></td>
											<td class='column7'><input type='checkbox'  name='is_admin' ".($player['admin']==1 ? 'checked' : "")."></td>
											<td class='column8'><button type='submit'>Validé</button> <a class='cancelButton' href='manage_players.php'>Annuler</a></td>
										
									</tr>
								");
									
								?>

	            	<input type="hidden" name="formSent">
							</form>
						</tbody>
					</table>
  			</div>
  		</div>
  		
  </body>
</html>
