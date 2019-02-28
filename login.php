<?php
	session_start();
	if(isset($_SESSION['u'])) {
		header('Location: user_antrian.php');
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

</style>
</head>
<body>
		<div class="container">

		<div class="row" style="margin-top: 150px;">
			<div class="box col-sm-12 col-lg-4 col-lg-offset-2" style="background-color: #239A51; padding: 0px; height: 357px;">
				<img src="img/queue2.jpg" class="img-responsive col-sm-12" style="opacity: 0.5; border-radius: 0px; height: 357px; padding: 0; position: absolute; z-index: 0;">
				<ul class="list-inline center-block text-center" style="z-index: 1; padding-top: 250px; position: relative;">
					<li><a href="#"><img src="img/fblogo.png" style="width: 30px;"></a></li>
					<li><a href="#"><img src="img/twitterlogo.png" style="width: 30px;"></a></li>
					<li><a href="#"><img src="img/gogglelogo.png" style="width: 30px;"></a></li>
				</ul>
				<h6 style="z-index: 1; position: relative; padding-top: 10px;" class="text-center"><a href="user_regist.php" style="color: white;">Belum Punya Akun ?</a></h6>
				<h6 style="z-index: 1; position: relative;" class="text-center"><a href="user_regist.php" style="color: white;"><u>Daftar</u></a></h6>
			</div>
			<div class="box col-sm-12 col-lg-3 col-lg-offset-0">
				<form action="user/login.php" method="POST">
					<img class="img-responsiv center-block" src="img/logo.png" width="100px">
					<div class="form-group">
					<input type="text" name="username_pasien" class="form-control" placeholder="username">
					</div>
					<div class="form-group">
					<input type="password" name="password_pasien" class="form-control" placeholder="password" id="inputpassword">
					</div>
					<div class="form-group">
					<label class="checkbox-inline"><input type="checkbox" id="showpassword">show password</label>
					</div>
					<div class="form-group">
					<button class="btn btn-primary btn-block" name="pasien_login" type="submit">Login</button>
					</div>
					<div class="form-group">
						<a href="" class="form-inline text-center center-block"><h5>forgot password?</h5></a>
					</div>
				</form>
			</div>
			<script>
				var inputPassword = document.getElementById('inputpassword');
				var showPassword = document.getElementById('showpassword');

				inputPassword.type = showPassword.checked === true ? 'text' : 'password';

				showPassword.addEventListener('click', function() {
					console.log(this);
					inputPassword.type = this.checked === true ? 'text' : 'password';
				})
			</script>
</body>
</html>