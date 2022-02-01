


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inscription</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>  

<?php
    session_start();
    require("../utils/user_utils.php");
    // S'il y a une session alors on ne retourne plus sur cette page
    if (isset($_SESSION['id'])){
        header('Location: ../index.php'); 
        exit;
    }
 
    // Si la variable "$_Post" contient des informations alors on les traitres
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
 
        // On se place sur le bon formulaire grâce au "name" de la balise "input"
        if (isset($_POST['inscription'])){
            $nom  = htmlentities(trim($nom)); // On récupère le nom
            $bucque = htmlentities(trim($bucque)); // on récupère le prénom
            $fams = htmlentities(strtolower(trim($fams))); // On récupère le mail
            $mdp = trim($mdp); // On récupère le mot de passe 
            $confmdp = trim($confmdp); //  On récupère la confirmation du mot de passe
 
            //  Vérification du nom
            if(empty($nom)){
                $valid = false;
                $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
            }     
 
            //  Vérification du prénom
            if(empty($bucque)){
                $valid = false;
                $er_bucque = ("La bucque ne peut pas être vide");
            }/*else{
                // On vérifit que le nom est disponible
                $query = "SELECT id, bucque, hints, points, admin FROM users WHERE bucque='$bucque';";
                $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
                if (mysqli_num_rows($result) == 1){
                    $valid = false;
                    $er_bucque = "Cette bucque existe déjà";
                }
            } */
 
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
 
                creationCompte($bucque,$nom,$fams,$mdp);
 
                header('Location: ../index.php');
                exit;
            }
        }
    }

?>


        <div>Inscription</div>
        <form method="post">
            <label=><strong>Nom</strong> - identifiant pour ta connection</label>
            <?php
                // S'il y a une erreur sur le nom alors on affiche
                if (isset($er_nom)){
                ?>
                    <div><?= $er_nom ?></div>
                <?php   
                }
            ?>
            <input type="text" placeholder="Nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>  

            <label=><strong>Bucque</strong></label>
            <?php
                if (isset($er_bucque)){
                ?>
                    <div><?= $er_bucque ?></div>
                <?php   
                }
            ?>
            <input type="text" placeholder="Bucque" name="bucque" value="<?php if(isset($bucque)){ echo $bucque; }?>" required>   
            <label=><strong>Fam's</strong></label>
            <?php
                if (isset($er_fams)){
                ?>
                    <div><?= $er_fams ?></div>
                <?php   
                }
            ?>
            <input type="text" placeholder="Fam's" name="fams" value="<?php if(isset($fams)){ echo $fams; }?>" required>
            <label=><strong>Mot de passe</strong></label>
            <?php
                if (isset($er_mdp)){
                ?>
                    <div><?= $er_mdp ?></div>
                <?php   
                }
            ?>
            <input type="password" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
            <label=><strong>Confirmation</strong></label>
            <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
            <button type="submit" name="inscription">Envoyer</button>
        </form>
    </body>
</html>