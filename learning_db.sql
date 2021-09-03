-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2021 at 05:36 PM
-- Server version: 10.3.29-MariaDB-0+deb10u1
-- PHP Version: 7.3.29-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_id` text NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `title` varchar(125) NOT NULL,
  `subtitle` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `hours` int(5) NOT NULL,
  `lessons` int(10) NOT NULL,
  `level` varchar(30) NOT NULL,
  `course_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_id`, `teacher_id`, `title`, `subtitle`, `description`, `image`, `url`, `hours`, `lessons`, `level`, `course_created_at`) VALUES
(1, 'da1d370f-904e-4bc0-ac1f-db7273e3989d', 1, 'Bitcoin Trading', 'Learn the fundamentals of  bitcoin trading', 'A bitcoin exchange is a digital marketplace where traders can buy and sell bitcoins using different fiat currencies or altcoins. A bitcoin currency exchange is an online platform that acts as an intermediary between buyers and sellers of the cryptocurrency.', 'https://images.unsplash.com/photo-1629339939445-cdd32879d583?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=752&q=80', '', 5, 10, 'Beginner', '2021-09-02 22:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_id` text NOT NULL,
  `name` varchar(150) NOT NULL,
  `teacher_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_id`, `name`, `teacher_created_at`) VALUES
(1, 'fd1097b3-eac1-40e8-9972-dbaf8092cafa', 'C0TT0NC4NDYTA', '2021-09-03 09:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `youtube_url` text NOT NULL,
  `video_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `course_id`, `title`, `youtube_url`, `video_created_at`) VALUES
(1, 1, 'Bitcoin Trading Introduction to Beginner\'s Course', '<iframe width=\"auto\" height=\"100%\" src=\"https://www.youtube.com/embed/LICDqKS0-GY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:31:40'),
(2, 1, 'Bitcoin Trading (Free Course) Lesson 1: The Fundamentals', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/juWeT6QaEXY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:31:40'),
(3, 1, 'Bitcoin Trading (Free Course) Lesson 2: Accumulation and Distribution', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/0dKyr3iwMS4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:34:35'),
(4, 1, 'Bitcoin Trading (Free Course) Lesson 3: Levels of Support and Resistance', '<iframe width=\"auto\" height=\"100%\" src=\"https://www.youtube.com/embed/qTwzlcPlATo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:34:35'),
(5, 1, 'Bitcoin Trading (Free Course) Lesson 4: Targets', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/f-LarFJmNwI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:35:57'),
(6, 1, 'Bitcoin Trading (Free Course) Lesson 5: Momentum and Volume', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/RfTeFLKMVtg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:35:57'),
(7, 1, 'Bitcoin Trading (Free Course) Lesson 6: Patterns', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/WBKglTKmg10\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:37:45'),
(8, 1, 'Bitcoin Trading (Free Course) Lesson 7: Wedges', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/Np4i8ICi-ow\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:37:45'),
(9, 1, 'Bitcoin Trading (Free Course) Lesson 8: Timeframes\r\n', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/sn59HCV4WWA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:39:29'),
(10, 1, 'Bitcoin Trading (Free Course) Lesson 9: Level Adaptation', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/ZlsHyOLCO1I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:39:29'),
(11, 1, 'Bitcoin Trading (Free Course) Lesson 10: Live Trade Part 1\r\n', '<iframe width=\"auto\" height=\"100%\"  src=\"https://www.youtube.com/embed/XQt2GX7K4w8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2021-09-02 21:40:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
