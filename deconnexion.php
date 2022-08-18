<?php   
session_start();
if(session_destroy()){
    header("location:inscr_conn.php"); //to redirect back to "index.php" after logging out
}
?>
