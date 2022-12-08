<?php 

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "koneksi.php";

if($_SESSION['admin'] || $_SESSION['mekanik'] || $_SESSION['pelanggan']){

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Home | Sistem Informasi Pemesanan Bengkel Online</title>
    <!-- Favicon-->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!--Google Fonts 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">-->

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-Honeydew">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <img src="images/power-off.ico" width="25" height="25" style="float:left;margin:0 2px 2px 0;" />
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <img src="images/power-off.ico" width="25" height="25" style="float:left;margin:0 2px 2px 0;" />
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php"><img src="images/logo1.png" width="35" height="35" style="float:left;margin:0 8px 4px 0;" />Sistem Informasi Pemesanan Bengkel Online CV. AXELINDO</a>
            </div>
            
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#"><img src="images/person.ico" width="25" height="25" style="float:left;margin:0 2px 2px 0;" />Profile</a>
                    </li>               
                    <li>
                        <a href="logout.php"><img src="images/power-off.ico" width="25" height="25" style="float:left;margin:0 2px 2px 0;" />Sign Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  
<?php  

        if($_SESSION['admin']){
            $user =$_SESSION['admin'];
        }elseif ($_SESSION['mekanik']){
            $user =$_SESSION['mekanik'];
        }elseif ($_SESSION['pelanggan']){
            $user =$_SESSION['pelanggan'];
        }

       $sql=$koneksi->query("select * from tb_pengguna where id='$user'");

       $data=$sql->fetch_assoc();

?>

    <section>
        <!-- Left Sidebar -->
        <div id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/<?php echo $data['foto']; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><font color="white"><b><?php echo $data['nama']; ?></b></font></div>
                    <div class="email"><font color="white"><b>Anda login sebagai <?php echo $data['level']; ?></b></font></div>
                    
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="index1.php">
                            <!--<i class="material-icons">home</i>-->
                            <img src="images/house.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Home</span>
                        </a>
                    </li>
                    <?php  if($_SESSION['admin']){ ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <!--<i class="material-icons">assignment</i>-->
                            <img src="images/database.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="?page=service"><img src="images/document-edit.ico" width="25" height="25" style="float:left;margin:0 8px 4px 0;" />Data Service</a>
                            </li>
                            <li>
                                <a href="?page=mekanik"><img src="images/document-edit.ico" width="25" height="25" style="float:left;margin:0 8px 4px 0;" />Data Mekanik</a>
                            </li>
                            <li>
                                <a href="?page=pengguna"><img src="images/person.ico" width="25" height="25" style="float:left;margin:0 8px 4px 0;" />Data Pengguna</a>
                            </li>
                        </ul>
                    </li>
                    <?php  } ?>

                    <?php  if($_SESSION['pelanggan']){ ?>
                    <li>
                        <a href="?page=pelanggan">
                            <img src="images/group.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Isi Biodata Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=pesanservice">
                            <img src="images/group.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Input Pemesanan Service</span>
                        </a>
                    </li>
                    <?php  } ?>
                    
                    <?php  if($_SESSION['admin']){ ?>
                    <li>
                        <a href="?page=daftarpelanggan">
                            <img src="images/group.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Daftar Pelanggan</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=daftarpemesanan">
                            <img src="images/folder.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Daftar Pemesanan Service Pelanggan</span>
                        </a>
                    </li>
                    <?php  } ?>
                    
                    <?php  if($_SESSION['pelanggan']){ ?>
                     <li>
                        <a href="?page=statuspemesanan">
                            <img src="images/folder.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Status Pemesanan Service Anda</span>
                        </a>
                    </li>
                    <?php  } ?>

                    <?php  if($_SESSION['mekanik']){ ?>
                     <li>
                        <a href="?page=pengerjaanservice">
                            <img src="images/folder.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Pekerjaan Service Anda</span>
                        </a>
                    </li>
                    <?php  } ?>

                    <?php  if($_SESSION['admin']){ ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                           <img src="images/table.ico" width="25" height="25" style="float:left;margin:0;" />
                            <span>Laporan-Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="page/laporan/laporandataservice.php" target="_blank"><img src="images/information.ico" width="25" height="25" style="float:left;margin:0;" />Laporan Data Service</a>
                            </li>
                            <li>
                                <a href="page/laporan/laporandatamekanik.php" target="_blank"><img src="images/information.ico" width="25" height="25" style="float:left;margin:0;" />Laporan Data Mekanik</a>
                            </li>
                            <li>
                                <a href="page/laporan/laporandatapelanggan.php" target="_blank"><img src="images/information.ico" width="25" height="25" style="float:left;margin:0;" />Laporan Data Pelanggan</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#smallModal"><img src="images/information.ico" width="25" height="25" style="float:left;margin:0;" /> Laporan Semua Pemesanan</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#smallModal1"><img src="images/information.ico" width="25" height="25" style="float:left;margin:0;" /> Laporan Semua Pemesanan Selesai</a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#smallModal2"><img src="images/information.ico" width="25" height="25" style="float:left;margin:0;" /> Laporan Semua Pemesanan Belum Selesai</a>
                            </li>
                        </ul>
                    </li>
                   <?php  } ?>

                    <li class="active">
                        <ul class="ml-menu">
                        </ul>
                    </li>
                    <li>
                        <ul class="ml-menu"> 
                        </ul>
                    </li>
                    <li> 
                        <ul class="ml-menu">  
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2022 <a href="javascript:void(0);">CV. AXELINDO</a>
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <?php 

                $page=$_GET['page'];
                $aksi=$_GET['aksi'];

                if($page == "service"){
                    if($aksi == ""){
                        include "page/service/service.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/service/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/service/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/service/hapus.php";
                    }
                }
                if($page == "mekanik"){
                    if($aksi == ""){
                        include "page/mekanik/mekanik.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/mekanik/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/mekanik/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/mekanik/hapus.php";
                    }
                }
                if($page == "daftarpelanggan"){
                    if($aksi == ""){
                        include "page/daftarpelanggan/daftarpelanggan.php";
                    }
                }
                if($page == "daftarpemesanan"){
                    if($aksi == ""){
                        include "page/daftarpemesanan/daftarpemesanan.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/daftarpemesanan/pilih_mekanik.php";
                    }
                }
                if($page == "pengerjaanservice"){
                    if($aksi == ""){
                        include "page/pengerjaanservice/pengerjaanservice.php";
                    }
                    if ($aksi=="ubahstatuspesan"){
                        include "page/pengerjaanservice/ubahstatuspesan.php";
                    }
                    if ($aksi=="ubahstatusmekanik"){
                        include "page/pengerjaanservice/ubahstatusmekanik.php";
                    }
                }
                if($page == "pelanggan"){
                    if($aksi == ""){
                        include "page/pelanggan/pelanggan.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/pelanggan/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/pelanggan/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/pelanggan/hapus.php";
                    }
                }
                if($page == "pengguna"){
                    if($aksi == ""){
                        include "page/pengguna/pengguna.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/pengguna/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/pengguna/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/pengguna/hapus.php";
                    }
                }
                if($page == "pesanservice"){
                    if($aksi == ""){
                        include "page/pesanservice/tambah.php";
                    }
                    if ($aksi=="ubah"){
                        include "page/pesanservice/ubah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/pesanservice/hapus.php";
                    }
                }
                if($page == "statuspemesanan"){
                    if($aksi == ""){
                        include "page/statuspemesanan/statuspemesanan.php";
                    }
                    if ($aksi=="tambah"){
                        include "page/statuspemesanan/tambah.php";
                    }
                    if ($aksi=="hapus"){
                        include "page/statuspemesanan/hapus.php";
                    }
                }
                
                if($page == ""){
                    include "home.php";
                }

                ?>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>

<?php
    }else{
        header("location:login.php");
    }

?>

<!--Modal Rekap daftar kriteria-->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Semua Pemesanan</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="page/laporan/rekappemesanan.php" target="_blank">
            <label for="">Tanggal Awal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_awal"class="form-control" />
                </div>
            </div>

            <label for="">Tanggal Akhir</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_akhir"class="form-control" />
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--Modal Rekap Daftar Kriteria-->
<!--Modal Rekap Daftar Lowongan-->
<div class="modal fade" id="smallModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Semua Pemesanan Selesai</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="page/laporan/rekappemesananselesai.php" target="_blank">
            <label for="">Tanggal Awal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_awal"class="form-control" />
                </div>
            </div>

            <label for="">Tanggal Akhir</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_akhir"class="form-control" />
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--Modal Rekap Daftar Lowongan-->
<!--Modal Rekap Daftar Pelamar-->
<div class="modal fade" id="smallModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Laporan Semua Pemesanan Belum Selesai</h4>
            </div>
            <div class="modal-body">
            <form method="POST" action="page/laporan/rekappemesananbelumselesai.php" target="_blank">
            <label for="">Tanggal Awal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_awal"class="form-control" />
                </div>
            </div>

            <label for="">Tanggal Akhir</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" name="tgl_akhir"class="form-control" />
                </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cetak</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--Modal Rekap Pemasukan obat-->