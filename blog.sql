-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 08:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `bimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `cat_id`, `title`, `bdate`, `description`, `bimg`) VALUES
(1, 1, 'Travel', 'I have always believed, and I still believe, that whatever good or bad fortune may come our way we can always give it meaning and transform it into something of value.', '14-10-2018', 'It is true that optimists, or positive thinkers, are at an advantage in life compared to pessimists. This is because of the effect your mindset and attitude have on everything we come across. Our social relationships, our job and also our health are an integral part of our daily life and we can feel how negative and positive thoughts can have a domino effect on everything we do during the day.  The way we choose to think, positive or negative, has a great impact on the final outcome and is mirrored in everything we do. Hence the importance of having a balanced outlook on life.', 'Uploads/b1.jpeg'),
(2, 1, 'Fashion', 'Kindness in words creates confidence. Kindness in thinking creates profundity. Kindness in giving creates love', '14-10-2018', 'Remez Sassonâ€™s vivid interest for positive thinking, self-improvement, spiritual growth and inner peace are the pillars of his 15-year-old and ever-growing blog - Success Consciousness. After having studied personal development topics for most of his life, Remez started Success Consciousness to guide people towards positive thinking. His blog and books have helped thousands of readers lead a happier and more successful life.', 'Uploads/b2.jpg'),
(3, 1, 'Food', 'You must find the place inside yourself where nothing is impossible.', '14-10-2018', 'Jonathan Wells founded Advanced Life Skills to teach people how to attain their objectives by making positive changes in your core beliefs and by eliminating inner disharmony. In his blog, Jonathan reveals that the key to success and achievement your goals is a sense of peace and well-being within yourself. Advanced Life Skills focuses on personal progress and fulfillment by working on emotions and internal harmony.', 'Uploads/b3.jpg'),
(4, 1, 'Food', 'dsfdsf', '14-10-2018', 'sdfsdf', 'Uploads/aa6be8425c020fc477324dc6b9612df6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `bloger_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `mobile`, `user_name`, `address`, `password`, `email`, `gender`, `bloger_id`, `status`, `created_date`) VALUES
(1, '9503809420', 'Jivan Borole', 'Mumbai', '12345', 'borolejivan@gmail.com', 'Male', '', '1', '2018-10-14 04:57:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
