<?php

	$idservice = $_GET['idservice'];
    $sql = $koneksi->query("delete from tb_service where idservice='$idservice'");

?>

<script type="text/javascript">
		alert ("Data Berhasil di Hapus");
		window.location.href="?page=service";
</script>