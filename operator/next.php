<?php 

	$sql_op = mysqli_query($conn, "select  total, sekarang from antri where lokasi = '$lokasiberobat'  ");
	$col = mysqli_fetch_array($sql_op);
	$total = $col[0];
	$now = $col[1];
	$loop = 1;
	
	//cek apakah masih ada data antri yang offline
	$sql_stat = mysqli_query($conn, "SELECT status_temp FROM temp WHERE status_temp=1 AND lokasi = '$lokasiberobat' AND no_antrian>$now ORDER BY no_antrian ASC ");
	$count_stat = mysqli_num_rows($sql_stat);
	
	$sql_antri = mysqli_query($conn, "SELECT no_antrian, status_temp, pin_temp, siklus_temp  FROM temp WHERE lokasi = '$lokasiberobat' AND no_antrian>$now ORDER BY no_antrian ASC ");
	$count = mysqli_num_rows($sql_antri);

	if($count_stat>0){
	if($count>0){
		while ($row = mysqli_fetch_assoc($sql_antri)){
			if($row['status_temp']==2){
				if($total-$now>=$loop){
					$now++;
					if($row['siklus_temp']<2){
						$siklus = $row['siklus_temp']+1;
						$u = mysqli_query($conn, "UPDATE temp SET siklus_temp='$siklus' WHERE pin_temp= '".$row['pin_temp']."' ");
						$total++;
						$s = mysqli_query($conn, "UPDATE temp SET no_antrian  = $total where pin_temp  =  '".$row['pin_temp']."'");
					}else{
						$u = mysqli_query($conn, "DELETE FROM temp WHERE pin_temp= '".$row['pin_temp']."' ");
					}
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
	 
 ?>