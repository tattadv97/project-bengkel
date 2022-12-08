<?php

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
    
    <caption><h3>Laporan Data Service</h3></caption>
    <thead>
        <tr>
            <th>No</th>
            <th>ID Service</th>
            <th>Nama Service</th>
            <th>Harga</th>
            <th>Keterangan</th>
        </tr>       
    </thead>
    <tbody>
        <?php
            $no=1;
            $sql= $koneksi->query("select * from tb_service");
            while($data= $sql->fetch_assoc()){
            ?>
            <tr>
                <td align="center"><?php echo $no++;?></td>
                <td align="center"><?php echo $data['idservice']?></td>
                <td><?php echo $data['nama_service']?></td>
                <td align="right"><?php echo number_format($data['harga']).''?></td>
                <td align="center"><?php echo $data['keterangan']?></td>
            </tr>
            <?php } ?>        
    </tbody>
</table>
<br>
<input type="button" class="noPrint" value="Cetak"onclick="window.print()">