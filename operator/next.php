<?php 

/*$nexta = $now+1;
$sql_op = mysqli_query($conn, "SELECT no_antrian, status_temp, pin_temp  FROM temp WHERE lokasi = '$lokasiberobat' AND no_antrian='$nexta'  ");


	$sql_antri = mysqli_query($conn, "select  total, sekarang from antri where lokasi = '$lokasiberobat'  ");
	$row = mysqli_fetch_array($sql_antri);
	$total = $row[0];
	$skrg = $row[1];
	$_SESSION["loc"]["total"]=$total;

	$list_op = mysqli_fetch_array($sql_op);
	$nx_antri = $list_op[0];
	$nx_status = $list_op[1];
	$nx_pin = $list_op[2];
	 $_SESSION["nx"]["no_antrian"] =  $nx_antri;
	 $_SESSION["nx"]["status_temp"] = $nx_status;
	 $_SESSION["nx"]["pin_temp"] = $nx_pin;
	//$pin=( $_SESSION["nx"]["pin_temp"]);
	//$qq= $_SESSION["nx"]["status_temp"] ;
	//$tot=$_SESSION["loc"]["total"];*/
	$sql_op = mysqli_query($conn, "select  total, sekarang from antri where lokasi = '$lokasiberobat'  ");
	$col = mysqli_fetch_array($sql_op);
	$total = $col[0];
	$now = $col[1];
	$loop = 1;
	
	//cek apakah masih ada data antri yang offline
	$sql_stat = mysqli_query($conn, "SELECT status_temp FROM temp WHERE status_temp=1 AND lokasi = '$lokasiberobat' AND no_antrian>$now ORDER BY no_antrian ASC ");
	$count_stat = mysqli_num_rows($sql_stat);
	
	$sql_antri = mysqli_query($conn, "SELECT no_antrian, status_temp, pin_temp  FROM temp WHERE lokasi = '$lokasiberobat' AND no_antrian>$now ORDER BY no_antrian ASC ");
	$count = mysqli_num_rows($sql_antri);
	
	if($count_stat>0){
	if($count>0){
		while ($row = mysqli_fetch_assoc($sql_antri)){
			if($row['status_temp']==2){
				if($total-$now>=$loop){
					$now++;
					$total++;
					$s = mysqli_query($conn, "UPDATE temp SET no_antrian  = $total where pin_temp  =  '".$row['pin_temp']."'");
					$loop++;
				}else{
					break;
				}
			}else{
				$now++;
				$sql_pass = mysqli_query($conn, "UPDATE temp SET status_temp=0 WHERE no_antrian='$now' ");
				break;
			}
		}
		$s = mysqli_query($conn, "UPDATE antri SET sekarang=$now , total = $total where lokasi =  '$lokasiberobat'");
	}
	}
	 //header("refresh: 0;");
 ?>