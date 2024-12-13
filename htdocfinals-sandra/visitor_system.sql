-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 03:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires`, `created_at`) VALUES
(1, 'ghesandraperlas@yahoo.com', '859933743a55b00084c7fe772e042a228b8d8cd1e79a72bc2ea250b1fbbeb78931b7840ee86c20cbf934fbdbd8f562536639', 1731544206, '2024-11-14 00:00:06'),
(2, 'ghesandraperlas@yahoo.com', '14e191cbb72ab87b51dc62dca8861153f6c74989998a501519f578491f357c4fce543886f8f8487e55d744ca0467f920eed1', 1731544395, '2024-11-14 00:03:15'),
(3, 'ghesandraperlas@yahoo.com', '29514690bd21c3f250a82ae4900c9e3e197fa2fda2779eb1d88af24f39252eaa203dbac9c518fb6a0d938299e2182a3a93c6', 1731544399, '2024-11-14 00:03:19'),
(4, 'ghesandraperlas@yahoo.com', '3d501f5d74aeb6e8d1563fe0b41284ecf8298a568e5df0e642ca5acf6280f7a77f2b0ba202d6538355d8a2a0d4047619ad3c', 1731544439, '2024-11-14 00:03:59'),
(5, 'ghesandraperlas@yahoo.com', '52bc238913820bac19e2797483278e77988bf4914094c08327d533a60a9d5b17dc191e2bc4b0fe3145caa90ba7801976ebb2', 1731544478, '2024-11-14 00:04:38'),
(6, 'ghesandraperlas@yahoo.com', 'ea5b005c9b672ba4efd0ec8621068c79512a4fb5c50e769e36cb15d833a974c5e96c0851d695dda7865f0038ff65b41a302e', 1731544559, '2024-11-14 00:05:59'),
(7, 'it2208.pura@gmail.com', 'c9f505b98490cb52d30e413cf3af5add43409f43efe81cd36eedcf47e6c40abcb96dba7aac37b2c9475e29993407f47cf98f', 1731544578, '2024-11-14 00:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `reset_token`, `reset_token_expiry`) VALUES
(1, 'selingaccts_ph', 'it2208.pura@gmail.com', '$2y$10$qvX3es5rBy7sJtwbXGWPpuh2XGdvbUbq9nn4Op.y3VT4Kgw93Tvde', '2024-11-12 03:23:54', NULL, NULL),
(2, 'sandraperlas', 'ghesandraperlas@yahoo.com', '$2y$10$zrCu5FeVEzvs4IDkGCawtuXrveHL..0AXhL7/tDJKEP0Raauzaz/q', '2024-11-12 03:25:37', NULL, NULL),
(3, 'ASDFGHB', 'it22SS08.pura@gmail.com', '$2y$10$hkg7Jfztm3VXYXTIUTnltO4gQtRh2BXRojdn6KyFIn2e2R4ZgLRfG', '2024-11-12 03:28:14', NULL, NULL),
(4, 'testestest', 'it22S555S08.pura@gmail.com', '$2y$10$r0PDuaBUrUsjb.VK04kC5ukTGVUg3hhCJEo/Ykz9jgooGXmAWzxzm', '2024-11-12 03:30:30', NULL, NULL),
(5, 'huahsi', 'huahshi@gmail.com', '$2y$10$.UoIKYUQsZt3JQMWbZTeMupumDBBcQL5VKaooJJad8n6XDxOaShGS', '2024-11-12 05:15:09', NULL, NULL),
(6, 'selingaccts_phqq', 'kdcbzi@inuyasha.site123', '$2y$10$mQFzK8kajFxVoxTrIRsMLeaxvI6miZ26E3xnvIEqSnHW.0gapkE2a', '2024-11-12 05:57:03', NULL, NULL),
(7, 'scrunchiefy.cos@gmail.com', 'ngco@aimery.lol', '$2y$10$13qEfOplQUrMIM5PgkjTJeBXgxY2tYHRYAOhgo9AyzZWNfYHLYiLK', '2024-11-14 00:24:52', NULL, NULL),
(8, 'coleem', 'coleen@gmail.com', '$2y$10$CJEJD16Oc3uez3vW7jWHyuGU9KhSFsMbpg/cLDf9t.UVdALERRM3C', '2024-11-14 00:39:02', NULL, NULL),
(9, 'visitor04', 'system.bsit04@gmail.com', '$2y$10$5x9jR4/m.m5Fm4Fpemckpuh7fdrJk1QxK7wxNquZuiBI0cJVrkFPS', '2024-11-14 01:01:40', '97b98f06c5d1e8c83185d653101c81c8', '2024-11-14 04:24:41'),
(10, 'peter', 'mika@gmail.com', '$2y$10$kOn8nMq/IEOGtAnrlXwwB.JtOw1.qZ6q4dVymys5E35ZF5m0dR82e', '2024-11-14 02:23:34', '55b502af46faad78e38cbac5d0d61d85', '2024-11-14 04:24:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
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
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
