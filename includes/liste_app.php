<?php session_start(); ?>
<?php include_once('../config.php'); ?>

<?php 
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
    <title>Liste des apprenants</title>
    <?php include_once('header.php');  ?>
</head>
<body>

<div class="container">
    <div class="d-flex flex-column text-center mt-5">
        <h1 class="animate__animated animate__bounceInDown">
        Liste d'apprenants 
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
                                    echo '<option class="optionPromotion" value="'.$row['id_promo'].' " '.$selected.'>'
                                    .$row['nom'].' '.$row['promotion'].' </option>';
                                    $compteur++;
                                }
                            }
                        ?>
                    </select>
                    
            </form>
        </div>
        
        <a class="btn btn-outline-success mt-3" href="../includes/liste_tut.php" role="button">Liste des tuteurs</a>
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
//Récupere la valeur de la premiere option 
$(document).ready(function(){
    optionPromotion = document.querySelectorAll('.optionPromotion')
    var promo = optionPromotion[0].value
    // Si la promotion est bien défini on l'a récupere pour la rajouter a la requete AJAX qui nous affichera ensuite les informations demandées
        if(promo != "undefined"){
            $.ajax({
                    url: 'https://adrieprojet.herokuapp.com/includes/section_utilisateur.php?promotion='+promo,
                    method:"GET",
                    //data:{promotion: value},
                    success: (data) => {
                        console.log(data)
                        $("#utilisateurs").html(data);
                    },
                    error: (data) => {
                    }
                });
        }
            console.log(promo)
            // Si l'on choisi une autre promotion elle est ainsi récuperer afin d'afficher les utilisateurs de cette promotion
    $("#promotion").change(function(){
        var promo =  $(this).children("option:selected").val();
        if(promo != "undefined"){
            $.ajax({
                url: 'https://adrieprojet.herokuapp.com/includes/section_utilisateur.php?promotion='+promo,
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