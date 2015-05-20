-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2015 at 11:52 AM
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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `universiteti` varchar(200) NOT NULL,
  `dega` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pas` VARCHAR(40) NOT NULL ,
  `cel` varchar(15) NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `cv` varchar(40) NOT NULL,
  `tema_diplomes` varchar(200) NOT NULL,
  `pershkrimi_temes` varchar(1500) NOT NULL,
  `data_fillimit` date NOT NULL,
  `data_mbarimit` date NOT NULL,
  `gjinia` tinyint(1) NOT NULL,
  PRIMARY KEY (`stud_id`,`emri`,`mbiemri`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `emri`, `mbiemri`, `universiteti`, `dega`, `email`, `cel`, `adresa`, `cv`, `tema_diplomes`, `pershkrimi_temes`, `data_fillimit`, `data_mbarimit`, `gjinia`) VALUES
(1, 'Medin', 'Piranej', 'Luigj Guraguqi', 'Informatike', 'mpiranej@gmail.com', '0674654868', 'mushan,dajc,shkoder,Shqiperi', 'nje _cv', 'tema diplomes', 'pershkrimi i temes', '2012-09-11', '2015-09-23', 1);

INSERT INTO `student` (`stud_id`, `emri`, `mbiemri`, `universiteti`, `dega`, `email`, `pas`, `cel`, `adresa`, `cv`, `tema_diplomes`, `pershkrimi_temes`, `data_fillimit`, `data_mbarimit`, `gjinia`)
 VALUES (NULL, 'Medina', 'Cura', 'Luigj Gurakuqi', 'Informatike', 'emailimedins@live.com', 'se_di', '-', '-', '-', '-', '-', '2015-03-09', '2015-03-11', '0'),
        (NULL, 'Bamirs', 'Bajraktari', 'Luigj Gurakuqi', 'Informatik', 'emailibamirsit@live.com', 'se_di', '-', '-', '-', '-', '-', '2015-03-07', '2015-03-26', '1');
        (NULL, 'Bamirs', 'Bajraktari', 'Luigj Gurakuqi', 'Informatik', 'emailibamirsit@live.com', 'se_di', '-', '-', '-', '-', '-', '2015-03-07', '2015-03-26', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
