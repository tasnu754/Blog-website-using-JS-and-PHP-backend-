-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(3, 'Wild Life', 'Wildlife refers to all undomesticated animal species, plants, fungi, and other living organisms in their natural environment. This encompasses a vast range of organisms, from microscopic bacteria to massive whales.'),
(4, 'Art', 'Art is a vast and diverse category encompassing a wide range of creative expressions.'),
(5, 'Uncategorized', 'This a category'),
(6, 'Food', 'Emphasizes whole, unprocessed foods like meat, fish, vegetables, fruits, and nuts, while excluding grains, legumes, and dairy.'),
(7, 'Science and technology', 'Science and technology are intertwined forces that drive human progress and shape our world. '),
(8, 'Music', 'Music is an art form that uses sound to create some combination of form, harmony, melody, rhythm, or otherwise expressive content. Music is generally agreed to be a cultural universal that is present in all human societies.'),
(9, 'Travel', 'Travel is often undertaken for pleasure or leisure, but it can also be done for business, education, or other purposes. People travel to experience new cultures, to see new sights, to visit family and friends, or to escape the routine of everyday life.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(2, 'A Foodie&#039;s Guide to City', 'City is a culinary paradise, a melting pot of flavors and traditions that will tantalize your taste buds. From street food stalls brimming with aromatic delights to Michelin-starred restaurants showcasing innovative cuisine, this destination offers something for every palate.', '1736263124FoodGroup.jpg', '2025-01-07 15:18:44', 6, 5, 0),
(3, 'A Glimpse into Nature&#039;s Diversity', 'Wildlife plays a crucial role in maintaining the delicate balance of our ecosystems, and its beauty and diversity inspire awe and wonder in people across the globe.', '1736264210wild_life.jpg', '2025-01-07 15:36:50', 3, 1, 0),
(4, 'The Intertwined Tapestry of Science and Technology', 'Science and technology are linked, two sides of the same coin driving human progress and shaping the world we live in. Science, the pursuit of knowledge and understanding of the natural world, provides the foundation upon which technological innovations are built. ', '1736268914science.jpg', '2025-01-07 15:50:33', 7, 1, 0),
(5, 'Sweeten Your Day', 'he sweet culmination of a meal, the ultimate indulgence. Whether you prefer a simple slice of cake, a rich chocolate mousse, or a refreshing sorbet, there&#039;s a dessert out there to satisfy every craving.', '1736269735dessert.jpg', '2025-01-07 17:07:06', 6, 1, 1),
(10, 'The Majestic Monarch Butterfly', 'Monarch butterflies are known for their remarkable migration patterns. Every fall, millions of these butterflies journey from North America to Mexico, where they overwinter in oyamel fir forests. In the spring, they migrate back north, laying eggs on milkweed plants as they travel', '1736273641wind.jpg', '2025-01-07 18:14:01', 3, 5, 0),
(11, 'Exploring the World of Street Art', 'Street art, a vibrant and often controversial form of artistic expression, has emerged as a powerful force in urban landscapes worldwide. From sprawling murals to intricate stencils, street art breathes life into city walls and challenges conventional notions of art and public space.', '1736273770art.jpg', '2025-01-07 18:16:10', 4, 5, 0),
(13, 'Pizza', 'Pizza, with its diverse toppings and endless variations, has become a global culinary phenomenon. From the classic Margherita to the adventurous Hawaiian, pizza satisfies cravings across cultures and generations.', '1736274277pizza.jpg', '2025-01-07 18:24:37', 6, 8, 0),
(14, 'Fast Food', 'Fast food has become a ubiquitous part of modern life, offering quick, affordable, and readily available meals. While convenient, it also raises concerns about its nutritional value and impact on health and the environment.', '1736274309fast_food.jpg', '2025-01-07 18:25:09', 6, 8, 0),
(15, 'Artificial intelligence', 'Artificial intelligence (AI) is a set of technologies that enable computers to perform a variety of advanced functions, including the ability to see, understand and translate spoken and written language, analyze data, make recommendations, and more.', '1736274470AI.jpeg', '2025-01-07 18:27:50', 7, 8, 0),
(16, 'Finding Paradise on Earth', 'Travel is a symphony of experiences. It&#039;s the thrill of the unknown, the anticipation of new sights, the taste of unfamiliar flavors, and the warmth of human connection. It&#039;s about stepping outside your comfort zone, embracing the unexpected, and discovering that paradise isn&#039;t a place, but a state of mind.', '17363431130a.jpg', '2025-01-08 13:31:53', 9, 9, 0),
(17, 'The Timeless Beauty of Classical Music', 'Classical music, with its intricate melodies, rich harmonies, and masterful compositions, has captivated audiences for centuries. From the grandeur of Beethoven&#039;s symphonies to the delicate elegance of Mozart&#039;s concertos, this genre offers a timeless beauty that continues to resonate with listeners today.', '1736343285music.jpg', '2025-01-08 13:34:45', 8, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'Tanzim', 'Islam', 'tanzim54', 'tanzim@gmail.com', '$2y$10$4SjfkFrobe./BZxr6VWDX.ONAcQ5EJabloi42WkRahENvLWm4t7ha', '1736095526__MG_2635.JPG', 1),
(5, 'Tasnuva Islam', 'Mila', 'tasnu', 'tasnuvamarziya60@gmail.com', '$2y$10$3dBeYDM72cANIOvgDMqnWerpdQleu/VMb0ZgLKHrfOt30VDEFzSSu', '1736181549_profile-pic (4).png', 0),
(8, 'Jisan', 'Ahmed', 'jisan', 'jisan@gmail.com', '$2y$10$/3XRNaEzwyLXyebM4OlYgOXcCrr4XjXUvRvm5.VlMWYkBZoP8K/Ty', '1736273831_rohan.jpg', 0),
(9, 'Sakib', 'Hossain', 'sakib', 'sakib@gmail.com', '$2y$10$x8m2D40AY0M5aFDzf25fzeHZsRVzqz0KkKfg0cy1XQe/hLcBonR.m', '1736342869_joseph.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
