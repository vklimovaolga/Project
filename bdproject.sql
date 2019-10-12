-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Out-2019 às 05:43
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdproject`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(252) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `password`, `registration_date`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$.4SmsWRkOByU2MeP0uaebuUnwPyxa1qVKDYZF/OwzlN.dvFbSg7fm', '2019-09-30 18:24:44'),
(2, 'admin2', 'admin2@gmail.com', '$2y$10$dRRx.uuZ6m9Win8iidy0gOPQ8VmJ.OPftYwVzkQotxlvMe7iZsDda', '2019-09-30 20:03:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `message`, `post_date`, `parent_id`) VALUES
(2, 2, 28, 'gfg', '2019-09-30 17:35:27', 0),
(15, 2, 28, 'Hoho', '2019-09-27 18:59:48', 0),
(17, 3, 30, 'novo post de ola', '2019-09-25 18:25:51', 1),
(22, 2, 2, 'Nice', '2019-09-26 23:22:11', 0),
(23, 2, 2, 'okii', '2019-09-26 23:22:32', 0),
(26, 2, 28, 'Super novo', '2019-09-26 23:58:21', 0),
(27, 2, 32, 'Yess!! teste de comment? ', '2019-09-27 00:02:10', 0),
(28, 2, 32, 'GOOOD', '2019-09-27 00:02:17', 0),
(38, 2, 30, 'hhohoho', '2019-09-27 18:53:53', 0),
(44, 3, 2, 'Kukudfasd', '2019-09-27 19:40:32', 0),
(47, 2, 2, 'Adas', '2019-10-10 07:08:07', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `image`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(2, 'New Project', '20190923002410_333015.png', 'asdffffff', '2019-09-20 20:24:15', '2019-09-27 19:02:11', 3),
(28, 'Titulo xpto', '20190927003534_658554.png', 'Super novo ', '2019-09-25 00:26:14', '2019-09-26 22:35:34', 2),
(30, 'title 2 ', '20190927003441_573713.png', 'Algo novo bahh', '2019-09-25 17:47:17', '2019-09-26 22:34:41', 2),
(32, 'Teste uper case', '20190927020145_755679.png', 'Hummm', '2019-09-27 00:01:45', '0000-00-00 00:00:00', 2),
(41, 'Asdfadsd', '20191009105711_271682.png', 'Sssddd', '2019-09-30 04:00:53', '2019-10-09 08:57:11', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profiles`
--

INSERT INTO `profiles` (`profile_id`, `description`, `url`, `picture`, `created_at`, `user_id`) VALUES
(1, 'Lalalala', 'asdf    ', '20190930040417_248188.png', '2019-09-30 02:04:17', 2),
(2, '333333333333333', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '20190922155635_136232.png', '2019-09-22 13:56:35', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(252) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `registration_date`) VALUES
(1, 'olga', 'olga@gmail.com', '$2y$10$PLy6jpYVF/qA/Ee9UZc8N.9lkVBnLmPndbxqwvjiCkjnTr/SgEiJK', '2019-09-27 19:55:08'),
(2, 'maria', 'maria@gmail.com', '$2y$10$PLy6jpYVF/qA/Ee9UZc8N.9lkVBnLmPndbxqwvjiCkjnTr/SgEiJK', '2019-09-10 19:10:42'),
(3, 'ola', 'ola@gmail.com', '$2y$10$Th43E113Vdw1NvQuOVGfgO8rAvvrIYNyBlr8ltv9gktOx1Qawhgky', '2019-09-22 13:52:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
