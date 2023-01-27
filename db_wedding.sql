-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2022 pada 05.56
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wedding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$o5Ky1vXxZ1HpEcYcACyDJe8XpxDC8lBg4A1wb3wExb1RDskNf8Qra'),
(2, 'halo', '$2y$10$NGliZhwE9uvX4yVnvMhm5eiuR3uOHUZyuqfZLq3XCJdq3ZenNLrFy'),
(3, 'satu', '$2y$10$Ej7mVy3Sz4zlxTgteU8We.64cwAxmTA7dCPohh3mCVjcngTBWkdgm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `idclient` int(7) NOT NULL,
  `link` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `idtema` int(3) NOT NULL,
  `jml` int(4) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`idclient`, `link`, `password`, `no_wa`, `idtema`, `jml`, `status`) VALUES
(1, 'akukamu', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '089765745525', 2, 245, '1'),
(2, 'kamudia', '$2y$10$R4xeN3ivGqZkmFFZ3tI09u3Y06Ow1xApQYgSokKx2y4REMhAGaj/e', '089987883267', 2, 255, '2'),
(3, 'mailmeimei', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '089856443217', 2, 255, '1'),
(6, 'anangdewi', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '089677843253', 2, 255, '1'),
(7, '1', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '1', 1, 1, '1'),
(10, '4', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '4', 4, 4, '4'),
(13, '7', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '7', 7, 7, '7'),
(14, '8', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '8', 8, 8, '8'),
(15, '9', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '9', 9, 9, '9'),
(16, 'a', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', 'a', 2, 0, '1'),
(17, 'putraputri', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '12345678910', 2, 255, '1'),
(18, 'arkansaputri', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '089934273356', 2, 255, '1'),
(19, 'iqbalmilea', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '089312345432', 2, 255, '1'),
(20, 'toniputri', '$2y$10$4f2l/SshulttpAp3PEh0Xu2.QrTzX4.uX8lrl6Gzd8fL1o3FuNRW6', '089945673376', 2, 255, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan`
--

CREATE TABLE `keterangan` (
  `idclient` int(7) NOT NULL,
  `tgl` date NOT NULL,
  `jam_ijab` time NOT NULL,
  `jam_resepsi` time NOT NULL,
  `tempat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterangan`
--

INSERT INTO `keterangan` (`idclient`, `tgl`, `jam_ijab`, `jam_resepsi`, `tempat`) VALUES
(1, '2022-06-06', '00:10:00', '00:11:00', 'Adiwangsa Hotel'),
(2, '2022-04-01', '09:00:00', '11:00:00', 'Adiwangsa Hotel'),
(3, '2022-06-01', '12:59:00', '12:00:00', 'Gedung Mawar '),
(6, '2022-07-07', '09:00:00', '10:00:00', 'Gedung Mawar Manahan'),
(7, '1111-11-11', '11:01:00', '11:01:00', '1'),
(10, '4444-04-04', '04:44:00', '04:44:00', '44'),
(13, '0077-07-07', '07:59:00', '07:07:00', '77'),
(14, '2022-06-09', '02:00:00', '03:00:00', 'k'),
(15, '0099-09-09', '09:59:00', '09:09:00', '9'),
(16, '1111-11-11', '11:01:00', '11:11:00', 'qwer'),
(17, '2022-12-12', '13:00:00', '14:00:00', 'Gedung Mawar Boyolali'),
(18, '0011-11-11', '11:11:00', '11:01:00', '1'),
(19, '2022-06-01', '15:00:00', '16:00:00', 'Balekambang'),
(20, '2022-05-20', '09:00:00', '10:00:00', 'Alun - Alun Kidul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengantin`
--

CREATE TABLE `pengantin` (
  `idclient` int(7) NOT NULL,
  `foto_pria` varchar(64) NOT NULL,
  `pria` varchar(45) NOT NULL,
  `panggilan_pria` varchar(25) NOT NULL,
  `ayah_pria` varchar(45) NOT NULL,
  `ibu_pria` varchar(45) NOT NULL,
  `foto_wanita` varchar(64) NOT NULL,
  `wanita` varchar(45) NOT NULL,
  `panggilan_wanita` varchar(25) NOT NULL,
  `ayah_wanita` varchar(45) NOT NULL,
  `ibu_wanita` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengantin`
--

INSERT INTO `pengantin` (`idclient`, `foto_pria`, `pria`, `panggilan_pria`, `ayah_pria`, `ibu_pria`, `foto_wanita`, `wanita`, `panggilan_wanita`, `ayah_wanita`, `ibu_wanita`) VALUES
(1, '62ac55cf11a30.jpg', 'Nama Lengkap Aku', 'Aku', 'Ayah Aku', 'Ibu Aku', '62771315da246.jpg', 'Nama Lengkap Kamu', 'Kamu', 'Ayah Kamu', 'Ibu Kamu'),
(2, '627b0fecbf8d6.jpg', 'Nama Lengkap Kamu', 'Kamu', 'Ayah Kamu', 'Ibu Kamu', '6277133e48785.png', 'Nama Lengkap Dia Perempuan', 'Dia', 'Ayah Dia', 'Ibu Dia'),
(3, '', 'Abdul Ismail Bin', 'Ismail', 'Mail Al-Ayami', 'Siti Zubaedah', '', 'Mei Mei ', 'Mei Mei', 'Ah tong', 'Chun li'),
(6, '', 'Anang Afrizal', 'Anang', 'Sujatmoko', 'Zahrotun', '', 'Dewi Mustika', 'Dewi', 'Mulkidi', 'Lastri'),
(7, 'kalksd.jpg', '1', '1', '1', '1', 'sas.jpg', '1', '1', '1', '1'),
(10, 'sds.djpg', '4', '4', '4', '4', 'sdf.png', '4', '4', '4', '4'),
(13, '7', '7', '7', '7', '7', '7', '7', '7', '7', '7'),
(14, 'header-software-app.png', '9', '9', '9', '9', 'features-3.png', '9', '9', '9', '9'),
(15, '9', '9', '9', '9', '9', '9', '9', '9', '9', '9'),
(16, 'testimonial-2.jpg', 'a', 'a', 'a', 'a', 'testimonial-4.jpg', 'a', 'a', 'a', 'a'),
(17, 'png', 'Putra Adirja', 'Putra', 'Joko', 'Siti', 'testimonial-1.jpg', 'Putri Melati', 'Putri', 'Jatmoko', 'Ningsih'),
(18, 'png', '1', '1', '1', '1', '6276b5667124e.png', '1', '1', '1', '1'),
(19, '627705793afad.jpg', 'Iqbal Idul Adha', 'Iqbal', 'Joko', 'Siti', '6277072e929f6.jpg', 'Nur Milea', 'Milea', 'Solikhin', 'Mulyani'),
(20, '62776a03bb74d.jpg', 'Toni Avesina', 'Toni', 'Ayah Toni', 'Ibu Toni', '62776a03bf388.jpg', 'Putri PM', 'Putri', 'Ayah Putri', 'Ibu Putri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ucapan`
--

CREATE TABLE `ucapan` (
  `iducapan` int(10) NOT NULL,
  `idclient` int(7) NOT NULL,
  `nama_pengirim` varchar(40) NOT NULL,
  `doa` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ucapan`
--

INSERT INTO `ucapan` (`iducapan`, `idclient`, `nama_pengirim`, `doa`, `waktu`) VALUES
(7, 1, 'Iqbal', 'Semoga Langgeng Ya..', '2022-01-14 23:37:23'),
(8, 2, 'Abdul Haris', 'Semoga Samawa dan diberi Kebahagiaan', '2022-01-14 23:38:16'),
(12, 1, 'Reza', 'Selamat Menempuh Hidup baru, Semoga Menjadi keluarga yang Sakinah Mawaddah Warahmah ', '2022-01-16 22:48:37'),
(13, 1, 'Arkan Sanjaya', 'Selamat Ya...', '2022-05-04 18:34:31'),
(14, 1, 'Ismail bin Mail', 'Semoga Dberi Keluarga yang harmonis', '2022-05-04 18:35:50'),
(15, 1, 'Niso', 'Selamat2...', '2022-05-04 21:31:23'),
(16, 3, 'Upin', 'Selamat Mail dan Mei Mei', '2022-05-04 21:43:22'),
(17, 1, 'Avesina Nur', 'Selamat buat Kalian berdua', '2022-05-06 18:20:48'),
(18, 1, 'Muhammad Fizi', 'Semoga Bahagia', '2022-05-06 18:21:32'),
(19, 1, 'Luqman H', 'Selamat Menikah', '2022-05-06 18:22:57'),
(20, 1, 'Irfan Hakim', 'Selamat Menempuh Hidup Baru', '2022-05-06 18:23:10'),
(21, 1, 'Daffa R', 'Semoga Samawa', '2022-05-06 18:23:48'),
(22, 1, 'Faiz Nur H', 'Semoga Bahagia Selalu', '2022-05-06 18:24:57'),
(23, 1, 'Abdul K', 'Yang Rukun Ya...', '2022-05-06 18:25:47'),
(24, 1, 'Azmi', 'Semoga Selalu Dalam Ridho Allah', '2022-05-06 18:26:29'),
(25, 1, 'Ridho', 'Selamat Melepas Jomblo', '2022-05-06 18:27:28'),
(26, 1, 'Reza Putra', 'Semoga Berkah Selalu', '2022-05-06 18:28:20'),
(27, 1, 'Upin S.B', 'Selamat Menikah...', '2022-05-06 18:31:02'),
(28, 3, 'Nur Azizah', 'Semoga Bahagia Selalu', '2022-05-06 18:37:01'),
(29, 1, 'cek', 'cek', '2022-05-06 18:38:30'),
(30, 1, 'Ghofur', 'Bahagia Selalu', '2022-05-06 18:39:48'),
(31, 20, 'Naufal', 'Samawa Ya..', '2022-05-08 13:59:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`);

--
-- Indeks untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`idclient`);

--
-- Indeks untuk tabel `pengantin`
--
ALTER TABLE `pengantin`
  ADD PRIMARY KEY (`idclient`);

--
-- Indeks untuk tabel `ucapan`
--
ALTER TABLE `ucapan`
  ADD PRIMARY KEY (`iducapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `idclient` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pengantin`
--
ALTER TABLE `pengantin`
  MODIFY `idclient` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `ucapan`
--
ALTER TABLE `ucapan`
  MODIFY `iducapan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
