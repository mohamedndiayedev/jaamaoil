-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 02:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afrioildb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`email`, `contact`, `address`, `created_at`, `updated_at`) VALUES
('aks@mail.com', '34567889098', 'plaine verte, champ de mars', '2021-06-23 08:39:02', '2021-06-23 08:39:02'),
('ank@mail.com', '23456789', '26 plaine magnien maurice', '2021-06-23 08:38:16', '2021-06-23 08:38:16'),
('mcb@mail.com', '1234567', 'st pierre, port louis', '2021-06-23 08:37:12', '2021-06-23 08:37:12'),
('sky@mail.com', '123456789', 'Vallee Pitot', '2021-06-23 08:37:32', '2021-06-23 08:37:32');

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
(1, '2021_04_26_091121_create_admins_table', 1),
(3, '2021_04_27_130046_add_status_to_vouchers_table', 3),
(6, '2021_06_07_095007_create_staffs_table', 6),
(7, '2021_06_07_100025_drop_tasks_table', 7),
(8, '2021_06_07_131636_drop_staffs_table', 8),
(12, '2021_04_27_105825_create_vouchers_table', 9),
(13, '2021_06_05_121402_create_users_table', 9),
(14, '2021_06_07_093641_create_customers_table', 9),
(15, '2021_06_07_132225_create_staff_table', 9),
(16, '2021_06_22_103748_create_used_vouchers_table', 9),
(17, '2021_06_23_125649_drop_vouchers_table', 10),
(18, '2021_06_23_130206_create_vouchers_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`email`, `contact`, `branch`, `created_at`, `updated_at`) VALUES
('hum@mail.com', '123456789', 'Bukit Jalil', '2021-06-23 08:40:08', '2021-06-23 08:40:08'),
('jp@mail.com', '011234567', 'Port Louis', '2021-06-23 08:39:30', '2021-06-23 08:39:30'),
('mjth@mail.com', '12345678', 'Bukit Jalil', '2021-06-23 08:40:33', '2021-06-23 08:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `used_vouchers`
--

CREATE TABLE `used_vouchers` (
  `voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `used_vouchers`
--

INSERT INTO `used_vouchers` (`voucher_id`, `location`, `staff`, `created_at`, `updated_at`) VALUES
('13', 'Bukit Jalil', 'Humairaa Aasiyah', '2021-06-24 03:13:43', '2021-06-24 03:13:43'),
('16', 'Bukit Jalil', 'Muhamed Jaiteh', '2021-06-24 03:28:42', '2021-06-24 03:28:42'),
('18', 'Bukit Jalil', 'Humairaa Aasiyah', '2021-06-24 03:31:19', '2021-06-24 03:31:19'),
('19', 'Port Louis', 'Jake Paul', '2021-06-24 03:27:18', '2021-06-24 03:27:18'),
('21', 'Bukit Jalil', 'Muhamed Jaiteh', '2021-06-24 04:43:54', '2021-06-24 04:43:54'),
('23', 'Bukit Jalil', 'Muhamed Jaiteh', '2021-06-24 04:48:43', '2021-06-24 04:48:43'),
('28', 'Bukit Jalil', 'Muhamed Jaiteh', '2021-06-24 15:23:54', '2021-06-24 15:23:54'),
('32', 'Port Louis', 'Jake Paul', '2021-07-26 01:55:53', '2021-07-26 01:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'Mauritius Commercial Bank', 'mcb@mail.com', '$2y$10$V6/HC737JnH/ThvviC2dIucVOzb7YlQopBtP9PWp5LlRAXPem.VoK', '2021-06-23 08:37:12', '2021-06-23 08:37:12'),
(2, 'customer', 'Sky High', 'sky@mail.com', '$2y$10$V6TLEuiBx1aY1mT8ADyDZOS9xWBSTI3yVXJNGTYX6YC/mb0I3gCgy', '2021-06-23 08:37:32', '2021-06-23 08:37:32'),
(3, 'customer', 'ANK Analytics', 'ank@mail.com', '$2y$10$A8Gm8XZWIuWGqznEMfkbz.IoMUqeDMNMPoAgqesLzSP/HQ2uw1mmy', '2021-06-23 08:38:16', '2021-06-23 08:38:16'),
(4, 'customer', 'Akati Sekurity Bhd', 'aks@mail.com', '$2y$10$FXPMpMK1fN0zZKrXfISey.1m3BxA4jILq10nQyS5srPMJVnX5UteW', '2021-06-23 08:39:02', '2021-07-25 03:27:58'),
(5, 'staff', 'Jake Paul', 'jp@mail.com', '$2y$10$sjT4w4wzq7XmIvcE1naDZe3.Z5rPnAfmONtvZKBq1Izhp1.H9Zmaq', '2021-06-23 08:39:30', '2021-06-23 08:39:30'),
(6, 'staff', 'Humairaa Aasiyah', 'hum@mail.com', '$2y$10$FkxZFFjmqNkST0NKwFzlh..Q7AbgSMEt.2AtQpBfmFZBt/aWCbFhy', '2021-06-23 08:40:09', '2021-06-23 08:40:09'),
(7, 'staff', 'Muhamed Jaiteh', 'mjth@mail.com', '$2y$10$kltio4tJ.sPBkeaRnImrJ.sXIR.dQU3AGBDHBNT1noIPyHFhkHafK', '2021-06-23 08:40:33', '2021-06-23 08:40:33'),
(8, 'admin', 'Super Admin', 'admin@mail.com', '$2y$10$bDDGCV5e1sTr63B1BxIU7ehaG16DekoQx3AjRC6IEQAjV2dW322Ce', '2021-06-23 08:41:35', '2021-06-24 13:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `voucher_name`, `voucher_code`, `short_code`, `value`, `status`, `expiry_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Akati Sekurity Bhd', '$2y$10$gTHpnnOE5P.zKF3wLGuEhOIAm/whLUBX.H/CKXVHz6hEG1BaMkhFa', 'AKS', '50', 'Invalid', '2021-07-11', 'Super Admin', '2021-06-23 09:03:13', '2021-06-24 02:27:10'),
(2, 'Akati Sekurity Bhd', '$2y$10$sSyWNNORbGw5ahxn5ya7HebyeAgIZXJqpsoL4X8ZCgQVHvrPv490C', 'AKS', '50', 'Invalid', '2021-07-11', 'Super Admin', '2021-06-23 09:03:13', '2021-06-24 02:27:06'),
(3, 'Akati Sekurity Bhd', '$2y$10$AVwc0.Z5ozvC38xUtFnGfOGq06YBP7C1/wlR/q8LDtG3w74hcXCdC', 'AKS', '50', 'Invalid', '2021-07-11', 'Super Admin', '2021-06-23 09:03:13', '2021-06-24 02:27:02'),
(4, 'Akati Sekurity Bhd', '$2y$10$oaOmt/j6oWjUfKZSspMbb.Y.h79Pn40kyH.PbBzs6HfQxQKls5pkW', 'AKS', '50', 'Invalid', '2021-07-11', 'Super Admin', '2021-06-23 09:03:13', '2021-06-24 02:27:00'),
(5, 'Akati Sekurity Bhd', '$2y$10$jm5yQnggeM1v9gprcKjZduuNdBczrmrPMxXMtyppq2FLTplTRIRyK', 'AKS', '50', 'Invalid', '2021-07-11', 'Super Admin', '2021-06-23 09:03:14', '2021-06-24 02:13:29'),
(6, 'ANK Analytics', '$2y$10$iiFFA/QG4wToLZekrrvLvOimHgbKh0zp/bpDBBrFNePLq9BJFNmuG', 'ANK', '200', 'Invalid', '2021-08-01', 'Super Admin', '2021-06-23 09:04:41', '2021-06-24 02:26:58'),
(7, 'ANK Analytics', '$2y$10$i50KC35UZOXRb0avkRZ8ce5rlL6reImXxqvK2xP/XHNwamcx.yL3G', 'ANK', '200', 'Invalid', '2021-08-01', 'Super Admin', '2021-06-23 09:04:41', '2021-06-24 02:26:56'),
(8, 'ANK Analytics', '$2y$10$HZoKexYCwHY16IThRj2XBegg/foMGp7BeTpV1YQbfs.3ToKVFlzBm', 'ANK', '200', 'Invalid', '2021-08-01', 'Super Admin', '2021-06-23 09:04:41', '2021-06-24 02:26:53'),
(9, 'ANK Analytics', '$2y$10$iT6sYiJwnjTPslnQIDUtxuGY76YPvLRdXSxdk/u7eGQNZ1dtdhDWO', 'ANK', '200', 'Invalid', '2021-08-01', 'Super Admin', '2021-06-23 09:04:41', '2021-06-24 02:26:51'),
(10, 'Mauritius Commercial Bank', '$2y$10$XvksziZIskv/MWvTX.kSzuQ9iZX1dnJprxQPeNGxCVRbBwKFWAZjK', 'MCB', '100', 'Invalid', '2021-06-25', 'Super Admin', '2021-06-23 09:06:17', '2021-06-24 02:26:49'),
(11, 'Mauritius Commercial Bank', '$2y$10$I2eA6Cl9BxaZImHE4yDFcOK6VYuLfl5myOXDScyEJNITby0i/DbmW', 'MCB', '100', 'Invalid', '2021-06-25', 'Super Admin', '2021-06-23 09:06:18', '2021-06-24 02:26:47'),
(12, 'Mauritius Commercial Bank', '$2y$10$WjsdPi5NvsTGyap.2EMGSewCAqT.6/GVyIb1DUIwUFAL7icaj0cfi', 'MCB', '100', 'Invalid', '2021-06-25', 'Super Admin', '2021-06-23 09:06:18', '2021-06-24 02:26:43'),
(13, 'ANK Analytics', '$2y$10$GgiClwFTD3b/qdnQ9KRi6e7hdRIR5aflL7T2KN39aqrEcbj/LhO/2', 'ANK', '200', 'Redeemed', '2021-07-11', 'Super Admin', '2021-06-24 02:27:47', '2021-06-24 03:13:43'),
(14, 'Akati Sekurity Bhd', '$2y$10$62AozfNm0WmxIDtibyJ4AuRT4ksDZxw6lbcy08dn1agp36lA3s.Q2', 'AKS', '50', 'Invalid', '2021-07-10', 'Super Admin', '2021-06-24 03:25:32', '2021-06-24 04:37:41'),
(15, 'Akati Sekurity Bhd', '$2y$10$cj9/fXdXcm3ht81yHPlvee8Iq9UooU9tA1.x.QQLpOpoBYgHOXUmW', 'AKS', '50', 'Invalid', '2021-07-10', 'Super Admin', '2021-06-24 03:25:33', '2021-06-24 04:37:38'),
(16, 'Akati Sekurity Bhd', '$2y$10$DDdICOt/hTzEGOsChGetXOxp1QxqIMGTr22LPxa7xyjLRDk347.Y6', 'AKS', '50', 'Redeemed', '2021-07-10', 'Super Admin', '2021-06-24 03:25:33', '2021-06-24 03:28:42'),
(17, 'Akati Sekurity Bhd', '$2y$10$k4RPMg8M6rKqnxlPx/CvAezevxz5Bm710B80Ehm8fiK/Iks.Gafca', 'AKS', '50', 'Invalid', '2021-07-10', 'Super Admin', '2021-06-24 03:25:33', '2021-06-24 04:37:36'),
(18, 'Akati Sekurity Bhd', '$2y$10$VAxFAe9M9RveJ9M0fr1OTOD8Fw6zEyuVIkZdo0dWNoiwJFphrYT3S', 'AKS', '50', 'Redeemed', '2021-07-10', 'Super Admin', '2021-06-24 03:25:33', '2021-06-24 03:31:20'),
(19, 'Akati Sekurity Bhd', '$2y$10$WvnOcs/ISoLEajYySFifB.S78EApp0TVqKMuSyjJA8ihO5F05arfq', 'AKS', '50', 'Redeemed', '2021-07-10', 'Super Admin', '2021-06-24 03:25:33', '2021-06-24 03:27:18'),
(20, 'Sky High', '$2y$10$b3N4b3/8SQfVDeUFJmWYo.UsIk.ezBy30SyDdURa3ya02HJZwYaIm', 'SKY', '100', 'Invalid', '2021-07-06', 'Super Admin', '2021-06-24 04:38:20', '2021-06-24 15:22:15'),
(21, 'Sky High', '$2y$10$x2qlhOaYBK9iS4pPdGCKEuGhmnmWwtAvp9lN9yJ.UhzpFbe4i1ltG', 'SKY', '100', 'Redeemed', '2021-07-06', 'Super Admin', '2021-06-24 04:38:20', '2021-06-24 04:43:54'),
(22, 'ANK Analytics', '$2y$10$SpkMAljUrmHC5PoeVw4/Ie2L1WKVXFAuHJ6Yu0v262tPYulEVSFoW', 'ANK', '200', 'Invalid', '2021-07-10', 'Super Admin', '2021-06-24 04:38:50', '2021-07-25 03:53:38'),
(23, 'ANK Analytics', '$2y$10$9Vd5mYnN8m32dZgU0Wi84O6LwCrO3kbLQb7akbTx9yTUV3oTq1Cpu', 'ANK', '200', 'Redeemed', '2021-07-10', 'Super Admin', '2021-06-24 04:38:50', '2021-06-24 04:48:43'),
(24, 'ANK Analytics', '$2y$10$D86/qt7hNfkVzNbUue0HzuEZUYcPKQ2xt7T8G06DAnrDM1FeaFu3y', 'ANK', '200', 'Invalid', '2021-07-10', 'Super Admin', '2021-06-24 04:38:50', '2021-07-26 02:00:06'),
(25, 'Sky High', '$2y$10$qIzZe5W6xn0.kCaemU1kr.KXGEg83UKpUf.l42lSM8QeetSxPRrJq', 'sky', '100', 'Invalid', '2021-07-09', 'Super Admin', '2021-06-24 15:21:27', '2021-07-26 02:00:20'),
(26, 'Sky High', '$2y$10$VUoAkVHGSh3tVEHw1lbL5uWoiVKZxSdDABpZXAwnE4lKlL2.gUTo6', 'sky', '100', 'Valid', '2021-07-09', 'Super Admin', '2021-06-24 15:21:27', '2021-06-24 15:21:27'),
(27, 'Sky High', '$2y$10$N82ICgdA.vpVJlhDRk.OQOJEtspTYlwy.PqP8R4Z4UOjI67ZQ6MBK', 'sky', '100', 'Valid', '2021-07-09', 'Super Admin', '2021-06-24 15:21:27', '2021-06-24 15:21:27'),
(28, 'Sky High', '$2y$10$czKWMoiZzKEy1ybfgFD11uIaePHolRpFSUr7G143YF4vWqpH7SKju', 'sky', '100', 'Redeemed', '2021-07-09', 'Super Admin', '2021-06-24 15:21:27', '2021-06-24 15:23:54'),
(29, 'Sky High', '$2y$10$YiQwQs8urlzoPv6Fk6Duq.SAYSrtoWlgQ9bElUCSHDfnYZBoZboO.', 'SKY', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:47:58', '2021-07-26 01:47:58'),
(30, 'Sky High', '$2y$10$z4Ln3CjdLduZU90lc4Kw2ODzz2O832aV9rlumoOmeYT2N8D5BOtEW', 'SKY', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:47:58', '2021-07-26 01:47:58'),
(31, 'Sky High', '$2y$10$6wccnkahwtn6IWqWo3QETuvQVtwr6Jp0dVwS1HGfDh.oRGKmnLCkW', 'SKY', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:47:58', '2021-07-26 01:47:58'),
(32, 'Akati Sekurity Bhd', '$2y$10$O3O5O03RiqLDKscUCCVhZOwoWPEn/w93XxUQ4g1HGc6wuBREY34A6', 'AKS', '50', 'Redeemed', '2021-08-08', 'Super Admin', '2021-07-26 01:51:49', '2021-07-26 01:55:53'),
(33, 'Akati Sekurity Bhd', '$2y$10$RPLWFdQyJsL7b0nI.0gu2.xYDJb8A1xKq4GPcVm4zckED3T3LuMXG', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:50', '2021-07-26 01:51:50'),
(34, 'Akati Sekurity Bhd', '$2y$10$B2/jochAzQuB2jLQBG1U.OIm40wUyuLeqRaPGNPJhJX9yg/DUfPC6', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:50', '2021-07-26 01:51:50'),
(35, 'Akati Sekurity Bhd', '$2y$10$Hfk139jKr3poOzIj1MpfXekxBopcMshfgRyuxYlj8Wngi0dzxuTjO', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:50', '2021-07-26 01:51:50'),
(36, 'Akati Sekurity Bhd', '$2y$10$ZlJenJx/kxBq/tnof0QplOg1sGsda5oKSOtfURQvUSfJFrgHgw.EW', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:50', '2021-07-26 01:51:50'),
(37, 'Akati Sekurity Bhd', '$2y$10$vMqFmL.QNYOwMy/Xw/oqxecAupXJC.ElburNs/4MZ5Ivk.X3w8kAa', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:50', '2021-07-26 01:51:50'),
(38, 'Akati Sekurity Bhd', '$2y$10$uZE8iAJva6/grWKrX/kbn.BnVXU21O7hXUojM8ADgQYwBVocDUZiK', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:50', '2021-07-26 01:51:50'),
(39, 'Akati Sekurity Bhd', '$2y$10$Sw0LDMQbnnWwo9H7yHnBYuYWYazTz/ClEnBr4Lmhwwl6Ep5wMTtRm', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:50', '2021-07-26 01:51:50'),
(40, 'Akati Sekurity Bhd', '$2y$10$tji/jPTX5pRx8FbPUGQF4OwEWeOD9sHx0APDbejZZztjaq0tnv/W.', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(41, 'Akati Sekurity Bhd', '$2y$10$K3DpeOkRqo6xam33YKoTbeNDShg02.R.KX/q13mLPDO7Phqlpclq2', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(42, 'Akati Sekurity Bhd', '$2y$10$RKqhiLlXnVFvOjtxuaoBNOy6KfYR1NMXUVeAh6S4oFGR4awwFvioK', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(43, 'Akati Sekurity Bhd', '$2y$10$v8YQ1yhb/fkPIRH6EA2vD.DQ0/2HhOpgC1LdMcLGczHmnml1seAQK', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(44, 'Akati Sekurity Bhd', '$2y$10$h7DoxpqCPtBd8QTG6lDgpuW9dr4qp76NlUGwyNsOqu1iQGCF1uGDa', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(45, 'Akati Sekurity Bhd', '$2y$10$VCzEDtd6.ta6osc/QQYg7OwVGQ9EEbt4aNw8dEGlC3vBi2MDvyehm', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(46, 'Akati Sekurity Bhd', '$2y$10$GxLMFTlhRc5BUH/42T9AquqGMOea3.LZcKWewp19vo4T10YC9l/b.', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(47, 'Akati Sekurity Bhd', '$2y$10$Nv4Xy/.51os9sRVcfcT2j.G0RjVtBA10S.V7h3294l31LMnKBtOmG', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(48, 'Akati Sekurity Bhd', '$2y$10$glPbBj3fdzw2h/gx/4lOfegTSm5gfryLfVLOxelhxrgOtzVqn8u0q', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(49, 'Akati Sekurity Bhd', '$2y$10$PS9zciPVcMyULXPHmgykL.pPWqEmz/HR9UyY2O.6bDbortSXorK/G', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:51', '2021-07-26 01:51:51'),
(50, 'Akati Sekurity Bhd', '$2y$10$3QA6LEAzl8CPbdSM30Uzt.QgOSpLFrXYAxJucHrAA57iPeK21lnLu', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:52', '2021-07-26 01:51:52'),
(51, 'Akati Sekurity Bhd', '$2y$10$nOa5u.hJiLw3K945kveQXuFYzJR8WgVyrqLu2JCPwB2cHGCQ.qi9G', 'AKS', '50', 'Valid', '2021-08-08', 'Super Admin', '2021-07-26 01:51:52', '2021-07-26 01:51:52'),
(52, 'ANK Analytics', '$2y$10$bvLFYXCiWYJvPdiCibZE6.YWSz5uNHrbfyH5v04B.cfa4hNeA01me', 'ANK', '200', 'Valid', '2021-08-06', 'Super Admin', '2021-07-26 02:46:20', '2021-07-26 02:46:20'),
(53, 'ANK Analytics', '$2y$10$STTjgAlwX3VqB9um./qvw.SSZkS3.Z0nSDydRaji4qkj1AXcnQTaa', 'ANK', '200', 'Valid', '2021-08-06', 'Super Admin', '2021-07-26 02:46:20', '2021-07-26 02:46:20'),
(54, 'ANK Analytics', '$2y$10$QzEAGkjN0B0uQk6z.hLmO.TArB65JpEQ5.8I.0UUxz8sRMtcSc/n.', 'ANK', '200', 'Valid', '2021-08-06', 'Super Admin', '2021-07-26 02:46:20', '2021-07-26 02:46:20'),
(55, 'ANK Analytics', '$2y$10$tqzA5F.9EnntHSuMI1qqr.PNN6PwfbzpS3L2IAYun6sDPPMFq9AFq', 'ANK', '200', 'Valid', '2021-08-06', 'Super Admin', '2021-07-26 02:46:21', '2021-07-26 02:46:21'),
(56, 'Mauritius Commercial Bank', '$2y$10$hwdkeUWEHZK82EknGTWCCuKJy/QzQ1Wo.e4d52NFAGEG.FNgoBkHm', 'MCB', '50', 'Valid', '2021-08-04', 'Super Admin', '2021-07-26 02:47:22', '2021-07-26 02:47:22'),
(57, 'Mauritius Commercial Bank', '$2y$10$IFwF1evUFsR8TsQYgMt1murCXkmVdRPakvmnc4epTiq0RlEL/QKOy', 'MCB', '50', 'Valid', '2021-08-04', 'Super Admin', '2021-07-26 02:47:22', '2021-07-26 02:47:22'),
(58, 'Akati Sekurity Bhd', '$2y$10$tfQWxPiJYKgFNGBkVfFjG.5ZuE0gwATr9az7uz0fMlehfbTg5Z0uq', '123', '100', 'Valid', '2021-07-28', 'Super Admin', '2021-07-26 02:54:06', '2021-07-26 02:54:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD UNIQUE KEY `staff_email_unique` (`email`);

--
-- Indexes for table `used_vouchers`
--
ALTER TABLE `used_vouchers`
  ADD UNIQUE KEY `used_vouchers_voucher_id_unique` (`voucher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_voucher_code_unique` (`voucher_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
