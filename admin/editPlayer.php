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
	  		  content: "Points";
	  		}
	  		table tbody tr td:nth-child(4):before {
	  		  content: "Indices";
	  		}
	  		table tbody tr td:nth-child(5):before {
	  		  content: "Niveaux";
	  		}
	  		table tbody tr td:nth-child(6):before {
	   		 content: "Administrateur ?";
	  		}
	  		table tbody tr td:nth-child(7):before {
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
  				<a href="../logout.php" class="button" name="logout" style="text-align: right;">Déconnection</a>
  			</div>
  			<hr>
  			<div class="manageContainer">
  				<table>
						<thead>
							<tr class="table-head">
								<th class="column1">Id</th>
								<th class="column2">Bucque</th>
								<th class="column3">Points</th>
								<th class="column4">Indices</th>
								<th class="column5">Niveaux</th>
								<th class="column6">Administrateur ?</th>
								<th class="column7">Edit</th>
							</tr>
						</thead>
						<tbody>


						<?php
						    //Le code ci-dessous ne s'execute que lorsque le bouton valider à été appuyé.
						  if(isset($_POST['formSent'])){

		            $bucque = stripslashes($_REQUEST['bucque']);
		            $bucque = mysqli_real_escape_string($conn, $bucque);
		            $points = stripslashes($_REQUEST['points']);
		            $points = mysqli_real_escape_string($conn, $fams);
		            $hints = stripslashes($_REQUEST['hints']);
		            $hints = mysqli_real_escape_string($conn, $mdp);
		            $levels = intval(stripslashes($_REQUEST['levels']));
		            

		            if(empty($bucque)){
		            	$bucque=$player['bucque'];
		            }
		 
		            if(empty($points)){
		            	$points=$player['points'];
		            }

		            if(empty($hints)){
		            	$hints=$player['hints'];
		            }

		            if(empty($levels)){
		            	$levels=$player['levels'];
		            }
						    

		            if(!empty($isAdmin)){
									$isAdmin=True;
								}else{
									$isAdmin=False;
								}

								$oldbucque=$player['bucque'];
								setPlayerData($oldbucque, $bucque, $points, $hints, $levels, $is_admin);
						    header("Location: manage_players.php");

						    }
						  }
						  ?>

							<form method='post'>
							<?php
								
								$player = getPlayerInfo($_GET['bucque']);
									echo("
										<tr>
											
												<td class='column1'>".$player['id']."</td>
												<td class='column2'><input type='text'  name='bucque' value=".$player['bucque']."></td>
												<td class='column3'><input type='text'  name='points' value=".$player['points']."></td>
												<td class='column4'><input type='text'  name='hints' value=".$player['hints']."></td>
												<td class='column5'><input type='text'  name='levels' value=".$player['levels']."></td>
												<td class='column6'><input type='checkbox'  name='isAdmin' ".($player['admin']==1 ? 'checked' : "")."></td>
												<td class='column7'><button type='submit'>Validé</button> <a class='cancelButton' href='manage_players.php'>Annuler</a></td>
											
										</tr>
									");
								
							?>
							</form>
						</tbody>
					</table>
  			</div>
  		</div>
  		
  </body>
</html>
