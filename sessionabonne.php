<?php
ini_set('display_errors', 'on');
//echo $id_session;
  include('connexiondb.php');
if(isset($_SESSION["id_abonne "])){
    $id_sessionabonne = $_SESSION["id_abonne"];
    //Information user
    $sqlabonne = "SELECT * FROM `abonne` WHERE id_abonne  ='$id_sessionabonne'";
    $queryabonne = mysqli_query($conn, $sqlabonne);// execution requet check
    $numberaboone = mysqli_num_rows($queryabonne);// nombre de resultat
    $dataabonne = mysqli_fetch_assoc($queryabonne);// sauv information des champs de la table dans row
    $id = $dataabonne['id_abonne '];
    $nom = $dataabonne['nom_aboone'];
    $prenom = $dataabonne['prenom_abonne'];
    $email = $dataabonne['email_abonne'];
}
 else{
     header('Location: inscr_conn.php');
 }
?>