<?php
date_default_timezone_set("Asia/Jakarta");
class database{
	var $host = "localhost";
	var $uname = "root";
	var $passw = "";
	var $db = "db_wedding";
	
	var $nama_web = "Undangan Pernikahan Online";
	
	var $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	
	function __construct(){
		$this->koneksi = mysqli_connect(
			$this->host,
			$this->uname,
			$this->passw);
		
		if(!$this->koneksi){
			echo "koneksi database gagal";
		}else{
			$cekdb = mysqli_select_db($this->koneksi,$this->db);
			if(!$cekdb){
				$url = $_SERVER['REQUEST_URI'];
				if(substr($url,-11)!="install.php"){
					header("location: warning.html");
				}
			}
		}
	}
	
	//--
	
	//digunakan
	function footer(){
		$kalimat = "Undangan Pernikahan Online &copy; Copyright ".date("Y")." - Muhammad Naufal Irfani";
		return $kalimat;
	}
	
	//
	function generate_string($input, $strength = 5) {
		$input_length = strlen($input);
		$random_string = '';
		for($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
	
		return $random_string;
	}
	
	
	//
	function masuk($username,$password){
		$psw = md5($password);
		$query = mysqli_query($this->koneksi,"select iduser,nama,jenis,status from users where username='$username' and password='$psw'");
		$data_user = $query->fetch_array();
		$jml = $query->num_rows;
		if($jml == 1){
			if($data_user['status'] == "0"){
				$pesan = "blokir";
				return $pesan;
			}else{
				$web = "kelulusan";
				setcookie('username_'.$web, $username, time() + (60 * 60 * 24 * 5), '/');
				setcookie('iduser_'.$web, $data_user['iduser'], time() + (60 * 60 * 24 * 5), '/');
				setcookie('nama_user_'.$web, $data_user['nama'], time() + (60 * 60 * 24 * 5), '/');
				$_SESSION['username'] = $username;
				$_SESSION['iduser'] = $data_user['iduser'];
				$_SESSION['jenis'] = $data_user['jenis'];
				$_SESSION['nama_user'] = $data_user['nama'];
				$_SESSION['is_login_wedding_binar'] = TRUE;
				$this->update_lastlogin($data_user['iduser']);
				$pesan = "sukses";
				return $pesan;
			}
		}else{
			$pesan = "gagal";
			return $pesan;
		}
	}
	
	//
	function keluar($iduser){
		$this->update_lastlogin($iduser);
		$_SESSION['is_login_wedding_binar'] = FALSE;
		session_start();
		session_unset();
		session_destroy();
		setcookie('username', '', 0, '/');
		setcookie('iduser', '', 0, '/');
		session_destroy();
	}
	
	//
	function update_lastlogin($iduser){
		$hariini = date("Y-m-d H:i:s");
		$query = mysqli_query($this->koneksi,"update users set lastlogin='$hariini' where iduser='$iduser'");
		return $query;
	}
	
	//
	function time2str($ts){
		if(!ctype_digit($ts))
			$ts = strtotime($ts);

		$diff = time() - $ts;
		if($diff == 0)
			return 'sekarang';
		elseif($diff > 0)
		{
			$day_diff = floor($diff / 86400);
			if($day_diff == 0)
			{
				if($diff < 60) return 'baru saja';
				if($diff < 120) return '1 menit lalu';
				if($diff < 3600) return floor($diff / 60) . ' menit lalu';
				if($diff < 7200) return '1 jam lalu';
				if($diff < 86400) return floor($diff / 3600) . ' jam lalu';
			}
			if($day_diff == 1) return 'kemarin';
			if($day_diff < 7) return $day_diff . ' hari yang lalu';
			if($day_diff < 31) return ceil($day_diff / 7) . ' minggu lalu';
			if($day_diff < 60) return 'bulan lalu';
			return date('F Y', $ts);
		}
		else
		{
			$diff = abs($diff);
			$day_diff = floor($diff / 86400);
			if($day_diff == 0)
			{
				if($diff < 120) return 'satu menit lagi';
				if($diff < 3600) return 'dalam ' . floor($diff / 60) . ' menit lagi';
				if($diff < 7200) return 'satu jam lagi';
				if($diff < 86400) return 'dalam ' . floor($diff / 3600) . ' jam lagi';
			}
			if($day_diff == 1) return 'besok';
			if($day_diff < 4) return date('l', $ts);
			if($day_diff < 7 + (7 - date('w'))) return 'pekan depan';
			if(ceil($day_diff / 7) < 4) return 'dalam ' . ceil($day_diff / 7) . ' pekan';
			if(date('n', $ts) == date('n') + 1) return 'bulan depan';
			return date('F Y', $ts);
		}
	}
	
	// -- \\
	
	//
	function kirim_data($link){
		$query = "select idclient,idtema,jml,status from client where link = '$link'";
		$data = mysqli_query($this->koneksi, $query);
		$jml = $data->num_rows;
		if ($jml != 0){
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
	}
	
	//
	function get_idclient($link){
		$query = "select idclient from client where link = '$link'";
		$data = mysqli_query($this->koneksi, $query);
		$hasil = $data->fetch_array();
		$idclient = $hasil['idclient'];
		return $idclient;
	}
	
	//
	function ambil_data_pengantin($link){
		$idclient = $this->get_idclient($link);
		$query = "select p.idclient,p.foto_pria,p.foto_wanita,p.pria,p.panggilan_pria,p.wanita,p.panggilan_wanita,p.ayah_pria, p.ibu_pria, p.ayah_wanita, p.ibu_wanita, k.tgl, k.jam_ijab, k.jam_resepsi, k.tempat from pengantin p, keterangan k where p.idclient=k.idclient and p.idclient = '$idclient'";
		$data = mysqli_query($this->koneksi, $query);
		$jml = $data->num_rows;
		if ($jml != 0){
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
	}
	
	//
	
	function kirim_ucapan($link,$nama_pengirim,$doa){
		$idclient = $this->get_idclient($link);
		$waktu = date("Y-m-d H:i:s");
		$query = "insert into ucapan (idclient, nama_pengirim, doa, waktu) values ('$idclient','$nama_pengirim','$doa','$waktu')";
		$data = mysqli_query($this->koneksi, $query);
		
		if ($data){
			$pesan = "ok";
		}
	}
	
	
	//uji coba - berhasil
	function recurseCopy($src,$dst, $childFolder='') { 

		$dir = opendir($src); 
		mkdir($dst);
		if ($childFolder!='') {
			mkdir($dst.'/'.$childFolder);

			while(false !== ( $file = readdir($dir)) ) { 
				if (( $file != '.' ) && ( $file != '..' )) { 
					if ( is_dir($src . '/' . $file) ) { 
						$this->recurseCopy($src . '/' . $file,$dst.'/'.$childFolder . '/' . $file); 
					} 
					else { 
						copy($src . '/' . $file, $dst.'/'.$childFolder . '/' . $file); 
					}  
				} 
			}
		}else{
				// return $cc; 
			while(false !== ( $file = readdir($dir)) ) { 
				if (( $file != '.' ) && ( $file != '..' )) { 
					if ( is_dir($src . '/' . $file) ) { 
						$this->recurseCopy($src . '/' . $file,$dst . '/' . $file); 
					} 
					else { 
						copy($src . '/' . $file, $dst . '/' . $file); 
					}  
				} 
			} 
		}
		
		closedir($dir); 
	}
	//
	
	//uji coba - belum bisa
	function ekstrak($sumber,$tujuan){
		$zip = new ZipArchive;
		if ($zip->open('$sumber') === TRUE) {
			$zip->extractTo('/xampp/htdocs/wedding/$tujuan/');
			$zip->close();
			echo 'ok';
		} else {
			echo 'failed';
		}	
	}
	//
	
}
?>