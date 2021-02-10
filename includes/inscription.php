<?php 
// connexion à la base de données
    include './dbh_co.php';
  function enregistrerDansBase($db){
    $username = htmlentities($_POST['username']);
    $mdp = htmlentities($_POST['password']);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $email = htmlentities($_POST['email']);
    $tel = htmlentities($_POST['numero']);
    $dob = htmlentities($_POST['dob']);

    //converti la date en format EUR
    $res=explode('-',$dob); 
    $date=$res[2];
    $month=$res[1];
    $year=$res[0];
    $new=$date.'-'.$month.'-'.$year;

    $sql = "INSERT INTO utilisateur (id_user,username, mdp,nom,prenom,email,numero,dob,role_id,tuteur) VALUES (NULL,'$username','$mdp','$nom','$prenom','$email','$tel','$new',2,0);";
    $rec = "SELECT id_user FROM utilisateur ORDER BY id_user DESC LIMIT 1";
    if (mysqli_query($db, $sql)) {
        header("location:../index.php");
  } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($db);
  }
  mysqli_close($db);
  }
  enregistrerDansBase($db);
?>
