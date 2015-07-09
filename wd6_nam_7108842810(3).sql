-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2015 at 07:37 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wd6_nam_7108842810`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `accountId` int(10) NOT NULL,
  `accountType` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountId`, `accountType`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(10) NOT NULL,
  `adminFirstName` varchar(20) NOT NULL,
  `adminLastName` varchar(20) NOT NULL,
  `adminPassword` varchar(64) NOT NULL,
  `adminUserName` varchar(10) NOT NULL,
  `adminMobile` varchar(15) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `adminImage` varchar(200) DEFAULT NULL,
  `accountId` int(10) NOT NULL,
  `adminJoinDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminFirstName`, `adminLastName`, `adminPassword`, `adminUserName`, `adminMobile`, `adminEmail`, `adminImage`, `accountId`, `adminJoinDate`) VALUES
(1, 'Gracie', 'Nam', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'admin1', '0411360495', 'test@test.com', 'default.jpg', 2, '0000-00-00 00:00:00'),
(2, 'joohee', 'Lee', '6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4', 'admin2', '0123456789', 'test@gmail.com', '', 2, '2015-05-13 14:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `blogId` int(11) unsigned NOT NULL,
  `blogTitle` varchar(100) NOT NULL,
  `blogContent` text NOT NULL,
  `datePosted` datetime NOT NULL,
  `authorId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `blogImage` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogId`, `blogTitle`, `blogContent`, `datePosted`, `authorId`, `categoryId`, `blogImage`) VALUES
(201, 'TOP 5 TIPS \nFOR USING AND STORING\nHANDMADE NATURAL SOAP', 'Here are our Top 5 Tips to enjoy your soap to the very last bubble:  <br /><br /> 1. Store soaps not in use in a covered container that allows air circulation, and in a cool, dry location. Shoe boxes work great for this. If you prefer to store your soaps in plastic, be sure to add ventilation to the container to allow the soaps to breathe. Handmade natural soaps are high in natural glycerin and vegetable oils; non-ventilated storage may result in a “weepy” or rancid soap bar. Keep your stored soaps out of direct sunlight, as natural ingredient colors may fade. Storage life varies, depending upon the formulation of the soap. In general, assuming proper storage, your handcrafted soap should last from 6 to 12 months. <br /><br /> 2. If storing several soaps, it’s best to store similar scents together. Sample categories include: lavender, citrus, mint, spice, tea tree, rosemary, eucalyptus, fruit and floral. The essential oils in handcrafted soaps vary in dominance and mellow over time at different rates. Storing a peppermint (dominant) scent with a citrus (mild) scent may result in the citrus scent taking on a peppermint aroma. Even under the best conditions, citrus scents tend to mellow more quickly than other scents.<br /><br />3. Cut the larger bars in half and use half at a time, storing the unused portion as noted above. Create a “buffet” of half-bar soaps and enjoy a variety of scents during the week!  <br /><br />4. Use a soap dish that offers drainage (e.g. slotted) so the soap can dry between uses. Slotted soap dishes come in many different sizes, shapes and materials. A Google search will offer options such as wooden, ceramic and plastic. Another option is a flexible plastic suction cup soap saver – they’re inexpensive and work well both in the shower and at the sink. Wooden soap dishes can be used in the shower, if there is a high shelf available out of direct contact with water – and if there is adequate ventilation to allow drying between uses. We do not recommend using a ceramic soap dish in the shower, as it may fall and break. <br /><br /> 5. Use a soap saver pouch. Place your bar of soap in the pouch and pull the drawstring closed. Wet the soap and pouch and lather up. When done hang up the pouch, soap and all, to allow it and your soap to dry between uses. Soap saver pouches come in several different materials, such as cotton yarn, ramie and plastic mesh. In addition to lengthening the life of your soap, a soap saver pouch will add a gentle exfoliating scrub. Soap savers are great for using up soap slivers – gather slivers together in the pouch and use until gone.  With proper storage and in-use care, you’ll get the most of your handmade natural soap!', '2015-01-21 00:00:00', 2, 6, '8550_coconutsoap.jpg'),
(202, 'WHAT''S GREAT ABOUT ABSOLUTE HANDMADE SOAP (AND WHY SHOULD YOU CARE)?', 'Before we explain what we mean when we talk about real handmade soap, it''s worth talking about what the soap that most people buy at the supermarket - the stuff most of us grew up using - is. Because that''s a huge part of understanding why Absolute handmade soap feels so great to use, and why we started making it in the first place.<br />The soap that most people think of when you say the word "soap," the stuff you see on store shelves and in restaurant bathrooms is, in fact, pretty much a block of pressed detergent (or a pump dispenser of liquid detergent), akin to what you''d use in your washing machine. It''s made using chemicals with names like sodium laureth sulfate, decyl glucoside and pentasodium pentetate; words you''ll NEVER see on the label of any Absolute handmade soap (which is a good thing, because we can''t pronounce them anyway).<br />Often, even soaps claiming to be "pure," or using words like "natural" (or common variants like "nutri") usually contain these chemicals (or their equivalent cousins). Commercial soaps also often contain petroleum (irritating to people with sensitive skin), esters (known carcinogens), alcohols (which dry your skin), animal tallow (yes, really: animal fat - no kidding) low grade oils, waxes, fillers, detergents and preservatives.<br />But Absolute handmade soap contains none of that. In fact, it has almost nothing in common with those other products besides the word "soap" itself. So the first thing that you need to know about Absolute soap is what it isn''t: it''s not commercially produced, it''s not produced using chemicals, it''s not tested on animals. Ever.\n', '2015-02-19 00:00:00', 1, 2, '8935_homemade-lip-chap.jpg'),
(203, 'CANDLE TIPS', '<p>1. Candle care : Never leave a burning candle unattended.<br />Keep wicks trimmed to 5mm long, as crooked wick can cause uneven burning and dripping.<br />Always burn candles on a protected heat-resistant surface or use candle holders.<br />When first burning a pillar, allow the wax to pool to 1cm of the outside edge. Extinguish and let wax harden before relighting. You will find the candle has a memory and will not burn past this point again, as it has formed a barrier.<br /><br />2. Candle storage: Store in a cool, dark, dry place and store tapered candles flat to prevent warping.</p>', '2015-05-15 15:53:24', 1, 3, '8550_coconutsoap.jpg'),
(204, '4 FOODS YOU SHOULD BE EATING FOR YOUR BEST BODY', '1. Green Beans<br />Filling up on green beans, and other high-fiber foods, can help you prevent weight gain or even promote weight loss without dieting suggests new research in The Journal of Nutrition. Researchers found that women who increased their fiber intake generally lost weight while women who decreased the fiber in their diets gained. The scientists boiled the findings into a single weight-loss formula: boosting fiber by 8 grams for every 1,000 calories consumed resulted in losing about 4 1/2 pounds over the course of the study. Try it for yourself. If you are consuming 2,000 calories per day, aim to increase your fiber by 16 grams. Raspberries, chickpeas and strawberries can also help you get your fill.<br /><br />2. Salmon<br />The omega-3 fatty acids in oily fish such as salmon and tuna can boost your skin’s defenses against UV damage. In a study published earlier this year in the American Journal of Clinical Nutrition, researchers found that those who ate a little more than 5 ounces of omega-3-rich fish each week decreased the development of precancerous skin lesions by almost 30 percent. Scientists think the omega-3s act as a shield, protecting cell walls from free-radical damage.<br /> ', '2015-03-03 00:00:00', 2, 2, '8550_coconutsoap.jpg'),
(205, 'ARE BUBBLE BATHS GOOD FOR MY SKIN? ', 'After a long hard day, just the thought of sinking into a hot bubble bath can help ease your tension, but you may want to give some thought to what you''re soaking in before you plunge into the tub. Bubble baths offer a fun, inexpensive way to relax and reduce stress, but frolicking in that foam may lead to a whole new set of worries. Bubble baths contain surfactants -- ingredients that lower water''s surface tension and cause it to foam -- and fragrances, which make the bath smell good. These ingredients can cause dryness and irritation, especially in people who have allergies or sensitive skin. Bubbles can also cause or aggravate several unpleasant skin conditions, including the following:<br /><br />Contact dermatitis: Those soothing bubbles can result in itchy, red skin that burns and stings [source: American Academy of Dermatology].<br /><br />Dry skin: Bubble bath and other cleansers can strip away natural oils in your skin, causing red, flaky, itchy skin [source: Baumann].<br /><br />Even if you don''t have sensitive skin or an existing skin condition, several ingredients commonly found in bubble baths can put a damper on your bathing bliss. The Campaign for Safe Cosmetics sponsored testing on 48 bath products for children, and its research found that many products -- including those labeled "pure" and "natural" -- contained hazardous chemicals like formaldehyde. However, product manufacturers say they use safe levels of these chemicals [source: Consumer Affairs].<br />', '2015-03-11 00:00:00', 2, 6, '8550_coconutsoap.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(40) NOT NULL,
  `categoryDescription` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `category`, `categoryDescription`) VALUES
(2, 'Boby', ''),
(3, 'Bath', ''),
(4, 'Make Up', ''),
(5, 'Hair', ''),
(6, 'soap', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentId` int(11) NOT NULL,
  `datePosted` datetime NOT NULL,
  `comment` text NOT NULL,
  `productId` int(11) NOT NULL,
  `authorId` int(11) NOT NULL,
  `rating` tinyint(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentId`, `datePosted`, `comment`, `productId`, `authorId`, `rating`) VALUES
(1, '2015-02-12 23:16:31', 'great!', 10, 1, 5),
(4, '2015-02-12 23:50:54', 'I hope it works!!!', 9, 1, 3),
(5, '2015-02-16 22:42:19', 'T,.T', 6, 1, 2),
(6, '2015-02-19 11:49:44', 'sdfsdf', 10, 1, 5),
(7, '2015-02-19 12:46:25', ' Why it doesn''t work!!!???', 10, 1, 5),
(8, '2015-05-03 16:52:18', 'test 1', 0, 1, 4),
(9, '2015-05-03 16:53:37', 'test2\r\n', 0, 1, 3),
(10, '2015-05-03 16:56:38', 'test3', 0, 1, 4),
(11, '2015-05-03 17:07:50', 'sdfsdfsdf', 0, 1, 4),
(12, '2015-05-03 17:10:37', 'sdfsdf', 0, 1, 5),
(13, '2015-05-03 17:30:04', 'Why ?!!', 6, 1, 2),
(14, '2015-05-03 17:32:36', 'asdasd', 2, 1, 3),
(15, '2015-05-03 17:32:39', 'asdasda', 2, 1, 4),
(16, '2015-05-03 23:10:22', 'Hi, there~', 1, 1, 4),
(17, '2015-05-04 12:46:48', '<p>sdfsdf</p>', 4, 1, 3),
(18, '2015-05-05 20:52:01', '<p>hi~</p>', 5, 1, 5),
(19, '2015-05-05 22:45:04', '<p>Lovely bath bomb</p>', 9, 1, 4),
(20, '2015-05-06 00:38:58', '<p>test test</p>', 10, 1, 4),
(21, '2015-05-06 00:39:13', '<p>test test22</p>', 10, 1, 1),
(22, '2015-05-06 11:47:29', '<p>TEST !</p>', 9, 1, 1),
(29, '2015-05-12 19:15:48', '<p>sdfsdfsdf</p>', 7, 1, 4),
(30, '2015-05-13 00:33:43', '<p>sdfsdfsdfsdf</p>', 11, 0, 5),
(31, '2015-05-13 00:34:50', '<p>sdfsdfsd</p>', 12, 0, 4),
(32, '2015-05-13 00:37:22', '<p>It''s beautiful!</p>', 12, 1, 5),
(33, '2015-05-13 00:42:37', '<p>I love it~!</p>', 11, 1, 5),
(34, '2015-05-13 14:16:22', '<p>test, test</p>', 11, 1, 3),
(35, '2015-05-27 18:00:52', '<p>testtest</p>', 5, 1, 3),
(36, '2015-07-01 15:17:09', '<p>Greate!</p>', 9, 4, 5),
(37, '2015-07-01 15:17:36', '<p>I love it!!!</p>', 9, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `current`
--

CREATE TABLE IF NOT EXISTS `current` (
  `themeId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `current`
--

INSERT INTO `current` (`themeId`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackId` int(1) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `dateTime` datetime NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackId`, `firstName`, `lastName`, `email`, `feedback`, `dateTime`, `mobile`) VALUES
(1, 'test', 'test', 'gracie.j.nam@gamil.com', '<p>test email function</p>', '2015-05-18 16:14:21', ''),
(2, 'test', 'test', 'gracie.j.nam@gamil.com', '<p>test</p>', '2015-05-18 16:14:55', ''),
(3, 'test', 'test', 'gracie.j.nam@gamil.com', '<p>test</p>', '2015-05-18 16:20:46', ''),
(4, 'test', 'test', 'gracie.j.nam@gamil.com', '<p>test</p>', '2015-05-18 16:27:27', ''),
(5, 'j', 'n', 'gracie.j.nam@gamil.com', '<p>test</p>', '2015-05-18 16:27:45', ''),
(6, 'jj', 'nn', 'gracie.j.nam@gamil.com', '<p>test test</p>', '2015-05-18 16:28:51', ''),
(7, 'tt', 'ee', 'gracie.j.nam@gamil.com', '<p>testtest</p>', '2015-05-18 16:30:13', ''),
(8, 'tt', 'ee', 'gracie.j.nam@gamil.com', '<p>testtest</p>', '2015-05-18 16:51:24', ''),
(9, 'asd', 'asd', 'gracie.j.nam@gamil.com', '<p>testtest</p>', '2015-05-18 17:40:56', ''),
(10, 'gg', 'ggg', 'gracie.j.nam@gamil.com', '<p>sdfsdfsd</p>', '2015-05-18 17:52:45', ''),
(11, 'gg', 'ggg', 'gracie.j.nam@gamil.com', '<p>sdfsdfsd</p>', '2015-05-18 17:55:25', ''),
(12, 'gg', 'ggg', 'gracie.j.nam@gamil.com', '<p>sdfsdfsd</p>', '2015-05-18 17:55:39', ''),
(13, 'test', 'test', 'gracie.j.nam@gamil.com', '<p>test</p>', '2015-05-18 20:54:25', ''),
(14, 'werwer', 'werwer', 'gracie.j.nam@gamil.com', '<p>werwerwerw</p>', '2015-05-18 22:47:29', ''),
(15, 'sdfsdf', 'sdfsff', 'gracie.j.nam@gamil.com', '<p>sdfsdf</p>', '2015-05-18 22:48:16', ''),
(16, 'sdfsdf', 'sdfsdf', 'gracie.j.nam@gamil.com', '<p>sdfsdf</p>', '2015-05-18 22:48:49', ''),
(17, 'test', 'test', 'gracie.j.nam@gamil.com', '<p>test</p>', '2015-05-19 19:47:02', ''),
(18, 'test', 'test', 'gracie.j.nam@gamil.com', '<p>test email</p>', '2015-05-19 19:53:13', ''),
(19, 'test email', 'test email', 'cogito_@naver.com', '<p>test email second time</p>', '2015-05-19 19:59:00', '123456789'),
(20, 'test again', 'test again', 'gracie.j.nam@gamil.com', '<p>test email again..with gmail</p>', '2015-05-19 20:05:24', '44445555555'),
(21, 'test html form', 'test html form', 'gracie.j.nam@gamil.com', '<p>test html form</p>', '2015-05-19 20:13:14', '1234567345'),
(22, 'border-radius: 3px;', 'border-radius: 3px;', 'cogito_@naver.com', '<p>border-radius: 3px;</p>', '2015-05-19 20:15:08', '234234234234');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `invoiceDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceId`, `userId`, `invoiceDate`) VALUES
(218, 1, '2015-03-04 14:16:33'),
(219, 1, '2015-03-04 14:16:52'),
(220, 1, '2015-03-04 14:17:08'),
(221, 1, '2015-03-04 14:19:18'),
(222, 1, '2015-03-04 14:19:39'),
(223, 1, '2015-03-04 16:23:15'),
(224, 1, '2015-03-04 16:26:14'),
(225, 1, '2015-03-04 16:31:00'),
(226, 1, '2015-03-04 16:32:01'),
(227, 1, '2015-03-04 16:33:05'),
(228, 1, '2015-03-04 16:33:51'),
(229, 1, '2015-03-04 16:34:14'),
(230, 1, '2015-03-04 16:34:42'),
(231, 1, '2015-03-04 16:35:37'),
(232, 1, '2015-03-04 16:36:45'),
(233, 1, '2015-03-11 15:59:26'),
(234, 1, '2015-03-11 15:59:53'),
(235, 1, '2015-03-11 16:00:02'),
(236, 1, '2015-05-03 13:37:16'),
(237, 1, '2015-05-03 13:37:56'),
(238, 1, '2015-05-03 22:34:09'),
(239, 1, '2015-05-03 22:35:01'),
(240, 1, '2015-05-03 22:35:23'),
(241, 1, '2015-05-04 14:31:24'),
(242, 1, '2015-05-05 10:47:42'),
(243, 1, '2015-05-06 11:44:42'),
(244, 1, '2015-05-06 11:46:23'),
(245, 0, '2015-05-13 21:44:17'),
(246, 0, '2015-05-13 21:46:04'),
(247, 0, '2015-05-13 21:55:48'),
(248, 0, '2015-05-13 21:56:43'),
(249, 0, '2015-05-13 22:10:36'),
(250, 0, '2015-05-13 22:11:00'),
(251, 0, '2015-05-13 22:11:53'),
(252, 0, '2015-05-13 22:13:13'),
(253, 0, '2015-05-13 22:13:29'),
(254, 0, '2015-05-13 22:14:05'),
(255, 0, '2015-05-13 22:14:46'),
(256, 0, '2015-05-13 22:15:48'),
(257, 0, '2015-05-13 22:16:18'),
(258, 0, '2015-05-13 22:16:38'),
(259, 0, '2015-05-13 22:17:25'),
(260, 0, '2015-05-13 22:17:50'),
(261, 0, '2015-05-13 22:18:13'),
(262, 0, '2015-05-13 22:18:34'),
(263, 4, '2015-05-13 22:20:41'),
(264, 4, '2015-05-13 22:21:01'),
(265, 4, '2015-05-13 22:23:10'),
(266, 4, '2015-05-13 22:27:05'),
(267, 4, '2015-05-13 22:27:37'),
(268, 4, '2015-05-13 22:28:19'),
(269, 4, '2015-05-13 22:28:34'),
(270, 4, '2015-05-13 22:32:47'),
(271, 4, '2015-05-13 22:33:28'),
(272, 4, '2015-05-13 22:33:43'),
(273, 4, '2015-05-13 22:35:34'),
(274, 4, '2015-05-13 22:37:13'),
(275, 4, '2015-05-13 22:37:38'),
(276, 4, '2015-05-13 22:37:50'),
(277, 4, '2015-05-13 22:38:21'),
(278, 4, '2015-05-13 22:38:45'),
(279, 4, '2015-05-13 22:40:34'),
(280, 4, '2015-05-13 22:40:55'),
(281, 4, '2015-05-13 22:41:25'),
(282, 4, '2015-05-13 22:44:00'),
(283, 4, '2015-05-13 22:48:57'),
(284, 4, '2015-05-13 22:49:56'),
(285, 4, '2015-05-13 22:52:21'),
(286, 4, '2015-05-13 22:52:49'),
(287, 4, '2015-05-13 22:53:09'),
(288, 4, '2015-05-13 22:53:42'),
(289, 4, '2015-05-13 22:54:06'),
(290, 4, '2015-05-13 22:56:28'),
(291, 4, '2015-05-13 23:03:17'),
(292, 4, '2015-05-13 23:04:03'),
(293, 4, '2015-05-13 23:05:31'),
(294, 4, '2015-05-13 23:05:52'),
(295, 4, '2015-05-13 23:06:33'),
(296, 4, '2015-05-13 23:07:51'),
(297, 4, '2015-05-13 23:09:14'),
(298, 4, '2015-05-13 23:09:58'),
(299, 4, '2015-05-13 23:10:16'),
(300, 4, '2015-05-13 23:10:52'),
(301, 4, '2015-05-13 23:11:30'),
(302, 4, '2015-05-13 23:11:35'),
(303, 4, '2015-05-13 23:11:43'),
(304, 4, '2015-05-20 00:57:49'),
(305, 4, '2015-07-01 15:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `productName` varchar(40) NOT NULL,
  `productDescription` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `productImage` varchar(100) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `adminId` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `date`, `productName`, `productDescription`, `price`, `productImage`, `categoryId`, `adminId`) VALUES
(1, '2015-02-10 12:19:00', 'Grapefruit Margarita', 'This tangy, citrus scent with a hint of margarita lime is perfect for that island getaway! 100% vegan soap.', '5.95', 'stetsoncoffesoap.png', 6, 1),
(2, '2015-05-12 19:46:38', 'Seaweed Mint~', '<p>Handmade soap for men + women. We use all vegetable oils and shea butter, leaves your skin soft! Vegan and Cruelty-Free.</p>', '22.00', 'handmade.jpg', 6, 1),
(3, '2015-05-04 19:38:00', 'Floral Lavender Soap', 'A classic scent of floral lavender, our Lavender handmade soap with essential oils smells like a fresh spring day. 100% natural vegan soap.', '5.95', 'aphrodesiac400.jpg', 6, 1),
(4, '2015-03-03 16:33:00', 'Peppermint', 'A classic holiday scent that lasts throughout the year. Peppermint handmade soap with added mint leaves for exfoliation. 100% natural vegan soap.', '5.59', '1168_soap.jpg', 6, 1),
(5, '2015-04-06 10:09:00', 'Heavenly bubbles', 'A French Kiss gives you a relaxed but alert feeling that lasts all day. The Lush French Kiss is a calming and reviving lavender, rosemary and thyme bath, with essential oils from sun-soaked Provence.', '10.99', 'Aylienwrapped.jpg', 3, 1),
(6, '2015-05-01 06:35:00', 'Natural Tinted Lip Balm', 'Natural Tinted (or un-tinted) Lip Balm is a great alternative for those (like me) who do not regularly wear lipstick. It is made with completely natural ingredients and a little goes a really long way.', '19.99', 'NaturalTinted.jpg', 4, 1),
(7, '2015-04-22 13:13:00', 'Dragon''s Egg Bath Boms', 'Bath tub fireworks, fizz, froth, fruity fragrance', '5.59', 'dragons.jpg', 3, 1),
(9, '2015-05-01 14:17:00', 'Space Girl Bath Bomb', 'Here comes a bath bomb of astronomical proportions. We were inspired by The Imagined Village''s intriguing interpretation of Space Girl from their second album, Empire & Love. It''s shaped like Saturn with added space dust for our alien friends, and the refreshing scent of blackcurrant sweeties will make you hungry for your own space adventures. Space Girl is stellar, just remember your blaster and your freezer gun.', '7.50', 'spacegirl.jpg', 3, 1),
(10, '2015-05-01 12:11:00', 'Mother Superior Bubble Bar', 'This new little character will help to deliver us from uncleanliness and leave skin feel soft and smelling of cherry blossoms. Crumble under running water to create a heavenly bubble experience.', '9.95', 'MOTHER SUPERIOR.JPG', 3, 1),
(11, '2015-05-12 19:35:00', 'GODIVA SOLID SHAMPOO BAR ', '<p style="margin: 0px 0px 10px; padding: 0px; list-style-type: none; font-family: arial; font-size: medium; text-align: justify; background-color: transparent !important;">Sexy, jasmine-scented, two-in-one shampoo and conditioner bar. Godiva is named after the woman who famously rode through the streets of Coventry with only her long flowing locks to cover her modesty. She was protesting against the taxes her husband was planning to introduce. Godiva has the same sensual, jasmine scent as Flying Fox and it makes your hair soft.</p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; list-style-type: none; font-family: arial; font-size: medium; text-align: justify; background-color: transparent !important;">How to use Shampoo bars:<br /><span style="font-size: 12px; background-color: transparent !important;">Stroke the bar into your wet hair once or twice. Lather up then rinse clean.&nbsp;</span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; list-style-type: none; font-family: arial; font-size: medium; text-align: justify; background-color: transparent !important;">Store your shampoo bar in a well drained or dry place and it will last you up to 80 washes (that''s longer than some relationships!).</p>', '13.50', 'godiva.jpg', 5, 1),
(12, '2015-05-12 19:54:52', 'NEW SOLID SHAMPOO BAR ', '<p style="margin: 0px 0px 10px; padding: 0px; list-style-type: none; font-family: arial; font-size: medium; text-align: justify; background-color: transparent !important;">timulating spice shampoo bar for tired scalps suffering from hormonal hair loss. In times of stress and hormonal change, like pregnancy and after giving birth, your hair can start to fall out. Fortunately, this is usually temporary, but it&rsquo;s a distressing thing to happen. The New Shampoo Bar is for those times. We make it with bay, clove and cinnamon essential oils to stimulate the scalp. Calming nettle, peppermint and rosemary add shine and soften the hair.&nbsp;</p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; list-style-type: none; font-family: arial; font-size: medium; text-align: justify; background-color: transparent !important;">How to use Shampoo bars:<br />Stroke the bar into your wet hair once or twice. Lather up then rinse clean.</p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; list-style-type: none; font-family: arial; font-size: medium; text-align: justify; background-color: transparent !important;">Store your shampoo bar in a well drained or dry place and it will last you up to 80 washes (that''s longer than some relationships!).</p>', '13.95', '2428_newshampoo.jpg', 5, 1),
(13, '2015-05-13 15:06:23', 'FRESH FARMACY CLEANSER', '<p>Cleansing chamomile and calamine bar for troublesome skin. Fresh Farmacy is the soothing, cleansing bar to reach for whenever you see a spot rearing its ugly head. It makes a tiny bit of froth to clean your face gently, and because it&rsquo;s made with masses of calamine and chamomile, it&rsquo;s one of the most calming cleansers known to humankind. We add rose, tea tree and lavender essential oils for their powerful, skin-calming properties. It doesn''t only deal with spots; it soothes and eases other skin troubles, too.</p>', '15.95', '7169_freshf.jpg', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productinvoice`
--

CREATE TABLE IF NOT EXISTS `productinvoice` (
  `invoiceId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=306 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productinvoice`
--

INSERT INTO `productinvoice` (`invoiceId`, `productId`, `quantity`) VALUES
(1, 1, 1),
(2, 2, 1),
(200, 1, 2),
(204, 1, 1),
(205, 2, 1),
(205, 3, 1),
(206, 2, 1),
(208, 1, 1),
(228, 1, 3),
(228, 4, 4),
(229, 1, 1),
(230, 2, 1),
(230, 4, 1),
(232, 1, 1),
(232, 2, 1),
(236, 2, 1),
(236, 4, 2),
(236, 6, 3),
(236, 9, 1),
(238, 1, 1),
(238, 2, 1),
(238, 3, 1),
(238, 4, 1),
(238, 6, 1),
(238, 9, 1),
(238, 10, 1),
(241, 6, 1),
(241, 7, 1),
(242, 7, 1),
(242, 9, 1),
(243, 9, 1),
(244, 9, 10),
(245, 10, 1),
(245, 12, 1),
(245, 13, 1),
(247, 12, 1),
(248, 12, 1),
(249, 13, 1),
(264, 12, 1),
(264, 13, 1),
(267, 2, 1),
(269, 11, 1),
(269, 13, 1),
(270, 7, 1),
(270, 9, 1),
(270, 10, 1),
(272, 3, 1),
(272, 13, 1),
(273, 5, 1),
(273, 13, 1),
(274, 2, 1),
(274, 12, 1),
(276, 13, 1),
(277, 10, 1),
(278, 13, 1),
(279, 9, 1),
(279, 13, 1),
(281, 7, 5),
(281, 11, 1),
(282, 6, 1),
(283, 10, 1),
(285, 5, 1),
(285, 7, 3),
(287, 10, 3),
(287, 12, 1),
(289, 7, 1),
(289, 11, 5),
(290, 11, 5),
(290, 13, 1),
(292, 4, 1),
(294, 7, 3),
(294, 13, 1),
(296, 13, 1),
(297, 13, 1),
(302, 12, 1),
(304, 11, 1),
(305, 10, 1),
(305, 12, 1),
(305, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `themeId` int(10) NOT NULL,
  `themeName` varchar(20) NOT NULL,
  `themeDescription` varchar(200) NOT NULL,
  `themeImage` varchar(200) NOT NULL,
  `themeCss` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`themeId`, `themeName`, `themeDescription`, `themeImage`, `themeCss`) VALUES
(1, 'custom', 'custon css for wd6.', 'morden.png', 'main1.css'),
(2, 'simple', 'simple design for wd6 website', '', 'main3.css');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `accountId` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstName`, `lastName`, `email`, `password`, `userName`, `newsletter`, `accountId`) VALUES
(2, 'test', 'testname', 'test@test.com', 'b3d17ebbe4f2b75d27b6309cfaae1487b667301a73951e7d523a039cd2dfe110', 'test', 0, 1),
(3, 'testtest', 'testtest', 'test3@gmail.com', 'ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f', 'test2', 1, 1),
(4, 'Jungeun', 'Nam', 'gracie.j.nam@gamil.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'member', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `current`
--
ALTER TABLE `current`
  ADD PRIMARY KEY (`themeId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackId`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productinvoice`
--
ALTER TABLE `productinvoice`
  ADD PRIMARY KEY (`invoiceId`,`productId`), ADD KEY `productId` (`productId`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`themeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`), ADD UNIQUE KEY `userName_UNIQUE` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `current`
--
ALTER TABLE `current`
  MODIFY `themeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackId` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=306;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `productinvoice`
--
ALTER TABLE `productinvoice`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=306;
--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `themeId` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
