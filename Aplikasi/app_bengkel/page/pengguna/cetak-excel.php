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

<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pengguna.xls");
?>

<table border="1">
	
	<h1>KLINIK ABC</br></h1>
	Jl. Mumpuni setelah jadi Alumni<br>Telp:Satu 1
	
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