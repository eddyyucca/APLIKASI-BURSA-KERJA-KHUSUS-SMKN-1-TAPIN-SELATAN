-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2022 at 10:48 AM
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
-- Database: `bkk2`
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
(23, '081266666666', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'aktif'),
(29, '444444444', 'e10adc3949ba59abbe56e057f20f883e', 'mitra', 'aktif'),
(31, '081250653005', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'aktif');

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
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `foto_profil` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `tentang_saya` varchar(255) NOT NULL,
  `data_pdf` text NOT NULL,
  `status_akun` varchar(10) NOT NULL,
  `tahun_lulus` varchar(20) NOT NULL,
  `bbadan` varchar(20) NOT NULL,
  `tbadan` varchar(20) NOT NULL,
  `ciriciri` text NOT NULL,
  `fb` varchar(20) NOT NULL,
  `statuskerja` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_alumni`, `nama_alumni`, `jurusan_smk`, `pendidikan_t`, `tgl_lahir`, `jk`, `alamat`, `telpon`, `agama`, `foto_profil`, `email`, `tentang_saya`, `data_pdf`, `status_akun`, `tahun_lulus`, `bbadan`, `tbadan`, `ciriciri`, `fb`, `statuskerja`) VALUES
(6, 'ahmad amin badawi', '2', 'SMK', '1997-01-12', '', 'TAPIN', '081266666666', '', '', 'aminbadawi@gmail.com', 'heheh', '', '1', '2020', '111', '111', 'sasa', 'sasas', 'Bekerja'),
(13, 'a', '2', 'a', '2022-07-22', '2', 'a', '081250653005', 'Kristen', '', 'a@a.c', '', '', '1', '11111', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `tanggal_event` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `tanggal_event`) VALUES
(1, 'sasas', '2022-07-31');

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
(9, '10', '5', '3'),
(10, '18', '6', '3');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_lowongan` varchar(100) NOT NULL,
  `isi_lowongan` text NOT NULL,
  `batas_tanggal` varchar(20) NOT NULL,
  `mitra` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `pml` varchar(255) NOT NULL,
  `pmp` varchar(255) NOT NULL,
  `jlp` varchar(255) NOT NULL,
  `jll` varchar(255) NOT NULL,
  `uml` varchar(255) NOT NULL,
  `ump` varchar(255) NOT NULL,
  `date_mulai` varchar(255) NOT NULL,
  `gd` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `nama_lowongan`, `isi_lowongan`, `batas_tanggal`, `mitra`, `foto`, `pml`, `pmp`, `jlp`, `jll`, `uml`, `ump`, `date_mulai`, `gd`) VALUES
(18, 'admin logistik', 'sasa', '2022-07-31', '3', '', 's1', 's1', '1', '1', '25', '23', '2022-07-19', '1');

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
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

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
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
