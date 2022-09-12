-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 09:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smatk`
--

-- --------------------------------------------------------

--
-- Table structure for table `aksidentetetrafikutnekosove_smatk`
--

CREATE TABLE `aksidentetetrafikutnekosove_smatk` (
  `NumriAksidentit_SMATK` int(11) NOT NULL,
  `Lokacioni_SMATK` varchar(50) NOT NULL,
  `Koha_SMATK` date NOT NULL,
  `TeAksidentuarit_SMATK` varchar(100) NOT NULL,
  `ShkakuAksidentit_SMATK` varchar(100) NOT NULL,
  `DemetMateriale_SMATK` varchar(50) NOT NULL,
  `DemetneNjerz_SMATK` varchar(50) NOT NULL,
  `Arrestime_SMATK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aksidentetetrafikutnekosove_smatk`
--

INSERT INTO `aksidentetetrafikutnekosove_smatk` (`NumriAksidentit_SMATK`, `Lokacioni_SMATK`, `Koha_SMATK`, `TeAksidentuarit_SMATK`, `ShkakuAksidentit_SMATK`, `DemetMateriale_SMATK`, `DemetneNjerz_SMATK`, `Arrestime_SMATK`) VALUES
(1, 'Gjilan', '2022-01-01', 'Mercedes dhe Golf 4', 'Tejkalimi ne vije te plote', '100 euro', '1 i vdekur', 1),
(2, 'Prishtine', '2021-01-10', 'BMW dhe Golf 5', 'Vozitja me shpejtesi 140 km/h', '260 euro', '2 te lenduar', 0),
(3, 'Ferizaj', '2021-02-15', 'Skoda dhe Passat', 'Mosrespektimi i semaforit', '120 euro', '1 i lenduar', 0),
(4, 'Gjakove', '2021-03-20', 'Opel Zafira dhe Golf 4', 'Humbja e kontrollit', '320 euro', '3 te lenduar', 1),
(5, 'Prizren', '2021-01-30', 'BMW dhe Audi', 'Vozitja me shpejtesi 200 km/h', '1320 euro', '2 te vdekur', 0),
(7, 'Peje', '2021-02-12', 'Passat dhe Tauran', 'Rruga e rreshqitshme', '270 euro', '2 te lenduar', 0),
(8, 'Kamenice', '2021-06-28', 'Audi dhe Citroen', 'Tejkalimi ne vije te plote', '110 euro', '3 te lenduar', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksidentetetrafikutnekosove_smatk`
--
ALTER TABLE `aksidentetetrafikutnekosove_smatk`
  ADD PRIMARY KEY (`NumriAksidentit_SMATK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksidentetetrafikutnekosove_smatk`
--
ALTER TABLE `aksidentetetrafikutnekosove_smatk`
  MODIFY `NumriAksidentit_SMATK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
