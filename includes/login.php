<?php 
session_start();
if(isset($_POST['user']) && isset($_POST['mdp'])) //récupere les $_POST du formulaire LOGIN
{
    // connexion à la base de données
    include './dbh_co.php';
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['user'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp']));
    
    if($username !== "" && $password !== "")
    {   $requeteUser = "SELECT * FROM utilisateur where 
        username = '".$username."' and mdp = '".$password."'limit 1 " ;
        $requete = "SELECT count(*) FROM utilisateur where 
              username = '".$username."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $result =mysqli_query($db,$requeteUser);
        $reponse      = mysqli_fetch_array($exec_requete);
        $user=$result->fetch_assoc();
        
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {   
            $_SESSION['user']= $user;
            $_SESSION['username'] = $username;
            if($_SESSION['user']['role_id']==2){ //redirection quand connecté en tant qu'apprenant
                 header('Location: ../pages/accueil_app.php');
            }
            if($_SESSION['user']['tuteur']==1){
                header('Location: ../pages/accueil_tut.php'); //redirection quand on est connecté en tant que tuteur
            }
            if ($_SESSION['user']['role_id']==1){
                header('Location: ../pages/accueil_admin.php'); //redirection quand on est connecté en tant qu'admin
            }
        }
        else
        {
           header('Location: ../pages/error.php'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../index.php'); // utilisateur ou mot de passe vide
    }
}

mysqli_close($db); // fermer la connexion
?>