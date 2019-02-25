<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    LOGO
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="">Ambil Antrian</a></li>
                <li class="<?= $btn_antri_disabled ?>"><a href="user_editbio.php" >pengaturan</a></li>
                	

                	<!-- <?php if (isset($_SESSION['u'])): ?>
					<li style="text-transform: capitalize;"><a href="profil.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['u']; ?></a></li>
					
					<?php else: ?>
					<?php endif ?> -->


	                <!-- <li class="<?= $btn_antri_disabled ?>"><a href="user/logout.php" >keluar</a></li> -->

					<li class="dropdown">
		          	<a href="#" class="dropdown-toggle" style="text-transform: capitalize;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['u']; ?> <span class="caret"></span></a>
		       		<ul class="dropdown-menu">
		            <li><a href="#">Profil Pengguna</a></li>
		            <li><a href="user/logout.php">Keluar</a></li>
		            

            </ul>
            </div>
        </div>
    </nav>