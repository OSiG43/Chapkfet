<?php
session_start();
if(!isset($_SESSION['bucque'])){
	header("Location: login.php");
}		

require("utils/user_utils.php");
$levels = getPlayerLevels($_SESSION['bucque']);
$currentLevel = $levels[sizeof($levels)-1];
$answerList=getPlayerHints($_SESSION['bucque']);
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Chapkfet game</title>
	
    <link rel="stylesheet" href="css/map.css">
    <script type="text/javascript">
    	var currentLevel = <?php echo($currentLevel); ?>;
    	var answerList = <?php echo("[".implode(",", $answerList)."]"); ?>

    </script>

    <script src="js/phaser.js"></script>
    <script type ="module" src="js/app.js"></script>

</head>
<body>
	<div class="game"></div>

	<div class="scan-popup" id="scanPopup">
      <div class="scan-popup" id="popupScan">
        <div class="scan-container">
        	<p>Ceci est un test !!</p>
          <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </div>
      </div>
    </div>

<script>
      function openForm() {
        document.getElementById("scanPopup").style.display = "block";
      }

      function closeForm() {
        document.getElementById("scanPopup").style.display = "none";
      }
    </script>
</body>
</html>
