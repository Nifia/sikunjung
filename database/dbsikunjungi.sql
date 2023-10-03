-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2023 pada 20.06
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsikunjungi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttamu`
--

CREATE TABLE `ttamu` (
  `id` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `waktu_kunjungan` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `keperluan` varchar(500) NOT NULL,
  `nama_dituju` varchar(200) NOT NULL,
  `status_kunjungan` varchar(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan_rejected` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ttamu`
--

INSERT INTO `ttamu` (`id`, `tanggal`, `nama`, `waktu_kunjungan`, `gender`, `telepon`, `instansi`, `keperluan`, `nama_dituju`, `status_kunjungan`, `id_user`, `tanggal_dibuat`, `keterangan_rejected`) VALUES
(2, '2023-09-20', 'Nifia Syufriana', '12:00 WIB', 'Perempuan', '081277357753', 'UMRAH', 'Rapat Project', 'Bu Dewi (HRD)', 'Rejected', 2, '2023-09-19 03:26:44', 'Libur Nasional'),
(3, '2023-09-20', 'Nifia Syufriana', '12:00 WIB', 'Perempuan', '081277357753', 'UMRAH', 'Wawancara', 'Bu Dewi (HRD)', 'Accepted', 2, '2023-09-19 07:26:10', ''),
(4, '2023-09-28', 'Danan', '08.00 WIB', 'Laki-laki', '081277357753', 'STTI', 'Studi Banding', 'Mas Arif', 'Accepted', 6, '2023-09-25 02:43:13', ''),
(5, '2023-09-29', 'Nifia Syufriana', '08.00 WIB', 'Perempuan', '083191149566', 'UMRAH', 'Kerja Praktik', 'Bu Dewi (HRD)', 'Accepted', 2, '2023-09-25 03:29:52', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE `tuser` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `status_akun` varchar(10) NOT NULL,
  `level` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`id_user`, `username`, `password`, `nama_pengguna`, `status_akun`, `level`, `email`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator', 'Aktif', 'admin', ''),
(2, 'nifxsyf', 'e00d4e2e5642299b31fd4603030ed669', 'Nifia Syufriana', 'Aktif', 'user', '2001020003@student.umrah.ac.id'),
(3, 'arya', '5882985c8b1e2dce2763072d56a1d6e5', 'Arya Rahmansyah', 'Aktif', 'user', '2001020054@student.umrah.ac.id'),
(5, 'arya', '611dd931040ba2284d0adc26a5e3f056', 'Arya Rahmansyah', 'Aktif', 'user', 'arahmanatu@gmail.com'),
(6, 'Danan', 'b54e6e019cf43d339621149981f8bea1', 'Danan', 'Aktif', 'user', 'danandj@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ttamu`
--
ALTER TABLE `ttamu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usertamu` (`id_user`);

--
-- Indeks untuk tabel `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ttamu`
--
ALTER TABLE `ttamu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ttamu`
--
ALTER TABLE `ttamu`
  ADD CONSTRAINT `fk_usertamu` FOREIGN KEY (`id_user`) REFERENCES `tuser` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
