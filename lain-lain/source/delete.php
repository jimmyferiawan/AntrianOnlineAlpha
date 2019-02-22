<?php
include "../../koneksi.php";

$npm=$_POST['ID_pukesma'];
$sql = 'delete from tbmhs where NPM="'.$npm.'"';
$hapus = $conn->query($sql);
if($hapus)echo "terhapus";
else echo "gagal";
?>