<?php 
$ambil1=$koneksi->query("SELECT * FROM pembelian Where status = 1; ");
$ambil2=$koneksi->query("SELECT * FROM pembelian Where status = 2; ");
$ambil3=$koneksi->query("SELECT * FROM pembelian Where status = 3; ");
$ambil4=$koneksi->query("SELECT * FROM pembelian Where status = 4; ");
$ambil5=$koneksi->query("SELECT * FROM customer Where kode_akses_cs = 1; ");
$ambil6=$koneksi->query("SELECT * FROM product ; ");
$ambil7=$koneksi->query("SELECT * FROM email ; ");

$num1='0';
$num2='0';
$num3='0';
$num4='0';
$num5='0';
$num6='0';
$num7='0';
 ?>
	<?php WHILE ($unit1 =$ambil1->fetch_assoc()){ ?>	
				<?php $num1++ ?>
			<?php }  ?>

	<?php WHILE ($unit2 =$ambil2->fetch_assoc()){ ?>		
				<?php $num2++ ?>
			<?php }  ?>

	<?php WHILE ($unit3 =$ambil3->fetch_assoc()){ ?>			
				<?php $num3++ ?>
			<?php }  ?>
	<?php WHILE ($unit4 =$ambil4->fetch_assoc()){ ?>
			
				<?php $num4++ ?>
			<?php }  ?>
	<?php WHILE ($unit5 =$ambil5->fetch_assoc()){ ?>
			
				<?php $num5++ ?>
			<?php }  ?>
<?php WHILE ($unit6 =$ambil6->fetch_assoc()){ ?>
			
				<?php $num6++ ?>
			<?php }  ?>
<?php WHILE ($unit7 =$ambil7->fetch_assoc()){ ?>
			
				<?php $num7++ ?>
			<?php }  ?>

<?php 

$jumlah=$num1+$num2+$num3+$num4;
$jum2=100/$jumlah;
$tab1=$num1*$jum2;
$tab2=$num2*$jum2;
$tab3=$num3*$jum2;
$tab4=$num4*$jum2;
 ?>


 <?php 
$ambil10=$koneksi->query("SELECT * FROM product Where class = 1; ");
$ambil20=$koneksi->query("SELECT * FROM product Where class = 2; ");
$ambil30=$koneksi->query("SELECT * FROM product Where class = 3; ");
$ambil40=$koneksi->query("SELECT * FROM product Where class = 4; ");
$ambil50=$koneksi->query("SELECT * FROM product Where class = 5; ");
$ambil60=$koneksi->query("SELECT * FROM product Where class = 6; ");
$ambil70=$koneksi->query("SELECT * FROM product Where class = 7; ");


$num10='';
$num20='';
$num30='';
$num40='';
$num50='';
$num60='';
$num70='';
 ?>
	<?php WHILE ($unit1 =$ambil10->fetch_assoc()){ ?>	
				<?php $num10++ ?>
			<?php }  ?>

	<?php WHILE ($unit2 =$ambil20->fetch_assoc()){ ?>		
				<?php $num20++ ?>
			<?php }  ?>

	<?php WHILE ($unit3 =$ambil30->fetch_assoc()){ ?>			
				<?php $num30++ ?>
			<?php }  ?>
	<?php WHILE ($unit4 =$ambil40->fetch_assoc()){ ?>
			
				<?php $num40++ ?>
			<?php }  ?>
	<?php WHILE ($unit5 =$ambil50->fetch_assoc()){ ?>
			
				<?php $num50++ ?>
			<?php }  ?>
<?php WHILE ($unit6 =$ambil60->fetch_assoc()){ ?>
			
				<?php $num60++ ?>

<?php }  ?>
<?php WHILE ($unit7 =$ambil70->fetch_assoc()){ ?>
			
				<?php $num70++ ?>
			<?php }  ?>

<?php 


 ?>
 