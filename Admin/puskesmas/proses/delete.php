<?php
include "../../koneksi.php";

$npm=$_POST['npm'];
$sql = 'delete from pukesmas where ID_pukesmas="'.$npm.'"';
$hapus = $conn->query($sql);
if($hapus)
	 echo "<script>
                alert('hapus  Data Berhasil');
                window.location.replace('../user_hapus_puskesmas.php');
            </script>";
else echo "gagal";
?>