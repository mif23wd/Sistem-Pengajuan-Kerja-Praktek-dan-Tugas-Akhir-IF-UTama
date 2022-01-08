-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 01:56 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sisprodiif`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_datakp`
--

CREATE TABLE IF NOT EXISTS `t_datakp` (
`id_kp` int(111) NOT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_kp` text,
  `nid` varchar(30) DEFAULT NULL,
  `pembimbing_kp` varchar(50) DEFAULT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` text,
  `pembimbinglap` varchar(50) DEFAULT NULL,
  `tanggal_peng` date DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `status` enum('Dalam Bimbingan','Perpanjang','Lulus') DEFAULT NULL,
  `status_selesai` enum('Pembimbing Ok','Lulus') DEFAULT NULL,
  `tanggal_laporan` date DEFAULT NULL,
  `semester_akhir` int(11) DEFAULT NULL,
  `nilai` int(111) DEFAULT NULL,
  `topik_kp_sebelum` text,
  `perusahaan_sebelum` varchar(50) DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `tahun_akademik_lulus` varchar(9) DEFAULT NULL,
  `semesterh_lulus` enum('Ganjil','Genap') DEFAULT NULL,
  `nilaih` varchar(1) DEFAULT NULL,
  `lampiran_foto` text,
  `nidn` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_datakp`
--

INSERT INTO `t_datakp` (`id_kp`, `nama_mahasiswa`, `npm`, `semester`, `alamat`, `telepon`, `email`, `topik_kp`, `nid`, `pembimbing_kp`, `nama_perusahaan`, `alamat_perusahaan`, `pembimbinglap`, `tanggal_peng`, `tanggal_awal`, `tanggal_akhir`, `status`, `status_selesai`, `tanggal_laporan`, `semester_akhir`, `nilai`, `topik_kp_sebelum`, `perusahaan_sebelum`, `tahun_akademik_peng`, `tahun_akademik_lulus`, `semesterh_lulus`, `nilaih`, `lampiran_foto`, `nidn`) VALUES
(1, 'Muhammad Ihsan Fadhil', '0613u049', 10, 'Komplek Manglayang Sari A9B8 RT02 RW13, Kelurahan Palasari, Kecamatan Cibiru, Kota Bandung', '08561117503', 'mif23wd@gmail.com', 'Sistem Pengajuan Kerja Praktek dan Tugas Akhir di Program Studi Universitas Widyatama', '01011021009', 'Dosen 9', 'Prodi Teknik Infromatika Universitas Widyatama', 'Jln Cikutra No.211A, Bandung', 'Dhani Indra Gunawan', '2018-04-26', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', NULL, NULL, NULL, 'Sistem Borang Akreditasi PMW Universitas Widyatama', 'Penjamin Mutu Widyatama', '2017/2018', '', NULL, NULL, '3x4.jpg', '01011021001009'),
(2, 'Julian Faubert', '0613u048', 11, 'Samarinda, Kalimantan', '081234567890', 'faubert@gmail.com', 'Cara tidak tidur ketika di bench', '01011021010', 'Dosen 10', 'Real Madrid', 'Madrid, Spain', 'Juande Ramos', '2018-04-26', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', NULL, NULL, NULL, '', '', '2017/2018', '', NULL, NULL, 'Legends_BryanRobson_ashx.jpg', '01011021001010'),
(3, 'Son Goku', '0613u091', 7, 'Rumahnya di bumi', '081222222222', 'goku@gmail.com', 'Mengalahkan semua orang kuat di setiap universe', '01011021003', 'Dosen 3', 'Universe 7', 'Dunia ke 7', 'Beerus', '2015-11-10', '2015-08-10', '2016-02-10', 'Lulus', '', '2016-01-12', 8, 96, '', '', '2015/2016', '2015/2016', 'Genap', 'A', 'goku_ssgss_face_dbs_by_jaredsongohan-da8hm0c.png', '01011021001003'),
(4, 'Juan Manuel Mata Garcia', '0613u047', 8, 'Madrid, Spain', '081234564434', 'mata8@gmail.com', 'Main sebagai AMF di Manchester United F.C', '01011021094', 'Dosen 94', 'Manchester United F.C', 'Sir Bobby Charlton Street, Manchester, UK', 'Jose Mourinho', '2018-04-27', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', NULL, NULL, NULL, NULL, NULL, NULL, '2017/2018', NULL, NULL, NULL, 'mata.jpg', '01011021001094'),
(5, 'Muhammad fadillah', '0615101038', 7, 'bandung', '081234567890', 'lupa@hotmail.com', 'jgjgjgjgjgjhgjhgjh', '01011021001', 'Dosen 1', 'hkhk', 'gjgjgjhg', 'ibenk', '2018-05-09', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', NULL, NULL, NULL, NULL, NULL, NULL, '2017/2018', NULL, NULL, NULL, 'SpongeBob_(5).png', '01011021001001');

-- --------------------------------------------------------

--
-- Table structure for table `t_datata`
--

CREATE TABLE IF NOT EXISTS `t_datata` (
`id_ta` int(111) NOT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_ta` text,
  `nid` varchar(30) DEFAULT NULL,
  `pembimbing_ta` varchar(50) DEFAULT NULL,
  `tanggal_peng` date DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `status` enum('Dalam Bimbingan','Lulus') DEFAULT NULL,
  `topik_ta_sebelum` text,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_panjang` date DEFAULT NULL,
  `batas_waktu` varchar(50) DEFAULT NULL,
  `ipk` float DEFAULT NULL,
  `penguji1` varchar(50) DEFAULT NULL,
  `penguji2` varchar(50) DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `waktu_sidang` varchar(5) DEFAULT NULL,
  `tempat_sidang` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `tanggal_yudisium` date DEFAULT NULL,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `tanggal_pra_sid` date DEFAULT NULL,
  `status_pra_sid` varchar(30) DEFAULT NULL,
  `waktu_pra_sid` varchar(5) DEFAULT NULL,
  `penguji_pra_sid` varchar(50) DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `tahun_akademik_lulus` varchar(9) DEFAULT NULL,
  `semesterh_lulus` enum('Ganjil','Genap') DEFAULT NULL,
  `lampiran_foto` text,
  `lampiran_proposal` text,
  `nidn` varchar(30) DEFAULT NULL,
  `tempat_pra_sid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_datata`
--

INSERT INTO `t_datata` (`id_ta`, `nama_mahasiswa`, `npm`, `semester`, `alamat`, `telepon`, `email`, `topik_ta`, `nid`, `pembimbing_ta`, `tanggal_peng`, `tanggal_awal`, `tanggal_akhir`, `status`, `topik_ta_sebelum`, `tanggal_lahir`, `tempat_lahir`, `tanggal_panjang`, `batas_waktu`, `ipk`, `penguji1`, `penguji2`, `tanggal_sidang`, `waktu_sidang`, `tempat_sidang`, `keterangan`, `tanggal_yudisium`, `konsentrasi`, `tanggal_pra_sid`, `status_pra_sid`, `waktu_pra_sid`, `penguji_pra_sid`, `tahun_akademik_peng`, `tahun_akademik_lulus`, `semesterh_lulus`, `lampiran_foto`, `lampiran_proposal`, `nidn`, `tempat_pra_sid`) VALUES
(1, 'Nathan Drake', '0613u051', 8, 'Kuala Lumpur, Malaysia', '081234567666', 'uncharted@gmail.com', 'Mencari harta karun bajak laut avery, dan bersaing dengan teman lama', '01011021011', 'Dosen 11', '2018-04-26', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', '1994-12-16', 'New York', NULL, NULL, NULL, '', '', NULL, '', '', '', NULL, 'Information Technology', NULL, '', '', '', '2017/2018', '', '', 'Digivolving_Alphamon_Ouryuken_Gallantmon_Crimson_Mode_-_Cyber_Sleuth-_Hackers_Memory_MKV_snapshot_00_40.jpg', 'LAPORAN_PERKEMBANGAN_PROYEK_INTERNET_OF_THINGS_UNTUK_DISERTAKAN_MENGIKUTI_LOMBA_GEMASTIK_2017.docx', '01011021001011', NULL),
(2, 'Altair Ibn La''Ahad', '0613u046', 8, 'Masyaf Castle, Syria', '08123456099', 'ac@ubi.com', 'Membuat pondasi dan tujuan Persaudaraan Assassin lebih terarah dan demi masyarakat', '01011021008', 'Dosen 8', '2018-04-26', '2018-02-10', '2018-08-10', 'Lulus', 'Menjadi Assassin yang sembrono', '1996-07-17', 'Masyaf', '2018-08-24', '6 Bualan', 4.01, 'Al-Mualim', 'Abas Sofyan', '2018-12-22', '21:45', 'Masyaf Castle', 'Legend of Assassin', '2018-10-27', 'Game dan Multimedia', '2018-10-20', 'Ya', '21:00', 'Ezio Auditore da FIrenze', '2017/2018', '2018/2019', 'Ganjil', 'images.jpg', '', '01011021001008', NULL),
(3, 'Noriaki Kakyoin', '0613u002', 9, 'Tokyo, Japan', '081234567976', 'hierrophant_green@yahoo.co.jp', 'Menyelamatkan ibu temanku', '01011021005', 'Dosen 5', '2018-04-27', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', NULL, '1994-09-07', 'Shizuoka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Game dan Multimedia', NULL, NULL, NULL, NULL, '2017/2018', NULL, NULL, 'nk.jpg', 'Perbandingan_Microcontroller_AVR_STK1.docx', '01011021001005', NULL),
(4, 'Danny Drinkwater', '0613u090', 8, 'London, UK', '082312231111', 'drinkwater@yahoo.uk', 'Mengulang kejayaan menjadi juara liga premier inggris bersama Chelsea ', '01011021003', 'Dosen 3', '2017-02-08', '2018-02-10', '2018-08-10', 'Lulus', 'Juara bersama Leicester City', '1991-07-19', 'Manchester', '2017-11-17', '6 Bulan', 3.12, 'Claudio Ranieri', 'Nigel Pearson', '2018-04-09', '09:15', 'Ruang Sidang Lt2', 'kl', '2018-04-09', 'Applied Database', '2018-04-08', 'Ya', '10:00', 'Sam Allerdyce', '2016/2017', '2017/2018', 'Genap', 'drink.jpg', 'Compact_Cassette.docx', '01011021001003', NULL),
(5, 'Alberto Gilardino', '0614u029', 8, 'Napoli, Italia', '08121111111', 'gilardino11@yahoo.it', 'Main bola di Italia', '01011021005', 'Dosen 5', '2018-01-16', '2018-02-10', '2018-08-10', 'Dalam Bimbingan', '', '1994-08-27', 'Milano', NULL, NULL, NULL, '', '', NULL, '', '', '', NULL, 'Applied Database', NULL, 'Tidak', '', '', '2016/2017', '', '', 'wpid-img20150828_084624-740x431.jpg', 'Instalasi_Game.docx', '01011021001005', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_dosen`
--

CREATE TABLE IF NOT EXISTS `t_dosen` (
`id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `jenis_bimbingan` enum('Kerja Praktek','Tugas Akhir','Both') DEFAULT NULL,
  `nidn` varchar(30) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `t_dosen`
--

INSERT INTO `t_dosen` (`id_dosen`, `nama_dosen`, `nid`, `jenis_bimbingan`, `nidn`, `status`) VALUES
(1, 'Dosen 1', '01011021001', 'Kerja Praktek', '01011021001001', 'Aktif'),
(2, 'Dosen 2', '01011021002', 'Tugas Akhir', '01011021001002', 'Aktif'),
(3, 'Dosen 3', '01011021003', 'Both', '01011021001003', 'Aktif'),
(4, 'Dosen 4', '01011021004', 'Tugas Akhir', '01011021001004', 'Aktif'),
(5, 'Dosen 5', '01011021005', 'Tugas Akhir', '01011021001005', 'Aktif'),
(6, 'Dosen 6', '01011021006', 'Both', '01011021001006', 'Aktif'),
(7, 'Dosen 7', '01011021007', 'Kerja Praktek', '01011021001007', 'Aktif'),
(8, 'Dosen 8', '01011021008', 'Both', '01011021001008', 'Aktif'),
(9, 'Dosen 9', '01011021009', 'Kerja Praktek', '01011021001009', 'Aktif'),
(10, 'Dosen 10', '01011021010', 'Kerja Praktek', '01011021001010', 'Aktif'),
(11, 'Dosen 11', '01011021011', 'Tugas Akhir', '01011021001011', 'Aktif'),
(13, 'Dosen 94', '01011021094', 'Kerja Praktek', '01011021001094', 'Aktif'),
(14, 'Dosen 117', '01011021117', 'Tugas Akhir', '010110210010117', 'Tidak Aktif'),
(15, 'Dosen 73', '01011021073', 'Both', '01011021001073', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_frontkp`
--

CREATE TABLE IF NOT EXISTS `t_frontkp` (
`id` int(11) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `topik_kp` text,
  `status` enum('Diterima','Ditolak','Tunggu') DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_frontkp`
--

INSERT INTO `t_frontkp` (`id`, `npm`, `nama_mahasiswa`, `topik_kp`, `status`) VALUES
(1, '0613u049', 'Muhammad Ihsan Fadhil', 'Sistem Pengajuan Kerja Praktek dan Tugas Akhir di Program Studi Universitas Widyatama', 'Diterima'),
(2, '0613u050', 'Alberto Aquilani', 'Cara main tetap di sebuah klub lebih dari 2 tahun', 'Ditolak'),
(3, '0613u047', 'Lukas Podolski', 'Cara dapat karir klub yang bagus sebagus karir timnas', 'Ditolak'),
(4, '0613u001', 'Gyro Zeppeli', 'Menghentikan usaha presiden amerika untuk menguasai tulang suci', 'Ditolak'),
(5, '0613u002', 'Levi Ackerman', 'Slice Titan... Slice Titan... Slice Titan... Slice Titan... Slice Titan... Slice Titan...', 'Ditolak'),
(6, '0613u047', 'Juan Manuel Mata Garcia', 'Main sebagai AMF di Manchester United F.C', 'Diterima'),
(8, '0615101038', 'Muhammad fadillah', 'jgjgjgjgjgjhgjhgjh', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `t_frontta`
--

CREATE TABLE IF NOT EXISTS `t_frontta` (
`id` int(111) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `topik_ta` text,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `status` enum('Diterima','Tunggu','Ditolak') DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_frontta`
--

INSERT INTO `t_frontta` (`id`, `npm`, `nama_mahasiswa`, `topik_ta`, `konsentrasi`, `status`) VALUES
(1, '0613u051', 'Jonathan Joestar', 'Cara agar tidak terlena dengan kemenangan dengan cara melihat kondisi musuh yang sudah dikalahkan.', 'Information Technology', 'Ditolak'),
(2, '0613u089', 'Dummy', 'asdasds', 'Applied Database', 'Ditolak'),
(3, '0613u051', 'Nathan Drake', 'Mencari harta karun bajak laut avery', 'Information Technology', 'Ditolak'),
(4, '0612u049', 'Shay Patrick Cormac', 'Melenyapkan persaudaraan Assassin yang SENTOLOP', 'Applied Networking', 'Ditolak'),
(5, '0613u002', 'Noriaki Kakyoin', 'Menyelamatkan ibu temanku', 'Game dan Multimedia', 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengajuankp`
--

CREATE TABLE IF NOT EXISTS `t_pengajuankp` (
`id` int(111) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_kp` text,
  `nid1` varchar(30) DEFAULT NULL,
  `nid2` varchar(30) DEFAULT NULL,
  `pembimbing1` varchar(50) DEFAULT NULL,
  `pembimbing2` varchar(50) DEFAULT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` text,
  `pembimbinglap` varchar(50) DEFAULT NULL,
  `lampiran1` text,
  `lampiran2` text,
  `lampiran3` text,
  `tanggal_peng` date DEFAULT NULL,
  `jumlah_sks` int(111) DEFAULT NULL,
  `pass` enum('Ya','Tunggu') DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `status` enum('Diterima','Tunggu') DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `nidn1` varchar(30) DEFAULT NULL,
  `nidn2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_pengajuankp`
--

INSERT INTO `t_pengajuankp` (`id`, `npm`, `semester`, `alamat`, `telepon`, `email`, `topik_kp`, `nid1`, `nid2`, `pembimbing1`, `pembimbing2`, `nama_perusahaan`, `alamat_perusahaan`, `pembimbinglap`, `lampiran1`, `lampiran2`, `lampiran3`, `tanggal_peng`, `jumlah_sks`, `pass`, `tahun_akademik_peng`, `status`, `nama_mahasiswa`, `nidn1`, `nidn2`) VALUES
(6, '0613u047', 8, 'Madrid, Spain', '081234564434', 'mata8@gmail.com', 'Main sebagai AMF di Manchester United F.C', '01011021001', '01011021010', 'Dosen 1', 'Dosen 10', 'Manchester United F.C', 'Sir Bobby Charlton Street, Manchester, UK', 'Jose Mourinho', 'AWSubs_Handa-kun_-_03_480p7E035DC4_mkv_snapshot_23_42_2016_08_05_21_59_51.jpg', '10__teori_permainan.pdf', 'mata.jpg', '2018-04-27', 120, 'Ya', '2017/2018', 'Diterima', 'Juan Manuel Mata Garcia', '01011021001', '01011021010'),
(8, '0615101038', 7, 'bandung', '081234567890', 'lupa@hotmail.com', 'jgjgjgjgjgjhgjhgjh', '01011021001', '01011021010', 'Dosen 1', 'Dosen 10', 'hkhk', 'gjgjgjhg', 'ibenk', 'AWSubs_Digimon_Adventure_tri_-_15_480pBE7795C4_mkv_snapshot_19_19_2017_02_25_11_48_51.jpg', 'AWSubs_Digimon_Adventure_tri_-_15_480pBE7795C4_mkv_snapshot_19_19_2017_02_25_11_48_51.jpg', 'SpongeBob_(5).png', '2018-05-09', 120, 'Ya', '2017/2018', 'Diterima', 'Muhammad fadillah', '01011021001001', '01011021001010');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengajuanta`
--

CREATE TABLE IF NOT EXISTS `t_pengajuanta` (
`id` int(111) NOT NULL,
  `npm` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `topik_ta` text,
  `nid1` varchar(30) DEFAULT NULL,
  `nid2` varchar(30) DEFAULT NULL,
  `pembimbing1` varchar(50) DEFAULT NULL,
  `pembimbing2` varchar(50) DEFAULT NULL,
  `lampiran1` text,
  `lampiran2` text,
  `lampiran3` text,
  `lampiran4` text,
  `lampiran5` text,
  `lampiran6` text,
  `status` enum('Diterima','Tunggu') DEFAULT NULL,
  `tanggal_peng` date DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `pass` enum('Ya','Tunggu') DEFAULT NULL,
  `tahun_akademik_peng` varchar(9) DEFAULT NULL,
  `nama_mahasiswa` varchar(60) DEFAULT NULL,
  `nidn1` varchar(30) DEFAULT NULL,
  `nidn2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_pengajuanta`
--

INSERT INTO `t_pengajuanta` (`id`, `npm`, `tanggal_lahir`, `tempat_lahir`, `konsentrasi`, `semester`, `alamat`, `telepon`, `email`, `topik_ta`, `nid1`, `nid2`, `pembimbing1`, `pembimbing2`, `lampiran1`, `lampiran2`, `lampiran3`, `lampiran4`, `lampiran5`, `lampiran6`, `status`, `tanggal_peng`, `jumlah_sks`, `pass`, `tahun_akademik_peng`, `nama_mahasiswa`, `nidn1`, `nidn2`) VALUES
(3, '0613u051', '1994-12-16', 'New York', 'Information Technology', 8, 'Kuala Lumpur, Malaysia', '081234567666', 'uncharted@gmail.com', 'Mencari harta karun bajak laut avery', '01011021002', '01011021011', 'Dosen 2', 'Dosen 11', 'Digimon-Story-Cyber-Sleuth-Hackers-Memory_2017_08-08-17_001.jpg', 'transkrip_2.pdf', 'Perbandingan_Microcontroller_AVR_STK.docx', 'Digimon-Story-Cyber-Sleuth-Hackers-Memory_2017_08-08-17_015.jpg', 'Screenshot_2017-10-24_22_20_34.png', 'Digivolving_Alphamon_Ouryuken_Gallantmon_Crimson_Mode_-_Cyber_Sleuth-_Hackers_Memory_MKV_snapshot_00_40.jpg', 'Diterima', '2018-04-26', 139, 'Ya', '2017/2018', 'Nathan Drake', '01011021002', '01011021011'),
(5, '0613u002', '1994-09-07', 'Shizuoka', 'Game dan Multimedia', 9, 'Tokyo, Japan', '081234567976', 'hierrophant_green@yahoo.co.jp', 'Menyelamatkan ibu temanku', '01011021004', '01011021011', 'Dosen 4', 'Dosen 11', 'YouTube_MKV_snapshot_01_59.jpg', 'ATIKAH_UJIKONTEN.docx', 'Perbandingan_Microcontroller_AVR_STK1.docx', '18158202673-466707728-ticket_2.pdf', 'Screenshot_2017-10-24_22_20_341.png', 'nk.jpg', 'Diterima', '2018-04-27', 139, 'Ya', '2017/2018', 'Noriaki Kakyoin', '01011021004', '01011021011');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
`id` int(11) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nama_user` varchar(60) DEFAULT NULL,
  `konsentrasi` varchar(30) DEFAULT NULL,
  `jenis_bimbingan` enum('Tugas Akhir','Kerja Praktek','Both') DEFAULT NULL,
  `nid` varchar(30) DEFAULT NULL,
  `level` enum('Admin','Dosen','Prodi') DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `nama_user`, `konsentrasi`, `jenis_bimbingan`, `nid`, `level`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Pak Dhani', '', NULL, '', 'Admin', 'mata1.jpg'),
(2, 'prodi', '32b404761d910d277789cd91076d1459', 'Prodi Coba', '', NULL, '', 'Prodi', 'SpongeBob_(5).png'),
(3, 'dosen1', 'f499263a253447dd5cb68dafb9f13235', 'Dosen 1', '', 'Kerja Praktek', '01011021001', 'Dosen', NULL),
(4, 'dosen2', 'ac41c4e0e6ef7ac51f0c8f3895f82ce5', 'Dosen 2', 'Applied Database', 'Tugas Akhir', '01011021002', 'Dosen', 'lichking.jpg'),
(5, 'dosen3', '1192feff42fadff1d7e0aa1210fed1e3', 'Dosen 3', '', 'Both', '01011021003', 'Dosen', 'Digimon-Story-Cyber-Sleuth-Hackers-Memory_2017_06-22-17_015_(2).jpg'),
(7, 'dosen11', '2cf10dca06a03b19936c504fa9372e6b', 'Dosen 11', 'Interfacing System', 'Tugas Akhir', '01011021011', 'Dosen', 'nk.jpg'),
(9, 'prodi3', 'd41d8cd98f00b204e9800998ecf8427e', 'prodi3', '', '', '', 'Prodi', ''),
(10, 'dosen73', '5335d74cde4117b27579207ab3f8e936', 'Dosen 73', 'Game dan Multimedia', 'Both', '01011021073', 'Dosen', 'Melody_Saiki_Kusuo_no_Psi-nan_-_22_480_C913EA1E_2_mkv_snapshot_15_39_2016_12_20_19_28_03_2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_datakp`
--
ALTER TABLE `t_datakp`
 ADD PRIMARY KEY (`id_kp`);

--
-- Indexes for table `t_datata`
--
ALTER TABLE `t_datata`
 ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `t_dosen`
--
ALTER TABLE `t_dosen`
 ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `t_frontkp`
--
ALTER TABLE `t_frontkp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_frontta`
--
ALTER TABLE `t_frontta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pengajuankp`
--
ALTER TABLE `t_pengajuankp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pengajuanta`
--
ALTER TABLE `t_pengajuanta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_datakp`
--
ALTER TABLE `t_datakp`
MODIFY `id_kp` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_datata`
--
ALTER TABLE `t_datata`
MODIFY `id_ta` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_dosen`
--
ALTER TABLE `t_dosen`
MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `t_frontkp`
--
ALTER TABLE `t_frontkp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_frontta`
--
ALTER TABLE `t_frontta`
MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_pengajuankp`
--
ALTER TABLE `t_pengajuankp`
MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_pengajuanta`
--
ALTER TABLE `t_pengajuanta`
MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
