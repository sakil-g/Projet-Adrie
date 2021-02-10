<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body>
<!-- Formulaire de connexion -->
<div class="container-fluid">
        <div class="d-flex justify-content-center h-100 " style="margin-top: 5rem;">
            <div class="card">
                <div class="card-header">
                    <h3 class="animate__animated animate__bounceInDown">Connexion</h3>
                <div class="card-body">
                    <form method="POST" action="<?php echo BASE_URL . "includes\login.php";?>">
                        <div class="input-group form-group mt-3 animate__animated animate__flipInX ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control " placeholder="Nom d'utilisateur" name="user">
                        </div>
                        <div class="input-group form-group animate__animated animate__flipInX ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Se souvenir de moi ?
                        </div>
                        <div class="form-group mt-2">
                            <input type="submit" value="Se connecter" class="btn float-right login_btn w-100 animate__animated animate__bounceInUp" name="connexion">
                        </div>
                    </form>
                </div>
                <div class="card-footer mt-3">
                    <div class="d-flex justify-content-center links">
                        Pas de compte ?<a href="./pages/inscription_user.php">S'inscrire</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Mot de passe oublié?</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
</html>