-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2017 at 04:53 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbrekam08`
--

-- --------------------------------------------------------

--
-- Table structure for table `anamnesis`
--

CREATE TABLE IF NOT EXISTS `anamnesis` (
  `no_anamnesis` int(4) NOT NULL AUTO_INCREMENT,
  `no_pasien` varchar(4) NOT NULL,
  `pertus_terakhir` varchar(12) NOT NULL,
  `golongan_darah` varchar(2) NOT NULL,
  `keluhan` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `id_diagnosa1` int(3) NOT NULL,
  `id_diagnosa2` int(3) NOT NULL,
  `gpa` varchar(10) NOT NULL,
  `terapi` varchar(20) NOT NULL,
  `hpht` varchar(20) NOT NULL,
  `abosrtus_terakhir` varchar(20) NOT NULL,
  `rujukan` varchar(20) NOT NULL,
  `id_dokter` varchar(5) NOT NULL,
  `id_bulan` int(2) NOT NULL,
  PRIMARY KEY (`no_anamnesis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `anamnesis`
--

INSERT INTO `anamnesis` (`no_anamnesis`, `no_pasien`, `pertus_terakhir`, `golongan_darah`, `keluhan`, `tanggal`, `id_diagnosa1`, `id_diagnosa2`, `gpa`, `terapi`, `hpht`, `abosrtus_terakhir`, `rujukan`, `id_dokter`, `id_bulan`) VALUES
(1, '1', 'dfsdfsd', 'O', 'zxczx', '2015-01-20', 6, 18, 'zxczx', 'zxc', 'zxc', 'fghfgh', 'dfgdfg', '123', 1),
(2, '2', 'dfdasf', 'AB', 'cvxcv', '2015-01-15', 2, 6, 'xcvxcv', 'sdfsdf', 'sdfsdf', 'sdf', 'sdf', '123', 1),
(3, '4', 'asdasd', 'A', 'asdas', '2015-03-20', 6, 10, 'xdczx', 'asd', 'asd', 'asd', 'asd', '235', 3),
(4, '5', 'asdas', 'B', 'sz', '2015-04-20', 6, 6, 'sdasd', 'asd', 'asd', 'asdas', 'sads', '235', 4),
(5, '1', 'ghg', 'gh', 'gh', '2015-05-22', 2, 4, 'hb', 'gh', 'gh', 'gh', 'gh', '235', 5),
(6, '4', 'ghg dfgfd', 'gh', 'gh', '2015-06-22', 4, 0, 'hb', 'gh', 'gh', 'gh', 'gh', '235', 6),
(8, '21', 'sdf', 'AB', 'sdfsdf', '2015-11-25', 2, 17, 'dfds', 'sdf', 'sdf', 'sdfsd', 'sdfsd', '235', 7),
(9, '21', 'sdf', 'AB', 'sdfsdf', '2015-10-25', 2, 17, 'dfds', 'sdf', 'sdf', 'sdfsd', 'sdfsd', '235', 10),
(10, '12', 'dfs', 'A', 'asdas', '2015-11-25', 10, 19, 'dfg', 'sdf', 'asd', 'asdas', 'asd', '235', 11),
(11, '23', 'zxc', 'A', 'zxczx', '2015-11-25', 10, 15, 'zxzc', 'xc', 'zxc', 'zxczx', 'zxc', '235', 11);

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE IF NOT EXISTS `bulan` (
  `id_bulan` int(2) NOT NULL AUTO_INCREMENT,
  `bulan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_bulan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'Nopember'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE IF NOT EXISTS `diagnosa` (
  `id_diagnosa` int(3) NOT NULL AUTO_INCREMENT,
  `diagnosa` varchar(30) NOT NULL,
  `kode` varchar(10) NOT NULL,
  PRIMARY KEY (`id_diagnosa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=253 ;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id_diagnosa`, `diagnosa`, `kode`) VALUES
(1, 'ABDOMINAL PAIN', 'R10.4'),
(2, 'ABORTUS IMINENS', 'O20.0'),
(3, 'ABORTUS INFEKSIUS', 'O08.0'),
(4, 'ABORTUS INKOMPLIT', 'O06.9'),
(5, 'ABORTUS LAINNYA', 'O.05'),
(6, 'ABORTUS SPONTAN', 'O.03'),
(7, 'ABSES (LUKA)', 'L02.9'),
(8, 'ABSES ABDOMINAL', 'K65.0'),
(9, 'ABSES CORNEA', 'H16.3'),
(10, 'ABSES DADA', '386.9'),
(11, 'ABSES GINGIVAL', 'K05.2'),
(12, 'ABSES KEPALA / REGIO', 'L02.8'),
(13, 'ABSES LUTUT KIRI/AKSILA/FEMUR/', 'L02.4'),
(14, 'ABSES MAMA', 'N61'),
(15, 'ABSES MANDIBULA', 'K10.0'),
(16, 'ABSES PAGINA', 'N76.0'),
(17, 'ABSES PALATUM', 'K12.2'),
(18, 'ABSES PALPEBRA', 'H00.0'),
(19, 'ABSES PANTAT/BUTTOCK/GLUTEA', 'L02.3'),
(20, 'ABSES  PERUT', 'K65.0'),
(21, 'ABSES PINGGANG KIRI', 'L02.2'),
(22, 'ABSES PIPI ', 'L02.0'),
(23, 'ABSES POST OP/LUKA OPRASI', 'T81.4'),
(24, 'ABSES TORAX', 'J86.9'),
(25, 'ACUT ABDOMEN', 'R10.0'),
(26, 'ACUT LARINGO TRACHEA BRONCITIS', 'J20.9'),
(27, 'ACUT HEFATIC FAILURE', 'K72.0'),
(28, 'ALERGI', 'T78.4'),
(29, 'ALERGI RHINITIS AKIBAT KERJA', 'J30.3'),
(30, 'AMEBIASIS LAINNYA', 'A06.9'),
(31, 'AMENORE', 'N91.0,.1,.'),
(32, 'INFARK MIOKART ACUTE/AMI', '121.9'),
(33, 'ANEMIA/GRAVIO', 'D64.8'),
(34, 'ANEMIA ditentukan', 'D649'),
(35, 'ANEMIA PASKA PENDARAHAN', 'D50.0'),
(36, 'ANOREKSIA', 'R63.0'),
(37, 'ANSIETAS', 'F41.9'),
(38, 'APENDISITIS', 'K37'),
(39, 'APENDISITIS AKUT', 'K35.9'),
(40, 'APENDIK KRONIS', 'K36'),
(41, 'APENDISITIS PERFORASI', 'K35.0'),
(42, 'ATRETIS REMATIK', 'M080'),
(43, 'ATRETIS BELIA', 'M08-M09'),
(44, 'ARTRETIS REMATOID', 'M05-M06'),
(45, 'ARTROPATI DAN ARTRITIS', 'M12-M14'),
(46, 'ASMA AKIBAT KERJA', 'J45'),
(47, 'ASMA BRONCIALE/AB', 'J45.9'),
(48, 'ASFIKSIA', 'R09.0'),
(49, 'ASFIKSIA BERAT', 'P21.0'),
(50, 'ASFIKSIA RINGAN', 'P21.1'),
(51, 'ATRESIA ANI', 'Q.243'),
(52, 'BATU EMPEDU', 'K80.8'),
(53, 'BATU GINJAL', 'N20.0'),
(54, 'BATU URETRA', 'N21.1'),
(55, 'BATUK REJAN/PERTUSIS', 'A37.9'),
(56, 'BENDA ASING PADA TELINGA', 'T16'),
(57, 'BERKELAHI', 'Y04'),
(58, 'BIBIR CELAH DAN LANGIT-LANGIT ', 'Q35-Q37'),
(59, 'BIBIR SUMBING', 'Q36.9'),
(60, 'BLOODY DIARE/ DISENTRI', 'K92.1'),
(61, 'BPH/PROSTAT', 'N10'),
(62, 'BRONCIOLLITIS/AKUT', 'J21.9'),
(63, 'BRONCITIS', 'J40'),
(64, 'BRONCITIS ACUT', 'J20.9'),
(65, 'BRONCITIS KRONIS', 'J42'),
(66, 'BRONKITIS AKUT DAN BRONKIOPLIT', 'J20-J21'),
(67, 'BUTA DAN RABUN', 'H54'),
(68, 'CA GLAND (KELENJAR)', 'C77.9'),
(69, 'CA MAMA', 'C30.9'),
(70, 'CA RAHIM UTERUS', 'C55'),
(71, 'CAMPAK', 'B05'),
(72, 'CARDIOGENIC SYOK', 'R57.0'),
(73, 'CATARAC', 'Q12.0'),
(74, 'CATARAC COMPILATET', 'H26.2'),
(75, 'CATARC MUDA (JUVENIL)/ DARI LA', 'H26.0'),
(76, 'CATARAC SCONDARY', 'H26.4'),
(77, 'CATARAC TRAUMATIK', 'H26.1'),
(78, 'CATARAC TUA(MATURE)', 'H25.2'),
(79, 'CEDERA MATA ORBITA', 'S05'),
(80, 'CEDERA REMUK & TRAUMA AMPUTANS', 'S36.S'),
(81, 'CEPALGIA/ SKIT KEPALA SEBELAH', 'R51'),
(82, 'CERUMEN/TELINGA', 'H61.2'),
(83, 'COLERA', 'A00.9'),
(84, 'COLIC ABDOMEN ', 'R10.4'),
(85, 'COLIC URETER', 'N23'),
(86, 'COLOSTOMI', 'K91.4'),
(87, 'COMA', 'R40.2'),
(88, 'COMBUSTIO GRADE 10-19%', 'T31.1'),
(89, 'COMBUSTIO GRADE 30-39%', 'T31.3'),
(90, 'COMBUSTIO  GRADE 60-69%', 'T31.6'),
(91, 'COMBUSTIO GRDE 70-79%', 'T31.7'),
(92, 'CONJUNGTIVITIS', 'H10.9'),
(93, 'CONTUSIO CEREBRI/CKB', 'S06.2'),
(94, 'CONTUSIO CEREBRI/CKS/CKR', 'S06.0'),
(95, 'CIANOSIS', 'R23.0'),
(96, 'DECOM CORDIS CONGESTIF (CONGES', '1.500'),
(97, 'DEFISIENSI VITAMIN A', 'E50'),
(98, 'DEFISIENSI VITAMIN LAINNYA', 'E51-E56'),
(99, 'DEHIDRASI ', 'E06'),
(100, 'DEMAM ABSES', 'L02.9'),
(101, 'DEMAM BERDARAH DENGUE/DBD', 'A91'),
(102, 'DEMAM TIFOID DAN PARATIFOID', 'A01'),
(103, 'DEMAM TIFUS', 'A75'),
(104, 'DEMAM TIPOID', 'A01.0'),
(105, 'DEMAM VIRUS DAN DEMAM ', 'A93-A94'),
(106, 'DEPRESI', 'F32.9 '),
(107, 'DEPRESI SEDANG', 'F230'),
(108, 'DERMATITIS', 'L30.8'),
(109, 'DESMENOREA', 'N94.6'),
(110, 'DHF/DSS', 'A91'),
(111, 'DIABETES MELITUS BERGANTUNG IN', 'E10'),
(112, 'DM MALNUTRISI', 'E12'),
(113, 'DM TIDAK BERGANTUNG INSULIN', 'E111'),
(114, 'DIARE DAN GASTRO ENTRITIS OLEH', 'A09'),
(115, 'DIARE BAYI BARU LAHIR', 'P78.3'),
(116, 'DIARE YANG ADA HASIL LAB', 'A09'),
(117, 'DIARE YANG TIDAK ADA LAB', 'K52.9'),
(118, 'DICEDRAI', 'X85-Y09'),
(119, 'DIGIGIT ANJIANG', 'W54.0'),
(120, 'DISENTRI AMUBA', 'A06.0'),
(121, 'DISLOKASI ', 'T14.3'),
(122, 'DISPEPSIA', 'K30'),
(123, 'DM', 'E14.9'),
(124, 'DM GANGREN', 'E14.5'),
(125, 'DM NEPROPATI', 'E14.2'),
(126, 'DOWNSYNDROM', 'Q90.9'),
(127, 'EDEMA PUPIL', 'H47.1'),
(128, 'EKLAMSIA', '015.9'),
(129, 'EPILEPSI', 'G40.9'),
(130, 'EPILEPSI EPISODE DEPRISIF,GANG', 'G40-G41'),
(131, 'EPITAXSIS', 'R04.0'),
(132, 'FILARIASIS', 'B74'),
(133, 'FRAKTUR CLAVIKULA', 'S42.0'),
(134, 'FRAKTUR CLAVIKULA CLOSE', 'S42.0.0'),
(135, 'FRAKTUR FEMUR', 'S72.9'),
(136, 'FRAKTUR TULANG ANGGOTA GERAK L', 'S42,S32,S6'),
(137, 'GAGAL GINJAL LAINNYA', 'N17.0-.2,.'),
(138, 'GAGAL JANTUNG', 'I50.0'),
(139, 'GAGAL NAFAS', 'J96.9'),
(140, 'GANGGUAN DAYA DENGAR', 'H90-H91'),
(141, 'GANGGUAN DAYA LIHAT', 'H53'),
(142, 'GANGGUAN ENDROKIN,NUTRISI DAN ', 'E15-35,E58'),
(143, 'GANGGUAN HAID LAINNYA', 'N91.3-.5,N'),
(144, 'GANGGUAN  MENTAL DAN PRILAKU ', 'F15'),
(145, 'GANGGUAN PADA PAYUDARA ', 'N60-N64'),
(146, 'GANGGUAN PERNAPASAN AKIBAT MEN', 'J68'),
(147, 'GANGGUAN KEMIH DAN KELAMIN LAI', 'N82,N84,N9'),
(148, 'GANGGREN', 'R02'),
(149, 'GASTRITIS', 'K29.7'),
(150, 'GASTRITIS AKUT', 'K29.1'),
(151, 'GASTRITIS ALERGI', 'K29.6'),
(152, 'GASTRITIS KRONIK', 'K29.4'),
(153, 'GE', 'A09'),
(154, 'GEJALA PADA JANTUNG ', 'R00-R01'),
(155, 'GGA', 'N17.9'),
(156, 'GGK/GNC', 'N18.9'),
(157, 'HAMIL + HIPERTENSI', 'O16'),
(158, 'HAMIL MUDA', 'O26.9'),
(159, 'HAMIL NORMAL', 'O80.9'),
(160, 'HAMIL + ANEMIA', 'O99.9'),
(161, 'HEMATEMASIS', 'K92.0'),
(162, 'HEMATOMA', 'T14.0'),
(163, 'HEMATURIA', 'R31'),
(164, 'HEMORAGE', 'R58'),
(165, 'HEMOROID', '1849'),
(166, 'HEPATITIS A', 'B15.9'),
(167, 'HEPATITIS A AKUT', 'B15'),
(168, 'HEPATITIS AKUT', 'K72.0'),
(169, 'HEPATITIS B AKUT', 'B16.9'),
(170, 'HEPATITIS C AKUT', 'B17.1'),
(171, 'HEPATITIS VIRUS B', 'B16.9'),
(172, 'HERNIA', 'K46.9'),
(173, 'HERPES ZOSTER', 'B029'),
(174, 'HIPER CHOLESTEROL', 'E78.0'),
(175, 'HIPERTENSI ESENSIAL', 'I10'),
(176, 'HIPERTEROID', 'E05.9'),
(177, 'HORDEOLUM', 'H00.0'),
(178, 'ICTERUS', 'R.17'),
(179, 'INFEKSI GIGI', 'K04.7'),
(180, 'INFEKSI KULIT   JARINGAN  SUBK', 'L00-L08'),
(181, 'INFEKSI LUKA OPERASI', '181.4'),
(182, 'INFEKSI SALURAN NAFAS BGM. ATA', 'J00-J01 10'),
(183, 'INFLUENZA', 'J111'),
(184, 'INFLUENZA DENGAN PNEUMONIA , V', 'J100'),
(185, 'INSOMNIA', 'G47.0'),
(186, 'INSCT BITE', 'T14.06'),
(187, 'ISK', 'N39.0'),
(188, 'ISPA', 'J06.9'),
(189, 'INFARK MIOKART AKUT', '121-122'),
(190, 'JANTUNG REMATUIK', '109.0'),
(191, 'KEJANG ', 'R56.8'),
(192, 'KEJANG DEMAM ', 'R56.0'),
(193, 'KELAINAN SENDI LAINNYA', 'M22-M25'),
(194, 'KEMBUNG', 'R14'),
(195, 'KENA AIR PANAS', 'X11,0'),
(196, 'KENA KAYU ', 'W21'),
(197, 'KENA MINYAK PANAS ', 'X 10'),
(198, 'KENA PAKU', 'W22,0'),
(199, 'KENA PANCING ', 'W20,8'),
(200, 'KENA PISAU AT.PEDANG', 'W26,0'),
(201, 'KERACUNAN AKIBAT PEMAKAIAN ALK', 'X 45'),
(202, 'KESETRUM ', 'W87,0'),
(203, 'KISTA ORBIT ', 'H05,8'),
(204, 'KOLERA ', 'A 00'),
(205, 'KOLERA ', 'A60,9'),
(206, 'KONJUNGTIVITIS AKUT LAINNYA', 'H103'),
(207, 'KONJUNGTIVITIS VIRUS LAINNYA', 'B309'),
(208, 'KONJUNGTIVITIS LAINNYA', 'H109'),
(209, 'BEKAS LUKA KONJUNGTIVA', 'H113'),
(210, 'MAL NUTRISI ', 'E 40- E46'),
(211, 'MELENA BAYI', 'P54.1'),
(212, 'MELENA DEWASA', 'K92.1'),
(213, 'MENINGITIS TBC ', 'A17.0 '),
(214, 'MENSTRUASI ', 'N92.6'),
(215, 'MIGREN ', 'G43.9'),
(216, 'MIYALGIA ', 'M791'),
(217, 'NYERI DADA', 'R07.4'),
(218, 'NYERI PERUT DAN PANGGUL ', 'R 10'),
(219, 'NYERI PUNGGUNG BAWAH ', 'M 54.5'),
(220, 'NONVENEREAN SHYPHILIS (ADA CAI', 'H65'),
(221, 'OBESITAS ', 'E 66'),
(222, 'OSTEOARTRITIS ', 'M19.9'),
(223, 'OTITIS', 'H66.9'),
(224, 'OTITIS MEDIA DAN GAGGUAN MESTO', 'H 65-H75'),
(225, 'PALPITASI ', 'R00.2'),
(226, 'NONVENEREAN SHYPHILIS (ADA CAI', 'A65'),
(227, 'PENDARAHAN ANUS ', 'K65.5'),
(228, 'PENDARAHAN GUSI ', 'K06.8'),
(229, 'PNEMONIA', 'J12.0-j18.'),
(230, 'PENYAKIT BAKTERIA LAINNYA ', '38, A 42-4'),
(231, 'PENYAKIT HATI LAINNYA', 'K 74.0-5,K'),
(232, 'PENYAKIT HATI LAINNYA ', '-3'),
(233, 'PENYAKIT RADANG SUSUSNAN SYARA', 'G 00-G 09'),
(234, 'PENYAKIT SISTEM CERNA LAINNYA ', 'K 82-K 83,'),
(235, 'PENYAKIT SISTEM KEMIH LAINNYA ', 'N 25-N 29,'),
(236, 'PENYAKIT SUSUNAN SARAF LAINNYA', 'G10-G13'),
(237, 'PREEKLAMSIA BERAT', 'O14.1'),
(238, 'PREEKLAMSIA RINGAN', 'O14.9'),
(239, 'RHEMATOID ', 'M069'),
(240, 'SESAK', 'R06.0'),
(241, 'SKIZOFRENIA, GANGGUAN SKIZOFTI', 'F20, F21, '),
(242, 'SNAKE BITE', 'T63.0'),
(243, 'THIPOID FEFER/ABDOMINALIS', 'A01.0'),
(244, 'TB PARU BTA (+) DENGAN/TANPA B', 'A15.0'),
(245, 'TB ALAT NAFAS LAINNYA', 'A16.3-.9'),
(246, 'TB LAINNYA', 'A19'),
(247, 'TB PARU LAINNYA', 'A15.1-A16.'),
(248, 'TB TULANG DAN SENDI', 'A18.0'),
(249, 'TONSILITIS', 'JO39'),
(250, 'Syndrome nephrotic ', 'N019'),
(251, 'PENGELIHATAN KABUR', 'H259');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `kode_dokter` varchar(15) NOT NULL,
  `nama_dokter` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_telpon_d` varchar(12) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_dokter`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kode_dokter`, `nama_dokter`, `alamat`, `no_telpon_d`, `jabatan`) VALUES
('123', 'dr Yusuf', 'Selong', '0370211173', 'Kepala Pkm'),
('235', 'dr Agus Salim', 'Praya', '087865431', 'Dokter Umum');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_obat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `satuan`, `keterangan`) VALUES
('1', 'Air Raksa dental use', '100 gram', ''),
('2', 'Alat Suntik sekali pakai  1 ml', '100 set', ''),
('3', 'Alat Suntik sekali pakai  2.5 ', ' 100 set', ''),
('4', 'Alat Suntik sekali pakai  5 ml', '100 set', ''),
('5', 'Alat suntik sekali pakai 10 ml', 'set', ''),
('6', 'Albendazol tablet 400 mg', '5 strip @ 6tab', ''),
('7', 'Alopurinol tablet  100 mg', '10 blister @ 10', ''),
('8', 'Aminofilina injeksi  24 mg / m', '30 ampul', ''),
('9', 'Aminofilina tablet  200 mg', '100 tablet', ''),
('10', 'Amitriptilina tablet  25 mg', '12 strip @ 10 t', ''),
('11', 'Amoksisilina kapsul 250 mg', '10 strip @ 10 t', ''),
('12', 'Amoksisilina kapsul 500 mg', '100 kaplet', ''),
('13', 'Amoksisilina sirup kering 125 ', '60 ml', ''),
('14', 'Antalgin/metampiron tablet 500', '1000 tablet', ''),
('15', 'Antalgin injeksi 250 mg / ml- ', '30 ampul', ''),
('16', 'Antasida  DOEN tablet', '4 bks @ 250 tab', ''),
('17', 'Antibakteri DOEN salep kombina', '25 tube @ 5 gr', ''),
('18', 'Antifungi DOEN kombinasi', '24 pot @ 30 gr', ''),
('19', 'Antihemaroid  DOEN kombinasi', '10 supp', ''),
('20', 'Antimigrain DOEN kombinasi', '100 tablet', ''),
('21', 'Antiparkinson doen kombinasi', '10 strip @ 10 t', ''),
('22', 'Aqua Pro injeksi steril bebas ', '10 vial  @ 20 m', ''),
('23', 'Aquadest steril', '500 ml', ''),
('24', 'Asam  Askorbat (Vit. C) tablet', '4 bks @ 250 Tab', ''),
('25', 'Asetosal tablet  100 mg', '10 strip @ 10 t', ''),
('26', 'Asetosal tablet  500 mg', '10 strip @ 10 t', ''),
('27', 'Atropin Sulfat injeksi  0,25  ', '30 ampul', ''),
('28', 'Atropin Sulfat tablet 0,5 mg', '500 tablet', ''),
('29', 'Betametason krim  0,1 %', '25 tube @ 5 gr', ''),
('30', 'Catgut / Benang  Bedah No. 2/0', '24 x 70 cm', ''),
('31', 'Catgut / Benang  Bedah No. 3/0', '24 x 70 cm', ''),
('32', 'Deksametason inj. 5 mg /ml-1 m', '100 ampul', ''),
('33', 'Deksametason tablet 0,5 mg', '1000 tablet', ''),
('34', 'Deksrometorfan  HBr. sirup 10 ', '60 ml', ''),
('35', 'Deksrometorfan  HBr. tablet sa', '4 bks @ 250 tab', ''),
('36', 'Dektran 70 larutan infus 6 % s', '500 ml', ''),
('37', 'Diazepam injeksi 5 mg/ ml- 2 m', '30 ampul', ''),
('38', 'Diazepam tablet  2 mg', '4 bks @ 250 tab', ''),
('39', 'Diazepam tablet  5 mg', '250 tablet', ''),
('40', 'Difenhidramina injeksi 10 mg/ ', '30 ampul', ''),
('41', 'Digoksin tablet  0,25 mg', '10 str @ 10 tab', ''),
('42', 'Efedrina  HCl. tablet  25 mg ', '1000 tablet', ''),
('43', 'Ekstrak Belladona tablet  10 m', '4 bks @ 250 tab', ''),
('44', 'Epinefrin injeksi  0,1 % - 1 m', '30 ampul', ''),
('45', 'Etakridina (Rivanol) larutan  ', '300 ml', ''),
('46', 'Etanol  70 %', '1000 ml', ''),
('47', 'Etil Klorida semprot', '100 ml', ''),
('48', 'Euginol cairan', 'dus 12 btl', ''),
('49', 'Fenitoin 30 mg', '250 kapsul', ''),
('50', 'Fenitoin 100 mg', '250 kapsul', ''),
('51', 'Fenobarbital injeksi  50 mg / ', '30 ampul', ''),
('52', 'Fenobarbital tablet 100 mg ', '250 tablet', ''),
('53', 'Fenobarbital tablet 30 mg ', '4 bks @ 250 tab', ''),
('54', 'Fenoksimetil Penisilina tablet', '100 tablet', ''),
('55', 'Fenoksimetil Penisilina tablet', '100 tablet', ''),
('56', 'Fenolgliserol tetes telinga  1', '24 btl @ 5 ml', ''),
('57', 'Fitomenadion (Vit. K) injeksi ', '30 ampul', ''),
('58', 'Fitomenadion (Vit. K) tablet s', '100 tablet', ''),
('59', 'Fluor 0,5 mg', '100 tablet', ''),
('60', 'Furosemida tablet 40 mg', '200 tablet', ''),
('61', 'Gameksan emulsi 1 %', '100 ml', ''),
('62', 'Garam  Oralit untuk  200 ml ai', '100 kantong', ''),
('63', 'Gentian Violet larutan 1 %', '10 ml', ''),
('64', 'Glass Ionomer cement (GC IX)', 'set', ''),
('65', 'Glibenklamida tablet  5 mg', '100 tablet', ''),
('66', 'Gliseril  Guayakolat tablet  1', '4 bks @ 250 tab', ''),
('67', 'Glukosa infus 5 %', '500 ml', ''),
('68', 'Glukosa infus 10 %', '500 ml', ''),
('69', 'Glukosa infus 40 %', '10 amp @ 25 ml', ''),
('70', 'Griseofulvin tablet  125 mg Mi', '100 tablet', ''),
('71', 'Haloperidol tablet  1,5 mg', '10 str @ 10 tab', ''),
('72', 'Haloperidol tablet  5 mg', '10 str @ 10 tab', ''),
('73', 'Hidroklortiazide (HCT) tablet ', '4 bks @ 250 tab', ''),
('74', 'Hidrokortison krim  2,5 %', '24 tube @ 5 gr', ''),
('75', 'Ibuprofen tablet  200 mg', '100 tablet', ''),
('76', 'Ibuprofen tablet  400 mg', '100 tablet', ''),
('77', 'Infusion Set  anak-anak', 'set', ''),
('78', 'Infusion Set  dewasa', 'set', ''),
('79', 'Isosorbid Dinitrat Sub  Lingua', '10 str @ 10 tab', ''),
('80', 'Kalium pemanganat serbuk', '20 btl @ 5 gr', ''),
('81', 'Kalsium Hidroksida pasta', '2 tube', ''),
('82', 'Kalsium Laktat tablet  500 mg', '4 bks @ 250 tab', ''),
('83', 'Kapas Berlemak  500 gram', 'bungkus', ''),
('84', 'Kapas Pembalut / Adsorben  250', 'bungkus', ''),
('85', 'Karbamazepin  200 mg', '10 str @ 10 tab', ''),
('86', 'Kasa Kompres  40 x 40 steril', 'bungkus', ''),
('87', 'Kasa Pembalut 40 yd x 80 cm', 'rol', ''),
('88', 'Kasa Pembalut Hidrofil  4 x 15', 'rol', ''),
('89', 'Kasa Pembalut Hidrofil  4 x 3', 'rol', ''),
('90', 'Kasa pembalut hidrofil 4 x 10 ', 'rol/50', ''),
('91', 'Kloramfenikol kapsul 250 mg', '250 kapsul', ''),
('92', 'Kloramfenikol salep mata  1 %', '24 tube @ 3,5 g', ''),
('93', 'Kloramfenikol tetes telinga  3', '24 btl @ 5 ml', ''),
('94', 'Klorfeniramin Maleat (CTM) tab', '1000 tablet', ''),
('95', 'Klorfenol Kamper Menthol ( CHK', '10 ml', ''),
('96', 'Klorokuin tablet 150 mg', '100 tablet', ''),
('97', 'Klorpromazina injeksi  5 mg / ', '30 ampul', ''),
('98', 'Klorpromazina injeksi  25 mg /', '30 ampul', ''),
('99', 'Klorpromazina tablet  25 mg', '4 bks @ 250 tab', ''),
('100', 'Klorpromazina tablet  100 mg', '100 tablet', ''),
('101', 'Komb. Pirimetamin 25 mg + Sulf', '100 tablet', ''),
('102', 'Kotrimoksazol dewasa tablet ', '100 tablet', ''),
('103', 'Kotrimoksazol pediatrik tablet', '100 tablet', ''),
('104', 'Kotrimoksazol suspensi', '60 ml', ''),
('105', 'Kuinin ( Kina ) tablet  200 mg', '6 str @ 10 tab', ''),
('106', 'Kuinin Dihidroklorida inj. 25 ', '30 ampul', ''),
('107', 'Lidokain Kompositum injeksi', '30 ampul', ''),
('108', 'Magnesium  Sulfat injeksiI (IV', '10 vial', ''),
('109', 'Magnesium  Sulfat injeksiI (IV', '10 vial', ''),
('110', 'Metilergometrin Maleat  tablet', '10 str @ 10 tab', ''),
('111', 'Metilergometrin Maleat injeksi', '30 ampul', ''),
('112', 'Metronidazol tablet  250 mg', '100 tablet', ''),
('113', 'Mummifying pasta', 'botol', ''),
('114', 'Natrium Bikarbonat 500 mg', '4 bks @ 250 tab', ''),
('115', 'Natrium Klorida infus 0,9 %', '500 ml', ''),
('116', 'Nistatin tablet salut  500.000', '10 str @ 10 tab', ''),
('117', 'Nistatin tablet vaginal  100.0', '10 str @ 10 tab', ''),
('118', 'Obat  Batuk Hitam (OBH) cairan', '100 ml', ''),
('119', 'Obat Anti TuberkulosisFDC kate', 'paket', ''),
('120', 'Obat Anti TuberkulosisFDC kate', 'paket', ''),
('121', 'Obat Anti Tuberkulosis FDC kat', 'paket', ''),
('122', 'Obat Anti Tuberkulosis FDC kat', 'paket', ''),
('123', 'Obat Anti Tuberkulosis Kombipa', 'paket', ''),
('124', 'Obat Anti Tuberkulosis Kombipa', 'paket', ''),
('125', 'Oksitetrasiklin HCl. injeksi I', '10 vial', ''),
('126', 'Oksitetrasiklin salep kulit  3', '25 tube @ 5 gr', ''),
('127', 'Oksitetrasiklin salep mata  1 ', '25 tube @ 3,5 g', ''),
('128', 'Oksitosin injeksi 10 IU / ml -', '10 ampul', ''),
('129', 'Paraformaldehida tablet', '100 tablet', ''),
('130', 'Parasetamol sirup 120 mg / 5 m', '60 ml', ''),
('131', 'Parasetamol tablet  100 mg', '100 tablet', ''),
('132', 'Parasetamol tablet  500 mg', '1000 tablet', ''),
('133', 'Pembalut gibs', 'rol', ''),
('134', 'Perfenazin 4 mg', '100 tablet', ''),
('135', 'Piridoksina HCl. tablet  10 mg', '1000 tablet', ''),
('136', 'Plester  5 yard x 2 inchi', 'rol', ''),
('137', 'Polikresulen ', '10 ml', ''),
('138', 'Povidon  Iodida  10 % , 100 ml', '300 ml', ''),
('139', 'Povidon  Iodida 10 % , 30 ml /', '30 ml', ''),
('140', 'Prednison tablet  5 mg', '1000 tablet', ''),
('141', 'Primakuin tablet  15 mg', '4 bks @ 250 tab', ''),
('142', 'Prokain Penisilin inj 3jt IU', 'Kotak@30Vial', ''),
('143', 'Propiltiourasil tablet  100 mg', '100 tablet', ''),
('144', 'Propranolol tablet  40 mg', '100 tablet', ''),
('145', 'Pyrantel Pamoat tablet  365 mg', '30 str @ 2 tab', ''),
('146', 'Reserpina tablet  0,10 mg', '100 tablet', ''),
('147', 'Reserpina tablet  0,25 mg', '4 bks @ 250 tab', ''),
('148', 'Retinol (Vitamin A) kapsul 100', '50 kapsul', ''),
('149', 'Retinol (Vitamin A) kapsul 200', '50 kapsul', ''),
('150', 'Ringer Laktat larutan infus st', '500 ml', ''),
('151', 'Sabu  Polivalen  5 ml (ABU I)', '10 vial', ''),
('152', 'Salbutamol tablet  2 mg', '10 str @ 10 tab', ''),
('153', 'Salep  2-4 Kombinasi', '24 pot @ 30 gr', ''),
('154', 'Salisil Bedak  2 %', '50 gr', ''),
('155', 'Semen  Seng Pospat serbuk dan ', 'set @ 30 gr', ''),
('156', 'Serum Anti Tetanus injeksi 1.5', '10 ampul', ''),
('157', 'Sianokobalamin (Vit. B 12) inj', '100 ampul', ''),
('158', 'Silk (Benang  Bedah Sutra) No.', '12 x 3 x 75 cm', ''),
('159', 'Silver Amalgam', '1 oz', ''),
('160', 'Spon Gelatin Cubicles  1 x 1 x', '24 buah', ''),
('161', 'Sulfadimidin tablet   500 mg', '4 bks @ 250 tab', ''),
('162', 'Sulfasetamida tetes mata  15 %', '24 btl @ 5 ml', ''),
('163', 'Tablet Tambah Darah kombinasi', '100 sase @ 30 t', ''),
('164', 'Temperory Stoping Fletcher ser', 'set @ 100 gr', ''),
('165', 'Tetrasiklina HCl. kapsul  250 ', '4 bks @ 250 tab', ''),
('166', 'Tetrasiklina HCl. kapsul  500 ', '10 str @ 10 tab', ''),
('167', 'Tiamine  HCl. (Vit. B-1) injek', '30 ampul', ''),
('168', 'Tiamine HCl. Mononitrat (Vit. ', '1000 tablet', ''),
('169', 'Triheksifenidil HCl. tablet  2', '10 str @ 10 tab', ''),
('170', 'Vitamin B Komplek tablet', '4 bks @ 250 tab', ''),
('171', 'Acyclovir tab. 200 mg', '100 tablet', ''),
('172', 'Acyclovir krim 5%', 'tube', ''),
('173', 'Alprazolam tab. 0,5 mg', 'kotak@ 100 tab', ''),
('174', 'Ambroxol tablet', '100 tablet', ''),
('175', 'Amlodipin tab. 10 mg', 'kotak @ 30 tab', ''),
('176', 'Ampisilina injeksi', '10 vial', ''),
('177', 'Antacid Suspensi', 'botol', ''),
('178', 'Arsen Septodont Rapid', 'botol', ''),
('179', 'ACT tablet', 'kotak@ 24 table', ''),
('180', 'ACT injeksi', '24 tablet', ''),
('181', 'Arterakine', 'Kotak @ 8 table', ''),
('182', 'Asam Mefenamat tablet 500 mg  ', '100 tablet', ''),
('183', 'Asam Tranexamat Inj. 500mg/5 m', 'Kotak@ 10 ampul', ''),
('184', 'Asam Tranexamat tab. 500mg', 'kotak@ 100 tab', ''),
('185', 'Calsium Glukonas Inj.', '24 ampul', ''),
('186', 'Captopril tablet 12,5 mg', '100 tablet', ''),
('187', 'Captopril tablet 25 mg', '100 tablet', ''),
('188', 'Catgut Chromic Caset 3/0-100 m', 'set', ''),
('189', 'Catgut 1/0 tanpa jarum bedah', 'set', ''),
('190', 'Cavit', 'botol', ''),
('191', 'Cefadroxil 500 mg', '50 kapsul', ''),
('192', 'Cimetidina tablet 200 mg      ', '100 tablet', ''),
('193', 'Cimetidina injeksi            ', 'Kotak@ 5 ampul', ''),
('194', 'Cresophene', 'botol', ''),
('195', 'Cyproploxasin tablet', '100 tablet', ''),
('196', 'Developer', 'Galon', ''),
('197', 'Doxycyklin tablet 100 mg', '100 tablet', ''),
('198', 'Dulcolax 5mg supp', 'kotak@ 6 supp', ''),
('199', 'Dumin rectal', 'kotak@ 5 tube', ''),
('200', 'Eritromisin kap 500 mg', 'kotak 100 table', ''),
('201', 'Eritromisin sirup 200 mg/5ml', 'botol 60 ml', ''),
('202', 'Etambutol HCl 250 mg', '100 tablet', ''),
('203', 'Feeding tube 3,5', 'set', ''),
('204', 'feding tube 5', 'set', ''),
('205', 'Film 30x40 cm green', 'box @ 100 lemba', ''),
('206', 'Film 35x35 cm green', 'box @ 100 lemba', ''),
('207', 'Fixer', 'Galon', ''),
('208', 'Foley cathether No. 16', 'Set', ''),
('209', 'Foley cathether No. 18', 'Set', ''),
('210', 'Foley cathether No. 20', 'Set', ''),
('211', 'Garam oralit new ORS FORMULA', 'Kotak 25 sacc', ''),
('212', 'Gentamycin injeksi', 'kotak @ 5 ampul', ''),
('213', 'Gentamycin salep kulit', '10 tube', ''),
('214', 'IV Cathether No. 18 G', 'Set', ''),
('215', 'IV Cathether No. 20 G', 'Set', ''),
('216', 'IV Cathether No. 22 G', 'Set', ''),
('217', 'IV Cathether No. 24 G', 'Set', ''),
('218', 'Isoniazid ( INH ) 100mg ', 'botol @ 1000 ta', ''),
('219', 'Jarum hecting', 'Set', ''),
('220', 'Kloramfenikol injeksi', '5 vial', ''),
('221', 'Kloramfenikol suspensi 125mg/5', 'botol 60 ml', ''),
('222', 'Kloramfenikol tetes mata 0,5 %', 'Botol @ 5 ml', ''),
('223', 'Lidokain 2% injeksi (tunggal)', 'kotak @ 100 amp', ''),
('224', 'Masker flu burung', 'set', ''),
('225', 'Masker surgical tie on', 'Set', ''),
('226', 'Metformin HCL tablet 500 mg', 'kotak @ 100 tab', ''),
('227', 'Metoclopramide tablet 10 mg', '100 tablet', ''),
('228', 'Metocloperamide inj', 'kotak@ 6 ampul', ''),
('229', 'Metoclopramide sirup 5mg/5 ml', 'botol', ''),
('230', 'Metronidazol inf 500 mg', '', ''),
('231', 'Miconazole krim 2%', 'tube', ''),
('232', 'Misoprotol tab 200 mcg', 'kotak @ 30 tab', ''),
('233', 'Molagit', 'kotak@ 150 tab', ''),
('234', 'Na Diklofenak tablet 25mg', 'kotak@ 100 tab', ''),
('235', 'Combivent nebules', 'kotak @ 20 vial', ''),
('236', 'Nifedipin tablet', '100 tablet', ''),
('237', 'Omeprazole kapsul', 'kotak@ 30 kapsu', ''),
('238', 'Papaverin injeksi', '100 ampul', ''),
('239', 'Papaverin tablet', '1000 tablet', ''),
('240', 'Perhidrol ( Lar H2O2 )', 'botol 800 ml', ''),
('241', 'Piroksikam kapsul 10 mg       ', '100 tablet', ''),
('242', 'Plester sekali pakai', 'kotak 100 strip', ''),
('243', 'Propanolol 10 mg', '100 tablet', ''),
('244', 'Ranitidin tablet 150 mg       ', '100 tablet', ''),
('245', 'Ranitidine injeksi', '30 ampul', ''),
('246', 'Sarung tangan steril no 7', 'pasang', ''),
('247', 'Sarung tangan steril no7,5', 'pasang', ''),
('248', 'Sarung tangan surgical non ste', 'Set', ''),
('249', 'Scalpvein 21', 'Set', ''),
('250', 'Scalpvein 23', 'Set', ''),
('251', 'Scalpvein 25', 'Set', ''),
('252', 'Scopamin plus', 'kotak @ 100 tab', ''),
('253', 'Simvastatin tablet 10mg', 'kotak @ 50 tabl', ''),
('254', 'Scabicid', 'tube @ 50 ml', ''),
('255', 'Softratule', 'kotak @ 2 vial', ''),
('256', 'Stesolid rectal 5mg/2,5ml', 'ktk 5 tube', ''),
('257', 'Streptomycin injeksi', 'vial', ''),
('258', 'Surgical mess 11', 'set', ''),
('259', 'Surgical mess 20', 'set', ''),
('260', 'Thiamfenikol tablet 500 mg', '100 tablet', ''),
('261', 'Tamiflu', 'kotak 10 kapsul', ''),
('262', 'Umbilical cord klem', 'set', ''),
('263', 'Urine bag', 'pcs', ''),
('264', 'Xylomidone injeksi', ' 25 ampul', ''),
('265', 'Zinc tablet 20 mg', '100 tablet', '');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `no_pasien` int(3) NOT NULL AUTO_INCREMENT,
  `nama_pasien` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `status_bantuan` varchar(15) NOT NULL,
  PRIMARY KEY (`no_pasien`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nama_pasien`, `tgl_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `telepon`, `status_bantuan`) VALUES
(1, 'Dewi Wahyuni', '1985-11-20', 'P', 'Wiraswasta', 'Praya', '08765421457', 'jps'),
(2, 'Dewi Nawangsih', '1981-02-06', 'L', 'Perdagangan', 'Mantang', '0862131234', 'jps'),
(3, 'Jumaah', '1971-12-31', 'L', 'Pertanian', 'Mantang', '', 'jps'),
(4, 'Hana', '1996-04-06', 'P', 'Mahasiswa', 'Praya', '08764234234', 'jps'),
(5, 'Muhlan', '1974-12-31', 'L', 'Pertanian', 'Mantang', '', 'jps'),
(6, 'Nazri', '1945-01-01', 'L', 'Transportasi', 'Praya', '08623123123', 'jps'),
(7, 'Ara Hilmatulata', '1998-11-22', 'P', '', 'Praya', '', ''),
(8, 'Masadah', '2000-11-22', 'P', '', 'Praya', '', ''),
(9, 'M Rian', '1990-11-22', 'L', '', 'Praya', '', ''),
(10, 'Diah', '1990-11-22', 'P', '', 'Praya', '', ''),
(11, 'Husen', '1990-11-22', 'L', '', 'Praya', '', ''),
(12, 'Rus', '1990-11-22', 'L', '', 'Praya', '', ''),
(13, 'Zaenal', '1990-11-22', 'L', '', 'Praya', '', ''),
(14, 'Yayuk', '1990-11-22', 'P', '', 'Praya', '', ''),
(15, 'Febriana Saputri', '1990-11-22', 'P', '', 'Praya', '', ''),
(16, 'Intan', '1990-11-22', 'P', '', 'Praya', '', ''),
(17, 'Sahli', '1990-11-22', 'L', '', 'Praya', '', ''),
(18, 'Hendrawan', '1990-11-22', 'L', '', 'Praya', '', ''),
(19, 'Sahwan', '1990-11-22', 'L', '', 'Praya', '', ''),
(20, 'Dedi', '1990-11-22', 'L', '', 'Praya', '', ''),
(21, 'Titin Anggraeni', '1990-11-22', 'P', '', 'Praya', '', ''),
(22, 'Fauziah', '1990-11-22', 'P', '', 'Praya', '', ''),
(23, 'Muharrar', '1990-11-22', 'L', '', 'Praya', '', ''),
(24, 'Amiruddin Sahdam', '1990-11-22', 'L', '', 'Praya', '', ''),
(25, 'Hurni', '1990-11-22', 'P', '', 'Praya', '', ''),
(26, 'Yusimah', '1990-11-22', 'P', '', 'Praya', '', ''),
(27, 'Alawiyatun', '1990-11-22', 'P', '', 'Praya', '', ''),
(28, 'Alfatahillah', '1990-11-22', 'L', '', 'Praya', '', ''),
(29, 'Ayudia', '1990-11-22', 'P', '', 'Praya', '', ''),
(30, 'Roni', '1990-11-22', 'L', '', 'Praya', '', ''),
(31, 'L Ahyar Rosidi', '1990-11-22', 'L', '', 'Praya', '', ''),
(32, 'M Haris Hidayatullah', '1990-11-22', 'L', '', 'Praya', '', ''),
(33, 'Rosid Pratama', '1990-11-22', 'L', '', 'Praya', '', ''),
(34, 'Hapniati', '1990-11-22', 'P', '', 'Praya', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(1) NOT NULL AUTO_INCREMENT,
  `judul_profil` varchar(50) NOT NULL,
  `isi_profil` text NOT NULL,
  `gambar` varchar(40) NOT NULL,
  `kepala_pkm` varchar(30) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `judul_profil`, `isi_profil`, `gambar`, `kepala_pkm`) VALUES
(1, '', 'isi profil', '', 'dr Muhammad, S.KM');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_jalan`
--

CREATE TABLE IF NOT EXISTS `rawat_jalan` (
  `id_rawat_jalan` int(3) NOT NULL AUTO_INCREMENT,
  `tanggal_rj` date NOT NULL,
  `no_anamnesis` varchar(4) NOT NULL,
  `diagnosa` varchar(15) NOT NULL,
  `terapi` varchar(15) NOT NULL,
  `jumlah_rj` int(3) NOT NULL,
  `kode_tindakan` varchar(4) NOT NULL,
  `kode_dokter` varchar(5) NOT NULL,
  `no_resep` varchar(4) NOT NULL,
  PRIMARY KEY (`id_rawat_jalan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rawat_jalan`
--

INSERT INTO `rawat_jalan` (`id_rawat_jalan`, `tanggal_rj`, `no_anamnesis`, `diagnosa`, `terapi`, `jumlah_rj`, `kode_tindakan`, `kode_dokter`, `no_resep`) VALUES
(1, '2015-10-18', '1111', 'kangker', 'dasd2', 0, '0', '123', 'asda'),
(2, '2015-10-18', '3423', 'tumor ganas', 'dasd2', 0, '0', '235', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE IF NOT EXISTS `resep` (
  `no_resep` int(4) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `jumlah_item` int(3) NOT NULL,
  `dosis` varchar(15) NOT NULL,
  PRIMARY KEY (`no_resep`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`no_resep`, `tanggal`, `kode_obat`, `jumlah_item`, `dosis`) VALUES
(1, '2015-10-19', '452p', 2, '2 x 1');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `kode_tindakan` varchar(5) NOT NULL,
  `nama_tindakan` varchar(25) NOT NULL,
  `tgl_tindakan` date NOT NULL,
  `biaya_tindakan` int(8) NOT NULL,
  PRIMARY KEY (`kode_tindakan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `nama_lengkap`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin'),
('kapus', '11f4475cfbb3d0ecab95029d42eb3024', 'Kepala Puskesmas', 'kepala');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
