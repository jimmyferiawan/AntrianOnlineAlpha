<?php 
include '../koneksi.php';

$num1='0';
$num2='0';
$num3='0';
$num4='0';
$num5='0';
$num6='0';
$num7='0';
$num8='0';
$num9='0';
$num11='0';
$num12='0';
$num13='0';

$ambil1=$conn->query("SELECT * FROM pasien  ");
$ambil2=$conn->query("SELECT * FROM dokter  ");
$ambil3=$conn->query("SELECT * FROM oprator  ");
$ambil4=$conn->query("SELECT * FROM pukesmas  ");
$ambil5=$conn->query("SELECT * FROM dokterumum  ");
$ambil6=$conn->query("SELECT * FROM klinik  ");
$ambil7=$conn->query("SELECT * FROM rumahsakit  ");
$ambil8=$conn->query("SELECT * FROM oprator where status_op =2  ");
$ambil9=$conn->query("SELECT * FROM oprator where status_op =1  ");
$ambil11=$conn->query("SELECT * FROM temp  ");
$ambil12=$conn->query("SELECT * FROM tempbesok  ");
$ambil13=$conn->query("SELECT * FROM foto_lokasi  ");


	  WHILE ($unit1 =$ambil1->fetch_assoc()){ 

  	 $num1++; }
  	 WHILE ($unit2 =$ambil2->fetch_assoc()){ 
  	 $num2++; }
  	 WHILE ($unit3 =$ambil3->fetch_assoc()){ 

  	 $num3++; }
  	 WHILE ($unit4 =$ambil4->fetch_assoc()){ 

  	 $num4++; }
  	 WHILE ($unit5 =$ambil5->fetch_assoc()){ 

  	 $num5++; }
  	 WHILE ($unit6 =$ambil6->fetch_assoc()){ 

  	 $num6++; }
  	 WHILE ($unit7 =$ambil7->fetch_assoc()){ 

  	 $num7++; }

     WHILE ($unit8 =$ambil8->fetch_assoc()){ 

     $num8++; } 
     WHILE ($unit9 =$ambil9->fetch_assoc()){ 

     $num9++; }
     WHILE ($unit11 =$ambil11->fetch_assoc()){ 

     $num11++; }
      WHILE ($unit12 =$ambil12->fetch_assoc()){ 

     $num12++; }
      WHILE ($unit13 =$ambil13->fetch_assoc()){ 

     $num13++; }



$_SESSION['ct_pasien'] =  $num1;
$_SESSION['ct_dokter'] =  $num2;
$_SESSION['ct_oprator'] =  $num3;
$_SESSION['ct_pukesmas'] =  $num4;
$_SESSION['ct_dokterumum'] =  $num5;
$_SESSION['ct_klinik'] =  $num6;
$_SESSION['ct_rumahsakit'] =  $num7;
$_SESSION['ct_op_not'] =  $num8;
$_SESSION['ct_op_yes'] =  $num9;
$_SESSION['ct_not_temp'] =  $num11;
$_SESSION['ct_not_tempbsk'] = $num12;
$_SESSION['ct_temp'] = $num13;


$num10= $num4+$num5+$num6+$num7;
$_SESSION['ct_cp_total'] =  $num10;


 ?>

			
				
			