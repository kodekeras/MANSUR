-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: surat
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_disposisi`
--

DROP TABLE IF EXISTS `tbl_disposisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(10) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(250) NOT NULL,
  `isi_disposisi` mediumtext NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_disposisi`
--

LOCK TABLES `tbl_disposisi` WRITE;
/*!40000 ALTER TABLE `tbl_disposisi` DISABLE KEYS */;
INSERT INTO `tbl_disposisi` (`id_disposisi`, `tujuan`, `isi_disposisi`, `sifat`, `batas_waktu`, `catatan`, `id_surat`, `id_user`) VALUES (1,'Kepala Sekolah','Rapat','Biasa','2018-04-18','Rapat',16,1);
/*!40000 ALTER TABLE `tbl_disposisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_instansi`
--

DROP TABLE IF EXISTS `tbl_instansi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_instansi`
--

LOCK TABLES `tbl_instansi` WRITE;
/*!40000 ALTER TABLE `tbl_instansi` DISABLE KEYS */;
INSERT INTO `tbl_instansi` (`id_instansi`, `institusi`, `nama`, `status`, `alamat`, `kepsek`, `nip`, `website`, `email`, `logo`, `id_user`) VALUES (1,'YPDM Bakti Nusantara 666','SMK Bakti Nusantara 666','Swasta','Jl. Pecobaan No 66, Cileunyi, Kab. Bandung','Deni Danis Suara','-','http://www.repo.smkbn666.com','smkbaknus666@smkbn.com','6FRyH454_400x400.png',1);
/*!40000 ALTER TABLE `tbl_instansi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_klasifikasi`
--

DROP TABLE IF EXISTS `tbl_klasifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_klasifikasi`
--

LOCK TABLES `tbl_klasifikasi` WRITE;
/*!40000 ALTER TABLE `tbl_klasifikasi` DISABLE KEYS */;
INSERT INTO `tbl_klasifikasi` (`id_klasifikasi`, `kode`, `nama`, `uraian`, `id_user`) VALUES (50,'000','Umum','Umum',1),(51,'100','Pemerintahan','Pemerintahan',1),(52,'200','Politik','Politik',1),(53,'300','Kemanan dan Ketertiban','Kemanan dan Ketertiban',1),(54,'400','Kesejahtraan','Kesejahtraan',1),(55,'500','Perekonomian','Perekonomian',1),(56,'600','Pekerjaan umum dan Ketenagakerjaan','Pekerjaan umum dan Ketenagakerjaan',1),(57,'700','Pengawasan','Pengawasan',1),(58,'800','Kepegawaian','Kepegawaian',1),(59,'900','Keuangan','Keuangan',1);
/*!40000 ALTER TABLE `tbl_klasifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sett`
--

DROP TABLE IF EXISTS `tbl_sett`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(1) NOT NULL,
  `surat_masuk` tinyint(2) NOT NULL,
  `surat_keluar` tinyint(2) NOT NULL,
  `referensi` tinyint(2) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_sett`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sett`
--

LOCK TABLES `tbl_sett` WRITE;
/*!40000 ALTER TABLE `tbl_sett` DISABLE KEYS */;
INSERT INTO `tbl_sett` (`id_sett`, `surat_masuk`, `surat_keluar`, `referensi`, `id_user`) VALUES (1,20,5,10,1);
/*!40000 ALTER TABLE `tbl_sett` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_surat_keluar`
--

DROP TABLE IF EXISTS `tbl_surat_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_surat_keluar` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(10) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_surat_keluar`
--

LOCK TABLES `tbl_surat_keluar` WRITE;
/*!40000 ALTER TABLE `tbl_surat_keluar` DISABLE KEYS */;
INSERT INTO `tbl_surat_keluar` (`id_surat`, `no_agenda`, `tujuan`, `no_surat`, `isi`, `kode`, `tgl_surat`, `tgl_catat`, `file`, `keterangan`, `id_user`) VALUES (2,1,'Siswa','420 / 015 /SMK.AH/VIII/2015','Surat edaran untuk mengikuti kegiatan sholat Idhul Adha di sekolah.','421.6','2015-08-28','2016-07-24','4718-surat keluar 1.jpg','Wajib',5),(3,2,'Darmaji, S.T. (Guru)','421 / 056 /SMK-AH / XII /2015','Surat tugas untuk menghadiri undangan Penganugerahan Bursa Khusus SMK','421','2015-12-07','2016-07-24','7773-surat keluar 2.jpg','-',5),(4,3,'Siswa','421/059/SMK-AH/XII/2015','Surat edaran pelaksanaan praktik kerja industri (Prakerin)','421','2015-12-17','2016-07-24','','Penting',5),(5,4,'Guru','042/067 / SMk-AH/I/2016','Surat undangan rapat dinas koordinasi ujian sekolah\r\n','421','2016-02-01','2016-07-24','','Wajib Hadir',5);
/*!40000 ALTER TABLE `tbl_surat_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_surat_masuk`
--

DROP TABLE IF EXISTS `tbl_surat_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_surat_masuk` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(10) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_surat_masuk`
--

LOCK TABLES `tbl_surat_masuk` WRITE;
/*!40000 ALTER TABLE `tbl_surat_masuk` DISABLE KEYS */;
INSERT INTO `tbl_surat_masuk` (`id_surat`, `no_agenda`, `no_surat`, `asal_surat`, `isi`, `kode`, `indeks`, `tgl_surat`, `tgl_diterima`, `file`, `keterangan`, `id_user`) VALUES (14,1,'251/SMKGM/IV/2018','Kepala Sekolah SMK Gadjah Mada','Membahas rencana kerja sama UNBK antara sekolah SMK Gadjah Mada dan SMK Bakti Nusantara 666','000','A1','2018-04-09','2018-04-09','8846-surat resmi sekolah.jpg','Penting',1),(15,1,'252/SMKGP/IV/2018','SMK Gadjah Depa','Membahas Kerjasama UJIKOM antara SMK Gadjah Depa dengan SMK Bakti Nusantara 666','000','A1','2018-04-09','2018-04-09','','Penting',1),(16,4,'242/SMKTB/IV/2018','SMK Tunas Bangsa','Kegiatan Studi Banding','000','A.4','2018-04-09','2018-04-09','4255-surat resmi sekolah.jpg','Penting',1),(17,1,'139/SMKDP01','SMK Guntur','dawhidahidaw','400','A.1','2018-04-09','2018-04-09','7392-surat resmi sekolah.jpg','hdiwahdiahwdaw',1);
/*!40000 ALTER TABLE `tbl_surat_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama`, `nip`, `admin`) VALUES (1,'farhan666','9db6de0638c0714b00728112b09e0b3c','Farhan Yudhi Fatah','151609070060',1),(2,'disposisi','13bb8b589473803f26a02e338f949b8c','Petugas Disposisi','-',3);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-10  8:03:43
