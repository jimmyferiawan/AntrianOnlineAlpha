</!DOCTYPE html>
<html>
<head>
	
	<?php 
	 if ( isset($_SESSION["u"])) {
        session_unset();
          header('location:login_AD.php');
    }

	 ?>

	<meta name="viewport" content="width=device-width">
		<title>Login Operator Antri Sehat</title>
		<!-- Codingan include CSS  -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Akhir Codingan -->
	<style type="text/css">

	img.img-responsive#gambar {
		opacity: 0.4;
		height: 100%;
		width: 100%;
	}

	.row .layer {
		background-color: #16a085;
		padding: 0;
		margin: 0;
	}

	/*Style Kolom Kanan*/

	form {
		margin-top: 170px;
	}

	ul li h3 {
		font-weight: 100;
	}

	div.form-group h5 {
		padding-left: 15px;
		padding-top: 2px;
		padding-bottom: 5px;
	}

	ul li img {
		 width: 40px;
		 margin-left: 8px;
	}

	input.btn.login {
		 background-color: #16a085;
		 border: none;
		 border-radius: 0px;" 
	}

	form a.help-block:hover {
		color: #16a085;
	}

	/* Baris Style Responsive */
	@media (max-width: 768px)
	{
		#gambar {
			display: none;
		}

		div.input-group.pass.center-block {
			padding-top: 25px;
		}

		label.checkbox-inline {
			padding-top: 10px;
		}
		
		.form-group.forgot {
			padding-left: 0px;
		}

	}

	@media (max-width: 970px)
	{
		#gambar {
			height: 50%;
		}
	}
	/* Akhir Baris */
</style>

</head>
<body>
		<div class="row" style="margin: 0px;">
			<!-- Awal Baris Kolom Kiri Wallpaper Sidebar -->
		<div class="layer col-sm-12 col-lg-4">
			<img src="img/bgad2.jpg" class="img-responsive" id="gambar">
		</div>
			<!-- Akhir baris -->

			<!-- Awal Baris Kolom Kanan -->
		<div class="col-sm-12 col-lg-8">
			<form action="operator/login_OP.php" method="POST">
				<div class="form-group">
					<ul class="list-inline center-block">
						<li><img src="img/logo.png"></li>
						<li><h3>Antrisehat Operator Login</h3></li>
					</ul>
				<div class="form-group">
					<h5>masuk ke akun anda</h5>
				</div>
				<div class="form-group col-sm-12 col-lg-8">
				<div class="input-group user center-block">
  					<input type="text" class="form-control" name="username_op" placeholder="username" required>
				</div>
				</div>				
				<div class="form-group col-sm-12 col-lg-8">
				<div class="input-group pass center-block">
					<input type="password" class="form-control"  name="password_op"  placeholder="password" required>
				</div>
				</div>
				<div class="form-group col-sm-12 col-lg-8">
					<label for="" class="checkbox-inline"><input type="checkbox" name="">Ingat Saya</label>
				</div>
				<p>
				<div class="form-group forgot col-sm-12 col-lg-8">
					<a href="#" class="help-block col-sm-10 col-md-10 col-lg-4 col-lg-offset-6">Forgot Password</a>
					<input type="submit" class="btn login btn-primary col-sm-2 col-md-2 col-lg-2 pull-right" name="admin_submit" value="Login">
				</div>
			</form>
			<p>
		</div>
	</div>
		<?php include 'operator/login_OP.php';?>

<!-- Awal Baris Javascript Dan Jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!-- Akhir Baris -->

</body>
</html>