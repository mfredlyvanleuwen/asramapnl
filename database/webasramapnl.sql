-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2023 at 05:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webasramapnl`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(50) DEFAULT NULL,
  `lantai` varchar(11) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `jenis` varchar(20) NOT NULL DEFAULT 'Laki Laki',
  `full` varchar(15) DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `lantai`, `kapasitas`, `jenis`, `full`) VALUES
(1, 'Kamar 1', 'Lantai 2', 4, 'Laki Laki', 'false'),
(2, 'gg', 'Lantai 1', 4, 'Laki Laki', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` int(20) DEFAULT NULL,
  `nama_mhs` varchar(255) DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(15) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `ortu` varchar(255) DEFAULT NULL,
  `no_hp_ortu` varchar(15) DEFAULT NULL,
  `alamat_ortu` text DEFAULT NULL,
  `pendidikan` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `id_kamar` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama_mhs`, `foto`, `tempat`, `tgl_lahir`, `jk`, `kewarganegaraan`, `agama`, `email`, `no_hp`, `kode_pos`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `ortu`, `no_hp_ortu`, `alamat_ortu`, `pendidikan`, `nama_sekolah`, `jurusan`, `prodi`, `semester`, `id_kamar`) VALUES
(1, 2147483647, 'Lukmanull Hakim', '8b5d97398afce603.jpg', 'Samalanga', '2023-12-21', 'Laki-laki', 'Warga Negara Indonesia', 'Islam', 'user@gmail.com', '6282369673751', 'test', 'test', 'ACEH', 'Bireun', 'Samalanga', 'test', '123', 'test', 'SMK', 'STM', 'Teknologi Informasi dan Komputer', 'D4 - Teknologi Rekayasa Komputer Jaringan', 5, NULL),
(3, 123456, 'Muttawakil', NULL, NULL, '2023-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(15) NOT NULL,
  `id_tagihan` int(15) NOT NULL,
  `id_mhs` int(15) NOT NULL,
  `foto_bukti_pembayaran` varchar(500) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_tagihan`, `id_mhs`, `foto_bukti_pembayaran`, `waktu_pembayaran`, `status`) VALUES
(6, 6, 1, '96f07b9ce5b0ed60.jpg', '2023-12-21 08:17:47', 'not_confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(11) NOT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_huni` varchar(15) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `id_kamar`, `id_mhs`, `waktu`, `status_huni`) VALUES
(6, 1, 1, '2023-12-20 20:49:41', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bulan` int(15) NOT NULL,
  `tahun` int(15) NOT NULL,
  `tagihan` int(15) NOT NULL,
  `tgl_tagih` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'non_active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `nama`, `bulan`, `tahun`, `tagihan`, `tgl_tagih`, `status`) VALUES
(1, 'Tagihan 1', 1, 2024, 200000, '2023-12-21 02:13:24', 'non_active'),
(2, 'Tagihan 2', 6, 2024, 450000, '2023-12-21 02:33:26', 'non_active'),
(6, 'Tagihannn', 2, 2024, 500000, '2023-12-21 06:46:09', 'non_active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `nomor_identitas` int(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `nomor_identitas`, `username`, `level`, `password`, `foto`) VALUES
(2, 'Admin', 123, 'Admin', 'admin', '123', '1626bd4109665165.jpg'),
(3, 'Pengelola', 111, 'pengelola', 'pengelola', '111', ''),
(7, 'Lukmanull Hakim', 2147483647, 'Lukmanull Hakim', 'mahasiswa', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
