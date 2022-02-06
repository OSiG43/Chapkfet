<?php
	require("../utils/user_utils.php");
?>

<!DOCTYPE html>
<html>
  <head>
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Résultats!</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">

	<style type="text/css">
		@media screen and (max-width: 800px) {
	  		table tbody tr td:nth-child(1):before {
	   		 content: "Bucque";
	  		}
	  		table tbody tr td:nth-child(2):before {
	   		 content: "Fam's";
	  		}
	  		table tbody tr td:nth-child(3):before {
	  		  content: "Points";
	  		}
	  	}
    </style>

  </head>
  <body>
  		
  		<div class="container" style="width: 100%">
  			<h1>Classement joueurs.</h1>
  			<hr>
  			<div class="manageContainer">
  				<table>
						<thead>
							<tr class="table-head">
								<th class="column2">Bucque</th>
								<th class="column3">Fam's</th>
								<th class="column4">Points</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach (getAllPlayerInfo("points") as $player) {
									echo("
										<tr>
											<td class='column2'>".$player['bucque']."</td>
											<td class='column3'>".$player['fams']."</td>
											<td class='column4'>".$player['points']."</td>
										</tr>
									");
								}
							?>
								
						</tbody>
					</table>
  			</div>
  			
  		</div>
  		
  </body>
</html>