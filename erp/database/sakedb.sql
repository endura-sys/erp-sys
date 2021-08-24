-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2021 at 07:49 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sakedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `employee_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `employee_id`) VALUES
('chrischan', 'chris1234', 12),
('root', 'happy', 18),
('user', '123', 20),
('user1', '123', 14);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `surname`, `email`) VALUES
(1, 'chan', 'chan', 'hhhjjj'),
(2, 'Tom', 'cat', 'catchyou@happy.com'),
(3, 'Jerry', 'mouse', 'catchme@sad.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(20) NOT NULL,
  `position_id` int(20) DEFAULT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `position_id`, `firstname`, `surname`, `email`, `active`) VALUES
(12, 6, 'chris', 'chan', 'chrischan@gmail.com', 1),
(13, 2, 'chan', 'chan', 'catchyou@happy.com', 0),
(14, 3, 'Aizhigit Mussali', 'handsome', 'random@gmail.com', 1),
(18, 1, 'Bossss', 'handsome', 'boss@gmail.com', 1),
(19, 1, 'sun', 'chan', 'sunchan@gmail.com', 0),
(20, 1, 'helllo', 'chan', 'chan@gmail.com', 1),
(23, 6, 'ben', 'chen', 'benchen@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inbound`
--

CREATE TABLE `inbound` (
  `inbound_id` int(20) NOT NULL,
  `employee_id` int(20) DEFAULT NULL,
  `inbound_date` date NOT NULL,
  `inbound_way` varchar(10) NOT NULL,
  `inbound_cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbound`
--

INSERT INTO `inbound` (`inbound_id`, `employee_id`, `inbound_date`, `inbound_way`, `inbound_cost`) VALUES
(300000001, 14, '2021-07-07', 'dumb', 333),
(300000003, 20, '2021-07-27', 'bus', 200);

-- --------------------------------------------------------

--
-- Table structure for table `inbound_items_list`
--

CREATE TABLE `inbound_items_list` (
  `inbound_id` int(20) NOT NULL,
  `purchasing_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbound_items_list`
--

INSERT INTO `inbound_items_list` (`inbound_id`, `purchasing_id`) VALUES
(300000001, 100000002),
(300000003, 100000001);

-- --------------------------------------------------------

--
-- Table structure for table `outbound`
--

CREATE TABLE `outbound` (
  `outbound_id` int(20) NOT NULL,
  `employee_id` int(8) DEFAULT NULL,
  `outbound_date` date DEFAULT NULL,
  `outbound_way` varchar(8) DEFAULT NULL,
  `outbound_cost` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbound`
--

INSERT INTO `outbound` (`outbound_id`, `employee_id`, `outbound_date`, `outbound_way`, `outbound_cost`) VALUES
(400000001, 18, '2021-07-15', 'bus', '10'),
(400000002, 12, '2021-07-28', 'bus', '100');

-- --------------------------------------------------------

--
-- Table structure for table `outbound_items_list`
--

CREATE TABLE `outbound_items_list` (
  `outbound_id` int(20) NOT NULL,
  `sale_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `outbound_items_list`
--

INSERT INTO `outbound_items_list` (`outbound_id`, `sale_id`) VALUES
(400000001, 200000001),
(400000001, 200000002),
(400000002, 200000003),
(400000002, 200000004);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(20) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  `access_level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`, `access_level`) VALUES
(1, 'Bosss', 'High'),
(2, 'Designer', 'Low'),
(3, 'Intern', 'Low'),
(4, 'Manager', 'Medium'),
(5, 'Programmer', 'High'),
(6, 'Supervisor', 'Medium');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchasing_id` int(20) NOT NULL,
  `supplier_id` int(20) NOT NULL,
  `employee_id` int(20) NOT NULL,
  `production_date` date NOT NULL,
  `shelf_life` varchar(8) NOT NULL,
  `shelf_date` date NOT NULL,
  `payment_status` varchar(11) NOT NULL,
  `inbound_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchasing_id`, `supplier_id`, `employee_id`, `production_date`, `shelf_life`, `shelf_date`, `payment_status`, `inbound_status`) VALUES
(100000001, 1, 14, '2021-07-07', '3', '2021-07-07', 'good', '1'),
(100000002, 2, 18, '2021-07-13', '3', '2021-07-02', 'good', '1'),
(100000003, 1, 12, '2021-07-13', '10', '2021-07-22', 'paid', '0'),
(100000004, 2, 12, '2021-07-03', '10', '2021-07-17', 'unpaid', '0'),
(100000005, 3, 19, '2021-07-02', '20', '2021-07-16', 'unpaid', '0');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_items_list`
--

CREATE TABLE `purchase_items_list` (
  `purchasing_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_items_list`
--

INSERT INTO `purchase_items_list` (`purchasing_id`, `product_id`, `quantity`) VALUES
(100000001, 4, 10),
(100000002, 4, 4),
(100000004, 1, 2),
(100000005, 10, 10),
(100000005, 22, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(20) NOT NULL,
  `customer_id` int(8) NOT NULL,
  `employee_id` int(8) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_time` time NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `total_sale` int(11) NOT NULL,
  `expect_outbound_date` date DEFAULT NULL,
  `is_outbound` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `customer_id`, `employee_id`, `sale_date`, `sale_time`, `payment_method`, `total_sale`, `expect_outbound_date`, `is_outbound`) VALUES
(200000001, 1, 13, '2017-03-14', '00:14:30', 'alipay', 23, '2021-07-13', 1),
(200000002, 3, 13, '2021-07-06', '00:14:30', 'alipay', 23, '2021-07-22', 1),
(200000003, 3, 14, '2021-07-15', '01:10:00', 'octopus', 100, '2021-07-17', 1),
(200000004, 2, 12, '2021-07-05', '15:00:00', 'cash', 100, '2021-07-28', 1),
(200000005, 1, 12, '2021-07-03', '11:42:00', 'cash', 100, '2021-07-17', 0),
(200000006, 2, 12, '2021-07-10', '14:57:00', 'cash', 100, '2021-07-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_items_list`
--

CREATE TABLE `sale_items_list` (
  `sale_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sale_items_list`
--

INSERT INTO `sale_items_list` (`sale_id`, `product_id`, `quantity`) VALUES
(200000001, 31, 6),
(200000002, 5, 5),
(200000002, 13, 6),
(200000006, 7, 11),
(200000006, 21, 18),
(200000006, 16, 6),
(200000003, 12, 7),
(200000004, 19, 4),
(200000004, 29, 15),
(200000004, 11, 18),
(200000005, 39, 13);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `product_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`product_id`, `stock`) VALUES
(1, 67),
(2, 4),
(3, 76),
(4, 51),
(5, 0),
(6, 45),
(7, 3),
(8, 2),
(9, 1),
(10, 1),
(11, 33),
(12, 35),
(13, 47),
(14, 32),
(15, 4),
(16, 36),
(17, 4),
(18, 46),
(19, 24),
(20, 41),
(21, 23),
(22, 36),
(23, 40),
(24, 27),
(25, 33),
(26, 33),
(27, 29),
(28, 29),
(29, 39),
(30, 19),
(31, 8),
(32, 43),
(33, 49),
(34, 25),
(35, 2),
(36, 20),
(37, 14),
(38, 16),
(39, 35),
(40, 49),
(41, 39),
(42, 43),
(43, 7),
(44, 15),
(45, 40),
(46, 44),
(47, 30),
(48, 41),
(49, 5),
(50, 41),
(51, 43),
(52, 24),
(53, 11),
(54, 35),
(55, 38),
(56, 27),
(57, 9),
(58, 34),
(59, 45),
(60, 50),
(61, 25),
(62, 16),
(63, 11),
(64, 42),
(65, 32),
(66, 30),
(67, 26),
(68, 50),
(69, 3),
(70, 18),
(71, 28),
(72, 4),
(73, 43),
(74, 13),
(75, 36),
(76, 35),
(77, 3),
(78, 6),
(79, 25),
(80, 4),
(81, 23),
(82, 27),
(83, 36),
(84, 25),
(85, 33),
(86, 26),
(87, 49),
(88, 33),
(89, 29),
(90, 2),
(91, 35),
(92, 12),
(93, 24),
(94, 25),
(95, 37),
(96, 50),
(97, 19),
(98, 45),
(99, 24),
(100, 18),
(101, 22),
(102, 33),
(103, 26),
(104, 16),
(105, 27),
(106, 0),
(107, 0),
(108, 0),
(109, 0),
(110, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(8) NOT NULL,
  `supplier_name` varchar(14) NOT NULL,
  `supplier_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_email`) VALUES
(1, 'Happy company', 'happyhappy@167.com'),
(2, 'Sad company', 'sadsad@169.com'),
(3, 'King company', 'chanfeiisking48@gmail.com'),
(4, 'happy', 'happy@gmail.com'),
(5, 'abcde', 'abcde@gmail.com'),
(6, 'bye', 'byebye@gamil.com');

-- --------------------------------------------------------

--
-- Table structure for table `wine_list`
--

CREATE TABLE `wine_list` (
  `product_id` int(5) NOT NULL,
  `p1` int(5) DEFAULT NULL,
  `p2` int(5) DEFAULT NULL,
  `p3` int(5) DEFAULT NULL,
  `location` varchar(10) DEFAULT NULL,
  `sake_brewer` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `volume` int(5) DEFAULT NULL,
  `unit` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wine_list`
--

INSERT INTO `wine_list` (`product_id`, `p1`, `p2`, `p3`, `location`, `sake_brewer`, `name`, `volume`, `unit`) VALUES
(1, 290, 320, 380, '東京', 'オードヴィ庄内', 'ORBIAKUNA貴醸酒ワイン樽熟成', 500, '12'),
(2, 190, 210, 280, '愛知', '丸石醸造', '二兎純米吟醸雄町五十五', 720, '12'),
(3, 260, 290, 320, '愛知', '萬乗醸造', '醸し人九平次純米大吟醸黒田庄に生まれて', 720, '12'),
(4, 390, 410, 450, '愛知', '萬乗醸造', '醸し人九平次純米大吟醸彼の地', 720, '12'),
(5, 180, 210, 260, '愛知', '丸一酒造', 'ほしいずみ無濾過生18号', 720, '12'),
(6, 165, 180, 220, '新潟', '高千代酒造', 'たかちよ生原酒（ドラキュラ）', 720, '12'),
(7, 210, 240, 280, '茨城', '結城酒造', '結ゆい純米吟醸やまだにしき生原酒', 720, '12'),
(8, 980, 1080, 1180, '広島', '今田酒造本店', '富久長レガシ－', 720, '12'),
(9, 210, 240, 290, '群馬', '聖酒造', '聖キモトブレンド純大', 720, '12'),
(10, 580, 680, 780, '靜岡', '磯自慢酒造', '磯自慢純米大吟醸雄町40', 720, '12'),
(11, 680, 720, 820, '靜岡', '磯自慢酒造', '磯自慢純米大吟醸Springbreeze', 720, '12'),
(12, 520, 620, 720, '靜岡', '磯自慢酒造', '磯自慢大吟醸', 720, '12'),
(13, 780, 880, 980, '靜岡', '磯自慢酒造', '磯自慢水響華大吟醸', 1800, '8'),
(14, 1080, 1180, 1280, '靜岡', '磯自慢酒造', '磯自慢大吟醸', 1800, '8'),
(15, 380, 480, 580, '靜岡', '磯自慢酒造', '磯自慢純米吟醸山田錦', 720, '12'),
(16, 480, 580, 680, '靜岡', '磯自慢酒造', '磯自慢大吟醸純米48', 720, '12'),
(17, 230, 260, 290, '石川', '白藤酒造店', '奥能登の白菊活性にごり生酒', 720, '12'),
(18, 220, 260, 310, '石川', '農口尚彦研究所', '農口尚彦研究所本醸造無濾過生原酒2019', 720, '12'),
(19, 240, 280, 330, '石川', '農口尚彦研究所', '農口尚彦純米酒無濾過生原酒2019', 720, '12'),
(20, 185, 210, 280, '宮城', '新澤醸造店', 'あたごのまつ純米吟醸ささらおりがらみ生', 720, '12'),
(21, 180, 210, 260, '山口', '八百新酒造', '雁木純米槽出あらばしり生原酒', 720, '12'),
(22, 180, 200, 240, '奈良', '今西酒造', 'みむろ杉純米吟醸おりがらみ華きゅん', 720, '12'),
(23, 170, 190, 240, '奈良', '今西酒造', '今西純米雄町無濾過生原酒', 720, '12'),
(24, 175, 190, 260, '奈良', '今西酒造', 'みむろ杉GrazieaDio', 720, '12'),
(25, 180, 210, 260, '奈良', '美吉野酒造', '花巴水もと純米木桶仕込無濾過生原酒直汲にごり', 720, '12'),
(26, 580, 620, 690, '奈良', '美吉野酒造', '花巴水もと×水もと無濾過生原酒20203種セット', 720, '12'),
(27, 180, 210, 260, '奈良', '千代酒造', '篠峯ろくまる純米吟醸雄町無濾過生原酒うすにごり2020', 720, '12'),
(28, 185, 220, 250, '奈良', '千代酒造', '篠峯純米愛山無濾過生', 720, '12'),
(29, 180, 210, 250, '栃木', '飯沼銘醸', '姿《栃木の酒米夢ささら》55%純米吟醸生原酒', 720, '12'),
(30, 290, 310, 380, '栃木', '菊の里酒造', '大那進撃の巨人ﾐｶｻﾓﾃﾞﾙ', 720, '12'),
(31, 310, 330, 420, '栃木', '菊の里酒造', '大那進撃の巨人ﾘｳﾞｧｲﾓﾃﾞﾙ', 720, '12'),
(32, 480, 580, 680, '三重', '木屋正酒造', '高砂純米大吟醸', 720, '12'),
(33, 180, 210, 260, '福島', '花泉酒造', 'かすみロ万純米吟醸うすにごり', 720, '12'),
(34, 180, 200, 260, '福島', '花泉酒造', '花見ロ万純米吟醸(低ｱﾙ火入れ)', 720, '12'),
(35, 480, 520, 580, '山口', '澄川酒造場', '東洋美人純米大吟醸一天', 720, '12'),
(36, 175, 190, 240, '山口', '澄川酒造', '東洋美人限定純米吟醸醇道一途山田錦', 720, '12'),
(37, 165, 185, 230, '新潟', '高千代酒造', 'たかちよかすみﾋﾟﾝｸ', 720, '12'),
(38, 165, 185, 230, '新潟', '高千代酒造', 'たかちよCUSTOMMADEおりがらみWD', 500, '12'),
(39, 195, 220, 260, '三重', '早川酒造', '田光純米吟醸雄町瓶火入れ', 720, '12'),
(40, 420, 450, 520, '三重', '早川酒造', '田光純米大吟醸山田錦', 720, '12'),
(41, 180, 210, 280, '福島', '宮泉銘醸', '冩樂純米酒火入', 720, '12'),
(42, 180, 200, 240, '宮城', '平孝酒造', '日高見希望の光純米吟醸', 720, '12'),
(43, 180, 210, 260, '宮城', '平孝酒造', '日高見弥助芳醇純米吟醸', 720, '12'),
(44, 380, 480, 580, '秋田', '両関酒造', '花邑陸羽田特別純米生', 1800, '6'),
(45, 480, 580, 680, '秋田', '両関酒造', '花邑美鄉錦純吟', 1800, '6'),
(46, 170, 185, 250, '秋田', '両関酒造', '翠玉特別純米生', 720, '12'),
(47, 180, 198, 270, '秋田', '両関酒造', '翠玉純米吟醸生', 720, '12'),
(48, 155, 180, 240, '茨城', '森島酒造', '森嶋美山錦純米酒無濾過生原酒', 720, '12'),
(49, 190, 210, 280, '茨城', '森島酒造', '森嶋純米大吟醸雄町14号生', 720, '12'),
(50, 180, 210, 260, '千葉', '寒菊鉻醸', '寒菊総の舞60％純米吟醸生', 720, '12'),
(51, 210, 230, 290, '千葉', '寒菊鉻醸', '寒菊晴日SpecialYell純米大吟醸無濾過生原酒', 720, '12'),
(52, 170, 190, 260, '千葉', '寒菊鉻醸', '寒菊純米吟醸Ocean99空海Inflight', 720, '12'),
(53, 180, 210, 270, '岡山', '菊池酒造', '岡山燦然朝日55％純米吟醸', 720, '12'),
(54, 180, 205, 270, '岡山', '菊池酒造', 'きらめき燦然雄町65％純米直汲み生原酒', 720, '12'),
(55, 230, 260, 290, '広島', '榎酒造', '華鳩FUSION', 720, '12'),
(56, 190, 210, 260, '栃木', '若駒酒造', '若駒キレコマ無濾過生原酒2020', 720, '12'),
(57, 195, 220, 260, '栃木', 'せんきん', '仙禽さくらOHANAMI', 720, '12'),
(58, 180, 195, 250, '栃木', 'せんきん', 'モダン仙禽雄町生', 720, '12'),
(59, 260, 280, 330, '静岡', '土井酒造場', '開運櫻花特撰純米吟醸', 720, '12'),
(60, 210, 230, 280, '栃木', '小林酒造', '鳳凰美田日光～NIKKO~純米吟醸無濾過本生', 720, '12'),
(61, 220, 240, 280, '栃木', '小林酒造', '鳳凰美田純米吟醸BlackPhoenix無濾過本生', 720, '12'),
(62, 190, 220, 280, '福井', '黒龍酒造', '黒龍純米吟醸三十八号', 720, '12'),
(63, 160, 180, 240, '広島', '相原酒造', '雨後の月特別純米超辛口', 720, '12'),
(64, 160, 180, 220, '秋田', '栗林酒造店', '栗林六郷東根生ピンクラベル', 720, '12'),
(65, 160, 180, 220, '秋田', '栗林酒造店', '栗林金沢西根生イエローラベル', 720, '12'),
(66, 135, 150, 230, '福島', '大木代吉本店', '楽器正宗本醸造中取(黄緑)', 720, '12'),
(67, 320, 360, 390, '福島', '大木代吉本店', '楽器正宗出羽燦々×山田錦', 1800, '6'),
(68, 160, 180, 220, '福島', '大木代吉本店', '楽器正宗出羽燦々×山田錦', 720, '12'),
(69, 220, 250, 320, '新潟', '加茂錦酒造', '荷札酒純米大吟醸備前雄町', 720, '12'),
(70, 195, 220, 260, '大分', '中野酒造', 'KITSUKIBLANCCUVEECHIEBIJIN2021', 720, '12'),
(71, 180, 200, 260, '岡山', '辻本店', '御前酒等外雄町50生', 720, '12'),
(72, 210, 240, 280, '石川', '菊姫', '菊姫吟醸あらばしり', 720, '12'),
(73, 180, 210, 260, '長野', '酒千蔵野', '川中島（幻舞）華まる1801酵母15℃華やか綺麗系', 720, '12'),
(74, 580, 680, 780, '長野', '酒千蔵野', '幻舞プレミアム箱入り大吟醸生', 720, '12'),
(75, 580, 680, 780, '長野', '酒千蔵野', '幻舞Premium香り酒大吟醸火入れ', 720, '12'),
(76, 1120, 1180, 1280, '長野', '酒千蔵野', '幻舞Premium香り酒大吟醸火入れ', 1800, '6'),
(77, 170, 190, 230, '福井', '伊藤酒造合資', '越の鷹REDHAWK純米吟醸', 720, '12'),
(78, 200, 220, 280, '長野', '尾澤酒造場', '19星座ラベルPolaris', 720, '12'),
(79, 175, 195, 250, '埼玉', '北西酒造株式会社', 'BunrakuReborn純吟生', 720, '12'),
(80, 240, 270, 320, '宮城', '仙台伊澤家勝山酒造', '勝山吟のいろは純米大吟醸火入れ', 720, '12'),
(81, 220, 240, 280, '新潟', '天領盃', 'THEREBIRTHouroborosウロボロス', 720, '12'),
(82, 170, 190, 240, '京都', '松本酒造', '澤屋まつもと守破離湖北産玉栄2020', 720, '12'),
(83, 340, 370, 420, '山口', '長州酒造', '天美純米吟醸', 1800, '6'),
(84, 195, 215, 240, '山口', '長州酒造', '天美純米吟醸', 720, '12'),
(85, 210, 240, 280, '山形', '循の川', '楯野川純米大吟醸Shield亀の尾', 720, '12'),
(86, 170, 190, 240, '山形', '酒田酒造', '上喜元純吟第51号無濾過生原酒渾身', 720, '12'),
(87, 180, 210, 260, '山形', '酒田酒造', '上喜元純吟山恵錦生原酒', 720, '12'),
(88, 220, 250, 320, '三重', '清水清三郎酒造', '作純米吟醸山田錦', 750, '12'),
(89, 220, 250, 320, '三重', '清水清三郎酒造', '作純米大吟醸新酒', 750, '12'),
(90, 160, 180, 260, '山形', '富士酒造', '栄光冨士風刃辛口純米酒', 720, '6'),
(91, 280, 320, 380, '山形', '富士酒造', '栄光冨士風刃辛口純米酒', 1800, '6'),
(92, 620, 680, 780, '山形', '亀の井酒造', 'くどき上手禁じ手11％', 720, '12'),
(93, 170, 190, 240, '宮城', '荻野酒造', '萩の鶴メガネ専用2021', 720, '12'),
(94, 165, 180, 220, '新潟', '逸見酒造', '至純米火入れ', 720, '12'),
(95, 165, 180, 220, '新潟', '逸見酒造', '至純米生酒', 720, '12'),
(96, 180, 200, 260, '新潟', '逸見酒造', '至純米吟醸生酒', 720, '12'),
(97, 185, 205, 270, '廣島', '梅田酒造', '本州一純米吟醸しぼりたて生', 720, '12'),
(98, 320, 360, 420, '茨城', '来福酒造', '来福イチゴ酵母', 1800, '6'),
(99, 190, 210, 280, '神奈川', '久保田酒造', '相模灘紫雄町直汲み純米吟醸生原酒', 720, '12'),
(100, 210, 230, 320, '秋田', '齋彌酒造', '美酒の設計「生」', 720, '12'),
(101, 285, 310, 380, '群馬', '町田酒造', '町田酒造大吟醸プレミアム', 720, '12'),
(102, 260, 280, 320, '奈良', '倉本酒造', 'KURAMOTO', 720, '12'),
(103, 210, 230, 280, '新潟', '阿部酒造', '2020あべ純米吟醸楽風舞生', 720, '12'),
(104, 370, 390, 480, '新潟', '阿部酒造', '2020あべ純米吟醸楽風舞生', 1800, '6'),
(105, 280, 310, 380, '新潟', '阿部酒造', '2020あべ純米大吟醸原酒', 720, '12'),
(106, 100, 200, 300, 'hk', 'abc', 'wine1', 800, '12'),
(107, 200, 400, 600, 'kln', 'aaa', 'wine2', 1000, '10'),
(108, 50, 100, 200, 'hk', 'abc', 'wine', 1000, '10'),
(109, 100, 200, 300, 'hk', 'abc brew', 'wine4', 800, '12'),
(110, 200, 250, 300, 'nt', 'hk brew', 'wine5', 700, '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `inbound`
--
ALTER TABLE `inbound`
  ADD PRIMARY KEY (`inbound_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `inbound_items_list`
--
ALTER TABLE `inbound_items_list`
  ADD KEY `inbound_id` (`inbound_id`),
  ADD KEY `purchasing_id` (`purchasing_id`);

--
-- Indexes for table `outbound`
--
ALTER TABLE `outbound`
  ADD PRIMARY KEY (`outbound_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `outbound_items_list`
--
ALTER TABLE `outbound_items_list`
  ADD KEY `outbound_id` (`outbound_id`),
  ADD KEY `sale_id` (`sale_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchasing_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `purchase_items_list`
--
ALTER TABLE `purchase_items_list`
  ADD KEY `purchasing_id` (`purchasing_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `sale_items_list`
--
ALTER TABLE `sale_items_list`
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `wine_list`
--
ALTER TABLE `wine_list`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inbound`
--
ALTER TABLE `inbound`
  MODIFY `inbound_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300000004;

--
-- AUTO_INCREMENT for table `outbound`
--
ALTER TABLE `outbound`
  MODIFY `outbound_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400000003;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchasing_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000006;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200000007;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `Connect Employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `Connect position` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inbound`
--
ALTER TABLE `inbound`
  ADD CONSTRAINT `Connect Employee2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inbound_items_list`
--
ALTER TABLE `inbound_items_list`
  ADD CONSTRAINT `Connect Purchase5` FOREIGN KEY (`purchasing_id`) REFERENCES `purchase` (`purchasing_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `connect inbound` FOREIGN KEY (`inbound_id`) REFERENCES `inbound` (`inbound_id`) ON UPDATE CASCADE;

--
-- Constraints for table `outbound`
--
ALTER TABLE `outbound`
  ADD CONSTRAINT `Connect Employee3` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `outbound_items_list`
--
ALTER TABLE `outbound_items_list`
  ADD CONSTRAINT `Connect outbound` FOREIGN KEY (`outbound_id`) REFERENCES `outbound` (`outbound_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Connet sale` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `Connect Employee4` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Connect supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `purchase_items_list`
--
ALTER TABLE `purchase_items_list`
  ADD CONSTRAINT `Conect product2` FOREIGN KEY (`product_id`) REFERENCES `wine_list` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Connect purchase3` FOREIGN KEY (`purchasing_id`) REFERENCES `purchase` (`purchasing_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `Connect Employee5` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Connect customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sale_items_list`
--
ALTER TABLE `sale_items_list`
  ADD CONSTRAINT `Connect product4` FOREIGN KEY (`product_id`) REFERENCES `wine_list` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Connect sale` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`sale_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `Connect product5` FOREIGN KEY (`product_id`) REFERENCES `wine_list` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
