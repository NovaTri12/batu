-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 02:46 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_batu`
--
CREATE DATABASE IF NOT EXISTS `db_batu` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_batu`;

-- --------------------------------------------------------

--
-- Table structure for table `batu`
--

CREATE TABLE IF NOT EXISTS `batu` (
  `id_batu` int(10) NOT NULL AUTO_INCREMENT,
  `id_tipebatu` int(10) NOT NULL,
  `nama_batu` varchar(200) DEFAULT NULL,
  `tgl_input` varchar(10) DEFAULT NULL,
  `foto` text,
  `soft_delete` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id_batu`),
  KEY `id_tipebatu` (`id_tipebatu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `batu`
--

INSERT INTO `batu` (`id_batu`, `id_tipebatu`, `nama_batu`, `tgl_input`, `foto`, `soft_delete`) VALUES
(15, 1, 'batu 1', '2018-03-04', 'alur_bkk.png', '0'),
(16, 4, 'mx098-0998', '2018-03-04', 'nankai_nankai-batu-gerinda-asah--100--8-inch-_full03.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `dtl_pengguna`
--

CREATE TABLE IF NOT EXISTS `dtl_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `id_dtl_pengguna` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_dtl_pengguna`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(10) NOT NULL AUTO_INCREMENT,
  `level` varchar(200) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Admin'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(10) NOT NULL AUTO_INCREMENT,
  `id_level` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `id_level` (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_level`, `username`, `password`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 2, 'ops', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_batu`
--

CREATE TABLE IF NOT EXISTS `penggunaan_batu` (
  `id_penggunaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_batu` int(10) NOT NULL,
  `tgl_penggunaan` varchar(10) DEFAULT NULL,
  `waktu_penggunaan` int(10) DEFAULT NULL,
  `foto` text,
  `ket` text,
  `id_pengguna` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_penggunaan`),
  KEY `id_batu` (`id_batu`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set_name` varchar(255) DEFAULT NULL,
  `set_data` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `set_name`, `set_data`) VALUES
(1, 'site_name', 'Aplikasi Pencatatan penggunaan cutting tool'),
(2, 'max_time', '600');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_batu`
--

CREATE TABLE IF NOT EXISTS `tipe_batu` (
  `id_tipebatu` int(10) NOT NULL AUTO_INCREMENT,
  `tipe_batu` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipebatu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tipe_batu`
--

INSERT INTO `tipe_batu` (`id_tipebatu`, `tipe_batu`) VALUES
(1, 'Batu Gerinda'),
(2, 'tambah'),
(3, 'Mount Stone'),
(4, 'Batu Gerinda Besar'),
(5, 'sela'),
(6, 'ech'),
(7, 'Test AH');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batu`
--
ALTER TABLE `batu`
  ADD CONSTRAINT `batu_ibfk_1` FOREIGN KEY (`id_tipebatu`) REFERENCES `tipe_batu` (`id_tipebatu`);

--
-- Constraints for table `dtl_pengguna`
--
ALTER TABLE `dtl_pengguna`
  ADD CONSTRAINT `dtl_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `penggunaan_batu`
--
ALTER TABLE `penggunaan_batu`
  ADD CONSTRAINT `penggunaan_batu_ibfk_1` FOREIGN KEY (`id_batu`) REFERENCES `batu` (`id_batu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penggunaan_batu_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
