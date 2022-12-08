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
                                DATA PELANGGAN
                                <p align="right"><a href="?page=pelanggan&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Tambah</a>
                            </p>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>ID Pelanggan</th>
                                            <th>Nama Lengkap</th>
                                            <th>JK</th>
                                            <th>Telpon</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select * from tb_pelanggan where idpelanggan='$idpelanggan'");
                                    while($data= $sql->fetch_assoc()){
                                    ?>
                                    <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $data['idpelanggan']?></td>
                                    <td><?php echo $data['namalengkap']?></td>
                                    <td><?php echo $data['jk']?></td>
                                    <td><?php echo $data['telp']?></td>
                                    <td><?php echo $data['alamat']?></td>
                                    <td>
                                    <a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['id'];?> " class="btn btn-success"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                    <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=pelanggan&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" style="float:left;margin:0;" /></a>
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