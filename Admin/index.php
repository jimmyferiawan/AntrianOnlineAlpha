﻿<!DOCTYPE html>
<?php session_start() ?>
<?php include 'Proses/count.php'; ?>
<?php if (!isset($_SESSION["id"]["id_nimda"])) 
 {
echo "<script> alret('LOGIN FIRST');</script>";
echo "<script> location='../index.php';</script>";
header('location:../login_AD.php');
exit();
 } ?>
 <?php include 'navbaradmintop.php'; ?>


<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Antri Sehat</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div class="container">
                    <?php include 'navbar_atas.php'; ?> 
           <!-- /. NAV TOP  -->
          
				
					
                   <?php include 'navbar_kiri.php'; ?>
					                   
               
         
        <!-- /. NAV SIDE  -->
        <!-- <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Notification</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <?php include 'Proses/indikator.php'; ?>

            <!-- storange  -->
                    
                   <?php include 'Proses/storange.php'; ?>

 -->
       
                      
                    </div>
                </div>     
                 <!-- /. ROW  -->           
    </div>
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

</div>
</body>
</html>
