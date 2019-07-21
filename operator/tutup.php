<?php 
include "../koneksi.php";
session_start();
$locthpas=$_SESSION['loc']['lokasi'];

// $s = mysqli_query($conn, "DELETE FROM temp WHERE lokasi  =' $locthpas' "); 
// echo "<script>location='../op_index.php';</script>";


$sql_antri = mysqli_query($conn, "select sekarang, total from antri where lokasi ='$locthpas' ");
	$row = mysqli_fetch_array($sql_antri);
	$now = $row[0];
	$total = $row[1];
	
  $sql_date = mysqli_query($conn, "SELECT tgl FROM temp where lokasi = '$locthpas' ");
	$row = mysqli_fetch_array($sql_date);
	$date = $row[0];
  
  $sql_del = mysqli_query($conn, "DELETE FROM temp WHERE no_antrian<='$now' AND lokasi = '$locthpas'");
  
	$sql = mysqli_query($conn, "SELECT id_user_temp, no_antrian FROM temp WHERE lokasi = '$locthpas' ");
	$count = mysqli_num_rows($sql);
	if($count>0){
		while ($row = mysqli_fetch_array($sql)){
			$new = $row[1]-$now;
			mysqli_query($conn, "UPDATE temp SET no_antrian='$new' WHERE id_user_temp='$row[0]'");
		}
	}
	
  $today = date('d-m-y');
  if ($date!=$today){
	if($count>0){
		while ($row = mysqli_fetch_array($sql)){
			mysqli_query($conn, "UPDATE temp SET tgl='$today' WHERE id_user_temp='$row[0]'");
		}
	}
}

  $total = $total - $now ;
$sql_reset = mysqli_query($conn, "UPDATE antri SET sekarang=0, total='$total' where lokasi = '$locthpas'");
if($sql_reset){
	echo "<script>location='../op_index.php';</script>";
}

?>