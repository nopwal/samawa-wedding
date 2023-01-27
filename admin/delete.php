<?php 
session_start();
if(!isset($_SESSION["login"])){
	header("Location: ../login.php");
	exit;
}

require "functions.php";

$id = $_GET["idclient"];

if(hapus($id) > 0){
	header("location: data_client.php?message=Data Berhasil dihapus");
	exit();
}else{
	echo "
			<script>
				alert ('data gagal dihapus!');
				document.location.href = 'data_client.php';
			</script>
		";
}

 ?>