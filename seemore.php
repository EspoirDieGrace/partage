<?php
if (!empty($_POST["id_loisir"])) {
  include('connexiondb.php');
  $requete = "SELECT * FROM `loisir` WHERE id_loisir < '" . $_POST["id_loisir"] . "' ORDER BY id_loisir DESC LIMIT 10";
  $resultat = mysqli_query($conn, $requete);
  if (mysqli_num_rows($resultat) > 0) {
    while ($row = mysqli_fetch_assoc($resultat)) {
      $lastid = $row["id_loisir"];
?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="index_base.css" />
        <title>Document</title>
      </head>
      <body>
      <div class="gallery">
          <a href="affichage.php?id=<?= $row['id_loisir'] ?>  ">
            <div class="conteneur">
              <img class="test" style="height: 250px; width: 354px;" src="<?= $row['img_loisir'] ?>" />
              <div class="overlay">300 x 250 - jpg<br> maximumwall.com</div>
              <div class="overimage"> <img class="img_plus" style="height: 40px;width: 40px;float: right;" src="images/img_plus.png"></div>
            </div>
            <div class="desc">
              <h4><?php echo $row['nom_loisir']; ?></h4>
              <h6><?php echo $row['datepub']; ?></h6>
            </div>
          </a>
        </div>
        <?php
        $lastid = $row['id_loisir'];

      ?>
    <?php
    }
  }
    ?>
  <?php
}
  ?>
      </body>
      </html>