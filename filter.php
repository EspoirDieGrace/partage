<?php    
include('connexiondb.php');
$count = null;

if (isset($_GET["option"]) && $_GET["option"] !== '') {
  
  $selectedType = $_GET["option"];
  $requete = "SELECT * FROM loisir  INNER JOIN type_pub ON loisir.id_typpub = type_pub.id_typpub WHERE loisir.id_typpub = $selectedType";

  if ($resultat = mysqli_query($conn, $requete)) {
    // Return the number of rows in result set
    $count = mysqli_num_rows($resultat);
  }
  // }
} else {
  $requete = "SELECT * FROM loisir,type_pub  ORDER BY id_loisir DESC limit 10";
  // $result = mysqli_query($conn, $sql);
  if ($resultat = mysqli_query($conn, $requete)) {
    // Return the number of rows in result set
    $count = mysqli_num_rows($resultat);
  }
}