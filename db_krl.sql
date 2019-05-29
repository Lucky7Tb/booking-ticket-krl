-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 09:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_krl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(6, 'Lucky', 'S0EB3EQAH2SsHHW21LNHZ7dX4VknvW-K', '$2y$13$nK1jK5UIDpK.oMEJThM0MeaBncNce5ZfDHz2vQ6559NcFoTEUcgQG', NULL, 'luckytribhakti@gmail.com', 1, 1558499213, 1558499213, 'vmsgrg2idSGvPS6_HstP8edBnapx2Os6_1558499213');

-- --------------------------------------------------------

--
-- Table structure for table `history_transaksi`
--

CREATE TABLE `history_transaksi` (
  `Id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_karcis` int(255) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `jumlah_tiket` int(255) NOT NULL,
  `tanggal_beli` datetime NOT NULL,
  `total_harga` int(255) NOT NULL,
  `status_bayar` enum('SB','BB') NOT NULL,
  `status_pembelian` enum('Aktif','Cancel','Pending') NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_transaksi`
--

INSERT INTO `history_transaksi` (`Id`, `id_user`, `id_karcis`, `atas_nama`, `jumlah_tiket`, `tanggal_beli`, `total_harga`, `status_bayar`, `status_pembelian`, `id_jadwal`, `bukti_pembayaran`) VALUES
(6, 2, 1328375914, 'Lucky', 3, '2019-05-24 22:05:38', 600000, 'BB', 'Aktif', 8, ''),
(7, 2, 2311, 'csdc', 3, '2019-05-25 05:00:00', 600000, 'BB', 'Aktif', 8, '');


-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_kelas` varchar(11) DEFAULT NULL,
  `id_jenis` varchar(11) DEFAULT NULL,
  `asal_stasiun` varchar(11) DEFAULT NULL,
  `tujuan_stasiun` varchar(30) DEFAULT NULL,
  `waktu_berangkat` datetime NOT NULL,
  `waktu_sampai` datetime NOT NULL,
  `harga` int(9) DEFAULT NULL,
  `sisa_tiket` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `id_jenis`, `asal_stasiun`, `tujuan_stasiun`, `waktu_berangkat`, `waktu_sampai`, `harga`, `sisa_tiket`) VALUES
(8, 'EK-1', 'KA-ABA-1', 'ST-B BDG', 'ST-BKN MD', '2019-05-25 07:00:00', '2019-05-25 09:00:00', 200000, 14);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kereta`
--

CREATE TABLE `jenis_kereta` (
  `id_kereta` varchar(11) NOT NULL,
  `nama_kereta` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kereta`
--

INSERT INTO `jenis_kereta` (`id_kereta`, `nama_kereta`) VALUES
('KA-ABA-1', 'KA Argo Bromo Anggrek'),
('KA-ADAL-1', 'KA Argo Dwipanggadan Argo Lawu'),
('KA-AMRS-1', 'KA Argo Muria dan Argo Sindoro'),
('KA-AW-1', 'KA Argo Wilis'),
('KA-NAJ-1', 'KA New Argo Jati');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(11) NOT NULL,
  `nama_kelas` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('EK-1', 'Ekonomi'),
('EK-2', 'Eksekutif'),
('FC-1', 'FristClass');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1556792608),
('m130524_201442_init', 1556792610),
('m190124_110200_add_verification_token_column_to_user_table', 1556792611);

-- --------------------------------------------------------

--
-- Table structure for table `stasiun`
--

CREATE TABLE `stasiun` (
  `id_stasiun` varchar(11) NOT NULL,
  `nama_stasiun` varchar(30) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stasiun`
--

INSERT INTO `stasiun` (`id_stasiun`, `nama_stasiun`, `kota`) VALUES
('ST-B BDG', 'Stasiun Bandung', 'Bandung'),
('ST-BKN MD', 'Stasiun Bandar Kuala Namu', 'Medan'),
('ST-G JKT', 'Stasiun Gambir ', 'Jakarta'),
('ST-SB SL', 'Stasiun Solo Balapan', 'Solo'),
('ST-Y YKT', 'Stasiun Yogyakarta', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notelfon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `alamat`, `provinsi`, `notelfon`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(2, 'admin2', 'ZjxnTnwn_FI2H4ZEPYTVwnSdBfqMOmIx', '$2y$13$1c5a4uw.cTwk664lB0P/1ui9lM9M6zNzikUs7ngNTbjrvJxMGrIZy', NULL, 'admin2@example.com', 'Jln. Permata Kopo', 'Jawa barat', '089787467812', 1, 1558537485, 1558537485, 'A2uwSNYqHml_JgGIvTUwx9_Sz8VPGy4O_1558537485');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `history_transaksi`
--
ALTER TABLE `history_transaksi`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `iduserrelation` (`id_user`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_maskapai` (`id_jenis`),
  ADD KEY `asal_stasiun` (`asal_stasiun`),
  ADD KEY `tujuan_stasiun` (`tujuan_stasiun`);

--
-- Indexes for table `jenis_kereta`
--
ALTER TABLE `jenis_kereta`
  ADD PRIMARY KEY (`id_kereta`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id_stasiun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_transaksi`
--
ALTER TABLE `history_transaksi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_transaksi`
--
ALTER TABLE `history_transaksi`
  ADD CONSTRAINT `idjadwalrelation` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `iduserrelation` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `Jadwal-R-1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_kereta` (`id_kereta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Jadwal-R-2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Jadwal-R-3` FOREIGN KEY (`asal_stasiun`) REFERENCES `stasiun` (`id_stasiun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Jadwal-R-4` FOREIGN KEY (`tujuan_stasiun`) REFERENCES `stasiun` (`id_stasiun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
