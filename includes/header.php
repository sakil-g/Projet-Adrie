<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="<?php echo BASE_URL . "/css/bootstrap.min.css";?>">
    <!--Fontawesome CDN-->
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL . "/css/style.css"; ?>">
    <!-- Anime CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid navbar-container res">
      <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="http://www.adrie.fr">
      <img src="<?php echo BASE_URL . "img\logo.png";?>" alt="logo" height="50" class="logoAdrie">
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
      if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){ //redirige vers ACCUEIL ADMIN si on est dans la session ADMIN
      echo '<li class="nav-item active">
        <a class="nav-link" href="..\pages\accueil_admin.php">Accueil</a>
        <div class="underline"></div>
      </li>';
      } ?>
      <?php
      if(isset($_SESSION['user']) && $_SESSION['user']['tuteur'] == 1){ //redirige vers ACCUEIL tuteur si on est dans la session tuteur
      echo '<li class="nav-item active">
        <a class="nav-link" href="..\pages\accueil_tut.php">Accueil</a>
        <div class="underline"></div>
      </li>';
      } ?>
       <?php
      if(isset($_SESSION['user']) && $_SESSION['user']['role_id'] == 2){ //redirige vers ACCUEIL tuteur si on est dans la session tuteur
      echo '<li class="nav-item active">
        <a class="nav-link" href="..\pages\accueil_app.php">Accueil</a>
        <div class="underline"></div>
      </li>';
      } ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL . "pages\accueil_tut.php";?>">Tuteurs</a>
        <div class="underline"></div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL . "pages\accueil_app.php";?>">Apprenants</a>
        <div class="underline"></div>
      </li>
      <!-- Affiche le menu ADMIN que si l'utilisateur est connecter en tant qu'admin -->
      <?php 
      if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
      echo '<li class="nav-item">
        <a class="nav-link" href="..\pages\accueil_admin.php">Admin</a>
        <div class="underline"></div>
      </li>';
      }
      ?>
    </ul>
    <ul class="navbar-nav">
    <!-- Affichage des bouttons deconnexion ou connexion selon l'état de la SESSION USER -->
    <?php 
    
    if(isset($_SESSION['user']) && $_SESSION['user'] != NULL){
      echo '<li class="nav-item"><form method="POST" action="../includes/deconnexion.php">
      <input type="submit" value="Se déconnecter" class="btn btn-primary w-100" name="deconnexion">
      </form></li>';
    }else{
      echo '<li class="nav-item mt-1"><form method="POST" action="">
      <input type="submit" value="Se connecter" class="btn btn-primary w-100" name="connexion">
      </form></li>';}
    ?>
    </ul>
  </div>
    </nav>
</div> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="<?php echo BASE_URL . "js/script.js"?>"></script>
</body>
</html>

