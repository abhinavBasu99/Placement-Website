-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 09:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_no` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_no`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin1@gmail.com', '$2y$10$RqwafrbMY1RtgUoQwivl.OaViZLxsGVG58BDY3E58ODtOiCUAOkh6', '2023-05-20 01:35:03', '2023-05-20 01:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `c_no` int(11) NOT NULL,
  `name_of_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package` decimal(4,2) NOT NULL,
  `tenth_eligibility_percentage` decimal(4,2) NOT NULL,
  `twelth_eligibility_percentage` decimal(4,2) NOT NULL,
  `graduation_eligibility_percentage` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`c_no`, `name_of_company`, `website`, `package`, `tenth_eligibility_percentage`, `twelth_eligibility_percentage`, `graduation_eligibility_percentage`, `created_at`, `updated_at`) VALUES
(1, 'Google', 'www.google.com', '12.00', '70.00', '70.00', '70.00', '2023-05-19 06:11:52', '2023-05-19 06:11:52'),
(2, 'Test Company', 'www.testcompany.com', '5.00', '60.00', '60.00', '60.00', '2023-05-19 06:12:28', '2023-05-19 06:12:28'),
(3, 'AV Pvt Ltd', 'www.avcompanies.com', '14.00', '60.00', '60.00', '60.00', '2023-05-19 06:12:57', '2023-05-19 06:12:57'),
(4, 'ESparks', 'www.esparks.com', '5.00', '60.00', '60.00', '60.00', '2023-05-19 07:15:02', '2023-05-19 07:15:02'),
(5, 'Test Company 2', 'www.testcompany2.com', '6.00', '60.00', '60.00', '60.00', '2023-05-22 02:06:46', '2023-05-22 02:06:46'),
(6, 'GHL', 'www.ghl.com', '24.00', '70.00', '70.00', '70.00', '2023-05-22 05:40:07', '2023-05-22 05:40:07'),
(7, 'Constructor', 'www.constructor.com', '6.00', '60.00', '60.00', '60.00', '2023-05-22 06:23:52', '2023-05-22 06:23:52'),
(8, 'Chandana Pvt Ltd', 'www.cpvtltd.com', '8.00', '60.00', '60.00', '60.00', '2023-05-29 00:36:51', '2023-05-29 00:36:51'),
(9, 'Test Company 3', 'www.testcompany3.com', '8.00', '65.00', '65.00', '65.00', '2023-06-03 13:30:31', '2023-06-03 13:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `companies_courses`
--

CREATE TABLE `companies_courses` (
  `company_no` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_courses`
--

INSERT INTO `companies_courses` (`company_no`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(2, 3, NULL, NULL),
(2, 4, NULL, NULL),
(3, 5, NULL, NULL),
(3, 6, NULL, NULL),
(4, 1, NULL, NULL),
(4, 2, NULL, NULL),
(4, 3, NULL, NULL),
(4, 4, NULL, NULL),
(4, 5, NULL, NULL),
(4, 6, NULL, NULL),
(5, 1, NULL, NULL),
(5, 2, NULL, NULL),
(5, 3, NULL, NULL),
(5, 4, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL),
(6, 3, NULL, NULL),
(6, 4, NULL, NULL),
(7, 5, NULL, NULL),
(7, 6, NULL, NULL),
(7, 8, NULL, NULL),
(7, 2, NULL, NULL),
(8, 6, NULL, NULL),
(8, 2, NULL, NULL),
(9, 1, NULL, NULL),
(9, 2, NULL, NULL),
(9, 3, NULL, NULL),
(9, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies_student`
--

CREATE TABLE `companies_student` (
  `company_no` int(11) DEFAULT NULL,
  `enrollment_no` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies_student`
--

INSERT INTO `companies_student` (`company_no`, `enrollment_no`, `created_at`, `updated_at`) VALUES
(2, 32454532427645, NULL, NULL),
(4, 32454532427645, NULL, NULL),
(4, 54637589678543, NULL, NULL),
(4, 1710701037, NULL, NULL),
(1, 1710701037, NULL, NULL),
(5, 1710701037, NULL, NULL),
(1, 3564642624646, NULL, NULL),
(2, 3564642624646, NULL, NULL),
(4, 3564642624646, NULL, NULL),
(7, 45637233423154, NULL, NULL),
(5, 32454532427645, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `created_at`, `updated_at`) VALUES
(1, 'btech', NULL, NULL),
(2, 'mtech', NULL, NULL),
(3, 'bca', NULL, NULL),
(4, 'mca', NULL, NULL),
(5, 'bba', NULL, NULL),
(6, 'mba', NULL, NULL),
(7, 'ba', '2023-05-21 05:43:13', '2023-05-21 05:43:13'),
(8, 'ma', '2023-05-21 05:43:20', '2023-05-21 05:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, '2023_05_18_114304_create_companycourses_table', 3),
(86, '2023_05_19_063901_create_company_course_table', 4),
(87, '2014_10_12_000000_create_users_table', 5),
(88, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(89, '2019_08_19_000000_create_failed_jobs_table', 5),
(90, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(91, '2023_05_01_165717_create_student_table', 5),
(92, '2023_05_02_045132_create_companies_table', 5),
(93, '2023_05_02_051425_create_admin_table', 5),
(94, '2023_05_18_113449_create_courses_table', 5),
(95, '2023_05_19_063901_create_companies_courses_table', 5),
(97, '2023_05_22_053000_create_companies_student_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `enrollment_no` bigint(20) NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `section` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenth_percentage` decimal(4,2) NOT NULL,
  `twelth_percentage` decimal(4,2) NOT NULL,
  `graduation_percentage` decimal(4,2) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`enrollment_no`, `student_name`, `email`, `contact_no`, `course`, `semester`, `section`, `tenth_percentage`, `twelth_percentage`, `graduation_percentage`, `password`, `created_at`, `updated_at`) VALUES
(1710701037, 'Prashant Singh Choudhary', 'prashant@gamil.com', '6987654345', 'btech', 8, 'A', '82.00', '74.50', '80.00', '$2y$10$bzlG8O.UcmkgO6nmYaSo2.xRLlKg7svPjMUfD.JJek9QlFYKNPa1y', '2023-05-22 05:36:09', '2023-05-22 05:36:09'),
(3564642624646, 'Vandana Madhu', 'vandana@gmail.com', '9562302536', 'mca', 4, 'A', '78.00', '90.00', '85.00', '$2y$10$Gzg7WFRaK9TNWVUucplyFuae7JC31sCoOMiGGGUmXY4/j8mYpuMmC', '2023-05-22 06:20:32', '2023-05-22 06:21:12'),
(22112551981245, 'Khushi Bharatbhai Gupta', 'khushibharatgupta2002@gmail.com', '3243264324', 'mca', 3, 'D', '80.00', '76.00', '83.31', '$2y$10$AXBY3uZw6RkEWZDxUM9um./fYFrWMzzowpJP8d1RxssbMeKAlSR9K', '2023-05-20 01:38:20', '2023-05-20 01:38:20'),
(32454532427645, 'Abhinav Basu', 'abhinavbasu99@gmail.com', '9909333723', 'mca', 3, 'D', '87.40', '67.40', '80.00', '$2y$10$IZAO1DgbTYxa/A08W2vqs.gNyxMnyQP1nhaW7.EbgFqrRzQId.qp6', '2023-05-20 01:36:02', '2023-05-21 23:51:33'),
(45637233423154, 'kiran kumar', 'kirankumarkks1432@gmail.com', '8905519839', 'mba', 3, 'D', '80.00', '70.00', '75.00', '$2y$10$KSqmV2tXrOlZIW/DGncy2upvn1MPAkPtDKG88W9Ii6VOe/3FCGHQ2', '2023-05-20 01:37:32', '2023-05-20 01:37:32'),
(54637589678543, 'Bhavin V Prajapati', 'bhavinprajapati@gmail.com', '7847384463', 'btech', 3, 'D', '80.00', '60.00', '75.00', '$2y$10$y8NyIKU2bt1McYf2h8ibruISczPTICcBtghf/LfaEc052RGI.Zrd2', '2023-05-20 01:36:45', '2023-05-20 01:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_no`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`c_no`);

--
-- Indexes for table `companies_courses`
--
ALTER TABLE `companies_courses`
  ADD KEY `companies_courses_company_no_foreign` (`company_no`),
  ADD KEY `companies_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `companies_student`
--
ALTER TABLE `companies_student`
  ADD KEY `companies_student_company_no_foreign` (`company_no`),
  ADD KEY `companies_student_enrollment_no_foreign` (`enrollment_no`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`enrollment_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies_courses`
--
ALTER TABLE `companies_courses`
  ADD CONSTRAINT `companies_courses_company_no_foreign` FOREIGN KEY (`company_no`) REFERENCES `companies` (`c_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `companies_student`
--
ALTER TABLE `companies_student`
  ADD CONSTRAINT `companies_student_company_no_foreign` FOREIGN KEY (`company_no`) REFERENCES `companies` (`c_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `companies_student_enrollment_no_foreign` FOREIGN KEY (`enrollment_no`) REFERENCES `student` (`enrollment_no`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
