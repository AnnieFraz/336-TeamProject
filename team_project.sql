-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2017 at 10:17 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `team_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `song_id` int(16) NOT NULL,
  `song_title` varchar(16) DEFAULT NULL,
  `song_artist` varchar(16) DEFAULT NULL,
  `song_album` varchar(16) DEFAULT NULL,
  `song_genre` varchar(16) DEFAULT NULL,
  `song_year` int(16) DEFAULT NULL,
  `playlist_id` int(16) DEFAULT NULL,
  PRIMARY KEY (`song_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_title`, `song_artist`, `song_album`, `song_genre`, `song_year`, `playlist_id`) VALUES
(1, 'Toxic', 'Britney', 'britney', 'pop', 2002, 1),
(2, 'Float On', 'Modest Mouse', 'The best of', 'rock', 2009, 5),
(3, 'Decoy', 'Paramore', 'Riot', 'rock', 2007, 1),
(4, 'Let it go', 'Frozen', 'frozen', 'musical', 2013, 5),
(5, 'Strange things', 'Toy Story', 'Toy story', 'musical', 1999, 5),
(6, 'Heart Out', 'The 1975', 'The 1975', 'alternative', 2013, 3),
(7, 'Bad blood', 'Taylor Swift', '1989', 'pop', 2014, 7),
(8, 'New Romantics', 'Taylor Swift', '1989', 'pop', 2013, 8),
(9, 'Watermelon Man', 'Herbie Handcock', 'Best of', 'jazz', 1979, 9),
(10, 'the closet', 'The coathangers', 'The wardrobe', 'punk', 2008, 10),
(11, 'Girlfriend', 'The Smiths', 'Best of The Smit', 'alternative', 1984, 4),
(12, 'Saxophone', 'Herbie Handcock', 'Best of', 'jazz', 1979, 9),
(13, 'Shake it off', 'Taylor Swift', '1989', 'pop', 2013, 8),
(14, 'Settle Down', 'The 1975', 'The 1975', 'alternative', 2013, 1),
(16, 'You got a friend', 'Toy story', 'Toy Story', 'musical', 1999, 6),
(17, 'Reindeers', 'Frozen', 'frozen', 'musical', 2012, 2),
(18, 'Some girls are b', 'The Smiths', 'Best of The Smit', 'alternative', 1984, 4),
(19, 'Sound', 'The 1975', 'The 1975', 'alternative', 2013, 3),
(20, 'buck head betty', 'The coathangers', 'The coathangers', 'punk', 2007, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
