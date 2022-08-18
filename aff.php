<?php
ob_start();
session_start();
//Vérrification de connection
include('connexiondb.php');
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href=".css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/style11.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<header>
    <h2><a href="index.php" class="logo">Story-book</a></h2>
    <div class="navigation">
      <a href="lire.php"> A propos</a>
      <a href="index2.php">Publier</a>
    </div>
  </header>


    <?php

    $juju = $_GET["ide"];
    $sql = "SELECT * FROM type_pub WHERE id_typpub=$juju";
    echo $juju;
    $result = mysqli_query($conn, $sql);
    $nombre = mysqli_num_rows($result);
    echo $nombre;
    if ($nombre > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            // code pour afficher l'image associée au id choisit 
            $idname = ($row['id_loisir']);
            $check = "SELECT * FROM loisir WHERE id = '$idname'";
            $resultn = mysqli_query($conn, $check);
            $rowt = mysqli_fetch_assoc($resultn);


    ?>


<div class="desc">
  <h4 style='color:blue'><?php echo $row['nom_loisir']; ?></h4>
      <h6 style='color:red'><?php echo $row['datepub']; ?></h6>
      <h6 style='color:green'><?php echo $row['id_loisir']; ?></h6>
      <h6 style='color:red'><?php echo $row['descr_typp']; ?></h6>
    </div>
    <?php
        }
    } else {

        echo "Pas de publication: " . $sql . "<br>" . mysqli_error($conn);
        }
        ?>