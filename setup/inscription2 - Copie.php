<?php
    session_start();
    require("../config/config_db.php"); // Fichier PHP contenant la connexion à votre BDD
 
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
            $nom  = htmlentities(trim($nom)); // On récupère le nom
            $prenom = htmlentities(trim($prenom)); // on récupère le prénom
            $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
            $mdp = trim($mdp); // On récupère le mot de passe 
            $confmdp = trim($confmdp); //  On récupère la confirmation du mot de passe
 
            //  Vérification du nom
            if(empty($nom)){
                $valid = false;
                $er_nom = ("Le nom d' utilisateur ne peut pas être vide");
            }       
 
            //  Vérification du prénom
            if(empty($prenom)){
                $valid = false;
                $er_prenom = ("Le prenom d' utilisateur ne peut pas être vide");
            }       
 
            // Vérification du mail
            if(empty($mail)){
                $valid = false;
                $er_mail = "Le mail ne peut pas être vide";
 
                // On vérifit que le mail est dans le bon format
            }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                $valid = false;
                $er_mail = "Le mail n'est pas valide";
 
            }else{
                // On vérifit que le mail est disponible
                $req_mail = $DB->query("SELECT mail FROM utilisateur WHERE mail = ?",
                    array($mail));
 
                $req_mail = $req_mail->fetch();
 
                if ($req_mail['mail'] <> ""){
                    $valid = false;
                    $er_mail = "Ce mail existe déjà";
                }
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
 
                $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
                $date_creation_compte = date('Y-m-d H:i:s');
 
                // On insert nos données dans la table utilisateur
                $DB->insert("INSERT INTO utilisateur (nom, prenom, mail, mdp, date_creation_compte) VALUES 
                    (?, ?, ?, ?, ?)", 
                    array($nom, $prenom, $mail, $mdp, $date_creation_compte));
 
                header('Location: index.php');
                exit;
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Inscription</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="../css/login.css">
    </head>
    <body>      
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