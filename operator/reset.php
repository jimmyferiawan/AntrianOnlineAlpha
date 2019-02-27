<?php
include "../koneksi.php";

  $sql_antri = mysqli_query($conn, "select now from antri");
	$row = mysqli_fetch_array($sql_antri);
	$now = $row[0];
  $sql_date = mysqli_query($conn, "SELECT tgl FROM temp");
	$row = mysqli_fetch_array($sql_date);
	$date = $row[0];

  $s = mysqli_query($conn, "DELETE FROM temp WHERE no_antrian <= $now");
	$sql = mysqli_query($conn, "SELECT * FROM temp ");
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

$sql_reset = mysqli_query($conn, "UPDATE antri SET now='0'");
if($sql_reset){
	echo "<script>location='../op_index.php';</script>";
}
	
?>
