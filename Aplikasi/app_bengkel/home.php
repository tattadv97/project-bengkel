<?php

	$tgl=date("Y-m-d");
	
	$sql7=$koneksi->query("select * from tb_pemesanan where tgl_pesan='$tgl'");

	while ($tampil7=$sql7->fetch_assoc()) {
		$jumlah_pelanggan_hariini=$sql7->num_rows;
	}
		
	$sql2=$koneksi->query("select * from tb_service");

	while ($tampil2=$sql2->fetch_assoc()) {
		$jumlah_service=$sql2->num_rows;
	}

	$sql3=$koneksi->query("select * from tb_pelanggan");

	while ($tampil3=$sql3->fetch_assoc()) {
		$jumlah_pelanggan=$sql3->num_rows;
	}

	$sql4=$koneksi->query("select * from tb_mekanik");

	while ($tampil4=$sql4->fetch_assoc()) {
		$jumlah_mekanik=$sql4->num_rows;
	}


	$sql6=$koneksi->query("select * from tb_pemesanan");

	while ($tampil6=$sql6->fetch_assoc()) {
		$jumlah_pemesanan=$sql6->num_rows;
	}
?>
<p align="center"><img src="images/header.png"></p>

<marquee>Selamat Datang di Sistem Informasi Pemesanan Bengkel Online CV. Axelindo Cikarang</marquee>

	<div class="container-fluid">
	    <div class="block-header">
	        
	    </div>

	    <!-- Widgets -->
	    <div class="row clearfix">
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-blue hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=service"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" />
	                </div>
	                <div class="content">
	                    <div class="text">Data Jenis Service</div>
	                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $jumlah_service ;?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-blue hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=mekanik"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" /></a>
	                </div>
	                <div class="content">
	                    <div class="text">Data Mekanik</div>
	                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $jumlah_mekanik ;?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-blue hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=daftarpemesanan"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" /></a>
	                </div>
	                <div class="content">
	                    <div class="text">Data Pemesanan Layanan</div>
	                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">
	                    	<?php echo $jumlah_pemesanan ;?></div>
	                </div>
	            </div>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <div class="info-box bg-blue hover-expand-effect">
	                <div class="icon">
	                    <a href="?page=daftarpemesanan"><img src="images/table-tick.ico" width="50" height="70" style="float:center;margin:0;" /></a>
	                </div>
	                <div class="content">
	                    <div class="text">Pemesanan Hari Ini</div>
	                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
	                    	<?php echo $jumlah_pelanggan_hariini ;?></div>
	                </div>
	            </div>
	        </div>
	    </div>