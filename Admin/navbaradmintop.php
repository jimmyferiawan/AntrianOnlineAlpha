<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
<
                <a class="navbar-brand" href="user_antrian.php">
                    LOGO
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">

            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="user_antrian.php">Ambil Antrian</a></li>
					<li class="dropdown">
		          	<a href="#" class="dropdown-toggle" style="text-transform: capitalize;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['u']; ?> <span class="caret"></span></a>
		       		<ul class="dropdown-menu">
		            <li><a href="user_editbio.php">Profil Pengguna</a></li>
		            <li><a href="user/logout.php">Keluar</a></li>
		            

            </ul>
            </div>
        </div>
    </nav>