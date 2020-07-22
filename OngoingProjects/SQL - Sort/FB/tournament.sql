-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 02:32 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: pubg
--

-- --------------------------------------------------------

--
-- Table structure for table tournament
--

CREATE TABLE tournament (
  TId int NOT NULL,
  TName varchar2(30) NOT NULL,
  StartDt date NOT NULL,
  EndDt date NOT NULL,
  Prize int NOT NULL,
  PRIMARY KEY (TId)
)

CREATE TABLE match(
  MId int NOT NULL,
  TId int,
  Player1 int,
  Player2 int,
  MatchDt date NOT NULL,
  Winner int,
  Score varchar2(30) NOT NULL,
  FOREIGN KEY (TId) REFERENCES tournament(TId),
  FOREIGN KEY (Player1) REFERENCES player(Player1),
  FOREIGN KEY (Player2) REFERENCES player(Player2),
  FOREIGN KEY (Winner) REFERENCES player(Winner),
)

--
-- Indexes for dumped tables
--

--
-- Indexes for table tournament
--
ALTER TABLE tournament
  ADD PRIMARY KEY (TId);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
