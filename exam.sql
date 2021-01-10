-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 08:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Amir', 'amir', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question_statement` text NOT NULL,
  `option_a` varchar(225) NOT NULL,
  `option_b` varchar(225) NOT NULL,
  `option_c` varchar(225) NOT NULL,
  `option_d` varchar(225) NOT NULL,
  `answer` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `subject_id`, `question_statement`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(4, 6, 'Prophet Muhammad (PBUH) belonged to __________ family.', 'Quraishi', 'Makki', 'Hashmi', 'Madni', 'option 3'),
(5, 6, 'In the beginning Prophet Muhammad (PBUH) worked as a shepherd for __________?', 'Banu Makhzoom', 'Banu Asad', 'Banu Saad', 'Banu Ummayya', 'option 3'),
(6, 6, 'Prophet Muhammad (PBUH) had __________ sons.\r\n', '2', '3', '4', '1', 'option 2'),
(7, 6, 'Prophet Muhammad (PBUH) had __________ daughters.', '1', '4', '3', '2', 'option 2'),
(8, 6, 'To what Prophet the Zabur was revealed by Allah?', 'Prophet Dawood (A.S)', 'Prophet Essa (A.S)', 'Prophet Ibraheem (A.S)', 'Prophet Moosa (A.S)', 'option 1'),
(9, 6, 'To what Prophet the Injeel was revealed by Allah?', 'Prophet Dawood (A.S)', 'Prophet Ibraheem (A.S)', 'Prophet Moosa (A.S)', 'Prophet Essa (A.S)', 'option 4'),
(10, 6, 'What companion of Prophet (PBUH) was awarded with the title of â€œThe sword of Allahâ€?', 'Abu Bakr Siddique (R.A)', 'Ali Al-Murtaza (R.A)', 'Umar Farooque (R.A)', 'Khalid bin Waleed (R.A)', 'option 4'),
(11, 4, 'In the east of Pakistan is', 'China', 'Iran', 'Afghanistan', 'India', 'option 4'),
(12, 4, 'Hills of Central Makran are located in which province of Pakistan?', 'Sindh', 'Punjab', 'Baluchistan', 'K.P.K', 'option 3'),
(13, 4, 'How much the height of K-2 is?', '7961', '8611', '7772', '8212', 'option 2'),
(14, 4, 'Pakistan came into exist', '1945', '1947', '1950', '1948', 'option 2'),
(15, 4, 'Quaid-E-Azam died in', '1947', '1949', '1948', '1950', 'option 3');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `quiz_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `obtain_marks` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`quiz_id`, `subject_id`, `obtain_marks`, `time`, `user_id`) VALUES
(1, 6, 5, '2021-01-08 20:44:55', 1),
(2, 6, 0, '2021-01-08 20:46:44', 1),
(3, 4, 5, '2021-01-08 20:54:41', 1),
(4, 4, 4, '2021-01-09 10:38:17', 1),
(5, 4, 0, '2021-01-09 17:54:42', 1),
(6, 6, 4, '2021-01-09 17:57:52', 1),
(7, 4, 4, '2021-01-10 17:47:03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`) VALUES
(4, 'Pak Studies'),
(6, 'Islamiyat');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'Mian Amir Salar', 'amir', '123456'),
(3, 'Ammar', 'ammar', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `quizes`
--
ALTER TABLE `quizes`
  ADD CONSTRAINT `quizes_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `quizes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
