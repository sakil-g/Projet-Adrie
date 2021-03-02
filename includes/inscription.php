<?php 
// connexion à la base de données
    include './dbh_co.php';
    require_once('../controller/Valid_inscription.php'); // j'appel ma function validation qui se retrouve dans le fichier controllers 
    if(isset($_POST["inscription"])){ // 
        $validation = validerDonneesFormInscription($_POST); // 
        if(!$validation["valide"]){
            $message = '<div class=" container mt-5 text-center alert alert-danger">'.$validation["message"].'</div>';
            echo $message;
        }else{
            $resultatDeSauvegarde = enregistrerDansBase($db);
            if($resultatDeSauvegarde["succes"]){
            }else{
                $message = '<div class=" container mt-5 alert alert-danger">'.$resultatDeSauvegarde["erreur"].'</div>';
                echo $message;
            }
        }
    }

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
    if(strlen($dob) >= 8){
    $res=explode('-',$dob); 
    $date=$res[2];
    $month=$res[1];
    $year=$res[0];
    $new=$date.'-'.$month.'-'.$year;
    }
    else{
      session_start();
      $_SESSION['flash'] = ['false','Entrer une date'];
      header("location:../pages/inscription_user.php");
    }
    //fonction pour insérer les données que l'on à récuperer dans le $_POST dans la base de données MYSQL
    $sql = "INSERT INTO utilisateur (id_user,username, mdp,nom,prenom,email,numero,dob,role_id) VALUES (NULL,'$username', md5('$mdp'),'$nom','$prenom','$email','$tel','$new',2);";
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
        echo '<script>alert("Enregistrement réussi")</script>';
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
