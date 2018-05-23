-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 24, 2018 at 12:08 AM
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
(11, 11, 'This was posted with JavaScript!!!!', 1, '2018-05-21 18:07:13'),
(21, 11, 'HelloooooooO~!!', 3, '2018-05-22 11:03:03'),
(37, 19, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia vo', 1, '2018-05-23 00:57:18'),
(38, 11, 'One more time~', 1, '2018-05-23 01:02:08'),
(41, 19, 'Oke!!!\n', 2, '2018-05-23 09:19:56'),
(42, 22, 'This is a comments', 1, '2018-05-23 23:56:47'),
(45, 22, 'This is also a comment', 2, '2018-05-24 00:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `entryID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(250) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`entryID`, `title`, `content`, `createdBy`, `createdAt`) VALUES
(8, 'Updated ', 'This was once again updated with JavaScript!', 1, '2018-05-17 14:10:38'),
(11, 'This is the title', 'This data was sent with javascript and later updated', 1, '2018-05-18 14:28:39'),
(19, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 1, '2018-05-23 00:56:01'),
(22, 'This is the title!!', '... and this is the content.', 1, '2018-05-23 23:56:38'),
(23, 'This post was created by another user', 'Can you imagine?', 2, '2018-05-24 00:07:44');

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
(101, 11, 3),
(102, 23, 2);

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
(1, 'Test', '$2y$10$H2wKvm8BEdn0BhKk5L9yyOQXqa1yxVcjn76BqNj2rEknGaTAyZPpy', '0000-00-00 00:00:00', 1),
(2, 'Elli', '$2y$10$28subD0bI/tSHxvhI2oW6e9etVd7QSR66cAl7p1rEgdx2GwOfBrOq', '0000-00-00 00:00:00', 0),
(3, 'Tommy', '$2y$10$sleEzPj48ULQ4BegLkVM5O4oNcKxmHQ0O/XrnnR93HX9ZG57Cl/7K', '0000-00-00 00:00:00', 0),
(4, 'test23', '$2y$10$klFp93F7fB1vG5xRdMPobusixyPp2yJfPLqaIdGQiZn6HBsATWqMq', '0000-00-00 00:00:00', 0);

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
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `entryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
