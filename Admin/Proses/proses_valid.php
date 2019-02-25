<?php
include "../koneksi.php";

$npm=$_POST['npm'];
$sql = 'Update oprator SET status_op =1 where ID_op="'.$npm.'"';
$hapus = $conn->query($sql);
if($hapus)
	 echo "<script>
                alert('Upgrade Tingkat Berhasil');
                window.location.replace('../index.php');
            </script>";
else echo "gagal";
?>