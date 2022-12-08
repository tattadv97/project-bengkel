<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi.php";

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
                                DATA MEKANIK
                                <p align="right"><a href="?page=mekanik&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Tambah</a></p>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>ID Mekanik</th>
                                            <th>Nama Mekanik</th>
                                            <th>JK</th>   
                                            <th>Telp</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select * from tb_mekanik");
                                    while($data= $sql->fetch_assoc()){

                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td width="30px"><?php echo $data['idmekanik']?></td>
                                        <td><?php echo $data['nama_mekanik']?></td>
                                        <td><?php echo $data['jk']?></td>
                                        <td><?php echo $data['telp']?></td>
                                        <td><?php echo $data['alamat']?></td>
                                        <td><?php echo $data['status']?></td>
                                        <td>
                                                <a href="?page=mekanik&aksi=ubah&idmekanik=<?php echo $data['idmekanik'];?> " class="btn btn-success"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                                <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=mekanik&aksi=hapus&idmekanik=<?php echo $data['idmekanik'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" style="float:left;margin:0;" /></a>
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