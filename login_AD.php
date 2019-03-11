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
	<title></title>
<!--<link href="framework/css/bootstrap.css" rel="stylesheet">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
		margin-top: 170px;
	}

	@media (max-width: 768px)
	{
		#gambar {
			display: none;
		}
	}

	@media (max-width: 970px)
	{
		#gambar {
			height: 50%;
		}
	}
	
</style>
</head>
<body>
		<div class="row" style="margin: 0px;">
		<div class="col-sm-12 col-lg-4" style="background-color: #16a085;  padding: 0; margin: 0;">
			<img src="img/bgad2.jpg" class="img-responsive" id="gambar" style="opacity: 0.4; height: 100%; width: 100%;">
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
					<a href="#" class="help-block col-sm-10 col-md-10 col-lg-4 col-lg-offset-6">Forgot Password</a>
					<input type="submit" class="btn btn-primary col-sm-2 col-md-2 col-lg-2 pull-right" name="admin_submit" style="background-color: #16a085; border: none; border-radius: 0px;" value="Login">
				</div>
			</form>
			<p>
		</div>
	</div>
		<?php include 'operator/login_OP.php';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


</body>
</html>