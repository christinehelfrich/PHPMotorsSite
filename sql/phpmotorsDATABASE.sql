-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 11:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(8, 'Christine', 'Helfrich', 'christine@gmail.com', '$2y$10$zdE0SzvkkpnszgyVLZ8ypO7syn8HI/ONDgjYqTZZGZqBPlf7pme6W', '1', NULL),
(11, 'Test', 'Run', 'test@email.com', '$2y$10$tbhe4ZneYLfW178co.LGOO/tqr.j0oyjuNITvm8Q534uImSj/88Eq', '1', NULL),
(13, 'Admin', 'User', 'admin@cse340.net', '$2y$10$SjOGt0VgQwZO01Q2gPQXSOgMHQay8vkKnfyrfA8idr2OYr1ZLeSS6', '3', NULL),
(14, 'James', 'Helfrich', 'nameNEW@email.com', '$2y$10$PU6gJO74zSMMIZJgZN3SCeQbdC7.gyogPhCjbfktKnPEBISYzJIo.', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) NOT NULL,
  `invId` int(10) NOT NULL,
  `imgName` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(75, 1, 'wrangler.jpg', '/phpmotors/images/vehicles/wrangler.jpg', '2021-11-30 21:35:10', 1),
(76, 1, 'wrangler-tn.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '2021-11-30 21:35:10', 1),
(77, 2, 'model-t.jpg', '/phpmotors/images/vehicles/model-t.jpg', '2021-11-30 21:35:27', 1),
(78, 2, 'model-t-tn.jpg', '/phpmotors/images/vehicles/model-t-tn.jpg', '2021-11-30 21:35:27', 1),
(79, 3, 'adventador.jpg', '/phpmotors/images/vehicles/adventador.jpg', '2021-11-30 21:35:36', 1),
(80, 3, 'adventador-tn.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '2021-11-30 21:35:36', 1),
(83, 4, 'monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck.jpg', '2021-11-30 21:36:28', 1),
(84, 4, 'monster-truck-tn.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '2021-11-30 21:36:28', 1),
(85, 5, 'mechanic.jpg', '/phpmotors/images/vehicles/mechanic.jpg', '2021-11-30 21:36:46', 1),
(86, 5, 'mechanic-tn.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '2021-11-30 21:36:46', 1),
(87, 6, 'batmobile.jpg', '/phpmotors/images/vehicles/batmobile.jpg', '2021-11-30 21:36:58', 1),
(88, 6, 'batmobile-tn.jpg', '/phpmotors/images/vehicles/batmobile-tn.jpg', '2021-11-30 21:36:58', 1),
(89, 7, 'mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van.jpg', '2021-11-30 21:37:10', 1),
(90, 7, 'mystery-van-tn.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '2021-11-30 21:37:10', 1),
(91, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2021-11-30 21:37:21', 1),
(92, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2021-11-30 21:37:21', 1),
(93, 9, 'crwn-vic.jpg', '/phpmotors/images/vehicles/crwn-vic.jpg', '2021-11-30 21:37:33', 1),
(94, 9, 'crwn-vic-tn.jpg', '/phpmotors/images/vehicles/crwn-vic-tn.jpg', '2021-11-30 21:37:33', 1),
(95, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2021-11-30 21:37:43', 1),
(96, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2021-11-30 21:37:43', 1),
(97, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2021-11-30 21:38:05', 1),
(98, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2021-11-30 21:38:05', 1),
(99, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2021-11-30 21:38:24', 1),
(100, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2021-11-30 21:38:24', 1),
(101, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2021-11-30 21:38:32', 1),
(102, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2021-11-30 21:38:32', 1),
(103, 14, 'van.jpg', '/phpmotors/images/vehicles/van.jpg', '2021-11-30 21:38:41', 1),
(104, 14, 'van-tn.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '2021-11-30 21:38:41', 1),
(105, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2021-11-30 21:38:58', 1),
(106, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2021-11-30 21:38:58', 1),
(107, 27, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2021-11-30 21:39:08', 1),
(108, 27, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2021-11-30 21:39:08', 1),
(109, 1, 'jeep.jpg', '/phpmotors/images/vehicles/jeep.jpg', '2021-11-30 21:43:22', 0),
(110, 1, 'jeep-tn.jpg', '/phpmotors/images/vehicles/jeep-tn.jpg', '2021-11-30 21:43:23', 0),
(111, 12, 'hummergm.jpg', '/phpmotors/images/vehicles/hummergm.jpg', '2021-11-30 21:43:32', 0),
(112, 12, 'hummergm-tn.jpg', '/phpmotors/images/vehicles/hummergm-tn.jpg', '2021-11-30 21:43:32', 0),
(113, 9, 'ford.jpg', '/phpmotors/images/vehicles/ford.jpg', '2021-11-30 21:43:48', 0),
(114, 9, 'ford-tn.jpg', '/phpmotors/images/vehicles/ford-tn.jpg', '2021-11-30 21:43:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(11) NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. It is great for everyday driving as well as off-roading whether that be on the rocks or in the mud!', '/images/vehicles/wrangler.jpg', '/images/jeep-wrangler-tn.jpg', '28045', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/images/vehicles/model-t.jpg', '/images/ford-modelt-tn.jpg', '30000', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/images/vehicles/adventador.jpg', '/images/lambo-Adve-tn.jpg', '417650', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/images/vehicles/monster-truck.jpg', '/images/monster-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/images/vehicles/mechanic.jpg', '/images/ms-tn.jpg', '100', 1, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/images/vehicles/batmobile.jpg', '/images/bat-tn.jpg', '65000', 1, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/images/vehicles/mystery-van.jpg', '/images/mm-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/images/vehicles/fire-truck.jpg', '/images/fire-truck-tn.jpg', '50000', 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/images/vehicles/crwn-vic.jpg', '/images/crown-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/images/vehicles/camaro.jpg', '/images/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/images/vehicles/escalade.jpg', '/images/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/images/vehicles/hummer.jpg', '/images/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', '    Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!', '/images/vehicles/aerocar.jpg', '/images/aerocar-tn.jpg', '1000000', 1, 'Redish', 2),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month. ', '/images/vehicles/van.jpg', '/images/fbi-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', '    Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/images/vehicles/dog.jpg', '/images/dog-tn.jpg', '35000', 1, 'Brown', 2),
(27, 'DMC', 'DeLorean', '&#34;So fast its almost like traveing in time.&#34;', 'delorean.jpg', 'delorean-tn.jpg', '20000', 20000, 'grey', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(2, 'too mysterious for me', '2021-12-06 06:10:31', 7, 13),
(3, 'hi again', '2021-12-06 06:11:04', 7, 13),
(7, 'is anybody there?', '2021-12-07 04:05:35', 7, 14),
(8, 'I like', '2021-12-07 04:05:54', 3, 14),
(10, 'MODIFIED', '2021-12-10 23:05:39', 2, 13),
(12, 'I feel boujee not even gonna lie', '2021-12-11 22:47:10', 9, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `invId` (`invId`),
  ADD KEY `clientId` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4071;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
