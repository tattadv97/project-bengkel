<!--ini adalah skripsi joki feri-->

<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    include "koneksi.php";

?>

<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Pemesanan Bengkel</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- Favicon-->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container" id="navbar">
      <div class="navbar-header">
        <!--<a href="#" class="navbar-brand navbar-link">PURI LESTARI BLOK C</a>-->
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation"><a href="#home"><font color="blue"><b>BERANDA</b></font></a></li>
          <li role="presentation"><a href="#news"><font color="blue"><b>DAFTAR</b></font></a></li>
          <li role="presentation"><a href="#gallery"><font color="blue"><b>GALERY</b></font></a></li>
          <li role="presentation"><a href="#about"><font color="blue"><b>TENTANG</b></font></a></li>
          <li role="presentation"><a href="index1.php" target="blank"><font color="blue"><b>LOGIN</b></font></a></li>
          <li role="presentation"><a href="#"><i class="glyphicon glyphicon-search"></i></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar -->

  <!-- jumbotron -->
  <div id="background">
    <div class="jumbotron">
      <!--<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
      <h1>INDONESIA</h1>
      <p><a href="#" class="btn btn-default" role="button">EXPLORE</a></p>-->
    </div>
  </div>
  <!-- jumbotron -->
<br>
<br>
<br>
<br>
  <!-- container atas -->
  <div id="home">
    <div class="isi">
      <div class="container atas">
        <h1>CV. AXELINDO CIKARANG</h1>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <tbody>
                                CV. Axelindo adalah sebuah perusahaan yang bergerak dalam bidang jasa perbengkelan (service kendaraan) dan juga bengkel bubut. Dengan kehandalan sumber daya yang dimiliki, cv. axelindo ingin coba terus mengembangkan usahanya dan terus memberikan pelayanan yang terbaik bagi pelanggannya.    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
      </div>
    </div>
  </div>
  <!-- container atas -->

  <!-- container bawah -->
  <div class="container bawah">
    <h1>Budaya Kerja CV. AXELINDO</h1>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/cepat.jpg" width="200px">
        <h3>CEPAT</h3>
        <p class="text-center"><strong>Cepat</strong> adalah kita.</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/tepat.jpg" width="200px">
        <h3>TEPAT</h3>
        <p class="text-center"><strong>Tepat</strong> adalah kita.</p>
      </div><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img class="img-circle" src="assets/img/sesuai.jpg" width="200px">
        <h3>SESUAI</h3>
        <p class="text-center"><strong>Sesuai</strong> adalah kita.</p>
      </div>
    </div>
  </div>
  <!-- container bawah -->

  <!-- container news -->
  <div id="news">
    <div class="container">
      <div class="row">
        
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SILAHKAN DAFTAR AKUN UNTUK MELAKUKAN PEMESANAN SERVICE
                            </h2>   
                        </div>
                        <div class="body">
                        <form method="POST" enctype="multipart/form-data">

                        <label for="">Username</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="username" class="form-control" />
                            </div>
                        </div>
                        
                        <label for="">Nama</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama" class="form-control" />
                            </div>
                        </div>

                        <label for="">Password</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>

                        <label for="">Foto</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="foto" class="form-control" />
                            </div>
                        </div>

                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        </form>

<?php 
if (isset($_POST['simpan'])){
$username=$_POST['username'];
$nama=$_POST['nama'];
$password=$_POST['password'];
$level=$_POST['level'];
$foto=$_FILES['foto']['name'];
$lokasi=$_FILES['foto']['tmp_name'];
$upload=move_uploaded_file($lokasi, "images/".$foto);

    if ($upload){

    $sql=$koneksi->query("insert into tb_pengguna (username,nama,password,level,foto) values('$username','$nama','$password','pelanggan','$foto')");
    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan");
        //window.location.href="index.php";
        header("location:index.php");
        </script>
        <?php
    }
}
}

?>
                </div>
    </div>
  </div>
  <!-- container news -->

  <!-- gallery -->
  <div id="gallery">
    <div class="container">
      <h1>GALERY</h1>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="satu"><img class="img-responsive" src="assets/img/motor3.jpg" width="3000px"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="satu"><img class="img-responsive" src="assets/img/motor1.jpg" width="300px"></div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="satu"><img class="img-responsive" src="assets/img/motor2.jpg" width="300px"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="dua"><img class="img-responsive" src="assets/img/bubut.jpg" width="600px"></div>
      </div>
    </div>
  </div>
  <!-- gallery -->

  <!-- about -->
  <div id="about">
    <div class="container footer">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <!--<h1> <img src="assets/img/logoo.png" width="180px"></h1>-->
        <h2>TENTANG KAMI</h2>
        <p>Kepuasaan Anda adalah Kebanggan Kami</p>
      </div>
       
  </div>
  <!-- about -->

  <!-- kaki -->
  <div id="kaki">
    <div class="container">
      <h5 class="text-center">CV. Axelindo © 2022</h5>
    </div>
  </div>
  <!-- kaki -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>