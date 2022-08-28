<?php
include('connexiondb.php');
include('session.php');
$loisir=$_GET['id'];
$countlike='0';
$sqlcountlike="SELECT * FROM `t_like` WHERE statut_like='like' AND id_loisir=$loisir";  
$resulcountlike=mysqli_query($conn, $sqlcountlike);
$countlike=mysqli_num_rows($resulcountlike);
//like
if(isset($_POST['like']) ){
$user=$_SESSION["id_user"];
$loisir=$_POST["loisir"];
  $like=$_POST['likes'];
    $sqllike = "INSERT INTO `t_like`(statut_like,id_loisir,id_user)
            VALUES('$like','$loisir','$user')";
             if(mysqli_query($conn, $sqllike)){
              echo "ok ";
             }else{
               echo "error: ". $sql . "<br>" .mysqli_error($conn), $loisir;
            }
//mysqli_close($conn);
        // header('location:affichage.php');
}
//dislike
$countdislike='0';
    $sqlcountdislike="SELECT * FROM `t_like` WHERE statut_like='dislike' AND id_loisir=$loisir";  
    $resulcountdislike=mysqli_query($conn, $sqlcountdislike);
    $countdislike=mysqli_num_rows($resulcountdislike);
if(isset($_POST['dislike'])){
    $user=$_SESSION["id_user"];
    $loisir=$_POST["loisir"];
      $like=$_POST['dislikes'];
        $sqllike = "INSERT INTO `t_like`(statut_like,id_loisir,id_user)
                VALUES('$like','$loisir','$user')";
                 if(mysqli_query($conn, $sqllike)){
                  echo "ok ";
                 }else{
                   echo "error: ". $sql . "<br>" .mysqli_error($conn), $loisir;
                }
                --$countlike;
    //mysqli_close($conn);
            // header('location:affichage.php');
    }


    ///
    //$doubleloisir=" SELECT * FROM t_like INNER JOIN loisir ";
?>