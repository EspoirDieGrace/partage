<?php
include('connexiondb.php');
$type=$_POST['type'];
$id_loisir=$_POST['id_loisir'];
if($type=='like'){
    $sqllike="update loisir set like_count=like_count+1 where id_loisir=$id_loisir";
}else{
    $sqllike="update loisir set dislike_count=dislike_count+1 where id_loisir=$id_loisir";
}
$reslike=mysqli_query($conn,$sqllike)
?>