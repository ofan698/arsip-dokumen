-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 05:25 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `dok_kerja`
--

CREATE TABLE IF NOT EXISTS `dok_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dok_kerja`
--

INSERT INTO `dok_kerja` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Dok Kerja', '2020-08-29', '0000-00-00', '19:51:25', '00:00:00', 'mailmerge.docx'),
(3, 18, 'Dok.Kerja', '2021-02-10', '0000-00-00', '00:52:51', '00:00:00', 'surat.docx'),
(4, 18, 'Pdf', '2021-02-10', '0000-00-00', '00:53:01', '00:00:00', 'surat1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `dok_pribadi`
--

CREATE TABLE IF NOT EXISTS `dok_pribadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dok_pribadi`
--

INSERT INTO `dok_pribadi` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Dok Pribadi', '2020-08-29', '0000-00-00', '19:51:38', '00:00:00', 'mailmerge.docx'),
(2, 17, 'tes', '2020-09-02', '0000-00-00', '09:44:21', '00:00:00', 'standar2.txt'),
(3, 17, 'sad', '2020-09-04', '0000-00-00', '15:13:06', '00:00:00', 'surat.docx'),
(5, 18, 'Readme', '2021-02-10', '0000-00-00', '00:53:18', '00:00:00', 'surat1.docx'),
(6, 18, 'Files Pict', '2021-02-10', '0000-00-00', '00:53:31', '00:00:00', 'surat2.docx');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `nama`, `username`, `password`, `image`, `role_id`, `date_created`, `is_active`) VALUES
(9, 'Admin', 'admin', '$2y$10$uhx1qHfUw1s.RlhrSqfgku51cLjRZUL56ogKPKyhcFIhhcBYlSYMm', 'admin-settings-male.png', 1, '2019-08-06', 1),
(18, 'User', 'user', '$2y$10$kSG.iT/8TeNkYmbdPZ9QFeQrteUEcND.OCTwY6Bf0LwrEdFlXa0m.', '!tamu.jpg', 2, '2020-09-01', 1),
(21, 'Administrator', 'admin2', '$2y$10$KJvt3RHeUNCNzwtPYfrV4eRRn6/n1VAEvqBaVXTF3JuM9yCoGCs/2', 'unnamed.jpg', 1, '2021-02-10', 1),
(22, 'Pengguna', 'user2', '$2y$10$bbtNHI1ExiGyPusYdyVAouOS.hMorP.pDmJAHFWRgz4DUCRkHHULm', '!avatar.jpg', 2, '2021-02-10', 1),
(23, 'user3', 'user3', '$2y$10$KP3HplulSH.9tGzsPwGRL.sk3f0tumZTydqL7f.D.TjBlkfwxAvEe', 'default.jpg', 2, '2021-02-10', 0),
(24, 'Lorem Ipsum', 'lorem', '$2y$10$cSNZR71o7kGIQKfLlXpny.KFiz2STIiJzbWFHkXKJ61H9RSYH7a.K', 'default.jpg', 2, '2021-02-10', 0),
(25, 'Muhammad ZamZami', 'zamzami', '$2y$10$y7AMyVYVMVioPqkLXHuIm.55djyDNWnbTs94I2qc5Ii9is4YKawPC', 'default.jpg', 2, '2021-02-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `standar1`
--

CREATE TABLE IF NOT EXISTS `standar1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `standar1`
--

INSERT INTO `standar1` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 16, 'ucup', '2020-08-29', '0000-00-00', '10:00:54', '00:00:00', '1.docx'),
(2, 17, 'Standar 1.9', '2020-08-29', '2020-09-02', '19:49:46', '22:58:31', 'mailing.xlsx'),
(3, 17, 'dummy', '2020-09-02', '0000-00-00', '09:42:08', '00:00:00', 'xDB_mail.xlsx'),
(4, 18, 'doc 1', '2020-09-03', '2020-11-20', '15:58:20', '16:24:15', 'surat.docx'),
(5, 20, 'Standar1.1', '2021-02-09', '2021-02-09', '15:31:31', '15:32:17', 'Turnitin_Ofan.pdf'),
(6, 18, 'Standar 1', '2021-02-10', '0000-00-00', '00:46:52', '00:00:00', 'Files.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar2`
--

CREATE TABLE IF NOT EXISTS `standar2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `standar2`
--

INSERT INTO `standar2` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 16, 's2', '2020-08-29', '0000-00-00', '16:05:35', '00:00:00', '1.docx'),
(2, 17, 'Standars 2.', '2020-08-29', '2020-09-02', '19:49:58', '22:56:39', 'mailing.xlsx'),
(3, 18, 'Dokumen 2', '2020-09-04', '2021-02-10', '15:23:43', '00:47:46', 'mailing_-_Copy.xlsx'),
(4, 18, 'Standar 2', '2021-02-10', '0000-00-00', '00:48:01', '00:00:00', 'Files.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar3`
--

CREATE TABLE IF NOT EXISTS `standar3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `standar3`
--

INSERT INTO `standar3` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Standar 3', '2020-08-29', '0000-00-00', '19:50:09', '00:00:00', 'mailing.xlsx'),
(2, 18, 'Standar 3', '2020-09-04', '0000-00-00', '15:26:08', '00:00:00', 'surat.docx'),
(3, 18, 'Dokumen 3', '2021-02-10', '0000-00-00', '00:48:39', '00:00:00', 'Files.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar4`
--

CREATE TABLE IF NOT EXISTS `standar4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `standar4`
--

INSERT INTO `standar4` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Standar 4', '2020-08-29', '0000-00-00', '19:50:22', '00:00:00', 'mailing.xlsx'),
(2, 18, 'Standar 4', '2020-09-04', '0000-00-00', '15:27:51', '00:00:00', 'surat.docx'),
(3, 18, 'Dokumen 4', '2021-02-10', '0000-00-00', '00:49:08', '00:00:00', 'Files.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar5`
--

CREATE TABLE IF NOT EXISTS `standar5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `standar5`
--

INSERT INTO `standar5` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Standar 5', '2020-08-29', '0000-00-00', '19:50:31', '00:00:00', 'mailing.xlsx'),
(3, 18, 'Standar 5', '2021-02-10', '0000-00-00', '00:49:33', '00:00:00', 'Files.docx'),
(4, 18, 'Dokoment 5', '2021-02-10', '0000-00-00', '00:50:14', '00:00:00', 'Files1.docx'),
(5, 25, 'Standar 5', '2021-02-11', '0000-00-00', '09:28:11', '00:00:00', 'surat.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar6`
--

CREATE TABLE IF NOT EXISTS `standar6` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `standar6`
--

INSERT INTO `standar6` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Standar 6', '2020-08-29', '0000-00-00', '19:50:41', '00:00:00', 'mailing.xlsx'),
(2, 18, 'Standar 6', '2020-09-04', '2021-02-10', '15:30:25', '00:50:37', 'surat.docx'),
(3, 18, 'Dokument 6', '2021-02-10', '0000-00-00', '00:50:44', '00:00:00', 'Files.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar7`
--

CREATE TABLE IF NOT EXISTS `standar7` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `standar7`
--

INSERT INTO `standar7` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Standar 7', '2020-08-29', '0000-00-00', '19:50:53', '00:00:00', 'mailing.xlsx'),
(2, 18, 'Dokuemnt 7', '2020-09-04', '2021-02-10', '15:31:14', '00:51:26', 'surat.docx'),
(3, 18, 'Standar 7', '2021-02-10', '0000-00-00', '00:51:03', '00:00:00', 'Files.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar8`
--

CREATE TABLE IF NOT EXISTS `standar8` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `standar8`
--

INSERT INTO `standar8` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Standar 8', '2020-08-29', '0000-00-00', '19:51:05', '00:00:00', 'mailing.xlsx'),
(2, 18, 'Dokument 8', '2020-09-04', '2021-02-10', '15:31:32', '00:51:53', 'surat.docx'),
(3, 18, 'Standar 8', '2021-02-10', '0000-00-00', '00:51:39', '00:00:00', 'Files.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar9`
--

CREATE TABLE IF NOT EXISTS `standar9` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `standar9`
--

INSERT INTO `standar9` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 17, 'Standar 9', '2020-08-29', '0000-00-00', '19:51:15', '00:00:00', 'mailing.xlsx'),
(2, 18, 'Dokumen t 9', '2020-09-04', '2021-02-10', '15:32:43', '00:52:17', 'surat.docx'),
(3, 18, 'Standar 9', '2021-02-10', '0000-00-00', '00:52:06', '00:00:00', 'surat1.docx');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
