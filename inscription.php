<?php
include('connexiondb.php');
//inscription
if(isset($_POST['inscription'])){
  $nom=addslashes($_POST['nom']);
  $prenom=addslashes($_POST['prenom']);
    $email=$_POST['email'];
    $password=$_POST['password'];
    $errors=array(); 
    
    //image
    $direction="profile/";
    @$repertoire=$direction.basename($_FILES['image']['name']);
    $uploadok=1;
    $imageType=strtolower(pathinfo($repertoire,PATHINFO_EXTENSION));

    ///rename image
@$rename=explode('.',$_FILES["image"]["name"]);
$newpicture=round(microtime(true)).'.'.end($rename);
$destination=$direction.$newpicture;


//doublon
$demail = "SELECT * FROM `utilisateur` WHERE email_user='$email'";
$remail = mysqli_query($conn,$demail);
// if(mysqli_num_rows($remail) == 0 && (move_uploaded_file($_FILES["image"]["tmp_name"],"" . $destination))){
//     $sql = "INSERT INTO `utilisateur`(nom_user,prenom_user,email_user,mdp_user,img_user)
//        VALUES('$nom', '$prenom', '$email','$password','$destination')";
// $requete = "SELECT count(*) FROM `utilisateur`";
// $exec_requete = mysqli_query($conn,$requete);
// $reponse      = mysqli_fetch_array($exec_requete);
// $count = $reponse['count(*)'];
// if($count!=0) // nom d'utilisateur et mot de passe correctes
// {
// $row['nom_user'] = $nom;
//  $row['prenom_user'] = $prenom;
//  }

//        if(mysqli_query($conn, $sql)){
//         echo "succes";
//       }else{
//         echo "error: ". $sql . "<br>" .mysqli_error($conn);
//       }
//       mysqli_close($conn);
//     header('location:acceuil.php');

// }else{
//   $errors['u']="l'email et le mot de passe existent déjà";
// }
if(mysqli_num_rows($remail)> 0){
  $errors['u']="l'email existe déjà";
}else{
  if(move_uploaded_file($_FILES["image"]["tmp_name"],"".$destination)){
    $sql = "INSERT INTO `utilisateur`(nom_user,prenom_user,email_user,mdp_user,img_user)
            VALUES('$nom', '$prenom', '$email','$password','$destination')";
     $requete = "SELECT count(*) FROM `utilisateur`";
     $exec_requete = mysqli_query($conn,$requete);
     $reponse      = mysqli_fetch_array($exec_requete);
     $count = $reponse['count(*)'];
     if($count!=0) // nom d'utilisateur et mot de passe correctes
     {
     $row['nom_user'] = $nom;
      $row['prenom_user'] = $prenom;
      }
    
            if(mysqli_query($conn, $sql)){
             echo "succes";
           }else{
             echo "error: ". $sql . "<br>" .mysqli_error($conn);
           }
           mysqli_close($conn);
         header('location:inscr_conn.php.php');
  }
}


}
?>