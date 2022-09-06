<?php
ini_set('display_errors', 'on');
//echo $id_session;
  include('connexiondb.php');
if(isset($_SESSION["id_user"])){
    $id_session = $_SESSION["id_user"];
    //Information user
    $requete = "SELECT * FROM `utilisateur` WHERE id_user ='$id_session'";
    $resultat = mysqli_query($conn, $requete);// execution requet check
    $number = mysqli_num_rows($resultat);// nombre de resultat
    $data = mysqli_fetch_assoc($resultat);// sauv information des champs de la table dans row
    $id = $data['id_user'];
    $nom = $data['nom_user'];
    $prenom = $data['prenom_user'];
    $email = $data['email_user'];
    $password = $data['mdp_user'];
    $image = $data['img_user'];  
}
 else{
     header('Location: inscr_conn.php');
 }
?>