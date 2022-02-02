<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inscription</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="/css/login.css">
    </head>
    <body>  

<?php
    require("utils/user_utils.php");
    session_start();
    // S'il y a une session alors on ne retourne plus sur cette page
    if (isset($_SESSION['id'])){
        header('Location: index.php'); 
        exit;
    }
 
    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        // On se place sur le bon formulaire grâce au "name" de la balise "input"
        if (isset($_POST['inscription'])){
            $bucque = stripslashes($_REQUEST['bucque']);
            $bucque = mysqli_real_escape_string($conn, $bucque);
            $fams = stripslashes($_REQUEST['fams']);
            $fams = mysqli_real_escape_string($conn, $fams);
            $mdp = stripslashes($_REQUEST['mdp']);
            $mdp = mysqli_real_escape_string($conn, $mdp);
            $confmdp = stripslashes($_REQUEST['confmdp']);
            $confmdp = mysqli_real_escape_string($conn, $confmdp);
 
            //  Vérification de la bucque
            if(empty($bucque)){
                $valid = false;
                $er_bucque = ("La bucque ne peut pas être vide");
            }else{
                // On vérifit que le nom est disponible
                $query = "SELECT id, bucque, hints, points, admin FROM users WHERE bucque='$bucque';";
                $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
                if (mysqli_num_rows($result) >= 1){
                    $valid = false;
                    $er_bucque = "Cette bucque existe déjà";
                }
            }
 
            // Vérification du mail
            if(empty($fams)){
                $valid = false;
                $er_fams = "La fam's ne peut pas être vide";
 
                // On vérifit que le mail est dans le bon format
            }
 
            // Vérification du mot de passe
            if(empty($mdp)) {
                $valid = false;
                $er_mdp = "Le mot de passe ne peut pas être vide";
 
            }elseif($mdp != $confmdp){
                $valid = false;
                $er_mdp = "La confirmation du mot de passe ne correspond pas";
            }
 
            // Si toutes les conditions sont remplies alors on fait le traitement
            if($valid){
 
                creationCompte($bucque,$fams,$mdp);
 
                header('Location: index.php');
                exit;
            }
        }
    }

?>


        
        <form method="post">
            <p>
                Bienvenu(e) dans le jeux de la semaine motiv's de la ChapK'fet.<br>
L'objectif de ce jeux est d'obtenir le plus de points pour pouvoir remporter le graal.<br>
Comment remporter des points ? <br>
Chaque jour de la semaine, un nouveau niveau sera déblocable. Pour le débloquer, il faudra trouver dans la rez le QRcode de déblocage.<br>
Une fois ce QRcode trouvé, vous débloquez le niveau et vous devez maintenant trouver les QRcodes défis. Ces derniers vous enverons vers des défis sous forme de QCM. Chaque bonne réponse vaut 1 point.<br>
Chaque soir, vous pourrez vous rendre compte des points que vous aurez gagné dans la journée et à la fin de la semaine, celui ou celle qui aura obtenu le plus de points remportera ... .<br>
A vos téléphones ! Et c'est parti !
            </p>
            <h1>Inscription</h1>
            <div class="container">
                <label=><strong>Bucque</strong></label>
                <?php
                    if (isset($er_bucque)){
                    ?>
                        <div class="erreur"><?= $er_bucque ?></div>
                    <?php   
                    }
                ?>
                <input type="text" placeholder="Bucque" name="bucque" required>   
                <label=><strong>Fam's</strong></label>
                <?php
                    if (isset($er_fams)){
                    ?>
                        <div class="erreur"><?= $er_fams ?></div>
                    <?php   
                    }
                ?>
                <input type="text" placeholder="Fam's" name="fams" required>
                <label=><strong>Mot de passe</strong></label>
                <?php
                    if (isset($er_mdp)){
                    ?>
                        <div class="erreur"><?= $er_mdp ?></div>
                    <?php   
                    }
                ?>
                <input type="password" placeholder="Mot de passe" name="mdp" required>
                <label><strong>Confirmation</strong></label>
                <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
            </div>
            <button type="submit" name="inscription">Envoyer</button>
        </form>
    </body>
</html>