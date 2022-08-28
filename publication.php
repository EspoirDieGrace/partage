<?php
include('session.php');
include('connexiondb.php');
if(isset($_POST['inscription'])){
  $nom=$_POST['nom'];
  $id_typpub=$_POST['id_typpub'];
  $user=$_SESSION["id_user"];
  //image
  $direction="uploads/";
  $repertoire=$direction.basename($_FILES['image']['name']);
  $uploadok=1;
  $imageType=strtolower(pathinfo($repertoire,PATHINFO_EXTENSION));

  if(@$check !== false) {
    //echo "image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "picture fake.";
    $uploadOk = 0;
  }
///rename image
$rename=explode('.',$_FILES["image"]["name"]);
$newpicture=round(microtime(true)).'.'.end($rename);
$destination=$direction.$newpicture;

if($uploadOk == 0){
  echo"image not saved";

}else{
  if(move_uploaded_file($_FILES["image"]["tmp_name"],"" . $destination)) {
      
      $sql = "INSERT INTO `loisir`(id_user,id_typpub,nom_loisir, img_loisir, datepub,likes,dislikes)
       VALUES('$user','$id_typpub','$nom', '$destination', NOW(),'0','0')";

  }
  if(mysqli_query($conn, $sql)){
    echo "succes";
  }else{
    echo "error: ". $sql . "<br>" .mysqli_error($conn);
  }
  mysqli_close($conn);
}
header('location:index.php');
}
?>
