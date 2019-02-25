<?php
include "../../koneksi.php";

$npm=$_POST['npm'];
$sql = 'delete from dokter where ID_dk="'.$npm.'"';
$hapus = $conn->query($sql);
if($hapus)
	 echo "<script>
                alert('hapus  Data Berhasil');
                window.location.replace('../../index.php');
            </script>";
else echo "gagal";
?>