<?php
    if (isset ($_GET['promotion'])){
    $idpromo = $_GET['promotion'];
    }
?>

<table class="table" id="test">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">E-mail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'dbh_co.php'; //accéder a la base de donnée
                    //requête pour pouvoir sélectionner les utilisateurs par promo
                    $sql="SELECT * FROM utilisateur_promotion WHERE id_promo =".$idpromo.";";
                    $result = $db->query($sql);
                    
                    if(!empty($result)){
                        while($row = $result->fetch_array()){
                        $request = "SELECT * FROM utilisateur WHERE id_user = ".$row['id_user'].";";
                        $resultat = $db->query($request);
                        if (!empty($resultat)){
                            $line = $resultat->fetch_row();
                                echo    '<tr> 
                    <td>' .$line[7].'</td>
                    <td>' .$line[8].'</td>
                    <td>' .$line[5].'</td>
                    <td>' .$line[3].'</td>
                    <td>
                        <form method="POST" enctype="multipart/form-data" action="../pages/mod_app.php?id='.$line[0].'">
                            <input class="btn-sm btn-primary mb-4" type="submit" value="Modifier" name="" >
                        </form>
             
                        <button type="button" class="btn-sm btn-secondary modalBtn" onclick= supApp("'.$line[0].'") data-toggle="modal" data-target="#supmodal">
                        Supprimer
                        </button>
                    </td>
                    </td>
                    </tr>';
                    
                    }
                    else {
                    echo "0 resultats trouvés";
                    }
                            }
                       }
                    ?>
                </tbody>
            </table>