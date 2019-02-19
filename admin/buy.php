<form method="post">
	<?php $itu ?>
	<?php include 'hitung.php'; ?>
<div class="form-group">
	<button name="all" class="btn btn-primary">A l l "(<?php echo $jumlah; ?>)" </button>
	<button name="wait" class="btn btn-primary">M e n u n g 
g u   "(<?php echo $num1; ?>)"</button>
	<button name="proses" class="btn btn-primary">D i p r o s 
e s  "(<?php echo $num2; ?>)"</button>
	<button name="send" class="btn btn-primary">D i k i r i 
m  "(<?php echo $num3; ?>)"</button>
	<button name="done" class="btn btn-primary">T e r k i r 
i m  "(<?php echo $num4; ?>)"</button>
</div>
</form>
<!-- all -->
<?php if (isset($_POST['all'])): ?>
	<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN customer ON pembelian.id_cs=customer.id_cs"); ?>
	<?php $itu=1; ?>
<?php endif ?>
<!-- menunggu -->
<?php if (isset($_POST['wait'])): ?>
	<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN customer ON pembelian.id_cs=customer.id_cs WHERE status=1"); ?>
	<?php $itu=1; ?>
<?php endif ?>
<!-- Diproses -->
<?php if (isset($_POST['proses'])): ?>
	<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN customer ON pembelian.id_cs=customer.id_cs WHERE status=2"); ?>
	<?php $itu=1; ?>
<?php endif ?>
<!-- dikirim -->
<?php if (isset($_POST['send'])): ?>
	<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN customer ON pembelian.id_cs=customer.id_cs WHERE status=3"); ?>
	<?php $itu=1; ?>
<?php endif ?>
<!-- Susesc -->
<?php if (isset($_POST['done'])): ?>
	<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN customer ON pembelian.id_cs=customer.id_cs WHERE status=4"); ?>
	<?php $itu=1; ?>
<?php endif ?>

<?php if (empty($itu)): ?>
	<?php echo "Pilih Kategori" ?>
		<?php $itu=1; ?>
<?php else: ?>





<br>
<table class="table table-bordered">
	<thead>

		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>status</th>
			<?php if (!isset($_POST['all'])): ?>
				<th>aksi</th>
			<?php endif ?>
			
		</tr>
	</thead>

	<?php $nomor=1 ?>
	<tbody>

	
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['username_cs']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td>Rp.  <?php echo number_format($pecah['total_pembelian']) ; ?></td>
			<td><?php switch ($pecah['status']) {
				case '0':
					$status="ERORR";
					echo $status;
					break;
				case '1':
					$status="Menunggu";
					echo $status;
					$selanjutnya="Diproses";
					break;
				case '2':
					$status="Diproses";
					echo $status;
					$selanjutnya="Dikirim";
					break;
				case '3':
					$status="Dikirim";
					echo $status;
					$selanjutnya="Terkirim";
					break;
				case '4':

					$status="Terkirim";
					echo $status;
					$selanjutnya="Hapus Data";
					break;
				default:
					
					echo "$BELUM KONFIRMASI";
					break;
			} ?></td>
			
			
				<?php if (!isset($_POST['all'])): ?>
					<td>
					<a href="adminindex.php?halaman=detail&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-info">Detail</a>
				<a href="adminindex.php?halaman=prosesorder&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success ">Poses Selanjutnya <?php echo $selanjutnya; ?></a></td>

				<?php endif ?>
				
			
		</tr>	
		<?php $nomor++  ?>
		<?php } ?>
	</tbody>

</table>
<?php endif ?>