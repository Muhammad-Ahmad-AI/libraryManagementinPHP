-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 07:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_books`
--

CREATE TABLE `add_books` (
  `book_id` int(5) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_author_name` varchar(50) NOT NULL,
  `book_publication_name` varchar(50) NOT NULL,
  `book_purchase_date` date NOT NULL,
  `book_price` int(20) NOT NULL,
  `book_quantity` int(20) NOT NULL,
  `available_quantity` int(20) NOT NULL,
  `librarian_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_books`
--

INSERT INTO `add_books` (`book_id`, `book_name`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_quantity`, `available_quantity`, `librarian_username`) VALUES
(1, 'Analysis of Algorithms', 'Jeffrey J. McConnell', 'JONES AND BARTLETT PUBLISHERS', '2020-08-01', 400, 10, 10, 'admin'),
(2, 'DESIGN AND ANALYSIS OF DISTRIBUTED ALGORITHMS', 'Nicola Santoro', 'A JOHN WILEY & SONS, INC., PUBLICATION', '2020-08-02', 500, 10, 10, 'admin'),
(3, 'Android Application Development', 'Lauren Darcey ', 'Sams Teach Yourself', '2020-08-03', 600, 10, 10, 'admin'),
(4, 'Operating System Concepts', 'Galvin', 'Dan Sayre', '2020-08-04', 700, 10, 10, 'admin'),
(5, 'INTRODUCTION TO COMPUTER THEORY', 'Daniel I. A. Cohen', 'John Wiley & Sons, Inc.', '2020-08-05', 800, 10, 10, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `issue_id` int(5) NOT NULL,
  `student_uet_id` varchar(50) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_issue_date` varchar(50) NOT NULL,
  `book_return_date` varchar(50) NOT NULL,
  `librarian_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `librarian_registration`
--

CREATE TABLE `librarian_registration` (
  `librarian_username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian_registration`
--

INSERT INTO `librarian_registration` (`librarian_username`, `firstname`, `lastname`, `password`, `email`, `contact`) VALUES
('admin', 'Kashif', 'Mughal', 'admin@123', 'kashifmughal587@yahoo.com', '03000000000'),
('quiz2@gmail.com', 'quiz2', 'quiz2', 'quiz2@123', 'quiz2@gmail.com', '03000000000'),
('quiz@gmail.com', 'quiz', 'quiz', 'quiz@123', 'quiz@gmail.com', '03000000000');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(5) NOT NULL,
  `librarian_username` varchar(50) NOT NULL,
  `student_uet_id` varchar(50) NOT NULL,
  `msg_title` varchar(100) NOT NULL,
  `msg_body` varchar(500) NOT NULL,
  `msg_read` varchar(10) NOT NULL,
  `msg_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `student_uet_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `batch_no` int(5) NOT NULL,
  `department` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`student_uet_id`, `firstname`, `lastname`, `password`, `email`, `contact`, `batch_no`, `department`, `status`) VALUES
('2018-uet-shcet-lhr-cs-1@student/uet.edu.pk', 'test', 'test', 'test@123', 'test@gmail.com', '03000000000', 9, 'Computer Science', 'yes'),
('2018-uet-shcet-lhr-cs-2@student.uet.edu.pk', 'test2', 'test2', 'test@123', 'test2@gmail.com', '03000000000', 9, 'Computer Science', 'yes'),
('2018-uet-shcet-lhr-cs-3@student.uet.edu.pk', 'test3', 'test3', 'test@123', 'test3@gmail.com', '03000000000', 9, 'Computer Science', 'yes'),
('2018-uet-shcet-lhr-cs-4@student.uet.edu.pk', 'test4', 'test4', 'test@123', 'test4@gmail.com', '03000000000', 9, 'Computer Science', 'yes'),
('2018-uet-shcet-lhr-cs-5@student.uet.edu.pk', 'test5', 'test5', 'test@123', 'test5@gmail.com', '03000000000', 9, 'Computer Science', 'yes'),
('2018-uet-shcet-lhr-cs-6@student.uet.edu.pk', 'test6', 'test6', 'test@123', 'test6@gmail.com', '03000000000', 9, 'Computer Science', 'no'),
('2018-uet-shcet-lhr-cs-7@student.uet.edu.pk', 'Kashif', 'Mughal', 'test@123', 'kashifmughal587@yahoo.com', '03000000000', 9, 'Computer Science', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_books`
--
ALTER TABLE `add_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `librarian_registration`
--
ALTER TABLE `librarian_registration`
  ADD PRIMARY KEY (`librarian_username`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`student_uet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_books`
--
ALTER TABLE `add_books`
  MODIFY `book_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `issue_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
