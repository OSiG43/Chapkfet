<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chapk'fet question n°<?php echo($hintNumber); ?></title> <!-- Changer pour le bon num d'indice -->


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/hints.css">


  </head>
  <body>
<!-- 
  Avant d'afficher la question, il faut faire l'ensemble des vérifications, c'est à dire :
      - Vérifier que la date permet à l'indice d'être accessible
      - Vérifier que les indices précédents, on bien étaient débloqué par le joueur.

-->

  <?php
      
      //On vérifie que les questions du niveau précédent ont bien étaient répondu.
      $levels = getPlayerLevels($_SESSION['bucque']);
      $hints = getPlayerHints($_SESSION['bucque']);

      //$date['mday'] recupère le numero du jour, par ex mardi prochain on sera le 1, donc il faut vérifier que le jour actuelle ne soit pas plus petit que 1 (à mardi) pour que la question soit accessible. On vérifie également que le mois n'est pas différent de février soit 2. 
      $date = getdate();


      //remodification des variables pour pouvoir effectuer des tests
      /*
      $levels = $neededLevels;
      */
      $requestDay=$date['mday'];
      $requestMonth=$date['mon'];
    
      if(($date['mday']<$requestDay || $date['mon']!=$requestMonth) || (sizeof(array_diff($neededLevels, $levels))!=0)){ 
      ?>
        <div >
          <p class="errorMessage">Pas lar's de répondre à cette question !</p>

       <!--Un petit gif parce qu'on s'amuse : On trouve ça sur https://giphy.com/ -->
       
         <img class="noImg" src="https://media2.giphy.com/media/RiuNsymGB8ilATGiDu/giphy.gif?cid=790b7611f9b686a4849b55027a5d45cc70955b4b43bb22f7&rid=giphy.gif&ct=g">

        </div>
       

      <?php
        exit(); //Avec exit, on empeche au serveur d'envoyé ce qui suit.
      }

      //test si la question a déjà été répondue
      if(in_array( $hintNumber , $hints )){
      ?>
        <div>
          <h1>Tu as déjà répondu à cette question !</h1>
          <a href="../index.php" class="button">Retour à la carte</a>
        </div>
        
      <?php
        exit(); //Avec exit, on empeche au serveur d'envoyé ce qui suit.
        
      }
      
      ?>



  <?php
    //Le code ci-dessous ne s'execute que lorsque le bouton valider à été appuyé.
  if(isset($_POST['formSent'])){
    $numberOfGoodAnswers = 0;
    if(isset($_POST['checkbox_id'])){

      $checkbox=$_POST['checkbox_id'];

      foreach ($bonnesReponses as &$reponse) {
        if (in_array($reponse,$checkbox)) {
          $numberOfGoodAnswers += 2;
        }
      }
      unset($value);


      //Calcul du nombre de point 
      $nbPlayerAnswers = getNbPlayerAnswer($hintNumber); //le 1 est le numéro de la question.

      //il faut enlever 1 point par réponse fausses
      $numberOfGoodAnswers-=count($checkbox);

      if($numberOfGoodAnswers<0){
        $numberOfGoodAnswers = 0;
      }

      if($nbPlayerAnswers<5){
        $muliplicator = 5;
      }elseif ($nbPlayerAnswers<15) {
        $muliplicator = 4;
      }elseif ($nbPlayerAnswers<30) {
        $muliplicator = 3;
      }elseif ($nbPlayerAnswers<60) {
        $muliplicator = 2;
      }else{
        $muliplicator = 1;
      }

      $nbPoints=$numberOfGoodAnswers*$muliplicator;
      addPlayerPoint($_SESSION['bucque'], $nbPoints); // on ajoute ensuite les points dans la base de donnée.
      addPlayerHint($_SESSION['bucque'], $hintNumber);
      ?>
      <div>
        <h1>Ta réponse à bien été enregistrée !</h1>
        <a href="../index.php" class="button">Retour à la carte</a>
      </div>
      <?php
      exit();
    }
  }
  ?>

<!-- 
Pour toucher au visuel de la question c'est ici
-->
      <form method="post">
        <h1>Felicitation ! Tu as trouvé la question n°<?php echo($hintNumber); ?></h1> <!-- Changer le numéro-->
        <p id="question">La question est :<br><?php echo($question); ?></p> <!-- Ecrire la question-->

        <div class="formcontainer">
          <hr/>
          <div class="container">
            <div class="answer">
              <img class="answerImg" src="../assets/esteban.jpg">
              <input type="checkbox" name="checkbox_id[]" value="esteban">
            </div>

            <div class="answer">
              <img class="answerImg" src="../assets/arnaud.jpg">
              <input type="checkbox" name="checkbox_id[]" value="arnaud" >
            </div>

            <div class="answer">
              <img class="answerImg" src="../assets/olive.jpg">
              <input type="checkbox" name="checkbox_id[]" value="olive" >
            </div>

            <div class="answer">
              <img class="answerImg" src="../assets/laurane.jpg">
              <input type="checkbox" name="checkbox_id[]" value="laurane" >
            </div>

            <div class="answer">
              <img class="answerImg" src="../assets/lyssandre.jpg">
              <input type="checkbox" name="checkbox_id[]" value="lyssandre" >
            </div>

            <div class="answer">
              <img class="answerImg" src="../assets/eytan.jpg">
              <input type="checkbox" name="checkbox_id[]" value="eytan" >
            </div>

             <div class="answer">
              <img class="answerImg" src="../assets/nono.jpg">
              <input type="checkbox" name="checkbox_id[]" value="nono">
            </div>

            <input type="hidden" name="formSent">

          </div>
          <hr/>
          <h3>/!\ Toute réponse est définitive /!\</h3>
          <button type="submit">Valider</button>
        </div>
    </form>
      
  </body>
</html>