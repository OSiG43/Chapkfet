<?php
	session_start();
	require("user_utils.php");

	/*echo(getPoint($_SESSION['bucque'])."<br>");
	setPoint($_SESSION['bucque'],0);
	echo(getPoint($_SESSION['bucque'])."<br>");*/
?>





<!--//Cours sur les tableau en html : https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3/1606851-ajoutez-des-tableaux-->
<!--
<table>
	<tr>
		<th>Id</th><th>Bucque</th><th>Points</th><th>Indice actuel</th>
	</tr>
	
	<?php
		foreach(getAllPlayerInfo() as $user){
			echo "
				<tr>
					<td>".$user['id']."</td><td>".$user['bucque']."</td><td>".$user['point']."</td><td>".$user['currentHint']."</td>
				</tr>
				";
		}
	?>

</table>
-->



