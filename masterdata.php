<?php
//include "koneksi.php";
$db = new database();

if(empty($_GET['idclient'])){
		$cekid="salah";
	}else{
		$idclient = $_GET['idclient'];
		$data = $db->kirim_data($idclient);
		if ($data){
			$cekid="ok";
			$data_cek = $db->kirim_data($idclient);
			foreach($data_cek as $data){
				$link = $data['link'];
				$idtema = $data['idtema'];
				$jml = $data['jml'];
				$status = $data['status'];
			}
			//echo print_r($data_cek);
		}else{
			$cekid = "kosong";
		}
	}
if($cekid=="ok"){
	/*
	echo "link : ".$link;
	echo "<br>jml : ".$jml;
	echo "<br>status : ".$status;
	*/
	$lanjut=1;
}else{
	$lanjut=0;
}
?>