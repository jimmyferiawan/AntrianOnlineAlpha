<?php 
session_start();
 ?>
<!DOCTYPE html>

<html>
<head>
	<title> tes </title>
</head>
<body>
	<form method="POST">
		<div class="btn bnt-sm" name="adminscr" id="adminscr">
			<button>
						<a href="/AntrianOnlineAlpha/login_AD.php" >BPJS</a>
						</button>
					</div>
					<button>
							<div class="btn bnt-sm" name="adminscr" id="adminscr">
						<a href="/AntrianOnlineAlpha/user_antrian.php"  >Umum</a>
					</div>
					</button>
</form>
</div>
</body>

<?php 
  var_dump($_SESSION)  ;
 ?>
</html>