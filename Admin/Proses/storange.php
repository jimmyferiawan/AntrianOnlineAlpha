<?php
// $df contains the number of bytes available on "/"
$df = disk_free_space("/");



    $bytes = disk_free_space("."); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    
    $hasil= sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
    $_SESSION["storange"]["free"]= $hasil ;


    $bytes =disk_total_space("."); 
    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
    $base = 1024;
    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
    
    $hasil2= sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
    $_SESSION["storange"]["total"]= $hasil2 ;


// On Windows:



?>


 					<div class="row "> 



 						<!-- speed internet  -->
                    <div class="col-md-3 col-sm-6 col-xs-6panel panel-primary text-center no-boder bg-color-white">
                        <div class="panel panel-back noti-box ">
                               <i class="fa fa-dashboard fa-5x"></i><strong></strong>
                             <h3 class="text-muted"><?php include 'speed.php';; ?></h3>
                        </div>
                        <div class="panel-footer back-footer-blue">
                             SPEED / second
                            
                        </div>
                    </div> 
 					<!-- Setorange free real                        -->
                    <div class="col-md-3 col-sm-6 col-xs-6panel panel-primary text-center no-boder bg-color-white">
                        <div class="panel  panel-back noti-box">
                            <i class="fa fa-bar-chart-o fa-5x"></i>

                            <h3><?php echo $_SESSION["storange"]["free"];  ?> </h3>
                        </div>
                        <div class="panel-footer back-footer-blue">
                           Disk Space Available
                            
                        </div>
                    </div>
                    <!-- belum tau mau jadi apa  -->
                    <div class="col-md-3 col-sm-6 col-xs-6panel panel-primary text-center no-boder bg-color-white">
                        <div class="panel   panel-back noti-box">
                            <i class="fa  fa-bar-chart-o fa-5x"></i>
                            <h3><?php echo $_SESSION["storange"]["total"]; ?> </h3>
                        </div>
                        <div class="panel-footer back-footer-blue">
                            Disk Space Total
                            
                        </div>
                    </div>    
					 <!-- belum tau mau jadi apa  -->
                    <div class="col-md-3 col-sm-6 col-xs-6panel panel-primary text-center no-boder bg-color-white">
                        <div class="panel   panel-back noti-box">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3>20,000 </h3>
                        </div>
                        <div class="panel-footer back-footer-blue">
                            Articles Pending
                            
                        </div>
                    </div>    
			
                        </div>