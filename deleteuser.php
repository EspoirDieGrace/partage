<?php
/* confirmer */
if(isset($_POST["deletesend"])){
 $unique=$_Post['deletesend'];
 $sqluser = "SELECT * FROM `utilisateur` where id_user=$unique";
$resultuser = mysqli_query($conn, $sqluser);
}
?>