<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Chapk'fet</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
<?php
require("config/config_db.php");
session_start();

if(isset($_POST['bucque'])){
  $bucque = stripslashes($_REQUEST['bucque']);
  $bucque = mysqli_real_escape_string($conn, $bucque);
  $password = stripslashes($_REQUEST['psw']);
  $password = mysqli_real_escape_string($conn, $password);

  //preparation de la requete SQL pour vérifier si bon mdp et bonne bucque
  $query = "SELECT * FROM `users` WHERE bucque='$bucque' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['bucque'] = $bucque;



    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if(isset($_GET['p'])) {
      $p = $_GET["p"];
      header("Location: ".$p.".php");
    }elseif ($user['admin'] == 1) {
      header('location: admin/home.php');      
    }else{
      header('location: index.php');
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>

    <form method="post">
      <h1>Formulaire de bucquage</h1>
      <div class="formcontainer">
        <?php if (! empty($message)) { ?>
          <p class="errorMessage"><?php echo $message; ?></p>
        <?php } ?>
      <hr/>
      <div class="container">
        <label for="uname"><strong>Bucque</strong></label>
        <input type="text" placeholder="Bucque toi !!" name="bucque" required>
        <label for="psw"><strong>Mot de passe</strong></label>
        <input type="password" placeholder="Mot de passe" name="psw" required>
      </div>
      <button type="submit">Login</button>
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        <input type="checkbox"  checked="checked" name="remember"> Remember me
        </label>
      </div>
      </div>
    </form>
  </body>
</html>