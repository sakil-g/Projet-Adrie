<?php
include '../includes/dbh_co.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username']!='admin') {
    header("location: ../index.php");
    exit;
}
session_write_close(); // fermeture de la session pour éviter les warning si t'en ré-ouvres une dans ta page.
?>
<?php include '../includes/acc_admin.php'; ?>