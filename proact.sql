-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 09:25 AM
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
-- Database: `proact`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_journal`
--

CREATE TABLE `log_journal` (
  `event_ID` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `task` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `event_time` datetime NOT NULL,
  `event` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

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
(1, 'Pasaulio užkariavimas ', 1, 'Poros baltų pelių planas užvaldyti pasaulį. Krepšt!'),
(2, 'Pasodink medį', 1, '100 medžių sodinimas.'),
(3, 'Katiniukų glostymas', 2, 'Visų pasaulio katiniukų paglostimas'),
(5, 'Varnų skaičiavimas', 1, 'Tarptautinis žiopsojimo turnyras 2021'),
(6, 'Bandymas23', 1, 'Ivesti naują projektąl'),
(8, 'Test', 1, 'Test Test Test '),
(9, '🙃 🙃 🙃', 1, '🙃'),
(10, 'https://www.wikipedia.org', 1, ''),
(11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas nam.', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam finibus sed massa a pretium. Donec et nunc tincidunt, euismod urna ac, bibendum tortor. Cras in mauris tristique, sodales velit id, tincidunt lorem. '),
(12, 'New Folder 21', 1, 'Dar vienas bandymas'),
(14, 'aaab', 1, 'ss'),
(15, '   ', 1, '%'),
(16, '<script>alert(‘XSS’)</script>', 1, 'vulnerability of the XSS attack'),
(17, '___', 1, '<script>alert(‘XSS’)</script>\r\n...'),
(18, 'Vienas namuose', 1, 'Smagios veiklos vieniems namuose');

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
(1, 'TODO'),
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
(1, 'Atidarymas', 'atidaryti narvelį', 3, 1, 1, '2021-04-19', '2021-04-19', 'admin@admin.com'),
(2, 'Laukimas', 'palaukti nakties ', 1, 1, 2, '2021-04-19', '2021-04-19', 'admin@admin.com'),
(3, 'Skirstymas', 'Suskirstyti katiniukus pagal spalvą', 1, 3, 2, '2021-04-19', '2021-04-19', 'admin@admin.com');

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
('Bandymas', '$2y$10$lnHUMNXWZYAz7DWcvVWLt.H7eBuY7mNdUt37snuU6LEHupAnbrDKS', 'bandymas@bandymas.lt', 'Bandana', 'Bandanauskas'),
('Test932', '$2y$10$IGvMcXDCWVsjMxjX02e8WOaLZ4YrrY/ZX1Ddy3YZ3UjjynZOm73Wq', 'test@test.com', 'Test', 'Test'),
('Testuotojas', '$2y$10$t2xxvMc3usc9JyfCctTNnenJIvWn9NMPogAJmdhXtI4BktdD3oIye', 'testuoju@test.com', 'Testuotojas', 'Testaitis');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_journal`
--
ALTER TABLE `log_journal`
  MODIFY `event_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `priority_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_journal`
--
ALTER TABLE `log_journal`
  ADD CONSTRAINT `log_journal_fk0` FOREIGN KEY (`project`) REFERENCES `projects` (`project_ID`),
  ADD CONSTRAINT `log_journal_fk1` FOREIGN KEY (`task`) REFERENCES `tasks` (`task_ID`),
  ADD CONSTRAINT `log_journal_fk2` FOREIGN KEY (`user`) REFERENCES `users` (`email`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
