<?php
include "../koneksi.php";
session_start();
$locthpas=$_SESSION['loc']['lokasi'];

  $sql_antri = mysqli_query($conn, "select sekarang from antri where lokasi ='$locthpas' ");
	$row = mysqli_fetch_array($sql_antri);
	$now = $row[0];
  $sql_date = mysqli_query($conn, "SELECT tgl FROM temp where lokasi = '$locthpas' ");
	$row = mysqli_fetch_array($sql_date);
	$date = $row[0];

  $s = mysqli_query($conn, "DELETE FROM temp WHERE lokasi =' $locthpas' AND no_antrian <= $now ");
	$sql = mysqli_query($conn, "SELECT * FROM temp where lokasi =' $locthpas' ");
	$count = mysqli_num_rows($sql);
	if($count>0){
		while ($row = mysqli_fetch_assoc($sql)){
			$new = $row['no_antrian']-$now;
			mysqli_query($conn, "UPDATE temp SET no_antrian='$new' WHERE id_user_temp='".$row['id_user_temp']."'");
		}
	}
	
  $today = date('d-m-y');
  if ($date!=$today){
	if($count>0){
		while ($row = mysqli_fetch_assoc($sql)){
			mysqli_query($conn, "UPDATE temp SET tgl='$today' WHERE id_user_temp='".$row['id_user_temp']."'");
		}
	}
}

$sql_reset = mysqli_query($conn, "UPDATE antri SET sekarang='0' where lokasi = '$locthpas'");
if($sql_reset){
	echo "<script>location='../op_index.php';</script>";
}
	
?>
