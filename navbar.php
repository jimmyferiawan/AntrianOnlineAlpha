
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
<?php if (isset($_SESSION['u'])): ?>
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
<?php elseif (isset($_SESSION["id"]["id_op"])): ?>
   				<a class="navbar-brand" href="">
                    LOGO 
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="">Info Antrian</a></li>
				<?php
				if($tingkat_op==1){
				echo '<li><a href="op_requser.php">request operator baru</a></li>';}?>
                <li><a href="op_editbio.php">pengaturan</a></li>               
                <li><a href="operator/logout.php">keluar</a></li>
            </ul>
            </div>
        </div>
    </nav>	

	
<?php endif ?>
 
        
		
               