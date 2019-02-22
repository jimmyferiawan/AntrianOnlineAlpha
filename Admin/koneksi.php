<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'antrian_v1';
	
	$conn = new mysqli($host,$user,$pass,$db);
	if ($conn->connect_error){
		die("connection failed: " .$conn->connect_error);	
	}	
?>