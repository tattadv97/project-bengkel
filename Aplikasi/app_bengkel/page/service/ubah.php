<?php

    $idservice = $_GET['idservice'];
    $sql = $koneksi->query("select * from tb_service where idservice='$idservice'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA SERVICE
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        
                        <label for="">Nama Service</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" class="form-control" value="<?php echo $tampil['nama_service'];?>" />
                            </div>
                        </div>

                        <label for="">Harga</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="harga" class="form-control" value="<?php echo $tampil['harga'];?>" />
                            </div>
                        </div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="ket" class="form-control" value="<?php echo $tampil['keterangan'];?>" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$ket=$_POST['ket'];               

        $sql=$koneksi->query("update tb_service set nama_service='$nama', harga='$harga', keterangan='$ket' where idservice='$idservice'");
        if ($sql){
                ?>
                <script type="text/javascript">
                alert ("Data Berhasil di Ubah");
                window.location.href="?page=service";
                </script>
                <?php

            }
        }
?>