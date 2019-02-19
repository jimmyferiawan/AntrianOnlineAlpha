 
 <?php 
session_start();
 $koneksi = new mysqli("localhost","root","","toko_online") ?>
<h2>cs</h2>
<pre><?php print_r($_SESSION);  ?></pre>