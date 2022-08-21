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
$sql = "SELECT*FROM `loisir` ORDER BY id_loisir DESC";
$result = mysqli_query($conn, $sql);
//type publicité
$sqltyppub = "SELECT * FROM `type_pub`";
$resulttyppub = mysqli_query($conn, $sqltyppub);
//type publicité filtre
$sqlfiltre = "SELECT * FROM `type_pub`";
$resultfiltre = mysqli_query($conn, $sqlfiltre);
//list comment
$sqlCom= "SELECT * FROM comment INNER JOIN utilisateur ORDER BY id_comment DESC";
$resultCom= mysqli_query($conn, $sqlCom);
//id loisir
$idloisir=$_GET['id'];
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
  <link rel="stylesheet" type="text/css" href="index.css" />
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <!-- ===== Fontawesome CDN Link ===== -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <!-- Link seemore js -->
  <script src="script/seemore.js" defer></script>
  <!-- like dislike js 
  <script src="script/like_dislike.js"></script>-->
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
        <span class="text1">Filtre adulte:
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
    </div>
    <div class="bloc6"></div>

  </header>
  <!--fin div de la 2eme ligne-->

  <!--trait de separation-->

  <div>
    <hr style="margin-bottom: 10px;margin-top: 1px;">
  </div>
  <?php
  if ($row = mysqli_fetch_assoc($resultat)) {
  ?>
    <div class="container">
    <h4 style="text-align: center;"><?php echo $row['descr_typp']; ?></h4>
    <div class="container" id="conteneura">
      <div class="row" id="rows">
        <div class="col-sm-6" id="picture">
          <img class="test" style="height: 250px; width: 300px;" src="<?php echo $row['img_loisir'] ?>" />
          <!-- like -->
          <?php
          $user = $_SESSION["id_user"];
          // determine if user has already liked this post
          $results = mysqli_query($conn, "SELECT * FROM t_like WHERE id_user='$user' AND id_loisir=" . $row['id_loisir'] . "");
             if (mysqli_num_rows($results) == 1) : ?>
            <form action="like_dislike.php" method="post">
            <div class="post_info">
              <!-- si la publication est déjà liked -->
              <i class="unlike fa fa-thumbs-up like-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>
              <i class="like hide fa fa-thumbs-o-up like-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>
              <?php else : ?>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <!-- si la publication est déjà disliked -->
              <i class="like fa fa-thumbs-up like-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>
              <i class="unlike hide fa fa-thumbs-o-up like-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>
             <?php endif ;?>
             <input type="text" disabled value="  " class="likes_counts">
                
            <?php
            if (mysqli_num_rows($results) == 1) : ?>
              <!-- dislike -->
              <button type="submit" id="dislike" onclick="clickMe()">
              <i class="undislike fa fa-thumbs-down dislike-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>
              <i class="dislike hide fa fa-thumbs-o-down dislike-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>
              </button>
              <?php else : ?>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <!-- dislike -->
              <button type="submit" id="dislike" onclick="clickMe()">
              <i class="dislike fa fa-thumbs-down dislike-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>
              <i class="undislike hide fa fa-thumbs-o-down dislike-btn" data-id="<?php echo $row['id_loisir']; ?>"></i>            
              </button>
              <?php endif ;?>
            <input type="text" disabled value=" " class="likes_count">
            </div>  
            </form>
        </div>
        <div class="col-sm-6" id="libelle">
          <h4 id="nom"><?php echo $row['nom_loisir']; ?></h4>
          <h4 id="desc">Le lorem ipsum est, en imprimerie, une suite de mots sans signification
            <br> utilisée à titre provisoire pour calibrer une mise en page,
            <br> le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée.
            <br> Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum.
          </h4>
          <h6 id="day"><?php echo $row['datepub']; ?></h6>
        </div>
      </div>

    <form action="" method="post" class="form">
      <input type="text" name="comment" class="comment" placeholder="commentaire...">
      <input type="hidden" name="loisir" value="<?php echo $idloisir ?>" />
      <button type="submit" id="btncomment" name="commentaire"><i class="far fa-comment-dots" id="com"></i> </button>
    </form>


  <?php
//if(mysqli_num_rows($resultCom)> 0){
 // while($com=mysqli_fetch_assoc($resultCom)){
?>
<!-- 
    <div class="listComm" style="border: 2px rgb(0, 153, 255) solid;">
      <h2 style="color: green;"><?php echo $com['text_comment']; ?></h2>
      <h2 style="color:blue ;"><?php echo $com['date_comment']; ?></h2>
      <h2 style="color:red ;">commentateur <?php echo $com['id_user']; ?></h2>
      <h2 style="color:blue ;">commentateur <?= $com['nom_user'] ?></h2>
      <h2 style="color:yellow ;">publicateur <?= $dataloisir['nom_user']; ?></h2>
    </div>-->
<?php    
  //}
//}
?> 

    </div>
    </div>
  <?php
  }
  ?>
  <h1>L'univers de <?= $data['nom_user'] ?></h1>
  <p>Bonne visite</p>
  <p><?php echo $user ?></p>
</body>

</html>

<?php

?>