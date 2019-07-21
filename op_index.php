<!DOCTYPE html>
<html>
<?php session_unset(); ?>
<?php session_start(); ?>
<?php include 'operator/rdmpin.php'; ?>

<?php if (isset($_SESSION['u'])): ?>
<?php session_unset(); ?>
<?php session_start(); ?>
<?php endif ?>



<?php if (!isset( $_SESSION["id"]["id_op"])) 
 {
echo "<script> alret('LOGIN FIRST');</script>";
echo "<script> location='login_AD.php';</script>";
header('location:login_AD.php');
exit();
 } ?>







<head>
	<meta http-equiv="refresh" content="600" > 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Oprator Antri Sehat</title>
	  <!-- Baris include CSS Bootstrap -->
	  <link href="framework/css/bootstrap.css" rel="stylesheet">
	  <!-- Baris Include Font -->
	  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	<style type="text/css">

	form .form-horizontal .form-group label .control-label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
    text-align: left;
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

		/* Style Font CSS */
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
	
	.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, 
	.navbar-default .navbar-nav>.active>a:hover {            
    background-color: transparent;
    color: #36d7b7;          
  }

  .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, 
  .navbar-default .navbar-nav>.open>a:hover {
    background-color: transparent;
    color: grey;
  }

  .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, 
  .navbar-default .navbar-nav>.open>a:hover {
    background-color: transparent;
  }

  .navbar-default .navbar-nav>.open>a:hover {
    border: none;
  }

  .navbar-default .navbar-nav>li>a:hover:not(#dropnot) {
		background-color: #36d7b7;
		color: white;
  }

  /* Style Jumbotron */

	.jumbotron {
		border-radius: 3px;
		border: none; background-image: linear-gradient(to bottom right, #65FDF0,  #1D6FA3);
		padding-top: 20px;
    padding-bottom: 20px;
    margin-bottom: 30px;
	}

	.jumbotron .row.text-center {
		margin-left: 0px;
		margin-right: 0px;
		border: 2px solid white;
		border-radius: 5px;"
	}

	button#refresh-antrian {
		background-color: transparent;
		border: none;
		margin-top: 10px;
		margin-right: 30px;
	}

	button#next {
		margin-top: 15px;
		border-radius: 50px;
		background-color: white;
		color: #36d7b7;
		box-shadow: 1px 1px 8px -4px black;
		border: none;
		font-weight: bolder;"
	}
	
	button#antri, input#validasi  {
		border-radius: 0px;
		border: none;" 
	}

	input#check {
		border-radius: 0px;
		border: none;
		margin-top:25px;
	}

	/* Style Text Jumbotron */
	h4#text1 {
		 color: white;
		 text-transform: uppercase;
		 text-align: left;
		 border-left: 2px solid white;
		 padding-left: 10px;
		 font-weight: bold;
	}

	h1#text2 {
		font-size: 170px;
		font-family: Roboto Thin;
		color: white;
		margin-bottom: 0px;
	}

	h4#text3 {
		color: white;
		text-transform: uppercase;
		font-weight: bolder;
		margin-top: 0px;
	}

	h1#text4 {
		font-size: 100px;
		padding-top: 20px;
		color: white;"
	}

	h1#text5 {
		font-size: 170px;
		font-family: Roboto Thin;
		color: white;
		margin-bottom: 0px;
	}

	h4#text6 {
		 color: white;
		 text-transform: uppercase;
		 font-weight: bolder;
		 margin-top: 0px;
	}

	/* Pengaturan Style Responsive Website */
	@media screen and (min-width: 768px) {
	.container .jumbotron, .container-fluid .jumbotron {
    padding-right: 20px;
    padding-left: 20px;
		}
	}
</style>
<!-- Akhir CSS -->

<!-- Awal Baris JavaScript  -->
<script src="framework/js/jquery-3.3.1.min.js"></script>
<script src="framework/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   	$("#check").click(function(){
  	$("#offline").removeClass(".active");
  	$("#online").addClass(".active");
		});
	});
</script>
<!-- Akhir Baris javascript -->
</head>

<body>
	<!-- Awal baris PHP -->
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
	//$_SESSION["loc"]["sekarang"]=$now-1;	

	//Info BPJS
    $sql_bpjs = mysqli_query($conn, "SELECT p.no_bpjs_pasien, p.nama_pasien FROM pasien AS p INNER JOIN temp AS t WHERE t.no_antrian='$now' AND t.id_user_temp=p.ID_pasien ");
	$row_bpjs = mysqli_fetch_array($sql_bpjs);
	$no_bpjs = $row_bpjs[0];
	$nama_bpjs = $row_bpjs[1];
	
    //Inisialisasi
    
    $nama = "";
	$no_antrian ="";
	$tgl = "";
	$jam = "";
	$lokasi = "";
  
  if(isset($_POST["check"])){
	  $pin = $_REQUEST["pin"];
	  $_SESSION["pincheck"]=$pin;
	  $sql_pin = mysqli_query($conn, "SELECT p.nama_pasien, t.id_user_temp, t.no_antrian, t.jam_ambil_antrian, t.tgl, t.lokasi FROM pasien AS p INNER JOIN temp AS t WHERE t.pin_temp='$pin' AND t.id_user_temp=p.ID_pasien");
	  $row = mysqli_fetch_array($sql_pin);
	  $nama = $row[0];
	  $no_antrian =$row[2];
	  $tgl = $row[4];
	  $jam = $row[3];
	  $lokasi = $row[5];
  }
  
  if(isset($_POST["validasi"])){
	  $pincheck = $_SESSION["pincheck"];
	  $sql_valid = mysqli_query($conn, "UPDATE temp SET status_temp=1 WHERE pin_temp='$pincheck'");
}
  
  if(isset($_POST["next"])){
	  if ($now<$total){
		include 'operator/next.php';

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
	  $s = mysqli_query($conn, "INSERT INTO temp(id_user_temp, no_antrian,jam_ambil_antrian,lokasi, tgl, pin_temp, status_temp) values('$pid',$total,'$jam','$lokasiberobat','$tgl','$pin','$statusonline')");
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

 <!-- Akhir Baris PHP -->   

</div>

<div class="container" style="margin-top: 90px;">
	<div class="row">
		<div class="col-lg-6">
			<div class="jumbotron">
				<div class="row text-center">
					<div class="col-lg-12">
						<div class="col-lg-12 col-lg-offset-6">
						<button type="button" class="btn btn-default btn-lg" id="refresh-antrian"><span class="glyphicon glyphicon-refresh" aria-hidden="true" style="color: white;"></span></button>
            </div>
					</div>
					<div class="col-lg-12">
						<div class="row">
						<div class="col-lg-6">
							<h4 id="text1"><span style="letter-spacing: 10px;">info</span><br><span style="letter-spacing: 5px;">antrian</span></h4>
						</div>
						</div>
					</div>
					<div class="col-sm-5">
						<?php echo "<h1 id='text2'>".$now."</h1>";?>
						<h4 id="text3">SAAT INI</h4>
					</div>
						<div class="col-sm-2">
							<h1 id="text4">:</h1>
						</div>
					<div class="col-sm-5">
						<h1 id="text5"><?php echo $total; ?></h1>
						<h4 id="text6">TOTAL</h4>
					</div>
				<div class="col-lg-12" style="padding-bottom: 40px;">
					<form action="op_index.php" method="post">
					<div class="form-group">
					<button class="btn btn-primary btn-lg col-lg-4 col-lg-offset-4" name="next" id="next">L A N J U T
					</button>
					</div>
			</form>
			</div>				
			</div>
				</div>
		</div>
		<div class="col-lg-5">
			<ul class="nav nav-tabs col-sm-10" id="mytab" role="tablist">
  				<li role="presentation"  class="active"><a role="tab" href="#online" aria-controls="online" data-toggle="tab">Online</a></li>
  		
  			<li role="presentation" ><a role="tab" href="#offline" aria-controls="offline" data-toggle="tab">Offline</a></li>
			</ul>
			<div class="tab-content col-lg-10" style="box-shadow: 1px 1px 5px -2px; overflow: auto; height: 467px;">
				<div class="tab-pane active" id="online">
			<form class="form-horizontal" action="op_index.php" method="post" style="margin-top: 20px;">
  <div class="form-group">
	<div class="col-sm-8">
		<label for="nama" style="text-align: left;">PIN Antrian</label>
		<input type="text" class="form-control input-sm" id="pin" name="pin" >
	</div>
	<div class="col-sm-4">
		<input type="submit" class="btn btn-primary" name="check" id="check" value="Check">
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
    	<label for="no_bpjs" style="text-align: left;">NO BPJS</label>
		<input type="text" class="form-control input-sm" id="no_bpjs" value="<?php echo $no_bpjs;?>" disabled>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
    	<label for="nama_bpjs" style="text-align: left;">Atas Nama BPJS</label>
		<input type="text" class="form-control input-sm" id="no_bpjs" value="<?php echo $nama_bpjs;?>" disabled>
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
		<input type="text" class="form-control input-sm" id="tgl"  value="<?php echo $tgl;?>" disabled>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
    	<label for="lokasi" style="text-align: left;">Lokasi</label>
		<input type="text" class="form-control input-sm" id="lokasi" value="<?php echo $lokasi;?>" disabled>
	</div>
  </div>
  <div class="form-group">
  	<div class="col-sm-12 col-lg-4 col-lg-offset-4 text-center">
	<input type="submit" class="btn btn-primary col-lg-12" name="validasi" id="validasi" value="Validasi">
	</div>
  </div>
</form>
</div>
<div class="tab-pane" id="offline">
<form class="form-horizontal" action="op_index.php" method="post" style="margin-top: 20px;">
	<div class="form-group">
		<div class="col-sm-12">
			<label for="nik">NIK:</label>
			<input type="text" class="form-control input-sm" name="nik" id="nik" placeholder="NIK" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-lg-12 text-center">
		<button class="btn btn-primary col-lg-4" name="antri" id="antri">ANTRI</button>
		</div>
	</div>	
  </form>
</div>
</div>
		</div>
	</div>
</div>

</body>
</html>