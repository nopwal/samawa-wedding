<?php
include "koneksi.php";
$db = new database();

if(empty($_GET['link'])){
		$cekid="salah";
	}else{
		$link = $_GET['link'];
		$data = $db->kirim_data($link);
		if ($data){
			$cekid="ok";
			//$data_cek = $db->kirim_data($link);
			foreach($data as $data_){
				$idclient = $data_['idclient'];
				$idtema = $data_['idtema'];
				$jml = $data_['jml'];
				$status = $data_['status'];
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
	if($status==1){
		
		//header("location:".$idtema."/$link");
		//include "satu/index.php?link=";
		$demo = 0;
		include "$idtema/index.php";
	}
	//$lanjut=1;
}else{
	//$lanjut=0;
	include "home/index.php";
}
?>