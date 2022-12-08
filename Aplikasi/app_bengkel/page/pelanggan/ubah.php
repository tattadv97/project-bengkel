
<?php
    $idpelanggan = $data['id'];
    $id = $_GET['id'];
    $sql = $koneksi->query("select * from tb_pelanggan where id='$id'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA PELANGGAN
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST" enctype="multipart/form-data">
                        
                        <label for="">ID Pelanggan</label>
                        <div class="form-group">
                            <div class="form-line">
                            <input type="text" name="idpelanggan" value="<?php echo $idpelanggan; ?>" class="form-control" readonly=""/>
                            </div>
                        </div>   

                        <label for="">Nama Lengkap</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" value="<?php echo $tampil['namalengkap']; ?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="jkel" class="form-control show-tick">
                                <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="L"<?php if ($tampil['jk']=='L'){echo "selected";}?>>Laki-Laki</option>
                                <option value="P"<?php if ($tampil['jk']=='P'){echo "selected";}?>>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telpon" value="<?php echo $tampil['telp']; ?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" value="<?php echo $tampil['alamat']; ?>" class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){

date_default_timezone_set('Asia/Jakarta');
$date=date("Y-m-d H:i:s");
$idpelanggan=$_POST['idpelanggan'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$jkel=$_POST['jkel'];
$telpon=$_POST['telpon'];

    $sql=$koneksi->query("update tb_pelanggan set namalengkap='$nama',jk='$jkel',telp='$telpon', alamat='$alamat' where id='$id'");

    if ($sql){
            ?>
            <script type="text/javascript">
            alert ("Data Berhasil di Ubah");
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