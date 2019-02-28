<?php 
include "../koneksi.php";
session_start();
$locthpas=$_SESSION['loc']['lokasi'];
echo $locthpas ;

// $s = mysqli_query($conn, "DELETE FROM temp WHERE lokasi  =' $locthpas' "); 
// echo "<script>location='../op_index.php';</script>";



$npm=$_SESSION['loc']['lokasi'];
$sql = 'delete from temp where lokasi="'.$npm.'"';
$hapus = $conn->query($sql);
if($hapus)
	 echo "<script>
                alert('berhasil Menutup ');
                location='../op_index.php';
            </script>";
else echo "gagal";

?>