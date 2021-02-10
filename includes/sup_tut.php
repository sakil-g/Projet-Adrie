<?php include_once '../includes/dbh_co.php'; //accéder a la base de donnée
        
                    // Lancer une session
                    if (!session_id()) @session_start();
                    
                    $id = $_GET['id'];
                    // Requête SQL pour supprimer une entrée
                    $sql = "DELETE FROM utilisateur WHERE id_user=$id";
                    
                    if ($db->query($sql) === TRUE) {
                        $_SESSION['flash'] = 'Tuteur supprimer avec succès';
                        header("Location: ../includes/liste_tut.php");
                    } else {
                        echo "Error deleting record: " . $db->error;
                    }
                    
                    $db->close();
                    ?>