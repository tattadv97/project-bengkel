<?php
 // menghubungkan dengan koneksi database
include "koneksi.php";
 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(idmekanik) as kodeTerbesar FROM tb_mekanik");
$data = mysqli_fetch_array($query);
$kdmekanik = $data['kodeTerbesar'];
 
$urutan = (int) substr($kdmekanik, 1, 3);
$urutan++;

$huruf = "M";
$nomekanik = $huruf . sprintf("%03s", $urutan);
?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA MEKANIK
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        
                        <label for="">ID Mekanik</label>
                        <div class="form-group">
                            <div class="form-line">
                            <input type="text" name="idmekanik" value="<?php echo $nomekanik; ?>" class="form-control" />
                            </div>
                        </div>
                        <label for="">Nama Mekanik</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama_mekanik" class="form-control" />
                            </div>
                        </div> 

                        <label for="">Jenis Kelamin</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="jkel" class="form-control show-tick">
                                <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                                <option value="L & P">Laki-Laki / Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <label for="">Telpon</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="telp" class="form-control" />
                            </div>
                        </div>

                        <label for="">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="alamat" class="form-control" />
                            </div>
                        </div>

                        <label for="">Status</label>
                        <div class="form-group">
                            <div class="form-line">
                            <select name="status" class="form-control show-tick">
                                <option value="">---Pilih Status---</option>
                                <option value="aktif">Aktif</option>
                                <option value="nonaktif">Non Aktif</option>
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


    $sql=$koneksi->query("insert into tb_mekanik (idmekanik,nama_mekanik,jk,status,telp,alamat) 
        values('$idmekanik','$nama_mekanik','$jkel','$status','$telp','$alamat')");
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
