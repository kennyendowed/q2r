-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2020 at 03:13 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.1.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `q2r`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `options1` varchar(255) NOT NULL,
  `options2` varchar(255) NOT NULL,
  `options3` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `options1`, `options2`, `options3`, `correct`) VALUES
(1, 'She was a devoted wife and looked _______ her husband.', 'we', 'upon', 'for', 'after'),
(2, 'Good sleep is necessary _______ good health.', 'from', 'us', 'of', 'for'),
(3, 'My voice reverberated _______ the walls of the castle.', 'where', 'with', 'on', 'from'),
(4, 'A steady minds triumphs _______ difficulties.', 'with', 'out', 'in', 'over'),
(5, 'Jack\'s mind was attuned _______ music.', 'on', 'at', 'for', 'to'),
(6, 'I bought him _______ with great difficulty.', 'round', 'down', 'in', 'up'),
(7, 'My uncle has invested a lot of money _______ farming.', 'on', 'for', 'out', 'in'),
(8, 'India is committed _______ a policy of peaceful existence.', 'with', 'of', 'go', 'to'),
(9, 'Exercise is beneficial ______ health.', 'towards', 'went', 'for', 'to'),
(10, 'A good judge never jumps ________ to conclusion.', 'to', 'for', 'where', 'at'),
(11, 'A good judge never gropes _______ the conclusion.', 'in', 'on', 'from', 'for');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `reg_id` int(20) NOT NULL,
  `display_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_id`, `display_name`) VALUES
(1, 174635, 'kenneth akapa'),
(2, 387645, 'peace akpan'),
(3, 783456, 'kelz favour');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `qid` int(10) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `student_id`, `qid`, `answer`, `created_at`) VALUES
(26, 3, 9, 'towards', '2020-08-10 12:21:59'),
(27, 3, 6, 'down', '2020-08-10 12:21:59'),
(28, 3, 3, 'from', '2020-08-10 12:21:59'),
(29, 3, 1, 'upon', '2020-08-10 12:22:00'),
(30, 3, 2, 'from', '2020-08-10 12:22:00'),
(176, 2, 8, 'to', '2020-08-10 14:12:47'),
(177, 2, 9, 'for', '2020-08-10 14:12:47'),
(178, 2, 2, 'for', '2020-08-10 14:12:48'),
(179, 2, 4, 'in', '2020-08-10 14:12:48'),
(180, 2, 7, 'in', '2020-08-10 14:12:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
