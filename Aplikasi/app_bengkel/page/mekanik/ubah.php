
<?php

    $idmekanik = $_GET['idmekanik'];
    $sql = $koneksi->query("select * from tb_mekanik where idmekanik='$idmekanik'");
    $tampil = $sql->fetch_assoc();

?>
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UBAH DATA MEKANIK
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        
                        <label for="">ID Mekanik</label>
                        <div class="form-group">
                            <div class="form-line">
                            <input type="text" name="idmekanik" value="<?php echo $idmekanik; ?>" class="form-control" />
                            </div>
                        </div>
                        <label for="">Nama Mekanik</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama_mekanik" class="form-control" value="<?php echo $tampil['nama_mekanik'];?>" />
                            </div>
                        </div> 

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="jkel" class="form-control show-tick">
                                <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="L"<?php if ($tampil['jk']=='L'){echo "selected";}?>>Laki-Laki</option>
                                <option value="P"<?php if ($tampil['jk']=='P'){echo "selected";}?>>Perempuan</option>
                                <option value="P"<?php if ($tampil['jk']=='P'){echo "selected";}?>>Laki-Laki / Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telp" class="form-control" value="<?php echo $tampil['telp'];?>" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" class="form-control" value="<?php echo $tampil['alamat'];?>"/>
                            </div>
                        </div>

                        <label for="">Status</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="status" class="form-control show-tick">
                                <option value="">---Pilih Status---</option>
                                <option value="aktif"<?php if ($tampil['status']=='aktif'){echo "selected";}?>>Aktif</option>
                                <option value="nonaktif"<?php if ($tampil['status']=='nonaktif'){echo "selected";}?>>Non Aktif</option>
                            </select>
                            </div>
                        </div>   

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){

date_default_timezone_set('Asia/Jakarta');
$date=date("Y-m-d H:i:s");
$idmekanik=$_POST['idmekanik'];
$nama_mekanik=$_POST['nama_mekanik'];
$jkel=$_POST['jkel'];
$status=$_POST['status'];
$telp=$_POST['telp'];
$alamat=$_POST['alamat'];

    $sql=$koneksi->query("update tb_mekanik set nama_mekanik='$nama_mekanik',jk='$jkel',status='$status',telp='$telp',alamat='$alamat' where idmekanik='$idmekanik'");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=mekanik";
        </script>
        <?php
    }else{
       ?>
        <script type="text/javascript">
        alert ("Data Tidak Berhasil di Simpan");
        window.location.href="?page=mekanik";
        </script>
        <?php
    }
}

?>
