<?php 
include_once './dbh_co.php';

//récupere les valeurs avec le $_POST
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$id = $_POST['id'];

    $res=explode('-',$dob); //convertir la date en format EUR
    $date=$res[2];
    $month=$res[1];
    $year=$res[0];
    $new=$date.'-'.$month.'-'.$year;

// Met à jour les valeurs dans la BDD
$sql = "UPDATE utilisateur SET nom= '$nom',prenom='$prenom',email='$email',dob= '$new' WHERE id_user=$id ";

if (mysqli_query($db, $sql)) {
    header("Location: ../includes/liste_tut.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }

  mysqli_close($db);
  ?>`