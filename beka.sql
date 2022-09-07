-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 07:47 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `hp_admin` varchar(13) DEFAULT NULL,
  `status_admin` varchar(1) DEFAULT NULL,
  `alamat_admin` text,
  `password_admin` varchar(225) DEFAULT NULL,
  `jenkel_admin` varchar(1) DEFAULT NULL,
  `id_akses_admin` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `hp_admin`, `status_admin`, `alamat_admin`, `password_admin`, `jenkel_admin`, `id_akses_admin`) VALUES
('AD001', 'BK', '083879890335', '1', 'Beged', '22ba172fa4e408497c1688f3bb74af23', 'L', 'AD');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` varchar(5) NOT NULL,
  `ns_config` varchar(7) NOT NULL,
  `nama_sistem` varchar(50) DEFAULT NULL,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `status_config` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `ns_config`, `nama_sistem`, `nama_instansi`, `author`, `status_config`) VALUES
('BK1', 'Monitor', 'Monitoring Evaluasi Siswa', 'SMK Media Informatika', 'Tako Nugroho', '1');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(10) NOT NULL,
  `alamat_guru` text,
  `nama_guru` varchar(25) DEFAULT NULL,
  `jenkel_guru` varchar(1) DEFAULT NULL,
  `hp_guru` varchar(13) DEFAULT NULL,
  `pass_guru` varchar(225) DEFAULT NULL,
  `status_guru` varchar(1) DEFAULT NULL,
  `id_akses_guru` varchar(5) NOT NULL,
  `nik` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `alamat_guru`, `nama_guru`, `jenkel_guru`, `hp_guru`, `pass_guru`, `status_guru`, `id_akses_guru`, `nik`) VALUES
('GR001', 'Jakarta', 'Asep Sudrajat, S.Sos, S.K', 'L', '081213481222', '6ec03da27191b23447116aa346f1343c', '1', 'GR', '20060419820929'),
('GR002', 'Jakarta', 'Mulyadi, SE', 'L', '081584345474', '66ca67bb2f76db3b566603c9ffacc567', '1', 'GR', '20060419740316'),
('GR003', 'Jakarta', 'Edy Setiawan, S.Kom', 'L', '081381803544', 'b5aee5c77634b7784407b49249117366', '1', 'GR', '20060419740413'),
('GR004', 'Jakarta', 'Shelfi H. A, SH, M.Pd', 'P', '088211862133', '3882299e76e03636e269f3e48a5d8568', '1', 'GR', '20060719661125'),
('GR005', 'Jakarta', 'Wahyono, S. Ag', 'L', '0817766652', '8c1aca73136ef6b5b3274e5c0faf26fc', '1', 'GR', '20060419760828'),
('GR006', 'Jakarta', 'Sulistyo Nugroho, S.Pd', 'L', '081908010368', '8d093b93461a77fb8acee94f4973ef9a', '1', 'GR', '20060719680903'),
('GR007', 'Jakarta', 'Christina Wisanti, SE, S.', 'P', '081293963555', '4bcbac48430c205ea896f42cbcb18d4b', '1', 'GR', '20060719700305'),
('GR008', 'Jakarta', 'Andya Pratama, S.Kom, M.P', 'L', '087771962777', '15fed38d1d264fce93aa602a06b2627b', '1', 'GR', '20070719731227'),
('GR009', 'Jakarta', 'Rachmat Budi S, S.Kom', 'L', '0856 1310 066', 'fc80dccf282f01685a335a8089bee0cd', '1', 'GR', '20060719740904'),
('GR010', 'Jakarta', 'Yudhi Prabowo, ST', 'L', '08777717786', '29477c4ad4a6f1629c0813611efb6d07', '1', 'GR', '20060719791217'),
('GR011', 'Jakarta', 'Try Yudhistira Putra, S.K', 'L', '083806626023', 'a7b0b8d16543445c047fbf1cb5a5dd56', '1', 'GR', '20170719930823'),
('GR012', 'Jakarta', 'Feni Roseni, S.Pd', 'P', '0812 1152 440', 'd51c4f6977721be5b6874a05107a2a83', '1', 'GR', '20060719810212'),
('GR013', 'Jakarta', 'Siswandono, S.Kom', 'L', '0817718719', '7fef24255d450327e1f9a522917c1efe', '1', 'GR', '20061019670427'),
('GR014', 'Jakarta', 'Hj. Nur Azizah, M.Kom', 'P', '081295940376', '118ad50839ba92c1b9bd938334751ce0', '1', 'GR', '20061019720218'),
('GR015', 'Jakarta', 'Murgiyono, Drs, S.Kom', 'L', '082226052766', 'e691e103d32c525a9281073598b291b5', '1', 'GR', '20070519670315'),
('GR016', 'Jakarta', 'Maliharyati, S.Pd', 'P', '08121831785', 'bcb6db6a85ed7271ac2df421163673c8', '1', 'GR', '20090719650814'),
('GR017', 'Jakarta', 'Hj. Sri Handayani, S.Pd', 'P', '08161179739', '27c619e4ca030710e1d7be5a65ab4187', '1', 'GR', '20090719700709'),
('GR018', 'Jakarta', 'Ricky Haqiki Elmatrudy, S', 'L', '088211862133', '5660f539a1a3f22d27494c3e4bf0ea59', '1', 'GR', '20090719781028'),
('GR019', 'Jakarta', 'Heru Sampurno, S.Pd', 'L', '081329386549', '48dbf5c522fc3a53d87146af2071119d', '1', 'GR', '20080719800102'),
('GR020', 'Jakarta', 'Junevris, S.Kom', 'L', '085280638740', '1dde39301437d45494b00ab719469acd', '1', 'GR', '20080719810623'),
('GR021', 'Jakarta', 'Hj. Diana Jayanti, S.Pd', 'P', '087782016476', 'c44157d0fb11af58dec91eeb0e07c955', '1', 'GR', '20090719761218'),
('GR022', 'Jakarta', 'Wiwin Dwi Tjiptaningsih, ', 'P', '085888502790', '7dd910b8a1c1aeb9ab20df986c5f86e7', '1', 'GR', '20090719810910'),
('GR023', 'Jakarta', 'Hj. Siti Suproh, S.Pd', 'P', '087883302704', '6f1704c3a3b6dea5030fc0d6421b71fb', '1', 'GR', '20100719730619'),
('GR024', 'Jakarta', 'Chairullah, Drs., MM., M.', 'L', '081310414417', 'c92ffc302ab722c091dbdd807320338c', '1', 'GR', '20120719640716'),
('GR025', 'Tangerang', 'Esthi Purwaningrum, S.Pd', 'P', '083874771086', '991f3b388ed9bb68f0d961e1b7b28c50', '1', 'GR', '20140719861231'),
('GR026', 'Jakarta', 'Oktanti Ragil Triasputri,', 'P', '0812 1023 899', 'd75cc3136b9e229f5a186e75ad98b2bf', '1', 'GR', '20130719901002'),
('GR027', 'Jakarta', 'Novyanti Dewi Wulandari, ', 'P', '081381296059', 'e4d35839fab0585342409925e0818005', '1', 'GR', '20140919921121'),
('GR028', 'Jakarta', 'Epi Apipah, S.Pd', 'P', '085719620540', '159eff9c8ca82bf6acddb98c47039049', '1', 'GR', '20150119890503'),
('GR029', 'Jakarta', 'Lidya Widaningsih, Dra, M', 'P', '081286851112', '8a7804f79ae1964aab5dfd0213378e51', '1', 'GR', '20150719580522'),
('GR030', 'Jakarta', 'Purwanto Yuwono, Ir, MM', 'L', '081513874972', '0c25b0eac3ee7e80b941760cf87a3705', '1', 'GR', '20150719641007'),
('GR031', 'Jakarta', 'Restu Ninggu Tomo, S.Pd', 'L', '08988398340', '1aa94e5b98c70c8f424005a2a1f9a75e', '1', 'GR', '20150719840823'),
('GR32', 'Jakarta', 'Ade Nurdiani, S.Pd', 'P', '0878 8725 232', '064417339b5845d14e0913c9a2e3f846', '1', 'GR', '20150819920507');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` varchar(2) NOT NULL,
  `nama_hak_akses` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama_hak_akses`, `status`) VALUES
('AD', 'Administrator', '1'),
('GR', 'Guru', '1'),
('OT', 'Orang Tua', '1'),
('SI', 'Siswa', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(10) NOT NULL,
  `nama_jurusan` varchar(30) DEFAULT NULL,
  `akronim_jurusan` varchar(5) DEFAULT NULL,
  `status_jurusan` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `akronim_jurusan`, `status_jurusan`) VALUES
('JUR0001', 'Teknik Komputer Jaringan', 'TKJ', '1'),
('JUR0002', 'Multi Media', 'MM', '1'),
('JUR0003', 'Rekayasa Perangkat Lunak', 'RPL', '1'),
('JUR0004', 'BroadCase', 'BC', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pelanggaran`
--

CREATE TABLE `kategori_pelanggaran` (
  `id_kategori_pelanggaran` int(11) NOT NULL,
  `nama_kategori_kategori_pelanggaran` varchar(225) NOT NULL,
  `status_kategori_pelanggaran` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pelanggaran`
--

INSERT INTO `kategori_pelanggaran` (`id_kategori_pelanggaran`, `nama_kategori_kategori_pelanggaran`, `status_kategori_pelanggaran`) VALUES
(1, 'Ketertiban', '1'),
(2, 'Rokok', '1'),
(3, 'Buku, Majalah, dan Kaset Terlarang', '1'),
(4, 'Senjata', '1'),
(5, 'Obat atau Minuman Terlarang', '1'),
(6, 'Perkelahian', '1'),
(7, 'Keterlambatan', '1'),
(8, 'Kehadiran', '1'),
(9, 'Kerapian pakaian', '1'),
(10, 'Rambut', '1'),
(11, 'Kerapihan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `status_kelas` varchar(1) NOT NULL,
  `nama_kelas` varchar(15) DEFAULT NULL,
  `tingkatan_kelas` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `status_kelas`, `nama_kelas`, `tingkatan_kelas`) VALUES
('KLS0001', '1', 'Sepuluh', 'X'),
('KLS0002', '1', 'Sebelas', 'XI'),
('KLS0003', '1', 'Duabelas', 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `kelasjurusan`
--

CREATE TABLE `kelasjurusan` (
  `id_kelasjurusan` varchar(50) NOT NULL,
  `id_kelas_kelasjurusan` varchar(50) DEFAULT NULL,
  `id_jurusan_kelasjurusan` varchar(50) DEFAULT NULL,
  `daya_tampung_kelasjurusan` int(3) DEFAULT NULL,
  `status_kelasjurusan` varchar(1) DEFAULT NULL,
  `urutan_kelasjurusan` varchar(5) DEFAULT NULL,
  `id_walikelas_kelasjurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelasjurusan`
--

INSERT INTO `kelasjurusan` (`id_kelasjurusan`, `id_kelas_kelasjurusan`, `id_jurusan_kelasjurusan`, `daya_tampung_kelasjurusan`, `status_kelasjurusan`, `urutan_kelasjurusan`, `id_walikelas_kelasjurusan`) VALUES
('KLJ0001', 'KLS0001', 'JUR0003', 35, '1', '1', 'GR011'),
('KLJ0002', 'KLS0001', 'JUR0001', 34, '1', '1', NULL),
('KLJ0003', 'KLS0001', 'JUR0002', 34, '1', '1', NULL),
('KLJ0004', 'KLS0001', 'JUR0004', 33, '1', '1', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kelastetap`
-- (See below for the actual view)
--
CREATE TABLE `kelastetap` (
`id_kelasjurusan` varchar(50)
,`id_kelas_kelasjurusan` varchar(50)
,`id_jurusan_kelasjurusan` varchar(50)
,`daya_tampung_kelasjurusan` int(3)
,`status_kelasjurusan` varchar(1)
,`urutan_kelasjurusan` varchar(5)
,`id_walikelas_kelasjurusan` varchar(50)
,`id_kelas` varchar(10)
,`status_kelas` varchar(1)
,`nama_kelas` varchar(15)
,`tingkatan_kelas` varchar(5)
,`id_jurusan` varchar(10)
,`nama_jurusan` varchar(30)
,`akronim_jurusan` varchar(5)
,`status_jurusan` varchar(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `waktu_log` datetime NOT NULL,
  `id_log` int(10) NOT NULL,
  `pelaku_log` varchar(8) NOT NULL,
  `dikenai_log` varchar(8) NOT NULL,
  `menu_log` varchar(225) NOT NULL,
  `kegiatan_log` varchar(225) NOT NULL,
  `data_lama_log` text NOT NULL,
  `data_baru_log` text NOT NULL,
  `riwayat_log` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`waktu_log`, `id_log`, `pelaku_log`, `dikenai_log`, `menu_log`, `kegiatan_log`, `data_lama_log`, `data_baru_log`, `riwayat_log`) VALUES
('2018-10-30 19:48:17', 1, 'AD001', '', 'Monitor &raquo; Login', 'Login As Administrator', '', '', ''),
('2018-10-30 19:53:00', 2, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR001<br>20060419820929<br>Asep Sudrajat, S.Sos, S.Kom<br>Jakarta<br>081213481222<br>L<br>GR', ''),
('2018-10-30 19:56:37', 3, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR002<br>20060419740316<br>Mulyadi, SE<br>Jakarta<br>081584345474<br>L<br>GR', ''),
('2018-10-30 19:57:34', 4, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR003<br>20060419740413<br>Edy Setiawan, S.Kom<br>Jakarta<br>081381803544<br>L<br>GR', ''),
('2018-10-30 19:59:45', 5, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR004<br>20060719661125<br>Shelfi H. A, SH, M.Pd<br>Jakarta<br>088211862133<br>P<br>GR', ''),
('2018-10-30 20:00:51', 6, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR005<br>20060419760828<br>Wahyono, S. Ag<br>Jakarta<br>0817766652<br>L<br>GR', ''),
('2018-10-30 20:02:14', 7, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '60'),
('2018-10-30 20:04:13', 8, 'AD001', '', 'Monitor &raquo; Jurusan', 'Menambah Data', '', 'JUR0001<br>Teknik Komputer Jaringan', ''),
('2018-10-30 20:04:33', 9, 'AD001', '', 'Monitor &raquo; Jurusan', 'Menambah Data', '', 'JUR0002<br>Multi Media', ''),
('2018-10-30 20:04:58', 10, 'AD001', '', 'Monitor &raquo; Jurusan', 'Menambah Data', '', 'JUR0003<br>Rekayasa Perangkat Lunak', ''),
('2018-10-30 20:05:18', 11, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Menambah Data', '', 'KLS0001<br>JUR0003<br>35<br>1', ''),
('2018-10-30 20:08:48', 12, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR006<br>20060719680903<br>Sulistyo Nugroho, S.Pd<br>Jakarta<br>081908010368<br>L<br>GR', ''),
('2018-10-30 20:11:07', 13, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR007<br>20060719700305<br>Christina Wisanti, SE, S.Kom<br>Jakarta<br>081293963555<br>P<br>GR', ''),
('2018-10-30 20:12:07', 14, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR008<br>20070719731227<br>Andya Pratama, S.Kom, M.Pd<br>Jakarta<br>087771962777<br>L<br>GR', ''),
('2018-10-30 20:13:01', 15, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR009<br>20060719740904<br>Rachmat Budi S, S.Kom<br>Jakarta<br>0856 1310 066<br>L<br>GR', ''),
('2018-10-30 20:14:14', 16, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR010<br>20060719791217<br>Yudhi Prabowo, ST<br>Jakarta<br>0877 7717 7865<br>L<br>GR', ''),
('2018-10-30 20:15:40', 17, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR011<br>20170719930823<br>Try Yudhistira Putra, S.Kom<br>Jakarta<br>083806626023<br>L<br>GR', ''),
('2018-10-30 20:16:24', 18, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Set Wali Kelas', '', 'GR011', 'KLJ0001'),
('2018-10-30 20:17:07', 19, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Menambah Data', '', 'KLS0001<br>JUR0003<br>35<br>2', ''),
('2018-10-30 20:17:21', 20, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Menambah Data', '', 'KLS0001<br>JUR0003<br>36<br>3', ''),
('2018-10-30 20:17:49', 21, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0003<br>35<br>2', 'KLS0001<br>JUR0001352', 'KLJ0002'),
('2018-10-30 20:18:01', 22, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0001<br>35<br>2', 'KLS0001<br>JUR0001351', 'KLJ0002'),
('2018-10-30 20:18:19', 23, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0003<br>36<br>3', 'KLS0001<br>JUR0002343', 'KLJ0003'),
('2018-10-30 20:18:28', 24, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0002<br>34<br>3', 'KLS0001<br>JUR0002341', 'KLJ0003'),
('2018-10-30 20:28:31', 25, 'AD001', '', 'Monitor &raquo; Jurusan', 'Menambah Data', '', 'JUR0004<br>Broadcast', ''),
('2018-10-30 20:28:56', 26, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Menambah Data', '', 'KLS0001<br>JUR0004<br>33<br>1', ''),
('2018-10-30 20:29:25', 27, 'AD001', '', 'Monitor &raquo; Jurusan', 'Mengedit Data', 'Broadcast<br>BC', 'Broadcase<br>BC', 'JUR0004'),
('2018-11-07 22:18:07', 28, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-08 23:56:47', 29, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-09 00:10:01', 30, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2018-11-09 00:10:12', 31, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2018-11-09 00:10:32', 32, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2018-11-09 00:12:13', 33, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-15 20:06:44', 34, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-21 09:14:52', 35, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-21 09:16:22', 36, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2018-11-21 09:16:28', 37, 'GR010', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2018-11-21 09:16:55', 38, 'GR010', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2018-11-21 09:17:10', 39, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-21 10:22:31', 40, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-27 20:19:19', 41, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-27 20:25:17', 42, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', 'MMM <br> 2<br> 15', ''),
('2018-11-27 20:25:42', 43, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '60'),
('2018-11-27 20:26:43', 44, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2018-11-27 20:26:52', 45, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-27 20:28:53', 46, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0001Fahmi<br>Jakarta<br>089676453909<br>Pegawai Swasta<br>OT', ''),
('2018-11-27 20:29:53', 47, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0002Tarjorno<br>Jakarta<br>083862786987<br>Pegawai Swasta<br>OT', ''),
('2018-11-27 20:30:47', 48, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0003Budiman<br>Jakarta<br>0852673467420<br>Pegawai Swasta<br>OT', ''),
('2018-11-27 20:31:45', 49, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0004Saiful<br>Jakarta<br>0852798765624<br>Wiraswasta<br>OT', ''),
('2018-11-27 20:32:45', 50, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0005Amirudin<br>Jakarta<br>0896754567210<br>PNS<br>OT', ''),
('2018-11-27 20:33:52', 51, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0006Slamet<br>Tangerang<br>089678226761<br>Pegawai Swasta<br>OT', ''),
('2018-11-27 20:34:39', 52, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0007Arif Hidayat<br>Jakarta<br>0897862652662<br>Pegawai Swasta<br>OT', ''),
('2018-11-27 20:36:12', 53, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0008Karjono<br>Jakarta<br>085267826789<br>Wirausaha<br>OT', ''),
('2018-11-27 20:37:21', 54, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0009Efendi<br>Tangerang<br>089562456710<br>Wirausaha<br>OT', ''),
('2018-11-27 20:38:17', 55, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0010Taridi<br>Jakarta<br>083878627627<br>Pegawai Swasta<br>OT', ''),
('2018-11-27 20:48:29', 56, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819106<br>ABDILLAH AKMAL AL FAIZIN<br>Jakarta<br>0897562278524<br>L<br>OT0001<br>SI', ''),
('2018-11-27 20:49:18', 57, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819107<br>AFNAN FIRDAUS FEBRIANSYAH<br>Jakarta<br>0838982672622<br>L<br>OT0002<br>SI', ''),
('2018-11-27 20:54:36', 58, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819108<br>ALWAN GUSTI PUTRA PRATAMA<br>Jakarta<br>0895674434567<br>L<br>OT0003<br>SI', ''),
('2018-11-27 20:57:16', 59, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819110<br>ARYA RAKA PUTRA<br>Jakarta<br>08956725725625<br>L<br>OT0004<br>SI', ''),
('2018-11-27 20:58:38', 60, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819111<br>BAGAS SRIYADIYANTO<br>Jakarta<br>085278567312<br>L<br>OT0005<br>SI', ''),
('2018-11-27 21:00:16', 61, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819112<br>BAGUS TRI WICAKSONO<br>Jakarta<br>085256778165<br>L<br>OT0006<br>SI', ''),
('2018-11-27 21:07:43', 62, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0001<br>35<br>1', 'KLS0001<br>JUR0002352', 'KLJ0002'),
('2018-11-27 21:08:01', 63, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0002<br>35<br>2', 'KLS0001<br>JUR0001351', 'KLJ0002'),
('2018-11-27 21:08:26', 64, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menambah Data', '', 'aaaa', ''),
('2018-11-27 21:09:32', 65, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menambah Data', '', 'akaana', ''),
('2018-11-27 21:13:52', 66, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-27 22:33:11', 67, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', 'aaaaaaaaaaaaa <br> 2<br> 12', ''),
('2018-11-27 22:44:48', 68, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '60'),
('2018-11-27 23:01:42', 69, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', 'cccc <br> 2<br> 12', ''),
('2018-11-27 23:01:59', 70, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '61'),
('2018-11-27 23:30:52', 71, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2018-11-27 23:30:57', 72, '1819106', '', 'Monitor &raquo; Login', 'Login SebagaiSiswa', '', '', ''),
('2018-11-27 23:31:45', 73, '1819106', '', 'Monitor &raquo; Logout', 'Logout From Siswa', '', '', ''),
('2018-11-27 23:31:55', 74, 'OT0001', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2018-11-27 23:32:40', 75, 'OT0001', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2018-11-27 23:34:04', 76, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-27 23:44:53', 77, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-27 23:45:40', 78, 'AD001', '', 'Monitor &raquo; Siswa', 'Menghapus Data', '', '', '1819108'),
('2018-11-27 23:45:49', 79, 'AD001', '', 'Monitor &raquo; Siswa', 'Menghapus Data', '', '', '1819110'),
('2018-11-27 23:45:56', 80, 'AD001', '', 'Monitor &raquo; Siswa', 'Menghapus Data', '', '', '1819111'),
('2018-11-27 23:46:05', 81, 'AD001', '', 'Monitor &raquo; Siswa', 'Menghapus Data', '', '', '1819112'),
('2018-11-28 00:02:32', 82, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-11-28 00:20:35', 83, 'AD001', '', 'Monitor &raquo; Guru', 'Mengedit Data', 'GR001<br>20060419820929<br>Asep Sudrajat, S.Sos, S.K<br>Jakarta<br>081213481222<br>L', 'GR001<br>20060419820929<br>Asep Sudrajat, S.Sos, S.K<br>Jakarta<br>081213481222<br>P', 'GR001'),
('2018-11-28 00:20:44', 84, 'AD001', '', 'Monitor &raquo; Guru', 'Mengedit Data', 'GR001<br>20060419820929<br>Asep Sudrajat, S.Sos, S.K<br>Jakarta<br>081213481222<br>P', 'GR001<br>20060419820929<br>Asep Sudrajat, S.Sos, S.K<br>Jakarta<br>081213481222<br>L', 'GR001'),
('2018-11-28 00:21:21', 85, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Mengedit Data', 'Ketertiban', 'KetertibanN', '1'),
('2018-11-28 00:21:30', 86, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Mengedit Data', 'KetertibanN', 'Ketertiban', '1'),
('2018-11-28 00:39:46', 87, 'AD001', '', 'Monitor &raquo; Siswa', 'Mengedit Data', '1819106<br>ABDILLAH AKMAL AL FAIZIN<br>Jakarta<br>0897562278524<br>L<br>OT0001', '18191060<br>ABDILLAH AKMAL AL FAIZIN<br>Jakarta<br>0897562278524<br>L<br>OT0001', '1819106'),
('2018-11-28 00:40:04', 88, 'AD001', '', 'Monitor &raquo; Siswa', 'Mengedit Data', '18191060<br>ABDILLAH AKMAL AL FAIZIN<br>Jakarta<br>0897562278524<br>L<br>OT0001', '1819106<br>ABDILLAH AKMAL AL FAIZIN<br>Jakarta<br>0897562278524<br>L<br>OT0001', '18191060'),
('2018-11-28 01:03:54', 89, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819108<br>AGI YUSUP<br>Jakarta<br>0895672254619<br>L<br>OT0003<br>SI', ''),
('2018-11-28 01:04:47', 90, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819109<br>ALWAN GUSTI PUTRA PRATAMA<br>Jakarta<br>0852765687625<br>L<br>OT0004<br>SI', ''),
('2018-11-28 01:05:40', 91, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819.110<br>ARYA RAKA PUTRA<br>Jakarta<br>0898562787545<br>L<br>OT0005<br>SI', ''),
('2018-11-28 01:06:47', 92, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819111<br>BAGAS SRIYADIYANTO<br>Jakarta<br>08526787524511<br>L<br>OT0006<br>SI', ''),
('2018-11-28 01:07:36', 93, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819112<br>BAGUS TRI WICAKSONO<br>Jakarta<br>0897676662526<br>L<br>OT0007<br>SI', ''),
('2018-11-28 01:08:21', 94, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819113<br>BAYHAQI ADHLI HAKIM<br>Tangerang<br>08976376726272<br>L<br>OT0008<br>SI', ''),
('2018-11-28 01:09:13', 95, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819114<br>DAFFA WIBI GHIFARI<br>Jakarta<br>09867267627156<br>L<br>OT0009<br>SI', ''),
('2018-11-28 01:10:04', 96, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819115<br>DHONI KHARIRI<br>Jakarta<br>08976726751611<br>L<br>OT0010<br>SI', ''),
('2018-11-28 01:10:27', 97, 'AD001', '', 'Monitor &raquo; Siswa', 'Mengedit Data', '1819.110<br>ARYA RAKA PUTRA<br>Jakarta<br>0898562787545<br>L<br>OT0005', '1819110<br>ARYA RAKA PUTRA<br>Jakarta<br>0898562787545<br>L<br>OT0001', '1819.110'),
('2018-11-28 01:13:44', 98, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR012<br>20060719810212<br>Feni Roseni, S.Pd<br>Jakarta<br>0812 1152 4407<br>P<br>GR', ''),
('2018-11-28 01:14:53', 99, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR013<br>20061019670427<br>Siswandono, S.Kom<br>Jakarta<br>0817718719<br>L<br>GR', ''),
('2018-11-28 01:16:14', 100, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR014<br>20061019720218<br>Hj. Nur Azizah, M.Kom<br>Jakarta<br>081295940376<br>P<br>GR', ''),
('2018-11-28 01:39:49', 101, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2018-11-28 01:39:53', 102, 'OT0001', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2018-11-28 01:41:15', 103, 'OT0001', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2018-11-28 01:41:25', 104, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-12-13 17:50:42', 105, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-12-13 18:03:05', 106, 'OT0010', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2018-12-13 18:04:41', 107, 'OT0010', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2018-12-13 18:08:10', 108, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-12-26 16:28:45', 109, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2018-12-26 16:29:25', 110, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', 'XXXXXXX <br> 1<br> 12', ''),
('2018-12-26 16:29:49', 111, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '60'),
('2018-12-26 16:30:12', 112, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menambah Data', '', 'YY', ''),
('2018-12-26 16:30:26', 113, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menghapus Data', '', '', '11'),
('2018-12-26 16:31:01', 114, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menambah Data', '', 'XXXXXXXXXXXXX', ''),
('2018-12-26 16:31:22', 115, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Mengedit Data', 'XXXXXXXXXXXXX', 'XXXXXXXYY', '12'),
('2018-12-26 16:31:33', 116, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menghapus Data', '', '', '12'),
('2018-12-26 16:32:01', 117, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', 'CCC <br> 2<br> 12', ''),
('2018-12-28 18:50:04', 118, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-02 01:57:45', 119, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-04 15:34:45', 120, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-04 15:34:58', 121, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-04 15:35:20', 122, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-01-08 00:48:12', 123, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-08 00:48:19', 124, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-08 00:48:44', 125, 'OT0001', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2019-01-08 00:50:01', 126, 'OT0001', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2019-01-08 00:50:10', 127, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-08 00:52:06', 128, 'AD001', '', 'Monitor &raquo; Siswa', 'Mengedit Data', '1819110<br>ARYA RAKA PUTRA<br>Jakarta<br>0898562787545<br>L<br>OT0001', '1819110<br>ARYA RAKA PUTRA<br>Jakarta<br>0898562787545<br>L<br>OT0005', '1819110'),
('2019-01-08 00:52:30', 129, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-08 00:52:43', 130, 'OT0001', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2019-01-08 00:53:11', 131, 'OT0001', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2019-01-08 00:53:29', 132, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-08 01:31:07', 133, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT09090FFF<br>FFFF<br>FFFF<br>FFFFFF<br>OT', ''),
('2019-01-08 01:33:41', 134, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menghapus Data', '', '', 'OT09090'),
('2019-01-08 01:38:37', 135, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', '122222 <br> 1<br> 12', ''),
('2019-01-08 01:39:03', 136, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '61'),
('2019-01-08 01:43:37', 137, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menambah Data', '', 'aaa', ''),
('2019-01-08 01:43:52', 138, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Mengedit Data', 'aaa', 'aaax', '11'),
('2019-01-08 01:44:04', 139, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menghapus Data', '', '', '11'),
('2019-01-08 02:04:56', 140, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menambah Data', '', 'aaaa', ''),
('2019-01-08 02:05:08', 141, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Mengedit Data', 'aaaa', 'aaaav', '12'),
('2019-01-08 02:05:19', 142, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menghapus Data', '', '', '12'),
('2019-01-08 02:17:57', 143, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0001<br>35<br>1', 'KLS0001<br>JUR00013512', 'KLJ0002'),
('2019-01-08 02:18:07', 144, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0001<br>35<br>12', 'KLS0001<br>JUR0001351', 'KLJ0002'),
('2019-01-08 03:26:16', 145, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-09 00:43:54', 146, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-09 21:25:49', 147, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-09 21:32:27', 148, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-09 21:32:57', 149, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-01-09 21:33:35', 150, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190109213335<br>1819106<br>2<br>GR001<br>2019-01-08<br>20190109213335<br>aaaaaaaaaaa<br>ZZZZZ', ''),
('2019-01-09 21:39:05', 151, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-01-09 21:39:30', 152, '1819106', '', 'Monitor &raquo; Login', 'Login SebagaiSiswa', '', '', ''),
('2019-01-12 11:31:06', 153, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-12 11:32:33', 154, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-12 11:32:58', 155, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-01-12 11:33:48', 156, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190112113348<br>1819106<br>2<br>GR001<br>2019-01-11<br>20190112113348<br>AAA<br>AAAAAA', ''),
('2019-01-12 11:35:00', 157, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-01-12 11:35:08', 158, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-12 17:36:21', 159, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-12 17:38:46', 160, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-12 17:48:58', 161, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-12 17:54:43', 162, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR015<br>20070519670315<br>Murgiyono, Drs, S.Kom<br>Jakarta<br>082226052766<br>L<br>GR', ''),
('2019-01-12 18:02:35', 163, 'AD001', '', 'Monitor &raquo; Guru', 'Mengedit Data', 'GR010<br>20060719791217<br>Yudhi Prabowo, ST<br>Jakarta<br>0877 7717 786<br>L', 'GR010<br>20060719791217<br>Yudhi Prabowo, ST<br>Jakarta<br>08777717786<br>L', 'GR010'),
('2019-01-12 18:16:54', 164, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0011Yono<br>Jakarta<br>089762565262<br>Pegawai<br>OT', ''),
('2019-01-12 18:20:09', 165, 'AD001', '', 'Monitor &raquo; Orangtua', 'Mengedit Data', 'OT0010Taridi<br>Jakarta<br>083878627627Pegawai Swasta', 'OT0010Taridi<br>Jakarta<br><br>083878627627Pegawai', 'OT0010'),
('2019-01-12 18:22:18', 166, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819140<br>ZAMZA RIDJAL<br>Jakarta<br>0878976276272<br>L<br>OT0011<br>SI', ''),
('2019-01-12 18:36:44', 167, 'AD001', '', 'Monitor &raquo; Siswa', 'Mengedit Data', '1819140<br>ZAMZA RIDJAL<br>Jakarta<br>0878976276272<br>L<br>OT0011', '1819140<br>ZAMZA RIDJAL<br>Jakarta<br>087897627627<br>L<br>OT0011', '1819140'),
('2019-01-12 18:59:45', 168, 'AD001', '', 'Monitor &raquo; Kelas', 'Menghapus Data', '', '', 'KLS0003'),
('2019-01-12 19:00:15', 169, 'AD001', '', 'Monitor &raquo; Kelas', 'Menambah Data', '', 'Duabelas<br>xii', ''),
('2019-01-12 19:01:46', 170, 'AD001', '', 'Monitor &raquo; Kelas', 'Mengedit Data', 'Duabelas<br>xii', 'Duabelas<br>XII', 'KLS0003'),
('2019-01-12 19:24:33', 171, 'AD001', '', 'Monitor &raquo; Jurusan', 'Menghapus Data', '', '', 'JUR0004'),
('2019-01-12 19:24:52', 172, 'AD001', '', 'Monitor &raquo; Jurusan', 'Menambah Data', '', 'JUR0004<br>Broadcase', ''),
('2019-01-12 19:26:12', 173, 'AD001', '', 'Monitor &raquo; Jurusan', 'Mengedit Data', 'Broadcase<br>BC', 'BroadCase<br>BC', 'JUR0004'),
('2019-01-12 19:33:43', 174, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Menambah Data', '', 'KLS0003<br>JUR0002<br>30<br>2', ''),
('2019-01-12 19:35:11', 175, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Mengedit Data', 'KLS0001<br>JUR0001<br>35<br>1', 'KLS0001<br>JUR0001341', 'KLJ0002'),
('2019-01-12 19:36:32', 176, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Menambah Data', '', 'Kerapihan', ''),
('2019-01-12 19:38:18', 177, 'AD001', '', 'Monitor &raquo; Kategori Pelanggaran', 'Mengedit Data', 'Kerapian Pakaian', 'Kerapian pakaian', '9'),
('2019-01-12 19:39:43', 178, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', 'Dicat/ warna-warnai (putra/putri) <br> 9<br> 10', ''),
('2019-01-12 19:40:54', 179, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '63'),
('2019-01-12 20:17:18', 180, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-12 20:17:28', 181, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-01-12 20:23:18', 182, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191071320190112202318<br>1819107<br>13<br>GR001<br>2019-01-08<br>20190112202318<br>kantin<br>jangan diulangi', ''),
('2019-01-12 20:25:51', 183, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-01-12 20:26:19', 184, 'OT0002', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2019-01-12 22:04:27', 185, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-15 20:33:42', 186, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-15 20:41:20', 187, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-15 20:41:51', 188, 'GR002', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-01-15 20:45:07', 189, 'GR002', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190115204507<br>1819106<br>2<br>GR002<br>2019-01-14<br>20190115204507<br>kantin<br>A', ''),
('2019-01-15 20:55:34', 190, 'GR002', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106320190115205534<br>1819106<br>3<br>GR002<br>2019-01-21<br>20190115205534<br>AAA<br>aa', ''),
('2019-01-15 21:05:57', 191, 'GR002', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106320190115210557<br>1819106<br>3<br>GR002<br>2019-01-07<br>20190115210557<br>qqq<br>qqqqq', ''),
('2019-01-15 21:07:05', 192, 'GR002', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-01-15 21:07:13', 193, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-30 13:26:45', 194, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-30 13:29:26', 195, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR016<br>20090719650814<br>Maliharyati, S.Pd<br>Jakarta<br>08121831785<br>P<br>GR', ''),
('2019-01-30 13:30:36', 196, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR017<br>20090719700709<br>Hj. Sri Handayani, S.Pd<br>Jakarta<br>08161179739<br>P<br>GR', ''),
('2019-01-30 13:31:41', 197, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR018<br>20090719781028<br>Ricky Haqiki Elmatrudy, S.Ag<br>Jakarta<br>088211862133<br>L<br>GR', ''),
('2019-01-30 13:32:38', 198, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR019<br>20080719800102<br>Heru Sampurno, S.Pd<br>Jakarta<br>081329386549<br>L<br>GR', ''),
('2019-01-30 13:33:51', 199, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR020<br>20080719810623<br>Junevris, S.Kom<br>Jakarta<br>085280638740<br>L<br>GR', ''),
('2019-01-30 13:35:24', 200, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR021<br>20090719761218<br>Hj. Diana Jayanti, S.Pd<br>Jakarta<br>087782016476<br>P<br>GR', ''),
('2019-01-30 13:36:24', 201, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR022<br>20090719810910<br>Wiwin Dwi Tjiptaningsih, S. Pd<br>Jakarta<br>085888502790<br>P<br>GR', ''),
('2019-01-30 13:37:36', 202, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR023<br>20100719730619<br>Hj. Siti Suproh, S.Pd<br>Jakarta<br>087883302704<br>P<br>GR', ''),
('2019-01-30 13:38:33', 203, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR024<br>20120719640716<br>Chairullah, Drs., MM., M.Pd<br>Jakarta<br>081310414417<br>L<br>GR', ''),
('2019-01-30 13:40:02', 204, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR025<br>20140719861231<br>Esthi Purwaningrum, S.Pd<br>Tangerang<br>083874771086<br>P<br>GR', ''),
('2019-01-30 13:40:54', 205, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR026<br>20130719901002<br>Oktanti Ragil Triasputri, S.Pd<br>Jakarta<br>0812 1023 8991<br>P<br>GR', ''),
('2019-01-30 13:42:04', 206, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR027<br>20140919921121<br>Novyanti Dewi Wulandari, S.Kom<br>Jakarta<br>081381296059<br>P<br>GR', ''),
('2019-01-30 13:43:03', 207, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR028<br>20150119890503<br>Epi Apipah, S.Pd<br>Jakarta<br>085719620540<br>P<br>GR', ''),
('2019-01-30 13:45:07', 208, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR029<br>20150719580522<br>Lidya Widaningsih, Dra, MM<br>Jakarta<br>081286851112<br>P<br>GR', ''),
('2019-01-30 13:46:26', 209, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR030<br>20150719641007<br>Purwanto Yuwono, Ir, MM<br>Jakarta<br>081513874972<br>L<br>GR', ''),
('2019-01-30 13:47:27', 210, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR031<br>20150719840823<br>Restu Ninggu Tomo, S.Pd<br>Jakarta<br>08988398340<br>L<br>GR', ''),
('2019-01-30 13:48:31', 211, 'AD001', '', 'Monitor &raquo; Guru', 'Menambah Data', '', 'GR32<br>20150819920507<br>Ade Nurdiani, S.Pd<br>Jakarta<br>0878 8725 2327<br>P<br>GR', ''),
('2019-01-30 13:55:21', 212, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0012Riyadi<br>Jakarta<br>089566546576<br>Buruh<br>OT', ''),
('2019-01-30 13:56:17', 213, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0013Bahrudin<br>Jakarta<br>08526151615171<br>Pegawai Swasta<br>OT', ''),
('2019-01-30 13:57:14', 214, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0014Supaat<br>Jakarta<br>0897656544526252<br>Pegawai<br>OT', ''),
('2019-01-30 13:58:33', 215, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0015Hanny<br>Tangerang<br>085265165615161<br>TNI<br>OT', ''),
('2019-01-30 13:59:29', 216, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0016Kasimin<br>Jakarta<br>089767652652<br>PNS<br>OT', ''),
('2019-01-30 14:00:14', 217, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0017Jaenudin<br>Jakarta<br>089652424262<br>Pedagang<br>OT', ''),
('2019-01-30 14:01:11', 218, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0018Ngaciro<br>Tangerang<br>086765265726527<br>Buruh<br>OT', ''),
('2019-01-30 14:02:06', 219, 'AD001', '', 'Monitor &raquo; Orangtua', 'Menambah Data', '', 'OT0019Kardjoni<br>Jakarta<br>08524524277157<br>Polisi<br>OT', ''),
('2019-01-30 14:05:47', 220, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819116<br>DIAN SULISTYA CHANIAGO<br>Jakarta<br>0897652651615<br>P<br>OT0012<br>SI', ''),
('2019-01-30 14:07:27', 221, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819118<br>FARHAN HUDA<br>Jakarta<br>08526562526252<br>L<br>OT0013<br>SI', ''),
('2019-01-30 14:08:47', 222, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-30 14:11:26', 223, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819119<br>HANNA PRATIWI<br>Jakarta<br>08965656452421<br>P<br>OT0014<br>SI', ''),
('2019-01-30 14:12:50', 224, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819120<br>ILHAM NUR RAMDANI<br>Jakarta<br>08565625657161<br>L<br>OT0015<br>SI', ''),
('2019-01-30 14:13:54', 225, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819121<br>KHANSA HAFIDZ AL GHAZALI<br>Tangerang<br>0895657826527<br>L<br>OT0016<br>SI', ''),
('2019-01-30 14:16:31', 226, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819122<br>LINDA PERMATA SARI<br>Jakarta<br>08597652781761<br>P<br>OT0017<br>SI', ''),
('2019-01-30 14:17:40', 227, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819123<br>LUKMAN HARUN<br>Jakarta<br>0856676429820<br>L<br>OT0018<br>SI', ''),
('2019-01-30 14:18:28', 228, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819124<br>MIFTAHUL FAUZAN ALVIANSYAH<br>Tangerang<br>0896565711709<br>L<br>OT0019<br>SI', ''),
('2019-01-30 14:19:53', 229, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819117<br>MOHAMMAD ARDITIAS ANGGORO<br>Jakarta<br>0897635416266<br>L<br>OT0019<br>SI', ''),
('2019-01-30 14:24:39', 230, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-30 14:25:33', 231, '1819140', '', 'Monitor &raquo; Login', 'Login SebagaiSiswa', '', '', ''),
('2019-01-30 14:26:01', 232, '1819140', '', 'Monitor &raquo; Logout', 'Logout From Siswa', '', '', ''),
('2019-01-30 21:03:26', 233, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-30 21:28:38', 234, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-30 21:29:04', 235, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-01-30 21:29:56', 236, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191061220190130212955<br>1819106<br>12<br>GR001<br>2019-01-30<br>20190130212955<br>kantin<br>A', ''),
('2019-01-30 21:48:40', 237, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191071220190130214840<br>1819107<br>12<br>GR001<br>2019-01-29<br>20190130214840<br>AAA<br>s', ''),
('2019-01-30 22:15:04', 238, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190130221504<br>1819106<br>2<br>GR001<br>2019-01-23<br>20190130221504<br>Depan Sekolah<br>Jangan Diulangi', ''),
('2019-01-30 23:10:14', 239, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191061220190130231014<br>1819106<br>12<br>GR001<br>2019-01-29<br>20190130231014<br>Depan Sekolah<br>a', ''),
('2019-01-30 23:54:34', 240, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190130235433<br>1819106<br>2<br>10<br>GR001<br>2019-01-02<br>20190130235433<br>T<br>v', ''),
('2019-01-31 00:13:48', 241, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190131001348<br>1819106<br>2<br>10<br>GR001<br>2019-01-09<br>20190131001348<br>Depan Sekolah<br>a', ''),
('2019-01-31 00:28:15', 242, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190131002815<br>1819106<br>2<br>10<br>GR001<br>2019-01-02<br>20190131002815<br>Depan Sekolah<br>x', ''),
('2019-01-31 00:39:01', 243, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190131003901<br>1819106<br>2<br>5<br>GR001<br>2019-01-22<br>20190131003901<br>kantin<br>v', ''),
('2019-01-31 00:44:58', 244, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-01-31 00:45:19', 245, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-31 02:40:24', 246, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-01-31 02:47:45', 247, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-01-31 02:57:30', 248, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1111<br>11111111<br>1111111<br>1111<br>L<br>OT0016<br>SI', ''),
('2019-01-31 02:58:39', 249, 'AD001', '', 'Monitor &raquo; Siswa', 'Menghapus Data', '', '', '1111'),
('2019-01-31 04:47:04', 250, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-01 06:13:37', 251, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-02-01 06:15:32', 252, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191061220190201061532<br>1819106<br>12<br>25<br>GR001<br>2019-02-07<br>20190201061532<br>kantin<br>JANGAN DIULANGI!!', ''),
('2019-02-01 06:19:02', 253, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819107220190201061902<br>1819107<br>2<br>5<br>GR001<br>2019-01-31<br>20190201061902<br>Depan Sekolah<br>Kayak gak bisa lewat pintu aja', ''),
('2019-02-01 06:19:54', 254, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-02-01 06:20:05', 255, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-01 07:35:02', 256, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-01 07:35:16', 257, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-01 16:45:04', 258, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-01 19:11:01', 259, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menghapus Data', '', '', '62'),
('2019-02-02 00:24:02', 260, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 01:23:19', 261, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819106'),
('2019-02-02 01:52:26', 262, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-02 01:52:41', 263, 'GR002', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-02-02 01:53:45', 264, 'GR002', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191071420190202015345<br>1819107<br>14<br>25<br>GR002<br>2019-02-01<br>20190202015345<br>Depan Sekolah<br>A', ''),
('2019-02-02 01:53:53', 265, 'GR002', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-02-02 01:54:02', 266, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 01:54:45', 267, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819107'),
('2019-02-02 01:55:21', 268, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-02 01:55:31', 269, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-02-02 01:56:03', 270, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190202015603<br>1819106<br>2<br>5<br>GR001<br>2019-02-01<br>20190202015603<br>kantin<br>Q', ''),
('2019-02-02 01:56:27', 271, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191061220190202015627<br>1819106<br>12<br>25<br>GR001<br>2019-02-01<br>20190202015627<br>Depan Sekolah<br>A', ''),
('2019-02-02 01:57:26', 272, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191082320190202015726<br>1819108<br>23<br>15<br>GR001<br>2019-02-01<br>20190202015726<br>kantin<br>A', ''),
('2019-02-02 01:57:31', 273, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-02-02 01:57:41', 274, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 02:00:34', 275, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819106'),
('2019-02-02 02:01:13', 276, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '18191061220190202015627'),
('2019-02-02 02:02:03', 277, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-02 02:02:12', 278, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-02-02 02:02:49', 279, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190202020249<br>1819106<br>2<br>5<br>GR001<br>2019-02-01<br>20190202020249<br>Depan Sekolah<br>Q', ''),
('2019-02-02 02:03:48', 280, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819108220190202020348<br>1819108<br>2<br>5<br>GR001<br>2019-02-01<br>20190202020348<br>A<br>A', ''),
('2019-02-02 02:03:53', 281, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-02-02 02:04:05', 282, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 02:04:24', 283, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819106220190202015603'),
('2019-02-02 02:05:25', 284, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '18191082320190202015726'),
('2019-02-02 02:11:45', 285, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-02 02:11:54', 286, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 02:27:25', 287, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 02:35:15', 288, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 03:26:21', 289, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-02 03:26:34', 290, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-02-02 03:27:10', 291, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190202032710<br>1819106<br>2<br>5<br>GR001<br>2019-02-01<br>20190202032710<br>Depan Sekolah<br>AA', ''),
('2019-02-02 03:27:40', 292, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190202032740<br>1819106<br>2<br>25<br>GR001<br>2019-02-08<br>20190202032740<br>A<br>A', ''),
('2019-02-02 03:28:23', 293, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819108220190202032823<br>1819108<br>2<br>A<br>GR001<br>2019-02-08<br>20190202032823<br>AAA<br>A', ''),
('2019-02-02 03:28:37', 294, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-02-02 03:28:45', 295, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 03:39:09', 296, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819106220190202020249'),
('2019-02-02 03:40:06', 297, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819108220190202032823'),
('2019-02-02 03:40:51', 298, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Menambah Data', '', 'a <br> 2<br> 11', ''),
('2019-02-02 04:02:37', 299, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Mengedit Data', '<br><br><br>', '<br>a<br>3<br>11', '60'),
('2019-02-02 04:02:56', 300, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Mengedit Data', '<br><br><br>', '<br>a<br>11<br>11', '60'),
('2019-02-02 04:04:02', 301, 'AD001', '', 'Monitor &raquo; Pelanggaran', 'Mengedit Data', '60<br>a<br>2<br>11', '<br>a<br>4<br>11', '60'),
('2019-02-02 04:07:25', 302, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819106220190202032710'),
('2019-02-02 04:07:38', 303, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819106220190202032740'),
('2019-02-02 04:07:46', 304, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '1819108220190202020348'),
('2019-02-02 23:17:57', 305, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 23:18:25', 306, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-02 23:18:36', 307, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-02-02 23:19:49', 308, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191061220190202231949<br>1819106<br>12<br>25<br>GR001<br>2019-02-01<br>20190202231949<br>A<br>A', ''),
('2019-02-02 23:20:15', 309, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191061520190202232015<br>1819106<br>15<br>A<br>GR001<br>2019-02-01<br>20190202232015<br>AAA<br>A', ''),
('2019-02-02 23:20:50', 310, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191061320190202232050<br>1819106<br>13<br>50<br>GR001<br>2019-02-01<br>20190202232050<br>V<br>Z', ''),
('2019-02-02 23:20:56', 311, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-02-02 23:21:05', 312, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-02 23:21:40', 313, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '18191061220190202231949'),
('2019-02-02 23:21:47', 314, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '18191061320190202232050'),
('2019-02-02 23:22:00', 315, 'AD001', '', 'Monitor &raquo; Laporan', 'Menghapus Data', '', '', '18191061520190202232015'),
('2019-02-02 23:59:21', 316, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819139<br>VICKY FATURRACHMAN<br>Jakarta<br>0895625456711<br>L<br>OT0001<br>SI', ''),
('2019-02-03 00:41:33', 317, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819138<br>TIARA ZAHIRA RAMADHINA ISMAIL<br>Jakarta<br>0897625267151<br>P<br>OT0002<br>SI', ''),
('2019-02-03 00:42:42', 318, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819137<br>RIFA ZAHRO NURHAYATI<br>Jakarta<br>0858762652422<br>P<br>OT0003<br>SI', ''),
('2019-02-03 01:25:37', 319, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819136<br>RESKY JORDAN<br>Tangerang<br>08527657268722<br>L<br>OT0003<br>SI', ''),
('2019-02-03 01:26:40', 320, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819135<br>RAMADHANA AZIZAH NAN SOLEHA<br>Tangerang<br>08786562567252<br>P<br>OT0004<br>SI', ''),
('2019-02-03 01:27:27', 321, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819133<br>NURSAIDA<br>Jakarta<br>08767656514611<br>P<br>OT0005<br>SI', ''),
('2019-02-03 01:28:17', 322, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819127<br>NUR ALAMI<br>Jakarta<br>089527656156527<br>P<br>OT0006<br>SI', ''),
('2019-02-03 01:29:16', 323, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819132<br>NADILA ANDINI SETIASIH<br>Tangerang<br>08567652776176<br>P<br>OT0007<br>SI', ''),
('2019-02-03 01:30:15', 324, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819130<br>MUHAMMAD RAFLI QUSNAINI<br>Jakarta<br>08787556252672<br>L<br>OT0009<br>SI', ''),
('2019-02-03 01:31:04', 325, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819129<br>MUHAMMAD IKHSAN FADIL<br>Jakarta<br>0878656252522<br>L<br>OT0010<br>SI', ''),
('2019-02-03 01:31:57', 326, 'AD001', '', 'Monitor &raquo; Siswa', 'Menambah Data', '', '1819128<br>MUHAMMAD DAUD<br>Jakarta<br>08956651667171<br>L<br>OT0015<br>SI', ''),
('2019-02-03 01:32:31', 327, 'AD001', '', 'Monitor &raquo; Kelas Jurusan', 'Menghapus Data', '', '', 'KLJ0005'),
('2019-02-03 01:33:03', 328, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-03 01:33:15', 329, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', ''),
('2019-02-03 01:34:33', 330, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '1819106220190203013432<br>1819106<br>2<br>5<br>GR001<br>2019-02-01<br>20190203013432<br>Depan Sekolah<br>Jangan Diulangi lagi!', ''),
('2019-02-03 01:52:26', 331, 'GR001', '', 'Monitor &raquo; Pelanggaran Siswa', 'Menambah Pelanggaran', '', '18191072320190203015226<br>1819107<br>23<br>15<br>GR001<br>2019-01-31<br>20190203015226<br>Kelas<br>mau jadi pegulat daftar MMA aja.', ''),
('2019-02-03 01:52:53', 332, 'GR001', '', 'Monitor &raquo; Logout', 'Logout From Guru', '', '', ''),
('2019-02-03 01:53:01', 333, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-03 01:54:36', 334, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-03 12:23:59', 335, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-03 12:27:24', 336, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-03 12:27:44', 337, 'OT0001', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2019-02-03 12:28:40', 338, 'OT0001', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2019-02-03 12:28:51', 339, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-03 12:30:08', 340, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-03 12:30:29', 341, 'OT0002', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2019-02-03 12:32:53', 342, 'OT0002', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2019-02-03 12:33:08', 343, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-03 12:38:08', 344, 'AD001', '', 'Monitor &raquo; Siswa', 'Mengedit Data', '1819139<br>VICKY FATURRACHMAN<br>Jakarta<br>0895625456711<br>L<br>OT0001', '1819139<br>VICKY FATURRACHMAN<br>Jakarta<br>0895625456711<br>L<br>OT0018', '1819139'),
('2019-02-03 12:38:54', 345, 'AD001', '', 'Monitor &raquo; Siswa', 'Mengedit Data', '1819138<br>TIARA ZAHIRA RAMADHINA ISMAIL<br>Jakarta<br>0897625267151<br>P<br>OT0002', '1819138<br>TIARA ZAHIRA RAMADHINA ISMAIL<br>Jakarta<br>0897625267151<br>P<br>OT0016', '1819138'),
('2019-02-03 12:39:48', 346, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-03 12:40:04', 347, 'OT0001', '', 'Monitor &raquo; Login', 'Login Sebagai Orang Tua', '', '', ''),
('2019-02-03 12:41:55', 348, 'OT0001', '', 'Monitor &raquo; Logout', 'Logout From Orang Tua', '', '', ''),
('2019-02-03 12:42:03', 349, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-04 00:05:04', 350, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-04 02:31:56', 351, 'AD001', '', 'Monitor &raquo; Login', 'Login Sebagai Administrator', '', '', ''),
('2019-02-04 02:32:35', 352, 'AD001', '', 'Monitor &raquo; Logout', 'Logout From Administrator', '', '', ''),
('2019-02-04 02:32:50', 353, 'GR001', '', 'Monitor &raquo; Login', 'Login Sebagai Guru', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` varchar(10) NOT NULL,
  `alamat_ortu` text,
  `nama_ortu` varchar(25) DEFAULT NULL,
  `pekerjaan_ortu` varchar(50) DEFAULT NULL,
  `hp_ortu` varchar(13) DEFAULT NULL,
  `status_ortu` varchar(1) DEFAULT NULL,
  `id_akses_ortu` varchar(2) DEFAULT NULL,
  `pass_ortu` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `alamat_ortu`, `nama_ortu`, `pekerjaan_ortu`, `hp_ortu`, `status_ortu`, `id_akses_ortu`, `pass_ortu`) VALUES
('OT0001', 'Jakarta', 'Fahmi', 'Pegawai Swasta', '089676453909', '1', 'OT', '453f482da2b86a74e5555bddb95a2b28'),
('OT0002', 'Jakarta', 'Tarjorno', 'Pegawai Swasta', '083862786987', '1', 'OT', 'f11c4d2e283fb3431ed923c29454e64e'),
('OT0003', 'Jakarta', 'Budiman', 'Pegawai Swasta', '0852673467420', '1', 'OT', 'a992a617ae8a93245630584abd9dee85'),
('OT0004', 'Jakarta', 'Saiful', 'Wiraswasta', '0852798765624', '1', 'OT', '640e672a8e82b017c6872ddc2bf2f1b9'),
('OT0005', 'Jakarta', 'Amirudin', 'PNS', '0896754567210', '1', 'OT', '2d21ff9f615b8fa5367810d1b25a3837'),
('OT0006', 'Tangerang', 'Slamet', 'Pegawai Swasta', '089678226761', '1', 'OT', '268bde24d3d59f992b5b3bf01ff15d7f'),
('OT0007', 'Jakarta', 'Arif Hidayat', 'Pegawai Swasta', '0897862652662', '1', 'OT', 'e5f272fbd8f33a7cb1dac4b82f546013'),
('OT0008', 'Jakarta', 'Karjono', 'Wirausaha', '085267826789', '1', 'OT', '8edf8438604a885f487fb25a064d6965'),
('OT0009', 'Tangerang', 'Efendi', 'Wirausaha', '089562456710', '1', 'OT', 'e301980291c0ff666dd6517ed8728a6c'),
('OT0010', 'Jakarta', 'Taridi', 'Pegawai', '083878627627', '1', 'OT', '3b6f73903214aa806a003c94396e904f'),
('OT0011', 'Jakarta', 'Yono', 'Pegawai', '089762565262', '1', 'OT', '89f4472a82a1a89f03b29f61ffde4bfe'),
('OT0012', 'Jakarta', 'Riyadi', 'Buruh', '089566546576', '1', 'OT', '27e482c0faf243b0dc3184e0db8a3940'),
('OT0013', 'Jakarta', 'Bahrudin', 'Pegawai Swasta', '0852615161517', '1', 'OT', 'f9e1c276732f7124aca4cef80061abdf'),
('OT0014', 'Jakarta', 'Supaat', 'Pegawai', '0897656544526', '1', 'OT', '1f623ae6e42ebc2485d786077ba45c45'),
('OT0015', 'Tangerang', 'Hanny', 'TNI', '0852651656151', '1', 'OT', '65e70729c8c76be9d9c05849ea8db0f4'),
('OT0016', 'Jakarta', 'Kasimin', 'PNS', '089767652652', '1', 'OT', '4ec8b6753e38b0d6406afcb5d26474d1'),
('OT0017', 'Jakarta', 'Jaenudin', 'Pedagang', '089652424262', '1', 'OT', '366377b2f45d9d16335485cdeb61fb49'),
('OT0018', 'Tangerang', 'Ngaciro', 'Buruh', '0867652657265', '1', 'OT', 'ac8b0f9531ece6ecb94b90b87b83b9d7'),
('OT0019', 'Jakarta', 'Kardjoni', 'Polisi', '0852452427715', '1', 'OT', 'fbb879fcf9fe385c37c010e184ea2408');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(225) NOT NULL,
  `id_kategori_pelanggaran` varchar(10) NOT NULL,
  `point_pelanggaran` int(11) NOT NULL,
  `status_pelanggaran` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_kategori_pelanggaran`, `point_pelanggaran`, `status_pelanggaran`) VALUES
(2, 'Masuk lingkungan sekolah dengan loncat pagar', '1', 5, '1'),
(3, 'Keluar dari lingkungan sekolah tanpa izin', '1', 10, '1'),
(4, 'Mengotori (mencoret-coret) benda milik sekolah, guru, pegawai dan teman', '1', 15, '1'),
(5, 'Merusak/ menghilangkan barang milik sekolah, guru, pegawai dan teman', '1', 15, '1'),
(6, 'Mengambil (mencuri) barang milik sekolah, guru, pegawai dan teman', '1', 25, '1'),
(7, 'Makan dan minum didalam kelas saat berlangsung pelajaran', '1', 5, '1'),
(8, 'Membawa benda yang tidak ada kaitannya dengan proses belajar', '1', 10, '1'),
(9, 'Bertengkar/ bertentangan dengan teman dilingkungan sekolah', '1', 10, '1'),
(10, 'Malakukan tindakan asusila (maksiat) didalam maupun diluar lingkungan sekolah', '1', 90, '1'),
(11, 'Melakukan perbuatan yang berakibat mencemarkan nama baik sekolah', '1', 40, '1'),
(12, 'Membawa rokok', '2', 25, '1'),
(13, 'Merokok/ menghisap roko disekolah atau ditempat lain', '2', 50, '1'),
(14, 'Membawa buku, majalah, atau kaset (terlarang)', '3', 25, '1'),
(15, 'Menjual buku, Majalah atau kaset (terlarang)', '3', 25, '1'),
(16, 'Membawa senjata tajam tanpa izin', '4', 30, '1'),
(17, 'Memperjual belikan senjata tajam', '4', 50, '1'),
(18, 'Menggunakan senjata tajam untuk mengancam', '4', 75, '1'),
(19, 'Menggunakan senjata tajam untuk melukai', '4', 100, '1'),
(20, 'Membawa obat/ minuman terlarang', '5', 50, '1'),
(21, 'Menggunakan obat/ minuman terlarang', '5', 75, '1'),
(22, 'Memperjual belikan obat/ minuman terlarang', '5', 75, '1'),
(23, 'Disebabkan oleh siswa dalam sekolah (Intern)', '6', 15, '1'),
(24, 'Disebabkan oleh siswa sekolah lain', '6', 25, '1'),
(25, 'Antar siswa', '6', 50, '1'),
(26, 'Satu kali', '7', 5, '1'),
(27, 'Dua kali', '7', 10, '1'),
(28, 'Tiga kali', '7', 10, '1'),
(29, 'Terlambat masuk karena izin', '7', 5, '1'),
(30, 'Terlambat masuk karena diberi tugas guru', '7', 5, '1'),
(31, 'Terlambat masuk karena alasan dibuat-buat 5 poin', '7', 25, '1'),
(32, 'Izin keluar saat proses belajar berlangsung tidak kembali', '7', 25, '1'),
(33, 'Pulang tanpa izin', '7', 25, '1'),
(34, 'Sakit tanpa keterangan (surat)', '8', 5, '1'),
(35, 'Izin tanpa keterangan', '8', 10, '1'),
(36, 'Alfa', '8', 10, '1'),
(37, 'Tidak mengikuti kegiatan belajar (bolos)', '8', 20, '1'),
(38, 'Tidak masuk sekolah dengan membuat surat keterangan palsu', '8', 15, '1'),
(39, 'Keluar kelas saat proses belajar mengajar berlangsung', '8', 15, '1'),
(40, 'Tidak mengikuti shalat dzuhur berjama’ah', '8', 10, '1'),
(41, 'Tidak menghadiri kegiatan ekstrakurikuler', '8', 5, '1'),
(42, 'Memakai seragam tidak rapi/ tidak dimasukkan (laki-laki)', '9', 3, '1'),
(43, 'Memakai seragam yang ketat', '9', 3, '1'),
(44, 'Tidak berpakaian seragam lengkap beserta atribut (sesuai ketentuan)', '9', 5, '1'),
(45, 'Tidak memakai ikat pinggang hitam polos', '9', 5, '1'),
(46, 'Tidak memakai sepatu hitam bertali', '9', 5, '1'),
(47, 'Tidak memakai kaos kaki (sesuai ketentuan)', '9', 5, '1'),
(48, 'Tidak memakai kaos dalam (sesuai ketentuan)', '9', 5, '1'),
(49, 'Memakai peci bagi putra dan jilbab bagi putri (sesuai ketentuan)', '9', 5, '1'),
(50, 'Siswa putri memakai perhiasan berlebihan', '9', 10, '1'),
(51, 'Siswa putra memakai perhiasan atau assesoris (kalung, gelang, dll)', '9', 5, '1'),
(52, 'Memakai pin assesoris yang tidak berkaitan dengan sekolah', '9', 5, '1'),
(53, 'Memakai jaket/ Switer kedalam kelas', '9', 5, '1'),
(54, 'Memanjangkan kuku/ mencatnya', '9', 5, '1'),
(55, 'Mencoret-coret pakaian sekolah dengan sengaja', '9', 20, '1'),
(56, 'Mencoret-coret pakaian sekolah dengan sengaja (setelah berakhirnya UN)', '9', 50, '1'),
(57, 'Panjang melalui batas ketentuan (telinga, alis, dan krah baju)', '10', 5, '1'),
(58, 'Pendek/ dicukur tidak rapi untuk siswa putra', '10', 10, '1'),
(59, 'Dicat/ warna-warnai (putra/putri)', '10', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_siswa`
--

CREATE TABLE `pelanggaran_siswa` (
  `id_pelanggaran_siswa` varchar(50) NOT NULL,
  `nis_pelanggaran_siswa` varchar(12) NOT NULL,
  `id_pelanggaran_pelanggaran_siswa` varchar(10) NOT NULL,
  `point_pelanggaran` varchar(3) NOT NULL,
  `id_guru_pelanggaran_siswa` varchar(25) NOT NULL,
  `waktu_melanggar_pelanggaran_siswa` date NOT NULL,
  `waktu_input_pelanggaran_siswa` datetime NOT NULL,
  `tempat_pelanggaran_siswa` varchar(225) NOT NULL,
  `keterangan_pelanggaran_siswa` text NOT NULL,
  `status_pelanggaran_siswa` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran_siswa`
--

INSERT INTO `pelanggaran_siswa` (`id_pelanggaran_siswa`, `nis_pelanggaran_siswa`, `id_pelanggaran_pelanggaran_siswa`, `point_pelanggaran`, `id_guru_pelanggaran_siswa`, `waktu_melanggar_pelanggaran_siswa`, `waktu_input_pelanggaran_siswa`, `tempat_pelanggaran_siswa`, `keterangan_pelanggaran_siswa`, `status_pelanggaran_siswa`) VALUES
('1819106220190203013432', '1819106', '2', '5', 'GR001', '2019-02-01', '2019-02-03 01:34:32', 'Depan Sekolah', 'Jangan Diulangi lagi!', '1'),
('18191072320190203015226', '1819107', '23', '15', 'GR001', '2019-01-31', '2019-02-03 01:52:26', 'Kelas', 'mau jadi pegulat daftar MMA aja.', '1');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis_siswa` varchar(12) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jenkel_siswa` varchar(1) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `hp_siswa` varchar(13) NOT NULL,
  `id_wali_siswa` varchar(10) NOT NULL,
  `id_kelas_siswa` varchar(10) NOT NULL,
  `id_akses_siswa` varchar(2) NOT NULL,
  `pass_siswa` varchar(225) NOT NULL,
  `status_siswa` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis_siswa`, `nama_siswa`, `jenkel_siswa`, `alamat_siswa`, `hp_siswa`, `id_wali_siswa`, `id_kelas_siswa`, `id_akses_siswa`, `pass_siswa`, `status_siswa`) VALUES
('1819106', 'ABDILLAH AKMAL AL FAIZIN', 'L', 'Jakarta', '0897562278524', 'OT0001', 'KLJ0001', 'SI', '9e722e1a692a0e6ec77bbd8f27396421', '1'),
('1819107', 'AFNAN FIRDAUS FEBRIANSYAH', 'L', 'Jakarta', '0838982672622', 'OT0002', 'KLJ0001', 'SI', '1c1a6bf358c523883edd5a5c8e5be7bf', '1'),
('1819108', 'AGI YUSUP', 'L', 'Jakarta', '0895672254619', 'OT0003', 'KLJ0001', 'SI', '4c76768411ce1e1d3c3eebf47c068a48', '1'),
('1819109', 'ALWAN GUSTI PUTRA PRATAMA', 'L', 'Jakarta', '0852765687625', 'OT0004', 'KLJ0001', 'SI', '1a6ce7a26aff7f2faa9a241bf3e66bf2', '1'),
('1819110', 'ARYA RAKA PUTRA', 'L', 'Jakarta', '0898562787545', 'OT0005', 'KLJ0001', 'SI', 'ef8e8a2a4d833d2bcaf60804497429e5', '1'),
('1819111', 'BAGAS SRIYADIYANTO', 'L', 'Jakarta', '0852678752451', 'OT0006', 'KLJ0001', 'SI', '892acbb432b7083b4caabcbe1da697e3', '1'),
('1819112', 'BAGUS TRI WICAKSONO', 'L', 'Jakarta', '0897676662526', 'OT0007', 'KLJ0001', 'SI', '1d6ce5188c4d5fd443158c1fb699fd1a', '1'),
('1819113', 'BAYHAQI ADHLI HAKIM', 'L', 'Tangerang', '0897637672627', 'OT0008', 'KLJ0001', 'SI', '120c5e403cf8e995300e245604dc23d7', '1'),
('1819114', 'DAFFA WIBI GHIFARI', 'L', 'Jakarta', '0986726762715', 'OT0009', 'KLJ0001', 'SI', '075e18c65049aac8196d4210693041df', '1'),
('1819115', 'DHONI KHARIRI', 'L', 'Jakarta', '0897672675161', 'OT0010', 'KLJ0001', 'SI', '691d390a015b2510e1446eec69aa2e1b', '1'),
('1819116', 'DIAN SULISTYA CHANIAGO', 'P', 'Jakarta', '0897652651615', 'OT0012', 'KLJ0001', 'SI', '238156e3cefdbf53b6f2b50856eb350a', '1'),
('1819117', 'MOHAMMAD ARDITIAS ANGGORO', 'L', 'Jakarta', '0897635416266', 'OT0019', 'KLJ0001', 'SI', '643c3ee17e99319e902c6b26af6e71dd', '1'),
('1819118', 'FARHAN HUDA', 'L', 'Jakarta', '0852656252625', 'OT0013', 'KLJ0001', 'SI', '22d424c7ea0e31e60aad84940f0625a1', '1'),
('1819119', 'HANNA PRATIWI', 'P', 'Jakarta', '0896565645242', 'OT0014', 'KLJ0001', 'SI', '66898f5118353ec1eb130947f8eed432', '1'),
('1819120', 'ILHAM NUR RAMDANI', 'L', 'Jakarta', '0856562565716', 'OT0015', 'KLJ0001', 'SI', 'fa9ef0d7067bbee86eba4af8101e60b3', '1'),
('1819121', 'KHANSA HAFIDZ AL GHAZALI', 'L', 'Tangerang', '0895657826527', 'OT0016', 'KLJ0001', 'SI', '9d4400d739d9a3609958ff982c2e495e', '1'),
('1819122', 'LINDA PERMATA SARI', 'P', 'Jakarta', '0859765278176', 'OT0017', 'KLJ0001', 'SI', 'f634176205b5d0a2ee06301f4b9b9a76', '1'),
('1819123', 'LUKMAN HARUN', 'L', 'Jakarta', '0856676429820', 'OT0018', 'KLJ0001', 'SI', 'b37bb68e13172ffc4a200190dc266f57', '1'),
('1819124', 'MIFTAHUL FAUZAN ALVIANSYAH', 'L', 'Tangerang', '0896565711709', 'OT0019', 'KLJ0001', 'SI', '674ca53e82ce424f886c485b8dadad38', '1'),
('1819127', 'NUR ALAMI', 'P', 'Jakarta', '0895276561565', 'OT0006', 'KLJ0001', 'SI', '2f7682fc7dc862c9e750079321b410c0', '1'),
('1819128', 'MUHAMMAD DAUD', 'L', 'Jakarta', '0895665166717', 'OT0015', 'KLJ0001', 'SI', '3550319235e867a8ba0870c254e716d4', '1'),
('1819129', 'MUHAMMAD IKHSAN FADIL', 'L', 'Jakarta', '0878656252522', 'OT0010', 'KLJ0001', 'SI', '942299064ae38b64089b210941a25553', '1'),
('1819130', 'MUHAMMAD RAFLI QUSNAINI', 'L', 'Jakarta', '0878755625267', 'OT0009', 'KLJ0001', 'SI', 'd9a5f721004f8340a4ff8192024e04f7', '1'),
('1819132', 'NADILA ANDINI SETIASIH', 'P', 'Tangerang', '0856765277617', 'OT0007', 'KLJ0001', 'SI', '8410425af7d2837998eda621ace97e89', '1'),
('1819133', 'NURSAIDA', 'P', 'Jakarta', '0876765651461', 'OT0005', 'KLJ0001', 'SI', 'c1259e119963253d2613b00e92d86d5d', '1'),
('1819135', 'RAMADHANA AZIZAH NAN SOLEHA', 'P', 'Tangerang', '0878656256725', 'OT0004', 'KLJ0001', 'SI', 'cb25a1d6de6007654395b06cd6b7b8d2', '1'),
('1819136', 'RESKY JORDAN', 'L', 'Tangerang', '0852765726872', 'OT0003', 'KLJ0001', 'SI', '7f87b16fd9bf3f9963d3fd4d758450b6', '1'),
('1819137', 'RIFA ZAHRO NURHAYATI', 'P', 'Jakarta', '0858762652422', 'OT0003', 'KLJ0001', 'SI', '098fa3a382790f4a3559de4e3b16f666', '1'),
('1819138', 'TIARA ZAHIRA RAMADHINA ISMAIL', 'P', 'Jakarta', '0897625267151', 'OT0016', 'KLJ0001', 'SI', '48b6bac954d5a1c681086ed2c7a0a878', '1'),
('1819139', 'VICKY FATURRACHMAN', 'L', 'Jakarta', '0895625456711', 'OT0018', 'KLJ0001', 'SI', '7a98389ebd54dd24524c14bb876da336', '1'),
('1819140', 'ZAMZA RIDJAL', 'L', 'Jakarta', '087897627627', 'OT0011', 'KLJ0001', 'SI', '44c55eb449fdd2d9d8a5262c84836585', '1');

-- --------------------------------------------------------

--
-- Structure for view `kelastetap`
--
DROP TABLE IF EXISTS `kelastetap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelastetap`  AS  select `kelasjurusan`.`id_kelasjurusan` AS `id_kelasjurusan`,`kelasjurusan`.`id_kelas_kelasjurusan` AS `id_kelas_kelasjurusan`,`kelasjurusan`.`id_jurusan_kelasjurusan` AS `id_jurusan_kelasjurusan`,`kelasjurusan`.`daya_tampung_kelasjurusan` AS `daya_tampung_kelasjurusan`,`kelasjurusan`.`status_kelasjurusan` AS `status_kelasjurusan`,`kelasjurusan`.`urutan_kelasjurusan` AS `urutan_kelasjurusan`,`kelasjurusan`.`id_walikelas_kelasjurusan` AS `id_walikelas_kelasjurusan`,`kelas`.`id_kelas` AS `id_kelas`,`kelas`.`status_kelas` AS `status_kelas`,`kelas`.`nama_kelas` AS `nama_kelas`,`kelas`.`tingkatan_kelas` AS `tingkatan_kelas`,`jurusan`.`id_jurusan` AS `id_jurusan`,`jurusan`.`nama_jurusan` AS `nama_jurusan`,`jurusan`.`akronim_jurusan` AS `akronim_jurusan`,`jurusan`.`status_jurusan` AS `status_jurusan` from ((`kelasjurusan` join `kelas` on((`kelasjurusan`.`id_kelas_kelasjurusan` = `kelas`.`id_kelas`))) join `jurusan` on((`kelasjurusan`.`id_jurusan_kelasjurusan` = `jurusan`.`id_jurusan`))) where ((`kelasjurusan`.`status_kelasjurusan` = '1') and (`kelas`.`status_kelas` = '1') and (`jurusan`.`status_jurusan` = '1')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  ADD PRIMARY KEY (`id_kategori_pelanggaran`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelasjurusan`
--
ALTER TABLE `kelasjurusan`
  ADD PRIMARY KEY (`id_kelasjurusan`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_kategori` (`id_kategori_pelanggaran`);

--
-- Indexes for table `pelanggaran_siswa`
--
ALTER TABLE `pelanggaran_siswa`
  ADD PRIMARY KEY (`id_pelanggaran_siswa`),
  ADD KEY `nis` (`nis_pelanggaran_siswa`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran_pelanggaran_siswa`),
  ADD KEY `id_guru` (`id_guru_pelanggaran_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis_siswa`),
  ADD KEY `id_kelas_siswa` (`id_kelas_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_pelanggaran`
--
ALTER TABLE `kategori_pelanggaran`
  MODIFY `id_kategori_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
