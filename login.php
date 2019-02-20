<?php
	session_start();
	if(isset($_SESSION['u'])) {
		header('Loation: user_antrian.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="framework/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
	.box {
		background-color: #fff;
		padding: 20px;
		border: 0px;
	}

	.box h4 {
		text-align: center;
		margin-bottom: 20px;
		color: #36d7b7;
	}

	.box h5 {
		text-align: center;
	}

	.box h5 b u {
		color: #36d7b7;
	}

	.box form .input-group input {
		border-radius: 0px;
	}

	body {
		background-color: #2CBF65;
		background-image: url("img/bg2.jpg");
		background-size: cover;
	}

	.form-control {
		box-shadow: none;
		border-radius: 0px;
		border: none;
		border-bottom: 1px solid #55efc4; 
	}

	.form-group > .btn {
		border-radius: 0px;
		background-color: #00b894;
		border-color: #00b894;
	}

	.form-group > .form-control:focus {
		border: none;
		border-bottom: 2px solid #55efc4;
		box-shadow: none;
	}


</style>
</head>
<body>
		<div class="container">

		<div class="row" style="margin-top: 150px;">
			<div class="box col-sm-12 col-lg-4 col-lg-offset-2" style="background-color: #239A51; padding: 0px; height: 348px;">
				<img src="img/queue2.jpg" class="img-responsive col-sm-12" style="opacity: 0.5; border-radius: 0px; height: 348px; padding: 0; position: absolute; z-index: 0;">
				<ul class="list-inline center-block text-center" style="z-index: 1; padding-top: 250px; position: relative;">
					<li><a href="#"><img src="img/fblogo.png" style="width: 30px;"></a></li>
					<li><a href="#"><img src="img/twitterlogo.png" style="width: 30px;"></a></li>
					<li><a href="#"><img src="img/gogglelogo.png" style="width: 30px;"></a></li>
				</ul>
				<h6 style="z-index: 1; position: relative; padding-top: 10px; color: white;" class="text-center">Belum Punya Akun ?</h6>
				<h6 style="z-index: 1; position: relative;" class="text-center"><a href="user_regist.php" style="color: white;"><u>Daftar</u></a></h6>
			</div>
			<div class="box col-sm-12 col-lg-3 col-lg-offset-0">
				<form action="user/login.php" method="POST">
					<img class="img-responsiv center-block" src="img/logo.png" width="100px">
					<div class="form-group">
					<input type="text" name="username_pasien" class="form-control" placeholder="username">
					</div>
					<div class="form-group">
					<input type="password" name="password_pasien" class="form-control" placeholder="password" id="password_pasien">
					</div>
					<div class="form-group">
					<label class="checkbox-inline"><input type="checkbox" id="tampilkanpwd">show password</label>
					</div>
					<div class="form-group">
					<button class="btn btn-primary btn-block">Login</button>
					</div>
					<div class="form-group">
						<a href="#" class="form-inline text-center center-block"><h6>forgot password?</h6></a>
					</div>
				</form>
			</div>
		<script>
			var cbShowPwd = document.getElementById('tampilkanpwd');
			var inputPwd = document.getElementById('password_pasien');

			if(cbShowPwd.checked === true) {
				inputPwd.type = 'text';
			} else {
				inputPwd.type = 'password';
			}
			
			cbShowPwd.addEventListener('click', function() {
				if(this.checked === true) {
					inputPwd.type = 'text';
				} else {
					inputPwd.type = 'password';
				}
			});
		</script>
</body>
</html>