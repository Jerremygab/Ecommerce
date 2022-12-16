-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 05:59 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(12, 1, 2, 'RK84 75% WIRELESS MECHANICAL GAMING KEYBOARD', 4000, 1, '\\rk841.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 1, 'jerremy', 'jerremy@gmail.com', '123123123', 'sadadawdasd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'jerremy', '123123123', 'jerremy@gmail.com', 'Cash on delivery', '123, Sala, Tanauan, Bats, Philippines - 2332', 'RK96 96% Wireless Mechanical Keyboard (4600 x 1) - GAMAKAY TK68 65% RGB Mechanical Keyboard (4670 x 3) - ', 18610, '2022-07-23', 'completed'),
(2, 1, 'Jerremy', '123123', 'jerremy@gmail.com', 'Cash on delivery', '123123, Sala, Tanauan, Batangas, Philippines - 4232', 'RK68 65% WIRELESS MECHANICAL GAMING KEYBOARD (3200 x 1) - GAMAKAY LK67 65% RGB MECHANICAL GAMING KEYBOARD (5065 x 1) - RK84 75% WIRELESS MECHANICAL GAMING KEYBOARD (4000 x 1) - RK61 60% WIRELESS MECHANICAL GAMING KEYBOARD (2900 x 1) - GAMAKAY MK68 65% RGB MECHANICAL GAMING KEYBOARD (3650 x 1) - GAMAKAY TK68 65% RGB MECHANICAL GAMING KEYBOARD (4670 x 1) - Keychron K2 WIRELESS MECHANICAL GAMING KEYBOARD (3990 x 1) - ', 27475, '2022-07-23', 'completed'),
(3, 1, 'jerremy', '123123', 'jerremy@gmail.com', 'Credit card', '122, sala tanauan city batangas, tanauan city, batangas, Philippines - 1233', 'RK84 75% WIRELESS MECHANICAL GAMING KEYBOARD (4000 x 1) - RK96 96% WIRELESS MECHANICAL GAMING KEYBOARD (4600 x 1) - ', 8600, '2022-07-23', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`) VALUES
(1, 'RK96 96% WIRELESS MECHANICAL GAMING KEYBOARD', '96 KEYS, REDEFINE FULL-SIZE KEYBOARDS. Only 6 keys missing, the 96% keyboard with a number pad and offset arrow keys is built for productivity and a tactile typing experience.', 4600, 'rk961.jpg', 'rk962.jpg', 'rk963.jpg'),
(2, 'RK84 75% WIRELESS MECHANICAL GAMING KEYBOARD', '75% Wireless Gaming Keyboard\r\n-The innovative 75% unique layout differs from traditional TKL keyboards, which cuts more clumsy space off while supporting the same functionality as practical arrow, multimedia and control keys.', 4000, '\\rk841.jpg', '\\rk842.jpg', '\\rk843.jpg'),
(3, 'RK68 65% WIRELESS MECHANICAL GAMING KEYBOARD', '68 Keys, Just Perfect\r\n-65% compact designed layout with individual arrow keys and control keys, which is a huge optimization of 60% and 70% layout. Still compact size with more friendly and easier command input.', 3200, '\\rk651.jpg', '\\rk652.jpg', '\\rk653.jpg'),
(4, 'RK61 60% WIRELESS MECHANICAL GAMING KEYBOARD', 'Mini Portable Size\r\n11.5 X 4 inches mini compact size plus 0.5kg lightweight frame, portable for carrying outside for working or entertaining not only for indoor use.', 2900, '\\rk611.jpg', '\\rk612.jpg', '\\rk613.jpg'),
(5, 'GAMAKAY LK67 65% RGB MECHANICAL GAMING KEYBOARD', 'Gamakay LK67 is a 65% NKRO 67 keys gaming mechanical keyboard with knob and with PBT double shot pudding keycaps.', 5065, '\\lk671.jpg', '\\lk672.jpg', '\\lk673.jpg'),
(6, 'GAMAKAY MK68 65% RGB MECHANICAL GAMING KEYBOARD', 'Gamakay MK68 is a 65% gaming mechanical keyboard with PBT double shot pudding keycaps. Make your finger feel more smoother and more durable, and not easy to shine as ABS keycaps.', 3650, '\\mk681.jpg', '\\mk682.jpg', '\\mk683.jpg'),
(7, 'GAMAKAY TK68 65% RGB MECHANICAL GAMING KEYBOARD', 'Gamakay TK68 is a 65% gaming mechanical keyboard with XDA profile PBT keycaps. 68 keys keyboard, compact size and easy to carry out.', 4670, '\\tk681.jpg', '\\tk682.jpg', '\\tk683.jpg'),
(8, 'Keychron K2 WIRELESS MECHANICAL GAMING KEYBOARD', 'K2 (Hot-swappable) version is a tactile wireless mechanical keyboard with Mac and Windows compatibility, and convenient access to all the essential function keys, with the largest battery seen in a mechanical keyboard.', 3990, '\\k21.jpg', '\\k22.jpg', '\\k23.jpg'),
(9, 'GLORIOUS MODEL 0 WIRED GAMING MOUSE', 'MODEL O\r\n\r\nFull size ambidextrous shape with unparalleled features. Ideal for Medium to Large sized hands.ASCENDED CORD\r\n\r\nLIGHT AND FLEXIBLE,\r\n\r\nLIKE IT\'S NOT EVEN THERE\r\n\r\nStock cables suck. Say goodbye to 3rd party mods, and say hello to the Ascended Cord. Our proprietary braided cable is ultra-flexible and super lightweight.', 2700, '\\gmow1.jpg', '\\gmow2.jpg', '\\gmow3.jpg'),
(10, 'GLORIOUS MODEL 0 WIRELESS GAMING MOUSE', 'Model O Wireless has the lowest wireless latency of any mouse in its class. The state-of-the-industry technology provides responsive, crisp clicks and no double-clicking. MOW is one of the lightest wireless mice of its kind. Weighing in at just 69 grams.', 3990, '\\gmo1.jpg', '\\gmo2.jpg', '\\gmo3.jpg'),
(11, 'GLORIOUS MODEL D WIRED GAMING MOUSE', 'THIS IS MODEL D, THE MOST COMFORTABLE LIGHTWEIGHT ERGONOMIC RGB GAMING MOUSE\r\n\r\nEnvisioned by a community of passionate gamers, and developed by a team who accepts nothing less than perfection - Model D will elevate your play to unimaginable heights. Built for speed, control, and comfort - we packed a full suite of ultra-premium features into an impossibly lightweight, ergonomic frame. Welcome to the next level of Competitive E-Sports gaming. Prepare for Ascension.', 2790, '\\gmdw1.jpg', '\\gmdw2.jpg', '\\gmdw3.jpg'),
(12, 'GLORIOUS MODEL I WIRED GAMING MOUSE', 'MODEL I\r\nOur most feature-rich lightweight mouse yet. 9 Programmable buttons with 2 customizable magnetic thumb buttons put you in control. Looking at the highly-comfortable ergonomic shape, it\'s hard to believe the Model I is only 69 g.', 2900, '\\gmi1.jpg', '\\gmi2.jpg', '\\gmi3.jpg'),
(13, 'LOGITECH G PRO WIRELESS GAMING MOUSE', 'PRO Wireless was designed to be the ultimate gaming mouse for esports professionals. Over a 2 year period, Logitech G collaborated with more than 50 professional players to find the perfect shape, weight and feel combined with our LIGHTSPEED wireless and HERO 25k sensor technologies. The result is a gaming mouse with unrivaled performance and precision, giving you the tools and confidence needed to win.', 6490, '\\pro1.jpg', '\\pro2.jpg', '\\pro3.jpg'),
(14, 'LOGITECH G PRO X WIRELESS GAMING MOUSE', 'Our lightest PRO mouse yet, PRO X SUPERLIGHT is an engineering breakthrough achieving a weight of less than 63 grams—nearly 25% lighter than our standard PRO Wireless mouse. This was accomplished through meticulous engineering to produce extreme weight reduction with zero compromises to performance.', 7090, '\\prox1.jpg', '\\prox2.jpg', '\\prox3.jpg'),
(15, 'LOGITECH G604 WIRELESS GAMING MOUSE', 'Your power, your control. Conquer MOBA, MMO, and Battle Royale gameplay with the strategically designed G604 LIGHTSPEED Wireless Gaming Mouse. 15 programmable controls join forces with ultra-fast LIGHTSPEED dual connectivity and the class-leading HERO 25K sensor. It’s a multifaceted battle weapon that lets you play longer, play better, and make your play.', 3890, '\\g61.jpg', '\\g62.jpg', '\\g63.jpg'),
(16, 'AEROX 9 WIRELESS GAMING MOUSE', 'Engineered with an ultra-lightweight 89g design for comfort and versatility, making it perfect for MOBA, MMO, and other complex games.\r\nErgonomic 18-button programmable layout with a 12-button side panel made for quick access to abilities and macros, in an easy-to-learn design.', 7790, '\\a91.jpg', '\\a92.jpg', '\\a94.jpg'),
(17, 'FIFINE K658 RGB MICROPHONE', 'FIFINE K658 USB dynamic cardioid microphone with a live monitoring, gain control, mute button. It is as quiet as a common dynamic, but not that quiet to make an external preamp necessary for getting some decent volume of sound. If you have not got used to leaning close to a microphone, the FIFINE\'s best trick - high-end clarity will have you covered. But anyway, it is always good to keep a consistent 5 inches talking distance to whatever mic you use.  ', 4790, '\\k61.jpg', '\\k62.jpg', '\\k63.jpg'),
(18, 'FIFINE A8 RGB MICROPHONE', 'The combo of low-cut frequency response and decent mids and highs makes the best clarity for the price.\r\nPlug & play on Windows, Mac, and PlayStation console.\r\nShock mount and desk stand come fully equipped. But also fit in any arm stand with the included adapater.\r\nMost handy controls in game: physical gain & tap-to-mute button.\r\nThe RGB blends into whatsoever lighting setup for having multile patterns to choose from.\r\nLight off & headphone in, engage working mode in a jiffy.', 4590, '\\a81.jpg', '\\a82.jpg', '\\a83.jpg'),
(19, 'HYPERX QUADCAST S RGB MICROPHONE', 'The HyperX QuadCast™ S is a USB condenser microphone that both sounds great and looks great. The supremely stunning RGB lighting and dynamic effects will add style and flair to any stream or setup and is customizable via HyperX NGENUITY software. The QuadCast S is an all-inclusive mic, featuring an anti-vibration shock mount to help quiet the rumbles of daily life and a built-in pop filter to muffle plosive sounds.', 5590, '\\qc1.jpg', '\\qc2.jpg', '\\qc3.jpg'),
(20, 'HYPERX DUOCAST RGB MICROPHONE', 'Featuring an elegant design, a low-profile shock mount, and a tasteful RGB light ring, the HyperX DuoCast is a full-featured USB microphone that’s built for gaming, working, and content creation. It shares the fan-favorite features of its HyperX mic siblings, such as tap-to-mute, and the vibrant LED mic mute indicator, but also brings its own unique, subtle style. A low-profile shock mount complements the sleek, minimalist aesthetic, while also absorbing vibrations, and taking up less space.', 4590, '\\dc1.jpg', '\\dc2.jpg', '\\dc3.jpg'),
(21, 'HYPERX CLOUD REVOLVER GAMING HEADSET', 'The HyperX Cloud Revolver™ is primed with HyperX 7.1 surround sound and a wider sound stage to hear in-game audio in precise detail. The studio-grade sound stage provides vivid sound with distance and depth making it perfect for FPS and open world environments.', 4890, '\\rev1.jpg', '\\rev2.jpg', '\\rev3.jpg'),
(22, 'HYPERX CLOUD MIX GAMING HEADSET', 'HyperX Cloud MIX™ is a versatile wired gaming headset that converts to a lightweight portable Bluetooth® headset. While using the wired connection, it is capable of pumping out rich Hi-Res Audio at frequencies from 10Hz to 40kHz, so you can hear details and nuances in your audio you might have missed. When the real world beckons, answer the call and unplug to switch to the wireless Bluetooth® mode for up to 20 hours of use. ', 6590, '\\mix1.jpg', '\\mix2.jpg', '\\mix3.jpg'),
(23, 'LOGITECH G733 WIRELESS GAMING HEADSET', 'G733 LIGHTSPEED Wireless RGB Gaming Headset. Wireless gaming headset designed for performance and comfort. Outfitted with all the surround sound, voice filters, and advanced lighting you need to look, sound, and play with more style than ever.', 5590, '\\g71.jpg', '\\g72.jpg', '\\g73.jpg'),
(24, 'LOGITECH G435 WIRELESS GAMING HEADSET', 'G435 LIGHTSPEED Wireless Gaming Headset. Play games and music with featherlight comfort and powerful and clean sound. Dual beamforming mics reduce background noise. Connect to your devices via gaming-grade LIGHTSPEED wireless and Bluetooth®.', 3250, '\\g341.jpg', '\\g342.jpg', '\\g343.jpg'),
(25, 'LOGITECH Z906 5.1 SURROUND SOUND SPEAKER ', 'Fully immerse into a premium, theater-quality audio experience in the comfort of your home. This 5.1 speaker system comes with a 1000 Watts Peak/500 Watts RMS power for a rich THX Certified surround sound. With the ability to decode Dolby Digital and DTS encoded soundtracks, Z906 takes your movie and music experience to a whole new level.', 15850, '\\z1.jpg', '\\z2.jpg', '\\z3.jpg'),
(26, 'LOGITECH G560 LIGHTSYNC PC GAMING SPEAKER', '2.1 speaker system with full-spectrum LIGHTSYNC RGB reacts to in-game action and audio. DTS:X Ultra positional surround sound drives explosive, down-firing subwoofer and two satellite speakers with wide-angle drivers.', 11890, '\\g51.jpg', '\\g52.jpg', '\\g53.jpg'),
(27, 'REDDRAGON GS510 WALTZ GAMING SPEAKER', 'Redragon GS510 Waltz Gaming Speaker 2.0 Channel PC Computer Stereo Speaker with 4 Colorful LED Backlight Modes.Enhanced Clear Bass - Equipped with advanced sound drive unit with full range 2.0 channel enhanced stereo core, GS510 offers you superior clear and rich sound.\r\n\r\n\r\nTouch Controlled RGB Lighting - Not only the sound quality is solid, but also the lighting bar is attractive. 4 modes are selectable for different ambiances by touch-control, switch off the light is also available.\r\n\r\n', 3290, '\\gs1.jpg', '\\gs2.jpg', '\\gs3.jpg'),
(28, 'REDRAGON GS560 ADIEMUS GAMING SPEAKER', 'The first Redragon RGB soundbar has an upgraded driver that delivers clear and crystal sound quality combined with rich bass. 4 different backlit modes include both dynamic and static glowing LED illumination. Delicate and compact volume knob combined with on/off switch offers you a convenient and precise volume adjustment.', 2650, '\\ag1.jpg', '\\ag2.jpg', '\\ag3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'jerremy', 'jerremy@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(1, 1, 2, 'RK84 75% Wireless Mechanical Keyboard', 4000, '\\rk841.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
