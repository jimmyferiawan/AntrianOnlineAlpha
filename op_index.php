<!DOCTYPE html>
<html>
<?php session_start() ?>

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
            border-color: #36d7b7;
    }

    .btn-primary:hover {
            color: #fff;
            background-color: #71eeb8;
            border-color: #16a085
    }

    .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
            color: #36d7b7;
    }

    .navbar-default .navbar-nav li>a:hover {
            color: #36d7b7;  
    }

   @font-face {
         font-family: "Roboto Thin";
         src: url('framework/fonts/Roboto-Thin.ttf');
         }

	.segitiga{
	width:0;
	height:0;
	border-style:solid;
	border-width:20px;
	border-color:transparent transparent transparent #71eeb8;
	position: absolute;
	left: 570px;
	bottom: 65px;
	}

</style>
</head>
<body>
<?php
  include "koneksi.php";
  $sql_temp = mysqli_query($conn, "select * from temp ");
  $count = mysqli_num_rows($sql_temp);
  
  $sql_antri = mysqli_query($conn, "select now from antri");
  if (mysqli_num_rows($sql_antri)>0){
	$row = mysqli_fetch_array($sql_antri);
	$now = $row[0];
  }else{
	  $now = 0;
  }
  
  
  if(isset($_POST["next"])){
	  if ($now<$count){
		$now = 1 + $now;
		$s = mysqli_query($conn, "UPDATE antri SET now=$now");
	  }
  }
  
  if(isset($_POST["antri"])){
	  $offnama = $_POST['offnama'];
	  $sql_pasien = mysqli_query($conn, "select * from pasien");
	  $cnt = mysqli_num_rows($sql_pasien)+1;
	  $j = '';
	  for($i=0;$i<6-strlen($cnt);$i++){
		$j = '0'.$j;
	  }
	  $pid = "P".$j.$cnt;
	  $s = mysqli_query($conn, "INSERT INTO pasien(ID_pasien, username_pasien) values('$pid','$offnama')");	  
	  
	  $cnt = mysqli_num_rows($sql_temp)+1;
	  $tgl = date('d-m-y');
	  $jam = date('h:i:s');
	  $s = mysqli_query($conn, "INSERT INTO temp(id_user_temp, no_antrian,jam_ambil_antrian, tgl) values('$pid','$cnt','$jam','$tgl')");
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

<!-- <nav class="navbar navbar-default" style="margin-bottom: 0px; ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    LOGO 
                </a>
				<?php echo $user_op;?>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="">Info Antrian</a></li>
				<?php
				if($tingkat_op==1){
				echo '<li><a href="op_requser.php">request operator baru</a></li>';}?>
                <li><a href="op_editbio.php">pengaturan</a></li>               
                <li><a href="operator/logout.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>	 -->
    <?php include 'navbar.php'; ?>

    

</div>

<div class="container" style="margin-top: 90px;">
	<div class="row">
		<div class="col-lg-6">
			<div class="jumbotron" style="border-radius: 3px; border: none; background-image: linear-gradient(to bottom right, #36d7b7,  #71eeb8); margin-bottom: 1px; margin-top: 40px;">
				<div class="row text-center">
					<div class="col-sm-12 col-sm-offset-6">
						<button type="button" class="btn btn-default btn-md" id="refresh-antrian" style="background-color: transparent; border: none;">
                         <span class="glyphicon glyphicon-refresh" aria-hidden="true" style="color: white;"></span>
                        </button>
					</div>
					<div class="col-sm-5">
						<?php echo "<h1 style='font-size: 150px; font-weight: bold; font-family: Roboto Thin; color: white;'>".$now."</h1>";?>
						<h4 style="color: white;"><i>SAAT INI</i></h4>
					</div>
						<div class="col-sm-2">
							<h1 style="font-size: 100px; padding-top: 20px; color: white;">:</h1>
						</div>
					<div class="col-sm-5">
						<h1 style="font-size: 150px; font-weight: bold; font-family: Roboto Thin; color: white;"><?php echo $count; ?></h1>
						<h4 style="color: white;"><i>TOTAL</i></h4>
					</div>
					<form action="op_index.php" method="post">
			<div class="form-group">
			<button class="btn btn-success btn-md col-lg-6 col-lg-offset-3" name="next" id="next" style="border-radius: 0px; background-color: #36d7b7; border: 3px solid #36d7b7; border-radius: 50px;">Lanjut</button>
			</div>
			</form>				
			</div>
			<div class="segitiga"></div>
				</div>
		</div>
		<div class="col-lg-6">
			<ul class="nav nav-tabs col-sm-10" id="mytab" role="tablist">
  				<li role="presentation"  class="active"><a role="tab" href="#online" aria-controls="online" data-toggle="tab">Online</a></li>
  				<li role="presentation" ><a role="tab" href="#offline" aria-controls="offline" data-toggle="tab">Offline</a></li>
			</ul>
			<div class="tab-content col-lg-10" style="box-shadow: 1px 1px 5px -2px;">
				<div class="tab-pane active" id="online">
			<form class="form-horizontal" action="" style="margin-top: 20px;">
  <div class="form-group">
	<div class="col-sm-4">
		<label for="nama" style="text-align: left;">PIN:</label>
		<input type="text" class="form-control input-sm" id="onnama" >
	</div>
  </div>
  <div class="form-group">
	<div class="col-sm-10">
		<label for="nama" style="text-align: left;">Nama:</label>
		<input type="text" class="form-control input-sm" id="onnama" readonly>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-5">
    	<label for="antrian" style="text-align: left;">No Antrian:</label>
		<input type="text" class="form-control input-sm" id="antrian" readonly>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-3">
    	<label for="jam" style="text-align: left;">Jam:</label>
		<input type="text" class="form-control input-sm" id="jam" readonly>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-5">
    	<label for="tgl" style="text-align: left;">Tanggal:</label>
		<input type="text" class="form-control input-sm" id="tgl" readonly>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-12">
    	<label for="lokasi" style="text-align: left;">Lokasi:</label>
		<input type="text" class="form-control input-sm" id="lokasi" readonly>
	</div>
  </div>
  <div class="form-group">
  	<div class="col-sm-12 col-lg-4 col-lg-offset-4 text-center">
	<input type="submit" class="btn btn-primary col-lg-12" style="background-color:  #48887B; border-radius: 0px; border: none;" name="validasi" id="validasi" value="Validasi">
	</div>
  </div>
</form>
</div>
<div class="tab-pane" id="offline">
<form class="form-horizontal" action="op_index.php" method="post" style="margin-top: 20px;">
	<div class="form-group">
		<div class="col-sm-12">
			<label for="nama">Nama:</label>
			<input type="text" class="form-control input-sm" name="offnama" id="offnama" placeholder="Nama">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-lg-12 text-center">
		<button class="btn btn-primary col-lg-4" style="background-color:  #48887B; border-radius: 0px; border: none;" name="antri" id="antri">ANTRI</button>
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