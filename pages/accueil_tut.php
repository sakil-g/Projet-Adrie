<?php
include '../includes/dbh_co.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username']!='admin') {
  if (!isset($_SESSION['user']) || $_SESSION['user']['tuteur']!=1 ) {
    header("location: ../index.php");
    exit;
  }
}
session_write_close(); // fermeture de la session pour éviter les warning si t'en ré-ouvres une dans ta page.
?>
<?php include '../includes/acc_tut.php'; ?>
