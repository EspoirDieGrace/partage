<?php
include('connexiondb.php');
//inscription
if(isset($_POST['commentaire'])){
$user=$_SESSION["id_user"];
$loisir=$_POST["loisir"];
  $comment=addslashes($_POST['comment']);
    $sql = "INSERT INTO `comment`(text_comment,date_comment,id_loisir,id_user)
            VALUES('$comment',NOW(),'$loisir','$user')";
             if(mysqli_query($conn, $sql)){
              echo " ";
             }else{
               echo "error: ". $sql . "<br>" .mysqli_error($conn), $loisir;
            }
           //mysqli_close($conn);
        // header('location:affichage.php');
  }

?>