-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 11:59 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taem_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `album_id` int(60) NOT NULL AUTO_INCREMENT,
  `genre_id` int(60) NOT NULL,
  `album_name` varchar(60) NOT NULL,
  `artist_id` int(60) NOT NULL,
  PRIMARY KEY (`album_id`),
  KEY `album_id` (`album_id`),
  KEY `artist_id` (`artist_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `genre_id`, `album_name`, `artist_id`) VALUES
(1, 1, 'Salad Days', 1),
(2, 1, 'This Old Dog', 1),
(3, 1, '2', 1),
(4, 1, 'Another One', 1),
(5, 2, 'The Lonesome Crowded West', 2),
(6, 2, 'Antarctica and the Moon', 2),
(7, 1, 'Roy Pablo', 3),
(8, 5, 'Dream Your Life Away', 4),
(9, 3, 'Take Me to your Leader', 5),
(10, 4, 'Light Upon the Lake', 6);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` int(60) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`artist_id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `name`) VALUES
(1, 'Mac Demarco'),
(2, 'Modest Mouse'),
(3, 'Boy Pablo'),
(4, 'Vance Joy'),
(5, 'King Gheedora'),
(6, 'Whitney');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(60) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(60) NOT NULL,
  PRIMARY KEY (`genre_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Lo-fi'),
(2, 'Indie Rock'),
(3, 'Rap'),
(4, 'Indie Folk'),
(5, 'Indie Pop');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `artist_id` int(60) NOT NULL,
  `song_id` int(60) NOT NULL AUTO_INCREMENT,
  `album_id` int(60) NOT NULL,
  `song_title` varchar(60) NOT NULL,
  PRIMARY KEY (`song_id`),
  KEY `artist_id` (`artist_id`,`album_id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`artist_id`, `song_id`, `album_id`, `song_title`) VALUES
(1, 1, 1, 'Salad Days'),
(1, 2, 1, 'Blue Boy'),
(1, 3, 1, 'Brother'),
(1, 4, 1, 'Let Her Go'),
(1, 5, 1, 'Goodbye Weekend'),
(1, 6, 1, 'Let My Baby Stay'),
(1, 7, 1, 'Passing Out Pieces'),
(1, 8, 1, 'Treat Her Better'),
(1, 9, 1, 'Chamber of Reflection'),
(1, 10, 1, 'Go Easy'),
(1, 11, 4, 'The Way You''d Love Her'),
(1, 12, 4, 'Another One'),
(1, 13, 4, 'No Other Heart'),
(1, 14, 4, 'A Heart Like Hers'),
(1, 15, 2, 'For the First Time'),
(1, 16, 2, 'One More Love Song'),
(1, 17, 2, 'Moonlight on the River'),
(1, 18, 3, 'My Kind of Woman'),
(1, 19, 3, 'Ode to Viceroy'),
(2, 20, 5, 'Cowboy Dan'),
(2, 21, 5, 'Trailer Trash'),
(2, 22, 5, 'Out of Gas'),
(2, 23, 6, 'Life Like Weeds'),
(2, 24, 6, 'Paper Thin Walls'),
(3, 25, 7, 'Ready/Problems'),
(3, 26, 7, 'Everytime'),
(4, 27, 8, 'Riptide'),
(5, 28, 9, 'Krazy World'),
(5, 29, 9, 'I Wonder'),
(6, 30, 10, 'No Woman');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
