-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 08:13 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `addedby` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `password`, `aname`, `addedby`) VALUES
(1, 'April-16-2022 20:25:37', 'Pratyay', '19BIT0004', 'Pratyay Mallik', 'Pratyay'),
(2, 'April-16-2022 20:26:47', 'PeterParker', 'i am spiderman', '', 'Pratyay'),
(6, 'April-25-2022 01:30:54', 'root', 'pratyay', '', 'Pratyay');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `author`, `datetime`) VALUES
(1, 'Technology', 'Pratyay', 'April-11-2022 00:50:12'),
(2, 'Travel', 'Pratyay', 'April-11-2022 02:19:16'),
(3, 'News', 'Pratyay', 'April-11-2022 02:19:37'),
(4, 'Science', 'Pratyay', 'April-25-2022 02:08:41'),
(5, 'root', 'Pratyay', 'April-25-2022 02:26:26'),
(6, 'pratyay', 'Pratyay', 'April-25-2022 02:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `post_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `post_id`) VALUES
(3, 'April-17-2022 02:08:59', 'Frank Castle', 'freank@punisher.com', '“It’s going to disappear. One day, it’s like a miracle, it will disappear” repeated Donald Trump', 'Pratyay Mallik', 'ON', 4),
(4, 'April-17-2022 02:10:27', 'elliot alderson', 'elliot@robot.com', 'To beat a hacker, think like a hacker', 'Pratyay Mallik', 'ON', 1),
(5, 'April-17-2022 02:11:53', 'Peter Parker', 'peter@spiderman.com', 'To travel is to live', 'Pratyay Mallik', 'ON', 3),
(6, 'April-21-2022 03:15:53', 'Pratyay', '222', 'assdasdasd', 'Pratyay Mallik', 'ON', 1),
(8, 'April-25-2022 19:12:20', 'a', 'a', '                                        Comment\r\n                                    ', 'Pratyay Mallik', 'OFF', 2),
(9, 'April-29-2022 01:47:52', 'pratyay', 'p@p', 'lorem ipsum', 'Pratyay Mallik', 'ON', 7),
(10, 'April-29-2022 01:48:13', 'Jaivik', 'j@mail.com', 'hello', 'Pratyay Mallik', 'ON', 7),
(11, 'April-29-2022 01:48:28', 'Sumit', 's@mail.com', 'Nice', 'Pratyay Mallik', 'ON', 7),
(12, 'April-29-2022 01:49:00', 'Pratyay', 'p@mail.com', 'Nice blog', 'Pratyay Mallik', 'ON', 6);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(1, 'April-11-2022 02:21:02', 'Test Title 2', 'News', 'Pratyay', 'security-265130_1280.jpg', '                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices ante orci, id lobortis dolor facilisis vitae. Nam in dolor lorem. Donec interdum, libero sed tincidunt volutpat, nunc risus maximus lectus, ut scelerisque est libero a justo. Aenean vel pretium odio. Maecenas diam lectus, egestas ac ullamcorper non, convallis id metus. Curabitur laoreet ex vel neque aliquet, id rutrum diam viverra. Aliquam sed lacus ullamcorper, fringilla sapien eu, finibus nulla. Etiam sodales at mauris quis efficitur. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vel convallis ex. Cras dui massa, tincidunt non neque at, pretium sagittis ante. Etiam mattis consectetur malesuada. Integer fringilla quam nec ultricies hendrerit. Maecenas sagittis odio ante, ac hendrerit libero ultrices non.\r\n\r\nNulla vel leo consectetur, bibendum lacus et, posuere nulla. Aenean consectetur nisl purus, id tempus massa placerat at. Morbi nec elit risus. Ut diam urna, accumsan vitae tortor quis, vulputate efficitur eros. Suspendisse vehicula et orci eget interdum. Nam tincidunt est sapien, id euismod ligula vulputate sed. Morbi scelerisque, ligula at sollicitudin pharetra, ante eros placerat elit, eu mollis lorem massa a risus. Duis id tristique erat. Nunc volutpat iaculis elit.\r\n\r\nVivamus faucibus tortor id ornare malesuada. Nulla efficitur turpis sapien, at maximus lorem sollicitudin quis. Integer faucibus eros vel nulla vestibulum consequat. Phasellus fringilla id magna a tempus. Aenean scelerisque, justo eleifend pretium porta, est lectus tincidunt nibh, a lacinia risus turpis ut lectus. Aliquam eu orci scelerisque, volutpat elit nec, semper dolor. Integer sodales at mauris sed sagittis. Nunc tellus mi, venenatis eget lectus nec, vulputate sollicitudin dui.\r\n\r\nNunc et leo urna. Nullam posuere, nibh sodales tempor bibendum, tellus elit accumsan velit, et cursus ex ex a nisl. Aliquam non porttitor mauris. Nulla facilisi. Curabitur hendrerit sollicitudin ipsum, vitae dictum sapien malesuada nec. Ut sit amet tellus dapibus, consequat nibh sit amet, finibus mi. Aenean iaculis dui quis est lobortis iaculis. Donec ut vehicula urna, a egestas ligula.\r\n\r\nVivamus sem ante, ullamcorper quis semper at, venenatis a augue. Aliquam non sodales magna. Vivamus quis arcu augue. Aliquam felis urna, finibus eu scelerisque vel, consectetur vitae eros. Nunc cursus orci id ante volutpat bibendum. Praesent venenatis ex et feugiat ultrices. Etiam mauris augue, eleifend et ligula id, efficitur egestas turpis.\r\n\r\nVestibulum nec justo libero. Donec quam magna, laoreet non neque ut, molestie ultricies orci. Phasellus ullamcorper enim nec nulla placerat faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec non lacus nec tellus aliquam luctus eget ac ante. Donec finibus tristique malesuada. Vestibulum ullamcorper vitae leo non condimentum. Pellentesque molestie risus sit amet augue suscipit pharetra. Cras tristique blandit nunc, vitae interdum diam bibendum quis. Curabitur nec metus justo. Aliquam dapibus rhoncus tortor vitae eleifend.\r\n\r\nUt eros orci, pulvinar sit amet odio quis, efficitur euismod sem. Mauris nec nisi dolor. Praesent venenatis mauris libero. Vivamus hendrerit mattis neque, et faucibus eros varius sit amet. Vestibulum a ipsum eget erat tempor convallis eu non erat. Integer vitae ipsum ac turpis maximus aliquam. Cras congue imperdiet leo eget laoreet. Phasellus aliquam a dolor id posuere. Duis fermentum eget orci vitae iaculis. Donec quis eleifend mauris. Suspendisse sed cursus urna. Sed arcu risus, luctus nec pretium a, posuere vitae eros.\r\n\r\nProin ullamcorper sollicitudin sapien, tristique auctor dolor sodales pretium. Morbi in augue vulputate, pharetra magna quis, suscipit nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus tellus nisi, in pretium lorem scelerisque rhoncus. Integer et felis cursus, mollis urna vel, accumsan lorem. Sed efficitur lobortis consequat. Etiam porttitor diam ut facilisis hendrerit. Sed varius nisi sapien, a pharetra dui auctor ut. Sed justo eros, varius nec ante nec, facilisis mollis eros. Fusce a ex et purus suscipit volutpat nec sit amet sapien. In ornare mi vel pulvinar dictum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque mollis enim in nunc convallis pulvinar. Vivamus malesuada urna enim, vitae eleifend libero laoreet ac. Pellentesque in risus eu nisi suscipit lobortis sit amet et odio. Praesent et lorem semper, tristique magna et, ultricies felis.\r\n\r\nAliquam suscipit turpis nibh, vel laoreet est convallis a. Aliquam sit amet sapien at mauris finibus dapibus. Mauris massa quam, viverra volutpat diam non, accumsan faucibus ante. Quisque ullamcorper libero euismod erat efficitur tincidunt. Vestibulum leo lacus, tincidunt eu fringilla et, laoreet eget massa. Vestibulum sed varius ipsum. Suspendisse gravida ligula nunc, non finibus erat rhoncus eget. Etiam a felis ante. Suspendisse at euismod turpis.\r\n\r\nFusce in elit eleifend, congue mi et, accumsan libero. Integer non sapien et sapien ullamcorper vulputate quis ac est. Pellentesque vitae nulla dictum, consectetur urna nec, condimentum risus. Sed massa ipsum, egestas in magna ac, ornare interdum arcu. Aliquam lacus purus, bibendum eu posuere sed, tincidunt eu tellus. Vestibulum finibus ex eu tempor elementum. Donec sit amet sodales elit.\r\n\r\nNulla nec consequat nisl. Vivamus rutrum mauris non sem tempor blandit. Nunc cursus quis leo et tincidunt. Nullam eu ligula a nunc maximus rhoncus. Nulla facilisi. Nam lacinia consequat metus vitae commodo. Nullam tincidunt diam tortor, eu iaculis ipsum hendrerit sit amet. Vestibulum non diam pharetra, tempor risus sit amet, dapibus purus. Praesent vitae nibh ligula.\r\n\r\nAliquam leo nisl, venenatis eget enim non, dignissim tempus tellus. Curabitur lobortis, turpis vitae dignissim mollis, arcu velit hendrerit dui, eu consectetur mi sapien sed lacus. Vivamus tempor sapien elit, in tempor lectus sollicitudin vitae. Nullam fermentum libero enim, nec convallis leo efficitur a. In at lorem molestie quam cursus bibendum ullamcorper non ligula. Nullam nibh lectus, pharetra et sem eu, tincidunt placerat ex. Curabitur semper, turpis mollis facilisis vestibulum, nisi orci commodo lorem, eu finibus felis libero at ex. Morbi urna sapien, scelerisque eget magna quis, aliquet ultrices nibh. Vestibulum in enim molestie, faucibus justo vel, fringilla ante. Curabitur sodales bibendum felis in ullamcorper.\r\n\r\nAenean scelerisque rhoncus erat ac eleifend. Sed pellentesque lacus nunc, sed ultricies enim vulputate ut. Aenean ut metus sit amet quam dictum convallis. Quisque eget magna posuere, luctus dui sed, aliquet orci. Vivamus nisi urna, gravida a egestas nec, cursus in lectus. Praesent aliquam dui et nibh malesuada, quis tempor magna ultrices. Fusce venenatis fringilla sodales.\r\n\r\nVestibulum feugiat condimentum est id tincidunt. Suspendisse lacinia viverra nibh sit amet imperdiet nullam.                                                        '),
(2, 'April-11-2022 04:39:14', 'Open source Programming', 'Technology', 'Pratyay', 'artificial-intelligence-2167835_1280.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dolor magna, cursus vel mollis id, sagittis non orci. Nulla aliquet massa non felis tempor egestas. Ut ut egestas turpis, eget mollis eros. Sed lobortis orci ac volutpat venenatis. Pellentesque turpis nulla, condimentum consequat bibendum ac, auctor at lorem. Vestibulum porta laoreet mollis. Nullam vel pretium neque. Aliquam ultrices efficitur arcu quis interdum. In vel ex felis. Donec sed sapien ullamcorper, maximus justo vitae, volutpat diam.\r\n\r\nNunc id justo sed ante hendrerit vestibulum a ac orci. Etiam rhoncus neque sem, sagittis mattis justo vehicula nec. Aenean consequat sagittis turpis sed facilisis. Phasellus blandit pharetra rhoncus. Nulla porta efficitur porta. Nunc pharetra sapien purus, commodo bibendum quam porta sit.'),
(3, 'April-11-2022 04:39:46', 'Five Reasons To Travel', 'Travel', 'Pratyay', 'beach-1236581_1280.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dolor magna, cursus vel mollis id, sagittis non orci. Nulla aliquet massa non felis tempor egestas. Ut ut egestas turpis, eget mollis eros. Sed lobortis orci ac volutpat venenatis. Pellentesque turpis nulla, condimentum consequat bibendum ac, auctor at lorem. Vestibulum porta laoreet mollis. Nullam vel pretium neque. Aliquam ultrices efficitur arcu quis interdum. In vel ex felis. Donec sed sapien ullamcorper, maximus justo vitae, volutpat diam.\r\n\r\nNunc id justo sed ante hendrerit vestibulum a ac orci. Etiam rhoncus neque sem, sagittis mattis justo vehicula nec. Aenean consequat sagittis turpis sed facilisis. Phasellus blandit pharetra rhoncus. Nulla porta efficitur porta. Nunc pharetra sapien purus, commodo bibendum quam porta sit.'),
(4, 'April-11-2022 04:40:11', 'New Variant !', 'News', 'Pratyay', 'coronavirus-4972480_1280.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dolor magna, cursus vel mollis id, sagittis non orci. Nulla aliquet massa non felis tempor egestas. Ut ut egestas turpis, eget mollis eros. Sed lobortis orci ac volutpat venenatis. Pellentesque turpis nulla, condimentum consequat bibendum ac, auctor at lorem. Vestibulum porta laoreet mollis. Nullam vel pretium neque. Aliquam ultrices efficitur arcu quis interdum. In vel ex felis. Donec sed sapien ullamcorper, maximus justo vitae, volutpat diam.\r\n\r\nNunc id justo sed ante hendrerit vestibulum a ac orci. Etiam rhoncus neque sem, sagittis mattis justo vehicula nec. Aenean consequat sagittis turpis sed facilisis. Phasellus blandit pharetra rhoncus. Nulla porta efficitur porta. Nunc pharetra sapien purus, commodo bibendum quam porta sit.'),
(6, 'April-29-2022 01:43:13', 'Blockchain', 'Technology', 'Pratyay', 'bitcoin-g775e890e3_1920.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(7, 'April-29-2022 01:44:02', 'Software Testing', 'Technology', 'Pratyay', 'computer-g6b3479701_1920.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign_Relation` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
