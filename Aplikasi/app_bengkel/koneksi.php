<?php

	$servername="localhost";
	$username="root";
	$password="";
	$database="db_bengkel";

	$koneksi=mysqli_connect($servername,$username,$password);

	if(!$koneksi){
		die("Gagal Koneksi:".mysqli_connect_error());
	}
	if(!mysqli_select_db($koneksi, $database))
	{
		echo "Tidak dapat menemukan database";
		exit();
	}
?>