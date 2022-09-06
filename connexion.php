<?php

ini_set('display_errors', 'on'); 
include('connexiondb.php');
include('session.php');
session_start();
 if (isset($_POST['connexion'])) {
     $email = $_POST['username'];
    $password = $_POST['password'];
  
  
     //check user
    $requete = "SELECT * FROM `utilisateur` WHERE email_user ='".$email."' and mdp_user = '".$password."' ";
     $resultat = mysqli_query($conn, $requete);
    $number = mysqli_num_rows($resultat);
  
  
     if ($number > 0) {
       //aller à la page 
      $row = mysqli_fetch_assoc($resultat);
      $id = $row['id_user'];
  
  
     //Création de la session
       $_SESSION["id_user"] = $id;
       header('Location: index.php');
    } else {
        header('Location: inscr_conn.php');
      //afficher message d'erreure
       echo "mot de passe eronné";
     }
  }
?>