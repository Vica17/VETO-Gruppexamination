-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 17, 2018 at 03:58 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `veto`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `entryID` int(11) NOT NULL,
  `content` varchar(250) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `entryID`, `content`, `createdBy`, `createdAt`) VALUES
(3, 1, 'THIS IS not A COMMENT', 2, '2018-05-17 14:51:13'),
(4, 1, 'THIS IS A COMMENT', 2, '2018-05-17 15:01:03'),
(5, 1, 'THIS IS A COMMENT DEAL WITH IT', 1, '2018-05-17 15:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `entryID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`entryID`, `title`, `content`, `createdBy`, `createdAt`) VALUES
(1, 'This is title!', 'kuhsdkubsdkuhsdfjnsdfjlnsdkjndsnjksdjknsdjknsdjnk', 1, '2018-05-16 07:18:39'),
(2, 'This is the second entry!', 'lorem ipsum dolor sit amet. ', 1, '2018-05-16 07:35:00'),
(3, 'This is the third entry!', 'Lorem ipsum dolor sit amet 2!', 2, '2018-05-14 09:00:00'),
(4, 'THIS IS THE TIRLE', 'CONTENT', 1, '2018-05-17 12:08:05'),
(5, 'THIS IS THE TIRLE', 'CONTENT', 1, '2018-05-17 12:08:10'),
(6, 'THIS IS THE TIRLE', 'CONTENT', 1, '2018-05-17 14:10:30'),
(7, 'THIS IS THE TIRLE', 'CONTENT', 1, '2018-05-17 14:10:34'),
(8, 'THIS IS THE TIRLE', 'CONTENT', 1, '2018-05-17 14:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likeID` int(11) NOT NULL,
  `entryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likeID`, `entryID`, `userID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `createdAt` datetime NOT NULL,
  `isAdmin` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `createdAt`, `isAdmin`) VALUES
(1, 'test', '$2y$10$H2wKvm8BEdn0BhKk5L9yyOQXqa1yxVcjn76BqNj2rEknGaTAyZPpy', '0000-00-00 00:00:00', 1),
(2, 'elli', '$2y$10$28subD0bI/tSHxvhI2oW6e9etVd7QSR66cAl7p1rEgdx2GwOfBrOq', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`entryID`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `entryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
