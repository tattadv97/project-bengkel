<?php

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	require_once "../../koneksi.php";

?>
<link rel="icon" type="image/x-icon" href="../../images/favicon.ico">
<style>
	
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<div align="left">
	<img src="../../images/logo1.png" width="75" height="75" style="float:left;margin:0 8px 4px 0;">
	<font size="6" color="red"><b>CV. AXELINDO</b></font><br>
	Jl. Cikarang Selatan Bekasi<br>Telp:021-454545</div>

	<caption>Laporan Daftar Pemesanan Sudah Selesai Periode: <b><?php echo $_POST['tgl_awal']?></b> s/d <b><?php echo $_POST['tgl_akhir']?></b>
		<?php

			$tgl_awal=$_POST['tgl_awal'];
			$tgl_akhir=$_POST['tgl_akhir'];

	        ?>
	</caption>
	<thead>
        <tr>
            <th>No.</th>
            <th>ID Pemesanan</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Telpon</th>
            <th>Tgl Pesan</th>
            <th>Nama Service</th>
            <th>Harga (Rp.)</th>
            <th>Tgl Pelaksanaan Service</th>
            <th>Jam / Waktu</th>
            <th>Nama Mekanik</th>
            <th>Status Pemesanan</th>
        </tr>
    </thead>
	<tbody>
		<?php

			$tgl_awal=$_POST['tgl_awal'];
			$tgl_akhir=$_POST['tgl_akhir'];

	        $no=1;
	        $sql= $koneksi->query("select id_pemesanan,namalengkap,tb_pelanggan.alamat,tb_pelanggan.telp,nama_service,harga,tgl_pesan,tgl_service, jam_service,nama_mekanik,status_pesan from tb_pemesanan,tb_service,tb_pelanggan, tb_mekanik where status_pesan='Selesai Service' and
	        	tb_pemesanan.jservice=tb_service.idservice and
                tb_pemesanan.idpelanggan=tb_pelanggan.idpelanggan and
                tb_pemesanan.mekanik=tb_mekanik.idmekanik and
                tgl_service between '$tgl_awal' and '$tgl_akhir' ORDER BY id_pemesanan ASC");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
                <td align="center"><?php echo $data['id_pemesanan']?></td>
                <td><?php echo $data['namalengkap']?></td>
                <td><?php echo $data['alamat']?></td>
                <td align="center"><?php echo $data['telp']?></td>
                <td align="center"><?php echo $data['tgl_pesan']?></td>
                <td><?php echo $data['nama_service']?></td>
                <td align="right"><?php echo number_format($data['harga'].'')?></td>
                <td align="center"><?php echo $data['tgl_service']?></td>
                <td align="center"><?php echo $data['jam_service']?></td>
                <td align="center"><?php echo $data['nama_mekanik']?></td>
                <td><font color='blue'><?php echo $data['status_pesan']?></font></td>
	        </tr>
	        <?php 
			$total=$total+$data['harga'];
	        //$total_profit=$total_profit+$profit;

	    	} 

	    	?> 
	    	<tr>
			<th colspan="12" align="center">Total Harga =&nbsp;<?php echo number_format($total).''; ?></td>
			
		</tr>       
	</tbody>

</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">