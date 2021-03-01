<?php include_once('../config.php'); ?>
<?php include_once('header.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- FULL CALENDAR -->
    <link href="../fullcalendar/lib/main.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
<div class="container-fluid">
    <div class="text-center mt-3 alert alert-dark animate__animated animate__fadeInDown"> Bienvenue ADMIN
    </div>
    <div class="d-flex mt-5 justify-content-center">
    <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle mr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Ajout
  </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="../pages/inscription_user.php" role="button">Ajouter un apprenant</a>
        <a class="dropdown-item" href="../pages/inscription_tut.php" role="button">Ajouter un tuteur</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../pages/ajout_promo.php" role="button">Ajouter une promo</a>
    </div>
    </div>
    <a class="btn btn-outline-success mr-1" href="#" role="button">Emploi du temps</a>
    <a class="btn btn-outline-danger mr-1" href="#" role="button">Émargement</a>
    <a class="btn btn-outline-success mr-1" href="../includes/liste_app.php" role="button">Liste des apprenants</a>
    <a class="btn btn-outline-success mr-1" href="../includes/liste_tut.php" role="button">Liste des tuteurs</a>
    </div>
    <div id="calendar"></div>
</div>
<script src="../fullcalendar/lib/main.js"></script>
<script src='../js/fullcalendar.js'></script>
</body>
</html>