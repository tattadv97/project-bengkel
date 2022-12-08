<?php
    $id_pemesanan = $_GET['id_pemesanan'];
    $sql = $koneksi->query("select * from tb_pemesanan where id_pemesanan='$id_pemesanan'");
    $tampil = $sql->fetch_assoc();
?>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TENTUKAN MEKANIK YANG MENANGANI
                            </h2>
                        </div>
                            
                        <div class="body">
                        <form method="POST">
                        <label for="">ID Pemesanan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="idpesan" value="<?php echo $id_pemesanan; ?>" class="form-control" readonly/>
                            </div>
                        </div>

                        <label for="">Jenis Service</label>
                        <div class="form-group">            
                                <select class="form-control show-tick" name="jservice" />
                                <option value="">Pilih Jenis Service</option>
                                     <?php
                                        
                                         $jservice=$koneksi->query("select * from tb_service");
                                         
                                         while ($d_jservice=$jservice->fetch_assoc()) {
                                            if($tampil['jservice'] == $d_jservice['idservice']){
                                                $slc_noservice = 'selected';
                                            }else{
                                                $slc_noservice = '';
                                            }
                                        ?>    
                                            <option value="<?=$d_jservice['idservice'];?>"<?=$slc_noservice;?>><?=$d_jservice['nama_service'];?></option>
                                        <?php
                                            }
                                       ?>
                                </select>
                        </div>

                        <label for="">Tanggal Pelaksanaan Service</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_service" value="<?php echo $tampil['tgl_service'];?>" class="form-control" />
                            </div>
                        </div>

                        <label for="">Jam Service</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="jam" value="<?php echo $tampil['jam_service'];?>" class="form-control" />
                            </div>
                        </div>
                        <label for="">Mekanik</label>
                        <div class="row clearfix">
                            <div class="col-md-2">            
                                <select class="form-control show-tick" name="mekanik" />
                                <option value="">Pilih Mekanik</option>
                                     <?php
                                         $mekanik=$koneksi->query("select * from tb_mekanik where statusdipesan='0'"); 
                                         while ($d_mekanik=$mekanik->fetch_assoc()) {
                                        ?>    
                                            <option value="<?=$d_mekanik['idmekanik'];?>"><?=$d_mekanik['nama_mekanik'];?></option>
                                        <?php } ?>
                                </select>
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
$mekanik=$_POST['mekanik'];

    $sql=$koneksi->query("update tb_pemesanan set mekanik='$mekanik',status_pesan='Menunggu Waktu Service (Mekanik sudah siap)' where id_pemesanan='$id_pemesanan'");
    $sql2=$koneksi->query("update tb_mekanik set statusdipesan='1' where idmekanik='$mekanik'");
    if ($sql||$sql2){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        window.location.href="?page=daftarpemesanan";
        </script>
        <?php
    }else{
       ?>
        <script type="text/javascript">
        alert ("Data Tidak Berhasil di Simpan");
        window.location.href="?page=daftarpemesanan";
        </script>
        <?php
    }
}

?>