-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 09:49 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_userid` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_userid`, `admin_password`) VALUES
(2, 'shuvra232', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(256) NOT NULL,
  `option1` varchar(256) NOT NULL,
  `option2` varchar(256) NOT NULL,
  `options3` varchar(256) NOT NULL,
  `options4` varchar(256) NOT NULL,
  `ans` varchar(256) NOT NULL,
  `topic` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option1`, `option2`, `options3`, `options4`, `ans`, `topic`) VALUES
(11, 'What is the maximum possible length of an identifier?', '16', '32', '64', 'None of these above', 'None of these above', 1),
(12, 'Who developed the Python language?', 'Zim Den', 'Guido van Rossum', 'Niene Stom', 'Wick van Rossum', 'Guido van Rossum', 1),
(13, 'In which year was the Python language developed?', '1995', '1972', '1981', '1989', '1989', 1),
(14, 'In which language is Python written?', 'English', 'PHP', 'C', 'All of the above', 'C', 1),
(15, 'Which one of the following is the correct extension of the Python file?', '.py', '.python', '.p', 'None of these', '.py', 1),
(16, 'In which year was the Python 3.0 version developed?  2008', '2008', '2000', '2010', '2005', '2008', 1),
(17, 'What do we use to define a block of code in Python language?', 'Key', 'Brackets', 'Indentation', 'None of these', 'Indentation', 1),
(18, 'Which character is used in Python to make a single line comment?', '/', '//', '#', '!', '#', 1),
(19, 'Which of the following statements is correct regarding the object-oriented programming concept in Python?', 'Classes are real-world entities while objects are not real', 'Objects are real-world entities while classes are not real', 'Both objects and classes are real-world entities', 'All of the above', 'Objects are real-world entities while classes are not real', 1),
(20, 'What is the method inside the class in python language?', 'Object', 'Function', 'Attribute', 'Argument', 'Function', 1),
(25, 'fulu pranir kota hat', '1', '2', '3', '4', '4', 20);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `topic_name`) VALUES
(1, 'Python'),
(2, 'C Language'),
(8, 'C++'),
(9, 'DBMS'),
(10, 'DATA MINING'),
(11, 'Computer Networks'),
(12, 'Operating System'),
(13, 'Business'),
(14, 'AI & ML'),
(15, 'Mobile Computing');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) NOT NULL,
  `user_id` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `user_password`, `user_id`) VALUES
(9, 'Shuvra Chakrabarty', 'shuvrachakrabarty97@gmail.com', 'asdf', 'shuvra232');

-- --------------------------------------------------------

--
-- Table structure for table `user_score`
--

CREATE TABLE `user_score` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `score` varchar(3) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_score`
--

INSERT INTO `user_score` (`id`, `user_id`, `score`, `topic_id`, `date`, `name`) VALUES
(16, 'shuvra232', '9', 1, '2021-09-21 12:19:06', 'Shuvra'),
(17, 'shuvra232', '0', 2, '2021-09-21 12:19:39', 'Shuvra'),
(18, 'shuvra232', '0', 2, '2021-09-21 12:24:42', 'Shuvra Chakrabarty'),
(19, 'shuvra232', '0', 2, '2021-09-21 03:17:58', 'Shuvra Chakrabarty'),
(20, 'shuvra232', '1', 2, '2021-09-21 03:25:35', 'Shuvra Chakrabarty'),
(21, 'shuvra232', '4', 1, '2021-09-21 10:48:47', 'Shuvra Chakrabarty'),
(22, 'shuvra232', '3', 1, '2021-09-22 08:12:56', 'Shuvra Chakrabarty'),
(24, 'shuvra232', '7', 1, '2021-10-02 02:19:37', 'Shuvra Chakrabarty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic` (`topic`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_score`
--
ALTER TABLE `user_score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_score`
--
ALTER TABLE `user_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
