<?php 
include_once './dbh_co.php';
function EnregistrerFormation($db){
  $nomFormation = htmlentities($_POST['nomPromo']);
  $debutPromotion = htmlentities($_POST['debut_promotion']);
  $finPromotion = htmlentities($_POST['fin_promotion']);
  $promotion= $debutPromotion.'-'.$finPromotion;

  $sql = "INSERT INTO promotion (nom,promotion) VALUES ('$nomFormation', '$promotion');";

  $resulat = [];

  if (mysqli_query($db, $sql)) {
      header("Location: ../pages/accueil_admin.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    mysqli_close($db);

    }
EnregistrerFormation($db);
  ?>

