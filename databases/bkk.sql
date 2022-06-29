-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2022 at 07:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkk`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','user','mitra') NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `telpon`, `password`, `level`, `status`) VALUES
(22, '081250653005', '4297f44b13955235245b2497399d7a93', 'user', 'aktif'),
(23, '081266666666', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'aktif'),
(25, '081250653002', 'e10adc3949ba59abbe56e057f20f883e', 'user', 'aktif'),
(27, '081250653000', 'e10adc3949ba59abbe56e057f20f883e', 'user', 'aktif'),
(28, '121212121212', 'e10adc3949ba59abbe56e057f20f883e', 'user', 'aktif'),
(29, '444444444', 'e10adc3949ba59abbe56e057f20f883e', 'mitra', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(11) NOT NULL,
  `nama_alumni` varchar(255) NOT NULL,
  `jurusan_smk` varchar(20) NOT NULL,
  `pendidikan_t` varchar(255) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `foto_profil` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `tentang_saya` varchar(255) NOT NULL,
  `data_pdf` text NOT NULL,
  `status_akun` varchar(10) NOT NULL,
  `tahun_lulus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `nama_alumni`, `jurusan_smk`, `pendidikan_t`, `tgl_lahir`, `alamat`, `telpon`, `agama`, `foto_profil`, `email`, `tentang_saya`, `data_pdf`, `status_akun`, `tahun_lulus`) VALUES
(5, 'eddy adha saputra', '2', 'as', '2022-01-12', 'Banjar Baru Selatan', '081250653005', 'Islam', 'aku.jpg', 'eddyyucca@gmail.com', 'tes ini aku\r\n', '2111NA77961.pdf', '1', '2019'),
(6, 'ahmad amin badawi', '2', 'SMK', '2022-01-12', 'TAPIN', '081266666666', 'Islam', '5f4df47203808.jpg', 'aminbadawi@gmail.com', '', '', '1', '2020'),
(8, 'eddy adha saputra', '2', 'as', '2021-12-31', 'Banjar Baru Selatan', '081250653002', 'Islam', 'Snapchat-897986893.jpg', 'eddyyucca2@gmail.com', '', '', '1', '2021'),
(10, 'amin 2', '2', 'SMK', '2022-02-05', 'Banjar Baru Selatan', '081250653000', 'Islam', '', 'eddyyucca123@gmail.com', '', '', '1', '2020'),
(11, 'yenta', '2', 's1', '2000-06-28', 'tapin', '121212121212', 'Islam', '', 'eddy@gmail.com', '', '', '1', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(2, 'tkr 2');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_lowongan` varchar(30) NOT NULL,
  `id_alumni` varchar(30) NOT NULL,
  `status_lamaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lamaran`, `id_lowongan`, `id_alumni`, `status_lamaran`) VALUES
(9, '10', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_lowongan` varchar(100) NOT NULL,
  `isi_lowongan` text NOT NULL,
  `batas_tanggal` varchar(20) NOT NULL,
  `id_mitra` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `nama_lowongan`, `isi_lowongan`, `batas_tanggal`, `id_mitra`, `foto`) VALUES
(4, 'sasa', 'sa', '2022-01-15', 'a', ''),
(6, 'sasa', 'aaaa', '2022-01-31', 'aaaaa', ''),
(8, '123', 'sakksakslj', '2022-01-28', '123', ''),
(9, 'qqqqqqqqq', 'qqqq ', '2022-01-29', 'qqqqq', 'bri-logo.png'),
(10, 'assas', 'as ', '2022-02-02', 'sasasas', 'wallpaperbetter_com_1280x1024_(2).jpg'),
(11, 'sas', 'sasa', '2022-02-12', 'sas', ''),
(12, 'tes', 'salsa', '2022-06-30', '3', ''),
(13, 'admin', 'sasaa', '2022-07-01', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(50) NOT NULL,
  `profil_mitra` text NOT NULL,
  `logo_mitra` text NOT NULL,
  `email_mitra` varchar(20) NOT NULL,
  `telpon_mitra` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `profil_mitra`, `logo_mitra`, `email_mitra`, `telpon_mitra`) VALUES
(3, 'aaa', '4ds', '', 'a@a.a', '444444444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lamaran`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
