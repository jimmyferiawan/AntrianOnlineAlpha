</!DOCTYPE html>
<html>
<head>
	<title></title>
<link href="framework/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
	.box {
		background-color: #fff;
		padding: 20px;
		box-shadow: 1px 1px 30px;
		border-top: solid 4px #36d7b7;
		margin-top: 170px;
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
</style>
</head>
<body>
		<div class="container">
		<div class="row">
			
		<div class="box col-sm-12 col-lg-4 col-lg-offset-4" align="center">
		<h4>Login Us</h4>
			<form action="op_index.php">
				<div class="form-group col-sm-12 col-lg-12">
				<div class="input-group">
  					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  					<input type="text" class="form-control" placeholder="username">
				</div>
				</div>
				<p>
				<div class="form-group col-sm-12 col-lg-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="text" class="form-control" placeholder="password">
				</div>
				</div>
				<div class="form-group col-sm-12 col-lg-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-tower"></i></span>
					<select name="jenis-tempat" id="jenis-tempat" class="form-control">
                            <option selected disabled>type user</option>
                            <option value="1">Administrator</option>
                            <option value="2">Operator</option>
                            <option value="3">Dokter</option>
                        </select>
				</div>
				</div>
				<p>
				<div class="form-group col-sm-12 col-lg-12">
				<div class="input-group" style="width: 100%;">
					<input type="submit" class="btn btn-primary" style="width: 100%; background-color: #36d7b7; border: none;" value="Login">
				</div>
				</div>
			</form>
		<h5>lupa password ? <a href="user_regist.php"><b><u>lapor disini</u></b></a></h5>
		</div>
	</div>
		</div>
</body>
</html>