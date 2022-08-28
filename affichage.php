<?php
ini_set('display_errors', 'on');
ob_start();
// Initialiser la session
session_start();
include('session.php');
include('seemore.php');
include('connexiondb.php');
include('publication.php');
include('commentaire.php');
include('likeDislike.php');
//session

//publicité affichage filtre
$id = $_GET['id'];
$requete = "SELECT * FROM loisir INNER JOIN type_pub WHERE loisir.id_loisir=$id";
$resultat = mysqli_query($conn, $requete);

///publication swiper
$sql = "SELECT * FROM loisir INNER JOIN type_pub ON loisir.id_typpub = type_pub.id_typpub ORDER BY id_loisir DESC";
$result = mysqli_query($conn, $sql);
//type publicité
$sqltyppub = "SELECT * FROM `type_pub`";
$resulttyppub = mysqli_query($conn, $sqltyppub);
//type publicité filtre
$sqlfiltre = "SELECT * FROM `type_pub`";
$resultfiltre = mysqli_query($conn, $sqlfiltre);
//list comment
$sqlCom = "SELECT * FROM comment INNER JOIN utilisateur ORDER BY id_comment DESC";
$resultCom = mysqli_query($conn, $sqlCom);
//id loisir
$idloisir = $_GET['id'];
$sqlloisir = "SELECT * FROM loisir INNER JOIN utilisateur ON loisir.id_user=utilisateur.id_user WHERE loisir.id_loisir=$idloisir";
$queryloisir = mysqli_query($conn, $sqlloisir);
$numberloisir = mysqli_num_rows($queryloisir);
$dataloisir = mysqli_fetch_assoc($queryloisir);
$lastid = '';
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>welikefood</title>
  <link rel="stylesheet" type="text/css" href="./css/index_base.css" />
  <link rel="stylesheet" href="css/affichage.css">
  <link rel="stylesheet" href="css/commentaire.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1,maximum-scale=1" />
  <!-- getbootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Link Swiper's CSS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script src="./script/swiper.js"></script>
  <link rel="stylesheet" href="css/swiper.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
   <!-- ===== Fontawesome CDN Link ===== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  
</head>

<body>
  <header>
    <div class="bloc1">
      <a href="#"><img src="./Img/logo/logo.jpg" class="imj1"></a>
      <div class="bloc2">
        <input class="para1" type="text" value="nourriture">
        <div class="bloc3">
          <i class="fa fa-search" id="imj2"></i>
          <i class="fa fa-camera" id="imj3"></i>
          <i class="fa fa-microphone" id="imj4"></i>
        </div>
      </div>
      <nav class="navi1">
        <li>
          <!-- Trigger the modal with a button -->
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Publier</button>
          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <div id="message"></div>
                </div>
                <div class="modal-body">
                  <form action="" id="myform" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <input required type="text" name="nom" class="form-control" id="description" />
                        <span class="error" id="description_err"> </span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Type publication</label>
                      <div class="col-sm-10">
                        <select name="id_typpub" class="form-control" id="description" required>
                          <?php
                          while ($row = mysqli_fetch_assoc($resulttyppub)) {
                          ?>
                            <option value="<?php echo $row['id_typpub']; ?>"><?php echo $row['id_typpub'], $row['descr_typp']; ?> </option>
                          <?php
                          };
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                      <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" id="image">
                        <span class="error" id="image_err"> </span>
                      </div>
                    </div>
                    <br>
                    <br>
                    <button id="validationbtn" type="submit" class="btn btn-success" name="inscription">Envoyer</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li><a class="lien2" href="#">Connexion</a></li>
        <li><i class="fa fa-bars" id="lien3"></i></li>
      </nav>
    </div>
    <div class="bloc4">
      <nav>
        <ul>
          <li>
            <a href="#">TOUT <p class="trait1"></p></a>
          </li>
          <li>
            <a class="lien4" href="#">IMAGES <p class="trait2"></p></a>
          </li>
          <li>
            <a href="#">VIÉDOS <p class="trait3"></p></a>
          </li>
          <li>
            <a href="#">CARTES<p class="trait4"></p></a>
          </li>
          <li>
            <a href="#">ACTUALITÉS <p class="trait5"></p></a>
          </li>
        </ul>
      </nav>
    </div>
    </div>
    <div class="bloc5">
      <form action="" method="GET">
        <span class="text1">Filtre
          <select name="id_typpub">
            <option disabled value="0" selected>--Select--</option>
            <?php
            while ($row = mysqli_fetch_assoc($resultfiltre)) {
            ?>
              <option disabled value="<?php echo $row['id_typpub']; ?>"> <?php echo $row['id_typpub']; ?> <?php echo $row['descr_typp']; ?> </option>
            <?php
            };
            ?>
          </select>
        </span>
      </form>
      <span class="text2">Titres de pages:<a class="lien6" href="#">Automatique<i class="fa fa-caret-down"></i></a></span>
      <li>
        <a class="lien7" href="#">Filtre <i class="fa fa-filter"></i></a>
      </li>
    </div>
    <div class="bloc6"></div>

  </header>
  <!--fin div de la 2eme ligne-->

  <!--trait de separation-->

  <div>
    <hr style="margin-bottom: 10px;margin-top: 1px;">
  </div>
<!-- swiper -->
<section class="carousel">
    <div class="swiper">
      <div class="swiper-wrapper">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($swiper = mysqli_fetch_assoc($result)) {
        ?>
            <div class="swiper-slide">
              <img class="img_scroll" src="<?= $swiper['img_loisir'] ?>" width="40" height="40" alt="image">
              <div class="div_text_scroll">
                <span class="titr1"> <strong><?php echo $swiper['nom_loisir']; ?></strong></span>
                <br>
                <span class="titr2"><?php echo $swiper['descr_typp']; ?></span>
              </div>
            </div>&nbsp;&nbsp;
        <?php
          }
        }
        ?>
      </div>
    </div>

    <div class="swiper-button-next" style="height: 80px;width: 50px; color: black; background-color: white;font-weight: bold;margin-top: -40px;margin-right: 0;"></div>
    <div class="swiper-button-prev" style="height: 80px;width: 50px;color: black; background-color: white;font-weight: bold;margin-top: -40px;"></div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper", {
  slidesPerView: 8,
  spaceBetween: 4,
  slidesPerGroup: 8,
  loop: true,
  loopFillGroupWithBlank: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
  </script>
  <?php
  if ($row = mysqli_fetch_assoc($resultat)) {
  ?>
    <div class="container">
      <h4 class="type" style="text-align: center;"><?php echo $row['descr_typp']; ?></h4>
      <div class="container" id="conteneura">
        <div class="row" id="rows">
          <div class="col-sm-6" id="picture">
            <img class="test" style="height: 250px; width: 300px;" src="<?php echo $row['img_loisir'] ?>" />
            <div class="likedislike">
              <!-- like -->
              <form action="" method="POST">
                <div class="post_info">
                  <!-- loisir -->
                  <input hidden type="text" value="<?php echo $idloisir ?>" name="loisir">
                  <!-- like -->
                  <input hidden type="text" value="like" name="likes">
                  <!-- bouton like -->
                  <input type="text" disabled value="<?php echo $countlike ?>" class="likes_counts">
                  <button type="submit" id="like" name="like"><i class="like fa fa-thumbs-up like-btn"></i></button>
                </div>
              </form>
              <!-- dislike -->
              <form action="" method="post">
                <div class="post_info">
                  <!-- loisir -->
                  <input hidden type="text" value="<?php echo $idloisir ?>" name="loisir">
                  <!-- dislike -->
                  <input hidden type="text" value="dislike" name="dislikes">
                  <!-- dislike -->
                  <button type="submit" id="dislike" name="dislike"><i class="fa fa-thumbs-down dislike-btn"></i></button>
                  <input type="text" disabled value="<?php echo $countdislike ?>" class="likes_count">
                </div>
              </form>
            </div>
          </div>
          <div class="col-sm-6" id="libelle">
            <h4 class="nom" id="nom"><?php echo $row['nom_loisir']; ?></h4>
            <h4 id="desc"><?php echo $row['desc_loisir']; ?></h4>
            <h6 id="day"><?php echo $row['datepub']; ?></h6>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <div class="commentaire">
    <div class="commentair">
    <form action="" method="post" class="form">
      <input type="text" name="comment" class="comment" placeholder="commentaire...">
      <input type="hidden" name="loisir" value="<?php echo $idloisir ?>" />
      <button type="submit" id="btncomment" name="commentaire"><i class="far fa-comment-dots" id="com"></i> </button>
    </form>
    </div>
  </div>
</body>

</html>

<?php

?>