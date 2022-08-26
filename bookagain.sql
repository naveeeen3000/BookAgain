-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2022 at 11:27 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookagain`
--
USE `bookagain`;
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_password`) VALUES
('kaushikgowda@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookrequests`
--

CREATE TABLE `bookrequests` (
  `request_id` int NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `isbn` int NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `phonenumber` varchar(15) DEFAULT NULL,
  `request_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_isbn` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `book_author` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `book_image` varchar(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `book_descr` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `publisher_name` varchar(30) NOT NULL,
  `book_category` varchar(30) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_isbn`, `book_title`, `book_author`, `book_image`, `book_descr`, `book_price`, `publisher_name`, `book_category`, `date_added`) VALUES
('1', 'The fault in our stars', 'John green', 'o.jpg', 'The Fault In Our Stars is a fabulous book about a young teenage girl who has been diagnosed with lung cancer and attends a cancer support group. Hazel and Augustus embark on a roller coaster ride of emotions, including love, sadness and romance, while searching for the author of their favourite book.', '250.00', 'Dutton Books', 'Fiction', '2021-05-31'),
('10', 'Sapiens', 'Yuval noah harari', '713jIoMO3UL.jpg', 'Through science and technology they have the power and intelligence to become gods and create new artificial life and recreate themselves.', '150.00', 'Dvir Publishing House Ltd', 'Non-fiction', '2021-09-11'),
('11', 'Wings of fire', 'A. P. J. Abdul Kalam', '51wbVQTpTgL._SX339_BO1,204,203,200_.jpg', 'The Wings of Fire is an autobiography of former Indian President APJ Abdul Kalam. The book covers his life before he became the President of India and commanded the armed forces. Renowned scientist and former Indian President APJ Abdul Kalam from 2002 to 2007 is well known across India and abroad as well.', '150.00', 'Universities Press', 'Non-fiction', '2021-09-11'),
('12', 'What young india wants', 'Chetan Bhagat', '51s7n+IaiwL.jpg', 'What Young India Wants is a nonfiction book by Chetan Bhagat. A compilation of his speeches and essays, it focuses on Indian society, politics the youth.', '150.00', 'Rupa Publications', 'Non-fiction', '2021-09-11'),
('13', 'Dream with Your Eyes Open', 'Ronnie Screwvala', 'images.jpg', 'The book –an insider\'s account of what it takes to start, build and scale businesses in India -details Screwvala\'s vast entrepreneurial experiences gathered over twenty years of building amazing and not so amazing businesses. The book is inclined at bringing out clarity in the way business setup is changing.', '200.00', 'Rupa Publications', 'Business', '2021-09-11'),
('14', 'Connect the Dots', 'Rashmi Bansal', 'images (1).jpg', 'Connect The Dots is a collection of 20 inspiring stories of entrepreneurs who never went to any B-school. Written in the form of a conversation, where the author questions the subjects and complements their words with insightful statements as well. If you are an entrepreneur you will resonate well with her words.', '220.00', 'Westland Press', 'Business', '2021-09-11'),
('15', 'Grandma\'s Bag of Stories', 'Sudha Murthy', '81jv44QdNwL.jpg', 'Grandma\'s Bag Of Stories contains the stories that the grandmother narrates to entertain the seven young children.The stories feature several characters like a queen who discovers silk, a princess who is turned into an onion, a lazy man, an angry bear, cheats and kings, and mice and monkeys.', '190.00', 'Puffin Books', 'Children', '2021-09-11'),
('16', 'Malgudi Days', 'R. K. Narayan', '81V009r2EkL.jpg', 'The book includes 32 stories, all set in the fictional town of Malgudi, located in South India. Each of the stories portrays a facet of life in Malgudi. The New York Times described the virtue of the book as \"everyone in the book seems to have a capacity for responding to the quality of his particular hour.', '150.00', 'Indian Thought Publications', 'Children', '2021-09-11'),
('17', 'Swami and Friends', 'R. K. Narayan', '7195fCTE5wL.jpg', 'Swami and Friends is the story of the tumultuous friendship of Swaminathan, his four childhood friends, and a new boy named Rajam. It takes place in British-colonial India in the year 1930.', '140.00', 'Indian Thought Publications', 'Children', '2021-09-11'),
('18', 'The Jungle Book', 'Rudyard Kipling', '91Tkd1W6MZL.jpg', 'The Jungle Book by Rudyard Kipling is an adventure story about a man-cub named Mowgli. Mowgli is hunted by an evil tiger named Shere Khan. Mowgli tries to live a peaceful life with other humans, but is too wild for them and too human for the wolves. Eventually Mowgli finds a home in the jungle with a pack of his own.', '200.00', 'Macmillan Publishers', 'Children', '2021-09-11'),
('2', 'Life of pi', 'Yann Martel', 'm.jpg', 'Yann Martel’s Life of Pi is the story of a young man who survives a harrowing shipwreck and months in a lifeboat with a large Bengal tiger named Richard Parker. To illustrate how true and real the threat is, he forces the children to watch the tiger kill and eat a goat.', '200.00', 'Random House of Canada', 'Fiction', '2021-05-31'),
('3', 'The art of racing in the Rain', 'Garth Stein', 'l.jpg', 'The novel follows the story of Denny Swift, a race car driver and customer representative in a Seattle BMW dealership, and his dog, Enzo, who believes in the legend that a dog \"who is prepared\" will be reincarnated in his next life as a human.', '120.00', 'HarperCollins', 'Fiction', '2021-05-31'),
('4', 'The book of chaos', 'Jessica Renwick', 'i.jpg', 'A magical book. An enchanted forest. ... When a strange book lands in Fable\'s lap and her cousin disappears into its pages, she follows, hurtling into an enchanted forest far from the rolling hills of her home. This is a land filled with strange people, magical creatures, and more danger than Fable has ever dreamed of.', '300.00', 'starfall', 'Fiction', '2021-05-31'),
('5', 'Dancing to my death', 'Daniel O\'Leary', 'k.jpg', 'Completed just before his death in January 2019, this book is an incredibly raw and courageous account. It pulls no punches in terms of Daniel\'s struggles to cope with his diagnosis, the challenges of cancer treatment and the emotional rollercoaster of facing his own death. The book reveals a soul in chaos.', '130.00', 'Columba Press', 'Fiction', '2021-06-04'),
('6', 'The Immortals of Meluha', 'Amish Tripathi', 'The_Immortals_Of_Meluha.jpg', 'The Immortals of Meluha is the first book of Amish Tripathi, first book of Amishverse, and also the first book of Shiva Trilogy. The story is set in the land of Meluha and starts with the arrival of the Shiva. The Meluhans believe that Shiva is their fabled saviour Neelkanth.', '150.00', 'Westland Press', 'Fiction', '2021-06-04'),
('8', '2 states the story of my marriage', 'Chetan Bhagat', '2_States_-_The_Story_Of_My_Marriage.jpg', '2 States: The Story of My Marriage commonly known as 2 States is a 2009 novel written by Chetan Bhagat. It is the story about a couple coming from two different states in India, who face hardships in convincing their parents to approve of their marriage.', '120.00', 'Rupa Publications', 'Fiction', '2021-06-04'),
('9', 'Think like a monk', 'Jay shetty', '81s6DUyQCZL.jpg', 'Think Like a Monk shows you how to clear the roadblocks to your potential by overcoming negative thoughts, accessing stillness, and creating true purpose. It can be challenging to apply the lessons of monks to busy lives.', '160.00', 'Simon & Schuster', 'Non-fiction', '2021-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `user_email`, `name`, `number`, `address`, `city`, `zipcode`, `country`) VALUES
(264, 'kaushikgowda@gmail.com', 'kaushik ', '9663157055', '11, 1st main road', 'bangalore', '560032', 'India'),
(265, 'chandangowda@gmail.com', 'chandan gowda', '9999999999', '12', 'bangalore', '777777', 'India'),
(266, 'prerana@gmail.com', 'chandan gowda', '9999999999', 'k', 'jj', '888888', 'Afganistan');

-- --------------------------------------------------------

--
-- Table structure for table `customersupport`
--

CREATE TABLE `customersupport` (
  `support_id` int NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `number` varchar(12) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `replies` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `feedback_category` varchar(20) NOT NULL,
  `rating` int NOT NULL,
  `review` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `user_email`, `feedback_category`, `rating`, `review`, `date`) VALUES
(7, 'prerana@gmail.com', 'bug', 3, '', '2021-09-18 03:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `subscription_id` int NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `subscription_type` varchar(30) NOT NULL,
  `subscription_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subscription_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`subscription_id`, `user_email`, `subscription_type`, `subscription_date`, `subscription_price`) VALUES
(54, 'kaushikgowda@gmail.com', 'gold', '2021-09-15 08:58:30', '500'),
(55, 'chandangowda@gmail.com', 'silver', '2021-09-17 23:43:45', '300'),
(56, 'kaushik1@gmail.com', 'silver', '2021-09-18 02:42:26', '300'),
(57, 'prerana@gmail.com', 'gold', '2021-09-18 03:46:27', '500');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationid` int NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `notification` text NOT NULL,
  `notification_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notification_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationid`, `user_email`, `notification`, `notification_time`, `notification_status`) VALUES
(342, 'kaushikgowda@gmail.com', 'Welcome to the world of books, We are happy to have you', '2021-09-15 08:52:21', 'unread'),
(343, 'kaushikgowda@gmail.com', 'Become a premium user and get discounts', '2021-09-15 08:52:21', 'unread'),
(344, 'kaushikgowda@gmail.com', 'Thank you, your request for premium subscription has been made, we will verify and approve it soon', '2021-09-15 08:58:15', 'unread'),
(345, 'kaushikgowda@gmail.com', 'Congrats on becoming a premium user, Please check your profile for more details', '2021-09-15 08:58:30', 'unread'),
(346, 'chandangowda@gmail.com', 'Welcome to the world of books, We are happy to have you', '2021-09-17 23:40:07', 'unread'),
(347, 'chandangowda@gmail.com', 'Become a premium user and get discounts', '2021-09-17 23:40:07', 'unread'),
(348, 'chandangowda@gmail.com', 'Thank you, your request for premium subscription has been made, we will verify and approve it soon', '2021-09-17 23:42:34', 'unread'),
(349, 'chandangowda@gmail.com', 'Congrats on becoming a premium user, Please check your profile for more details', '2021-09-17 23:43:45', 'unread'),
(350, 'kaushik1@gmail.com', 'Welcome to the world of books, We are happy to have you', '2021-09-18 06:10:29', 'read'),
(352, 'kaushik1@gmail.com', 'Thank you, your request for premium subscription has been made, we will verify and approve it soon', '2021-09-18 02:41:34', 'unread'),
(353, 'kaushik1@gmail.com', 'Congrats on becoming a premium user, Please check your profile for more details', '2021-09-18 02:42:26', 'unread'),
(354, 'prerana@gmail.com', 'Welcome to the world of books, We are happy to have you', '2021-09-18 07:09:34', 'read'),
(356, 'prerana@gmail.com', 'Thank you for your valuable feedback, We will continue to serve you better', '2021-09-18 03:42:21', 'unread'),
(357, 'prerana@gmail.com', 'Thank you, your request for premium subscription has been made, we will verify and approve it soon', '2021-09-18 03:46:09', 'unread'),
(358, 'prerana@gmail.com', 'Congrats on becoming a premium user, Please check your profile for more details', '2021-09-18 03:46:27', 'unread'),
(359, 'jangirkri123@gmail.com', 'Welcome to the world of books, We are happy to have you', '2022-08-24 12:26:24', 'unread'),
(360, 'jangirkri123@gmail.com', 'Become a premium user and get discounts', '2022-08-24 12:26:24', 'unread'),
(361, 'ronaldocr7@gmail.com', 'Welcome to the world of books, We are happy to have you', '2022-08-24 16:51:12', 'unread'),
(362, 'ronaldocr7@gmail.com', 'Become a premium user and get discounts', '2022-08-24 16:51:12', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `orderid` int UNSIGNED NOT NULL,
  `book_isbn` varchar(15) NOT NULL,
  `item_price` decimal(10,0) NOT NULL,
  `quantity` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`orderid`, `book_isbn`, `item_price`, `quantity`) VALUES
(295, '11', '150', 1),
(295, '12', '150', 1),
(296, '10', '150', 1),
(296, '11', '150', 1),
(297, '10', '150', 1),
(297, '5', '130', 1),
(295, '11', '150', 1),
(295, '12', '150', 1),
(296, '10', '150', 1),
(296, '11', '150', 1),
(297, '10', '150', 1),
(297, '5', '130', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_email` varchar(30) DEFAULT NULL,
  `review_id` int NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `book_isbn` int DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `review` text NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_dob` date NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `membership` int NOT NULL,
  `user_number` varchar(15) DEFAULT NULL,
  `user_gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_dob`, `user_email`, `user_password`, `membership`, `user_number`, `user_gender`) VALUES
(1, 'Naveen Kumar', '2022-08-14', 'jangirkri123@gmail.com', 'b011d326d3949a3f3d5cf7fc2a12cdc0', 0, '', 'male'),
(5041, 'Kaushik Gowda', '2001-04-01', 'kaushikgowda@gmail.com', '16d7a4fca7442dda3ad93c9a726597e4', 4, '9663157055', 'male'),
(5046, 'chandan', '2021-09-01', 'chandangowda@gmail.com', '41c57a8dc328de9b57ff5ec61b3817a9', 3, '9999999999', 'male'),
(5052, 'kaushik', '2021-09-24', 'kaushik1@gmail.com', '9347a48a701e60504e96042d9afe212b', 3, '', 'male'),
(5058, 'prerana', '2021-09-01', 'prerana@gmail.com', 'c9ae7eae19ca03a1a9f62bacfc6dcb3f', 4, NULL, NULL),
(5059, 'Nischith Rao P R', '2022-08-13', 'ronaldocr7@gmail.com', '344d401d58f178042af18822a34b03d1', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `bookrequests`
--
ALTER TABLE `bookrequests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_isbn`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customersupport`
--
ALTER TABLE `customersupport`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookrequests`
--
ALTER TABLE `bookrequests`
  MODIFY `request_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `customersupport`
--
ALTER TABLE `customersupport`
  MODIFY `support_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `subscription_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5060;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
