<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi.php";

$idmekanik = $data['id'];

if($_SESSION['pelanggan']){
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
                                DAFTAR PENGERJAAN SERVICE
                            </h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Pemesanan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>Telpon</th>
                                            <th>Tgl Pesan</th>
                                            <th>Nama Service</th>
                                            <th>Tgl Pelaksanaan Service</th>
                                            <th>Jam / Waktu</th>
                                            <th>Status Pemesanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select id_pemesanan,namalengkap,tb_pelanggan.alamat,tb_pelanggan.telp,nama_service,tgl_pesan,tgl_service, jam_service,status_pesan,mekanik,tb_pengguna.id from tb_pemesanan,tb_service,tb_pelanggan,tb_mekanik,tb_pengguna where  tb_pemesanan.jservice=tb_service.idservice and
                                tb_pemesanan.idpelanggan=tb_pelanggan.idpelanggan and
                                tb_pemesanan.mekanik=tb_mekanik.idmekanik and
                                tb_mekanik.idmekanik=tb_pengguna.username and
                                tb_pengguna.id='$idmekanik'
                                ORDER BY id_pemesanan DESC");
                                    while($data= $sql->fetch_assoc()){
                                    ?>
                                    <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $data['id_pemesanan']?></td>
                                    <td><?php echo $data['namalengkap']?></td>
                                    <td><?php echo $data['alamat']?></td>
                                    <td><?php echo $data['telp']?></td>
                                    <td><?php echo $data['tgl_pesan']?></td>
                                    <td><?php echo $data['nama_service']?></td>
                                    <td><?php echo $data['tgl_service']?></td>
                                    <td><?php echo $data['jam_service']?></td>
                                    <td><font color='blue'><?php echo $data['status_pesan']?></font></td>
                                    <td>
                                    <a href="?page=pengerjaanservice&aksi=ubahstatuspesan&id_pemesanan=<?php echo $data['id_pemesanan'];?> " title="Ubah Status Pesan" class="btn btn-success"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                    <a href="?page=pengerjaanservice&aksi=ubahstatusmekanik&id_pemesanan=<?php echo $data['id_pemesanan'];?>&idmekanik=<?php echo $data['mekanik']?> " title="Ubah Status Mekanik" class="btn btn-primary"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                    </td>
                                    </tr>
                                    <?php } ?>        
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
<?php 

    }

?>                          