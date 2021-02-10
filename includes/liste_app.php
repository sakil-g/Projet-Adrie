<?php session_start(); ?>
<?php include_once('../config.php'); ?>
<?php include_once('header.php');  ?>
<?php
include './dbh_co.php';
if (!isset($_SESSION['username']) || $_SESSION['username']!='admin') {
    header("location: ../index.php");
    exit;
}
session_write_close(); // fermeture de la session pour éviter les warning si t'en ré-ouvres une dans ta page.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Liste des apprenants</title>
</head>
<body>

<div class="container">
    <?php if(isset($_SESSION['username'])){ // Si l'utilisateur est connecté afficher un message de bienvenue
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<div class='text-center mt-3 alert alert-success'> Bonjour , $user </div>";
                } 
    ?>
    <div class="d-flex flex-column text-center mt-5">
        <h1>
        Liste d'apprenants 
        </h1>
        </div>
        <p>Promotion :</p>
        <a class="btn btn-outline-success" href="../includes/liste_tut.php" role="button">Liste des tuteurs</a>
        <a class="btn btn-outline-danger" href="#" role="button">Émargement</a>
        <a class="btn btn-outline-success" href="#" role="button">Emploi du temps</a>

    <section class="container text-center bg-light py-5">

            
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
                    $sql = "SELECT * FROM utilisateur WHERE role_id = '2';" ; //selectionner la base de donnée UTILISATEUR
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) 
                    echo    '<tr> 
                    <td>' .$row["nom"].'</td>
                    <td>' .$row["prenom"].'</td>
                    <td>' .$row["dob"].'</td>
                    <td>' .$row["email"].'</td>
                    <td>
                        <form method="POST" enctype="multipart/form-data" action="../pages/mod_app.php?id='.$row['id_user'].'">
                            <input class="btn-sm btn-primary mb-4" type="submit" value="Modifier" name="" >
                        </form>
             
                        <button type="button" class="btn-sm btn-secondary modalBtn" onclick= supApp("'.$row['id_user'].'") data-toggle="modal" data-target="#supmodal">
                        Supprimer
                        </button>
                    </td>
                    </td>
                    </tr>';
                    }
                    else {
                    echo "0 resultats trouvés";
                    }
                    $db->close();
                    ?>
                </tbody>
            </table>
        </section>
            <p class="lead">
            <button id="pdf" class="btn btn-danger">EN .PDF</button>
            <button id="txt" class="btn btn-success">EN .TEXT</button>
            </p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
<script src="../js/tableHTMLExport.js"></script>    
<script>
      $("#pdf").on("click", function () {
        $("#test").tableHTMLExport({ type: "pdf", filename: "sample.pdf" });
      });
      $("#txt").on("click", function () {
        $("#test").tableHTMLExport({ type: "txt", filename: "sample.txt" });
      });
</script>
<?php include '../modal/modal_app.php'; ?>
</body>
</html>

