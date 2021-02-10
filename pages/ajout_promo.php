<?php
include '../includes/dbh_co.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username']!='admin') {
    header("location: ../index.php");
    exit;
}
session_write_close(); // fermeture de la session pour éviter les warning si t'en ré-ouvres une dans ta page.
?>
<?php include_once('../config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire d'inscription</title>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
<?php include_once('../includes/header.php');?>  <!-- Ajout de la navbar -->

</head>
<body>
<div class="bg">
    <div class="registration-form">
        <form method="POST" action="../includes/add_prom.php">
            <div class="d-flex form-icon justify-content-center">
                <img src="<?php echo BASE_URL . "\img\logo.png";?>" alt="logo" height="120" class="logoadrie">
            </div>
                <div class="input-group form-group mt-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text mr-1"><i class="fas fa-user"></i></span>
                        </div>
                    <input type="text" class="form-control " placeholder="Nom de la promotion*" name="nomPromo">
                </div>
                <div class="input-group form-group mt-3">
                <label class="ml-1" for="annee">Année (Début - Fin) :</label>
                    <div class="d-flex ">
                        <div class="input-group-prepend">
                            <span class="input-group-text mr-1"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control " type="number" name="debut_promotion" id="debut_promotion"  min="2020" style="width: 44%;">
                        <input class="form-control " type="number" name="fin_promotion" id="fin_promotion"  min="2021" style="width: 44%;"> 
                    </div>
                </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account" name="creer">Créer une promotion</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

