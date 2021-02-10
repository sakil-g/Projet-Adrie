<?php include_once('../config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulaire d'inscription</title>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
<?php include_once('../includes/header.php');?>  <!-- Ajout de la navbar -->

</head>
<body>
<div class="bg">
    <div class="registration-form">
        <form method="POST" action="../includes/inscription.php">
            <div class="d-flex form-icon justify-content-center">
                <img src="<?php echo BASE_URL . "\img\logo.png";?>" alt="logo" height="120" class="logoadrie">
            </div>
            <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                <input type="text" class="form-control " placeholder="Nom d'utilisateur*" name="username">
            </div>
            <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                <input type="password" class="form-control " placeholder="Mot de passe*" name="password">
            </div>
            <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-address-book"></i></span>
                    </div>
                <input type="text" class="form-control " placeholder="Nom*" name="nom">
            </div>
            <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                    </div>
                <input type="text" class="form-control " placeholder="Prénom*" name="prenom">
            </div>
            <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                <input type="text" class="form-control " placeholder="E-mail*" name="email">
            </div>
            <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                <input type="tel" class="form-control " placeholder="Numéro de téléphone*" name="numero">
            </div>
            <div class="input-group form-group mt-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                <input type="date" class="form-control" name="dob">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account" name="connexion">Créer un compte</button>
            </div>
            <div> <p class="champs"> Tout les champs muni d'une * sont obligatoires </p></div>
        </form>
    </div>
</div>

</body>
</html>

