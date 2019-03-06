<?php
include "../koneksi.php";
session_start();
$locthpas=$_SESSION['loc']['lokasi'];

 $s = mysqli_query($conn, "DELETE FROM temp WHERE lokasi = '$locthpas'");
$sql = 'UPDATE antri SET sekarang=0 , total=0 where lokasi="'.$locthpas.'"';
$hapus = $conn->query($sql);
if($hapus)
	 echo "<script>
                location='../op_index.php';
            </script>";
else echo "gagal";
	
?>
