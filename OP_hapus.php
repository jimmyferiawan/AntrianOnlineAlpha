<?php
include "koneksi.php";

    $ID_op = $_POST['ID_op'];
    $sql = mysqli_query($conn, "DELETE FROM oprator WHERE ID_op='$ID_op'");
    if($sql == true){
        header("Location: OP_akun.php");
        die();
    }
    
?>
