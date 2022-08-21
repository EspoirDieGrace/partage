<?php
ini_set('display_errors', 'on');
//echo $id_session;
  include('connexiondb.php');
if(isset($_SESSION["id_loisir "])){
    $id_sessionloisir = $_SESSION["id_loisir"];
    //Information user
    $sqlloisir = "SELECT * FROM `loisir` WHERE id_loisir  ='$id_sessionabonne'";
    $queryloisir = mysqli_query($conn, $sqlloisir);// execution requet check
    $numberloisir = mysqli_num_rows($queryloisir);// nombre de resultat
    $dataloisir = mysqli_fetch_assoc($queryloisir);// sauv information des champs de la table dans row
    $id = $dataloisir['id_loisir '];
    $nom = $dataloisir['nom_loisir'];
    $date = $dataloisir['datepub'];
    $imgloisir = $dataloisir['img_loisir'];
}
?>