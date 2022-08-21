<?php
  include('connexiondb.php');

ini_set('display_errors', 'on');
ob_start();
     // Initialiser la session
  session_start(); 
  include('session.php');
  include('filter.php');
include('seemore.php');
  include('publication.php');
  //vérifier si l'utilisateur n'est pas connecté
   if(!isset($_SESSION["id_user"])){
     header("Location:inscr_conn.php");
     exit(); 
   }
  ///publication swiper
  $sql="SELECT*FROM `loisir` ORDER BY id_loisir DESC";
  $result = mysqli_query($conn, $sql); 
  //type publicité
  $sqltyppub="SELECT * FROM `type_pub`";
  $resulttyppub = mysqli_query($conn, $sqltyppub); 
    //type publicité filtre
    $sqlfiltre="SELECT * FROM `type_pub`";
    $resultfiltre = mysqli_query($conn, $sqlfiltre); 
  $lastid='';
?>
<!DOCTYPE html>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>welikefood</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
    <script src="swiper.js" defer></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1,maximum-scale=1"/>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
<script src="script/swiper.js"></script>
    <!-- ===== Fontawesome CDN Link ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
     <!-- Link seemore js -->
      <script src="script/seemore.js" defer></script>
      <!-- link filter js 
      <script src="script/filter.js"></script>-->
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
                                      <input required type="text" name="nom" class="form-control" id="description"/>
                                      <span class="error" id="description_err"> </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputEmail3" class="col-sm-2 col-form-label">Type publication</label>
                                    <div class="col-sm-10">
                                    <select name="id_typpub" class="form-control" id="description" required>
                                        <?php
                                        while($row=mysqli_fetch_assoc($resulttyppub)){
                                        ?>
                                          <option value="<?php echo $row['id_typpub'];?>"><?php echo $row['descr_typp'];?> </option>
                                        <?php 
                                          };
                                        ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                  <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                      <input  type="file" name="image" class="form-control" id="image">
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
                <li class="nav-item">
                  <a class="nav-link"  href="deconnexion.php">deconnecter</a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
    <!-- filtre -->
    <div class="bloc5">
      <form action="<?= $_SERVER['PHP_SELF'];?>" method="GET">
        <span class="text1">Filtre adulte: </span>
        <!-- redirection option
                          <select name="option" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">

            -->
        <select name="option" id="filterForm">
          <option value="" selected>--Select--</option>
          <option value="">Tout afficher</option>
          <?php
          while ($row = mysqli_fetch_assoc($resultfiltre)) {
          ?>
            <option value="<?php echo $row['id_typpub']; ?>"><?php echo $row['descr_typp']; ?></option>

          <?php
          };
          ?>
        </select>

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
	 

	 <div class="swiper mySwiper">
      <div class="swiper-wrapper">
      <?php
if(mysqli_num_rows($result)> 0){
  while($swiper=mysqli_fetch_assoc($result)){
  ?>

    <div class="swiper-slide">
      <img class="img_scroll" src="<?=$swiper['img_loisir']?>" width="40" height="40" alt="image">
      <div class="div_text_scroll"><span class="titr1"><?php echo $swiper['nom_loisir']; ?></span></div>
      
    </div>&nbsp;&nbsp;

    <?php    
  }
}
?>
      </div>

      <!-- les fleches -->
      <div class="swiper-button-next" style="height: 80px;width: 50px; color: black; background-color: white;font-weight: bold;margin-top: -40px;margin-right: 0;"></div>
      <div class="swiper-button-prev" style="height: 80px;width: 50px;color: black; background-color: white;font-weight: bold;margin-top: -40px;"></div>
      <!--<div class="swiper-pagination"></div>-->
    </div>
	 
	 

	 <!--galerie image-->

<div id="grand" style="display: flex;align-items: center;">

<?php
if(mysqli_num_rows($resultaff)> 0){
  while($row=mysqli_fetch_assoc($resultaff)){
    
  ?>
<div class="gallery">
  <a href="affichage.php?id=<?=$row['id_loisir']?>  ">

    <div class="contenant" >
    <div class="overlay" >
      <div class="space"> 300 x 250 - jpg<br> maximumwall.com </div>
    </div>
    <div class="overimage">
    <img class="img_plus" style="height: 40px;width: 40px;float: right;" src="images/img_plus.png">
    </div>
      <img class="test" style="height: 250px; width: 300px;" src="<?=$row['img_loisir']?>"/>
    </div>
  
  <div class="desc">
  <h4 style='color:blue'><?php echo $row['nom_loisir']; ?></h4>
      <h6 style='color:red'><?php echo $row['datepub']; ?></h6>
      <h6 style='color:green'><?php echo $row['id_loisir']; ?></h6>
      <h6 style='color:red'><?php echo $row['descr_typp']; ?></h6>
   </div>
  </div>
</a>
<?php 
  }
  ?>
  <br>
  <?php
}
?>
</div>
<div class="col-lg">
<button type="button" id="load_more" data-id="<?php echo $lastid; ?>" class="btn btn-primary">Voir plus</button>
</div>
<img src="<?=$data['img_user']?>">  
<h1>L'univers de <?=$data['nom_user']?></h1>
  <p>Bonne visite</p> 
<!--commentaire-->
<div class="commentaire" id="commentaire">
<a style="margin-top: 5px;" href="#">
	<img style="float: left;border: 0;
    height: 14px;
    margin: 0 5px -4px 0;
    width: 14px;
    display: inline;
    margin-top: 8px;
    " src="images/commentaire.jpg">
<div >commentaire</div>
</a>
</div>
<!--fin commentaire-->
	
<!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
    const filterForm = document.getElementById('filterForm');

    filterForm.addEventListener('change', filter)

    function filter(event) {
      event.preventDefault();
      console.log('form submit');
      this.form.submit();
    }
  </script>
</body>
</html>

<?php

?>