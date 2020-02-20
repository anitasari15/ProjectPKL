-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2020 pada 12.58
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `reservasi`
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
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `keterangan`, `id_ruangan`, `id_user`, `tamu`, `status`) VALUES
(21, '2019-03-20', '07:04:00', '07:24:00', 'dddd', 7, 4, 2, 'Disetujui'),
(22, '2019-03-20', '08:00:00', '10:00:00', 'ssdd', 7, 4, 15, 'Disetujui'),
(25, '2019-03-20', '18:30:00', '19:11:00', 'dd', 7, 4, 12, 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
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
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`, `klasifikasi`, `letak`, `fasilitas`, `kapasitas`, `gambar`) VALUES
(7, 'Sridayu Guyatmojo', 'reguler', 'Gedung lt.4', 'Banyak', 29, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id`, `token`, `user_id`, `created`) VALUES
(1, '54263894000432ff793ba65612d552', 4, '2019-02-05'),
(2, '173b8752ecf1f80d2e736330c164c6', 5, '2019-02-06'),
(3, '2b41dd792531169af3882d212e6124', 5, '2019-02-06'),
(4, '0b67b676b6bd770a43574b5a2efbe5', 5, '2019-02-08'),
(5, '38a45731a3a4dc00c3c9e5f0e8a9f5', 5, '2019-02-14'),
(6, '4deb4a74758ff38c377d2c452d46ec', 5, '2019-06-10'),
(7, '5a22f86bb350302450de5bc5ad8f0f', 5, '2019-06-10'),
(8, 'bceed21231383f64a2d3a6f6d2f8ad', 5, '2019-06-10'),
(9, '51a0601f5f2a33f60fbd140a837d4d', 5, '2020-02-17'),
(10, '4898d36842ed28465c64a694f5084f', 5, '2020-02-17'),
(11, 'f16684ce89463f1dc7bd521e95c076', 5, '2020-02-17'),
(12, '420584f2caac0d839b267f7c6f675b', 5, '2020-02-17'),
(13, '314d6b11b34cb5abd24fd7ce24a39e', 5, '2020-02-17'),
(14, '4d3a74186004dd96345907cffc437a', 5, '2020-02-17'),
(15, '563bd8cb6c34f6eb7f36b04a9bcfd7', 5, '2020-02-17'),
(16, '3acb1c34860af372e503dc827cd1aa', 5, '2020-02-17'),
(17, '500d9af06e0788f2e385c6eca34691', 5, '2020-02-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `divisi`, `username`, `password`, `email`, `id_level`) VALUES
(4, '666', '123456', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ilhamyahya76@gmail.com', 1),
(5, '123', '123', 'admin2', '83349cbdac695f3943635a4fd1aaa7d0', 'anitasari.as250@gmail.com', 1),
(6, '123', '123', 'user1', '827ccb0eea8a706c4c34a16891f84e7b', '', 2),
(7, '123', '123', 'user2', '202cb962ac59075b964b07152d234b70', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
