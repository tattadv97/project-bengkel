<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi.php";

$idpelanggan = $data['id'];
$nama = $data['nama'];
?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PELANGGAN
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">

                        <label for="">ID Pelanggan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="id" value="<?php echo $idpelanggan; ?>" class="form-control" disabled/>
                            </div>
                        </div>
                        
                        <label for="">Nama Lengkap</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">JK</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="jk" class="form-control show-tick">
                                <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telpon" class="form-control" />
                            </div>
                        </div>
                        
                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$id=$_POST['id'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$telpon=$_POST['telpon'];
$alamat=$_POST['alamat'];

    $sql=$koneksi->query("insert into tb_pelanggan (idpelanggan,namalengkap,jk,telp,alamat) 
        values('$idpelanggan','$nama','$jk','$telpon','$alamat')");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=pelanggan";
        </script>
        <?php
    }else{
       ?>
        <script type="text/javascript">
        alert ("Data Tidak Berhasil di Simpan");
        window.location.href="?page=pelanggan";
        </script>
        <?php
    }
}

?>