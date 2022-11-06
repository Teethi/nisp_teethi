-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 06:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'iicspit2019-20', '189b2ec0006090d261829886d1ddace8', '2019-12-02 05:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `committee_member`
--

CREATE TABLE `committee_member` (
  `c_id` int(11) NOT NULL,
  `c_type` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_designation` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_phone` int(20) DEFAULT NULL,
  `c_photo` varchar(255) NOT NULL,
  `c_cv` varchar(255) NOT NULL,
  `c_branch` varchar(255) DEFAULT NULL,
  `c_year` varchar(255) DEFAULT NULL,
  `c_experience` int(255) DEFAULT NULL,
  `c_qualification` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee_member`
--

INSERT INTO `committee_member` (`c_id`, `c_type`, `c_name`, `c_designation`, `c_email`, `c_phone`, `c_photo`, `c_cv`, `c_branch`, `c_year`, `c_experience`, `c_qualification`) VALUES
(1, '', '', '', '', NULL, '', '', NULL, NULL, NULL, NULL),
(5, 'Student', 'Sai Nimkar', 'ksdnhkn', 'ksndksna', 152693, '', 'AndroidM4T6End_Songs.pdf', 'IT', 'SNINO', 1, 'KNFMIKS'),
(6, 'Faculty', 'jbd', 'sifncisbk', 'snimzskcmzl', 2147483647, '', 'Lecture-7 Constructor overloading object as parameter this final.pdf', 'IT', '2ND', 12, 'MTecgh');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` int(11) NOT NULL,
  `e_nm` varchar(255) NOT NULL,
  `e_rfdt` date NOT NULL,
  `e_rtdt` date NOT NULL,
  `e_fdt` date NOT NULL,
  `e_tdt` date NOT NULL,
  `e_desc1` text NOT NULL,
  `e_desc2` text,
  `e_desc3` text,
  `e_img1` varchar(255) NOT NULL,
  `e_img2` varchar(255) DEFAULT NULL,
  `e_img3` varchar(255) DEFAULT NULL,
  `e_img4` varchar(255) DEFAULT NULL,
  `e_img5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `e_nm`, `e_rfdt`, `e_rtdt`, `e_fdt`, `e_tdt`, `e_desc1`, `e_desc2`, `e_desc3`, `e_img1`, `e_img2`, `e_img3`, `e_img4`, `e_img5`) VALUES
(1, 'Beginners Guide To Data Science', '2017-10-05', '2017-10-08', '2017-10-10', '2017-10-10', 'It\'s takes not just inherent talent but also a meticulously developed skill set. Here\'s your opportunity to checkout the world of intelligent machines, learn how you can build one yourself and get a glimpse of what the future would look like', 'IIC IEEE SPIT STUDENTS CHAPTER\r\n\r\nPresents a talk on \"Beginners Guide To Data Science\"', 'Talk will be rendered by BHAVIK GANDHI - Director, Analytics at Shaadi.com Also worked as Associate Vice President, Services and Analytics at Pepperfry, Software Development Engineer at Microsoft and Amazon.', 'service1.jpg', '1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg'),
(2, 'Neuro Imaging Workshop', '2017-08-01', '2017-08-03', '2017-08-04', '2017-08-06', 'IEEE Bombay section in association with SB IEEE SPIT presents to you, 3 day workshop on NEURO-IMAGING IN R', 'Major organizations such as Google and Microsoft are using R as a programming language and a statistical tool. With its contribution in Data Analytics, it has gained a booming popularity.', 'We at SPIT- stand by the aim to train and prepare the students to their best of abilities. We are organizing a three-day hands on workshop on R programming.\r\n\r\nTrainers: Dr.Preeti Jani: 8097019644 Prof. Lynette Tuscano: 9930090135', 'service2.jpg', '5.jpeg', '6.jpeg', '7.jpeg', '8.jpeg'),
(3, 'Photography', '2017-11-24', '2017-11-29', '2017-12-01', '2017-12-04', 'Description 1', 'Description 2', '', 'service3.jpg', '9.jpeg', '10.jpeg', '11.jpeg', '12.jpeg'),
(4, 'Singing', '2017-12-26', '2017-12-29', '2018-01-02', '2018-01-05', 'Description 1', 'Description 2', 'Description 3', 'service3.jpg', '13.jpeg', '14.jpeg', '15.jpeg', '16.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee_member`
--
ALTER TABLE `committee_member`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `committee_member`
--
ALTER TABLE `committee_member`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
