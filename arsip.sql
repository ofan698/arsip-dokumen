-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 12:32 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

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
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dok_pribadi`
--

CREATE TABLE IF NOT EXISTS `dok_pribadi` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE IF NOT EXISTS `mst_user` (
`id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id`, `nama`, `username`, `password`, `image`, `role_id`, `date_created`, `is_active`) VALUES
(9, 'Admins', 'admin', '$2y$10$uhx1qHfUw1s.RlhrSqfgku51cLjRZUL56ogKPKyhcFIhhcBYlSYMm', 'avatar04.png', 1, '2019-08-06', 1),
(15, 'User', 'user', '$2y$10$Nku6Q8QLo5ylTTt9Y/yexe5olpEmJre5Tec1Sc53V6woKKH7YdWne', 'avatar4.png', 2, '2019-10-12', 1),
(16, 'user2', 'ucup', '$2y$10$F6Td...z1Vr/l13jOQ1hlur7snQ4DCXM.yCsIasFXCelfZTsUC1Fa', 'default.jpg', 2, '2020-08-28', 1),
(17, 'Dummy', 'dummy', '$2y$10$REBoojsQM70QylGVmo2N6.bPK6bXUa66srYPrdRxhp69eRc3bRz8O', 'default.jpg', 2, '2023-08-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `standar1`
--

CREATE TABLE IF NOT EXISTS `standar1` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `standar1`
--

INSERT INTO `standar1` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 16, 'ucup', '2020-08-29', '0000-00-00', '10:00:54', '00:00:00', '1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar2`
--

CREATE TABLE IF NOT EXISTS `standar2` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `standar2`
--

INSERT INTO `standar2` (`id`, `id_user`, `nama_file`, `date_upload`, `date_edit`, `jam_upload`, `jam_edit`, `file_upload`) VALUES
(1, 16, 's2', '2020-08-29', '0000-00-00', '16:05:35', '00:00:00', '1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `standar3`
--

CREATE TABLE IF NOT EXISTS `standar3` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `standar4`
--

CREATE TABLE IF NOT EXISTS `standar4` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `standar5`
--

CREATE TABLE IF NOT EXISTS `standar5` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `standar6`
--

CREATE TABLE IF NOT EXISTS `standar6` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `standar7`
--

CREATE TABLE IF NOT EXISTS `standar7` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `standar8`
--

CREATE TABLE IF NOT EXISTS `standar8` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `standar9`
--

CREATE TABLE IF NOT EXISTS `standar9` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_file` text NOT NULL,
  `date_upload` date NOT NULL,
  `date_edit` date NOT NULL,
  `jam_upload` time NOT NULL,
  `jam_edit` time NOT NULL,
  `file_upload` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dok_kerja`
--
ALTER TABLE `dok_kerja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dok_pribadi`
--
ALTER TABLE `dok_pribadi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar1`
--
ALTER TABLE `standar1`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar2`
--
ALTER TABLE `standar2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar3`
--
ALTER TABLE `standar3`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar4`
--
ALTER TABLE `standar4`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar5`
--
ALTER TABLE `standar5`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar6`
--
ALTER TABLE `standar6`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar7`
--
ALTER TABLE `standar7`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar8`
--
ALTER TABLE `standar8`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar9`
--
ALTER TABLE `standar9`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dok_kerja`
--
ALTER TABLE `dok_kerja`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dok_pribadi`
--
ALTER TABLE `dok_pribadi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `standar1`
--
ALTER TABLE `standar1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `standar2`
--
ALTER TABLE `standar2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `standar3`
--
ALTER TABLE `standar3`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `standar4`
--
ALTER TABLE `standar4`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `standar5`
--
ALTER TABLE `standar5`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `standar6`
--
ALTER TABLE `standar6`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `standar7`
--
ALTER TABLE `standar7`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `standar8`
--
ALTER TABLE `standar8`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `standar9`
--
ALTER TABLE `standar9`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
