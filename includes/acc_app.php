<?php include_once('../config.php'); ?>
<?php include_once('header.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- FULL CALENDAR -->
    <link href="../fullcalendar/lib/main.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container"> 
            <?php if(isset($_SESSION['username'])){ // Si l'utilisateur est connecté afficher un message de bienvenue
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<div class='text-center mt-3 alert alert-success'> Bonjour , $user </div>";
                } 
            ?>
    <a class="btn btn-outline-success" href="#" role="button">Emploi du temps</a>
    <a class="btn btn-outline-danger" href="#" role="button">Émargement</a>
    <div id="calendar"></div>
</div>
<script src="../fullcalendar/lib/main.js"></script>
<script src='../js/fullcalendar.js'></script>
</body>
</html>