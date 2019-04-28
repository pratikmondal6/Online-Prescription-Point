-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 06:15 PM
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
-- Database: `online_prescription_point`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_info`
--

CREATE TABLE `additional_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'degree',
  `lic_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_info`
--

INSERT INTO `additional_info` (`id`, `user_id`, `hospital_name`, `degree`, `lic_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'Human Hospital', 'MBBS, DSurg', 'lic-101', '2019-04-26 02:36:55', '2019-04-26 02:36:55'),
(2, 2, 'Medicine Complex', 'degree', 'lic-102', '2019-04-26 02:41:11', '2019-04-26 02:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_04_04_152315_create_users_table', 1),
(3, '2019_04_26_022658_create_additional_info_table', 2),
(5, '2019_04_26_053749_create_prescription_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1234',
  `p_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_problem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_medicine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nothing',
  `req_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctor_id`, `p_name`, `p_email`, `p_pass`, `p_phone`, `p_location`, `p_age`, `p_gender`, `p_problem`, `p_medicine`, `visit_date`, `req_message`, `req_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Patient', 'patient@gmail.com', '1234', '01521448961', 'Mohakhali', '22', 'Male', 'Headache<br />\r\nFever', 'Napa 500mg 1/0/1<br />\r\n<br />\r\nEtorix 60mg 1/0/0', '2019-04-27', 'Nothing', 1, '2019-04-27 14:19:33', '2019-04-27 14:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_dob` date NOT NULL,
  `u_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `u_email`, `u_type`, `u_pass`, `u_gender`, `u_dob`, `u_location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Makhan Lal Pal', 'doctor@gmail.com', 'Doctor', '1234', 'Male', '2001-04-01', 'Cumilla', 1, '2019-04-26 01:53:39', '2019-04-26 01:53:39'),
(2, 'Mr Pharmacy', 'pharmacy@gmail.com', 'Pharmacy', '1234', 'Male', '2001-10-01', 'Gulsan-1', 1, '2019-04-26 02:38:59', '2019-04-26 02:38:59'),
(5, 'admin admin', 'admin@gmail.com', 'Admin', '1234', 'Male', '2001-04-01', 'Khilkhet', 0, '2019-04-27 06:26:53', '2019-04-27 06:26:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_info`
--
ALTER TABLE `additional_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
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
-- AUTO_INCREMENT for table `additional_info`
--
ALTER TABLE `additional_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
