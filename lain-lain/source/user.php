<?php

if( empty( $_SESSION['uid'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'user_baru.php';
				break;
			case 'edit':
				include 'user_edit.php';
				break;
			case 'hapus':
				include 'user_hapus.php';
				break;
		}
	} else {

		echo '

			<div class="container">
			<div class="col-md-8">
				<h3 style="margin-bottom: -20px;">Daftar User</h3>
					<a href="./admin.php?hlm=user&aksi=baru" class="btn btn-success btn-s pull-right">Tambah User</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">no</th>
					 <th width="10%">uid</th>
					 <th width="20%">Nama</th>
					 <th width="20%">Alamat</th>
					 <th width="14%">No. Telp</th>
					 <th width="10%">Level</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

		 	$sql = mysqli_query($conn, "SELECT * FROM user");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['uid'].'</td>
					 <td>'.$row['nama'].'</td>
					 <td>'.$row['alamat'].'</td>
					 <td>'.$row['no'].'</td>
					 <td>';

					 if($row['level'] == 1){
						 echo 'Admin';
					 } else {
						 echo 'Apoteker';
					 }

					 echo'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus user ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=user&aksi=edit&uid='.$row['uid'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=user&aksi=hapus&submit=yes&uid='.$row['uid'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=user&aksi=baru">Tambah user baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
