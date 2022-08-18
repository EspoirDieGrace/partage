<?php
include('connexiondb.php');
//inscription
if(isset($_POST['commentaire'])){
$loisir='1';
$abonne='2';
  $comment=addslashes($_POST['comment']);
    $sql = "INSERT INTO `comment`(text_comment,date_comment,id_loisir,id_abonne)
            VALUES('$comment',NOW(),'$loisir','$abonne')";
        //     if(mysqli_query($conn, $sql)){
        //      echo "succes";
        //    }else{
        //      echo "error: ". $sql . "<br>" .mysqli_error($conn);
        //    }
           //mysqli_close($conn);
        // header('location:affichage.php');
  }

?>