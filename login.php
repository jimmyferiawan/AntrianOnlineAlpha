<?php
	session_start();
	if(isset($_SESSION['u'])) {
		header('Location: user_antrian.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Antri Sehat</title>
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
		z-index: 0;
	}

    .background-wall {
		width: 100%;
		height: 100%;
		background-image: url("img/bg2.jpg");
		background-size: cover;
		filter: blur(3px);
		opacity: 0.5;
		position: absolute;
		z-index: 0;

    }
    .container {
    	opacity: 1;
    }

	.kiri {
		 background-color: #239A51;
		 padding: 0px;
		 height: 357px;
	}

	.img_wall_left {
		 opacity: 0.4;
		 border-radius: 0px;
		 height: 357px;
		 padding: 0;
		 position: absolute;
		 z-index: 0;
		 display: block;
		 margin: auto;
	}

	ul {
		 z-index: 1;
		 padding-top: 250px;
		 position: relative;
	}

	ul li a img {
		width: 30px;
	}

	h6 {
		z-index: 1;
		position: relative;
		padding-top: 10px;
		color: white;
	}

	h6 a {
		color: white;
		text-decoration: underline;
	}

	h6 a:hover {
		text-decoration: none;
		color: white;
	}

</style>
</head>
<body>
	<div class="background-wall"></div>
		<div class="container">
		<div class="row" style="margin-top: 150px; position: relative;">			
			<div></div>
			<div class="box kiri col-sm-12 col-lg-4 col-lg-offset-2">
				<img src="img/queue2.jpg" class="img-responsive img_wall_left col-sm-12">
				<ul class="list-inline center-block text-center">
					<li><a href="#"><img src="img/fblogo.png"></a></li>
					<li><a href="#"><img src="img/twitterlogo.png"></a></li>
					<li><a href="#"><img src="img/gogglelogo.png"</a></li>
				</ul>
				<h6 class="text-center">Belum Punya Akun ?</h6>
				<h6 class="text-center" style="padding-top: 1px;"><a href="user_regist.php">Daftar</a></h6>

<!-- Update sourcut ke admin  -->
				<div class="btn bnt-sm" name="adminscr" id="adminscr"  > <a href="/AntrianOnlineAlpha/login_AD.php" style="opacity: 0">-----------</a> </div>
			</div>

			<div class="box col-sm-12 col-lg-3 col-lg-offset-0">
				<form action="user/login.php" method="POST" id="form-login">
					<img class="img-responsiv center-block" src="img/logoas.png" style="width: 88%; padding-bottom: 19px;">
					<div class="form-group">
					<input type="text" name="username_pasien" class="form-control" placeholder="username" id="inputusername">
					</div>
					<div class="form-group">
					<input type="password" name="password_pasien" class="form-control" placeholder="password" id="inputpassword">
					</div>
					<div class="form-group">
					<label class="checkbox-inline"><input type="checkbox" id="showpassword">show password</label>
					</div>
					<div class="form-group">
					<button class="btn btn-block" style="color: white; background-color: #19CC78FF" nam#71EEB8en_login" type="submit">Login</button>
					</div>
					<div class="form-group">
						<a href="" class="form-inline text-center center-block" style="color: #19CC78FF"><h5>forgot password?</h5></a>
					</div>
				</form>
			</div>
			<script>

				if (adminscr==true) {

                location='../login_AD.php';
           
				}

				var inputPassword = document.getElementById('inputpassword');
				var inputUsername = document.getElementById('inputusername');
				var showPassword = document.getElementById('showpassword');
				var formLogin = document.getElementById('form-login');
				inputPassword.type = showPassword.checked === true ? 'text' : 'password';

				showPassword.addEventListener('click', function() {
					console.log(this);
					inputPassword.type = this.checked === true ? 'text' : 'password';
				})

				formLogin.addEventListener('submit', function(e) {
					e.preventDefault();
					if(inputPassword.value.trim() === "" && inputUsername.value.trim() === "") {
						alert("anda belum mengisi form");
						return false;
					}
					if(inputUsername.value.trim() === "") {
						alert("username tidak boleh kosong");
						return false;
					}
					if(inputPassword.value.trim() === "") {
						alert("password tidak boleh kosong");
						return false;
					}
					if(inputUsername.value.trim() !== "" && inputPassword.value.trim() !== "") {
						this.submit();
						return true;
					} else {
						return false;
					}
				})
			</script>
			
</body>

</html>