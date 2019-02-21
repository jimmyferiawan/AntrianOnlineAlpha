</!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="framework/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
	.box {
		padding: 20px;
		margin-top: 170px;
	}

	.box h3 {
		text-align: center;
		margin-bottom: 20px;
		color: #16a085
	}

	.box h3 {
		text-align: left;
	}

	.box h3 b u {
		color: #16a085
	}

	.box form .input-group input {
		border-radius: 0px;
	}

	form {
		margin-top: 150px;
	}

</style>
</head>
<body>
		<div class="row" style="margin: 0px;">
		<div class="col-sm-12 col-lg-4" style="background-color: #16a085;  padding: 0; margin: 0;">
			<img src="img/bgad2.jpg" class="img-responsive" style="opacity: 0.4; height: 100%; width: 100%;">
		</div>
		<div class="col-sm-12 col-lg-8">
			<form action="operator/login_OP.php" method="POST">
				<div class="form-group">
					<ul class="list-inline center-block">
						<li><img src="img/logo.png" style="width: 40px;"></li>
						<li><h3 style="font-weight: 100;">Antrisehat Admin Login</h3></li>
					</ul>
				<div class="form-group">
					<h5 style="padding-left: 15px; padding-top: 2px; padding-bottom: 20px;">login in your account</h5>
				</div>
				<div class="form-group col-sm-12 col-lg-8">
				<div class="input-group center-block">
  					<input type="text" class="form-control" name="username_op" placeholder="username">
				</div>
				</div>				
				<div class="form-group col-sm-12 col-lg-8">
				<div class="input-group center-block">
					<input type="password" class="form-control"  name="password_op"  placeholder="password">

				</div>
				</div>
				<div class="form-group col-sm-12 col-lg-8">
					<label for="" class="checkbox-inline"><input type="checkbox" name="">Remember Me</label>
				</div>
				<p>
				<div class="form-group col-sm-12 col-lg-8">
					<a href="#" class="help-block col-lg-4 col-lg-offset-6">Forgot Password</a>
					<input type="submit" class="btn btn-primary col-lg-2 pull-right" name="admin_submit" style="background-color: #16a085; border: none; border-radius: 0px;" value="Login">
				</div>
			</form>
			<p>
		</div>
	</div>
		<?php include 'operator/login_OP.php';?>
</body>
</html>