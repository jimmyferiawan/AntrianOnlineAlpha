<style type="text/css">
    .navbar-brand {
        font-style: italic;
        font-weight: bolder;
        font-size: 20px;

    }

    .navbar-default .navbar-brand {
        color: #11998e;
        text-shadow: 0px 1px 3px #D5D5D5;
    }

    .navbar-default .navbar-brand:hover {
        color: #36d7b7;
    }

    .navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover {
        background-color: white;  
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: white; box-shadow: 0px -1px 4px -1px;">
        <div class="container-fluid">
            <div class="navbar-header">
<?php if (isset($_SESSION['u'])): ?>
                <a class="navbar-brand" href="user_antrian.php">
                    antrisehat.
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="user_antrian.php">Beranda</a></li>
                <li><a href="">Antri</a></li>
					<li class="dropdown">
		          	<a href="#" class="dropdown-toggle" style="text-transform: capitalize;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  id="aw"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['u']; ?> <span class="caret"></span> </a>
		       		<ul class="dropdown-menu">
		            <li><a href="user_editbio.php">Profil Pengguna</a></li>
		            <li><a href="user/logout.php">Keluar</a></li>           
            </ul>
            </div>
        </div>
    </nav>
<?php elseif (isset($_SESSION["id"]["id_op"])): ?>
             
   				<a class="navbar-brand" href="op_index.php" style="padding-top: 6px;">
                    <img src="img/logoas.png" alt="" width="auto" height="40px">
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navheader-collapse" aria-expanded="false">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse navheader-collapse">
            <ul class="nav navbar-nav navbar-right">
               
				<?php
				  if($_SESSION["id"]["tingkat_op"]==1){
            if(isset($_SESSION['print_no_antrian']) && isset($_SESSION['loc']['lokasi'])) {
              echo '<li><a href="cetak.php?instansi='. $_SESSION['loc']['lokasi'] .'&no='. $_SESSION['print_no_antrian'] .'">print</a></li>';
            }
				  echo '<li><a href="op_requser.php">Operator Baru</a></li>';}
        ?>
				<li><a href="op_index.php">Info Antrian</a></li>               
                <li class="dropdown">
		          	<a href="#" id="dropnot" class="dropdown-toggle" style="text-transform: capitalize;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["id"]["user_op"]; ?> <span class="caret"></span></a>
		       		<ul class="dropdown-menu">
		            <li><a href="op_editbio.php">Profil Operator</a></li>
                    <li><a href="operator/reset.php">Reset</a></li>
                    <li><a href="operator/tutup.php">Tutup</a></li>
                    <li><a href="operator/logout.php">Keluar</a></li>
		            
            </ul>
            </div>
        </div>
    </nav>	

	
<?php endif ?>
 
        
		
               