<?php
ini_set('display_errors', 'on'); 
include('inscription.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./css/index.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Ciela world</title>
</head>
<body>
<?php
if(isset($_GET["page"])) {// s'il y a des éléments 
    $page=$_GET["page"]; //$_GET permet d'envoyer des infos mais ce n'est pas sécurisé
if($page == "inscription"){
  ?>
<div class="wrapper">
        <div class="logo">
            <img src="./Img/logo/logo.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
           Inscription
        </div>
        <form class="p-3 mt-3" action="" method="POST" enctype="multipart/form-data">
        <div id="error">
        </div>
        <div id="errorMessage"> <span>&#9888;</span>Erreur: des champs vide!</div>
        <!-- Nom -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nom" id="Name" placeholder="nom" autocomplete="off"/>
            </div>
            <span class="text-success float-right mr-2" id="nom_status"></span>
            <div class="error" id="nameError"></div>
            <!-- Prenom -->
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="text" name="prenom" id="prenom" placeholder="prenom" autocomplete="off"/>
            </div>
            <span class="text-success float-right mr-2" id="prenom_status"></span>
            <div class="error" id="lastNameError"></div>
            <!-- Email -->
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="userName" placeholder="email" autocomplete="off"/>
            </div>
                <div class="error" id="emailError"></div>
                <div class="error" id="emailMissing"></div>
                <span class="text-success float-right mr-2" id="email_status"></span>
                <p class="error"><?php if(isset($errors['u']))echo $errors['u']; ?></p>
            <!-- password -->
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="mot de passe" autocomplete="off"/>
            </div>
            <div class="error" id="passwordMissing"></div>
            <div id="pswd_info">
                <ul>
                    <li id="letter" class="invalid">Au moins  <strong>une lettre</strong></li>
                    <li id="capital" class="invalid">Au moins <strong>une majuscule</strong></li>
                    <li id="number" class="invalid">Au moins <strong>un nombre</strong></li>
                    <li id="length" class="invalid">Au moins <strong>8 caractères</strong></li>
                </ul>
            </div>
            <!-- Image -->
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="file" name="image" id="image"/>
            </div>
            <!-- Bouton -->
            <button class="btn mt-3" name="inscription" id="inscription">Inscription</button>
        </form>
        <div class="text-center">
        <span class="glyphicon glyphicon-log-in"></span>
           <a href="inscr_conn.php">Se connecter</a>
        </div>
 </div>

  <?php
}}else{
  ?>
<div class="wrapper">
        <div class="logo">
        <img src="./Img/logo/logo.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Connexion
        </div>
        <form class="p-3 mt-3" action="connexion.php" method="POST" id="login-form" enctype="multipart/form-data">
            <div id="error">
            </div>
        <div id="errorMessage"> <span>&#9888;</span>Erreur: des champs vide!</div>
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="username" id="userName" placeholder="Email" required autocomplete="off"/>
                </div>
                <div class="error" id="emailError"></div>
                <div class="error" id="emailMissing"></div>
                    <span class="text-success float-right mr-2" id="email_status"></span>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="mot de passe" required autocomplete="off"/>
                </div>
                <button class="btn mt-3" name="connexion" id="connexion">Connexion</button>
        </form>
        <div class="text-center fs-6">
        <a href="inscr_conn.php?page=inscription">S'inscrire</a>
        </div>
       
 </div>
   <?php
}
  ?>
  <script src="script/connexion.js"></script>
  <script src="script/form.js"></script>

</body>
</html>
<?php
?>