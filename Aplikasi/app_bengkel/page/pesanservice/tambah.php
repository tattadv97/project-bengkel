<?php
 
// menghubungkan dengan koneksi database
include "koneksi.php";
$idpelanggan = $data['id']; 
// mengambil data pasien dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(id_pemesanan) as kodeTerbesar FROM tb_pemesanan");
$data = mysqli_fetch_array($query);
$nopesan = $data['kodeTerbesar'];
 
$urutan = (int) substr($nopesan, 2, 8);
$urutan++;

$huruf = "P-";
$kodepesan = $huruf . sprintf("%08s", $urutan);
?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TAMBAH DATA PEMESANAN SERVICE
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">ID Pemesanan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="idpesan" value="<?php echo $kodepesan; ?>" class="form-control" readonly/>
                            </div>
                        </div>

                        <label for="">Jenis Service</label>
                        <div class="row clearfix">
                            <div class="col-md-2">            
                                <select class="form-control show-tick" name="jservice" />
                                <option value="">Pilih Jenis Service</option>
                                     <?php
                                         $jservice=$koneksi->query("select * from tb_service"); 
                                         while ($d_jservice=$jservice->fetch_assoc()) {
                                        ?>    
                                            <option value="<?=$d_jservice['idservice'];?>"><?=$d_jservice['nama_service'];?></option>
                                        <?php } ?>
                                </select>
                           </div>                           
                        </div>

                        <label for="">Tanggal Pelaksanaan Service</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_service" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jam Service</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="jam" class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
date_default_timezone_set('Asia/Jakarta');
$date=date("Y-m-d H:i:s");
$idpesan=$_POST['idpesan'];
$jservice=$_POST['jservice'];
$tgl_service=$_POST['tgl_service'];
$jam=$_POST['jam'];

    $sql=$koneksi->query("insert into tb_pemesanan(id_pemesanan,idpelanggan,jservice,tgl_pesan,tgl_service,jam_service,status_pesan) values('$idpesan','$idpelanggan','$jservice','$date','$tgl_service','$jam','Menunggu Waktu Service')");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=statuspemesanan";
        </script>
        <?php
    }else{
       ?>
        <script type="text/javascript">
        alert ("Data Tidak Berhasil di Simpan");
        window.location.href="?page=statuspemesanan";
        </script>
        <?php
    }
}

?>