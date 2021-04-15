-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 11:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_ID` int(11) NOT NULL,
  `project_name` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_ID` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_ID` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `executant` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(50) COLLATE utf16_lithuanian_ci NOT NULL,
  `password` varchar(50) COLLATE utf16_lithuanian_ci NOT NULL,
  `email` varchar(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf16_lithuanian_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`, `email`, `first_name`, `last_name`) VALUES
('AdminAdmin', 'Password129', 'admin@admin.com', 'Admin', 'Admin'),
('Test932', 'Password439', 'test@test.com', 'Test', 'Test'),
('Testuotojas', 'Testuoju112', 'testuoju@test.com', 'Testuotojas', 'Testaitis');

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
  MODIFY `priority_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_ID` int(11) NOT NULL AUTO_INCREMENT;

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
