-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2022 at 08:42 PM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iotechco_db_bansawali`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `DistrictID` int(11) NOT NULL,
  `ProvinceID` int(11) NOT NULL,
  `district_Name` varchar(255) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`DistrictID`, `ProvinceID`, `district_Name`, `Latitude`, `Longitude`) VALUES
(1, 1, 'Bhojpur', 0, 0),
(2, 1, 'Dhankuta', 0, 0),
(3, 1, 'Ilam', 0, 0),
(4, 1, 'Jhapa', 0, 0),
(5, 1, 'Khotang', 0, 0),
(6, 1, 'Morang', 0, 0),
(7, 1, 'Okhaldhunga', 0, 0),
(8, 1, 'Panchthar', 0, 0),
(9, 1, 'Sankhuwasabha', 0, 0),
(10, 1, 'Solukhumbu', 0, 0),
(11, 1, 'Sunsari', 0, 0),
(12, 1, 'Taplejung', 0, 0),
(13, 1, 'Terhathum', 0, 0),
(14, 1, 'Udayapur', 0, 0),
(15, 2, 'Bara', 0, 0),
(16, 2, 'Parsa', 0, 0),
(17, 2, 'Dhanusha', 0, 0),
(18, 2, 'Mahottari', 0, 0),
(19, 2, 'Rautahat', 0, 0),
(20, 2, 'Saptari', 0, 0),
(21, 2, 'Sarlahi', 0, 0),
(22, 2, 'Siraha', 0, 0),
(23, 3, 'Bhaktapur', 0, 0),
(24, 3, 'Chitwan', 0, 0),
(25, 3, 'Dhading', 0, 0),
(26, 3, 'Dolakha', 0, 0),
(27, 3, 'Kathmandu', 0, 0),
(28, 3, 'Kavrepalanchok', 0, 0),
(29, 3, 'Lalitpur', 0, 0),
(30, 3, 'Makwanpur', 0, 0),
(31, 3, 'Nuwakot', 0, 0),
(32, 3, 'Ramechhap', 0, 0),
(33, 3, 'Rasuwa', 0, 0),
(34, 3, 'Sindhuli', 0, 0),
(35, 3, 'Sindhupalchok', 0, 0),
(36, 4, 'Baglung', 0, 0),
(37, 4, 'Gorkha', 0, 0),
(38, 4, 'Kaski', 0, 0),
(39, 4, 'Lamjung', 0, 0),
(40, 4, 'Manang', 0, 0),
(41, 4, 'Mustang', 0, 0),
(42, 4, 'Myagdi', 0, 0),
(43, 4, 'Nawalpur', 0, 0),
(44, 4, 'Parbat', 0, 0),
(45, 4, 'Syangja', 0, 0),
(46, 4, 'Tanahun', 0, 0),
(47, 5, 'Arghakhanchi', 0, 0),
(48, 5, 'Banke', 0, 0),
(49, 5, 'Bardiya', 0, 0),
(50, 5, 'Dang', 0, 0),
(51, 5, 'Eastern Rukum', 0, 0),
(52, 5, 'Gulmi', 0, 0),
(53, 5, 'Kapilavastu', 0, 0),
(54, 5, 'Parasi', 0, 0),
(55, 5, 'Palpa', 0, 0),
(56, 5, 'Pyuthan', 0, 0),
(57, 5, 'Rolpa', 0, 0),
(58, 5, 'Rupandehi', 0, 0),
(59, 6, 'Dailekh', 0, 0),
(60, 6, 'Dolpa', 0, 0),
(61, 6, 'Humla', 0, 0),
(62, 6, 'Jajarkot', 0, 0),
(63, 6, 'Jumla', 0, 0),
(64, 6, 'Kalikot', 0, 0),
(65, 6, 'Mugu', 0, 0),
(66, 6, 'Salyan', 0, 0),
(67, 6, 'Surkhet', 0, 0),
(68, 6, 'Western Rukum', 0, 0),
(69, 7, 'Achham', 0, 0),
(70, 7, 'Baitadi', 0, 0),
(71, 7, 'Bajhang', 0, 0),
(72, 7, 'Bajura', 0, 0),
(73, 7, 'Dadeldhura', 0, 0),
(74, 7, 'Darchula', 0, 0),
(75, 7, 'Doti', 0, 0),
(76, 7, 'Kailali', 0, 0),
(77, 7, 'Kanchanpur', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(10) NOT NULL,
  `chid` int(10) NOT NULL,
  `prid` int(10) NOT NULL,
  `mid` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `chid`, `prid`, `mid`) VALUES
(68, 69, 68, 0),
(69, 70, 69, 0),
(70, 71, 70, 0),
(71, 72, 70, 0),
(79, 76, 71, 0),
(81, 78, 71, 0),
(82, 79, 76, 0),
(83, 80, 76, 0),
(84, 81, 79, 0),
(85, 82, 79, 0),
(86, 83, 80, 0),
(87, 84, 81, 0),
(88, 85, 84, 0),
(89, 86, 85, 0),
(90, 87, 86, 0),
(91, 88, 87, 0),
(92, 89, 88, 0),
(93, 90, 89, 0),
(94, 91, 90, 0),
(95, 92, 91, 0),
(96, 93, 92, 0),
(97, 94, 93, 0),
(98, 95, 94, 0),
(99, 96, 95, 0),
(100, 97, 96, 0),
(101, 98, 97, 0),
(102, 99, 98, 0),
(103, 100, 98, 0),
(104, 101, 98, 0),
(105, 102, 98, 0),
(106, 103, 98, 0),
(107, 104, 99, 0),
(108, 105, 99, 0),
(111, 108, 105, 0),
(112, 109, 105, 0),
(113, 110, 105, 0),
(114, 111, 105, 0),
(115, 112, 109, 0),
(116, 113, 112, 0),
(117, 114, 112, 0),
(118, 115, 114, 0),
(119, 116, 114, 0),
(130, 126, 99, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `peoplesdetail`
-- (See below for the actual view)
--
CREATE TABLE `peoplesdetail` (
`firstName` varchar(15)
,`middleName` varchar(60)
,`lastName` varchar(20)
,`Pusta_Number` varchar(255)
,`permanentAddress` text
,`temporaryAddress` text
,`profile_picture` varchar(500)
,`Gender` varchar(255)
,`Occupation` varchar(255)
,`About_people` varchar(10000)
,`DateOfBirth` date
,`RegDate` datetime
,`activeStatus` varchar(255)
,`slug` varchar(500)
,`AddedBy` int(11)
,`fatherfirstname` varchar(15)
,`fathermiddlename` varchar(60)
,`fatherlastname` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(10) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `middleName` varchar(60) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `Gender` varchar(255) NOT NULL,
  `Permanent_DistrictID` int(11) NOT NULL,
  `TemporaryDistrictID` int(11) NOT NULL,
  `Permanent_StreetLine` varchar(255) NOT NULL,
  `Temporary_StreetLine` varchar(255) NOT NULL,
  `Pusta_Number` varchar(255) NOT NULL,
  `Occupation` varchar(255) DEFAULT NULL,
  `About_people` varchar(10000) DEFAULT NULL,
  `DateOfBirth` date DEFAULT current_timestamp(),
  `uid` varchar(12) DEFAULT NULL,
  `activeStatus` varchar(255) DEFAULT NULL,
  `RegDate` datetime NOT NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(500) DEFAULT NULL,
  `slug` varchar(500) NOT NULL,
  `AddedBy` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `firstName`, `middleName`, `lastName`, `Gender`, `Permanent_DistrictID`, `TemporaryDistrictID`, `Permanent_StreetLine`, `Temporary_StreetLine`, `Pusta_Number`, `Occupation`, `About_people`, `DateOfBirth`, `uid`, `activeStatus`, `RegDate`, `profile_picture`, `slug`, `AddedBy`) VALUES
(68, 'नयाँब', '', '', 'Male', 27, 27, 'demo', 'demo', '1', 'unknown', 'skdugcfyfugeugf', '2021-12-10', '', '', '2021-12-30 11:40:28', '', '20211230065528030f3a543966c458084696aaf7eca028', 1),
(69, 'बिरुहाङ', '', '', 'Male', 27, 27, 'demo', 'demo', '2', 'kdjsv', 'vegfvbuijokp', '2021-12-08', '', '', '2021-12-30 11:48:07', '', '20211230070307f42ebd4f4ca774b56eee2498d8b7785b', 1),
(70, 'जाहारसिंह', '', NULL, 'Male', 27, 27, 'demo', 'demo', '3', 'cdbusjbjb', 'dsfefef', '2021-12-08', '', '', '2021-12-30 11:53:04', NULL, '20211230070804acd2cc0feb15a6f0d9e20ce731047590', 1),
(71, 'नमनम ', '', '', 'Male', 27, 27, 'demo', 'demo', '4', 'djvfvjekb', 'rfghjkl', '2021-12-09', '', '', '2021-12-30 11:55:18', '', '2021123007101808ecb94d24cbec729968b51da9d1b8e0', 1),
(72, 'योयो', '', NULL, 'Male', 27, 27, 'demo', 'demo', '4', 'erdtfghj', 'refrvvtgrfd', '2021-12-01', '', '', '2021-12-30 11:56:20', NULL, '20211230071120c5560777a6e764a6fc18a3dd8968bde6', 1),
(76, 'स्वास (मरङहाङ्)', '', ' ', 'Male', 17, 26, 'efef', 'efef', '5', 'efefefef', 'efewfef', '2022-01-05', '', '', '2022-01-01 20:52:22', '', '20220101150722de8a15bd5d390eda06c5a8435bbd74bd', 1),
(78, 'बकस', 'pradas', '', 'Male', 55, 55, 'nmn', 'rg', '5', 'edf', 'hello', '2021-12-29', '', '', '2022-01-05 19:50:32', '', '20220105140532f7af9bd9b489a02977c19fd43260ad78', 11),
(79, 'भिमतोङ ', '', 'नेयोङ ', 'Male', 23, 15, 'aaa', 'aaaa', '6', 'aaaa', 'aaaa', '2021-12-26', '', '', '2022-01-06 06:48:07', '', '20220106010307dff9b8bec86c2559b9d2e8975f6a71c2', 10),
(80, 'हात्तीतोङ', '', 'नेयोङ ', 'Male', 1, 1, 'aaa', 'aaaa', '6', 'aaaa', 'aa', '2021-12-28', '', '', '2022-01-06 06:49:11', '', '2022010601041128c65dc876d5ee436456e9f0126b01e5', 10),
(81, 'साम्युङ ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '7', 'aaaa', 'aa', '2021-12-27', '', '', '2022-01-06 06:50:10', '', '202201060105100939e5d16fa69cabcb251818d98fce94', 10),
(82, 'मान्देवाहाङ ', '', 'नेयोङ ', 'Male', 36, 1, 'aaa', 'aaaa', '7', 'aaaa', 'aa', '2021-12-29', '', '', '2022-01-06 06:53:54', '', '2022010601085466f219cc380f30104074825c77639355', 10),
(83, 'येरो', '', 'नेयोङ ', 'Male', 15, 1, 'aaa', 'aaaa', '7', 'aaaa', 'aa', '2021-12-28', '', '', '2022-01-06 06:57:08', '', '20220106011208311989a84a7371acf32a3f64dc051a73', 10),
(84, 'पिपयुङ्ग ', '', 'नेयोङ ', 'Male', 15, 15, 'aaa', 'aaaa', '8', 'aaaa', 'aa', '2021-12-29', '', '', '2022-01-06 06:59:51', '', '202201060114519e814794083201aaa7a78a8ecfbe3e9b', 10),
(85, 'माफ़्युङ्ग', '', 'नेयोङ ', 'Male', 36, 17, 'aaa', 'aaaa', '9', 'aaaa', 'aa', '2021-12-30', '', '', '2022-01-06 07:01:09', '', '20220106011609f5791c88e656d030b6619875eb18e47b', 10),
(86, 'वुफुंङ्गजंग ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '10', 'aaaa', 'aa', '2021-12-28', '', '', '2022-01-06 07:06:33', '', '2022010601213360a24bec128bf8a9641200ead01185ff', 10),
(87, 'वेसरी ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '11', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:07:21', '', '20220106012221a2ff1fcae1d2c06864517ad921e97419', 10),
(88, 'वदुम्याङ्ग', '', 'नेयोङ ', 'Male', 1, 1, 'aaa', 'aaaa', '12', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:08:26', '', '20220106012326366ac9dca388c9a56c5361611de3a7bb', 10),
(89, 'साम्देरे ', '', 'नेयोङ ', 'Male', 15, 1, 'aaa', 'aaaa', '13', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:09:13', '', '20220106012413a6966844da8b043d753707b3fe12a12c', 10),
(90, 'सामपथाङ्ग ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '14', 'aaaa', '', '2021-12-28', '', '', '2022-01-06 07:10:53', '', '20220106012553e3efd6c41ef702a45d532658b719c57b', 10),
(91, 'पम्याङ्गला ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '15', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:12:57', '', '2022010601275751f0fa62a44c8f72b0fe0afc01917159', 10),
(92, 'चम्याङ्गला ', '', 'नेयोङ ', 'Male', 1, 1, 'aaa', 'aaaa', '16', 'aaaa', '', '2021-12-28', '', '', '2022-01-06 07:14:26', '', '202201060129260a084eb5f0cf9ca77296bfdc49d3c123', 10),
(93, 'पानजरे ', '', 'नेयोङ ', 'Male', 15, 1, 'aaa', 'aaaa', '17', 'aaaa', '', '2021-12-28', '', '', '2022-01-06 07:15:18', '', '20220106013018e9b7cde77bc2ca201f60a7a8eb19185b', 10),
(94, 'इङ्गजेरे ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '18', 'aaaa', '', '2021-12-30', '', '', '2022-01-06 07:17:05', '', '20220106013205034771597330e77e2146705866406035', 10),
(95, 'कुम्नुरे', '', 'नेयोङ ', 'Male', 15, 1, 'aaa', 'aaaa', '19', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:19:02', '', '202201060134021b2a7f1791c621a50b0eb9de5a96afe3', 10),
(96, 'कुम्फुको ', '', 'नेयोङ ', 'Male', 15, 15, 'aaa', 'aaaa', '20', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:19:52', '', '20220106013452206e930575e2bb41b2fa210787bdae10', 10),
(97, 'वसन्तु ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '21', 'aaaa', '', '2021-12-30', '', '', '2022-01-06 07:26:20', '', '20220106014120aad3263d45e3d6ba06a1401aa1849c88', 10),
(98, 'गुमसैता', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '22', 'aaaa', '', '2021-12-28', '', '', '2022-01-06 07:27:27', '', '20220106014227fe669308ea95f051d52171f38082db32', 10),
(99, 'फ्याक', '', 'नेयोङ ', 'Male', 15, 1, 'aaa', 'aaaa', '23', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:28:23', '', '20220106014323e44dd02d2ec90835e13bdec6f5693b73', 10),
(100, 'चता ', '', 'नेयोङ ', 'Male', 15, 15, 'aaa', 'aaaa', '23', 'aaaa', '', '2021-12-30', '', '', '2022-01-06 07:31:04', '', '20220106014604020f5facf464273435cd3faad9b0d529', 10),
(101, 'देशानसिङ्ग ', '', 'नेयोङ ', 'Male', 15, 1, 'aaa', 'aaaa', '23', 'aaaa', '', '2021-12-28', '', '', '2022-01-06 07:31:38', '', '202201060146386de2acd933378deb116ff70b6366785e', 10),
(102, 'मल ', '', 'नेयोङ ', 'Male', 1, 1, 'aaa', 'aaaa', '23', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:32:34', '', '20220106014734acd394b6363a17528147b039a04c151f', 10),
(103, 'अनाहाङ्गबा ', '', 'नेयोङ ', 'Male', 1, 1, 'aaa', 'aaaa', '23', 'aaaa', '', '2021-12-28', '', '', '2022-01-06 07:33:00', '', '202201060148002324c151762f17389999145cb5976c16', 10),
(104, 'भागिपाल ', '', 'नेयोङ ', 'Male', 15, 1, 'aaa', 'aaaa', '24', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:34:51', '', '20220106014951a957579ae2d230eccf521175a9f405f6', 10),
(105, 'जिवाराय ', '', 'नेयोङ ', 'Male', 1, 15, 'aaa', 'aaaa', '24', 'aaaa', '', '2021-12-29', '', '', '2022-01-06 07:37:11', '', '202201060152112c6cf1abd0391a6d3a0a7a6283ee9d3a', 10),
(108, 'इतबा ', '', '', 'Male', 1, 1, 'aaaa', 'aaa', '25', 'aaa', '', '2021-12-28', '', '', '2022-01-06 18:10:39', '', '2022010612253943ad0033f64a12462fa882972375ebf0', 10),
(109, 'भागपति ', '', '', 'Male', 15, 1, 'aaaa', 'aaa', '25', 'aaa', '', '2021-12-28', '', '', '2022-01-06 18:11:45', '', '2022010612264524aa2ca113544fa07e97e1e35cc1ad9a', 10),
(110, 'सञ्जेल', '', '', 'Male', 1, 1, 'aaa', 'aa', '25', 'aa', '', '2021-12-29', '', '', '2022-01-06 18:12:43', '', '2022010612274337a35117f1e68a3d5fe2ed41fc8469a3', 10),
(111, 'मुकुन्दसिङ्ग ', '', '', 'Male', 1, 1, 'aaa', 'aaa', '25', 'aaa', '', '2021-12-29', '', '', '2022-01-06 18:13:21', '', '202201061228216bb2e36accf0f8a9e3c1abaffcb7829a', 10),
(112, 'मेघवीर ', '', '', 'Male', 1, 1, 'aaa', 'aaa', '26', 'aaa', '', '2021-12-27', '', '', '2022-01-06 18:14:12', '', '2022010612291292648628052df4952b5288bbcaf80ed4', 10),
(113, 'दिलबीर', '', '', 'Male', 1, 1, 'aaa', 'aaa', '27', 'aaa', '', '2021-12-27', '', '', '2022-01-06 18:14:48', '', '202201061229485838152404c39e20509d289c984e7f88', 10),
(114, 'चन्द्रवीर ', '', '', 'Male', 1, 1, 'aaa', 'aaa', '27', 'aaa', '', '2021-12-26', '', '', '2022-01-06 18:15:24', '', '2022010612302414103949a3d81e7e672ab76ae0442291', 10),
(115, 'लोकबहादुर  ', '', '', 'Male', 13, 43, 'aaaaaaaa', 'aaa', '28', 'aaa', '', '2021-12-27', '', '', '2022-01-06 18:35:56', '', '2022010612505604b02d5bfe9ffe0f77cd454f03284371', 10),
(116, 'कविधोज ', '', '', 'Male', 1, 1, 'aa', 'aa', '28', 'aa', '', '2021-12-29', '', '', '2022-01-07 07:19:15', '', '20220107013415d9df376688c7c44a00a7ff43180e6b48', 10),
(126, 'धनवाज', '', '', 'Male', 12, 12, 'aaa', 'aa', '24', '', '', '2022-03-17', '', '', '2022-03-21 21:04:15', '', '202203211519152f6dc178e62dcc606b9e4caba2d53643', 1);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `ProvinceID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`ProvinceID`, `Name`) VALUES
(1, 'Province No. 1\r'),
(2, 'Province No. 2\r'),
(3, 'Bagmati Pradesh\r'),
(4, 'Gandaki Pradesh\r'),
(5, 'Province No. 5\r'),
(6, 'Karnali Pradesh\r'),
(7, 'Sudurpashchim Pradesh\r');

-- --------------------------------------------------------

--
-- Table structure for table `superuser`
--

CREATE TABLE `superuser` (
  `id` int(10) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `middleName` varchar(60) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `Category` varchar(255) NOT NULL DEFAULT '0',
  `activeStatus` tinyint(1) NOT NULL DEFAULT 1,
  `RegDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `superuser`
--

INSERT INTO `superuser` (`id`, `firstName`, `lastName`, `middleName`, `mobile`, `mail`, `password`, `Category`, `activeStatus`, `RegDate`) VALUES
(1, 'Super', 'User', NULL, '9800000000', 'admin@gmail.com', 'admin@1234', 'SUPER', 1, '2021-12-11 10:17:10'),
(10, 'Sukraj', 'Limbu', '', '9841812796', 'neyongsukraj@gmail.com', 'FFdTuCif', '0', 1, '2022-01-01 15:07:01'),
(11, 'Sujan', 'Dhakal', '', '9864401413', 'suzandhakal2056@gmail.com', '2YgRBv0x', '0', 1, '2022-01-01 15:29:02'),
(12, 'Sujan', 'khadka', '', '986465125', 'pisblashes@gmail.com', '1CxRDNGR', '0', 1, '2022-01-06 14:29:17'),
(13, 'Pradeep', 'Pokhrel', '', '9868647953', 'pradeeppokhrel5@gmail.com', 'hnl4pKtR', '0', 1, '2022-01-14 08:52:22'),
(14, 'Nisha', 'Panta', '', '986521456', 'nisha.pantha00@gmail.com', 'I3SCRgAW', '0', 1, '2022-01-24 16:39:36'),
(15, 'Abhinav', 'Gaudel', '', '89855254541', 'abhinavgaudel123@gmail.com', 'TgOeKplB', '0', 1, '2022-02-05 12:54:00'),
(16, 'arya', 'rana', '', '98765', 'aryarana1998@hotmail.com', 'Cr4jR61t', '0', 1, '2022-05-09 16:33:43');

-- --------------------------------------------------------

--
-- Stand-in structure for view `updatedetail`
-- (See below for the actual view)
--
CREATE TABLE `updatedetail` (
`person_id` int(10)
,`firstName` varchar(15)
,`middleName` varchar(60)
,`lastName` varchar(20)
,`Pusta_Number` varchar(255)
,`Permanent_StreetLine` varchar(255)
,`pdid` int(11)
,`permanentDistrict` varchar(255)
,`ppid` int(11)
,`permanentProvince` varchar(255)
,`Temporary_StreetLine` varchar(255)
,`tdid` int(11)
,`temporaryDistrict` varchar(255)
,`tpid` int(11)
,`temporaryProvince` varchar(255)
,`profile_picture` varchar(500)
,`Gender` varchar(255)
,`Occupation` varchar(255)
,`About_people` varchar(10000)
,`DateOfBirth` date
,`RegDate` datetime
,`activeStatus` varchar(255)
,`slug` varchar(500)
,`AddedBy` int(11)
,`parentid` int(10)
,`fatherid` int(10)
,`fatherfirstname` varchar(15)
,`fathermiddlename` varchar(60)
,`fatherlastname` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `peoplesdetail`
--
DROP TABLE IF EXISTS `peoplesdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`iotechco`@`localhost` SQL SECURITY DEFINER VIEW `peoplesdetail`  AS SELECT `per`.`firstName` AS `firstName`, `per`.`middleName` AS `middleName`, `per`.`lastName` AS `lastName`, `per`.`Pusta_Number` AS `Pusta_Number`, concat(`per`.`Permanent_StreetLine`,', ',`pdistrict`.`district_Name`,', ',`pprovince`.`Name`) AS `permanentAddress`, concat(`per`.`Temporary_StreetLine`,', ',`tdistrict`.`district_Name`,', ',`tprovince`.`Name`) AS `temporaryAddress`, `per`.`profile_picture` AS `profile_picture`, `per`.`Gender` AS `Gender`, `per`.`Occupation` AS `Occupation`, `per`.`About_people` AS `About_people`, `per`.`DateOfBirth` AS `DateOfBirth`, `per`.`RegDate` AS `RegDate`, `per`.`activeStatus` AS `activeStatus`, `per`.`slug` AS `slug`, `per`.`AddedBy` AS `AddedBy`, `father`.`firstName` AS `fatherfirstname`, `father`.`middleName` AS `fathermiddlename`, `father`.`lastName` AS `fatherlastname` FROM ((((((`person` `per` left join `parent` `parid` on(`per`.`id` = `parid`.`chid`)) left join `person` `father` on(`parid`.`prid` = `father`.`id`)) left join `districts` `pdistrict` on(`per`.`Permanent_DistrictID` = `pdistrict`.`DistrictID`)) left join `districts` `tdistrict` on(`per`.`TemporaryDistrictID` = `tdistrict`.`DistrictID`)) left join `province` `pprovince` on(`pdistrict`.`ProvinceID` = `pprovince`.`ProvinceID`)) left join `province` `tprovince` on(`tdistrict`.`ProvinceID` = `tprovince`.`ProvinceID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `updatedetail`
--
DROP TABLE IF EXISTS `updatedetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`iotechco`@`localhost` SQL SECURITY DEFINER VIEW `updatedetail`  AS SELECT `per`.`id` AS `person_id`, `per`.`firstName` AS `firstName`, `per`.`middleName` AS `middleName`, `per`.`lastName` AS `lastName`, `per`.`Pusta_Number` AS `Pusta_Number`, `per`.`Permanent_StreetLine` AS `Permanent_StreetLine`, `pdistrict`.`DistrictID` AS `pdid`, `pdistrict`.`district_Name` AS `permanentDistrict`, `pprovince`.`ProvinceID` AS `ppid`, `pprovince`.`Name` AS `permanentProvince`, `per`.`Temporary_StreetLine` AS `Temporary_StreetLine`, `tdistrict`.`DistrictID` AS `tdid`, `tdistrict`.`district_Name` AS `temporaryDistrict`, `tprovince`.`ProvinceID` AS `tpid`, `tprovince`.`Name` AS `temporaryProvince`, `per`.`profile_picture` AS `profile_picture`, `per`.`Gender` AS `Gender`, `per`.`Occupation` AS `Occupation`, `per`.`About_people` AS `About_people`, `per`.`DateOfBirth` AS `DateOfBirth`, `per`.`RegDate` AS `RegDate`, `per`.`activeStatus` AS `activeStatus`, `per`.`slug` AS `slug`, `per`.`AddedBy` AS `AddedBy`, `parid`.`id` AS `parentid`, `father`.`id` AS `fatherid`, `father`.`firstName` AS `fatherfirstname`, `father`.`middleName` AS `fathermiddlename`, `father`.`lastName` AS `fatherlastname` FROM ((((((`person` `per` left join `parent` `parid` on(`per`.`id` = `parid`.`chid`)) left join `person` `father` on(`parid`.`prid` = `father`.`id`)) left join `districts` `pdistrict` on(`per`.`Permanent_DistrictID` = `pdistrict`.`DistrictID`)) left join `districts` `tdistrict` on(`per`.`TemporaryDistrictID` = `tdistrict`.`DistrictID`)) left join `province` `pprovince` on(`pdistrict`.`ProvinceID` = `pprovince`.`ProvinceID`)) left join `province` `tprovince` on(`tdistrict`.`ProvinceID` = `tprovince`.`ProvinceID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`prid`),
  ADD KEY `child` (`chid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superuser`
--
ALTER TABLE `superuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `superuser`
--
ALTER TABLE `superuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `child` FOREIGN KEY (`chid`) REFERENCES `person` (`id`),
  ADD CONSTRAINT `parent` FOREIGN KEY (`prid`) REFERENCES `person` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
