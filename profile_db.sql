-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 03:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `wishid` int(11) NOT NULL,
  `wish` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date` datetime NOT NULL,
  `wishlist` varchar(255) NOT NULL,
  `interest1` varchar(255) NOT NULL,
  `interest2` varchar(255) NOT NULL,
  `interest3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `image`, `password`, `gender`, `date`, `wishlist`, `interest1`, `interest2`, `interest3`) VALUES
(6, 'John', 'Bates', 'email@email.com', 'uploads/1662232332user.jpg', '$2y$10$PUh/h0Exbs1GY/6o5CsbauwyImZPwVJ6AH0aLTDOlJzncIJVWi386', 'Male', '2022-09-03 21:12:12', '', '', '', ''),
(7, 'Mary', 'Bates', 'mary@email.com', 'uploads/1662232388alicia-keys.jpg', '$2y$10$Q7c1b7rYlQ2nc9Jw.RWDAeL69f7zMy5y9UYx4wNUj7OSS64yT0KBm', 'Female', '2022-09-03 21:13:08', '', '', '', ''),
(9, 'Jane', 'Doe', 'jane@email.com', 'uploads/1662233918pexels-photo-3756774.jpeg', '$2y$10$DhrdIIPD7hgJDvJAjNeFieLQU2M05yEPES2lJbJhARUU./ATsRzwW', 'Female', '2022-09-03 21:38:38', '', '', '', ''),
(11, 'Aiman', 'Jalil', 'aimannr32@gmail.com', 'uploads/1688513607pro2.jpg', '$2y$10$2d9x34PoybRiea6PIKY/AOvbh1FaE0gGfrnp3l0pQNS.CSSXq2yQa', 'Male', '2023-07-21 17:07:30', 'Noise-canceling headphones that deliver exceptional sound quality and comfort for immersive audio experiences.\r\nA high-performance vacuum cleaner with powerful suction and advanced filtration for efficient cleaning.\r\nCoffee maker\r\nLeather Wallet\r\n', 'Sports & Outdoor Play', 'Collectible Toys', 'Puzzles'),
(12, 'Aisar', 'Shahmi', 'aimansr32@gmail.com', 'uploads/1688513664pro5.jpg', '$2y$10$ITnSlApJSCrf.itv9MfGoOKeNSnuEX66IDOUrqxcF9xrCBz1YvBZq', 'Male', '2023-08-06 17:10:31', 'Long sleeve shirt', 'Toys figure & playsets', 'Arts & Crafts', 'Kids\' Electronics'),
(15, 'akmal', 'Irfan', 'akmal@gmail.com', 'uploads/1688518057pro4.jpg', '$2y$10$3CTXkJbGYXyD4LizPmor8uUOn1yODhZ3zMG5iFRLTf6elWFqiMePO', 'Male', '2023-07-20 04:03:25', 'Leather wallet\r\nSmall notebook', '', '', ''),
(16, 'sharizan', 'safwan', 'shah@gmail.com', 'uploads/1688644504slide3.jpg', '$2y$10$bcHykNJbWOol8tHRIwBlwuflBHUxYk.0QU2GMmWjc5CvSvNQJlMoi', 'Male', '2023-07-20 03:57:53', '', '', '', ''),
(17, 'Azhari', 'Azhar', 'Azhari@gmail.com', 'uploads/16913330405782b39affa2313b2cea514966296c1c.jpg', '$2y$10$dw.I62ZgBNbUBUxvxv.kpelwrj0fGzmVMukpOk0kH/TNJv/jduy2W', 'Male', '2023-08-06 17:08:35', 'Strong Fragrance Perfume\r\nShoes suitable for sport', 'Dolls & Accessories', 'Puzzles', 'Sports & Outdoor Play'),
(19, 'azim', 'amin', 'azim@gmail.com', 'uploads/1691332991free-romantic-boy-cute-boy-images-7397403_640.jpg', '$2y$10$40e08b64JBkd8q1ZIgl0WuIBpPF9N/kVjUOdIUgeXHM3CJL4Y.J2y', 'Female', '2023-08-06 16:43:11', '', 'Learning & Education', 'Games & Accessories', 'Outdoor Recreation'),
(20, 'Azreen', 'Farhana', 'azreen@gmail.com', 'uploads/1691332753girl-photo-1.jpg', '$2y$10$OODNo5otNjjBT0izrUT5jucUqL9uAHIUiSDBq3Kt7KQBam8WB6qXq', 'Female', '2023-08-06 16:39:13', 'Waffle Maker', 'Dress Up & Pretend Play', 'Collectible Toys', 'Dolls & Accessories'),
(27, 'Farah', 'Jasmin', 'farah@gmail.com', 'uploads/1691377817download (4).jpg', '$2y$10$kzU0UCVqOutFp0mi5RLP7OBZHOobPrDmTN0kPwY4e4F6UbemEwLl.', 'Female', '2023-08-07 05:10:17', 'Coffee Maker', 'Collectible Toys', 'Sports & Outdoor Play', 'Puzzles'),
(28, 'hana', 'hanafiah', 'hanafiah@gmail.com', 'uploads/1691384315download (2).jpg', '$2y$10$4ppVTDpSJ2yRQLpE0stAte3r2wuCoa9UT/u53X4bt1rQGOqHCqPLq', 'Female', '2023-08-07 06:58:35', 'Teddy Bear', 'Outdoor Recreation', 'Puzzles', 'Dolls & Accessories');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`wishid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `email` (`email`),
  ADD KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `wishid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
