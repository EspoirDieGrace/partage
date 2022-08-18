<?php
if (!empty($_POST["id_loisir"])) {
  include('connexiondb.php');
  $requete = "SELECT * FROM `loisir` WHERE id_loisir < '" . $_POST["id_loisir"] . "' ORDER BY id_loisir DESC LIMIT 10";
  $resultat = mysqli_query($conn, $requete);
  if (mysqli_num_rows($resultat) > 0) {
    while ($row = mysqli_fetch_assoc($resultat)) {
      $lastid = $row["id_loisir"];
?>
      <div class="gallery">
        <a target="_blank" href="#">
          <div class="contenant">
            <div class="overlay">
              <div class="space"> 300 x 250 - jpg<br> maximumwall.com </div>
            </div>
            <div class="overimage">
              <img class="img_plus" style="height: 40px;width: 40px;float: right;" src="images/img_plus.png">
            </div>
            <img class="test" style="height: 250px; width: 300px;" src="<?= $row['img_loisir'] ?>" />
          </div>
        </a>
        <div class="desc">
          <h4 style='color:blue'><?php echo $row['nom_loisir']; ?></h4>
          <h6 style='color:red'><?php echo $row['datepub']; ?></h6>
        </div>
      </div>


  <?php  }
  }  ?>

<?php
}
?>