<?php

	$id = $_GET['id'];
    $sql = $koneksi->query("delete from tb_pelanggan where id='$id'");

?>

<script type="text/javascript">
		alert ("Data Berhasil di Hapus");
		window.location.href="?page=pelanggan";
</script>