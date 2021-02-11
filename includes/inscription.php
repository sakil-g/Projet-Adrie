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
    $promotion= $_POST['promotion'];
    

    //converti la date en format EUR
    $res=explode('-',$dob); 
    $date=$res[2];
    $month=$res[1];
    $year=$res[0];
    $new=$date.'-'.$month.'-'.$year;

    $sql = "INSERT INTO utilisateur (id_user,username, mdp,nom,prenom,email,numero,dob,role_id,tuteur) VALUES (NULL,'$username','$mdp','$nom','$prenom','$email','$tel','$new',2,0);";
    $rec = "SELECT id_user FROM utilisateur ORDER BY id_user DESC LIMIT 1";
    $resulat = [];

    if (mysqli_query($db, $sql)) 
    {
      $result = mysqli_query($db, $rec);
      $user= $result->fetch_assoc();
    
    $id_user = $user['id_user'];
    $request = "INSERT INTO utilisateur_promotion (id_user, id_promo,tuteur) VALUES ('$id_user','$promotion',0);";
      if (mysqli_query($db, $request)) {
        $resulat = array("succes" => true);
        header("location:../index.php");
      } else {
        $resulat = array("succes" => false);
        $resulat["erreur"] = "Error: " . $request . "<br>" . mysqli_error($db);
      }
    } else {
      $resulat = array("succes" => false);
      $resulat["erreur"] = "Error: " . $sql . "<br>" . mysqli_error($db);
    }
    mysqli_close($db);
    return $resulat;
  }
  enregistrerDansBase($db);
?>
