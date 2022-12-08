<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi.php";

    $idpelanggan = $data['id'];

if($_SESSION['mekanik']){
        //header("location:index.php");
        ?>
        <script type="text/javascript">
        alert ("Anda Tidak Berhak Mengakses Halaman ini");
        window.location.href="logout.php";
        </script>
        <?php
    }else{

?>

 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                STATUS PEMESANAN ANDA
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Pemesanan</th>
                                            <th>Tgl Pesan</th>
                                            <th>Nama Service</th>
                                            <th>Harga (Rp.)</th>
                                            <th>Tgl Pelaksanaan Service</th>
                                            <th>Jam / Waktu</th>
                                            <th>Status Pemesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select id_pemesanan,nama_service,harga,tgl_pesan,tgl_service, jam_service,status_pesan from tb_pemesanan,tb_service where tb_pemesanan.jservice=tb_service.idservice and idpelanggan='$idpelanggan' ORDER BY id_pemesanan DESC");
                                    while($data= $sql->fetch_assoc()){
                                    ?>
                                    <tr>
                                    <td align="center"><?php echo $no++;?></td>
                                    <td align="center"><?php echo $data['id_pemesanan']?></td>
                                    <td align="center"><?php echo $data['tgl_pesan']?></td>
                                    <td><?php echo $data['nama_service']?></td>
                                    <td align="right"><?php echo number_format ($data['harga']).'';?></td>
                                    <td align="center"><?php echo $data['tgl_service']?></td>
                                    <td align="center"><?php echo $data['jam_service']?></td>
                                    <td align="center"><font color='blue'><?php echo $data['status_pesan']?></font></td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
<?php 

    }

?>                          