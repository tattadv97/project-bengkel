<?php
    $id_pemesanan = $_GET['id_pemesanan'];
    $idmekanik = $_GET['idmekanik'];

    $sql=$koneksi->query("update tb_mekanik set statusdipesan='0' where idmekanik='$idmekanik'");

    if ($sql){
        ?>
        <script type="text/javascript">
        alert ("Data Berhasil di Simpan, Mekanik Siap Menerima Tugas");
        window.location.href="?page=pengerjaanservice";
        </script>
        <?php
    }else{
       ?>
        <script type="text/javascript">
        alert ("Data Tidak Berhasil di Simpan");
        window.location.href="?page=pengerjaanservice";
        </script>
        <?php
    }

?>