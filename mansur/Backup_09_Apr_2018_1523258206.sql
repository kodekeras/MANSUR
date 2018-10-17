DROP TABLE tbl_disposisi;

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

INSERT INTO tbl_disposisi VALUES("1","Kepala Sekolah","Rapat","Biasa","2018-04-18","Rapat","16","1");



DROP TABLE tbl_instansi;

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

INSERT INTO tbl_instansi VALUES("1","YPDM Bakti Nusantara 666","SMK Bakti Nusantara 666","Swasta","Jl. Pecobaan No 66, Cileunyi, Kab. Bandung","Deni Danis Suara","-","http://www.repo.smkbn666.com","smkbaknus666@smkbn.com","6FRyH454_400x400.png","1");



DROP TABLE tbl_klasifikasi;

CREATE TABLE `tbl_klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

INSERT INTO tbl_klasifikasi VALUES("50","000","Umum","Umum","1");
INSERT INTO tbl_klasifikasi VALUES("51","100","Pemerintahan","Pemerintahan","1");
INSERT INTO tbl_klasifikasi VALUES("52","200","Politik","Politik","1");
INSERT INTO tbl_klasifikasi VALUES("53","300","Kemanan dan Ketertiban","Kemanan dan Ketertiban","1");
INSERT INTO tbl_klasifikasi VALUES("54","400","Kesejahtraan","Kesejahtraan","1");
INSERT INTO tbl_klasifikasi VALUES("55","500","Perekonomian","Perekonomian","1");
INSERT INTO tbl_klasifikasi VALUES("56","600","Pekerjaan umum dan Ketenagakerjaan","Pekerjaan umum dan Ketenagakerjaan","1");
INSERT INTO tbl_klasifikasi VALUES("57","700","Pengawasan","Pengawasan","1");
INSERT INTO tbl_klasifikasi VALUES("58","800","Kepegawaian","Kepegawaian","1");
INSERT INTO tbl_klasifikasi VALUES("59","900","Keuangan","Keuangan","1");



DROP TABLE tbl_sett;

CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(1) NOT NULL,
  `surat_masuk` tinyint(2) NOT NULL,
  `surat_keluar` tinyint(2) NOT NULL,
  `referensi` tinyint(2) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_sett`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_sett VALUES("1","20","5","10","1");



DROP TABLE tbl_surat_keluar;

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

INSERT INTO tbl_surat_keluar VALUES("2","1","Siswa","420 / 015 /SMK.AH/VIII/2015","Surat edaran untuk mengikuti kegiatan sholat Idhul Adha di sekolah.","421.6","2015-08-28","2016-07-24","4718-surat keluar 1.jpg","Wajib","5");
INSERT INTO tbl_surat_keluar VALUES("3","2","Darmaji, S.T. (Guru)","421 / 056 /SMK-AH / XII /2015","Surat tugas untuk menghadiri undangan Penganugerahan Bursa Khusus SMK","421","2015-12-07","2016-07-24","7773-surat keluar 2.jpg","-","5");
INSERT INTO tbl_surat_keluar VALUES("4","3","Siswa","421/059/SMK-AH/XII/2015","Surat edaran pelaksanaan praktik kerja industri (Prakerin)","421","2015-12-17","2016-07-24","","Penting","5");
INSERT INTO tbl_surat_keluar VALUES("5","4","Guru","042/067 / SMk-AH/I/2016","Surat undangan rapat dinas koordinasi ujian sekolah\n","421","2016-02-01","2016-07-24","","Wajib Hadir","5");



DROP TABLE tbl_surat_masuk;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO tbl_surat_masuk VALUES("14","1","251/SMKGM/IV/2018","Kepala Sekolah SMK Gadjah Mada","Membahas rencana kerja sama UNBK antara sekolah SMK Gadjah Mada dan SMK Bakti Nusantara 666","000","A1","2018-04-09","2018-04-09","8846-surat resmi sekolah.jpg","Penting","1");
INSERT INTO tbl_surat_masuk VALUES("15","1","252/SMKGP/IV/2018","SMK Gadjah Depa","Membahas Kerjasama UJIKOM antara SMK Gadjah Depa dengan SMK Bakti Nusantara 666","000","A1","2018-04-09","2018-04-09","","Penting","1");
INSERT INTO tbl_surat_masuk VALUES("16","4","242/SMKTB/IV/2018","SMK Tunas Bangsa","Kegiatan Studi Banding","000","A.4","2018-04-09","2018-04-09","4255-surat resmi sekolah.jpg","Penting","1");



DROP TABLE tbl_user;

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_user VALUES("1","farhan666","9db6de0638c0714b00728112b09e0b3c","Farhan Yudhi Fatah","151609070060","1");
INSERT INTO tbl_user VALUES("2","disposisi","13bb8b589473803f26a02e338f949b8c","Petugas Disposisi","-","3");



