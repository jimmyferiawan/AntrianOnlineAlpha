<!DOCTYPE html>
<html>
<?php session_unset(); ?>
<?php session_start() ?>
<?php include 'operator/rdmpin.php'; ?>
<?php if (!isset( $_SESSION["id"]["id_op"])) 
 {
echo "<script> alret('LOGIN FIRST');</script>";
echo "<script> location='login_AD.php';</script>";
header('location:login_AD.php');
exit();
 } ?>
<head>
	<meta http-equiv="refresh" content="60" > 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="framework/css/bootstrap.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style type="text/css">
	form .form-horizontal .form-group label .control-label {
    	display: inline-block;
    	max-width: 100%;
    	margin-bottom: 5px;
    	font-weight: bold;
    	text-align: left;
	}

	.jumbotron {
    	padding-top: 30px;
    	padding-bottom: 30px;
    	margin-bottom: 30px;
    	color: inherit;
    	background-color: white;
    	border-radius: 0px;
    	border: dashed 4px #36d7b7;

	}

	.btn-primary {
            color: #fff;
            background-color: #36d7b7;
            box-shadow: 1px 1px 7px -2px;
    }

    .btn-primary:hover {
            color: #fff;
            background-color: #36d7b7;
    }

    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
            color: #36d7b7;
            background-color: white;
    }

    .navbar-default .navbar-nav>.active>a{
    
    }

    .navbar-default .navbar-nav li:hover::after {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    margin-left: -0.5px;
    bottom: -2px;
    top: 52px;
    left: 60%;
    box-sizing: border-box;
    
    border: 5px solid black;
    border-color: transparent transparent #fff #fff;
    
    transform-origin: 0 0;
    transform: rotate(-225deg);
    
    box-shadow: -3px 3px 3px 0 rgba(0, 0, 0, 0.4);

    color: #36d7b7;
    }

    .navbar-default .navbar-nav li>a:hover {
    	display: hidden;
            color: #36d7b7;  
    }

   @font-face {
         font-family: "Roboto Thin";
         src: url('framework/fonts/Roboto-Thin.ttf');
         }

	.form-control:focus {
	            -webkit-border-image: -webkit-linear-gradient(top left, #79F1A4, #0E5CAD);
	            -o-border-image: -o-linear-gradient(top left, #79F1A4, #0E5CAD);
	            border-image: linear-gradient(to bottom right, #79F1A4, #0E5CAD);
	        border-image-slice: 1;
			border-image-width: 2px;
			border-radius: 8px;	
	    }

	.form-control {
		border-radius: 2px;
	}

</style>
</head>
<body>
<?php
// sesion tempat diambil dari oprator (lokasi)
 $lokasiberobat = $_SESSION["loc"]["lokasi"];
// end
  include "koneksi.php";
  $sql_temp = mysqli_query($conn, "select * from temp where lokasi  = '$lokasiberobat' ");
  
  $sql_antri = mysqli_query($conn, "select sekarang, total from antri where lokasi = '$lokasiberobat'  ");
	$row = mysqli_fetch_array($sql_antri);
	$now = $row[0];
	$total = $row[1];
	$_SESSION["loc"]["sekarang"]=$now;
  
  $nama = "";
	$no_antrian ="";
	$tgl = "";
	$jam = "";
	$lokasi = "";
  
  if(isset($_POST["validasi"])){
	  $pin = $_REQUEST["pin"];
	  $sql_pin = mysqli_query($conn, "SELECT p.nama_pasien, t.id_user_temp, t.no_antrian, t.jam_ambil_antrian, t.tgl, t.lokasi FROM pasien AS p INNER JOIN temp AS t WHERE t.pin_temp='$pin' AND t.id_user_temp=p.ID_pasien");
	  $row = mysqli_fetch_array($sql_pin);
	  $nama = $row[0];
	  $no_antrian =$row[1];
	  $tgl = $row[2];
	  $jam = $row[3];
	  $lokasi = $row[4];
  }
  
  if(isset($_POST["next"])){
	  if ($now<$total){
		$now = 1 + $now;
		$s = mysqli_query($conn, "UPDATE antri SET sekarang = $now where lokasi =  '$lokasiberobat'");
	  }
  }
  
  if(isset($_POST["antri"])){
  	  $statuspsn ='1';
  	  $statusonline ='1';
  	  $pin=$_SESSION["op"]["pin"];
	  $pid = $_POST['nik'];
	  $s = mysqli_query($conn, "INSERT INTO pasien(ID_pasien ,status_pasien ) values('$pid','$statuspsn')");	  
	  
	  $total = 1 + $total;
	  $s = mysqli_query($conn, "UPDATE antri SET total = $total where lokasi =  '$lokasiberobat'");
	  
	  $tgl = date('d-m-y');
	  $jam = date('h:i:s');
	  $s = mysqli_query($conn, "INSERT INTO temp(id_user_temp, no_antrian,jam_ambil_antrian,lokasi, tgl, pin_temp, status_temp) values('$pid','$total','$jam','$lokasiberobat','$tgl','$pin','$statusonline')");
      header("refresh: 0;");
  }
	$id_op = $_SESSION["id"]["id_op"];
	$sql_op = mysqli_query($conn, "select username_op, tingkat_op from oprator where ID_op='$id_op'");
	$list_op = mysqli_fetch_array($sql_op);
	$user_op = $list_op[0];
	$tingkat_op = $list_op[1];
	$_SESSION["id"]["user_op"] =  $user_op;
	$_SESSION["id"]["tingkat_op"] =  $tingkat_op;
?>


    <?php include 'navbar.php'; ?>

    

</div>

<div class="container" style="margin-top: 90px;">
	<div class="row">
		<div class="col-lg-6">
			<div class="jumbotron" style="border-radius: 3px; border: none; background-image: linear-gradient(to bottom right, #65FDF0,  #1D6FA3); padding: 45px 35px 45px;  padding-bottom: 20px; padding-top: 20px;">
				<div class="row text-center" style="border: 2px solid white; border-radius: 5px;">
					<div class="col-lg-12">
						<div class="col-lg-12 col-lg-offset-6">
						<button type="button" class="btn btn-default btn-lg" id="refresh-antrian" style="background-color: transparent; border: none; margin-top: 10px; margin-right: 30px;">
                         <span class="glyphicon glyphicon-refresh" aria-hidden="true" style="color: white;"></span>
                        </button>
            		   </div>
					</div>
					<div class="col-lg-12">
						<div class="row">
						<div class="col-lg-6">
							<h4 style="color: white; text-transform: uppercase; text-align: left; border-left: 2px solid white;  padding-left: 10px; font-weight: bold;"><span style="letter-spacing: 10px;">info</span><br><span style="letter-spacing: 5px;">antrian</span></h4>
						</div>
						</div>
					</div>
					<div class="col-sm-5">
						<?php echo "<h1 style='font-size: 170px; font-family: Roboto Thin; color: white; margin-bottom: 0px;'>".$now."</h1>";?>
						<h4 style="color: white; text-transform: uppercase; font-weight: bolder; margin-top: 0px;">SAAT INI</h4>
					</div>
						<div class="col-sm-2">
							<h1 style="font-size: 100px; padding-top: 20px; color: white;">:</h1>
						</div>
					<div class="col-sm-5">
						<h1 style="font-size: 170px; font-family: Roboto Thin; color: white; margin-bottom: 0px;"><?php echo $total; ?></h1>
						<h4 style="color: white; text-transform: uppercase; font-weight: bolder; margin-top: 0px;">TOTAL</h4>
					</div>
				<div class="col-lg-12" style="padding-bottom: 40px;">
					<form action="op_index.php" method="post">
					<div class="form-group">
					<button class="btn btn-primary btn-lg col-lg-4 col-lg-offset-4" name="next" id="next" style="margin-top: 15px;border-radius: 50px; background-color: white; color: #36d7b7; box-shadow: 1px 1px 8px -4px black; border: none; font-weight: bolder;">L A N J U T
					</button>
					</div>
			</form>
			</div>				
			</div>
				</div>
		</div>
		<div class="col-lg-5">
			<ul class="nav nav-tabs col-sm-10" id="mytab" role="tablist">
  				<li role="presentation"  class="active"><a role="tab" href="#offline" aria-controls="online" data-toggle="tab">Offline</a></li>
  		
  			<li role="presentation" ><a role="tab" href="#online" aria-controls="offline" data-toggle="tab">Online</a></li>
			</ul>
			<div class="tab-content col-lg-10" style="box-shadow: 1px 1px 5px -2px;">
				<div class="tab-pane" id="online">
			<form class="form-horizontal" action="op_index.php" method="post" style="margin-top: 20px;">
  <div class="form-group">
	<div class="col-sm-8">
		<label for="nama" style="text-align: left;">PIN</label>
		<input type="text" class="form-control input-sm" id="pin" name="pin" >
	</div>
	<div class="col-sm-4">
		<input type="submit" class="btn btn-primary" style="background-color:  linear-gradient(to bottom right, #79F1A4, #0E5CAD); border-radius: 0px; border: none; margin-top:25px;" name="check" id="check" value="Check">
	</div>
  </div>
  <div class="form-group">
	<div class="col-sm-12">
		<label for="nama" style="text-align: left;">Nama</label>
		<input type="text" class="form-control input-sm" id="onnama"  value="<?php echo $nama;?>" disabled>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
    	<label for="antrian" style="text-align: left;">No Antrian</label>
		<input type="text" class="form-control input-sm" id="antrian" value="<?php echo $no_antrian;?>" disabled>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
    	<label for="jam" style="text-align: left;">Jam</label>
		<input type="text" class="form-control input-sm" id="jam" value="<?php echo $jam;?>" disabled>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
    	<label for="tgl" style="text-align: left;">Tanggal</label>
		<input type="text" class="form-control input-sm" id="tgl"  value="<?php echo $tgl;?>" value="<?php echo $lokasi;?>" disabled>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
    	<label for="lokasi" style="text-align: left;">Lokasi</label>
		<input type="text" class="form-control input-sm" id="lokasi" disabled>
	</div>
  </div>
  <div class="form-group">
  	<div class="col-sm-12 col-lg-4 col-lg-offset-4 text-center">
	<input type="submit" class="btn btn-primary col-lg-12" style="background-color:  linear-gradient(to bottom right, #79F1A4, #0E5CAD); border-radius: 0px; border: none;" name="validasi" id="validasi" value="Validasi">
	</div>
  </div>
</form>
</div>
<div class="tab-pane active" id="offline">
<form class="form-horizontal" action="op_index.php" method="post" style="margin-top: 20px;">
	<div class="form-group">
		<div class="col-sm-12">
			<label for="nik">NIK:</label>
			<input type="text" class="form-control input-sm" name="nik" id="nik" placeholder="NIK" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-lg-12 text-center">
		<button class="btn btn-primary col-lg-4" style="background-color: linear-gradient(to bottom right, 

#79F1A4, #0E5CAD); border-radius: 0px; border: none;" name="antri" id="antri">ANTRI</button>
		</div>
	</div>	
  </form>
</div>
</div>
		</div>
	</div>
</div>

<script src="framework/js/jquery-3.3.1.min.js"></script>
    <script src="framework/js/bootstrap.min.js"></script>
</body>
</html>