<?php
include '../includes/dbh_co.php';
session_start();
// Affichage autorisé que pour les ADMINS et les apprenants
if (!isset($_SESSION['username']) || $_SESSION['username']!='admin') {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role_id']!=2 ) {
    header("location: ../index.php");
    exit;
    }
}
session_write_close(); // fermeture de la session pour éviter les warning si t'en ré-ouvres une dans ta page.
?>
<?php include '../includes/acc_app.php' ?>
