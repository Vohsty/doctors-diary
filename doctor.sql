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

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `firstName`, `lastName`, `email`, `phone_no`, `password`) VALUES
(1, 'steve', 'Bor', 'stevebor@moringa.com', 0700000000,'12');

-- ---------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
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
  `nationalId` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` int(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ACTIVE PATIENT',
  `password` varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------------

-- 
-- Table structure for table `appointment`
-- 

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `doctors_id` varchar(20) NOT NULL DEFAULT '1',
  `app_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` text NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'INACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `treatment`
-- 

CREATE TABLE `treatment` (
  `id` int(100) NOT NULL,
  `treatmentType` varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `treatmentType`)VALUES
(1, 'Chemotherapy'),
(2, 'Radiotherapy'),
(3, 'Immunotherapy'),
(4, 'Hormone Based Chemotherapy'),
(5, 'Steroids'),
(6, 'Bone Marrow Stimulant');
-- -------------------------------------------------

-- 
-- Table structure for table `cancer`
-- 

CREATE TABLE `cancer` (
  `id` int(100) NOT NULL,
  `cancerType` varchar(255) NOT NUL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `cancer` (`id`, `cancerType`)VALUES
(1, 'Breast Cancer'),
(2, 'Prostrate Cancer'),
(3, 'Throat Cancer'),
(4, 'Lymphoma');

-- -----------------------------------------------

--
-- Indexes for tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancer`
--
ALTER TABLE `cancer`
  ADD PRIMARY KEY (`id`);