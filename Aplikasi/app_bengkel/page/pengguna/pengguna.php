<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi.php";

if($_SESSION['hrd'] || $_SESSION['pelamar']){
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
                                DATA PENGGUNA
                            <p align="right"><a href="?page=pengguna&aksi=tambah" class="btn btn-primary"><img src="images/edit_add.png" width="15" height="15" style="float:left;margin:0 2px 2px 0;" />Tambah</a>
                            </p>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        	<th>No.</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                    <?php
                                    $no=1;
                                    $sql= $koneksi->query("select * from tb_pengguna");
                                    while($data= $sql->fetch_assoc()){


                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $data['username']?></td>
                                        <td><?php echo $data['nama']?></td>
                                        <td><?php echo $data['password']?></td>
                                        <td><?php echo $data['level']?></td>
                                        <td><img src="images/<?php echo $data['foto']?>" width="50" height="50" alt=""></td>
                                        <td>
                                                <a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id'];?> " class="btn btn-success"><img src="images/edit.ico" width="15" height="15" style="float:left;margin:0;" /></a>
                                                <a onclick="return confirm('Anda Yakin akan menghapus Data Ini...???')" href="?page=pengguna&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger"><img src="images/delete.ico" width="15" height="15" style="float:left;margin:0;" /></a>
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