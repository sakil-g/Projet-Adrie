<?php session_start(); ?>
<?php include_once('../config.php'); ?>
<?php include_once('header.php');  ?>
<?php //include_once '../includes/dbh_co.php';
include './dbh_co.php';
if (!isset($_SESSION['username']) || $_SESSION['username']!='admin') {
    header("location: ../index.php");
    exit;
}
session_write_close(); // fermeture de la session pour éviter les warning si t'en ré-ouvres une dans ta page.
?>
<?php 
    
    if (isset ($_GET['valider'])){
    $idpromo = $_GET ['promotion'];
}
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
    <title>Liste des tuteurs / tutrices</title>
</head>
<body>

<div class="container">
    <div class="d-flex flex-column text-center mt-5">
        <h1>
        Liste des tuteurs / tutrices
        </h1>
        </div>
        <div id="promotiondiv" class="prom" style="width:20%">
            <form method="POST" action="" id="promotion">
                <input type="text" hidden value="<?php echo $result['id_user']?>" name = 'id' id="test">
                    <label class="mb-2" for="promotion">Promotion :</label>
                    <select class="form-control mb-4" name="promotion" id="promotion">
                        <!-- Récupérer les promos -->
                        <?php 
                            $compteur = 0; 
                            $selected = false;
                            $sql = "SELECT * FROM promotion"; 
                            $result = $db->query($sql); 
                            if ($result->num_rows > 0) {
                                
                        // Afficher le résultat de chaque lignes
                            while($row = $result->fetch_assoc()){
                                    if($compteur == 0){$selected = "selected=selected";}else{$selected = "";}
                                    echo '<option value="'.$row['id_promo'].' " '.$selected.'>'
                                    .$row['nom'].' '.$row['promotion'].' </option>';
                                    $compteur++;
                                }
                            }
                        ?>
                    </select>
                    
            </form>
        </div>
        
        <a class="btn btn-outline-success mt-3" href="../includes/liste_app.php" role="button">Liste des apprenants</a>
        <a class="btn btn-outline-danger mt-3" href="#" role="button">Émargement</a>
        <a class="btn btn-outline-success mt-3" href="#" role="button">Emploi du temps</a>
    
    <section id="utilisateurs" class="container text-center bg-light py-5">
    </section>
    <p class="lead">
            

    </p>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  


<script>
$(document).ready(function(){
    $("#promotion").change(function(){

        var promo = $(this).children("option:selected").val();
        if(promo != "undefined"){
            $.ajax({
                url: 'http://127.0.0.1/edsa-adrie_proj/includes/section_tuteur.php?promotion='+promo,
                async : true,
                method:"GET",
                //data:{promotion: value},
                success: (data) => {
                    console.log(data)
                    $("#utilisateurs").html(data);
                    
                },
                error: (data) => {
                }
            });
            console.log(promo)
            //console.log("a")

        };
    })

});
</script>
<?php include '../modal/modal_app.php'; ?>
</body>
</html>