<?php
include "koneksi.php";

$npm=$_POST['npm'];
$sql = 'delete from tbmhs where NPM="'.$npm.'"';
$hapus = $conn->query($sql);
if($hapus)echo "terhapus";
else echo "gagal";
?>