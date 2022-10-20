-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2022 at 07:50 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u21549967`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbevents`
--

CREATE TABLE `dbevents` (
  `event_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` int NOT NULL,
  `tag1` varchar(100) DEFAULT NULL,
  `tag2` varchar(100) DEFAULT NULL,
  `tag3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dbevents`
--

INSERT INTO `dbevents` (`event_id`, `name`, `description`, `date`, `location`, `category`, `image`, `user_id`, `tag1`, `tag2`, `tag3`) VALUES
(5, '2.5D Game Jam', '2 Hours to complete a 2.5D style game', '2022-09-02', 'Online', 'Game Jam', 'media/events/2.5dgamejam3game_jam.jpg', 3, 'Solo', 'Competitive', 'Educational'),
(15, 'GameMakers Toolkit 2022', 'What is the theme this year? The theme is Roll of the Dice What can I make my game in? Anything, provided you can upload a file that runs on Windows or browsers, and doesn\'t require any additional hardware or software. What assets can I use? The game should be developed during the jam, but you may use pre-existing code and can use whatever art and audio assets you have the legal right to use. When should I submit my game? While the jam concludes at 18:00 BST, there will be an additional two hours on the clock (until 20:00 BST) that is just for submitting your game. That being said, we recommend uploading something nice and early, and updating as you go! Once this concludes, all submissions will be shut - with no opportunities for late submissions! Who will judge the games? Games will be judged by the public. Mark will then play the Top 100 games and pick his favourite 20. All of the results will be revealed when this process is over. What will the games be judged on? Games will be ranked against the following criteria: enjoyment, creativity, and presentation.', '2022-09-02', 'Online', 'Game Jam', 'media/events/gamemakerstoolkit202211gamejam.jpg', 11, 'Competitive', 'Solo', 'Online'),
(16, 'GameMakers Toolkit 2021', 'Who can enter? Anyone, of any age, from anywhere. You can work alone or in teams.\r\n\r\nWhen does the jam begin? The jam starts at June 11th, at 7PM UK time. And it ends at June 13th, at 7PM UK time.\r\n\r\nWhat is the theme? The theme is Joined Together!\r\n\r\nWhat can I make my game in? Anything, provided you can upload a file that runs on Windows or browsers.\r\n\r\nWhat assets can I use? The game should be developed during the jam, but you may use some pre-existing code and can use whatever art and audio assets you have the legal right to use.\r\n\r\nWho will judge the games? Games will be judged by the public. Mark will then play the Top 100 games and pick his favourite 20. All of the results will be revealed when this process is over.\r\n\r\nWhat will the games be judged on? Games will be ranked against the following criteria: fun, originality, and presentation.', '2021-06-08', 'Online', 'Game Jam', 'media/events/gamemakerstoolkit202111gamejam.png', 11, 'Competitive', 'Solo', 'Online'),
(17, 'GameMakers Toolkit 2020', 'Who can enter? Anyone, of any age, from anywhere. You can work alone or in teams.\r\n\r\nWhat is the theme? Out of Control.\r\n\r\nWhat can I make my game in? Anything, provided you can upload a file that runs on Windows or browsers.\r\n\r\nWhat assets can I use? The vast majority of code must be written during the jam, but you can use whatever art and audio assets you have the legal right to use.\r\n\r\nWho will judge the games? Games will be judged by the public. Mark will then play the Top 100 games and pick his favourite 20. All of the results will be revealed when this process is over.\r\n\r\nWhat will the games be judged on? Games will be ranked against the following criteria: fun, originality, and presentation.', '2020-02-04', 'Online', 'Game Jam', 'media/events/gamemakerstoolkit202011gamejam.jpg', 11, 'Competitive', 'Solo', 'Online'),
(18, 'Celeste - How It\'s Coded', 'Join me on Hillcrest campus as I code the popular game &quot;Celeste&quot; from scratch, allowing you to understand the mechanics behind a game such as this one and reflect it in your own studies.', '2022-10-08', 'Hillcrest Campus', 'Other', 'media/events/celeste-howit\'scoded13other.jpg', 13, 'Casual', 'Educational', NULL),
(19, 'Terraria - How it\'s Coded', 'Join me on Hillcrest campus as I code the popular game &quot;Terraria&quot; from scratch, allowing you to understand the mechanics behind a game such as this one and reflect it in your own studies.', '2021-06-16', 'Hillcrest Campus', 'Other', 'media/events/terraria-howit\'scoded13other.jpg', 13, 'Casual', 'Educational', NULL),
(20, 'Hollow Knight - How it\'s Coded', 'Join me on Groenkloof campus as I code the popular game &quot;Hollow Knight&quot; from scratch, allowing you to understand the mechanics behind a game such as this one and reflect it in your own studies.', '2021-10-30', 'Groenkloof Campus', 'Other', 'media/events/hollowknight-howit\'scoded13other.jpg', 13, 'Casual', 'Educational', NULL),
(21, 'Advanced Concepts in React', 'This seminar focuses on the introduction of advanced concepts in React that are crucial to your understanding of the framework.', '2020-12-11', 'Code Expo Stadium', 'Other', 'media/events/advancedconceptsinreact13other.jpg', 13, 'Casual', 'Teamwork', 'Educational'),
(22, 'What if Spiderman was a Coder?', 'This event revolves around the route that Peter Parker would have gone down if he did not become Spiderman, but a shut-in junior developer', '2021-06-04', 'Spidey Headquarters', 'Other', 'media/events/whatifspidermanwasacoder4other.jpg', 4, 'Educational', NULL, NULL),
(23, 'Marvel heroes unite', 'Only superhero themed games allowed. Get creative!', '2022-10-15', 'My house', 'Game Jam', 'media/events/marvelheroesunite14gamejam.jpeg', 14, 'Casual', 'Teamwork', NULL),
(24, 'GJ+ Johannesburg', 'If you have a passion for game-making and enjoy challenges, come over for a weekend to create a game in 48 hours along with people who are as passionate as you! GameJamPlus is a game development worldwide marathon built by a non-profit, collaborative movement that will take place from the 14th to the 16th of October 2022. The best games will compete for awards, besides being shown to investors from the gaming industry!\r\n\r\nGameJamPlus aims to potentialize the best games so they become marketable products and interesting to investors in a great journey conducted by several actors of the creative economy ecosystem all around the world!', '2022-10-14', 'Online', 'Game Jam', 'media/events/gj+johannesburg16hackathon.jpg', 16, 'Casual', 'Online', ''),
(25, 'IMY 300 Crunch Session', '24 hours to bat out fully tileable level layout.\r\nLets go', '2022-10-26', 'Yellow Labs', 'Hackathon', 'media/events/imy300crunchsession17hackathon.jpg', 17, 'Teamwork', 'Speedrun', 'Educational');

-- --------------------------------------------------------

--
-- Table structure for table `dbfollowing`
--

CREATE TABLE `dbfollowing` (
  `follow_id` int NOT NULL,
  `user_id` int NOT NULL,
  `following_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dbfollowing`
--

INSERT INTO `dbfollowing` (`follow_id`, `user_id`, `following_id`) VALUES
(11, 3, 11),
(12, 4, 11),
(13, 4, 3),
(16, 13, 11),
(17, 13, 4),
(18, 13, 3),
(19, 13, 12),
(20, 4, 13),
(22, 14, 13),
(23, 14, 11),
(24, 3, 13),
(25, 11, 13),
(26, 12, 13),
(27, 14, 4),
(28, 13, 14),
(30, 15, 13),
(31, 15, 14),
(32, 13, 15),
(34, 16, 13),
(35, 13, 16);

-- --------------------------------------------------------

--
-- Table structure for table `dblistitems`
--

CREATE TABLE `dblistitems` (
  `list_item_id` int NOT NULL,
  `list_id` int NOT NULL,
  `event_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dblistitems`
--

INSERT INTO `dblistitems` (`list_item_id`, `list_id`, `event_id`) VALUES
(3, 12, 15),
(4, 12, 16),
(5, 12, 17),
(6, 13, 5),
(7, 13, 17),
(8, 17, 18),
(9, 17, 20),
(10, 17, 19),
(11, 18, 15),
(12, 18, 5),
(13, 18, 16),
(14, 18, 17),
(15, 13, 18),
(16, 13, 21),
(17, 18, 24),
(18, 22, 24),
(19, 22, 15),
(20, 22, 16),
(21, 22, 17),
(22, 18, 23);

-- --------------------------------------------------------

--
-- Table structure for table `dblists`
--

CREATE TABLE `dblists` (
  `list_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `count` int DEFAULT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dblists`
--

INSERT INTO `dblists` (`list_id`, `title`, `description`, `count`, `user_id`) VALUES
(12, 'GMTK Events', 'This is a list that contains all of the events that GMTK has hosted throughout the years', 3, 11),
(13, 'Cool event things', 'These events are my favorite', 4, 4),
(17, 'How its Coded', 'This list contains all the events I have hosted that pertain to how to make popular games.', 3, 13),
(18, 'Events I find useful', 'These are a collection of events that I think are useful to anyone', 6, 13),
(22, 'Game Jams', 'Awesome game jams that I would recommend to anyone!', 4, 16),
(23, 'Hottest events', 'The best out there', 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `dbmessages`
--

CREATE TABLE `dbmessages` (
  `message_id` int NOT NULL,
  `message` text NOT NULL,
  `user_id` int NOT NULL,
  `friend_id` int NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dbmessages`
--

INSERT INTO `dbmessages` (`message_id`, `message`, `user_id`, `friend_id`, `time`) VALUES
(1, 'Hello there friend, how goes it?', 13, 12, '19:54:00'),
(2, 'I have never been better, Monsters Inc slaps', 12, 13, '19:56:00'),
(3, 'That is quite the controversial opinion...', 13, 12, '19:58:00'),
(4, 'weirdo', 13, 12, '19:58:10'),
(5, 'You are a controversial opinion', 12, 13, '19:58:40'),
(6, 'I am not', 13, 12, '20:27:19'),
(7, 'Yoooooooooo my dude, I need a lift home this weekend pls', 13, 14, '20:57:50'),
(8, 'Who are you and why are you in my house', 14, 13, '20:58:01'),
(9, 'please leave', 14, 13, '20:58:24'),
(11, 'Sup man', 16, 13, '20:58:45'),
(12, 'How are you?', 16, 13, '20:58:51'),
(13, 'Im good my dude, how are you?', 13, 16, '21:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `dbreviews`
--

CREATE TABLE `dbreviews` (
  `review_id` int NOT NULL,
  `user_id` int NOT NULL,
  `event_id` int NOT NULL,
  `comment` text NOT NULL,
  `image` text NOT NULL,
  `rating` int NOT NULL,
  `review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dbreviews`
--

INSERT INTO `dbreviews` (`review_id`, `user_id`, `event_id`, `comment`, `image`, `rating`, `review_date`) VALUES
(2, 4, 15, 'This event was awesome! 10/10 would do again', 'media/events/4155.png', 5, '2022-10-05'),
(3, 13, 15, 'It was okay. The theme was very difficult to attempt in such a short timeframe..', 'media/events/13153.jpg', 3, '2022-09-15'),
(4, 14, 15, 'I loved learning how to adapt a game to a specific theme, this was a crucial experience that I will never forget!', 'media/events/14155.jpg', 5, '2022-10-05'),
(5, 16, 15, 'Great event taught me a lot about making games under pressure, will 100 percent attend next year.', 'media/events/16154.png', 4, '2022-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `dbusers`
--

CREATE TABLE `dbusers` (
  `user_id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `profile_photo` varchar(200) NOT NULL,
  `verified` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dbusers`
--

INSERT INTO `dbusers` (`user_id`, `username`, `email`, `password`, `admin`, `profile_photo`, `verified`) VALUES
(3, 'admin', 'admin@gmail.com', 'Admin123!', 1, 'media/profile_photos/admin.jpg', NULL),
(4, 'spiderman', 'peterparker@gmail.com', 'Peter123!', NULL, 'media/profile_photos/4.jpg', NULL),
(11, 'GMTK', 'gmtk@gmail.com', 'Gmtk123!', NULL, 'media/profile_photos/GMTK.png', 1),
(12, 'theWazz', 'wazowski@waz.me', 'Test123!', NULL, 'media/profile_photos/12.png', NULL),
(13, 'keelanriel', 'keelanmatthews123@gmail.com', 'Keelan123!', NULL, 'media/profile_photos/13.jpg', 1),
(14, 'TR15TAN', 'frizzytrizzy@gmail.com', 'Frizzy123!', NULL, 'media/profile_photos/14.jpg', NULL),
(15, 'caybenson', 'cayleeben21@gmail.com', 'Caylee123!', NULL, 'media/profile_photos/default.png', NULL),
(16, 'ShadowSlayerZA', 'smithfaffa@gmail.com', 'Test123!', NULL, 'media/profile_photos/16.png', NULL),
(17, 'rert', 'bigtgang@gmail.com', 'Aa!1ffff', NULL, 'media/profile_photos/17.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbevents`
--
ALTER TABLE `dbevents`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_foreign_key` (`user_id`);

--
-- Indexes for table `dbfollowing`
--
ALTER TABLE `dbfollowing`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `following_id` (`following_id`);

--
-- Indexes for table `dblistitems`
--
ALTER TABLE `dblistitems`
  ADD PRIMARY KEY (`list_item_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `dblists`
--
ALTER TABLE `dblists`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `dbmessages`
--
ALTER TABLE `dbmessages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_foreign_key` (`user_id`),
  ADD KEY `friend_foreign_key` (`friend_id`);

--
-- Indexes for table `dbreviews`
--
ALTER TABLE `dbreviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `dbusers`
--
ALTER TABLE `dbusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbevents`
--
ALTER TABLE `dbevents`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dbfollowing`
--
ALTER TABLE `dbfollowing`
  MODIFY `follow_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `dblistitems`
--
ALTER TABLE `dblistitems`
  MODIFY `list_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dblists`
--
ALTER TABLE `dblists`
  MODIFY `list_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dbmessages`
--
ALTER TABLE `dbmessages`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dbreviews`
--
ALTER TABLE `dbreviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dbusers`
--
ALTER TABLE `dbusers`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dbevents`
--
ALTER TABLE `dbevents`
  ADD CONSTRAINT `user_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `dbusers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dbfollowing`
--
ALTER TABLE `dbfollowing`
  ADD CONSTRAINT `dbfollowing_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `dbusers` (`user_id`),
  ADD CONSTRAINT `dbfollowing_ibfk_2` FOREIGN KEY (`following_id`) REFERENCES `dbusers` (`user_id`),
  ADD CONSTRAINT `user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `dbusers` (`user_id`);

--
-- Constraints for table `dblistitems`
--
ALTER TABLE `dblistitems`
  ADD CONSTRAINT `dblistitems_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `dbevents` (`event_id`);

--
-- Constraints for table `dblists`
--
ALTER TABLE `dblists`
  ADD CONSTRAINT `dblists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `dbusers` (`user_id`);

--
-- Constraints for table `dbmessages`
--
ALTER TABLE `dbmessages`
  ADD CONSTRAINT `friend_foreign_key` FOREIGN KEY (`friend_id`) REFERENCES `dbusers` (`user_id`),
  ADD CONSTRAINT `sender_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `dbusers` (`user_id`);

--
-- Constraints for table `dbreviews`
--
ALTER TABLE `dbreviews`
  ADD CONSTRAINT `dbreviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `dbusers` (`user_id`),
  ADD CONSTRAINT `dbreviews_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `dbevents` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
