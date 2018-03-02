-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mar 2018 pada 03.53
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_batu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `batu`
--

CREATE TABLE `batu` (
  `id_batu` int(10) NOT NULL,
  `id_tipebatu` int(10) NOT NULL,
  `nama_batu` varchar(200) DEFAULT NULL,
  `tgl_input` varchar(10) DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_pengguna`
--

CREATE TABLE `dtl_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `id_dtl_pengguna` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `id_level` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan_batu`
--

CREATE TABLE `penggunaan_batu` (
  `id_penggunaan` int(10) NOT NULL,
  `id_batu` int(10) NOT NULL,
  `tgl_penggunaan` varchar(10) DEFAULT NULL,
  `waktu_penggunaan` int(10) DEFAULT NULL,
  `foto` text,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_batu`
--

CREATE TABLE `tipe_batu` (
  `id_tipebatu` int(10) NOT NULL,
  `tipe_batu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batu`
--
ALTER TABLE `batu`
  ADD PRIMARY KEY (`id_batu`),
  ADD KEY `id_tipebatu` (`id_tipebatu`);

--
-- Indexes for table `dtl_pengguna`
--
ALTER TABLE `dtl_pengguna`
  ADD PRIMARY KEY (`id_dtl_pengguna`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `penggunaan_batu`
--
ALTER TABLE `penggunaan_batu`
  ADD PRIMARY KEY (`id_penggunaan`),
  ADD KEY `id_batu` (`id_batu`);

--
-- Indexes for table `tipe_batu`
--
ALTER TABLE `tipe_batu`
  ADD PRIMARY KEY (`id_tipebatu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batu`
--
ALTER TABLE `batu`
  MODIFY `id_batu` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dtl_pengguna`
--
ALTER TABLE `dtl_pengguna`
  MODIFY `id_dtl_pengguna` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penggunaan_batu`
--
ALTER TABLE `penggunaan_batu`
  MODIFY `id_penggunaan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_batu`
--
ALTER TABLE `tipe_batu`
  MODIFY `id_tipebatu` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `batu`
--
ALTER TABLE `batu`
  ADD CONSTRAINT `batu_ibfk_1` FOREIGN KEY (`id_tipebatu`) REFERENCES `tipe_batu` (`id_tipebatu`);

--
-- Ketidakleluasaan untuk tabel `dtl_pengguna`
--
ALTER TABLE `dtl_pengguna`
  ADD CONSTRAINT `dtl_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `penggunaan_batu`
--
ALTER TABLE `penggunaan_batu`
  ADD CONSTRAINT `penggunaan_batu_ibfk_1` FOREIGN KEY (`id_batu`) REFERENCES `batu` (`id_batu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
