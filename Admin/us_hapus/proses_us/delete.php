<?php
include "../../koneksi.php";

$npm=$_POST['npm'];
$sql = 'delete from pasien where ID_pasien="'.$npm.'"';
$hapus = $conn->query($sql);
if($hapus)
	 echo "<script>
                alert('hapus  Data Berhasil');
                window.location.replace('../../us_hapus/hapus_ps.php');
            </script>";
else echo "gagal";
?>