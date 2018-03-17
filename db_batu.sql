/*
Navicat MySQL Data Transfer

Source Server         : LocalHOSTMYSQL
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : db_batu

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2018-03-17 08:32:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for batu
-- ----------------------------
DROP TABLE IF EXISTS `batu`;
CREATE TABLE `batu` (
  `id_batu` int(10) NOT NULL AUTO_INCREMENT,
  `id_tipebatu` int(10) NOT NULL,
  `nama_batu` varchar(200) DEFAULT NULL,
  `tgl_input` varchar(10) DEFAULT NULL,
  `foto` text,
  `soft_delete` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id_batu`),
  KEY `id_tipebatu` (`id_tipebatu`),
  CONSTRAINT `batu_ibfk_1` FOREIGN KEY (`id_tipebatu`) REFERENCES `tipe_batu` (`id_tipebatu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of batu
-- ----------------------------
INSERT INTO `batu` VALUES ('15', '1', 'batu 1', '2018-03-04', 'alur_bkk.png', '1');
INSERT INTO `batu` VALUES ('16', '4', 'mx098-0998', '2018-03-04', 'nankai_nankai-batu-gerinda-asah--100--8-inch-_full03.jpg', '0');
INSERT INTO `batu` VALUES ('17', '4', 'Gerinda Besi', '2018-03-08', 'bosch.jpg', '0');
INSERT INTO `batu` VALUES ('18', '9', 'test-mc23', '2018-03-09', 'bosch1.jpg', '0');

-- ----------------------------
-- Table structure for dtl_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `dtl_pengguna`;
CREATE TABLE `dtl_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `id_dtl_pengguna` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_dtl_pengguna`),
  KEY `id_pengguna` (`id_pengguna`),
  CONSTRAINT `dtl_pengguna_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dtl_pengguna
-- ----------------------------

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level` (
  `id_level` int(10) NOT NULL AUTO_INCREMENT,
  `level` varchar(200) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES ('1', 'Admin');
INSERT INTO `level` VALUES ('2', 'Operator');

-- ----------------------------
-- Table structure for mesin
-- ----------------------------
DROP TABLE IF EXISTS `mesin`;
CREATE TABLE `mesin` (
  `id_mesin` int(10) NOT NULL AUTO_INCREMENT,
  `nama_mesin` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `soft_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mesin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mesin
-- ----------------------------

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id_pengguna` int(10) NOT NULL AUTO_INCREMENT,
  `id_level` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_pengguna` varchar(255) DEFAULT NULL,
  `soft_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`id_pengguna`),
  KEY `id_level` (`id_level`),
  CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES ('1', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', null);
INSERT INTO `pengguna` VALUES ('2', '2', 'ops', '21232f297a57a5a743894a0e4a801fc3', 'Operator', null);

-- ----------------------------
-- Table structure for penggunaan_batu
-- ----------------------------
DROP TABLE IF EXISTS `penggunaan_batu`;
CREATE TABLE `penggunaan_batu` (
  `id_mesin` int(10) DEFAULT NULL,
  `id_penggunaan` int(10) NOT NULL AUTO_INCREMENT,
  `id_batu` int(10) NOT NULL,
  `tgl_penggunaan` varchar(10) DEFAULT NULL,
  `waktu_penggunaan` int(10) DEFAULT NULL,
  `foto` text,
  `ket` text,
  `id_pengguna` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_penggunaan`),
  KEY `id_batu` (`id_batu`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_mesin` (`id_mesin`) USING BTREE,
  CONSTRAINT `penggunaan_batu_ibfk_3` FOREIGN KEY (`id_mesin`) REFERENCES `mesin` (`id_mesin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penggunaan_batu_ibfk_1` FOREIGN KEY (`id_batu`) REFERENCES `batu` (`id_batu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penggunaan_batu_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penggunaan_batu
-- ----------------------------

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set_name` varchar(255) DEFAULT NULL,
  `set_data` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'site_name', 'Aplikasi Pencatatan penggunaan cutting tool');
INSERT INTO `settings` VALUES ('2', 'max_time', '600');

-- ----------------------------
-- Table structure for tipe_batu
-- ----------------------------
DROP TABLE IF EXISTS `tipe_batu`;
CREATE TABLE `tipe_batu` (
  `id_tipebatu` int(10) NOT NULL AUTO_INCREMENT,
  `tipe_batu` varchar(200) NOT NULL,
  `soft_delete` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_tipebatu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipe_batu
-- ----------------------------
INSERT INTO `tipe_batu` VALUES ('1', 'Batu Gerinda', '1');
INSERT INTO `tipe_batu` VALUES ('2', 'tambah', '1');
INSERT INTO `tipe_batu` VALUES ('3', 'Mount Stone', '1');
INSERT INTO `tipe_batu` VALUES ('4', 'Batu Gerinda Besar', '1');
INSERT INTO `tipe_batu` VALUES ('5', 'sela', '1');
INSERT INTO `tipe_batu` VALUES ('6', 'ech', '0');
INSERT INTO `tipe_batu` VALUES ('7', 'Test AH', '1');
INSERT INTO `tipe_batu` VALUES ('8', 'Ball Mill', '1');
INSERT INTO `tipe_batu` VALUES ('9', 'Shape Mill', '0');
