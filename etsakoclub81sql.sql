-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2024 at 06:51 AM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joansimm_mem`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `club_affiliation` varchar(50) NOT NULL,
  `membership_no` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `business_type` varchar(100) NOT NULL,
  `business_phone_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `physical_address` text NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `products_services` text NOT NULL,
  `additional_info` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `club_affiliation`, `membership_no`, `company_name`, `business_type`, `business_phone_no`, `email`, `facebook_url`, `twitter_url`, `linkedin_url`, `physical_address`, `contact_person`, `products_services`, `additional_info`, `username`, `password`, `instagram_url`, `registration_date`, `image_path`, `about`, `created_at`) VALUES
(1, 'Jame', 'Harison', 'Abuja', '82999', 'Harison company', 'Restaurant', '', 'harison@the.org', NULL, NULL, NULL, '4860 Pinewood Avenue', '8188888882', 'Restaurant, catering, cakes', 'All kind of events', '', '', NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-16 09:00:32'),
(2, 'Willy', 'Benny', 'HQ', '788282', 'Willy Company', 'Engineer', '108466587', 'willy@the.org', NULL, NULL, NULL, '15 Avenu block 5, u junction, landform, road, 68888', 'Willy', 'Engineering, all kind', 'Engineer', 'willy', '$2y$10$cWKGIVsGQOuRgXjpGWOAEeDdwq8wDm0fWpqMyXYR8zd11wGQqLjT.', NULL, NULL, 'uploads/66c10ed51d008.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-08-16 09:00:32'),
(4, 'Jerry', 'Richard', 'US', '82882', 'Richard Company', 'Doctor', '186645964', 'richard@the.org', NULL, NULL, NULL, 'US', 'Richard', 'Doctor, surgery', 'All kind of operations', 'jerry', '$2y$10$faNl2FPb.5H/90CZx7Ran.avMDT.Rfq9bOyoPRFpWjCiEMqCcdh32', NULL, NULL, NULL, NULL, '2024-08-16 09:00:32'),
(5, 'Terry', 'Anderson', 'Europe', '7288822', 'Terry company', 'Manager ', '1846675555', 'terry@the.org', NULL, NULL, NULL, 'Europe', 'Terry', 'Manager, all of jobs ', 'Manager', 'terry', '$2y$10$Z/YQWzb2PrJbYqDruCDGreU9tuxvp9O1TRsKLpvKXFz240KghPMcW', NULL, NULL, NULL, NULL, '2024-08-16 09:00:32'),
(6, 'Mary', 'Jame', 'HQ', '7892', 'Mary company', 'Model', '864536888', 'gshjjj@hskk.org', '', '', '', 'US', 'Mary', 'Model', 'Modeling', 'mary', '$2y$10$5jxGtpUIIABPnoQuLj8eD.eKD3OTLsuRHvxEfYt3AswezETxpkiBS', '', '2024-07-30', NULL, NULL, '2024-08-16 09:00:32'),
(7, 'james', 'Hannah', 'HQ', '62727', 'James company', 'Model', '84664888', 'gshsjsj@yer.org', '', '', '', 'UK', 'James', 'Modeling', 'Modeling', 'james', '$2y$10$.8qde57ngwpjYUxBDuA0xe4D0MQan.Q6fi7SjKCoAYbF89UY/sEja', '', '2024-07-30', NULL, NULL, '2024-08-16 09:00:32'),
(8, 'Gerry', 'Anderson', 'HQ', '72727', 'Fitness center company', 'Fitness center', '876767785tj', 'fitness@k.org', '', '', '', 'Uk K', 'Keepl', 'Fitness center\r\nGym', 'Fitness center', 'fitness', '$2y$10$QLGFFi9kScdOqaqE1mzHbeopLMXWrMgfcdrHGA14u06rSZUzZ.Rmm', '', '2024-07-30', 'uploads/66ae8b0294b76.png', 'Customer use this information to learnwhat makes your company great.', '2024-08-16 09:00:32'),
(9, 'firstname', 'lastname', 'HQ', '72888', 'Unknown company', 'Unknown', '7085996479', 'unkkn98@gmail.com', '', '', '', 'US4', 'Unknowncontactpery', 'Unknown', 'Unknown', 'unknown', '$2y$10$4srVo24tFQ0fFzVxJaVqdexAUMuUSuw0JHWeOjLrLZB7cJgFZZvqi', '', '2024-08-05', 'uploads/66c1069d1da7e.jpg', 'Customer use this information to learn what makes your company great.', '2024-08-16 09:00:32'),
(10, 'T', 'O', 'HQ', '5555', 'Y', 'Y', '587455455', 'bblur4235@gmail.com', '', '', '', 'Avenue', 'O', 'L', 'L', 'bb', '$2y$10$9YVfuSmMF93NP0IGd5tT/ubeuKMD83QeVnYYLj8BPMHoTs0.4FNk6', '', '2024-08-11', NULL, NULL, '2024-08-16 09:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_requested_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `reset_token`, `reset_requested_at`) VALUES
(1, 'terry@the.org', '$2y$10$Z/YQWzb2PrJbYqDruCDGreU9tuxvp9O1TRsKLpvKXFz240KghPMcW', NULL, NULL),
(2, 'gshjjj@hskk.org', '$2y$10$5jxGtpUIIABPnoQuLj8eD.eKD3OTLsuRHvxEfYt3AswezETxpkiBS', NULL, NULL),
(3, 'gshsjsj@yer.org', '$2y$10$.8qde57ngwpjYUxBDuA0xe4D0MQan.Q6fi7SjKCoAYbF89UY/sEja', NULL, NULL),
(4, 'keeper@k.org', '$2y$10$QLGFFi9kScdOqaqE1mzHbeopLMXWrMgfcdrHGA14u06rSZUzZ.Rmm', NULL, NULL),
(5, 'unkkn98@gmail.com', 'd4819c017f2be1f6e9f29b9f51be6df8e356d55d1eafadeb6facbd8e812c67e7', NULL, NULL),
(6, 'bblur4235@gmail.com', '$2y$10$9YVfuSmMF93NP0IGd5tT/ubeuKMD83QeVnYYLj8BPMHoTs0.4FNk6', '6205dd47dc51317637d6a0ccf7dd1baaaa7533e231644b905a60816fe10710023d3bc8fbcae782408de777ae9211f6ed0b5a', '2024-08-11 17:03:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
