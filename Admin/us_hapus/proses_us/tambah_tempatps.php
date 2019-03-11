<?php

$valid_ext = array('jpg','jpeg','png','gif','bmp');

if(isset($_POST['upload']) && $_FILES['file']['size']>0){

	$ext = strtolower(end(explode('.', $_FILES['file']['name'])));

	if(in_array($ext, $valid_array)){

		move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$_FILES['file']['name']);

	}else{

		echo "Maaf... file yang ada pilih bukan file gambar. Hanya file JPG, PNG, GIF atau BMP yang boleh diupload..!";

	}

}

?>