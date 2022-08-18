<?php
// connect to the database
ini_set('display_errors', 'on');
ob_start();
// Initialiser la session

include('session.php');
include('connexiondb.php');
$user = $_SESSION["id_user"];
if (isset($_POST['liked'])) {
  $id_loisir = $_POST['id_loisir'];
  echo $id_loisir;
  $sql= "SELECT * FROM `loisir` WHERE loisir.id_loisir=$id_loisir";
  $result = mysqli_query(
  $conn,
  $sql
);
  $row = mysqli_fetch_array($result);
  $n = $row['likes'];

  mysqli_query($conn, "INSERT INTO t_like (id_user, id_loisir) VALUES ($user, $id_loisir)");
  mysqli_query($conn, "UPDATE loisir SET likes=$n+1 WHERE id_loisir=$id_loisir");
  echo $n + 1;
  exit();
}
if (isset($_POST['unliked'])) {
  $id_loisir = $_POST['id_loisir'];
  $sql= "SELECT * FROM loisir WHERE loisir.id_loisir=$id_loisir";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $n = $row['likes'];

  mysqli_query($conn, "DELETE FROM t_like WHERE id_loisir=$id_loisir AND id_user=$user");
  mysqli_query($conn, "UPDATE loisir SET likes=$n-1 WHERE id_loisir=$id_loisir");

  echo $n - 1;
  exit();
}

// Retrieve posts from the database
//$posts = mysqli_query($conn, "SELECT * FROM loisir");
 
?>