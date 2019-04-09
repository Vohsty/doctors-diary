-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 10:11 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` int(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `firstName`, `lastName`, `email`, `phone_no`, `password`) VALUES
(1, 'steve', 'Bor', 'stevebor@moringa.com', 0700000000,'12');

-- ---------------------------------------------------------

--
-- Table structure for table `Nurse`
--

CREATE TABLE `nurse` (
  `id` int(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` int(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -----------------------------------------------------

-- 
-- Table structure for table `patient`
-- 

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` int(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `disease` text NOT NULL,
  `medicine` text NOT NULL,
  `password` varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------------

-- 
-- Table structure for table `message`
-- 
