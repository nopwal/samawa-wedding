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

function ubah_user($data){
	global $conn;

	// ambil data dalam for
	$id = $data["idclient"];
	$password = htmlspecialchars($data['password']);
	$password =  password_hash($password, PASSWORD_DEFAULT);

	$query = "UPDATE client SET 
				password = '$password'

				WHERE idclient = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubah_pengantin($data){
	global $conn;

	// ambil data dalam for
	$id = $data["idclient"];
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

	$query = "UPDATE pengantin SET
				foto_pria = '$foto_pria',
				pria = '$pria',
				panggilan_pria = '$panggilan_pria',
				ayah_pria = '$ayah_pria',
				ibu_pria = '$ibu_pria',
				foto_wanita = '$foto_wanita',
				wanita = '$wanita',
				panggilan_wanita = '$panggilan_wanita',
				ayah_wanita = '$ayah_wanita',
				ibu_wanita = '$ibu_wanita'

				WHERE idclient = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubah_keterangan($data){
	global $conn;

	// ambil data dalam for
	$id = $data["idclient"];
	$tgl = htmlspecialchars($data['tgl']);
	$jam_ijab = htmlspecialchars($data['jam_ijab']);
	$jam_resepsi = htmlspecialchars($data['jam_resepsi']);
	$tempat = htmlspecialchars($data['tempat']);

	$query = "UPDATE keterangan SET 
				tgl = '$tgl',
				jam_ijab = '$jam_ijab',
				jam_resepsi = '$jam_resepsi',
				tempat = '$tempat'

				WHERE idclient = $id
			";

	mysqli_query($conn, $query);

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

 ?>