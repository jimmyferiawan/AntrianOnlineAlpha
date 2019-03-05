<?php 

$nexta = $now+1;
$sql_op = mysqli_query($conn, "SELECT no_antrian, status_temp, pin_temp  FROM temp WHERE lokasi = '$lokasiberobat' AND no_antrian='$nexta'  ");


$sql_antri = mysqli_query($conn, "select  total from antri where lokasi = '$lokasiberobat'  ");
	$row = mysqli_fetch_array($sql_antri);
	$total = $row[0];
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
	//$tot=$_SESSION["loc"]["total"];
	$hsl=$total+1;
	$skrg =$now+1;
	$loop = 1;
	$sql_antri = mysqli_query($conn, "SELECT no_antrian, status_temp, pin_temp  FROM temp WHERE lokasi = '$lokasiberobat' AND no_antrian>$now ORDER BY no_antrian ASC ");
	$count = mysqli_num_rows($sql_antri);
	if($count>0){
		while ($row = mysqli_fetch_assoc($sql_antri)){
			if($row['status_temp']==2){
				if($total-$now>$loop){
					$s = mysqli_query($conn, "UPDATE temp SET no_antrian  = $hsl where pin_temp  =  '".$row['pin_temp']."'");
					$s = mysqli_query($conn, "UPDATE antri SET total = $hsl, sekarang=$skrg where lokasi =  '$lokasiberobat'");
					$skrg++;
					$hsl++;
					$loop++;
				}else{
					break;
				}
			}else{
				$now= $now + 1;
				$s = mysqli_query($conn, "UPDATE antri SET sekarang = $now where lokasi =  '$lokasiberobat'");
				break;
			}
		}
	}
	
	





 ?>