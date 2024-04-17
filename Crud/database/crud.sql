-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 11:32 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `DirectorID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Age` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreID` bigint(20) UNSIGNED NOT NULL,
  `Genrename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `FilmID` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(255) NOT NULL,
  `GenreID` bigint(20) NOT NULL,
  `ReleaseYear` int(11) NOT NULL,
  `Description` longtext NOT NULL,
  `PosterURL` varchar(255) NOT NULL,
  `Rating` decimal(8,2) NOT NULL,
  `MoviePath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`FilmID`, `Title`, `GenreID`, `ReleaseYear`, `Description`, `PosterURL`, `Rating`, `MoviePath`) VALUES
(2, 'Pink Panther 1', 0, 2009, 'A man with white hair who plays a detective', 'upload_posters/Pink Panther poster.jpg', 0.00, 'upload_movies/y2mate.com - The Pink Panther Official Trailer 1  Steve Martin Movie 2006 HD_480p.mp4'),
(3, 'Black Adam', 0, 2022, 'A superhero movie', 'upload_posters/black adam poster.jpg', 0.00, 'upload_movies/y2mate.com - Black Adam  Official Trailer 1_480p.mp4'),
(5, 'Extraction 2 ', 0, 2023, 'Movie about a former Australian SASR Operator turned black ops mercenary', 'upload_posters/extraction 2 poster.webp', 0.00, 'upload_movies/y2mate.com - EXTRACTION 2  Official Trailer  Netflix_480p.mp4'),
(6, 'Rush hour 2', 0, 2001, 'Movie about 2 detectives', 'upload_posters/rush hour 2.jpg', 0.00, 'upload_movies/y2mate.com - Rush Hour 2 2001 Official Trailer2  Jackie Chan Chris Tucker Movie HD_480p.mp4'),
(7, 'Roadhouse ', 0, 2023, 'Movie about a former UFC middleweight champion', 'upload_posters/roadhouse poster.webp', 0.00, 'upload_movies/y2mate.com - Road House  Official Trailer  Prime Video_480p.mp4'),
(8, 'The Dark Knight', 0, 2008, 'Movie about crime in Gotham City', 'upload_posters/the dark knight poster.jpeg', 0.00, 'upload_movies/y2mate.com - The Dark Knight 2008 Official Trailer 1  Christopher Nolan Movie HD_480p.mp4'),
(9, 'The lion king', 0, 1994, 'Movie about a lions revenge', 'upload_posters/the lion king poster.jpg', 0.00, 'upload_movies/y2mate.com - The Lion King  Original Trailer  Disney_480p.mp4'),
(10, '12th Fail', 0, 2023, 'Movie about a boy wanting to become a IPS officer', 'upload_posters/12th fail poster.cms', 0.00, 'upload_movies/y2mate.com - 12th Fail  New Trailer  A Tale Of Triumph  Vidhu Vinod Chopra  Vikrant Massey  In Cinemas Only_480p.mp4'),
(11, 'The Last Stand', 0, 2013, 'Owens, a former LAPD narcotics officer, must enlist the help of a ragtag group of his townsfolk to stop Gabriel Cortez, an international drug lord, from crossing over the border to Mexico.', 'upload_posters/the last stand poster.jpg', 0.00, 'upload_movies/y2mate.com - The Last Stand 2013  Official Trailer 1_480p.mp4'),
(12, 'Suzzanna', 0, 2018, 'After a pregnant woman is murdered, her spirit seeks revenge against her increasingly terrified killers, who are determined to finish her off for good.', 'upload_posters/Suzzanna poster.jpg', 0.00, 'upload_movies/y2mate.com - Official Trailer Extended and Uncut  Suzzanna Malam Jumat Kliwon  Nantikan di bioskop 3823_480p.mp4'),
(13, 'Sewu Dino', 0, 2023, 'Sri is tasked to do a cleansing ritual for Dela Atmojo, an unconscious girl who is suffering from 1000 days-hex. The terror begins when her friend neglects to finish the ritual. Failing until the 1000th day will result in their demise', 'upload_posters/Sewu_Dino_1.jpg', 0.00, 'upload_movies/y2mate.com - Sewu Dino  Official Trailer  LEBARAN 2023 DI BIOSKOP_480p.mp4'),
(14, 'Police Academy', 0, 1984, 'A group of good-hearted, but incompetent misfits enter the police academy, but the instructors there are not going to put up with their pranks.', 'upload_posters/police academy poster.jpeg', 0.00, 'upload_movies/y2mate.com - Police Academy 1984 Official Trailer  Steve Guttenberg Crime Comedy HD_480p.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Username` binary(16) NOT NULL,
  `UserID` bigint(20) NOT NULL,
  `RoleID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` bigint(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Username`, `EmailAddress`, `Password`) VALUES
(1, 'Adithya ', 'Uberwolf', 'adithyabinda@gmail.com', '123456'),
(2, '', '', '', ''),
(3, 'Adithya ', 'Uberwolf', 'adithyabinda@gmail.com', '123'),
(4, 'Adithya ', 'Uberwolf', 'adithyabinda@gmail.com', '123'),
(5, 'Adithya ', 'Uberwolf', 'adithyabinda@gmail.com', '123'),
(6, 'Adithya ', 'Uberwolf', 'adithyabinda@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`DirectorID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`GenreID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`FilmID`),
  ADD KEY `FilmID` (`FilmID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `DirectorID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `FilmID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
