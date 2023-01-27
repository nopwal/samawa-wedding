<?php 
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "db_wedding");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// Tambah Client
function tambah($data){
	global $conn;
	// ambil data dalam for
	$link = htmlspecialchars($data['link']);
	$result = mysqli_query($conn, "SELECT link FROM client WHERE link = '$link'");
	if (mysqli_fetch_assoc($result)) {
		// code...
		echo "<script>
				alert('link sudah terdaftar!')
			</script>";
			return false;
	}
	$password = htmlspecialchars($data['password']);
	$password =  password_hash($password, PASSWORD_DEFAULT);
	$no_wa = htmlspecialchars($data['no_wa']);
	$idtema = htmlspecialchars($data['idtema']);
	$jml = htmlspecialchars($data['jml']);
	$status = htmlspecialchars($data['status']);

	//foto pria
	$foto_pria = upload_foto_pria();
	if(!$foto_pria){
		return false;
	}
	$pria = htmlspecialchars($data['pria']);
	$panggilan_pria = htmlspecialchars($data['panggilan_pria']);
	$ayah_pria = htmlspecialchars($data['ayah_pria']);
	$ibu_pria = htmlspecialchars($data['ibu_pria']);
	$foto_wanita = upload_foto_wanita();
	if(!$foto_wanita){
		return false;
	}
	$wanita = htmlspecialchars($data['wanita']);
	$panggilan_wanita = htmlspecialchars($data['panggilan_wanita']);
	$ayah_wanita = htmlspecialchars($data['ayah_wanita']);
	$ibu_wanita = htmlspecialchars($data['ibu_wanita']);

	$tgl = htmlspecialchars($data['tgl']);
	$jam_ijab = htmlspecialchars($data['jam_ijab']);
	$jam_resepsi = htmlspecialchars($data['jam_resepsi']);
	$tempat = htmlspecialchars($data['tempat']);

	mysqli_query($conn, "INSERT INTO client 
				VALUES
				 ('', '$link', '$password', '$no_wa', '$idtema', '$jml', '$status')");

	mysqli_query($conn, "INSERT INTO pengantin 
				VALUES
				 ('', '$foto_pria', '$pria', '$panggilan_pria', '$ayah_pria', '$ibu_pria', '$foto_wanita', '$wanita', '$panggilan_wanita', '$ayah_wanita', '$ibu_wanita')");

	mysqli_query($conn, "INSERT INTO keterangan 
				VALUES
				 ('', '$tgl', '$jam_ijab', '$jam_resepsi', '$tempat')");

	return mysqli_affected_rows($conn);
}

function upload_foto_pria(){
	$namaFile = $_FILES['foto_pria']['name'];
	$ukuranFile = $_FILES['foto_pria']['size'];
	$error = $_FILES['foto_pria']['error'];
	$tmpName = $_FILES['foto_pria']['tmp_name'];

	// apakah ada gambar yang di Upload
	if ( !$error === 4){
		echo "
		<script>
		alert('Pilih Gambar Dahulu!');
		</script>
		";
		return false;
	}

	// cek apakah yang diUpload Gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "
		<script>
		alert('Yang Anda Apload Bukan Gambar');
		</script>
		";
		return false;
	}

	// jika ukuran gambar terlalu besar
	if ( $ukuranFile > 2000000) {
		echo "
		<script>
		alert('Ukuran Gambar Terlalu Besar');
		</script>
		";
		return false;
	}

	// gambar siap di Upload
	// generate nama foto baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../foto/'. $namaFileBaru);
	return $namaFileBaru;
}

function upload_foto_wanita(){
	$namaFile = $_FILES['foto_wanita']['name'];
	$ukuranFile = $_FILES['foto_wanita']['size'];
	$error = $_FILES['foto_wanita']['error'];
	$tmpName = $_FILES['foto_wanita']['tmp_name'];

	// apakah ada gambar yang di Upload
	if ( !$error === 4){
		echo "
		<script>
		alert('Pilih Gambar Dahulu!');
		</script>
		";
		return false;
	}

	// cek apakah yang diUpload Gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo "
		<script>
		alert('Yang Anda Apload Bukan Gambar');
		</script>
		";
		return false;
	}

	// jika ukuran gambar terlalu besar
	if ( $ukuranFile > 2000000) {
		echo "
		<script>
		alert('Ukuran Gambar Terlalu Besar');
		</script>
		";
		return false;
	}

	// gambar siap di Upload
	// generate nama foto baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, '../foto/' . $namaFileBaru);
	return $namaFileBaru;
}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM client WHERE idclient = $id");
	mysqli_query($conn, "DELETE FROM pengantin WHERE idclient = $id");
	mysqli_query($conn, "DELETE FROM keterangan WHERE idclient = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	// ambil data dalam for
	$id = $data["idclient"]; 
	$link = str_replace(" ", "", ($data['link']));
	$password = htmlspecialchars($data['password']);
	$no_wa = htmlspecialchars($data['no_wa']);
	$idtema = htmlspecialchars($data['idtema']);
	$jml = htmlspecialchars($data['jml']);
	$status = htmlspecialchars($data['status']);

	$fotoLamaPria = htmlspecialchars($data['fotoLamaPria']);
	// cek apakah user pilih gambar baru
	if ($_FILES['foto_pria']['error'] === 4 ) {
		// code...
		$foto_pria = $fotoLamaPria;
	} else {
		$foto_pria = upload_foto_pria();
	}
	$pria = htmlspecialchars($data['pria']);
	$panggilan_pria = htmlspecialchars($data['panggilan_pria']);
	$ayah_pria = htmlspecialchars($data['ayah_pria']);
	$ibu_pria = htmlspecialchars($data['ibu_pria']);
	$fotoLamaWanita = htmlspecialchars($data['fotoLamaWanita']);
	// cek apakah user pilih gambar baru
	if ($_FILES['foto_wanita']['error'] === 4) {
		// code...
		$foto_wanita = $fotoLamaWanita;
	} else {
		$foto_wanita = upload_foto_wanita();
	}
	$wanita = htmlspecialchars($data['wanita']);
	$panggilan_wanita = htmlspecialchars($data['panggilan_wanita']);
	$ayah_wanita = htmlspecialchars($data['ayah_wanita']);
	$ibu_wanita = htmlspecialchars($data['ibu_wanita']);

	$tgl = htmlspecialchars($data['tgl']);
	$jam_ijab = htmlspecialchars($data['jam_ijab']);
	$jam_resepsi = htmlspecialchars($data['jam_resepsi']);
	$tempat = htmlspecialchars($data['tempat']);

	mysqli_query($conn, "UPDATE client SET 
				link = '$link',
				no_wa = '$no_wa',
				password = '$password',
				idtema = '$idtema',
				jml = '$jml',
				status = '$status' 

				WHERE idclient = $id
			");

	mysqli_query($conn, "UPDATE pengantin SET
				foto_pria = '$foto_pria',
				pria = '$pria',
				panggilan_pria = '$panggilan_pria',
				ayah_pria = '$ayah_pria',
				ibu_wanita = '$ibu_wanita',
				foto_wanita = '$foto_wanita',
				wanita = '$wanita',
				panggilan_wanita = '$panggilan_wanita',
				ayah_wanita = '$ayah_wanita',
				ibu_wanita = '$ibu_wanita'

				WHERE idclient = $id
			"); 

	mysqli_query($conn, "UPDATE keterangan SET 
				tgl = '$tgl',
				jam_ijab = '$jam_ijab',
				jam_resepsi = '$jam_resepsi',
				tempat = '$tempat' 

				WHERE idclient = $id
			");

	$pesan= "sukses";
	return $pesan;
}

function ubah_admin($data){
	global $conn;

	// ambil data dalam for
	$id = $data["id_admin"];
	$password = htmlspecialchars($data['password']);
	$password =  password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "UPDATE admin SET 
				password = '$password'

				WHERE id_admin = $id
			");

	$pesan= "sukses";
	return $pesan;
}

function registrasi($data){
	global $conn;
	$username = strtolower(stripcslashes($data["username"]));
	$nama = ($data["nama"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		// code...
		echo "<script>
				alert('link sudah terdaftar!')
			</script>";
			return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		// code...
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
				</script>";
				return false;
	}

	// enkripsi password
	$password =  password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO admin VALUES('', '$username', '$nama', '$password')");
	return mysqli_affected_rows($conn);
}

 ?>