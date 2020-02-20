-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 11:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tamu` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `keterangan`, `id_ruangan`, `id_user`, `tamu`, `status`) VALUES
(21, '1998-05-17', '06:04:00', '02:07:00', 'dddd', 7, 4, 2, 'Tidak Disetujui'),
(22, '2019-03-03', '17:00:00', '17:15:00', 'zz', 7, 4, 15, 'Disetujui'),
(23, '2019-03-03', '16:00:00', '16:30:00', 'zz', 7, 4, 15, 'Disetujui'),
(24, '2019-03-03', '18:00:00', '19:15:00', 'zz', 7, 4, 15, 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `klasifikasi` varchar(10) NOT NULL,
  `letak` varchar(20) NOT NULL,
  `fasilitas` text NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `klasifikasi`, `letak`, `fasilitas`, `kapasitas`, `gambar`) VALUES
(7, 'Sridayu Guyatmojo', 'Eksekutif', 'Gedung lt.3', 'Banyak', 29, 'TPS-Logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`, `user_id`, `created`) VALUES
(1, '54263894000432ff793ba65612d552', 4, '2019-02-05'),
(2, '047ff45fd098c9a3c4e0c43cbc0299', 4, '2019-02-05'),
(3, '73563d425c20081ceff5a5bde84cf4', 4, '2019-02-05'),
(4, '7d0cc951f259aab9061ad6f4707b5b', 4, '2019-02-05'),
(5, '6b3535c289296d2baed773c1117a01', 4, '2019-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `divisi` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `divisi`, `username`, `password`, `email`, `id_level`) VALUES
(4, 'Aku Saya', '123456', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'ilhamyahya76@gmail.com', 1),
(5, '123', '123', 'admin2', '202cb962ac59075b964b07152d234b70', 'yahyailham2@gmail.com', 1),
(6, 'Dualipa', '123', 'user1', '202cb962ac59075b964b07152d234b70', '', 2),
(7, '123', '123', 'user2', '202cb962ac59075b964b07152d234b70', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
