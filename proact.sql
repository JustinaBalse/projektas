-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 09:41 AM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u787068011_proact`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_journal`
--

CREATE TABLE `log_journal` (
  `event_ID` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `task` int(11) DEFAULT NULL,
  `user` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `event_time` datetime NOT NULL,
  `event` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `log_journal`
--

INSERT INTO `log_journal` (`event_ID`, `project`, `task`, `user`, `event_time`, `event`) VALUES
(1, 74, 0, 'admin@admin.com', '2021-05-05 21:51:38', 'Project was added'),
(2, 74, 0, 'admin@admin.com', '2021-05-05 21:51:43', 'Project was deleted'),
(3, 16, 0, 'admin@admin.com', '2021-05-05 21:51:49', 'Project was edited'),
(4, 1, 72, 'admin@admin.com', '2021-05-05 21:52:20', 'Task was added'),
(5, 1, 72, 'admin@admin.com', '2021-05-05 21:52:24', 'Task was edited: status was changed to DONE'),
(6, 1, 66, 'admin@admin.com', '2021-05-05 21:52:28', 'Task was edited'),
(7, 1, 72, 'admin@admin.com', '2021-05-05 21:52:31', 'Task was deleted'),
(8, 73, NULL, 'alex@mail.lt', '2021-05-06 05:17:54', 'Project was deleted'),
(9, 75, NULL, 'bandymas@bandymas.lt', '2021-05-06 09:14:14', 'Project was added'),
(10, 75, NULL, 'bandymas@bandymas.lt', '2021-05-06 09:14:24', 'Project was edited'),
(11, 75, NULL, 'bandymas@bandymas.lt', '2021-05-06 09:14:31', 'Project was deleted'),
(12, 1, 73, 'bandymas@bandymas.lt', '2021-05-06 09:14:37', 'Task was added'),
(13, 1, 73, 'bandymas@bandymas.lt', '2021-05-06 09:14:41', 'Task was edited: status was changed to IN PROGRESS'),
(14, 1, 73, 'bandymas@bandymas.lt', '2021-05-06 09:14:45', 'Task was edited'),
(15, 1, 73, 'bandymas@bandymas.lt', '2021-05-06 09:14:48', 'Task was deleted'),
(16, 76, NULL, 'admin@admin.com', '2021-05-06 09:24:02', 'Project was added'),
(17, 77, NULL, 'admin@admin.com', '2021-05-06 09:32:54', 'Project was added'),
(18, 77, 74, 'admin@admin.com', '2021-05-06 09:43:41', 'Task was added'),
(19, 78, NULL, 'testuoju@test.com', '2021-05-06 11:15:57', 'Project was added'),
(20, 78, NULL, 'testuoju@test.com', '2021-05-06 11:17:51', 'Project was edited'),
(21, 78, NULL, 'testuoju@test.com', '2021-05-06 11:18:45', 'Project was deleted'),
(22, 18, 75, 'bandymas@bandymas.lt', '2021-05-06 11:20:26', 'Task was added'),
(23, 18, 75, 'bandymas@bandymas.lt', '2021-05-06 11:21:01', 'Task was edited'),
(24, 18, 75, 'bandymas@bandymas.lt', '2021-05-06 11:21:12', 'Task was deleted'),
(25, 1, 76, 'bandymas@bandymas.lt', '2021-05-06 11:28:57', 'Task was added'),
(26, 1, 76, 'bandymas@bandymas.lt', '2021-05-06 11:29:32', 'Task was deleted'),
(27, 1, 66, 'bandymas@bandymas.lt', '2021-05-06 11:31:59', 'Task was deleted'),
(28, 1, 77, 'bandymas@bandymas.lt', '2021-05-06 11:36:59', 'Task was added'),
(29, 1, 78, 'bandymas@bandymas.lt', '2021-05-06 11:42:13', 'Task was added'),
(30, 1, 79, 'bandymas@bandymas.lt', '2021-05-06 14:42:51', 'Task was added'),
(31, 1, 80, 'bandymas@bandymas.lt', '2021-05-06 11:43:41', 'Task was added'),
(32, 79, NULL, 'bandymas@bandymas.lt', '2021-05-06 11:52:06', 'Project was added'),
(33, 80, NULL, 'admin@admin.com', '2021-05-06 12:29:37', 'Project was added'),
(34, 81, NULL, 'admin@admin.com', '2021-05-06 13:50:19', 'Project was added'),
(35, 82, NULL, 'admin@admin.com', '2021-05-06 13:51:52', 'Project was added'),
(36, 1, 77, 'admin@admin.com', '2021-05-06 14:03:28', 'Task was edited: status was changed to IN PROGRESS'),
(37, 1, NULL, 'alex@mail.lt', '2021-05-06 14:44:55', 'Project was edited'),
(38, 1, 78, 'bandymas@bandymas.lt', '2021-05-06 14:48:11', 'Task was deleted'),
(39, 1, NULL, 'alex@mail.lt', '2021-05-06 15:22:32', 'Project was edited'),
(40, 83, NULL, 'admin@admin.com', '2021-05-06 15:29:43', 'Project was added'),
(41, 1, 80, 'admin@admin.com', '2021-05-06 15:35:46', 'Task was edited'),
(42, 1, 79, 'admin@admin.com', '2021-05-06 18:53:05', 'Task was edited'),
(43, 82, NULL, 'admin@admin.com', '2021-05-06 18:53:49', 'Project was deleted'),
(44, 84, NULL, 'testuoju@test.com', '2021-05-06 19:47:15', 'Project was added'),
(45, 84, NULL, 'testuoju@test.com', '2021-05-06 19:48:16', 'Project was edited'),
(46, 84, NULL, 'testuoju@test.com', '2021-05-06 19:48:36', 'Project was deleted'),
(47, 1, 81, 'test@test.com', '2021-05-06 19:49:25', 'Task was added'),
(48, 1, 81, 'test@test.com', '2021-05-06 19:49:45', 'Task was edited: status was changed to IN PROGRESS'),
(49, 1, 81, 'test@test.com', '2021-05-06 19:50:02', 'Task was deleted'),
(50, 1, 79, 'admin@admin.com', '2021-05-06 20:21:59', 'Task was edited'),
(51, 1, 79, 'admin@admin.com', '2021-05-06 20:22:07', 'Task was edited: status was changed to IN PROGRESS'),
(52, 1, 79, 'admin@admin.com', '2021-05-06 20:22:15', 'Task was edited: status was changed to TO DO'),
(53, 1, 80, 'bandymas@bandymas.lt', '2021-05-06 20:30:39', 'Task was edited: status was changed to IN PROGRESS'),
(54, 1, 80, 'bandymas@bandymas.lt', '2021-05-06 20:30:47', 'Task was edited: status was changed to TO DO'),
(55, 38, 82, 'admin@admin.com', '2021-05-06 20:37:51', 'Task was added'),
(56, 2, 62, 'admin@admin.com', '2021-05-06 20:42:12', 'Task was edited: status was changed to IN PROGRESS'),
(57, 2, 64, 'admin@admin.com', '2021-05-06 20:45:30', 'Task was edited: status was changed to DONE'),
(58, 2, 64, 'admin@admin.com', '2021-05-06 20:45:42', 'Task was edited: status was changed to TO DO'),
(59, 2, 64, 'admin@admin.com', '2021-05-06 20:45:51', 'Task was edited'),
(60, 2, 64, 'admin@admin.com', '2021-05-06 20:45:57', 'Task was edited: status was changed to DONE'),
(61, 16, NULL, 'admin@admin.com', '2021-05-06 20:46:10', 'Project was edited'),
(62, 8, 83, 'admin@admin.com', '2021-05-06 20:46:29', 'Task was added'),
(63, 8, 84, 'admin@admin.com', '2021-05-06 20:46:40', 'Task was added'),
(64, 8, 85, 'admin@admin.com', '2021-05-06 20:46:50', 'Task was added'),
(65, 8, 83, 'admin@admin.com', '2021-05-06 20:47:01', 'Task was edited: status was changed to IN PROGRESS'),
(66, 8, 85, 'admin@admin.com', '2021-05-06 20:47:08', 'Task was edited: status was changed to IN PROGRESS'),
(67, 8, 83, 'admin@admin.com', '2021-05-06 20:47:13', 'Task was edited: status was changed to DONE'),
(68, 8, 84, 'admin@admin.com', '2021-05-06 20:47:19', 'Task was edited: status was changed to DONE'),
(69, 8, 85, 'admin@admin.com', '2021-05-06 20:47:24', 'Task was edited: status was changed to DONE'),
(70, 8, 83, 'admin@admin.com', '2021-05-06 20:47:31', 'Task was edited: status was changed to IN PROGRESS'),
(71, 8, 84, 'admin@admin.com', '2021-05-06 20:47:39', 'Task was edited: status was changed to IN PROGRESS'),
(72, 8, 85, 'admin@admin.com', '2021-05-06 20:47:44', 'Task was edited: status was changed to IN PROGRESS'),
(73, 8, 83, 'admin@admin.com', '2021-05-06 20:48:33', 'Task was edited: status was changed to DONE'),
(74, 8, 84, 'admin@admin.com', '2021-05-06 20:48:38', 'Task was edited: status was changed to TO DO'),
(75, 8, 85, 'admin@admin.com', '2021-05-06 20:48:44', 'Task was edited: status was changed to DONE'),
(76, 8, 83, 'admin@admin.com', '2021-05-06 20:49:04', 'Task was edited: status was changed to TO DO'),
(77, 1, 2, 'admin@admin.com', '2021-05-07 09:38:32', 'Task was edited'),
(78, 81, NULL, 'admin@admin.com', '2021-05-07 14:07:01', 'Project was deleted'),
(79, 1, 79, 'admin@admin.com', '2021-05-07 19:46:57', 'Task was edited'),
(80, 47, NULL, 'admin@admin.com', '2021-05-07 19:47:26', 'Project was deleted'),
(81, 83, NULL, 'admin@admin.com', '2021-05-11 09:04:57', 'Project was deleted');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `priority_ID` int(11) NOT NULL,
  `priority` varchar(20) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`priority_ID`, `priority`) VALUES
(1, 'Low'),
(2, 'Medium'),
(3, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_ID` int(11) NOT NULL,
  `project_name` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_ID`, `project_name`, `status`, `description`) VALUES
(1, 'Pasaulio užkariavimas1', 2, 'Poros baltų pelių planas užvaldyti pasaulį. Krep&scaron;t!!!'),
(2, 'Pasodink medį', 2, '100 medžių sodinimas.'),
(8, '&lt;script&gt;alert(document.cookie)&lt;/script&gt;', 2, 'Test Test Test z'),
(16, '&lt;script&gt;alert(document.cookie)&lt;/script&gt;', 2, 'vulnerability of the XSS attackd'),
(18, 'Vienas namuose', 2, 'Smagios veiklos vieniems namuose'),
(19, 'Helloo', 2, 'Test Test'),
(21, 'goo', 2, 'gg'),
(23, '///', 2, '@@@'),
(27, 'aa', 2, ''),
(35, '   ', 1, ''),
(37, '   aaa', 2, 'test'),
(38, '   aaa', 3, 'test'),
(41, '___', 2, '...'),
(42, 'Test', 3, ''),
(49, '&lt;h1&gt;hacked&lt;/h1&gt;', 2, ''),
(50, '&lt;h1&gt;labas&lt;/h1&gt;', 2, '&lt;h1&gt;labas&lt;/h1&gt;'),
(51, 'bandymas', 2, ''),
(53, '&lt;script&gt;alert(document.cookie)&lt;/script&gt;', 2, '&lt;h1&gt;test&lt;/h1&gt;'),
(55, '&lt;h1&gt; test &lt;/h1&gt;', 2, ''),
(56, '&lt;script&gt;alert(document.cookie)&lt;/script&gt;', 2, ''),
(63, 'TESTAS1', 2, ''),
(68, 'Projektas', 2, 'Geras projektas.'),
(69, '<h1>la</h1>', 2, ''),
(70, '%3cscript%3ealert(\"hello\")%3c/script%3e', 2, '%3cscript%3ealert(\"hello\")%3c/script%3e'),
(71, '<script>alert(\"hello\")</script>', 2, ''),
(72, '444', 2, ''),
(76, 'testAS', 2, ''),
(77, 'UTUIIOUOP', 2, ''),
(79, '222', 2, ''),
(80, '654', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_ID` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_ID`, `status`) VALUES
(1, 'TO DO'),
(2, 'IN PROGRESS'),
(3, 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_ID` int(11) NOT NULL,
  `title` varchar(70) COLLATE utf16_lithuanian_ci NOT NULL,
  `description` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `update_date` date DEFAULT NULL,
  `executant` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_ID`, `title`, `description`, `priority`, `project`, `status`, `start_date`, `update_date`, `executant`) VALUES
(1, 'Atidarymas', 'atidaryti narvelį', 3, 1, 3, '2021-04-19', '2021-05-03', 'admin@admin.com'),
(2, 'Laukimas', 'palaukti nakties ', 1, 1, 3, '2021-04-19', '2021-05-07', 'admin@admin.com'),
(32, '123', '', 1, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(35, 'abc', 'boundaries', 1, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(39, 'Test', 'Test', 2, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(40, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nulla.', '70 simboliu', 1, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(41, 'LLorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nulla', '71 simbolis', 3, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(42, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vitae s', 'labai daug simboliu', 1, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(43, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue, augue ac ultricies condimentum, nisi lorem gravida urna, nec tempus libero urna vel metus. In semper porta turpis non porttitor. Sed morbi.', 1, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(44, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec congue, augue ac ultricies condimentum, nisi lorem gravida urna, nec tempus libero urna vel metus. In semper porta turpis non porttitor. Sed morbi.', 1, 42, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(46, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer conva', ',', 1, 21, 3, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(47, 'orem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at la', '', 1, 21, 1, '2021-04-28', NULL, 'admin@admin.com'),
(48, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Inokooooooooo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis, leo a lobortis mollis, orci eros pellentesque ligula, eu placerat metus dolor ut justo. Donec sodales magna at lobortis faucibus donec', 2, 21, 1, '2021-04-28', '2021-04-28', 'admin@admin.com'),
(59, '080', '89', 2, 21, 2, '2021-04-29', '2021-04-29', 'admin@admin.com'),
(62, 'tralialia', 'Lia lia.', 1, 2, 2, '2021-04-30', '2021-05-06', 'bandymas@bandymas.lt'),
(63, 'Tindi rindi', 'Tram pam pam pam', 2, 2, 1, '2021-04-30', '2021-05-01', 'bandymas@bandymas.lt'),
(64, '&Scaron;okiai.', 'Kas kaip moka, tas taip &scaron;oka.', 2, 2, 3, '2021-04-30', '2021-05-06', 'bandymas@bandymas.lt'),
(74, 'kgkjhkjhl', '', 1, 77, 1, '2021-05-06', NULL, 'admin@admin.com'),
(77, '555', '', 1, 1, 2, '2021-05-06', '2021-05-06', 'bandymas@bandymas.lt'),
(79, '666', '', 3, 1, 1, '2021-05-06', '2021-05-07', 'bandymas@bandymas.lt'),
(80, '333', '', 1, 1, 1, '2021-05-06', '2021-05-06', 'bandymas@bandymas.lt'),
(82, 'fffff', '', 1, 38, 3, '2021-05-06', NULL, 'admin@admin.com'),
(83, '%%%', '', 1, 8, 1, '2021-05-06', '2021-05-06', 'admin@admin.com'),
(84, '%%%', '', 1, 8, 1, '2021-05-06', '2021-05-06', 'admin@admin.com'),
(85, '%%%', '', 1, 8, 3, '2021-05-06', '2021-05-06', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(50) COLLATE utf16_lithuanian_ci NOT NULL,
  `password` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf16_lithuanian_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`, `email`, `first_name`, `last_name`) VALUES
('AdminAdmin', '$2y$10$13fvkzO8jxaeUx21Vtu.veGST0L4HctEFczJX/61PO5aOUr1Nenay', 'admin@admin.com', 'Admin', 'Admin'),
('alex1', '$2y$10$3WMILbID6OnL.NVZeMWhieeCEZu33cTPMV/WfrBaBSxK6mLcv4Im.', 'alex@mail.lt', '', ''),
('alex2', '$2y$10$TLmnP.jBNR.NutPkYgtLsO8Ji4hOA2EjF7McJZ7DPlMpQh8/nw9jG', 'alex2@mail.lt', '', ''),
('alex20', '$2y$10$DO5HFZ6uhBBDCwGRHpiNAOwJjYTa4UhePhbONsnk/3BdyVqPlNlum', 'alex20@mail.com', '', ''),
('Bandymas', '$2y$10$lnHUMNXWZYAz7DWcvVWLt.H7eBuY7mNdUt37snuU6LEHupAnbrDKS', 'bandymas@bandymas.lt', 'Bandana', 'Bandanauskas'),
('Bandymas1234', '$2y$10$j3vMvasiLEVK48l6zbHffOkWZfiBikc4YZSh46zem6wEMqXC.K8je', 'bandymas123@bandymas.lt', 'Bandymas1234', 'Bandymas1234'),
('Testas12uu3456780', '$2y$10$OFV6.ka16/dXxDoRXQi5FOP9sE3nyNHSuNYjNCEv7GiKMwHVuzSX2', 'email@[120.123.123.123]', '', ''),
('Testas123456789eii', '$2y$10$a2h3KHnhBBQiWJAgnUc2uOXfsQ6w2Ot4NDO0zWyn7cluGM4ARUnrm', 'email@[123.123.123.123]', '', ''),
('fwrefgergrge', '$2y$10$lRiA1rCQ8O.Ys7VkJJ0EROJ8HtagiDt93fCVBN1WHmZM6m.TWpF.2', 'email@[123.133.123.123]', '', ''),
('Testas123456789e', '$2y$10$PId2I/YAJ74t5sELkGKFnOTW98FKvu9JSDjIzfnty2Rwg7jiplWK2', 'email@example.web', '', ''),
('zaqwsxcde', '$2y$10$8Txv057i2op7mZ2QHw955uLYdORkLw25Jofo/TrdoJfxmtDqICQOm', 'email@myexample.web', '', ''),
('tgr44444', '$2y$10$1TjuATOXBVGn/Qr/yawpMenOls51bQMqG.oV/hkqdI79Yg1XiBAZy', 'myemail@example.web', '', ''),
('rfrffrrfrf', '$2y$10$YXgCl2Yw1EtQhRN3TpQHru1ZBdt6L/3E5J79L4vtZoc87I7yaaf5C', 'newemail@example.web', '', ''),
('Testas123456780fdfd', '$2y$10$KUl9QOQc3cvzgt7xAE5NpuT16GxEMSpFIIl2Lwz/h.2Orlph4mumW', 'tefdsfst@gmail.com', '', ''),
('Testaujnys123456789', '$2y$10$6IAFTUNZ4sUzONtNukkaIenrjWtNhR7HuUGGLAraTPBddhid.eAcC', 'tesbhgqpnut@gmail.com', '', ''),
('Testas123456780rer', '$2y$10$DnDzvtocuc/J0bDpVA4kO.KndfGmWFbcQH8o/p5GM9oo8sgn1GcRi', 'tesdsdsdt@gmail.com', '', ''),
('hjkdshfklnelkf', '$2y$10$otTcImCxUh05oP5yogifXOHUpaboKxO8sz4leP1rojIFscFcAH/oW', 'tesfdsfhdot@yahoo.com', '', ''),
('Testas123456789fdsfsd', '$2y$10$4/0P5O3Y0VX0ip3LRhQxF.Ite79UBCefDTT1v/WmVLqQo9fMBxQnG', 'tesfefst@gmail.com', '', ''),
('Testas1uju23456789e', '$2y$10$36RDeWW0AVBcUJMjjzvQGOLQ1rkF.FFDTObaj8m1rVxcCNxgCPDgq', 'teshbhbhjt@yahoo.com', '', ''),
('Testas12ikjuj3456780e', '$2y$10$N2HIXv/.PmyQoy7ssJgSYefkoj/2YG5v9cunRm9ReVQDcD4N/0Pm6', 'tesyhbuoxwt@yahoo.com', '', ''),
('jghkjk', '$2y$10$k1gOX0Evdqt3/MNG1DsSp.qK0j3eNlfDaXBshwRTRPWFZPUUgz3Gu', 'tesjvbjbkjt@gmail.com', '', ''),
('qwerddff', '$2y$10$CF7dfi3qxk.AJPbHmHJzVux7wo8dDrKVkV2V24FYL8RQsvekhb60C', 'tesrrrt@yahoo.com', '', ''),
('Testas123456789', '$2y$10$vJgxhELSrPCa50munoIjTei9fxMSDVvLcoW9plzG6.KK0fgic/rtK', 'test@gmail.com', 'Testas', 'Testuotojas'),
('Testas123456780', '$2y$10$doupOuR77jp7xyguXpiqcO3qmZrGt1Xrj7Hn51Gg7UJ2FStzuxanS', 'test@yahoo.com', '', ''),
('Test932', '$2y$10$IGvMcXDCWVsjMxjX02e8WOaLZ4YrrY/ZX1Ddy3YZ3UjjynZOm73Wq', 'test@test.com', 'Test', 'Test'),
('Testas1jhyuj23456789', '$2y$10$.RkytbWnTxCUj562vOulB.5lWYQVoxIWl/aKoB/DMSmnE/0z3haX2', 'testastestastestasm@yahoo.com', '', ''),
('Testas123456780fdf', '$2y$10$WhOr7viMujmqznDIN4zlBeu6PgitGxEMw9Q5E0CMkqLS/ER4tOP/y', 'testfsfs@yahoo.com', '', ''),
('Testas12uju3456789', '$2y$10$Mie/smpjeusmWVlO0pUl3eQz3rm1Bu4YNHWJwjGzSMjG0ffrzIo..', 'testgyg@yahoo.com', '', ''),
('Testuotojas', '$2y$10$t2xxvMc3usc9JyfCctTNnenJIvWn9NMPogAJmdhXtI4BktdD3oIye', 'testuoju@test.com', 'Testuotojas', 'Testaitis'),
('Testas123456780qqq', '$2y$10$ILuOGpfXaX0HD1x0Q7KSt.nnGKWsf6VlVx7DI.1R//HI/D8rygbam', 'testwewew@yahoo.com', 'Testas', 'Testuotojas'),
('Testas123456789nju', '$2y$10$9sJDtYZb3Vjm.KKfiHKp6.IuAv/3579D13.gGkIOxxXbDPfxxPV1u', 'teujmst@yahoo.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE `user_projects` (
  `email` varchar(100) CHARACTER SET utf16 COLLATE utf16_lithuanian_ci NOT NULL,
  `project_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_projects`
--

INSERT INTO `user_projects` (`email`, `project_ID`) VALUES
('admin@admin.com', 1),
('admin@admin.com', 21),
('admin@admin.com', 42),
('bandymas@bandymas.lt', 1),
('bandymas@bandymas.lt', 2),
('bandymas@bandymas.lt', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_journal`
--
ALTER TABLE `log_journal`
  ADD PRIMARY KEY (`event_ID`),
  ADD KEY `log_journal_fk0` (`project`),
  ADD KEY `log_journal_fk1` (`task`),
  ADD KEY `log_journal_fk2` (`user`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`priority_ID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_ID`),
  ADD KEY `projects_fk0` (`status`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_ID`),
  ADD KEY `tasks_fk0` (`priority`),
  ADD KEY `tasks_fk1` (`project`),
  ADD KEY `tasks_fk2` (`status`),
  ADD KEY `tasks_fk3` (`executant`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `user_projects`
--
ALTER TABLE `user_projects`
  ADD UNIQUE KEY `uq_emailProj` (`email`,`project_ID`),
  ADD KEY `user_projects_ibfk_1` (`project_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_journal`
--
ALTER TABLE `log_journal`
  MODIFY `event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `priority_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_fk0` FOREIGN KEY (`status`) REFERENCES `statuses` (`status_ID`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_fk0` FOREIGN KEY (`priority`) REFERENCES `priorities` (`priority_ID`),
  ADD CONSTRAINT `tasks_fk1` FOREIGN KEY (`project`) REFERENCES `projects` (`project_ID`),
  ADD CONSTRAINT `tasks_fk2` FOREIGN KEY (`status`) REFERENCES `statuses` (`status_ID`),
  ADD CONSTRAINT `tasks_fk3` FOREIGN KEY (`executant`) REFERENCES `users` (`email`);

--
-- Constraints for table `user_projects`
--
ALTER TABLE `user_projects`
  ADD CONSTRAINT `user_projects_ibfk_1` FOREIGN KEY (`project_ID`) REFERENCES `projects` (`project_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
