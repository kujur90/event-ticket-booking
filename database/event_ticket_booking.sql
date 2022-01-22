-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 04:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_ticket_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Bhaskar', 'Gogoi', 'thebhaskargogoi@gmail.com', '$2y$10$O2boTTznB6pV8aQy226nVOrA2HmpIkvxbjUn04QVtxt1ZPQ4tLhaG'),
(2, 'Admin', 'Super', 'admin@admin.com', '$2y$10$LxaqShmNVKaGVlKyCf39VOr7Ek1KaFzaCqzojxdXiMOKlByHzUM/C');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `total_price` varchar(11) NOT NULL,
  `payment_reference_id` int(11) NOT NULL,
  `booking_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `date`) VALUES
(1, 'Bhaskarjyoti Gogoi', 'thebhaskargogoi@gmail.com', '7002072619', 'asasas', '2021-04-03 07:45:19'),
(2, 'Ram Da', 'ramda@gmail.com', '9876543212', 'Hello Ram da bali nai neki oo?', '2021-04-03 07:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `organized_by` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_type` varchar(20) NOT NULL,
  `event_mode` varchar(10) NOT NULL,
  `hosted_by` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` varchar(3) NOT NULL,
  `price` double NOT NULL,
  `max_tickets` int(5) NOT NULL,
  `about` text NOT NULL,
  `address_area` varchar(50) DEFAULT NULL,
  `address_locality` varchar(50) DEFAULT NULL,
  `address_city` varchar(50) DEFAULT NULL,
  `address_state` varchar(50) DEFAULT NULL,
  `address_pin` int(8) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `organized_by`, `event_name`, `event_type`, `event_mode`, `hosted_by`, `date`, `time`, `duration`, `price`, `max_tickets`, `about`, `address_area`, `address_locality`, `address_city`, `address_state`, `address_pin`, `status`) VALUES
(40, 15, 'Masterclass: Evolution of Digital Supply Chains Bu', 'Talks', 'Online', 'Frederic Gomer', '2021-05-21', '12:30:00', '2', 450, 500, 'Your supply chain is disrupted. Your team is working heroically to source materials in a challenging ecosystem. But your existing supply chain technologies aren’t flexible enough to support you. You need to make your legacy ERP and SCM solutions adapt and extend fast.', '', '', '', '', 0, 'Approve'),
(41, 15, 'Kenny Sebastian : Explain Yourself', 'Stand Up', 'Offline', 'Kenny Sebastian', '2021-05-27', '17:45:00', '1', 200, 700, 'A one hour show where Kenny takes you through a process of explaining a lot of things. Including himself. With anecdotes, definitions and jokes, A humorous intimate live experience.', 'The Habitat', 'Khar West', 'Mumbai', 'Maharashtra', 400052, 'Approve'),
(42, 15, 'Good Vibes-Music', 'Music', 'Online', 'Zoom', '2021-04-30', '08:00:00', '3', 450, 500, 'Experience the power of elegant voices as they come together to light up your day with pop, indie pop, rap and various other genres!', '', '', '', '', 0, 'Approve'),
(43, 15, 'Music Unfiltered Open Mic and Jam Session', 'Music', 'Offline', 'Lewis', '2021-06-17', '16:00:00', '2', 300, 1000, 'Hooted1ce is going to its new venue for the singer-songwriters and musicians and singers who do covers,and for the people who love music.So, if you are a singer-songwriter or want to experience the music of the people which comes from their heart and which has never been heard and the music which is there already and people sing as there own, the music which is unfiltered and raw, the music which has emotions, dedication and efforts, then this is the right place. Come and witness the unheard.Come and Join for some jam session along with our open mic.To register whatsapp on 7045011032 with your name.', 'Funkaar Dance Studio', 'Andheri', 'Mumbai', 'Maharashtra', 400053, 'Approve'),
(44, 15, 'Music Unfiltered Open Mic ft. Viraj', 'Music', 'Offline', 'Viraj', '2021-06-28', '15:00:00', '2', 399, 600, 'Hooted1ce is coming to Funkaar for the singer- songwriters and musicians and singers who do covers, and for the people who love music. So, if you are a singer- songwriter or want to experience the music of the people which comes from their heart and which has never been heard and the music which is there already and people sing as there own, the music which is unfiltered and raw, the music which has emotions, dedication and efforts, then this is the right place. Come and witness the unheard. Come and Join for some jam session along with our open mic. To register whatsapp on 7045011032 with your name', 'Funkaar Dance Studio', 'Andheri', 'Mumbai', 'Maharashtra', 400053, 'Approve'),
(45, 15, 'DiGi Open Mic-Music', 'Music', 'Online', 'DiGi', '2021-06-18', '13:00:00', '2', 299, 300, 'To be bedazzled to the elegant voice is what attracts the masses. When words have the power to come together and brighten our day we feel blessed. Therefore The Mental Talkies presents to you DiGi Open Mic Music. Come join us and freshen up your mind!', '', '', '', '', 0, 'Approve'),
(46, 15, 'Gaurav Kapoor Live- Online Sitdown Comedy', 'Stand Up', 'Online', 'Gaurav Kapoor', '2021-07-13', '13:00:00', '2', 450, 450, 'Gaurav Kapoor, the funny one from Delhi is back in action with his first ever online comedy show. His razor-sharp wit and candid humour lead him to win almost every open-mic he has ever participated in. Gaurav is a regular featured act at comedy clubs across the country and has performed on the biggest of stages including opening for Vir Das and Russell Brand on his India tour. Since then, he has done numerous live shows, released videos on YouTube and have also released a stand up special, HahaKaar (IMDB Rating – 8.2), on Amazon Prime. His shows are a mix of observational humour and anecdotes where he narrates stories from corporate offices, festivals, 90’s era, food, travel and his marriage. The stories could be 100% true or could be 100% made up. You can only guess. The best thing is, his friends say that the stories he narrates off stage are even funnier but we may never know.', '', '', '', '', 0, 'Approve'),
(47, 15, 'Himalayan River Painting Workshop', 'Workshop', 'Offline', 'Bombay Drawing Room', '2021-07-07', '10:00:00', '5+', 1100, 200, 'Bombay Drawing Room brings you OFFLINE workshops!! Yay!\r\n\r\nFinally the wait is over! Explore your creativity and express yourself through art in our offline workshops. The workshops will be hosted in the café and we will be providing you all the material which is required for the event. Our experienced artist will be guiding you throughout the workshop with step by step instructions! No need to have any experience in painting or sketching. Limited seats are available.', 'Episode One', 'Powai', 'Mumbai', 'Maharashtra', 400076, 'Approve'),
(48, 15, 'Learn the Art of Storytelling', 'Workshop', 'Online', 'Jay Kumar', '2021-05-12', '13:00:00', '2', 799, 600, 'Storytelling to influence is a hot topic today. However, telling stories to influence your team and other people around you is one of those “easier said than done” things in life, right? \r\n\r\n\r\n\r\nAnyone can tell a story for fun, but a story to influence is a little different and with a different intended outcome. How would you develop your inner library of stories that can be put to use to build your personality and circle of influence? That\'s what this course is all about.\r\n\r\n\r\n\r\nJay Kumar Hariharan is one of the most influential Story-Tellers of our times and has helped top management (including CEOs) of huge multi-national conglomerates, create amazing presence for themselves. The kind of presence that inspires, leads, and motivates.\r\n\r\n\r\n\r\nJoin him as he takes us on this beautiful journey of stories - right from the first story ever to the stories that have merged into our thoughts and impacted the consciousness of the world we live in today.', '', '', '', '', 0, 'Approve'),
(49, 15, 'Art & Drawing - Junior Kids', 'Workshop', 'Offline', 'Hobbystation', '2021-04-22', '10:00:00', '2', 599, 100, 'Give your child a chance to embrace their artistic side.\r\n\r\n\r\n\r\nIn this course, we teach the child the fundamentals of drawing and colouring like drawing objects of different shapes perfectly, simple memory drawing and landscapes, colouring (using crayons, colour pencils and brush pens)including shading and knowledge of primary and secondary colours. With each class, you will see your child getting more and more confident with his/her drawing and colouring skills.', 'Paltan Bazar', 'Paltab Bazar', 'Guwahati', 'Assam', 780001, 'Approve'),
(50, 15, 'Stop Motion Animation 2-Day Workshop', 'Workshop', 'Offline', 'Toiing', '2021-05-04', '10:00:00', '5+', 587, 200, 'Introduce your kids to the awesome world of Stop Motion Animation where they learn to make their very first video using the stop motion animation technique.\r\n\r\nLed by a live instructor, this workshop features a masterclass by the legendary Cyrus Broacha and stop motion expert Rucha Dhayarkar.\r\n\r\nDay 1: Kids learn the Stop Motion Animation technique and make their first stop motion video using household things\r\n\r\nDay 2: Kids learn the art of storytelling and create a storyboard for their project\r\n\r\nPost Class Assignment: Make your first Stop Motion Animation Short Film\r\n\r\nWorkshop Details:\r\n\r\nAge: 7 to 14 years\r\n\r\nNo. of Session: 2\r\n\r\nSession Duration: 60 Minutes Session/Day\r\n\r\nFormat: Live Online\r\n\r\nDate & Time: Select batch while adding to cart\r\n\r\nSkills Developed:\r\n\r\nStorytelling and Creative Expression\r\nCollaboration & Team Work\r\nPlanning & Execution\r\nPatience and Attention To Details', 'Chiring Chapori', 'Chowkidingee', 'Dibrugarh', 'Assam', 786003, 'Approve'),
(51, 15, 'One Slight Hitch', 'Play', 'Offline', 'Jeff Goldberg Studio', '2021-05-13', '14:00:00', '2', 200, 300, 'It’s Courtney’s wedding day, and her mom, Delia, is making sure that everything is perfect. The groom is perfect, the dress is perfect, and the decorations (assuming they arrive) will be perfect. Then, like in any good farce the doorbell rings. And all hell breaks loose. So much for perfect.', 'XYZ Complex', 'Baruah Chariali', 'Jorhat', 'Assam', 785001, 'Approve'),
(52, 15, 'Karwan Theatre Group Mumbai DHAPPA', 'Play', 'Offline', 'Karwan Theatre Group', '2021-04-30', '18:00:00', '2', 499, 250, 'Writer & Director: Akshay Mishra\r\n\r\nCast: Puneet Issar, Sharon Chandra, Pavitra Sarkar & Anuradha Athlekar\r\n\r\nShyam, a film director, is intrigued by Iravati, a Kathak dancer, and intends to cast her in his next film. But her brother Kumar, a failed actor, is adamant about keeping Shyam away from Iravati. Instead of it being an act of jealousy, Kumar harbours a deep dark secret. Set against the 1950s era, \'Dhappa\' is submerged in mystique and drama.', 'Prithvi Theatre', 'Juhu', 'Mumbai', 'Maharashtra', 400049, 'Approve'),
(53, 15, 'Marche`s Pop Up Bazar - Summer Flea', 'Exhibition', 'Offline', 'Marches', '2021-06-01', '10:00:00', '5+', 500, 1200, 'We bring you the hottest Flea market in town, with a little something for all you beautiful people out there. Come be a part of this magical event with us. With a specially curated selection of displays, brands, labels, and artists, we promise you a fun-packed weekend with us. Also, we have a curated line-up of live music, an over-flowing bar, and a food truck. All of this in the middle of a golf course! We can\'t wait to have you over!', 'Boulder Hills', 'Khajaguda', 'Hyderabad', 'Telengana', 500032, 'Approve'),
(54, 15, 'The Dineout SteppinOut Night Market', 'Exhibition', 'Offline', 'Dineout', '2021-07-15', '09:30:00', '5+', 799, 1500, 'The SteppinOut Night Market brings together the best of shopping, lifestyle, food and fun! This year SteppinOut by Dineout is celebrating 5 years of Night Market, and their anniversary edition is going to be bigger, better and full of exciting elements. \r\n\r\n\r\n\r\nWith over 70+ shopping stalls, 20+ food stalls, paint bar, kids zone, pet zone, spa, live music, games, comedy shows, pottery workshops - there is something for everyone. It is a flea and shopping experience redefined-- all in a new socially distanced avatar at the magnificent Jayamahal Palace in the heart of Bengaluru. \r\n\r\n\r\n\r\nFind the country`s most loved brands, hand-picked & curated specially for you. Shop from a wide collection of clothes, footwear, accessories & home decor among many other things! Indulge yourself in the variety that Bangalore`s best restaurants have to offer along with your furry friends. ', 'Jayamahal Palace Hotel', 'Nandi Durga Road', 'Bengaluru', 'Telengana', 560046, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `organizer_details`
--

CREATE TABLE `organizer_details` (
  `o_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `company` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address_area` varchar(50) NOT NULL,
  `address_locality` varchar(50) NOT NULL,
  `address_city` varchar(50) NOT NULL,
  `address_state` varchar(50) NOT NULL,
  `address_pin` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer_details`
--

INSERT INTO `organizer_details` (`o_id`, `firstname`, `lastname`, `company`, `phone`, `address_area`, `address_locality`, `address_city`, `address_state`, `address_pin`) VALUES
(14, 'Ankur', 'Saikia', 'Royal Enfield', '9876543213', 'Gaurisagar', 'Sivsagar', 'Sivsagar', 'Assam', 785634),
(15, 'Test', 'Organizer', 'Test Company', '9876543210', 'Dowarah Chuk', 'Kumaronisiga', 'Dibrugarh', 'Assam', 786004);

-- --------------------------------------------------------

--
-- Table structure for table `organizer_login`
--

CREATE TABLE `organizer_login` (
  `o_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizer_login`
--

INSERT INTO `organizer_login` (`o_id`, `email`, `password`) VALUES
(14, 'ankursaikia@gmail.com', '$2y$10$/T3FbTMQ/AtjDPEl0Kh6RumnomxGByCfy6BBQfsr4Aryo1lAfGbf6'),
(15, 'testorganizer@gmail.com', '$2y$10$4s31qS7GAVOUIgi6/BkXL.42U0A0CBlWNJGuD/KNo48wgQBNi5iau');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `firstname`, `lastname`, `email`, `phone`, `password`) VALUES
(3, 'Bhaskar ', 'Gogoi', 'thebhaskargogoi@gmail.com', '7002072619', '$2y$10$Q4YGlgCLEXQRunQW8/KdaOrdtYEjq5wR7DhZtOSZc.REWYgOi5C1O'),
(4, 'Test', 'User', 'testuser@test.com', '1234567890', '$2y$10$0PjW6BGBmQxbNvlnjJSCSOoE7/u9F4ZEj4zJGhSE6BcJ84JW1gDFW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `organized_by` (`organized_by`);

--
-- Indexes for table `organizer_details`
--
ALTER TABLE `organizer_details`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `organizer_login`
--
ALTER TABLE `organizer_login`
  ADD UNIQUE KEY `o_id` (`o_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `organizer_details`
--
ALTER TABLE `organizer_details`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`organized_by`) REFERENCES `organizer_details` (`o_id`) ON DELETE CASCADE;

--
-- Constraints for table `organizer_login`
--
ALTER TABLE `organizer_login`
  ADD CONSTRAINT `organizer_login_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `organizer_details` (`o_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
