<?php
 
// menghubungkan dengan koneksi database
include "koneksi.php";
 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(idservice) as kodeTerbesar FROM tb_service");
$data = mysqli_fetch_array($query);
$noservice = $data['kodeTerbesar'];
 
$urutan = (int) substr($noservice, 1, 3);
$urutan++;

$huruf = "S";
$noservice = $huruf . sprintf("%03s", $urutan);
?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA SERVICE
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">ID</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="kode" value="<?php echo $noservice; ?>" class="form-control" readonly/>
                            </div>
                        </div>

                        <label for="">Nama Service</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama"class="form-control" />
                            </div>
                        </div>

                        <label for="">Harga (Rp.)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="harga"class="form-control" />
                            </div>
                        </div>

                        <label for="">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="ket"class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
date_default_timezone_set('Asia/Jakarta');
$date=date("Y-m-d H:i:s");
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$ket=$_POST['ket'];

    $sql=$koneksi->query("insert into tb_service(idservice,nama_service,harga,keterangan) values('$kode','$nama','$harga','$ket')");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=service";
        </script>
        <?php
    }
}

?>