-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2015 at 12:13 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unishk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_emri` varchar(50) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_pozicioni` varchar(150) NOT NULL,
  `a_cel` varchar(15) NOT NULL,
  `a_pas` varchar(50) NOT NULL,
  `a_gjinia` tinyint(1) NOT NULL,
  `a_foto` varchar(100) NOT NULL,
  `a_adr` varchar(150) NOT NULL,
  `a_ws` varchar(50) NOT NULL,
  PRIMARY KEY (`a_id`),
  UNIQUE KEY `a_email` (`a_email`),
  KEY `a_emri` (`a_emri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_emri`, `mbiemri`, `a_email`, `a_pozicioni`, `a_cel`, `a_pas`, `a_gjinia`, `a_foto`, `a_adr`, `a_ws`) VALUES
(1, 'Medin', 'Piranej', 'mpiranej@gmail.com', 'Administrator', '0674654868', 'paskot', 1, 'img/def_profile_pic.jpg', 'mushan,dajç,shkoder,shqiperi', 'medin-piranej.tk');

-- --------------------------------------------------------

--
-- Table structure for table `dege`
--

CREATE TABLE IF NOT EXISTS `dege` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_emri` varchar(150) NOT NULL,
  `d_email` varchar(50) NOT NULL,
  `d_adr` varchar(150) NOT NULL,
  `d_cel` varchar(15) NOT NULL,
  `d_dekan` varchar(50) NOT NULL,
  `d_ws` varchar(50) NOT NULL,
  `d_admin` int(11) NOT NULL,
  `d_fakultet` int(11) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dege`
--

INSERT INTO `dege` (`d_id`, `d_emri`, `d_email`, `d_adr`, `d_cel`, `d_dekan`, `d_ws`, `d_admin`, `d_fakultet`) VALUES
(1, 'Informatike', 'informatike@gmail.com', 'te truma , shkoder shqiperi', '0000000000000', 'duhet me edit :/', 'informatikashkoder', 1, 1),
(2, 'Juridik', 'juridik@gmail.com', 'te truma , shkoder shqiperi', '00000000000', '', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `fakultet`
--

CREATE TABLE IF NOT EXISTS `fakultet` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_emri` varchar(150) NOT NULL,
  `f_email` varchar(50) NOT NULL,
  `f_cel` varchar(15) NOT NULL,
  `f_adr` varchar(150) NOT NULL,
  `f_ws` varchar(50) NOT NULL,
  `f_admin` int(11) NOT NULL,
  `f_dekan` varchar(50) NOT NULL,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fakultet`
--

INSERT INTO `fakultet` (`f_id`, `f_emri`, `f_email`, `f_cel`, `f_adr`, `f_ws`, `f_admin`, `f_dekan`) VALUES
(1, 'Fakulteti i Shkencave Natyrore', 'fshn@gmail.com', '0000000000', 'te truma , shkoder shqiperi', 'fshn.gov.al', 1, 'Ademi'),
(2, 'Fakulteti i drejtesise', 'fak_drejtesise@gmail.com', '00000000000', 'te truma , shkoder shqiperi', '', 1, 'Gasperi');

-- --------------------------------------------------------

--
-- Table structure for table `privatesia`
--

CREATE TABLE IF NOT EXISTS `privatesia` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_aktiv` tinyint(1) NOT NULL,
  `p_email` tinyint(1) NOT NULL,
  `p_cel` tinyint(1) NOT NULL,
  `p_tema` tinyint(1) NOT NULL,
  `p_cv` tinyint(1) NOT NULL,
  `p_foto` tinyint(1) NOT NULL,
  `p_ws` tinyint(1) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_emri` varchar(20) NOT NULL,
  `s_mbiemri` varchar(20) NOT NULL,
  `s_foto` varchar(100) NOT NULL,
  `s_dega` int(11) NOT NULL,
  `s_email` varchar(40) NOT NULL,
  `s_pas` varchar(40) NOT NULL,
  `s_cel` varchar(15) NOT NULL,
  `s_adr` varchar(100) NOT NULL,
  `s_cv` varchar(100) NOT NULL,
  `s_tema` int(11) NOT NULL,
  `s_viti` tinyint(4) NOT NULL DEFAULT '1',
  `s_data_fillimit` date NOT NULL,
  `s_data_mbarimit` date NOT NULL,
  `s_gjinia` tinyint(1) NOT NULL,
  `s_ditelindja` date NOT NULL,
  `s_privatesi` int(11) NOT NULL,
  PRIMARY KEY (`stud_id`),
  UNIQUE KEY `s_email` (`s_email`),
  KEY `s_emri` (`s_emri`),
  KEY `s_mbiemri` (`s_mbiemri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `s_emri`, `s_mbiemri`, `s_foto`, `s_dega`, `s_email`, `s_pas`, `s_cel`, `s_adr`, `s_cv`, `s_tema`, `s_viti`, `s_data_fillimit`, `s_data_mbarimit`, `s_gjinia`, `s_ditelindja`, `s_privatesi`) VALUES
(1, 'Medin', 'Piranej', 'perd1/foto/export.jpg', 1, 'mpiranej@gmail.com', 'paskot', '0674654868', 'mushan,dajc,shkoder,Shqiperi', 'cv.pdf', 1, 0, '2012-09-11', '2015-09-23', 1, '1994-02-07', 1),
(2, 'Bamirs', 'Bajraktari', 'img/def_profile_pic.jpg', 1, 'bamirsi@gmail.com', 'paskot', '-', 'shkoder,Shqiperi', 'cv dir', 2, 0, '2012-09-11', '2015-09-23', 1, '1994-01-01', 2),
(3, 'Medina', 'Cura', 'img/def_profile_pic.jpg', 1, 'emailimedins@live.com', 'paskot', '-', '-', 'cv_dir', 0, 0, '2015-03-09', '2015-03-11', 0, '1994-12-31', 3),
(4, 'Isuf', 'Peka', 'img/def_profile_pic.jpg', 1, 'isa123@live.com', 'paskot', '000000000', 'Krume , Has , Shqiperi', '-', 2, 3, '2013-08-13', '2015-03-10', 1, '1991-03-20', 3),
(5, 'Mikel', 'Ara', 'img/def_profile_pic.jpg', 1, 'mara@gmail.com', 'paskot', '0000000000', 'Berdice , Shkoder ,Shqiperi', '-', 0, 3, '2015-03-08', '2015-03-04', 1, '1994-06-24', 0),
(6, 'Bledar', 'Haxhia', 'img/def_profile_pic.jpg', 1, 'bledi@gmail.com', 'paskot', '00000000000', 'Rrile , Lezhe , Shqiperi', '-', 0, 1, '2012-03-02', '2015-03-03', 1, '1993-03-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_admin`
--

CREATE TABLE IF NOT EXISTS `student_admin` (
  `s_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_a_admin` int(11) NOT NULL,
  `s_a_student` int(11) NOT NULL,
  PRIMARY KEY (`s_a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student_admin`
--

INSERT INTO `student_admin` (`s_a_id`, `s_a_admin`, `s_a_student`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tema_diplome`
--

CREATE TABLE IF NOT EXISTS `tema_diplome` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_tema` varchar(150) NOT NULL,
  `t_pershkrimi` varchar(1000) NOT NULL,
  `t_objektivat` varchar(500) NOT NULL,
  `t_dir` varchar(100) NOT NULL,
  `t_data` date NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tema_diplome`
--

INSERT INTO `tema_diplome` (`t_id`, `t_tema`, `t_pershkrimi`, `t_objektivat`, `t_dir`, `t_data`) VALUES
(1, 'teme diplome shembull', 'Pershkrimi i temes se diplomes shembull\r\nkjo teme diplome ka ketko objektiva\r\n1: sa me mush vendin\r\n2: prep me mush vendin', 'kjo teme diplome ka ketko objektiva\r\n1: sa me mush vendin\r\n2: prep me mush vendin', 'direktoria e temes', '2015-03-21'),
(2, 'teme diplome shembull tjeter', 'Pershkrimi i temes se diplomes shembull tjeter\r\nkjo teme diplome ka ketko objektiva\r\n1: sa me mush vendin\r\n2: prep me mush vendin', 'kjo teme diplome ka ketko objektiva\r\n1: sa me mush vendin\r\n2: prep me mush vendin', 'dir', '2015-03-21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
