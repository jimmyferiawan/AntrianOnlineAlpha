<?php 
session_start();
$koneksi = new mysqli("localhost","root","","toko_online");
 
 if (!isset($_SESSION['admin'])) 
 {
echo "<script> alret('LOGIN FIRST');</script>";
echo "<script> location='../index.php';</script>";
header('location:login.php');
exit();
 }

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="cssadmin/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="cssadmin/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="cssadmin/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php $jabatan1=( $_SESSION['admin']['kode_akses']); ?>
                <?php if ($jabatan1==1): ?>
                    <?php $jabatan="admin"; ?>
                <?php else: ?>
                    <?php $jabatan="Manager"; ?>
                <?php endif ?>
                <a class="navbar-brand" href="adminindex.php"><h4> <?php echo $jabatan; ?></h4></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="adminindex.php"><i class="fa fa-bar-chart-o fa-3x"></i> Home</a>
                    </li>		
                    <li>
                        <a  href="adminindex.php?halaman=product"><i class="fa fa-qrcode fa-3x"></i> Product </a>
                    </li>   
                    <li>
                        <a  href="adminindex.php?halaman=buy"><i class="fa fa-sitemap fa-3x"></i> Order</a>

                    </li>

                    
                    
                   
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner"><?php 
            if (isset($_GET['halaman'])) {
                if ($_GET['halaman']=="product") {
                   include 'produk.php';
                }
                elseif ($_GET['halaman']=="buy") {
                    include 'buy.php';
                    # code...
                }
                elseif ($_GET['halaman']=="customer") {
                    include 'customer.php';
                }
                elseif ($_GET['halaman']=="detail") {
                    include 'detail.php';
                    # code...
                }elseif ($_GET['halaman']=="ubahuser") {
                    include 'ubahuser.php';
                    # code...
                }
                elseif ($_GET['halaman']=="tambahproduk") {
                    # code...
                    include 'tambahproduk.php';
                }
                elseif ($_GET['halaman']=="hapusproduk") {
                    include'hapus.php';
                    # code...
                }
                elseif ($_GET['halaman']=="ubahproduk") {
                    include'ubahproduk.php';
                    # code...
                }
                elseif ($_GET['halaman']=="logout") {
                    include 'logout.php';
                    # code...
               
                }
                elseif ($_GET['halaman']=="saveadmin") {
                    include 'saveadmin.php';
                    # code...
                }
                 elseif ($_GET['halaman']=="savecs") {
                    include 'savecs.php';
                    # code...
                }
                 elseif ($_GET['halaman']=="prosesorder") {
                    include 'prosesorder.php';
                    # code...
                }
                
            }
            else{
                include 'home.php';
            }
             ?></div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
