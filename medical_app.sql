-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 04:59 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`, `created_at`) VALUES
(1, 'female', '2021-07-14 14:06:47'),
(2, 'male', '2021-07-14 14:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `illness`
--

CREATE TABLE `illness` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `illness`
--

INSERT INTO `illness` (`id`, `name`, `created_at`) VALUES
(1, 'Gonorrhoea', '2021-07-14 12:22:26'),
(2, 'Syphilis', '2021-07-14 12:22:26'),
(3, 'Genital herpes', '2021-07-14 13:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `illness_id` int(12) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`id`, `name`, `created_at`, `illness_id`, `gender_id`) VALUES
(1, 'burning or painful sensation during urination', '2021-07-14 13:50:48', 1, 2),
(2, 'greater frequency or urgency of urination', '2021-07-14 13:50:52', 1, 2),
(3, 'a pus-like discharge (or drip) from the penis (white, yellow, beige, or greenish)', '2021-07-14 14:02:51', 1, 2),
(4, 'swelling or pain in the testicles', '2021-07-14 13:50:59', 1, 2),
(5, 'swelling or redness of the opening of the panis', '2021-07-14 13:51:02', 1, 2),
(6, 'a persistent sore throat', '2021-07-14 13:51:06', 1, 2),
(7, 'discharge from the vagina(watery, creamy, or slightly green)', '2021-07-14 13:52:52', 1, 1),
(8, 'pain or burning sensation while urinating\r\n', '2021-07-14 13:52:52', 1, 1),
(9, 'urge to urinate more frequently', '2021-07-14 13:53:57', 1, 1),
(10, 'heavier periods or spotting', '2021-07-14 13:53:57', 1, 1),
(11, 'sore throat', '2021-07-14 13:54:36', 1, 1),
(12, 'pain during sexual intercourse', '2021-07-14 13:54:36', 1, 1),
(13, 'sharp pain in the lower abdomen', '2021-07-14 13:55:26', 1, 1),
(14, 'ferver', '2021-07-14 13:55:26', 0, 0),
(15, 'small round sore (chancre) inside the mouth, genitals, and rectum\r\n', '2021-07-14 13:57:30', 2, 0),
(16, 'headache', '2021-07-14 14:04:26', 0, 0),
(17, 'swollen lymph', '2021-07-14 14:04:48', 0, NULL),
(18, 'fatigue', '2021-07-14 13:59:28', 2, NULL),
(19, 'weight loss', '2021-07-14 14:00:00', 2, NULL),
(20, 'hair loss', '2021-07-14 14:00:00', 2, NULL),
(21, 'aching joints', '2021-07-14 14:01:09', 2, NULL),
(22, 'blisters on the penis, scrotum, near or around the vagina, anus buttocks', '2021-07-14 14:01:09', 3, NULL),
(23, 'itch', '2021-07-14 14:01:44', 3, NULL),
(24, 'body ache', '2021-07-14 14:01:44', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `PhoneNumber` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `PhoneNumber`, `created_at`) VALUES
(1, 'Daniel', 'Samson', 'butcher@email.com', '$2y$10$8t0NID7GG7u2KTxy.T5/.umwlDXlNjGvyTRTSZ5eXryF6Lr0ev7rm', '07060494923', '2021-07-10 11:01:48'),
(2, 'hello', 'signup', 'example@mail.com', '$2y$10$gkA/e6vWUJIdLoVRylW9I.O8wktESmfH0R5Wy/5kjBDIIu7GMWk3a', '07060494923', '2021-07-10 13:06:26'),
(3, 'Daniel', 'signup', 'hello@email.com', '$2y$10$sMBXq9Ot7DZrKNaMKLM3cuwtFoAikXq/BWDSsGCdnocsamezZsWm6', '07060494923', '2021-07-13 15:00:22'),
(4, 'Isaac', 'Samson', 'mail@email.com', '$2y$10$iBiCZ0o1Up8m30MYu6MaK.lDgdhEbzd6JUIaUuWahLD5nBIewLh1.', '07060494923', '2021-07-14 12:39:14'),
(5, 'Busy', 'Signal', 'busy@email.com', '$2y$10$Y47iLb/xTgVXfG7vdZ9zGeQQ4mg9ysJxDKqilK.oz5W.rlCAHEKfm', '07060494923', '2021-07-14 12:40:49'),
(6, 'Signal', 'Busy', 'signal@email.com', '$2y$10$QOeUImzaKBid4Y/x4tT94eKey.683GuAUDrkL13xpctr6RakZvHZq', '070604949', '2021-07-14 12:44:35'),
(7, 'rocket', 'software', 'rocket@email.com', '$2y$10$qqQrOEYTgpz6dIxux2FxU.deE2HS0hM4uaw70dmqebHjuB1RWHdAG', '070604949', '2021-07-14 12:50:52'),
(8, 'Daniel', 'software', 'hel@email.com', '$2y$10$6Oyh2oMUeArYtVPQUnr9LOVfQhPw3u8VB.6x5VF5yXE7Cuwhd//3i', '07060494923', '2021-07-14 12:53:06'),
(9, 'Signal', 'Daniel', 'daniel@email.com', '$2y$10$6D3.4/qqLM5c44mcV/KwCeae7hSVwme6qaU/Q4Ck8hZJsHlvVFwcW', '07060494923', '2021-07-14 12:55:51'),
(10, 'Daniel', 'software', 'software@email.com', '$2y$10$TeYW4JWCLrF/UbpEA8q7cOLmKn.DDCImmHvWxMANm828XIEBAEtQO', '07060494923', '2021-07-14 13:06:30'),
(11, 'rocket', 'Daniel', 'rockets@email.com', '$2y$10$9uZ5hhgT/eo2WPi/ly2daeHdcc3GwNpY3.FH/eqlPQoLmdxr9981a', '07060494923', '2021-07-14 13:07:32'),
(12, 'rocket', 'signup', 'he@email.com', '$2y$10$ASV6UWGTt47dMgT5ZTqfFeruQ3dXpiMgiUgZlJzr6M/KO5OvleFWC', '07060494923', '2021-07-14 13:11:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `illness`
--
ALTER TABLE `illness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `illness`
--
ALTER TABLE `illness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
