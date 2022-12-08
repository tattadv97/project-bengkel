<?php

	$koneksi=new mysqli("localhost","root","","db_abc");

?>

<style>
	
	@media print{
		input.noPrint{
			display: none;
		}
	}
</style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<div align="left">
	<img src="../../images/logoabc.png" width="75" height="75" style="float:left;margin:0 8px 4px 0;">
	<font size="6" color="red"><b>KLINIK ABC</b></font><br>
	Jl. Mumpuni setelah jadi Alumni<br>Telp:Satu 1</div>
	
	<caption>Laporan Data Pengguna</caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama Pengguna</th>
			<th>Password</th>
			<th>Level</th>
			<th>Foto</th>
		</tr>		
	</thead>
	<tbody>
		<?php
	        $no=1;
	        $sql= $koneksi->query("select * from tb_pengguna");
	        while($data= $sql->fetch_assoc()){


	        ?>
	        
	        <tr>
	            <td align="center"><?php echo $no++;?></td>
	            <td align="center"><?php echo $data['username']?></td>
	            <td><?php echo $data['nama']?></td>
	            <td align="center"><?php echo $data['password']?></td>
	            <td align="center"><?php echo $data['level']?></td>
	            <td align="center"><?php echo $data['foto']?></td>
	        </tr>
	        <?php } ?>        
	</tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">