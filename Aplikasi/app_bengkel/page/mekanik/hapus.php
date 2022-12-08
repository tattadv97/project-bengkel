<?php

	$idmekanik = $_GET['idmekanik'];
    $sql = $koneksi->query("delete from tb_mekanik where idmekanik='$idmekanik'");

?>

<script type="text/javascript">
		alert ("Data Berhasil di Hapus");
		window.location.href="?page=mekanik";
</script>