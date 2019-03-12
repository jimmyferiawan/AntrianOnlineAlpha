<?php

require_once '../../koneksi.php';

function uploadProfile($file, $id_tempat) {
	$currentDir = dirname(dirname(dirname(getcwd())));
	$uploadDirectory = '/img-tempat/';
	$fileExtensions = ['jpg','jpeg','png','gif','bmp'];
	$fileName = $_FILES[$file]['name'];
	$fileSize = $_FILES[$file]['size'];
	$fileTmpName  = $_FILES[$file]['tmp_name'];
	$fileType = $_FILES[$file]['type'];
	$fileExtension = strtolower(explode('.',$fileName)[1]);
	// $nama = explode('.',$fileName);
	$newFileName = $id_tempat . "-" . md5(time() . $fileName) . '.' . $fileExtension;
	// $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

	$status = false;

	$uploadPath = $currentDir . $uploadDirectory . basename($newFileName); 
	//   return $uploadPath;
	//   echo $uploadPath;

		if (! in_array($fileExtension,$fileExtensions)) {
			$errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
			$status = false;
		}

		if ($fileSize > 2000000) {
			  $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
			$status = false;
		}

		if (empty($errors)) {
			  $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

			if ($didUpload) {
				//   echo "The file " . basename($fileName) . " has been uploaded";
				  $status = $newFileName;
			} else {
				//   echo "An error occurred somewhere. Try again or contact the admin";
				  $status = false;
			}
		} else {
			  foreach ($errors as $error) {
				//   echo $error . "These are the errors" . "\n";
				$status = false;
			}
		}
	  
	return $status;
}

if(isset($_FILES)) {
	if( $_FILES['file1']['size'] > 0 && $_FILES['file2']['size'] > 0 && $_FILES['file3']['size'] > 0 && $_FILES['file4']['size'] > 0 && $_FILES['file5']['size'] > 0) {
		$file1 = uploadProfile('file1', $_POST['id_tempat']);
		$file2 = uploadProfile('file2', $_POST['id_tempat']);
		$file3 = uploadProfile('file3', $_POST['id_tempat']);
		$file4 = uploadProfile('file4', $_POST['id_tempat']);
		$file5 = uploadProfile('file5', $_POST['id_tempat']);
		$id_tempat = $_POST['id_tempat'];

		$sql = "UPDATE foto_lokasi SET foto1='$file1', foto2='$file2', foto3='$file3', foto4='$file4', foto5='$file5' WHERE id_tempat='$id_tempat'";
		$query = $conn->query($sql);
		if($query) {
			echo "berhasil upload";
		} else {
			echo "gagal upload";
		}
	}
}


?>