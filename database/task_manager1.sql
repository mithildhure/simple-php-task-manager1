-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2025 at 11:06 AM
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
-- Database: `task_manager1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `t_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_title` varchar(40) DEFAULT NULL,
  `task_desc` varchar(150) DEFAULT NULL,
  `task_deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`t_id`, `user_id`, `task_title`, `task_desc`, `task_deadline`) VALUES
(1, 1, 'PHP Project', 'Php project with fully functional backend and crud operation with register login and form validation too', '2025-11-24'),
(2, 3, 'Query Selector', 'Javascript Query Selector lets see', '2025-11-23'),
(6, 3, 'Php Submission', 'Submit Php project on github with readme files', '2025-11-23'),
(7, 4, 'Exam Prep', 'Exam Preparation for upcoming certificates', '2025-11-25'),
(8, 3, 'Lbs Question set 1', 'JS assignment, 25 questions, classwork 1,2,3', '2025-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `password`, `email`) VALUES
(1, 'dummy', 'dummy123', 'dummy@gmail.com'),
(2, 'arthurmorgan', '$2y$10$k4Mmd2X00W7aZZsISmdqL.gwZ8UbHz4mRcifRy94nGtQS1XZqyHe.', 'arthur@gmail.com'),
(3, 'Tommy', '$2y$10$a5r4zN4XOvkyppVZ2sUSCe7NdtVQcyZOpRah.J2FX/FP0.O4rsphW', 'tommy@gmail.com'),
(4, 'pranavdhure', '$2y$10$Aec0i.r2H81xPg7H/0OL1eLdpmg1FUBplFDuLtCouAuuMeCY/s32m', 'pranav@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
