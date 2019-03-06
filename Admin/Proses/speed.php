<!-- <?php 

    $kb=1024;
    flush();
    $time = explode(" ",microtime());
    $start = $time[0] + $time[1];
    for($x=0;$x<$kb;$x++){
     
        flush();
    }
    $time = explode(" ",microtime());
    $finish = $time[0] + $time[1];
    $deltat = $finish - $start;
    
   $hasil= round($kb / $deltat, 3)."Mbps/s";
    
 ?>

 <h4><?php echo $hasil; ?></h4> -->





<?php
$kb=1024;
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++){
    str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;
$hasil2= round($kb / $deltat, 3)."Kb/s";

?>
<h4><?php echo $hasil; ?></h4>

