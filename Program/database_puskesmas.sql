-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 12:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id_dokter` int(8) NOT NULL,
  `poli` enum('Umum') NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `password_dokter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_dokter`
--

INSERT INTO `data_dokter` (`id_dokter`, `poli`, `nama_dokter`, `password_dokter`) VALUES
(1, 'Umum', 'Isyana Sa.', 'd22af4180eee4bd95072eb90f94930e5'),
(2, 'Umum', 'Wong Nganjuk3', 'ayamayam'),
(3, 'Umum', 'Irina A.', 'irine'),
(4, 'Umum', 'c3653e4408832e6611f37dcd90544de8', 'dikalasenja'),
(5, 'Umum', 'Lunox XL', 'natan'),
(6, 'Umum', 'Ifa', 'ifa');

-- --------------------------------------------------------

--
-- Table structure for table `data_kunjungan`
--

CREATE TABLE `data_kunjungan` (
  `no_antrean` int(8) NOT NULL,
  `id_staff` int(8) NOT NULL,
  `no_rekmed` int(8) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `poli` enum('Umum') NOT NULL,
  `keluhan_dan_riwayat_penyakit` text NOT NULL,
  `pembayaran` enum('Tunai','Debit','e-Wallet','Asuransi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kunjungan`
--

INSERT INTO `data_kunjungan` (`no_antrean`, `id_staff`, `no_rekmed`, `tanggal_kunjungan`, `poli`, `keluhan_dan_riwayat_penyakit`, `pembayaran`) VALUES
(1, 1, 2, '2021-12-01', 'Umum', 'Skabies', 'Debit'),
(2, 1, 1, '2021-11-30', 'Umum', 'Maag dan sesak', 'Tunai'),
(4, 1, 1, '2021-12-03', 'Umum', 'Pusing', 'Asuransi'),
(6, 1, 2, '2021-12-03', 'Umum', 'wvdxjydgacsjvewf', 'e-Wallet'),
(25, 1, 2, '2021-12-04', 'Umum', 'wvdxjydgacsjvewf', 'Tunai'),
(26, 1, 2, '2021-12-01', 'Umum', 'wvdxjydgacsjvewf', 'e-Wallet'),
(27, 1, 2, '2021-12-04', 'Umum', '', 'e-Wallet'),
(28, 1, 2, '2021-12-03', 'Umum', '', 'Tunai'),
(29, 1, 1, '2021-11-29', 'Umum', 'asdas', 'Asuransi'),
(30, 1, 1, '2021-11-29', 'Umum', 'asdas', 'Asuransi'),
(31, 1, 2, '2021-06-09', 'Umum', 'capek', 'Tunai'),
(33, 1, 1, '0000-00-00', '', '', ''),
(35, 1, 2, '0000-00-00', 'Umum', '', 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_resep` int(8) NOT NULL,
  `no_rekmed` int(8) NOT NULL,
  `id_dokter` int(8) NOT NULL,
  `id_staff` int(8) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `daftar_obat` text NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_obat`
--

INSERT INTO `data_obat` (`id_resep`, `no_rekmed`, `id_dokter`, `id_staff`, `tanggal_kunjungan`, `daftar_obat`, `total_harga`) VALUES
(1, 1, 1, 1, '2021-12-03', 'Promag', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_pemeriksaan`
--

CREATE TABLE `data_pemeriksaan` (
  `id_pemeriksaan` int(8) NOT NULL,
  `no_rekmed` int(8) NOT NULL,
  `id_dokter` int(8) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `subjektif` text NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `berat_badan` decimal(4,1) NOT NULL,
  `suhu` decimal(3,1) NOT NULL,
  `sistol` int(3) NOT NULL,
  `diastol` int(3) NOT NULL,
  `diagnosis` text NOT NULL,
  `medikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pemeriksaan`
--

INSERT INTO `data_pemeriksaan` (`id_pemeriksaan`, `no_rekmed`, `id_dokter`, `tanggal_kunjungan`, `subjektif`, `tinggi_badan`, `berat_badan`, `suhu`, `sistol`, `diastol`, `diagnosis`, `medikasi`) VALUES
(1, 1, 1, '2021-11-30', 'Perut sakit', 178, '65.0', '36.1', 90, 120, 'Maag', 'Promag'),
(2, 1, 1, '2021-11-17', 'Sesak nafas, tidak ada riwayat penyakit paru-paru', 178, '65.0', '36.0', 90, 120, 'Flu biasa', 'Bodrexin '),
(4, 2, 1, '2021-12-03', 'Demam', 178, '65.0', '36.0', 90, 120, 'Flu biasa', 'Bodrexin '),
(6, 1, 2, '2021-12-03', 'Demam', 178, '65.0', '36.0', 90, 120, 'Flu biasa', 'Bodrexin '),
(9, 1, 1, '2021-12-01', 'Demam', 178, '65.0', '36.0', 90, 120, 'Flu biasa', 'Bodrexin ');

-- --------------------------------------------------------

--
-- Table structure for table `data_staff`
--

CREATE TABLE `data_staff` (
  `id_staff` int(8) NOT NULL,
  `nama_staff` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Farmasi','Administrasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_staff`
--

INSERT INTO `data_staff` (`id_staff`, `nama_staff`, `password`, `status`) VALUES
(1, 'Karina', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrasi');

-- --------------------------------------------------------

--
-- Table structure for table `data_umum_pasien`
--

CREATE TABLE `data_umum_pasien` (
  `no_rekmed` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `goldar` varchar(3) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `no_telepon_keluarga` varchar(15) NOT NULL,
  `password_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_umum_pasien`
--

INSERT INTO `data_umum_pasien` (`no_rekmed`, `nik`, `nama_pasien`, `jenis_kelamin`, `tanggal_lahir`, `goldar`, `alamat`, `pekerjaan`, `no_telepon`, `no_telepon_keluarga`, `password_pasien`) VALUES
(1, '1321321321321322', 'Aanak Ja.', 'P', '2016-12-07', 'O+', 'Jalan Kelinci 24', 'Pelajar', '087777777778', '087777877779', '3847820138564525205299f1f444c5ec'),
(2, '1321321321321334', 'Linimasa', 'L', '2016-12-07', 'AB+', 'Jalan Ayam No. 72', 'Pelajar', '087777777412', '087777877351', '3847820138564525205299f1f444c5ec');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `data_kunjungan`
--
ALTER TABLE `data_kunjungan`
  ADD PRIMARY KEY (`no_antrean`),
  ADD KEY `no_rekmed` (`no_rekmed`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `no_rekmed` (`no_rekmed`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_staff` (`id_staff`);

--
-- Indexes for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `no_rekmed` (`no_rekmed`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `data_staff`
--
ALTER TABLE `data_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `data_umum_pasien`
--
ALTER TABLE `data_umum_pasien`
  ADD PRIMARY KEY (`no_rekmed`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dokter`
--
ALTER TABLE `data_dokter`
  MODIFY `id_dokter` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_kunjungan`
--
ALTER TABLE `data_kunjungan`
  MODIFY `no_antrean` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id_resep` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  MODIFY `id_pemeriksaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data_umum_pasien`
--
ALTER TABLE `data_umum_pasien`
  MODIFY `no_rekmed` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kunjungan`
--
ALTER TABLE `data_kunjungan`
  ADD CONSTRAINT `data_kunjungan_ibfk_1` FOREIGN KEY (`no_rekmed`) REFERENCES `data_umum_pasien` (`no_rekmed`),
  ADD CONSTRAINT `data_kunjungan_ibfk_2` FOREIGN KEY (`id_staff`) REFERENCES `data_staff` (`id_staff`);

--
-- Constraints for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD CONSTRAINT `data_obat_ibfk_1` FOREIGN KEY (`no_rekmed`) REFERENCES `data_umum_pasien` (`no_rekmed`),
  ADD CONSTRAINT `data_obat_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `data_dokter` (`id_dokter`),
  ADD CONSTRAINT `data_obat_ibfk_3` FOREIGN KEY (`id_staff`) REFERENCES `data_staff` (`id_staff`);

--
-- Constraints for table `data_pemeriksaan`
--
ALTER TABLE `data_pemeriksaan`
  ADD CONSTRAINT `data_pemeriksaan_ibfk_1` FOREIGN KEY (`no_rekmed`) REFERENCES `data_umum_pasien` (`no_rekmed`),
  ADD CONSTRAINT `data_pemeriksaan_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `data_dokter` (`id_dokter`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
