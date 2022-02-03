<?php

//C'est ici que l'on peut modifier les infos pour se connecter à la DB
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chapkfet');

//connection à la db
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

mysqli_set_charset($conn, "latin1_general_cs");


?>