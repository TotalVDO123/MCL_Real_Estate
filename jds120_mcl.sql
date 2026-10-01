-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2026 at 08:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jds120_mcl`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ads_name` varchar(250) DEFAULT NULL,
  `unique_name` varchar(250) DEFAULT NULL,
  `ads_size` varchar(250) DEFAULT NULL,
  `ads_type` varchar(200) DEFAULT NULL,
  `ads_url` mediumtext NOT NULL,
  `ads_image_url` longtext DEFAULT NULL,
  `ads_code` longtext DEFAULT NULL,
  `enable` int(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_name`, `unique_name`, `ads_size`, `ads_type`, `ads_url`, `ads_image_url`, `ads_code`, `enable`) VALUES
(1, 'Home Page Header', 'home_header', '728x90', 'code', '#', '', '', 0),
(2, 'Movie Page Header', 'movie_header', '728x90', 'code', '#', '', '', 0),
(3, 'Genre Page Header', 'genre_header', '728x90', 'code', '#', '', '', 0),
(4, 'Country Page Header', 'country_header', '728x90', 'code', '#', '', '', 0),
(5, 'Release Page Header', 'release_header', '728x90', 'code', '#', '', '', 0),
(6, 'TV-series Page Header', 'tv_header', '728x90', 'code', '#', '', '', 0),
(7, 'Type Page Header', 'type_header', '728x90', 'code', '#', '', '', 0),
(8, 'Blog Page Header', 'blog_header', '728x90', 'code', '#', '', '', 0),
(9, 'Sidebar', 'sidebar', '300x600', 'code', '#', '', '', 0),
(12, 'Player Bottom', 'player_bottom', '728x90', 'code', '#', '', '', 0),
(10, 'Player Top', 'player_top', '728x90', 'code', '#', '', '', 0),
(11, 'Billboard(For movie,Landing page & watch page)', 'billboard', '970x250', 'code', '#', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'primary_buyer_name',
  `last_name` varchar(100) NOT NULL,
  `secondary_buyer_name` varchar(100) DEFAULT NULL COMMENT 'secondary_buyer_name',
  `secondary_buyer_last_name` varchar(100) NOT NULL,
  `secondary_buyer_email` varchar(100) DEFAULT NULL,
  `secondary_buyer_phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `buyer_realtor_contract_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name`, `last_name`, `secondary_buyer_name`, `secondary_buyer_last_name`, `secondary_buyer_email`, `secondary_buyer_phone`, `email`, `phone`, `user_id`, `buyer_realtor_contract_id`, `created_at`) VALUES
(4, 'Brian Erwin', '', NULL, '', NULL, NULL, 'brian@gmail.com', '5555555555', 2, 4, '2022-06-14'),
(5, 'deepak kumat', '', NULL, '', NULL, NULL, 'deepak@gmail.com', '4874711111', 2, 5, '2022-06-14'),
(7, 'ratnesh kumar', '', NULL, '', NULL, NULL, 'amreen@totalvdo.com', '', 18, 7, '2022-06-14'),
(8, 'gautam kumar', '', NULL, '', NULL, NULL, 'gautamk001@gmail.com', '8756789543', 18, 8, '2022-06-14'),
(9, 'Brian Erwin', '', NULL, '', NULL, NULL, 'brian1@gmail.com', '4444444444', 18, 9, '2022-06-14'),
(10, 'deepak kumat', '', NULL, '', NULL, NULL, 'deepak@gmail.com', '4874711111', 18, 10, '2022-06-14'),
(11, 'new name', '', NULL, '', NULL, NULL, 'rakesh123@gmail.com', '487422222', 18, 11, '2022-06-14'),
(12, 'raju kumar', '', 'sony', '', 'sony@gmail.com', '1111111111', 'raju@gmail.com', '2222222222', 2, 12, '2022-06-14'),
(13, 'vinay kumar', '', 'mrs. vimat', '', 'vinat123@gmail.com', '4444444444', 'vinay@gmail.com', '2222222222', 2, 13, '2022-06-14'),
(14, 'shyam kumar', '', 'rahul', '', 'rahul@gmail.com', '80070006001', 'shyam@gmail.com', '8010255769', 2, 14, '2022-06-14'),
(15, 'Buyer', '', NULL, '', NULL, NULL, 'buyer@gmail.com', '9897978234', 22, 15, '2022-06-22'),
(16, 'vinay kumar', '', NULL, '', NULL, NULL, 'ratneshk500@gmail.com', '1111111111', 2, 16, '2022-06-23'),
(17, 'neha', '', NULL, '', NULL, NULL, 'aggarwal.nikki@gmail.com', '789456', 1, 17, '2022-06-27'),
(18, 'shyam1', '', NULL, '', NULL, NULL, 'shyam1@gmail.com', '7865434567', 25, 18, '2022-06-28'),
(19, 'raju kumar', '', NULL, '', NULL, NULL, 'raju@gmail.com', '2342534352', 1, 19, '2022-06-29'),
(20, 'ratnesh', '', NULL, '', NULL, NULL, 'ratneshk500@gmail.com', '8010255769', 30, 20, '2022-06-29'),
(21, 'ratnesh', '', NULL, '', NULL, NULL, 'ratneshk500111@gmail.com', '2222222222', 30, 21, '2022-06-29'),
(22, 'raju', '', NULL, '', NULL, NULL, 'ratneshk500@gmail.com', '2222222222', 30, 22, '2022-07-08'),
(23, 'aakash', '', NULL, '', NULL, NULL, 'manitachawla05@gmail.com', '7687567155', 18, 23, '2022-07-18'),
(33, 'mithlesh kumar', '', NULL, '', NULL, NULL, 'mithlesh1234@gmail.com', '46463478347', 39, 43, '2022-08-23'),
(34, 'suresh kumar', '', 'suraj kumar', '', 'suraj123@gmail.com', '4368483489', 'suresh007@gmail.com', '6734673487', 39, 44, '2022-08-23'),
(35, 'rakesh kumar', '', 'Mrs rakesh', '', 'rakeshm@gmail.com', '4688342344', 'rakesh123@gmail.com', '789547894', 39, 45, '2022-08-23'),
(36, 'Oyalep Del Sol', '', NULL, '', NULL, NULL, 'oyalepdelsol@gmail.com', '2019601073', 39, 46, '2022-08-23'),
(38, 'NEHA', '', '', '', '', '', 'amreen@totalvdo.com', '1234567890', 18, 47, '2022-09-23'),
(39, 'NEHA', '', '', '', '', '', 'amreen@totalvdo.com', '1234567890', 18, 48, '2022-09-23'),
(40, 'raju kumar', '', '', '', '', '', 'rajukumar@gmail.com', '1234567899', 18, 49, '2022-09-23'),
(41, 'test buyer', '', '', '', '', '', 'testbuyer@gmail.com', '1232322222', 18, 50, '2022-09-23'),
(42, 'test buyer', '', '', '', '', '', 'testbuyer@gmail.com', '1232322222', 18, 51, '2022-09-23'),
(43, 'jitrandra', 'kumar', 'suman', 'sinha', 'suman123@gmaol.com', '6565656565', 'jitandra@gmail.com', '1234567899', 42, 52, '2022-09-23'),
(44, 'neha', '', '', '', '', '', 'amreen@totalvdo.com', '123456', 18, 53, '2022-09-23'),
(73, 'raju', 'Kumar', '', '', '', '', 'raju@gmail.com', '2222222222', 39, 82, '2022-10-08'),
(74, 'Oyalep', 'Del Sol', '', '', '', '', 'oyalepdelsol@gmail.com', '2019606272', 39, 83, '2022-10-08'),
(75, 'Oyalep ', 'Del Sol', '', '', '', '', 'oyalepdelsol@gmail.com', '2019601073', 39, 84, '2022-10-09'),
(79, 'mithlesh kumar', '', '', '', '', '', 'mithlesh1234@gmail.com', '46463478347', 46, 88, '2022-10-09'),
(80, 'suresh kumar', '', 'suraj kumar', '', 'suraj123@gmail.com', '4368483489', 'suresh007@gmail.com', '6734673487', 46, 89, '2022-10-09'),
(81, 'rakesh kumar', '', 'Mrs rakesh', '', 'rakeshm@gmail.com', '4688342344', 'rakesh123@gmail.com', '789547894', 46, 90, '2022-10-09'),
(82, 'john', 'doe', '', '', '', '', 'delsol120@yahoo.com', '2015431178', 39, 91, '2022-10-10'),
(84, 'Lisset', 'Orozco', '', '', '', '', 'lisset.orozco@gmail.com', '2016588238', 47, 93, '2022-10-12'),
(93, 'mithlesh kumar', '', '', '', '', '', 'mithlesh1234@gmail.com', '46463478347', 18, 102, '2022-11-01'),
(94, 'suresh kumar', '', 'suraj kumar', '', 'suraj123@gmail.com', '4368483489', 'suresh007@gmail.com', '6734673487', 18, 103, '2022-11-01'),
(95, 'rakesh kumar', '', 'Mrs rakesh', '', 'rakeshm@gmail.com', '4688342344', 'rakesh123@gmail.com', '789547894', 18, 104, '2022-11-01'),
(96, 'Brian', 'Edwin', '', '', '', '', 'brian@gmail.com', '2019793933', 39, 105, '2022-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_realtor_contract`
--

CREATE TABLE `buyer_realtor_contract` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `status` int(1) NOT NULL COMMENT '0=>Pending,1=>Active,2=>Inactive,3=>Closed,4=>TERMINATED,5=>Cancel',
  `contract_process_initiation` int(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `loop_id` int(20) NOT NULL,
  `dotloop_id` int(20) NOT NULL,
  `profileId` int(20) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `transaction_status` varchar(50) NOT NULL,
  `loop_name` varchar(200) NOT NULL,
  `duplicate_contract` int(1) NOT NULL DEFAULT 0,
  `cancel_by_agent` int(1) NOT NULL DEFAULT 0,
  `cancel_by_buyer` int(1) NOT NULL DEFAULT 0,
  `cancel_request_user_id` int(11) NOT NULL,
  `deny_by_agent` int(1) NOT NULL DEFAULT 0,
  `deny_by_buyer` int(1) NOT NULL DEFAULT 0,
  `room_account_id` varchar(200) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_realtor_contract`
--

INSERT INTO `buyer_realtor_contract` (`id`, `user_id`, `contract_type`, `file_name`, `contract_start_date`, `contract_end_date`, `status`, `contract_process_initiation`, `created_at`, `loop_id`, `dotloop_id`, `profileId`, `transaction_type`, `transaction_status`, `loop_name`, `duplicate_contract`, `cancel_by_agent`, `cancel_by_buyer`, `cancel_request_user_id`, `deny_by_agent`, `deny_by_buyer`, `room_account_id`, `room_id`, `room_name`) VALUES
(4, 2, 'Buyer Agreement', '84847e461109b3af1b50a36485e23c93_1_1.pdf', '2022-07-07', '2022-07-09', 4, 0, '2022-06-14', 211133490, 34189623, 17232208, 'LISTING_FOR_SALE', 'TERMINATED', 'Ratnesh kumar', 0, 0, 0, 0, 0, 0, '', 0, ''),
(8, 18, 'Buyer Agreement', '', '2022-10-02', '2022-10-24', 1, 0, '2022-06-14', 213372055, 34189623, 17232208, 'PURCHASE_OFFER', 'UNDER_CONTRACT', 'gautam kumar', 0, 0, 0, 0, 0, 0, '', 0, ''),
(9, 18, 'Contract Type 123', '', '2022-05-12', '2022-01-13', 4, 0, '2022-06-14', 211133490, 34189623, 17232208, 'LISTING_FOR_SALE', 'TERMINATED', 'Ratnesh kumar', 2, 0, 0, 0, 0, 0, '', 0, ''),
(11, 18, 'Buyer Agreement', '', '2022-05-01', '2022-05-30', 1, 0, '2022-06-14', 212174415, 34189623, 17232208, 'PURCHASE_OFFER', 'UNDER_CONTRACT', 'new name_4874784578_rakesh123@gmail.com', 0, 0, 0, 0, 0, 0, '', 0, ''),
(12, 2, 'Buyer Agreement', 'document_2_1.pdf', '2022-10-05', '2022-10-30', 0, 0, '2022-06-14', 0, 0, 0, '', '', '', 0, 1, 1, 39, 0, 0, '', 0, ''),
(16, 2, 'Buyer Agreement', '625289b9c6c573853a3c579e287d16d3_2_1.pdf', '2022-06-05', '2022-06-05', 1, 1, '2022-06-23', 0, 0, 0, '', '', '', 0, 0, 0, 18, 0, 0, '', 0, ''),
(17, 1, 'Buyer Agreement', '3285c3103fd56ff56df9aeccdd6631f1_1_1.pdf', '2022-06-27', '2022-06-30', 0, 0, '2022-06-27', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(18, 25, 'Buyer Agreement', '5679d7e314639b36d544f87d733f488a_25_1.pdf', '2022-06-26', '2022-06-28', 0, 0, '2022-06-28', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(19, 1, 'Buyer Agreement', '59904623fb486c980c77bdac342d5de1_1_1.pdf', '2022-06-20', '2022-06-30', 0, 0, '2022-06-29', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(20, 30, 'Buyer Agreement', '6721814d290b0b4efb30c4fd28bf1345_30_1.pdf', '2022-06-27', '2022-06-30', 0, 0, '2022-06-29', 0, 0, 0, '', '', '', 0, 0, 1, 18, 1, 0, '', 0, ''),
(21, 30, 'Buyer Agreement', 'df66a3c4eec522e0e081e4ce00c48a92_30_1.pdf', '2022-06-27', '2022-06-30', 0, 0, '2022-06-29', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(22, 30, 'Buyer Agreement', '8e20fa7fa646afab3b37c2a4616b703c_30_1.pdf,8e20fa7fa646afab3b37c2a4616b703c_30_2.pdf', '2022-07-25', '2022-07-31', 1, 0, '2022-07-08', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(23, 18, 'Buyer Agreement', '975348c910ca0b36757320bcada61ca0_18_1.pdf', '2022-07-19', '2022-07-21', 4, 0, '2022-07-18', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(43, 39, 'Buyer Agreement', '', '2022-07-05', '2022-08-31', 1, 0, '2022-08-23', 0, 0, 0, '', '7', '', 1, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 913367, 'Test1'),
(44, 39, 'Buyer Agreement', '', '2022-07-22', '2022-09-08', 0, 0, '2022-08-23', 0, 0, 0, '', '4', '', 1, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 913344, 'totalvdo'),
(45, 39, 'Buyer Agreement', '', '2022-08-01', '2022-09-28', 1, 0, '2022-08-23', 0, 0, 0, '', '7', '', 1, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 895785, 'test'),
(47, 18, 'Buyer Agreement', '7b958e74f10faadd3f6bf24b02d43d31_18_1.pdf', '2022-09-01', '2022-09-30', 4, 0, '2022-09-23', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(48, 18, 'Buyer Agreement', 'c901527f703729eba6bf6ffd91bfdeb2_18_1.pdf', '2022-09-01', '2022-09-30', 4, 0, '2022-09-23', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(49, 18, 'Buyer Agreement', 'd750b41f6bb4c5ba438b8cebc6ed649c_18_1.pdf', '2022-09-05', '2022-09-27', 0, 0, '2022-09-23', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(50, 18, 'Buyer Agreement', 'a09924b1ce80bee72527869ddb2e2bd0_18_1.pdf', '2022-09-12', '2022-09-27', 0, 0, '2022-09-23', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(51, 18, 'Buyer Agreement', 'f8f82173cc6eb70756c5acca0d6a13d1_18_1.pdf', '2022-09-12', '2022-09-27', 1, 0, '2022-09-23', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(52, 42, 'Buyer Agreement', '8e5affa890dbff4557c39da2dce477c3_42_1.pdf', '2022-09-04', '2022-09-26', 0, 0, '2022-09-23', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(53, 18, 'Buyer Agreement', 'e50915d5ef1e1b3615e232a53de8e709_18_1.pdf', '2022-09-01', '2022-09-30', 4, 0, '2022-09-23', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(82, 39, 'Buyer Agreement', '07969c9504209c3768fd37641ac2881d_39_1.pdf', '2022-10-08', '2023-01-08', 1, 0, '2022-10-08', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(88, 46, 'Buyer Agreement', '', '2022-07-05', '2022-08-31', 1, 0, '2022-10-09', 0, 0, 0, '', '7', '', 1, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 913367, 'Test1'),
(89, 46, 'Buyer Agreement', '', '2022-07-22', '2022-09-08', 0, 0, '2022-10-09', 0, 0, 0, '', '4', '', 1, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 913344, 'totalvdo'),
(90, 46, 'Buyer Agreement', '', '2022-08-01', '2022-09-28', 0, 0, '2022-10-09', 0, 0, 0, '', '7', '', 1, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 895785, 'test'),
(91, 39, 'Buyer Agreement', '895035a26cb5a0015c1e81e6a72caca0_39_1.pdf', '2022-10-10', '2022-10-12', 0, 0, '2022-10-10', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(93, 47, 'Buyer Agreement', '69491dffc65105059660141b5a7fc3f8_47_1.pdf', '2022-10-12', '2022-10-13', 0, 0, '2022-10-12', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, ''),
(102, 18, 'Buyer Agreement', '', '2022-07-05', '2022-08-31', 1, 0, '2022-11-01', 0, 0, 0, '', '7', '', 0, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 913367, 'Test1'),
(103, 18, 'Buyer Agreement', '', '2022-07-22', '2022-09-08', 0, 0, '2022-11-01', 0, 0, 0, '', '4', '', 0, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 913344, 'totalvdo'),
(104, 18, 'Buyer Agreement', '', '2022-08-01', '2022-09-28', 1, 0, '2022-11-01', 0, 0, 0, '', '7', '', 0, 0, 0, 0, 0, 0, '7c304551-1e86-491d-9e49-7507af8a6fad', 895785, 'test'),
(105, 39, 'Buyer Agreement', '7506c85e8f3c668c0583a7c6e6508b9d_39_1.pdf', '2022-11-02', '2022-11-03', 1, 0, '2022-11-03', 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `country_code` char(2) NOT NULL,
  `coordinates` char(15) NOT NULL,
  `timezone` char(32) NOT NULL,
  `comments` varchar(85) NOT NULL,
  `utc_offset` char(8) NOT NULL,
  `utc_dst_offset` char(8) NOT NULL,
  `notes` varchar(79) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`country_code`, `coordinates`, `timezone`, `comments`, `utc_offset`, `utc_dst_offset`, `notes`) VALUES
('CI', '+0519-00402', 'Africa/Abidjan', '', '+00:00', '+00:00', ''),
('GH', '+0533-00013', 'Africa/Accra', '', '+00:00', '+00:00', ''),
('ET', '+0902+03842', 'Africa/Addis_Ababa', '', '+03:00', '+03:00', ''),
('DZ', '+3647+00303', 'Africa/Algiers', '', '+01:00', '+01:00', ''),
('ER', '+1520+03853', 'Africa/Asmara', '', '+03:00', '+03:00', ''),
('', '', 'Africa/Asmera', '', '+03:00', '+03:00', 'Link to Africa/Asmara'),
('ML', '+1239-00800', 'Africa/Bamako', '', '+00:00', '+00:00', ''),
('CF', '+0422+01835', 'Africa/Bangui', '', '+01:00', '+01:00', ''),
('GM', '+1328-01639', 'Africa/Banjul', '', '+00:00', '+00:00', ''),
('GW', '+1151-01535', 'Africa/Bissau', '', '+00:00', '+00:00', ''),
('MW', '-1547+03500', 'Africa/Blantyre', '', '+02:00', '+02:00', ''),
('CG', '-0416+01517', 'Africa/Brazzaville', '', '+01:00', '+01:00', ''),
('BI', '-0323+02922', 'Africa/Bujumbura', '', '+02:00', '+02:00', ''),
('EG', '+3003+03115', 'Africa/Cairo', '', '+02:00', '+02:00', 'DST has been canceled since 2011'),
('MA', '+3339-00735', 'Africa/Casablanca', '', '+00:00', '+01:00', ''),
('ES', '+3553-00519', 'Africa/Ceuta', 'Ceuta & Melilla', '+01:00', '+02:00', ''),
('GN', '+0931-01343', 'Africa/Conakry', '', '+00:00', '+00:00', ''),
('SN', '+1440-01726', 'Africa/Dakar', '', '+00:00', '+00:00', ''),
('TZ', '-0648+03917', 'Africa/Dar_es_Salaam', '', '+03:00', '+03:00', ''),
('DJ', '+1136+04309', 'Africa/Djibouti', '', '+03:00', '+03:00', ''),
('CM', '+0403+00942', 'Africa/Douala', '', '+01:00', '+01:00', ''),
('EH', '+2709-01312', 'Africa/El_Aaiun', '', '+00:00', '+00:00', ''),
('SL', '+0830-01315', 'Africa/Freetown', '', '+00:00', '+00:00', ''),
('BW', '-2439+02555', 'Africa/Gaborone', '', '+02:00', '+02:00', ''),
('ZW', '-1750+03103', 'Africa/Harare', '', '+02:00', '+02:00', ''),
('ZA', '-2615+02800', 'Africa/Johannesburg', '', '+02:00', '+02:00', ''),
('SS', '+0451+03136', 'Africa/Juba', '', '+03:00', '+03:00', ''),
('UG', '+0019+03225', 'Africa/Kampala', '', '+03:00', '+03:00', ''),
('SD', '+1536+03232', 'Africa/Khartoum', '', '+03:00', '+03:00', ''),
('RW', '-0157+03004', 'Africa/Kigali', '', '+02:00', '+02:00', ''),
('CD', '-0418+01518', 'Africa/Kinshasa', 'west Dem. Rep. of Congo', '+01:00', '+01:00', ''),
('NG', '+0627+00324', 'Africa/Lagos', '', '+01:00', '+01:00', ''),
('GA', '+0023+00927', 'Africa/Libreville', '', '+01:00', '+01:00', ''),
('TG', '+0608+00113', 'Africa/Lome', '', '+00:00', '+00:00', ''),
('AO', '-0848+01314', 'Africa/Luanda', '', '+01:00', '+01:00', ''),
('CD', '-1140+02728', 'Africa/Lubumbashi', 'east Dem. Rep. of Congo', '+02:00', '+02:00', ''),
('ZM', '-1525+02817', 'Africa/Lusaka', '', '+02:00', '+02:00', ''),
('GQ', '+0345+00847', 'Africa/Malabo', '', '+01:00', '+01:00', ''),
('MZ', '-2558+03235', 'Africa/Maputo', '', '+02:00', '+02:00', ''),
('LS', '-2928+02730', 'Africa/Maseru', '', '+02:00', '+02:00', ''),
('SZ', '-2618+03106', 'Africa/Mbabane', '', '+02:00', '+02:00', ''),
('SO', '+0204+04522', 'Africa/Mogadishu', '', '+03:00', '+03:00', ''),
('LR', '+0618-01047', 'Africa/Monrovia', '', '+00:00', '+00:00', ''),
('KE', '-0117+03649', 'Africa/Nairobi', '', '+03:00', '+03:00', ''),
('TD', '+1207+01503', 'Africa/Ndjamena', '', '+01:00', '+01:00', ''),
('NE', '+1331+00207', 'Africa/Niamey', '', '+01:00', '+01:00', ''),
('MR', '+1806-01557', 'Africa/Nouakchott', '', '+00:00', '+00:00', ''),
('BF', '+1222-00131', 'Africa/Ouagadougou', '', '+00:00', '+00:00', ''),
('BJ', '+0629+00237', 'Africa/Porto-Novo', '', '+01:00', '+01:00', ''),
('ST', '+0020+00644', 'Africa/Sao_Tome', '', '+00:00', '+00:00', ''),
('', '', 'Africa/Timbuktu', '', '+00:00', '+00:00', 'Link to Africa/Bamako'),
('LY', '+3254+01311', 'Africa/Tripoli', '', '+01:00', '+02:00', ''),
('TN', '+3648+01011', 'Africa/Tunis', '', '+01:00', '+01:00', ''),
('NA', '-2234+01706', 'Africa/Windhoek', '', '+01:00', '+02:00', ''),
('', '', 'AKST9AKDT', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Anchorage'),
('US', '+515248-1763929', 'America/Adak', 'Aleutian Islands', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™0', ''),
('US', '+611305-1495401', 'America/Anchorage', 'Alaska Time', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AI', '+1812-06304', 'America/Anguilla', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AG', '+1703-06148', 'America/Antigua', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-0712-04812', 'America/Araguaina', 'Tocantins', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-3436-05827', 'America/Argentina/Buenos_Aires', 'Buenos Aires (BA, CF)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-2828-06547', 'America/Argentina/Catamarca', 'Catamarca (CT), Chubut (CH)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Argentina/ComodRivadavia', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Argentina/Catamarca'),
('AR', '-3124-06411', 'America/Argentina/Cordoba', 'most locations (CB, CC, CN, ER, FM, MN, SE, SF)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-2411-06518', 'America/Argentina/Jujuy', 'Jujuy (JY)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-2926-06651', 'America/Argentina/La_Rioja', 'La Rioja (LR)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-3253-06849', 'America/Argentina/Mendoza', 'Mendoza (MZ)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-5138-06913', 'America/Argentina/Rio_Gallegos', 'Santa Cruz (SC)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-2447-06525', 'America/Argentina/Salta', '(SA, LP, NQ, RN)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-3132-06831', 'America/Argentina/San_Juan', 'San Juan (SJ)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-3319-06621', 'America/Argentina/San_Luis', 'San Luis (SL)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-2649-06513', 'America/Argentina/Tucuman', 'Tucuman (TM)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AR', '-5448-06818', 'America/Argentina/Ushuaia', 'Tierra del Fuego (TF)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AW', '+1230-06958', 'America/Aruba', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('PY', '-2516-05740', 'America/Asuncion', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+484531-0913718', 'America/Atikokan', 'Eastern Standard Time - Atikokan, Ontario and Southampton I, Nunavut', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Atka', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™0', 'Link to America/Adak'),
('BR', '-1259-03831', 'America/Bahia', 'Bahia', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2048-10515', 'America/Bahia_Banderas', 'Mexican Central Time - Bahia de Banderas', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BB', '+1306-05937', 'America/Barbados', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-0127-04829', 'America/Belem', 'Amapa, E Para', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BZ', '+1730-08812', 'America/Belize', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+5125-05707', 'America/Blanc-Sablon', 'Atlantic Standard Time - Quebec - Lower North Shore', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '+0249-06040', 'America/Boa_Vista', 'Roraima', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CO', '+0436-07405', 'America/Bogota', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+433649-1161209', 'America/Boise', 'Mountain Time - south Idaho & east Oregon', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Buenos_Aires', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Argentina/Buenos_Aires'),
('CA', '+690650-1050310', 'America/Cambridge_Bay', 'Mountain Time - west Nunavut', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-2027-05437', 'America/Campo_Grande', 'Mato Grosso do Sul', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2105-08646', 'America/Cancun', 'Central Time - Quintana Roo', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('VE', '+1030-06656', 'America/Caracas', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Catamarca', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Argentina/Catamarca'),
('GF', '+0456-05220', 'America/Cayenne', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('KY', '+1918-08123', 'America/Cayman', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+415100-0873900', 'America/Chicago', 'Central Time', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2838-10605', 'America/Chihuahua', 'Mexican Mountain Time - Chihuahua away from US border', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Coral_Harbour', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Atikokan'),
('', '', 'America/Cordoba', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Argentina/Cordoba'),
('CR', '+0956-08405', 'America/Costa_Rica', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4906-11631', 'America/Creston', 'Mountain Standard Time - Creston, British Columbia', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-1535-05605', 'America/Cuiaba', 'Mato Grosso', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CW', '+1211-06900', 'America/Curacao', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GL', '+7646-01840', 'America/Danmarkshavn', 'east coast, north of Scoresbysund', '+00:00', '+00:00', ''),
('CA', '+6404-13925', 'America/Dawson', 'Pacific Time - north Yukon', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+5946-12014', 'America/Dawson_Creek', 'Mountain Standard Time - Dawson Creek & Fort Saint John, British Columbia', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+394421-1045903', 'America/Denver', 'Mountain Time', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+421953-0830245', 'America/Detroit', 'Eastern Time - Michigan - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('DM', '+1518-06124', 'America/Dominica', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+5333-11328', 'America/Edmonton', 'Mountain Time - Alberta, east British Columbia & west Saskatchewan', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-0640-06952', 'America/Eirunepe', 'W Amazonas', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('SV', '+1342-08912', 'America/El_Salvador', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Ensenada', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Tijuana'),
('BR', '-0343-03830', 'America/Fortaleza', 'NE Brazil (MA, PI, CE, RN, PB)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Fort_Wayne', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Indiana/Indianapolis'),
('CA', '+4612-05957', 'America/Glace_Bay', 'Atlantic Time - Nova Scotia - places that did not observe DST 1966-1971', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GL', '+6411-05144', 'America/Godthab', 'most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+5320-06025', 'America/Goose_Bay', 'Atlantic Time - Labrador - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('TC', '+2128-07108', 'America/Grand_Turk', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GD', '+1203-06145', 'America/Grenada', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GP', '+1614-06132', 'America/Guadeloupe', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GT', '+1438-09031', 'America/Guatemala', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('EC', '-0210-07950', 'America/Guayaquil', 'mainland', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GY', '+0648-05810', 'America/Guyana', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4439-06336', 'America/Halifax', 'Atlantic Time - Nova Scotia (most places), PEI', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CU', '+2308-08222', 'America/Havana', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2904-11058', 'America/Hermosillo', 'Mountain Standard Time - Sonora', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+394606-0860929', 'America/Indiana/Indianapolis', 'Eastern Time - Indiana - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+411745-0863730', 'America/Indiana/Knox', 'Central Time - Indiana - Starke County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+382232-0862041', 'America/Indiana/Marengo', 'Eastern Time - Indiana - Crawford County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+382931-0871643', 'America/Indiana/Petersburg', 'Eastern Time - Indiana - Pike County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+375711-0864541', 'America/Indiana/Tell_City', 'Central Time - Indiana - Perry County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+384452-0850402', 'America/Indiana/Vevay', 'Eastern Time - Indiana - Switzerland County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+384038-0873143', 'America/Indiana/Vincennes', 'Eastern Time - Indiana - Daviess, Dubois, Knox & Martin Counties', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+410305-0863611', 'America/Indiana/Winamac', 'Eastern Time - Indiana - Pulaski County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Indianapolis', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Indiana/Indianapolis'),
('CA', '+682059-1334300', 'America/Inuvik', 'Mountain Time - west Northwest Territories', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+6344-06828', 'America/Iqaluit', 'Eastern Time - east Nunavut - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('JM', '+1800-07648', 'America/Jamaica', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Jujuy', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Argentina/Jujuy'),
('US', '+581807-1342511', 'America/Juneau', 'Alaska Time - Alaska panhandle', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+381515-0854534', 'America/Kentucky/Louisville', 'Eastern Time - Kentucky - Louisville area', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+364947-0845057', 'America/Kentucky/Monticello', 'Eastern Time - Kentucky - Wayne County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Knox_IN', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Indiana/Knox'),
('BQ', '+120903-0681636', 'America/Kralendijk', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Curacao'),
('BO', '-1630-06809', 'America/La_Paz', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('PE', '-1203-07703', 'America/Lima', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+340308-1181434', 'America/Los_Angeles', 'Pacific Time', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Louisville', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Kentucky/Louisville'),
('SX', '+180305-0630250', 'America/Lower_Princes', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Curacao'),
('BR', '-0940-03543', 'America/Maceio', 'Alagoas, Sergipe', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('NI', '+1209-08617', 'America/Managua', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-0308-06001', 'America/Manaus', 'E Amazonas', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MF', '+1804-06305', 'America/Marigot', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Guadeloupe'),
('MQ', '+1436-06105', 'America/Martinique', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2550-09730', 'America/Matamoros', 'US Central Time - Coahuila, Durango, Nuevo LeÃƒÂ³n, Tamaulipas near US border', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2313-10625', 'America/Mazatlan', 'Mountain Time - S Baja, Nayarit, Sinaloa', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Mendoza', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Argentina/Mendoza'),
('US', '+450628-0873651', 'America/Menominee', 'Central Time - Michigan - Dickinson, Gogebic, Iron & Menominee Counties', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2058-08937', 'America/Merida', 'Central Time - Campeche, YucatÃƒÂ¡n', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+550737-1313435', 'America/Metlakatla', 'Metlakatla Time - Annette Island', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+1924-09909', 'America/Mexico_City', 'Central Time - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('PM', '+4703-05620', 'America/Miquelon', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4606-06447', 'America/Moncton', 'Atlantic Time - New Brunswick', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2540-10019', 'America/Monterrey', 'Mexican Central Time - Coahuila, Durango, Nuevo LeÃƒÂ³n, Tamaulipas away from US bord', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('UY', '-3453-05611', 'America/Montevideo', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4531-07334', 'America/Montreal', 'Eastern Time - Quebec - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MS', '+1643-06213', 'America/Montserrat', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BS', '+2505-07721', 'America/Nassau', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+404251-0740023', 'America/New_York', 'Eastern Time', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4901-08816', 'America/Nipigon', 'Eastern Time - Ontario & Quebec - places that did not observe DST 1967-1973', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+643004-1652423', 'America/Nome', 'Alaska Time - west Alaska', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-0351-03225', 'America/Noronha', 'Atlantic islands', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+471551-1014640', 'America/North_Dakota/Beulah', 'Central Time - North Dakota - Mercer County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+470659-1011757', 'America/North_Dakota/Center', 'Central Time - North Dakota - Oliver County', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+465042-1012439', 'America/North_Dakota/New_Salem', 'Central Time - North Dakota - Morton County (except Mandan area)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+2934-10425', 'America/Ojinaga', 'US Mountain Time - Chihuahua near US border', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('PA', '+0858-07932', 'America/Panama', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+6608-06544', 'America/Pangnirtung', 'Eastern Time - Pangnirtung, Nunavut', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('SR', '+0550-05510', 'America/Paramaribo', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+332654-1120424', 'America/Phoenix', 'Mountain Standard Time - Arizona', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('HT', '+1832-07220', 'America/Port-au-Prince', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Porto_Acre', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Rio_Branco'),
('BR', '-0846-06354', 'America/Porto_Velho', 'Rondonia', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('TT', '+1039-06131', 'America/Port_of_Spain', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('PR', '+182806-0660622', 'America/Puerto_Rico', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4843-09434', 'America/Rainy_River', 'Central Time - Rainy River & Fort Frances, Ontario', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+624900-0920459', 'America/Rankin_Inlet', 'Central Time - central Nunavut', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-0803-03454', 'America/Recife', 'Pernambuco', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+5024-10439', 'America/Regina', 'Central Standard Time - Saskatchewan - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+744144-0944945', 'America/Resolute', 'Central Standard Time - Resolute, Nunavut', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-0958-06748', 'America/Rio_Branco', 'Acre', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Rosario', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Argentina/Cordoba'),
('BR', '-0226-05452', 'America/Santarem', 'W Para', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+3018-11452', 'America/Santa_Isabel', 'Mexican Pacific Time - Baja California away from US border', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CL', '-3327-07040', 'America/Santiago', 'most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('DO', '+1828-06954', 'America/Santo_Domingo', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BR', '-2332-04637', 'America/Sao_Paulo', 'S & SE Brazil (GO, DF, MG, ES, RJ, SP, PR, SC, RS)', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GL', '+7029-02158', 'America/Scoresbysund', 'Scoresbysund / Ittoqqortoormiit', 'Ã¢Ë†â€™0', '+00:00', ''),
('US', '+364708-1084111', 'America/Shiprock', 'Mountain Time - Navajo', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Denver'),
('US', '+571035-1351807', 'America/Sitka', 'Alaska Time - southeast Alaska panhandle', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('BL', '+1753-06251', 'America/St_Barthelemy', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Guadeloupe'),
('CA', '+4734-05243', 'America/St_Johns', 'Newfoundland Time, including SE Labrador', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('KN', '+1718-06243', 'America/St_Kitts', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('LC', '+1401-06100', 'America/St_Lucia', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('VI', '+1821-06456', 'America/St_Thomas', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('VC', '+1309-06114', 'America/St_Vincent', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+5017-10750', 'America/Swift_Current', 'Central Standard Time - Saskatchewan - midwest', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('HN', '+1406-08713', 'America/Tegucigalpa', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('GL', '+7634-06847', 'America/Thule', 'Thule / Pituffik', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4823-08915', 'America/Thunder_Bay', 'Eastern Time - Thunder Bay, Ontario', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('MX', '+3232-11701', 'America/Tijuana', 'US Pacific Time - Baja California near US border', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4339-07923', 'America/Toronto', 'Eastern Time - Ontario - most locations', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('VG', '+1827-06437', 'America/Tortola', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4916-12307', 'America/Vancouver', 'Pacific Time - west British Columbia', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'America/Virgin', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/St_Thomas'),
('CA', '+6043-13503', 'America/Whitehorse', 'Pacific Time - south Yukon', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+4953-09709', 'America/Winnipeg', 'Central Time - Manitoba & west Ontario', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('US', '+593249-1394338', 'America/Yakutat', 'Alaska Time - Alaska panhandle neck', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('CA', '+6227-11421', 'America/Yellowknife', 'Mountain Time - central Northwest Territories', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AQ', '-6617+11031', 'Antarctica/Casey', 'Casey Station, Bailey Peninsula', '+11:00', '+08:00', ''),
('AQ', '-6835+07758', 'Antarctica/Davis', 'Davis Station, Vestfold Hills', '+05:00', '+07:00', ''),
('AQ', '-6640+14001', 'Antarctica/DumontDUrville', 'Dumont-d\'Urville Station, Terre Adelie', '+10:00', '+10:00', ''),
('AQ', '-5430+15857', 'Antarctica/Macquarie', 'Macquarie Island Station, Macquarie Island', '+11:00', '+11:00', ''),
('AQ', '-6736+06253', 'Antarctica/Mawson', 'Mawson Station, Holme Bay', '+05:00', '+05:00', ''),
('AQ', '-7750+16636', 'Antarctica/McMurdo', 'McMurdo Station, Ross Island', '+12:00', '+13:00', ''),
('AQ', '-6448-06406', 'Antarctica/Palmer', 'Palmer Station, Anvers Island', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AQ', '-6734-06808', 'Antarctica/Rothera', 'Rothera Station, Adelaide Island', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('AQ', '-9000+00000', 'Antarctica/South_Pole', 'Amundsen-Scott Station, South Pole', '+12:00', '+13:00', 'Link to Antarctica/McMurdo'),
('AQ', '-690022+0393524', 'Antarctica/Syowa', 'Syowa Station, E Ongul I', '+03:00', '+03:00', ''),
('AQ', '-7824+10654', 'Antarctica/Vostok', 'Vostok Station, Lake Vostok', '+06:00', '+06:00', ''),
('SJ', '+7800+01600', 'Arctic/Longyearbyen', '', '+01:00', '+02:00', 'Link to Europe/Oslo'),
('YE', '+1245+04512', 'Asia/Aden', '', '+03:00', '+03:00', ''),
('KZ', '+4315+07657', 'Asia/Almaty', 'most locations', '+06:00', '+06:00', ''),
('JO', '+3157+03556', 'Asia/Amman', '', '+03:00', '+03:00', ''),
('RU', '+6445+17729', 'Asia/Anadyr', 'Moscow+08 - Bering Sea', '+12:00', '+12:00', ''),
('KZ', '+4431+05016', 'Asia/Aqtau', 'Atyrau (Atirau, Gur\'yev), Mangghystau (Mankistau)', '+05:00', '+05:00', ''),
('KZ', '+5017+05710', 'Asia/Aqtobe', 'Aqtobe (Aktobe)', '+05:00', '+05:00', ''),
('TM', '+3757+05823', 'Asia/Ashgabat', '', '+05:00', '+05:00', ''),
('', '', 'Asia/Ashkhabad', '', '+05:00', '+05:00', 'Link to Asia/Ashgabat'),
('IQ', '+3321+04425', 'Asia/Baghdad', '', '+03:00', '+03:00', ''),
('BH', '+2623+05035', 'Asia/Bahrain', '', '+03:00', '+03:00', ''),
('AZ', '+4023+04951', 'Asia/Baku', '', '+04:00', '+05:00', ''),
('TH', '+1345+10031', 'Asia/Bangkok', '', '+07:00', '+07:00', ''),
('LB', '+3353+03530', 'Asia/Beirut', '', '+02:00', '+03:00', ''),
('KG', '+4254+07436', 'Asia/Bishkek', '', '+06:00', '+06:00', ''),
('BN', '+0456+11455', 'Asia/Brunei', '', '+08:00', '+08:00', ''),
('', '', 'Asia/Calcutta', '', '+05:30', '+05:30', 'Link to Asia/Kolkata'),
('MN', '+4804+11430', 'Asia/Choibalsan', 'Dornod, Sukhbaatar', '+08:00', '+08:00', ''),
('CN', '+2934+10635', 'Asia/Chongqing', 'central China - Sichuan, Yunnan, Guangxi, Shaanxi, Guizhou, etc.', '+08:00', '+08:00', 'Covering historic Kansu-Szechuan time zone.'),
('', '', 'Asia/Chungking', '', '+08:00', '+08:00', 'Link to Asia/Chongqing'),
('LK', '+0656+07951', 'Asia/Colombo', '', '+05:30', '+05:30', ''),
('', '', 'Asia/Dacca', '', '+06:00', '+06:00', 'Link to Asia/Dhaka'),
('SY', '+3330+03618', 'Asia/Damascus', '', '+02:00', '+03:00', ''),
('BD', '+2343+09025', 'Asia/Dhaka', '', '+06:00', '+06:00', ''),
('TL', '-0833+12535', 'Asia/Dili', '', '+09:00', '+09:00', ''),
('AE', '+2518+05518', 'Asia/Dubai', '', '+04:00', '+04:00', ''),
('TJ', '+3835+06848', 'Asia/Dushanbe', '', '+05:00', '+05:00', ''),
('PS', '+3130+03428', 'Asia/Gaza', 'Gaza Strip', '+02:00', '+03:00', ''),
('CN', '+4545+12641', 'Asia/Harbin', 'Heilongjiang (except Mohe), Jilin', '+08:00', '+08:00', 'Covering historic Changpai time zone.'),
('PS', '+313200+0350542', 'Asia/Hebron', 'West Bank', '+02:00', '+03:00', ''),
('HK', '+2217+11409', 'Asia/Hong_Kong', '', '+08:00', '+08:00', ''),
('MN', '+4801+09139', 'Asia/Hovd', 'Bayan-Olgiy, Govi-Altai, Hovd, Uvs, Zavkhan', '+07:00', '+07:00', ''),
('VN', '+1045+10640', 'Asia/Ho_Chi_Minh', '', '+07:00', '+07:00', ''),
('RU', '+5216+10420', 'Asia/Irkutsk', 'Moscow+05 - Lake Baikal', '+09:00', '+09:00', ''),
('', '', 'Asia/Istanbul', '', '+02:00', '+03:00', 'Link to Europe/Istanbul'),
('ID', '-0610+10648', 'Asia/Jakarta', 'Java & Sumatra', '+07:00', '+07:00', ''),
('ID', '-0232+14042', 'Asia/Jayapura', 'west New Guinea (Irian Jaya) & Malukus (Moluccas)', '+09:00', '+09:00', ''),
('IL', '+3146+03514', 'Asia/Jerusalem', '', '+02:00', '+03:00', ''),
('AF', '+3431+06912', 'Asia/Kabul', '', '+04:30', '+04:30', ''),
('RU', '+5301+15839', 'Asia/Kamchatka', 'Moscow+08 - Kamchatka', '+12:00', '+12:00', ''),
('PK', '+2452+06703', 'Asia/Karachi', '', '+05:00', '+05:00', ''),
('CN', '+3929+07559', 'Asia/Kashgar', 'west Tibet & Xinjiang', '+08:00', '+08:00', 'Covering historic Kunlun time zone.'),
('NP', '+2743+08519', 'Asia/Kathmandu', '', '+05:45', '+05:45', ''),
('', '', 'Asia/Katmandu', '', '+05:45', '+05:45', 'Link to Asia/Kathmandu'),
('IN', '+2232+08822', 'Asia/Kolkata', '', '+05:30', '+05:30', 'Note: Different zones in history, see Time in India.'),
('RU', '+5601+09250', 'Asia/Krasnoyarsk', 'Moscow+04 - Yenisei River', '+08:00', '+08:00', ''),
('MY', '+0310+10142', 'Asia/Kuala_Lumpur', 'peninsular Malaysia', '+08:00', '+08:00', ''),
('MY', '+0133+11020', 'Asia/Kuching', 'Sabah & Sarawak', '+08:00', '+08:00', ''),
('KW', '+2920+04759', 'Asia/Kuwait', '', '+03:00', '+03:00', ''),
('', '', 'Asia/Macao', '', '+08:00', '+08:00', 'Link to Asia/Macau'),
('MO', '+2214+11335', 'Asia/Macau', '', '+08:00', '+08:00', ''),
('RU', '+5934+15048', 'Asia/Magadan', 'Moscow+08 - Magadan', '+12:00', '+12:00', ''),
('ID', '-0507+11924', 'Asia/Makassar', 'east & south Borneo, Sulawesi (Celebes), Bali, Nusa Tenggara, west Timor', '+08:00', '+08:00', ''),
('PH', '+1435+12100', 'Asia/Manila', '', '+08:00', '+08:00', ''),
('OM', '+2336+05835', 'Asia/Muscat', '', '+04:00', '+04:00', ''),
('CY', '+3510+03322', 'Asia/Nicosia', '', '+02:00', '+03:00', ''),
('RU', '+5345+08707', 'Asia/Novokuznetsk', 'Moscow+03 - Novokuznetsk', '+07:00', '+07:00', ''),
('RU', '+5502+08255', 'Asia/Novosibirsk', 'Moscow+03 - Novosibirsk', '+07:00', '+07:00', ''),
('RU', '+5500+07324', 'Asia/Omsk', 'Moscow+03 - west Siberia', '+07:00', '+07:00', ''),
('KZ', '+5113+05121', 'Asia/Oral', 'West Kazakhstan', '+05:00', '+05:00', ''),
('KH', '+1133+10455', 'Asia/Phnom_Penh', '', '+07:00', '+07:00', ''),
('ID', '-0002+10920', 'Asia/Pontianak', 'west & central Borneo', '+07:00', '+07:00', ''),
('KP', '+3901+12545', 'Asia/Pyongyang', '', '+09:00', '+09:00', ''),
('QA', '+2517+05132', 'Asia/Qatar', '', '+03:00', '+03:00', ''),
('KZ', '+4448+06528', 'Asia/Qyzylorda', 'Qyzylorda (Kyzylorda, Kzyl-Orda)', '+06:00', '+06:00', ''),
('MM', '+1647+09610', 'Asia/Rangoon', '', '+06:30', '+06:30', ''),
('SA', '+2438+04643', 'Asia/Riyadh', '', '+03:00', '+03:00', ''),
('', '', 'Asia/Saigon', '', '+07:00', '+07:00', 'Link to Asia/Ho_Chi_Minh'),
('RU', '+4658+14242', 'Asia/Sakhalin', 'Moscow+07 - Sakhalin Island', '+11:00', '+11:00', ''),
('UZ', '+3940+06648', 'Asia/Samarkand', 'west Uzbekistan', '+05:00', '+05:00', ''),
('KR', '+3733+12658', 'Asia/Seoul', '', '+09:00', '+09:00', ''),
('CN', '+3114+12128', 'Asia/Shanghai', 'east China - Beijing, Guangdong, Shanghai, etc.', '+08:00', '+08:00', 'Covering historic Chungyuan time zone.'),
('SG', '+0117+10351', 'Asia/Singapore', '', '+08:00', '+08:00', ''),
('TW', '+2503+12130', 'Asia/Taipei', '', '+08:00', '+08:00', ''),
('UZ', '+4120+06918', 'Asia/Tashkent', 'east Uzbekistan', '+05:00', '+05:00', ''),
('GE', '+4143+04449', 'Asia/Tbilisi', '', '+04:00', '+04:00', ''),
('IR', '+3540+05126', 'Asia/Tehran', '', '+03:30', '+04:30', ''),
('', '', 'Asia/Tel_Aviv', '', '+02:00', '+03:00', 'Link to Asia/Jerusalem'),
('', '', 'Asia/Thimbu', '', '+06:00', '+06:00', 'Link to Asia/Thimphu'),
('BT', '+2728+08939', 'Asia/Thimphu', '', '+06:00', '+06:00', ''),
('JP', '+353916+1394441', 'Asia/Tokyo', '', '+09:00', '+09:00', ''),
('', '', 'Asia/Ujung_Pandang', '', '+08:00', '+08:00', 'Link to Asia/Makassar'),
('MN', '+4755+10653', 'Asia/Ulaanbaatar', 'most locations', '+08:00', '+08:00', ''),
('', '', 'Asia/Ulan_Bator', '', '+08:00', '+08:00', 'Link to Asia/Ulaanbaatar'),
('CN', '+4348+08735', 'Asia/Urumqi', 'most of Tibet & Xinjiang', '+08:00', '+08:00', 'Covering historic Sinkiang-Tibet time zone.'),
('LA', '+1758+10236', 'Asia/Vientiane', '', '+07:00', '+07:00', ''),
('RU', '+4310+13156', 'Asia/Vladivostok', 'Moscow+07 - Amur River', '+11:00', '+11:00', ''),
('RU', '+6200+12940', 'Asia/Yakutsk', 'Moscow+06 - Lena River', '+10:00', '+10:00', ''),
('RU', '+5651+06036', 'Asia/Yekaterinburg', 'Moscow+02 - Urals', '+06:00', '+06:00', ''),
('AM', '+4011+04430', 'Asia/Yerevan', '', '+04:00', '+04:00', ''),
('PT', '+3744-02540', 'Atlantic/Azores', 'Azores', 'Ã¢Ë†â€™0', '+00:00', ''),
('BM', '+3217-06446', 'Atlantic/Bermuda', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('ES', '+2806-01524', 'Atlantic/Canary', 'Canary Islands', '+00:00', '+01:00', ''),
('CV', '+1455-02331', 'Atlantic/Cape_Verde', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'Atlantic/Faeroe', '', '+00:00', '+01:00', 'Link to Atlantic/Faroe'),
('FO', '+6201-00646', 'Atlantic/Faroe', '', '+00:00', '+01:00', ''),
('', '', 'Atlantic/Jan_Mayen', '', '+01:00', '+02:00', 'Link to Europe/Oslo'),
('PT', '+3238-01654', 'Atlantic/Madeira', 'Madeira Islands', '+00:00', '+01:00', ''),
('IS', '+6409-02151', 'Atlantic/Reykjavik', '', '+00:00', '+00:00', ''),
('GS', '-5416-03632', 'Atlantic/South_Georgia', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('FK', '-5142-05751', 'Atlantic/Stanley', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('SH', '-1555-00542', 'Atlantic/St_Helena', '', '+00:00', '+00:00', ''),
('', '', 'Australia/ACT', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3455+13835', 'Australia/Adelaide', 'South Australia', '+09:30', '+10:30', ''),
('AU', '-2728+15302', 'Australia/Brisbane', 'Queensland - most locations', '+10:00', '+10:00', ''),
('AU', '-3157+14127', 'Australia/Broken_Hill', 'New South Wales - Yancowinna', '+09:30', '+10:30', ''),
('', '', 'Australia/Canberra', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3956+14352', 'Australia/Currie', 'Tasmania - King Island', '+10:00', '+11:00', ''),
('AU', '-1228+13050', 'Australia/Darwin', 'Northern Territory', '+09:30', '+09:30', ''),
('AU', '-3143+12852', 'Australia/Eucla', 'Western Australia - Eucla area', '+08:45', '+08:45', ''),
('AU', '-4253+14719', 'Australia/Hobart', 'Tasmania - most locations', '+10:00', '+11:00', ''),
('', '', 'Australia/LHI', '', '+10:30', '+11:00', 'Link to Australia/Lord_Howe'),
('AU', '-2016+14900', 'Australia/Lindeman', 'Queensland - Holiday Islands', '+10:00', '+10:00', ''),
('AU', '-3133+15905', 'Australia/Lord_Howe', 'Lord Howe Island', '+10:30', '+11:00', ''),
('AU', '-3749+14458', 'Australia/Melbourne', 'Victoria', '+10:00', '+11:00', ''),
('', '', 'Australia/North', '', '+09:30', '+09:30', 'Link to Australia/Darwin'),
('', '', 'Australia/NSW', '', '+10:00', '+11:00', 'Link to Australia/Sydney'),
('AU', '-3157+11551', 'Australia/Perth', 'Western Australia - most locations', '+08:00', '+08:00', ''),
('', '', 'Australia/Queensland', '', '+10:00', '+10:00', 'Link to Australia/Brisbane'),
('', '', 'Australia/South', '', '+09:30', '+10:30', 'Link to Australia/Adelaide'),
('AU', '-3352+15113', 'Australia/Sydney', 'New South Wales - most locations', '+10:00', '+11:00', ''),
('', '', 'Australia/Tasmania', '', '+10:00', '+11:00', 'Link to Australia/Hobart'),
('', '', 'Australia/Victoria', '', '+10:00', '+11:00', 'Link to Australia/Melbourne'),
('', '', 'Australia/West', '', '+08:00', '+08:00', 'Link to Australia/Perth'),
('', '', 'Australia/Yancowinna', '', '+09:30', '+10:30', 'Link to Australia/Broken_Hill'),
('', '', 'Brazil/Acre', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Rio_Branco'),
('', '', 'Brazil/DeNoronha', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Noronha'),
('', '', 'Brazil/East', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Sao_Paulo'),
('', '', 'Brazil/West', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Manaus'),
('', '', 'Canada/Atlantic', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Halifax'),
('', '', 'Canada/Central', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Winnipeg'),
('', '', 'Canada/East-Saskatchewan', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Regina'),
('', '', 'Canada/Eastern', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Toronto'),
('', '', 'Canada/Mountain', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Edmonton'),
('', '', 'Canada/Newfoundland', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/St_Johns'),
('', '', 'Canada/Pacific', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Vancouver'),
('', '', 'Canada/Saskatchewan', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Regina'),
('', '', 'Canada/Yukon', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Whitehorse'),
('', '', 'CET', '', '+01:00', '+02:00', ''),
('', '', 'Chile/Continental', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Santiago'),
('', '', 'Chile/EasterIsland', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to Pacific/Easter'),
('', '', 'CST6CDT', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'Cuba', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Havana'),
('', '', 'EET', '', '+02:00', '+03:00', ''),
('', '', 'Egypt', '', '+02:00', '+02:00', 'Link to Africa/Cairo'),
('', '', 'Eire', '', '+00:00', '+01:00', 'Link to Europe/Dublin'),
('', '', 'EST', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'EST5EDT', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'Etc./GMT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./GMT+0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./UCT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./Universal', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./UTC', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Etc./Zulu', '', '+00:00', '+00:00', 'Link to UTC'),
('NL', '+5222+00454', 'Europe/Amsterdam', '', '+01:00', '+02:00', ''),
('AD', '+4230+00131', 'Europe/Andorra', '', '+01:00', '+02:00', ''),
('GR', '+3758+02343', 'Europe/Athens', '', '+02:00', '+03:00', ''),
('', '', 'Europe/Belfast', '', '+00:00', '+01:00', 'Link to Europe/London'),
('RS', '+4450+02030', 'Europe/Belgrade', '', '+01:00', '+02:00', ''),
('DE', '+5230+01322', 'Europe/Berlin', '', '+01:00', '+02:00', 'In 1945, the Trizone did not follow Berlin\'s switch to DST, see Time in Germany'),
('SK', '+4809+01707', 'Europe/Bratislava', '', '+01:00', '+02:00', 'Link to Europe/Prague'),
('BE', '+5050+00420', 'Europe/Brussels', '', '+01:00', '+02:00', ''),
('RO', '+4426+02606', 'Europe/Bucharest', '', '+02:00', '+03:00', ''),
('HU', '+4730+01905', 'Europe/Budapest', '', '+01:00', '+02:00', ''),
('MD', '+4700+02850', 'Europe/Chisinau', '', '+02:00', '+03:00', ''),
('DK', '+5540+01235', 'Europe/Copenhagen', '', '+01:00', '+02:00', ''),
('IE', '+5320-00615', 'Europe/Dublin', '', '+00:00', '+01:00', ''),
('GI', '+3608-00521', 'Europe/Gibraltar', '', '+01:00', '+02:00', ''),
('GG', '+4927-00232', 'Europe/Guernsey', '', '+00:00', '+01:00', 'Link to Europe/London'),
('FI', '+6010+02458', 'Europe/Helsinki', '', '+02:00', '+03:00', ''),
('IM', '+5409-00428', 'Europe/Isle_of_Man', '', '+00:00', '+01:00', 'Link to Europe/London'),
('TR', '+4101+02858', 'Europe/Istanbul', '', '+02:00', '+03:00', ''),
('JE', '+4912-00207', 'Europe/Jersey', '', '+00:00', '+01:00', 'Link to Europe/London'),
('RU', '+5443+02030', 'Europe/Kaliningrad', 'Moscow-01 - Kaliningrad', '+03:00', '+03:00', ''),
('UA', '+5026+03031', 'Europe/Kiev', 'most locations', '+02:00', '+03:00', ''),
('PT', '+3843-00908', 'Europe/Lisbon', 'mainland', '+00:00', '+01:00', ''),
('SI', '+4603+01431', 'Europe/Ljubljana', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('GB', '+513030-0000731', 'Europe/London', '', '+00:00', '+01:00', ''),
('LU', '+4936+00609', 'Europe/Luxembourg', '', '+01:00', '+02:00', ''),
('ES', '+4024-00341', 'Europe/Madrid', 'mainland', '+01:00', '+02:00', ''),
('MT', '+3554+01431', 'Europe/Malta', '', '+01:00', '+02:00', ''),
('AX', '+6006+01957', 'Europe/Mariehamn', '', '+02:00', '+03:00', 'Link to Europe/Helsinki'),
('BY', '+5354+02734', 'Europe/Minsk', '', '+03:00', '+03:00', ''),
('MC', '+4342+00723', 'Europe/Monaco', '', '+01:00', '+02:00', ''),
('RU', '+5545+03735', 'Europe/Moscow', 'Moscow+00 - west Russia', '+04:00', '+04:00', ''),
('', '', 'Europe/Nicosia', '', '+02:00', '+03:00', 'Link to Asia/Nicosia'),
('NO', '+5955+01045', 'Europe/Oslo', '', '+01:00', '+02:00', ''),
('FR', '+4852+00220', 'Europe/Paris', '', '+01:00', '+02:00', ''),
('ME', '+4226+01916', 'Europe/Podgorica', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('CZ', '+5005+01426', 'Europe/Prague', '', '+01:00', '+02:00', ''),
('LV', '+5657+02406', 'Europe/Riga', '', '+02:00', '+03:00', ''),
('IT', '+4154+01229', 'Europe/Rome', '', '+01:00', '+02:00', ''),
('RU', '+5312+05009', 'Europe/Samara', 'Moscow+00 - Samara, Udmurtia', '+04:00', '+04:00', ''),
('SM', '+4355+01228', 'Europe/San_Marino', '', '+01:00', '+02:00', 'Link to Europe/Rome'),
('BA', '+4352+01825', 'Europe/Sarajevo', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('UA', '+4457+03406', 'Europe/Simferopol', 'central Crimea', '+02:00', '+03:00', ''),
('MK', '+4159+02126', 'Europe/Skopje', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('BG', '+4241+02319', 'Europe/Sofia', '', '+02:00', '+03:00', ''),
('SE', '+5920+01803', 'Europe/Stockholm', '', '+01:00', '+02:00', ''),
('EE', '+5925+02445', 'Europe/Tallinn', '', '+02:00', '+03:00', ''),
('AL', '+4120+01950', 'Europe/Tirane', '', '+01:00', '+02:00', ''),
('', '', 'Europe/Tiraspol', '', '+02:00', '+03:00', 'Link to Europe/Chisinau'),
('UA', '+4837+02218', 'Europe/Uzhgorod', 'Ruthenia', '+02:00', '+03:00', ''),
('LI', '+4709+00931', 'Europe/Vaduz', '', '+01:00', '+02:00', ''),
('VA', '+415408+0122711', 'Europe/Vatican', '', '+01:00', '+02:00', 'Link to Europe/Rome'),
('AT', '+4813+01620', 'Europe/Vienna', '', '+01:00', '+02:00', ''),
('LT', '+5441+02519', 'Europe/Vilnius', '', '+02:00', '+03:00', ''),
('RU', '+4844+04425', 'Europe/Volgograd', 'Moscow+00 - Caspian Sea', '+04:00', '+04:00', ''),
('PL', '+5215+02100', 'Europe/Warsaw', '', '+01:00', '+02:00', ''),
('HR', '+4548+01558', 'Europe/Zagreb', '', '+01:00', '+02:00', 'Link to Europe/Belgrade'),
('UA', '+4750+03510', 'Europe/Zaporozhye', 'Zaporozh\'ye, E Lugansk / Zaporizhia, E Luhansk', '+02:00', '+03:00', ''),
('CH', '+4723+00832', 'Europe/Zurich', '', '+01:00', '+02:00', ''),
('', '', 'GB', '', '+00:00', '+01:00', 'Link to Europe/London'),
('', '', 'GB-Eire', '', '+00:00', '+01:00', 'Link to Europe/London'),
('', '', 'GMT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT+0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT-0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'GMT0', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Greenwich', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Hong Kong', '', '+08:00', '+08:00', 'Link to Asia/Hong_Kong'),
('', '', 'HST', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('', '', 'Iceland', '', '+00:00', '+00:00', 'Link to Atlantic/Reykjavik'),
('MG', '-1855+04731', 'Indian/Antananarivo', '', '+03:00', '+03:00', ''),
('IO', '-0720+07225', 'Indian/Chagos', '', '+06:00', '+06:00', ''),
('CX', '-1025+10543', 'Indian/Christmas', '', '+07:00', '+07:00', ''),
('CC', '-1210+09655', 'Indian/Cocos', '', '+06:30', '+06:30', ''),
('KM', '-1141+04316', 'Indian/Comoro', '', '+03:00', '+03:00', ''),
('TF', '-492110+0701303', 'Indian/Kerguelen', '', '+05:00', '+05:00', ''),
('SC', '-0440+05528', 'Indian/Mahe', '', '+04:00', '+04:00', ''),
('MV', '+0410+07330', 'Indian/Maldives', '', '+05:00', '+05:00', ''),
('MU', '-2010+05730', 'Indian/Mauritius', '', '+04:00', '+04:00', ''),
('YT', '-1247+04514', 'Indian/Mayotte', '', '+03:00', '+03:00', ''),
('RE', '-2052+05528', 'Indian/Reunion', '', '+04:00', '+04:00', ''),
('', '', 'Iran', '', '+03:30', '+04:30', 'Link to Asia/Tehran'),
('', '', 'Israel', '', '+02:00', '+03:00', 'Link to Asia/Jerusalem'),
('', '', 'Jamaica', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Jamaica'),
('', '', 'Japan', '', '+09:00', '+09:00', 'Link to Asia/Tokyo'),
('', '', 'JST-9', '', '+09:00', '+09:00', 'Link to Asia/Tokyo'),
('', '', 'Kwajalein', '', '+12:00', '+12:00', 'Link to Pacific/Kwajalein'),
('', '', 'Libya', '', '+02:00', '+02:00', 'Link to Africa/Tripoli'),
('', '', 'MET', '', '+01:00', '+02:00', ''),
('', '', 'Mexico/BajaNorte', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Tijuana'),
('', '', 'Mexico/BajaSur', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Mazatlan'),
('', '', 'Mexico/General', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Mexico_City'),
('', '', 'MST', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'MST7MDT', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'Navajo', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Denver'),
('', '', 'NZ', '', '+12:00', '+13:00', 'Link to Pacific/Auckland'),
('', '', 'NZ-CHAT', '', '+12:45', '+13:45', 'Link to Pacific/Chatham'),
('WS', '-1350-17144', 'Pacific/Apia', '', '+13:00', '+14:00', ''),
('NZ', '-3652+17446', 'Pacific/Auckland', 'most locations', '+12:00', '+13:00', ''),
('NZ', '-4357-17633', 'Pacific/Chatham', 'Chatham Islands', '+12:45', '+13:45', ''),
('FM', '+0725+15147', 'Pacific/Chuuk', 'Chuuk (Truk) and Yap', '+10:00', '+10:00', ''),
('CL', '-2709-10926', 'Pacific/Easter', 'Easter Island & Sala y Gomez', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('VU', '-1740+16825', 'Pacific/Efate', '', '+11:00', '+11:00', ''),
('KI', '-0308-17105', 'Pacific/Enderbury', 'Phoenix Islands', '+13:00', '+13:00', ''),
('TK', '-0922-17114', 'Pacific/Fakaofo', '', '+13:00', '+13:00', ''),
('FJ', '-1808+17825', 'Pacific/Fiji', '', '+12:00', '+13:00', ''),
('TV', '-0831+17913', 'Pacific/Funafuti', '', '+12:00', '+12:00', ''),
('EC', '-0054-08936', 'Pacific/Galapagos', 'Galapagos Islands', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('PF', '-2308-13457', 'Pacific/Gambier', 'Gambier Islands', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('SB', '-0932+16012', 'Pacific/Guadalcanal', '', '+11:00', '+11:00', ''),
('GU', '+1328+14445', 'Pacific/Guam', '', '+10:00', '+10:00', ''),
('US', '+211825-1575130', 'Pacific/Honolulu', 'Hawaii', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('UM', '+1645-16931', 'Pacific/Johnston', 'Johnston Atoll', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('KI', '+0152-15720', 'Pacific/Kiritimati', 'Line Islands', '+14:00', '+14:00', ''),
('FM', '+0519+16259', 'Pacific/Kosrae', 'Kosrae', '+11:00', '+11:00', ''),
('MH', '+0905+16720', 'Pacific/Kwajalein', 'Kwajalein', '+12:00', '+12:00', ''),
('MH', '+0709+17112', 'Pacific/Majuro', 'most locations', '+12:00', '+12:00', ''),
('PF', '-0900-13930', 'Pacific/Marquesas', 'Marquesas Islands', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('UM', '+2813-17722', 'Pacific/Midway', 'Midway Islands', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('NR', '-0031+16655', 'Pacific/Nauru', '', '+12:00', '+12:00', ''),
('NU', '-1901-16955', 'Pacific/Niue', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('NF', '-2903+16758', 'Pacific/Norfolk', '', '+11:30', '+11:30', ''),
('NC', '-2216+16627', 'Pacific/Noumea', '', '+11:00', '+11:00', ''),
('AS', '-1416-17042', 'Pacific/Pago_Pago', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('PW', '+0720+13429', 'Pacific/Palau', '', '+09:00', '+09:00', ''),
('PN', '-2504-13005', 'Pacific/Pitcairn', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('FM', '+0658+15813', 'Pacific/Pohnpei', 'Pohnpei (Ponape)', '+11:00', '+11:00', ''),
('', '', 'Pacific/Ponape', '', '+11:00', '+11:00', 'Link to Pacific/Pohnpei'),
('PG', '-0930+14710', 'Pacific/Port_Moresby', '', '+10:00', '+10:00', ''),
('CK', '-2114-15946', 'Pacific/Rarotonga', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('MP', '+1512+14545', 'Pacific/Saipan', '', '+10:00', '+10:00', ''),
('', '', 'Pacific/Samoa', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', 'Link to Pacific/Pago_Pago'),
('PF', '-1732-14934', 'Pacific/Tahiti', 'Society Islands', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', ''),
('KI', '+0125+17300', 'Pacific/Tarawa', 'Gilbert Islands', '+12:00', '+12:00', ''),
('TO', '-2110-17510', 'Pacific/Tongatapu', '', '+13:00', '+13:00', ''),
('', '', 'Pacific/Truk', '', '+10:00', '+10:00', 'Link to Pacific/Chuuk'),
('UM', '+1917+16637', 'Pacific/Wake', 'Wake Island', '+12:00', '+12:00', ''),
('WF', '-1318-17610', 'Pacific/Wallis', '', '+12:00', '+12:00', ''),
('', '', 'Pacific/Yap', '', '+10:00', '+10:00', 'Link to Pacific/Chuuk'),
('', '', 'Poland', '', '+01:00', '+02:00', 'Link to Europe/Warsaw'),
('', '', 'Portugal', '', '+00:00', '+01:00', 'Link to Europe/Lisbon'),
('', '', 'PRC', '', '+08:00', '+08:00', 'Link to Asia/Shanghai'),
('', '', 'PST8PDT', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', ''),
('', '', 'ROC', '', '+08:00', '+08:00', 'Link to Asia/Taipei'),
('', '', 'ROK', '', '+09:00', '+09:00', 'Link to Asia/Seoul'),
('', '', 'Singapore', '', '+08:00', '+08:00', 'Link to Asia/Singapore'),
('', '', 'Turkey', '', '+02:00', '+03:00', 'Link to Europe/Istanbul'),
('', '', 'UCT', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'Universal', '', '+00:00', '+00:00', 'Link to UTC'),
('', '', 'US/Alaska', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Anchorage'),
('', '', 'US/Aleutian', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™0', 'Link to America/Adak'),
('', '', 'US/Arizona', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Phoenix'),
('', '', 'US/Central', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Chicago'),
('', '', 'US/East-Indiana', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Indiana/Indianapolis'),
('', '', 'US/Eastern', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/New_York'),
('', '', 'US/Hawaii', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', 'Link to Pacific/Honolulu'),
('', '', 'US/Indiana-Starke', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Indiana/Knox'),
('', '', 'US/Michigan', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Detroit'),
('', '', 'US/Mountain', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Denver'),
('', '', 'US/Pacific', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Los_Angeles'),
('', '', 'US/Pacific-New', '', 'Ã¢Ë†â€™0', 'Ã¢Ë†â€™0', 'Link to America/Los_Angeles'),
('', '', 'US/Samoa', '', 'Ã¢Ë†â€™1', 'Ã¢Ë†â€™1', 'Link to Pacific/Pago_Pago'),
('', '', 'UTC', '', '+00:00', '+00:00', ''),
('', '', 'W-SU', '', '+04:00', '+04:00', 'Link to Europe/Moscow'),
('', '', 'WET', '', '+00:00', '+01:00', ''),
('', '', 'Zulu', '', '+00:00', '+00:00', 'Link to UTC');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('nls2q8m20v65gkts929b9sp5ol382osl', '::1', 1779775374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737353337343b6c6f67696e5f656d61696c7c733a31363a2272616b65736840676d61696c2e636f6d223b6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a323a223138223b6e616d657c733a31323a2252616b657368204b756d6172223b757365725f69735f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a353a226167656e74223b),
('a3roh53tdjsdanrff9u5bclvmpnp4vgh', '::1', 1779776085, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737363038353b),
('ei5a73jirg2ravuk6mq2fumedm1aegsd', '::1', 1779776397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737363339373b),
('9m575n9qv0rfgbive07k7t0c65ig3aml', '::1', 1779777231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737373233313b),
('1slv1lbughi481mh1m3bviba8j6mm22e', '::1', 1779777821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737373832313b),
('ghlveq86ee08d74m5aq9gk8r1up1en4o', '::1', 1779778278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737383237383b),
('11f5g34thkjcvu8bsjh4fem5tqt2hbln', '::1', 1779779503, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737393530333b),
('8nqu28esh0ccln09r25adm292619t7k7', '::1', 1779778585, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737383538353b),
('ij02guq7vsel0s9s9to95ckoa2co1vii', '::1', 1779779921, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393737393932313b6c6f67696e5f656d61696c7c733a32313a227261746e6573686b35303040676d61696c2e636f6d223b6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a313a2231223b6e616d657c733a31343a225261746e657368204b756d617273223b61646d696e5f69735f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a353a2261646d696e223b757365725f69735f6c6f67696e7c733a313a2231223b),
('7kimp9mtme017f8omsnj5dpp1ljcmpml', '::1', 1779781131, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393738313133313b),
('4uu1l77hu6s715r7ccquvrap0d8rhekq', '::1', 1779781531, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393738313533313b656d61696c5f616464726573737c4e3b),
('4okh2e2f5l35mpgg8qg06ug39ftgku0d', '::1', 1779782228, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393738323232383b),
('oa8b068innq0g7nh0r76nqk9fninohhh', '::1', 1779783508, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393738333530383b),
('b04evmnlf0ss18p88boconbmiuladgdh', '::1', 1779787444, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393738373434343b),
('089d6qfuod92ugtoremok4psnmk0q3b9', '::1', 1779788018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393738383031383b),
('ghsf0h4qa3eev18m17uekuq6v6u3lbb2', '::1', 1779788319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393738383331393b6c6f67696e5f656d61696c7c733a31393a226c616c6c756b35303040676d61696c2e636f6d223b6c6f67696e5f7374617475737c733a313a2231223b757365725f69647c733a323a223530223b6e616d657c733a31313a224c616c6c75204b756d6172223b757365725f69735f6c6f67696e7c733a313a2231223b6c6f67696e5f747970657c733a31333a2262726f6b65725f7265636f7264223b),
('mhd7rfblnmvfcmpj5j12s1co4ls4fs58', '::1', 1779790012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739303031323b),
('qscc3lt8aa7ctgggtd5srp5g431gams6', '::1', 1779790313, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739303331333b),
('olpr801pln0fbngsji2im2ruaimeaipg', '::1', 1779791196, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739313139363b),
('3v1l8clabme47iok6eqrem1se44bkvjl', '::1', 1779792398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739323339383b),
('htqba087mh8lbi1hqtsstua3n22ho5ce', '::1', 1779793121, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739333132313b),
('l8f2lfs5fm0uu7u2fr38ll0u6qkov4ia', '127.0.0.1', 1779793169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739333136393b),
('chq2c1j4kpfob6aoo7ucos62jhukea5q', '::1', 1779793461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739333436313b),
('flhl9pqnl63unesj4ii0n7b7p07mlovj', '127.0.0.1', 1779793395, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739333136393b),
('jp9bitjnntvvj9fgk4f36s0rcphpra2h', '::1', 1779793762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739333736323b),
('sk84jnvkhuoq5tmjob4sqaeu1spotrnb', '::1', 1779794219, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739343231393b),
('638o60uvau7k9g9o4e4q0vs08n4t7j8s', '::1', 1779794629, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739343632393b),
('ml1ho19m1an0vjggq90m6bee9gdrk4mt', '::1', 1779794930, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739343933303b),
('k117lfm42eaf0m3i84oe3mb85iv1qgbh', '::1', 1779795243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739353234333b),
('t6mad7g3h5jcrfp52oteck8mot5lon82', '::1', 1779795582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739353538323b),
('ahi89pbgeoq389n04vr2qikk6jodj97b', '::1', 1779795902, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739353930323b),
('8daem0albj2pt85olr0a9vulroiohipk', '::1', 1779796204, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393739363230343b),
('vqkqleo76mcvc847eb7j010eioosv508', '::1', 1779806083, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393830363038333b),
('n0pupbj8oi45ifsjevvq06tda7f9smvj', '::1', 1779806471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393830363437313b),
('p08bh6mlulmbau2a3gh5fnds2t39c7u4', '::1', 1779806478, 0x5f5f63695f6c6173745f726567656e65726174657c693a313737393830363437313b);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `video_id` int(20) NOT NULL,
  `comment_type` int(5) NOT NULL DEFAULT 1,
  `replay_for` int(10) DEFAULT 0,
  `comment` mediumtext DEFAULT NULL,
  `comment_at` datetime DEFAULT NULL,
  `publication` int(5) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `value` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `title`, `value`) VALUES
(1, 'system_name', 'MCL'),
(2, 'site_name', 'MCL'),
(3, 'author', 'Jone Doe'),
(4, 'business_address', 'My Address'),
(5, 'business_phone', '880170000000'),
(6, 'contact_email', 'contact@mydomain.com'),
(7, 'system_email', 'email@mydomain.com'),
(8, 'system_short_name', 'MCL'),
(9, 'social_share_enable', '0'),
(10, 'default_color', '#00CC6A'),
(11, 'front_end_theme', 'blue'),
(12, 'seo_title', ''),
(13, 'focus_keyword', ''),
(14, 'meta_description', ''),
(15, 'blog_enable', '0'),
(16, 'blog_title', ''),
(17, 'blog_keyword', ''),
(18, 'blog_meta_description', ''),
(19, 'home_page_seo_title', ''),
(20, 'language', 'english'),
(21, 'site_url', 'https://mydomain.com'),
(22, 'total_movie_in_slider', '5'),
(23, 'footer1_title', 'About'),
(24, 'footer1_content', ''),
(25, 'footer2_title', 'Useful Link'),
(26, 'footer2_content', ''),
(27, 'footer3_title', 'Useful Link'),
(28, 'footer3_content', ''),
(29, 'copyright_text', 'Copyright 2020 <a href=\"#\">Business Name</a>'),
(30, 'slider_type', 'disable'),
(31, 'slide_per_page', '8'),
(32, 'protocol', 'sendmail'),
(33, 'mailpath', '/usr/bin/sendmail'),
(34, 'smtp_host', 'smtp.gmail.com'),
(35, 'smtp_user', 'example@gmail.com'),
(36, 'smtp_pass', 'xxxxxxxxxxxx'),
(37, 'smtp_port', '465'),
(38, 'smtp_crypto', 'ssl'),
(39, 'facebook_url', '#'),
(40, 'twitter_url', '#'),
(41, 'vimeo_url', '#'),
(42, 'linkedin_url', '#'),
(43, 'youtube_url', '#'),
(44, 'google_analytics_id', 'UA-00000000-1'),
(45, 'about_us_enable', '1'),
(46, 'about_us_title', 'about'),
(47, 'about_us_text', 'about us'),
(48, 'about_us_to_primary_menu', '1'),
(49, 'about_us_to_footer_menu', '0'),
(50, 'facebook_comment_appid', '0000'),
(51, 'comments_method', '0'),
(52, 'comments_approval', '0'),
(53, 'ad_160x600_code', ''),
(54, 'ad_160x600_type', '1'),
(55, 'ad_160x600_image_url', ''),
(56, 'ad_250x300_type', '1'),
(57, 'ad_250x300_image_url', ''),
(58, 'ad_250x300_code', ''),
(59, 'ad_160x600_url', ''),
(60, 'ad_250x300_url', '#'),
(61, 'map_api', 'xxxxxxxxxxxxxxxxxxxxxxx'),
(62, 'map_lat', 'xxxxxxxxxxxxxxxx'),
(63, 'map_lng', 'xxxxxxxxxxxxxxxxxxxx'),
(64, 'movie_per_page', '18'),
(65, 'google_application_name', 'Connect With Ovoo'),
(66, 'google_client_id', 'xxxxxxxxxxxxxxxxxxxx'),
(67, 'google_client_secret', 'xxxxxxxxxxxxxxxxxxxxxxx'),
(68, 'google_redirect_uri', 'https://google.com/'),
(69, 'google_api_key', ''),
(70, 'google_login_enable', '0'),
(71, 'facebook_app_id', 'xxxxxxxxxxxxxxxxxxxx'),
(72, 'facebook_app_secret', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(73, 'facebook_graph_version', 'v2.10'),
(74, 'google_login_enable', '0'),
(75, 'facebook_login_enable', '0'),
(76, 'tv_series_publish', '1'),
(77, 'tv_series_title', 'Tv-Series Page SEO Title'),
(78, 'tv_series_keyword', ''),
(79, 'tv_series_meta_description', '                                                                                          '),
(80, 'tv_series_pin_primary_menu', '1'),
(81, 'tv_series_pin_footer_menu', '1'),
(82, 'purchase_code', 'REfsgg-6743788y vb-623763'),
(83, 'header_templete', 'header1'),
(84, 'footer_templete', 'footer1'),
(85, 'dark_theme', '1'),
(86, 'player_color_skin', 'blue'),
(87, 'player_watermark', '0'),
(88, 'player_watermark_logo', 'uploads/watermark_logo.png'),
(89, 'player_watermark_url', '#'),
(90, 'player_share', ''),
(91, 'player_share_fb_id', '35345'),
(92, 'player_seek_button', '0'),
(95, 'player_volume_remember', '0'),
(93, 'player_seek_forward', '10'),
(94, 'player_seek_back', '5'),
(98, 'live_tv_publish', '1'),
(99, 'live_tv_title', 'Latest TV Page SEO Title'),
(100, 'live_tv_keyword', ''),
(101, 'live_tv_meta_description', '                                                                                          '),
(102, 'live_tv_pin_primary_menu', '1'),
(103, 'live_tv_pin_footer_menu', '1'),
(104, 'registration_enable', '1'),
(105, 'frontend_login_enable', '1'),
(106, 'push_notification_enable', ''),
(107, 'onesignal_appid', 'xxxxxxxxxxxxxxx'),
(108, 'onesignal_actionmessage', 'We\\\'d like to show you notifications for the latest news.'),
(109, 'onesignal_acceptbuttontext', 'ALLOW'),
(110, 'onesignal_cancelbuttontext', 'NO THANKS'),
(111, 'onesignal_api_keys', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(112, 'landing_page_enable', '1'),
(113, 'landing_page_image_url', 'landing_page/bg.jpg'),
(142, 'mobile_apps_api_secret_key', '88e7d383cf706d3'),
(115, 'country_to_primary_menu', '0'),
(116, 'genre_to_primary_menu', '1'),
(117, 'release_to_primary_menu', '1'),
(118, 'show_star_image', '0'),
(119, 'movie_page_seo_title', 'Movie Page SEO Title'),
(120, 'movie_page_focus_keyword', ''),
(121, 'movie_page_meta_description', ''),
(128, 'dmca_policy_content', 'privacy_policy_content'),
(122, 'privacy_policy_content', ''),
(123, 'privacy_policy_to_primary_menu', '0'),
(124, 'privacy_policy_to_footer_menu', '0'),
(125, 'disclaimer_text', '<b>Disclaimer:</b> This site does not store any files on its server. All contents are provided by non-affiliated third parties.'),
(126, 'disclaimer_text_enable', '0'),
(127, 'movie_report_enable', '1'),
(129, 'dmca_to_primary_menu', '0'),
(130, 'dmca_to_footer_menu', '0'),
(131, 'dmca_content', ''),
(132, 'contact_to_primary_menu', '0'),
(133, 'contact_to_footer_menu', '1'),
(134, 'movie_report_note', 'Please help us to describe the issue so we can fix it asap. \r\nNote: This feature used to report the issue for the current movie, not used for requesting new subtitle/audio in another language'),
(135, 'movie_report_email', 'contact@mydomain.com'),
(136, 'movie_request_enable', '1'),
(137, 'movie_request_email', 'contact@mydomain.com'),
(138, 'envato_support_untill', '2019-01-01'),
(139, 'cron_key', 'c1508ceb244870a'),
(140, 'db_backup', '0'),
(141, 'backup_schedule', '1'),
(143, 'version', '3.2.8'),
(144, 'preroll_ads_enable', '0'),
(145, 'preroll_ads_video', 'https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_20mb.mp4'),
(146, 'admob_ads_enable', '0'),
(147, 'admob_app_id', 'ca-app-pub-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxe'),
(148, 'admob_banner_ads_id', 'ca-app-pub-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(149, 'admob_interstitial_ads_id', 'ca-app-pub-xxxxxxxxxxxxxxxxxxx/xxxxxxxxxxxxxx'),
(150, 'admob_publisher_id', 'pub-xxxxxxxxxxxxxxxxxxe'),
(151, 'recaptcha_site_key', 'xxxxxxxxxxxxxxxxxxx'),
(152, 'recaptcha_secret_key', 'xxxxxxxxxxxxxxxxxxxx'),
(153, 'az_to_primary_menu', '1'),
(154, 'az_to_footer_menu', '1'),
(155, 'recaptcha_enable', '0'),
(156, 'active_theme', 'mcl'),
(157, 'active_language_id', '1'),
(158, 'disqus_short_name', 'ovoo'),
(159, 'trial_enable', '0'),
(160, 'trial_period', '0'),
(171, 'tmdb_language', 'en'),
(172, 'default_quality', 'HD'),
(173, 'app_menu', 'grid'),
(174, 'app_program_guide_enable', 'false'),
(175, 'app_mandatory_login', 'false'),
(176, 'genre_visible', 'true'),
(177, 'country_visible', 'true'),
(178, 'timezone', 'Asia/Dhaka'),
(179, 'season_order', 'DESC'),
(180, 'episode_order', 'DESC'),
(181, 'video_source', 'mp4'),
(182, 'video_file_order', 'DESC'),
(183, 'tmbd_api_key', 'xxxxxxxxxxxxxxxxxxxx'),
(193, 'slider_border_radius', '10'),
(192, 'slider_height', '420'),
(190, 'slider_arrow', '0'),
(191, 'slider_bullet', '1'),
(189, 'slider_fullwide', '0'),
(194, 'logo', 'logo_62764f49646e5.png'),
(196, 'favicon', 'favicon_62764f497fd7d.png'),
(197, 'landing_bg', 'landing_page/bg.jpg'),
(199, 'trial_enable', '0'),
(200, 'trial_period', '0'),
(201, 'paypal_email', 'paypal@domain.com'),
(202, 'currency_symbol', '$'),
(203, 'stripe_publishable_key', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(204, 'stripe_secret_key', 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'),
(205, 'currency', 'USD'),
(206, 'paypal_client_id', 'xxxxxxxxxxxxxxxxxxxx'),
(207, 'exchange_rate_update_by_cron', '0'),
(208, 'enable_ribbon', '1'),
(209, 'mobile_ads_enable', '0'),
(210, 'mobile_ads_network', 'admob'),
(211, 'fan_native_ads_placement_id', 'xxxxxxxxxxxxxxxxxxxx'),
(212, 'fan_banner_ads_placement_id', 'xxxxxxxxxxxxxxxxxxxxxxx'),
(213, 'fan_Interstitial_ads_placement_id', 'xxxxxxxxxxxxxxxxxxxxxx'),
(214, 'startapp_app_id', 'xxxxxxxxxxx'),
(218, 'apk_version_code', '15'),
(219, 'apk_version_name', 'v1.2.8'),
(220, 'apk_whats_new', 'New UI\r\nDownload option\r\nAdvanced Search\r\nSubscription'),
(221, 'latest_apk_url', 'http://oxoo.spagreen.net/demo/oxoo-v121.apk'),
(222, 'apk_update_is_skipable', '1'),
(223, 'razorpay_key_id', 'xxxxxxxxxxx'),
(224, 'razorpay_key_secret', 'xxxxxxxxxxxx'),
(225, 'paypal_enable', 'true'),
(226, 'stripe_enable', 'true'),
(227, 'razorpay_enable', 'true'),
(228, 'razorpay_inr_exchange_rate', '1'),
(229, 'admob_native_ads_id', 'xxxxxxxxxxx'),
(230, 'offline_payment_enable', 'false'),
(231, 'offline_payment_title', 'Offline Payment'),
(232, 'offline_payment_instruction', 'Offline payment instruction goes here.'),
(233, 'movie_page_slider', '1'),
(234, 'tv_series_page_slider', '1');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(25) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `publication` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `name`, `description`, `slug`, `publication`) VALUES
(1, 'International', '', 'international', 1),
(2, 'Asia', '', 'asia', 1),
(3, 'USA', '', 'usa', 1),
(4, 'China', '', 'china', 1),
(5, 'Japan', '', 'japan', 1),
(6, 'Korean', '', 'korean', 1),
(7, 'Nepal', '', 'nepal', 1),
(8, 'Thailand', '', 'thailand', 1),
(9, 'Tamil', '', 'tamil', 1),
(10, 'India', '', 'india', 1),
(11, 'France', '', 'france', 1),
(12, 'Italy', '', 'italy', 1),
(13, 'German', '', 'german', 1),
(14, 'London', '', 'london', 1),
(15, 'Canada', '', 'canada', 1),
(16, 'Denmark', '', 'denmark', 1),
(17, 'UK', '', 'uk', 1),
(18, 'Hong kong', '', 'hong-kong', 1),
(19, 'UAE', '', 'uae', 1),
(20, 'Australia', '', 'australia', 1),
(21, 'South Korea', '', 'south-korea', 1),
(22, 'Russia', '', 'russia', 1),
(23, ' Sweden', '', 'sweden', 1),
(24, 'Spain', '', 'spain', 1),
(25, 'Brazil', '', 'brazil', 1),
(26, 'Iran', '', 'iran', 1),
(27, 'Israel', '', 'israel', 1),
(28, 'Indonesia', '', 'indonesia', 1),
(29, 'Philippines', '', 'philippines', 1),
(30, ' Peru', ' Peru', 'peru', 1),
(31, ' Canada', ' Canada', 'canada', 1),
(32, ' Japan', ' Japan', 'japan', 1),
(33, ' USA', ' USA', 'usa', 1),
(34, ' Hong Kong', ' Hong Kong', 'hong-kong', 1),
(35, ' Mexico', ' Mexico', 'mexico', 1),
(36, ' New Zealand', ' New Zealand', 'new-zealand', 1),
(37, ' UK', ' UK', 'uk', 1),
(38, ' Denmark', ' Denmark', 'denmark', 1),
(39, ' Australia', ' Australia', 'australia', 1),
(40, ' Germany', ' Germany', 'germany', 1),
(41, ' Hungary', ' Hungary', 'hungary', 1),
(42, ' India', ' India', 'india', 1),
(43, 'Hungary', 'Hungary', 'hungary', 1),
(44, ' France', ' France', 'france', 1),
(45, ' China', ' China', 'china', 1),
(46, 'Chile', 'Chile', 'chile', 1),
(47, ' Argentina', ' Argentina', 'argentina', 1),
(48, 'Egypt', 'Egypt', 'egypt', 1),
(49, 'New Zealand', 'New Zealand', 'new-zealand', 1),
(50, 'Croatia', 'Croatia', 'croatia', 1),
(51, ' Switzerland', ' Switzerland', 'switzerland', 1),
(52, ' Tunisia', ' Tunisia', 'tunisia', 1),
(53, 'Belgium', 'Belgium', 'belgium', 1),
(68, 'United States of America', 'United States of America', 'united-states-of-america', 1),
(69, 'Bangladesh', 'Bangladesh', 'bangladesh', 1),
(70, 'United Kingdom', 'United Kingdom', 'united-kingdom', 1),
(71, 'Malaysia', 'Malaysia', 'malaysia', 1),
(72, 'South Africa', 'South Africa', 'south-africa', 1),
(73, 'Switzerland', 'Switzerland', 'switzerland', 1),
(74, 'Germany', 'Germany', 'germany', 1),
(75, 'Sweden', 'Sweden', 'sweden', 1),
(76, 'Bulgaria', 'Bulgaria', 'bulgaria', 1),
(77, 'Soviet Union', 'Soviet Union', 'soviet-union', 1),
(78, 'Netherlands', 'Netherlands', 'netherlands', 1),
(80, 'Malta', 'Malta', 'malta', 1),
(81, 'Taiwan', 'Taiwan', 'taiwan', 1),
(82, 'Argentina', 'Argentina', 'argentina', 1),
(83, 'Iceland', 'Iceland', 'iceland', 1),
(84, 'CA', 'CA', 'ca', 1),
(85, 'JP', 'JP', 'jp', 1),
(86, 'US', 'US', 'us', 1),
(87, 'GB', 'GB', 'gb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cron`
--

CREATE TABLE `cron` (
  `cron_id` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `action` varchar(250) NOT NULL,
  `image_url` longtext NOT NULL,
  `save_to` varchar(250) DEFAULT NULL,
  `videos_id` int(250) DEFAULT NULL,
  `admin_email_from` varchar(250) DEFAULT NULL,
  `admin_email` varchar(250) DEFAULT NULL,
  `email_to` varchar(250) DEFAULT NULL,
  `email_sub` varchar(250) DEFAULT NULL,
  `message` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `iso_code` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL,
  `exchange_rate` double NOT NULL DEFAULT 1,
  `default` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `country`, `currency`, `iso_code`, `symbol`, `exchange_rate`, `default`, `status`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek', 1, 0, 1),
(2, 'America', 'Dollars', 'USD', '$', 1, 0, 1),
(3, 'Afghanistan', 'Afghanis', 'AFN', 'Ø‹', 1, 0, 1),
(4, 'Argentina', 'Pesos', 'ARS', '$', 61.399228, 0, 1),
(5, 'Aruba', 'Guilders', 'AWG', 'Æ’', 1, 0, 1),
(6, 'Australia', 'Dollars', 'AUD', '$', 1.4882, 0, 1),
(7, 'Azerbaijan', 'New Manats', 'AZN', 'Ð¼Ð°Ð½', 1, 0, 1),
(8, 'Bahamas', 'Dollars', 'BSD', '$', 1, 0, 1),
(9, 'Barbados', 'Dollars', 'BBD', '$', 1, 0, 1),
(10, 'Belarus', 'Rubles', 'BYR', 'p.', 1, 0, 1),
(11, 'Belgium', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$', 1, 0, 1),
(13, 'Bermuda', 'Dollars', 'BMD', '$', 1, 0, 1),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b', 1, 0, 1),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM', 1, 0, 1),
(16, 'Botswana', 'Pula', 'BWP', 'P', 1, 0, 1),
(17, 'Bulgaria', 'Leva', 'BGN', 'Ð»Ð²', 1.803753, 0, 1),
(18, 'Brazil', 'Reais', 'BRL', 'R$', 4.330496, 0, 1),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', 'Â£', 83, 0, 1),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$', 1, 0, 1),
(21, 'Cambodia', 'Riels', 'KHR', 'áŸ›', 1, 0, 1),
(22, 'Canada', 'Dollars', 'CAD', '$', 1.325097, 0, 1),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$', 1, 0, 1),
(24, 'Chile', 'Pesos', 'CLP', '$', 794.622928, 0, 1),
(25, 'China', 'Yuan Renminbi', 'CNY', 'Â¥', 6.984162, 0, 1),
(26, 'Colombia', 'Pesos', 'COP', '$', 3313, 0, 1),
(27, 'Costa Rica', 'ColÃ³n', 'CRC', 'â‚¡', 1, 0, 1),
(28, 'Croatia', 'Kuna', 'HRK', 'kn', 6.869981, 0, 1),
(29, 'Cuba', 'Pesos', 'CUP', 'â‚±', 1, 0, 1),
(30, 'Cyprus', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(31, 'Czech Republic', 'Koruny', 'CZK', 'KÄ', 22.911451, 0, 1),
(32, 'Denmark', 'Kroner', 'DKK', 'kr', 6.890187, 0, 1),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$', 53.507402, 0, 1),
(34, 'East Caribbean', 'Dollars', 'XCD', '$', 1, 0, 1),
(35, 'Egypt', 'Pounds', 'EGP', 'Â£', 15.61815, 0, 1),
(36, 'El Salvador', 'Colones', 'SVC', '$', 1, 0, 1),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', 'Â£', 83, 0, 1),
(38, 'Euro', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(39, 'Falkland Islands', 'Pounds', 'FKP', 'Â£', 1, 0, 1),
(40, 'Fiji', 'Dollars', 'FJD', '$', 2.195918, 0, 1),
(41, 'France', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(42, 'Ghana', 'Cedis', 'GHC', 'Â¢', 1, 0, 1),
(43, 'Gibraltar', 'Pounds', 'GIP', 'Â£', 1, 0, 1),
(44, 'Greece', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q', 7.63804, 0, 1),
(46, 'Guernsey', 'Pounds', 'GGP', 'Â£', 1, 0, 1),
(47, 'Guyana', 'Dollars', 'GYD', '$', 1, 0, 1),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(49, 'Honduras', 'Lempiras', 'HNL', 'L', 1, 0, 1),
(50, 'Hong Kong', 'Dollars', 'HKD', '$', 7.767071, 0, 1),
(51, 'Hungary', 'Forint', 'HUF', 'Ft', 310.231043, 0, 1),
(52, 'Iceland', 'Kronur', 'ISK', 'kr', 126.858376, 0, 1),
(53, 'India', 'Rupees', 'INR', 'Rp', 71.40112, 0, 1),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp', 13612.651679, 0, 1),
(55, 'Iran', 'Rials', 'IRR', 'ï·¼', 1, 0, 1),
(56, 'Ireland', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(57, 'Isle of Man', 'Pounds', 'IMP', 'Â£', 1, 0, 1),
(58, 'Israel', 'New Shekels', 'ILS', 'â‚ª', 3.427408, 0, 1),
(59, 'Italy', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$', 1, 0, 1),
(61, 'Japan', 'Yen', 'JPY', 'Â¥', 109.814254, 0, 1),
(62, 'Jersey', 'Pounds', 'JEP', 'Â£', 1, 0, 1),
(63, 'Kazakhstan', 'Tenge', 'KZT', 'Ð»Ð²', 376.834123, 0, 1),
(64, 'Korea (North)', 'Won', 'KPW', 'â‚©', 1, 0, 1),
(65, 'Korea (South)', 'Won', 'KRW', 'â‚©', 1183.94149, 0, 1),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'Ð»Ð²', 1, 0, 1),
(67, 'Laos', 'Kips', 'LAK', 'â‚­', 1, 0, 1),
(68, 'Latvia', 'Lati', 'LVL', 'Ls', 1, 0, 1),
(69, 'Lebanon', 'Pounds', 'LBP', 'Â£', 1, 0, 1),
(70, 'Liberia', 'Dollars', 'LRD', '$', 1, 0, 1),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF', 0.980752, 0, 1),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt', 1, 0, 1),
(73, 'Luxembourg', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(74, 'Macedonia', 'Denars', 'MKD', 'Ð´ÐµÐ½', 1, 0, 1),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM', 4.139749, 0, 1),
(76, 'Malta', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(77, 'Mauritius', 'Rupees', 'MUR', 'â‚¨', 1, 0, 1),
(78, 'Mexico', 'Pesos', 'MXN', '$', 18.585695, 0, 1),
(79, 'Mongolia', 'Tugriks', 'MNT', 'â‚®', 1, 0, 1),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT', 1, 0, 1),
(81, 'Namibia', 'Dollars', 'NAD', '$', 1, 0, 1),
(82, 'Nepal', 'Rupees', 'NPR', 'â‚¨', 1, 0, 1),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'Æ’', 1, 0, 1),
(84, 'Netherlands', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(85, 'New Zealand', 'Dollars', 'NZD', '$', 1.553574, 0, 1),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$', 1, 0, 1),
(87, 'Nigeria', 'Nairas', 'NGN', 'â‚¦', 1, 0, 1),
(88, 'North Korea', 'Won', 'KPW', 'â‚©', 1, 0, 1),
(89, 'Norway', 'Krone', 'NOK', 'kr', 9.253793, 0, 1),
(90, 'Oman', 'Rials', 'OMR', 'ï·¼', 1, 0, 1),
(91, 'Pakistan', 'Rupees', 'PKR', 'â‚¨', 154.392233, 0, 1),
(92, 'Panama', 'Balboa', 'PAB', 'B/.', 1, 0, 1),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs', 6626, 0, 1),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.', 3.383275, 0, 1),
(95, 'Philippines', 'Pesos', 'PHP', 'Php', 50.525693, 0, 1),
(96, 'Poland', 'Zlotych', 'PLN', 'zÅ‚', 3.917289, 0, 1),
(97, 'Qatar', 'Rials', 'QAR', 'ï·¼', 1, 0, 1),
(98, 'Romania', 'New Lei', 'RON', 'lei', 4.396745, 0, 1),
(99, 'Russia', 'Rubles', 'RUB', 'Ñ€ÑƒÐ±', 63.537178, 0, 1),
(100, 'Saint Helena', 'Pounds', 'SHP', 'Â£', 1, 0, 1),
(101, 'Saudi Arabia', 'Riyals', 'SAR', 'ï·¼', 3.75061, 0, 1),
(102, 'Serbia', 'Dinars', 'RSD', 'Ð”Ð¸Ð½.', 1, 0, 1),
(103, 'Seychelles', 'Rupees', 'SCR', 'â‚¨', 1, 0, 1),
(104, 'Singapore', 'Dollars', 'SGD', '$', 1.390516, 0, 1),
(105, 'Slovenia', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$', 1, 0, 1),
(107, 'Somalia', 'Shillings', 'SOS', 'S', 1, 0, 1),
(108, 'South Africa', 'Rand', 'ZAR', 'R', 14.88117, 0, 1),
(109, 'South Korea', 'Won', 'KRW', 'â‚©', 1183.94149, 0, 1),
(110, 'Spain', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(111, 'Sri Lanka', 'Rupees', 'LKR', 'â‚¨', 1, 0, 1),
(112, 'Sweden', 'Kronor', 'SEK', 'kr', 9.694847, 0, 1),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF', 0.980752, 0, 1),
(114, 'Suriname', 'Dollars', 'SRD', '$', 1, 0, 1),
(115, 'Syria', 'Pounds', 'SYP', 'Â£', 1, 0, 1),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$', 30.0056, 0, 1),
(117, 'Thailand', 'Baht', 'THB', 'à¸¿', 31.163295, 0, 1),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$', 1, 0, 1),
(119, 'Turkey', 'Lira', 'TRY', 'TL', 6.053817, 0, 1),
(120, 'Turkey', 'Liras', 'TRL', 'Â£', 1, 0, 1),
(121, 'Tuvalu', 'Dollars', 'TVD', '$', 1, 0, 1),
(122, 'Ukraine', 'Hryvnia', 'UAH', 'â‚´', 24.336642, 0, 1),
(123, 'United Kingdom', 'Pounds', 'GBP', 'Â£', 83, 0, 1),
(124, 'United States of America', 'Dollars', 'USD', '$', 1, 0, 1),
(125, 'Uruguay', 'Pesos', 'UYU', '$U', 37.880896, 0, 1),
(126, 'Uzbekistan', 'Sums', 'UZS', 'Ð»Ð²', 1, 0, 1),
(127, 'Vatican City', 'Euro', 'EUR', 'â‚¬', 0.922379, 0, 1),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs', 1, 0, 1),
(129, 'Vietnam', 'Dong', 'VND', 'â‚«', 1, 0, 1),
(130, 'Yemen', 'Rials', 'YER', 'ï·¼', 1, 0, 1),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$', 1, 0, 1),
(132, 'Bangladesh', 'Taka', 'BDT', 'à§³', 83, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `download_link`
--

CREATE TABLE `download_link` (
  `download_link_id` int(11) NOT NULL,
  `videos_id` int(11) DEFAULT NULL,
  `link_title` varchar(250) DEFAULT NULL,
  `resolution` varchar(50) NOT NULL DEFAULT '720p',
  `file_size` varchar(50) NOT NULL DEFAULT '00MB',
  `download_url` varchar(500) DEFAULT NULL,
  `in_app_download` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `episodes_id` int(11) NOT NULL,
  `stream_key` varchar(50) DEFAULT NULL,
  `videos_id` int(11) DEFAULT NULL,
  `seasons_id` int(11) DEFAULT NULL,
  `episodes_name` varchar(250) DEFAULT NULL,
  `file_source` varchar(200) DEFAULT NULL,
  `source_type` varchar(250) DEFAULT NULL,
  `file_url` varchar(500) DEFAULT NULL,
  `order` int(50) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT '2019-01-01 00:00:00',
  `last_ep_added` datetime NOT NULL DEFAULT '2019-01-01 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `episode_download_link`
--

CREATE TABLE `episode_download_link` (
  `episode_download_link_id` int(11) NOT NULL,
  `videos_id` int(11) DEFAULT NULL,
  `season_id` varchar(250) DEFAULT NULL,
  `link_title` varchar(250) DEFAULT NULL,
  `resolution` varchar(50) NOT NULL DEFAULT '720p',
  `file_size` varchar(50) NOT NULL DEFAULT '00MB',
  `download_url` varchar(500) DEFAULT NULL,
  `in_app_download` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `publication` int(1) NOT NULL,
  `featured` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `name`, `description`, `slug`, `publication`, `featured`) VALUES
(1, 'Action', 'Action Movie<br>', 'action', 1, 1),
(2, 'TV Show', 'Tv Show <br>', 'tv-show', 1, 0),
(3, 'Si-Fi', '', 'si-fi', 1, 0),
(4, 'Adventure', 'Adventure Movies<br>', 'adventure', 1, 0),
(5, 'Animation', 'Animation Movies<br>', 'animation', 1, 0),
(6, 'Biography', 'Biography Movies<br>', 'biography', 1, 0),
(7, 'Comedy', 'Comedy Movies<br>', 'comedy', 1, 1),
(8, 'Crime', 'Crime Movies<br>', 'crime', 1, 0),
(9, 'Documentary', 'Documentary Movies<br>', 'documentary', 1, 0),
(10, 'Drama', '', 'drama', 1, 0),
(11, 'Family', 'Family<br>', 'family', 1, 0),
(12, 'Fantasy', 'Fantasy Movies<br>', 'fantasy', 1, 0),
(13, 'History', '', 'history', 1, 0),
(14, 'Horror', 'Horror Movies<br>', 'horror', 1, 1),
(15, 'Music', '', 'music', 1, 0),
(16, 'Musical', '', 'musical', 1, 0),
(17, 'Mystery', '', 'mystery', 1, 0),
(18, 'Thriller', '', 'thriller', 1, 1),
(19, 'War', '', 'war', 1, 0),
(20, 'Western', '', 'western', 1, 0),
(21, 'TV Series', '', 'tv-series', 1, 0),
(22, ' Romance', ' Romance', 'romance', 1, 0),
(23, ' Adventure', ' Adventure', 'adventure', 1, 0),
(24, ' Thriller', ' Thriller', 'thriller', 1, 0),
(25, ' Drama', ' Drama', 'drama', 1, 0),
(26, ' Fantasy', ' Fantasy', 'fantasy', 1, 0),
(27, ' Sci-Fi', ' Sci-Fi', 'sci-fi', 1, 0),
(28, ' Comedy', ' Comedy', 'comedy', 1, 0),
(29, ' Family', ' Family', 'family', 1, 0),
(30, ' Action', ' Action', 'action', 1, 1),
(31, 'Short', 'Short', 'short', 1, 0),
(32, ' Music', ' Music', 'music', 1, 0),
(33, ' History', ' History', 'history', 1, 0),
(34, ' Crime', ' Crime', 'crime', 1, 0),
(35, ' Western', ' Western', 'western', 1, 0),
(36, ' Sport', ' Sport', 'sport', 1, 0),
(37, ' Short', ' Short', 'short', 1, 0),
(38, ' Mystery', ' Mystery', 'mystery', 1, 0),
(39, 'Romance', 'Romance', 'romance', 1, 0),
(40, 'Action & Adventure', 'Action & Adventure', 'action-adventure', 1, 0),
(41, 'Sci-Fi & Fantasy', 'Sci-Fi & Fantasy', 'sci-fi-fantasy', 1, 0),
(42, 'Science Fiction', 'Science Fiction', 'science-fiction', 1, 0),
(44, 'TV Movie', 'TV Movie', 'tv-movie', 1, 0),
(45, 'News', 'News', 'news', 1, 0),
(46, 'Ø¬Ø±ÙŠÙ…Ø©', 'Ø¬Ø±ÙŠÙ…Ø©', 'Ø¬Ø±ÙŠÙ…Ø©', 1, 0),
(47, 'Ø¥Ø«Ø§Ø±Ø©', 'Ø¥Ø«Ø§Ø±Ø©', 'Ø¥Ø«Ø§Ø±Ø©', 1, 0),
(48, 'Ø¯Ø±Ø§Ù…Ø§', 'Ø¯Ø±Ø§Ù…Ø§', 'Ø¯Ø±Ø§Ù…Ø§', 1, 0),
(49, 'Ø­Ø±ÙƒØ©', 'Ø­Ø±ÙƒØ©', '', 1, 0),
(50, 'Ø®ÙŠØ§Ù„ Ø¹Ù„Ù…ÙŠ', 'Ø®ÙŠØ§Ù„ Ø¹Ù„Ù…ÙŠ', '', 1, 0),
(51, 'Ù…ØºØ§Ù…Ø±Ø©', 'Ù…ØºØ§Ù…Ø±Ø©', '', 1, 0),
(52, 'ÙØ§Ù†ØªØ§Ø²ÙŠØ§', 'ÙØ§Ù†ØªØ§Ø²ÙŠØ§', '', 1, 0),
(53, 'Ø±Ø³ÙˆÙ… Ù…ØªØ­Ø±ÙƒØ', 'Ø±Ø³ÙˆÙ… Ù…ØªØ­Ø±ÙƒØ©', '', 1, 0),
(54, 'Ø¹Ø§Ø¦Ù„ÙŠ', 'Ø¹Ø§Ø¦Ù„ÙŠ', '', 1, 0),
(55, 'ÙƒÙˆÙ…ÙŠØ¯ÙŠØ§', 'ÙƒÙˆÙ…ÙŠØ¯ÙŠØ§', '', 1, 0),
(56, 'ÙˆØ«Ø§Ø¦Ù‚ÙŠ', 'ÙˆØ«Ø§Ø¦Ù‚ÙŠ', '', 1, 0),
(57, 'Science-Fiction', 'Science-Fiction', 'science-fiction', 1, 0),
(58, 'Historie', 'Historie', 'historie', 1, 0),
(59, 'Abenteuer', 'Abenteuer', 'abenteuer', 1, 0),
(60, 'Familie', 'Familie', 'familie', 1, 0),
(61, 'Krimi', 'Krimi', 'krimi', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `homepage_sections`
--

CREATE TABLE `homepage_sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content_type` varchar(50) DEFAULT NULL,
  `layout` tinyint(4) DEFAULT NULL,
  `order` tinyint(4) DEFAULT 0,
  `genre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homepage_sections`
--

INSERT INTO `homepage_sections` (`id`, `title`, `content_type`, `layout`, `order`, `genre_id`) VALUES
(1, 'Latest Episodes', 'latest_episodes', NULL, 10, NULL),
(2, 'Latest Movies', 'latest_movies', NULL, 4, NULL),
(3, 'Latest Series', 'latest_tvseries', NULL, 5, NULL),
(4, 'Popular Movies', 'popular_movies', NULL, 7, NULL),
(5, 'Popular Tv Series', 'popular_tv_series', NULL, 8, NULL),
(6, 'Live TV', 'live_tv_list', NULL, 1, NULL),
(7, 'Popular Actor', 'popular_actors', NULL, 2, NULL),
(8, 'Animation', 'genre', NULL, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `label` varchar(250) DEFAULT 'System',
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` mediumtext DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `label`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 'Default', 'b106646c5cbe3e8', 1, 0, 0, NULL, 1582700749);

-- --------------------------------------------------------

--
-- Table structure for table `languages_iso`
--

CREATE TABLE `languages_iso` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(49) DEFAULT NULL,
  `iso` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages_iso`
--

INSERT INTO `languages_iso` (`id`, `name`, `iso`) VALUES
(1, 'English', 'en'),
(2, 'Afar', 'aa'),
(3, 'Abkhazian', 'ab'),
(4, 'Afrikaans', 'af'),
(5, 'Amharic', 'am'),
(6, 'Arabic', 'ar'),
(7, 'Assamese', 'as'),
(8, 'Aymara', 'ay'),
(9, 'Azerbaijani', 'az'),
(10, 'Bashkir', 'ba'),
(11, 'Belarusian', 'be'),
(12, 'Bulgarian', 'bg'),
(13, 'Bihari', 'bh'),
(14, 'Bislama', 'bi'),
(15, 'Bangla', 'bn'),
(16, 'Tibetan', 'bo'),
(17, 'Breton', 'br'),
(18, 'Catalan', 'ca'),
(19, 'Corsican', 'co'),
(20, 'Czech', 'cs'),
(21, 'Welsh', 'cy'),
(22, 'Danish', 'da'),
(23, 'German', 'de'),
(24, 'Bhutani', 'dz'),
(25, 'Greek', 'el'),
(26, 'Esperanto', 'eo'),
(27, 'Spanish', 'es'),
(28, 'Estonian', 'et'),
(29, 'Basque', 'eu'),
(30, 'Persian', 'fa'),
(31, 'Finnish', 'fi'),
(32, 'Fiji', 'fj'),
(33, 'Faeroese', 'fo'),
(34, 'French', 'fr'),
(35, 'Frisian', 'fy'),
(36, 'Irish', 'ga'),
(37, 'Scots/Gaelic', 'gd'),
(38, 'Galician', 'gl'),
(39, 'Guarani', 'gn'),
(40, 'Gujarati', 'gu'),
(41, 'Hausa', 'ha'),
(42, 'Hindi', 'hi'),
(43, 'Croatian', 'hr'),
(44, 'Hungarian', 'hu'),
(45, 'Armenian', 'hy'),
(46, 'Interlingua', 'ia'),
(47, 'Interlingue', 'ie'),
(48, 'Inupiak', 'ik'),
(49, 'Indonesian', 'in'),
(50, 'Icelandic', 'is'),
(51, 'Italian', 'it'),
(52, 'Hebrew', 'iw'),
(53, 'Japanese', 'ja'),
(54, 'Yiddish', 'ji'),
(55, 'Javanese', 'jw'),
(56, 'Georgian', 'ka'),
(57, 'Kazakh', 'kk'),
(58, 'Greenlandic', 'kl'),
(59, 'Cambodian', 'km'),
(60, 'Kannada', 'kn'),
(61, 'Korean', 'ko'),
(62, 'Kashmiri', 'ks'),
(63, 'Kurdish', 'ku'),
(64, 'Kirghiz', 'ky'),
(65, 'Latin', 'la'),
(66, 'Lingala', 'ln'),
(67, 'Laothian', 'lo'),
(68, 'Lithuanian', 'lt'),
(69, 'Latvian/Lettish', 'lv'),
(70, 'Malagasy', 'mg'),
(71, 'Maori', 'mi'),
(72, 'Macedonian', 'mk'),
(73, 'Malayalam', 'ml'),
(74, 'Mongolian', 'mn'),
(75, 'Moldavian', 'mo'),
(76, 'Marathi', 'mr'),
(77, 'Malay', 'ms'),
(78, 'Maltese', 'mt'),
(79, 'Burmese', 'my'),
(80, 'Nauru', 'na'),
(81, 'Nepali', 'ne'),
(82, 'Dutch', 'nl'),
(83, 'Norwegian', 'no'),
(84, 'Occitan', 'oc'),
(85, '(Afan)/Oromoor/Oriya', 'om'),
(86, 'Punjabi', 'pa'),
(87, 'Polish', 'pl'),
(88, 'Pashto/Pushto', 'ps'),
(89, 'Portuguese', 'pt'),
(90, 'Quechua', 'qu'),
(91, 'Rhaeto-Romance', 'rm'),
(92, 'Kirundi', 'rn'),
(93, 'Romanian', 'ro'),
(94, 'Russian', 'ru'),
(95, 'Kinyarwanda', 'rw'),
(96, 'Sanskrit', 'sa'),
(97, 'Sindhi', 'sd'),
(98, 'Sangro', 'sg'),
(99, 'Serbo-Croatian', 'sh'),
(100, 'Singhalese', 'si'),
(101, 'Slovak', 'sk'),
(102, 'Slovenian', 'sl'),
(103, 'Samoan', 'sm'),
(104, 'Shona', 'sn'),
(105, 'Somali', 'so'),
(106, 'Albanian', 'sq'),
(107, 'Serbian', 'sr'),
(108, 'Siswati', 'ss'),
(109, 'Sesotho', 'st'),
(110, 'Sundanese', 'su'),
(111, 'Swedish', 'sv'),
(112, 'Swahili', 'sw'),
(113, 'Tamil', 'ta'),
(114, 'Telugu', 'te'),
(115, 'Tajik', 'tg'),
(116, 'Thai', 'th'),
(117, 'Tigrinya', 'ti'),
(118, 'Turkmen', 'tk'),
(119, 'Tagalog', 'tl'),
(120, 'Setswana', 'tn'),
(121, 'Tonga', 'to'),
(122, 'Turkish', 'tr'),
(123, 'Tsonga', 'ts'),
(124, 'Tatar', 'tt'),
(125, 'Twi', 'tw'),
(126, 'Ukrainian', 'uk'),
(127, 'Urdu', 'ur'),
(128, 'Uzbek', 'uz'),
(129, 'Vietnamese', 'vi'),
(130, 'Volapuk', 'vo'),
(131, 'Wolof', 'wo'),
(132, 'Xhosa', 'xh'),
(133, 'Yoruba', 'yo'),
(134, 'Chinese', 'zh'),
(135, 'Zulu', 'zu');

-- --------------------------------------------------------

--
-- Table structure for table `language_list`
--

CREATE TABLE `language_list` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_form` varchar(255) NOT NULL,
  `language_code` varchar(100) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `text_direction` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `language_order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language_list`
--

INSERT INTO `language_list` (`id`, `name`, `short_form`, `language_code`, `folder_name`, `text_direction`, `status`, `language_order`) VALUES
(1, 'English', 'en', 'en_us', 'english', 'ltr', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `live_tv`
--

CREATE TABLE `live_tv` (
  `live_tv_id` int(11) NOT NULL,
  `tv_name` varchar(200) DEFAULT NULL,
  `seo_title` varchar(250) DEFAULT NULL,
  `live_tv_category_id` int(50) DEFAULT NULL,
  `slug` longtext DEFAULT NULL,
  `language` varchar(10) DEFAULT 'en',
  `stream_from` varchar(200) DEFAULT NULL,
  `stream_label` varchar(200) DEFAULT NULL,
  `stream_url` varchar(200) DEFAULT NULL,
  `poster` longtext DEFAULT NULL,
  `thumbnail` longtext DEFAULT NULL,
  `focus_keyword` varchar(200) DEFAULT NULL,
  `meta_description` varchar(200) DEFAULT NULL,
  `featured` int(2) DEFAULT 1,
  `is_paid` int(5) NOT NULL DEFAULT 1,
  `tags` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `publish` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `live_tv_category`
--

CREATE TABLE `live_tv_category` (
  `live_tv_category_id` int(11) NOT NULL,
  `live_tv_category` varchar(200) DEFAULT NULL,
  `slug` mediumtext NOT NULL,
  `live_tv_category_desc` mediumtext DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `live_tv_category`
--

INSERT INTO `live_tv_category` (`live_tv_category_id`, `live_tv_category`, `slug`, `live_tv_category_desc`, `status`) VALUES
(1, 'kids', 'kids', 'kida', 1);

-- --------------------------------------------------------

--
-- Table structure for table `live_tv_url`
--

CREATE TABLE `live_tv_url` (
  `live_tv_url_id` int(11) NOT NULL,
  `stream_key` varchar(50) DEFAULT NULL,
  `live_tv_id` int(11) DEFAULT NULL,
  `url_for` varchar(200) DEFAULT NULL,
  `source` varchar(200) DEFAULT NULL,
  `label` varchar(200) DEFAULT NULL,
  `quality` varchar(200) DEFAULT NULL,
  `url` mediumtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` mediumtext DEFAULT NULL,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_title` mediumtext DEFAULT NULL,
  `seo_title` varchar(250) DEFAULT NULL,
  `slug` mediumtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `primary_menu` int(10) DEFAULT 0,
  `footer_menu` int(10) DEFAULT 0,
  `focus_keyword` mediumtext DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `publication` int(11) DEFAULT 1,
  `publish_at` datetime DEFAULT NULL,
  `deletable` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_title`, `seo_title`, `slug`, `content`, `primary_menu`, `footer_menu`, `focus_keyword`, `meta_description`, `publication`, `publish_at`, `deletable`) VALUES
(1, 'deweded', '', 'deweded', '<p>sddssdsd</p>', 1, 1, '', '', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `day` int(50) DEFAULT 0,
  `screens` longtext DEFAULT NULL,
  `price` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `name`, `day`, `screens`, `price`, `status`) VALUES
(1, 'Basic', 7, NULL, '5', 1),
(2, 'Professional ', 30, NULL, '10', 1),
(3, 'Ultra', 90, NULL, '20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `post_title` mediumtext DEFAULT NULL,
  `seo_title` varchar(250) DEFAULT NULL,
  `slug` mediumtext DEFAULT NULL,
  `focus_keyword` mediumtext DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `category_id` varchar(250) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image_link` mediumtext DEFAULT NULL,
  `user_id` int(20) DEFAULT 1,
  `post_at` datetime DEFAULT NULL,
  `publication` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL,
  `category` mediumtext DEFAULT NULL,
  `slug` varchar(250) NOT NULL,
  `category_desc` mediumtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `post_comments_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_id` int(20) NOT NULL,
  `comment_type` int(5) NOT NULL DEFAULT 1,
  `replay_for` int(10) DEFAULT 0,
  `comment` mediumtext DEFAULT NULL,
  `comment_at` datetime DEFAULT NULL,
  `publication` int(5) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quality`
--

CREATE TABLE `quality` (
  `quality_id` int(10) NOT NULL,
  `quality` varchar(100) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` int(5) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quality`
--

INSERT INTO `quality` (`quality_id`, `quality`, `description`, `status`) VALUES
(1, '4K', 'High Defination', 1),
(2, 'HD', 'Sandard Defination', 1),
(3, 'SD', 'Ultra High Defination', 1),
(4, 'CAM', 'Web Camera Video', 1),
(7, 'LQ', 'Low Quality', 1),
(8, 'DVD', 'Digital Video Device', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(50) NOT NULL,
  `video_id` int(11) NOT NULL,
  `ip` varchar(250) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `id` int(50) DEFAULT NULL,
  `issue` varchar(250) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rest_logins`
--

CREATE TABLE `rest_logins` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rest_logins`
--

INSERT INTO `rest_logins` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '351b1e5302f5bd2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `seasons_id` int(11) NOT NULL,
  `videos_id` int(11) DEFAULT NULL,
  `seasons_name` varchar(250) DEFAULT NULL,
  `order` int(50) NOT NULL DEFAULT 0,
  `publish` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `video_link` varchar(250) NOT NULL,
  `image_link` varchar(250) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `action_type` varchar(250) DEFAULT NULL,
  `action_btn_text` varchar(250) DEFAULT NULL,
  `action_id` int(50) DEFAULT NULL,
  `action_url` mediumtext DEFAULT NULL,
  `order` int(50) NOT NULL DEFAULT 0,
  `publication` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `star`
--

CREATE TABLE `star` (
  `star_id` int(10) NOT NULL,
  `star_type` varchar(200) DEFAULT NULL,
  `star_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `star_desc` mediumtext DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `stste_postal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `stste_postal`) VALUES
(1, 'Alabama', 'AL'),
(2, 'Alaska', 'AK'),
(3, 'Arizona', 'AZ'),
(4, 'Arkansas', 'AR'),
(5, 'California', 'CA'),
(6, 'Colorado', 'CO'),
(7, 'Connecticut', 'CT'),
(8, 'Delaware', 'DE'),
(9, 'Florida', 'FL'),
(10, 'Georgia', 'GA'),
(11, 'Hawaii', 'HI'),
(12, 'Idaho', 'ID'),
(13, 'Illinois', 'IL'),
(14, 'Indiana', 'IN'),
(15, 'Iowa', 'IA'),
(16, 'Kansas', 'KS'),
(17, 'Kentucky', 'KY'),
(18, 'Louisiana', 'LA'),
(19, 'Maine', 'ME'),
(20, 'Maryland', 'MD'),
(21, 'Massachusetts', 'MA'),
(22, 'Michigan', 'MI'),
(23, 'Minnesota', 'MN'),
(24, 'Mississippi', 'MS'),
(25, 'Missouri', 'MO'),
(26, 'Montana', 'MT'),
(27, 'Nebraska', 'NE'),
(28, 'Nevada', 'NV'),
(29, 'New Hampshire', 'NH'),
(30, 'New Jersey', 'NJ'),
(31, 'New Mexico', 'NM'),
(32, 'New York', 'NY'),
(33, 'North Carolina', 'NC'),
(34, 'North Dakota', 'ND'),
(35, 'Ohio', 'OH'),
(36, 'Oklahoma', 'OK'),
(37, 'Oregon', 'OR'),
(38, 'Pennsylvania', 'PA'),
(39, 'Rhode Island', 'RI'),
(40, 'South Carolina', 'SC'),
(41, 'South Dakota', 'SD'),
(42, 'Tennessee', 'TN'),
(43, 'Texas', 'TX'),
(44, 'Utah', 'UT'),
(45, 'Vermont', 'VT'),
(46, 'Virginia', 'VA'),
(47, 'Washington', 'WA'),
(48, 'West Virginia', 'WV'),
(49, 'Wisconsin', 'WI'),
(50, 'Wyoming', 'WY'),
(51, 'District of Columbia', 'DC'),
(52, 'Guam', 'GU'),
(53, 'Marshall Islands', 'MH'),
(54, 'Northern Mariana Island', 'MP'),
(55, 'Puerto Rico', 'PR'),
(56, 'Virgin Islands', 'VI'),
(57, 'Other', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `state_mls`
--

CREATE TABLE `state_mls` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `mls_name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `license_limit` double NOT NULL DEFAULT 50
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_mls`
--

INSERT INTO `state_mls` (`id`, `state_id`, `mls_name`, `is_active`, `license_limit`) VALUES
(1, 1, 'Baldwin County Association of REALTORS', 1, 10),
(2, 1, 'Covington Association of REALTORS', 1, 50),
(3, 1, 'Cullman Association of REALTORS', 1, 50),
(4, 1, 'Dothan MLS', 1, 50),
(5, 1, 'East Alabama Board of REALTORS', 1, 50),
(6, 1, 'Eufaula Board of REALTORS', 1, 50),
(7, 1, 'Greater Alabama MLS', 1, 50),
(8, 1, 'Gulf Coast MLS', 1, 50),
(9, 1, 'Lake Martin Area Association of REALTORS', 1, 50),
(10, 1, 'Lee County Association of REALTORS', 1, 50),
(11, 1, 'Monroe County Board of REALTORS', 1, 50),
(12, 1, 'Montgomery Area Association of REALTORS', 1, 50),
(13, 1, 'North Alabama MLS', 1, 50),
(14, 1, 'Shoals Area Association of REALTORS', 1, 50),
(15, 1, 'Valley MLS', 1, 50),
(16, 1, 'Walker County Area Board Of REALTORS', 1, 50),
(17, 1, 'West Alabama MLS', 1, 50),
(18, 1, 'Wiregrass Board Of REALTORS', 1, 50),
(19, 2, 'Alaska MLS (AKMLS)', 1, 50),
(20, 2, 'Greater Fairbanks MLS', 1, 50),
(21, 2, 'Southeast Alaska MLS', 1, 50),
(22, 3, 'Arizona Regional MLS (ARMLS)', 1, 50),
(23, 3, 'Central Arizona Board of REALTORS', 1, 50),
(24, 3, 'Lake Havasu Association of REALTORS', 1, 50),
(25, 3, 'MLS of Southern Arizona (MLSSAZ)', 1, 50),
(26, 3, 'Northern Arizona Association of REALTORS', 1, 50),
(27, 3, 'Prescott Area Association of REALTORS', 1, 50),
(28, 3, 'Sedona Verde Valley Association of REALTORS', 1, 50),
(29, 3, 'Southeast Arizona MLS (SEAZMLS)', 1, 50),
(30, 3, 'Western Arizona REALTOR Data Exchange (WARDEX)', 1, 50),
(31, 3, 'White Mountain Association of REALTORS', 1, 50),
(32, 3, 'Yuma Association of REALTORS', 1, 50),
(33, 4, 'Batesville Board of REALTORS', 1, 50),
(34, 4, 'Cooperative Arkansas REALTORS', 1, 50),
(35, 4, 'Fort Smith Board of REALTORS', 1, 50),
(36, 4, 'Harrison District Board of REALTORS', 1, 50),
(37, 4, 'Hot Springs Board of REALTORS', 1, 50),
(38, 4, 'Johnson County Board of REALTORS Inc', 1, 50),
(39, 4, 'North Central Board of REALTORS', 1, 50),
(40, 4, 'Northwest Arkansas Board of REALTORS', 1, 50),
(41, 4, 'Russellville Board of REALTORS', 1, 50),
(42, 4, 'Texarkana Board of REALTORS', 1, 50),
(43, 5, 'Bakersfield Association of REALTORS', 1, 50),
(44, 5, 'Bay Area Real Estate Info Services (BAREIS)', 1, 50),
(45, 5, 'Bay East Association of REALTORS', 1, 50),
(46, 5, 'Big Bear Association of REALTORS', 1, 50),
(47, 5, 'bridgeMLS', 1, 50),
(48, 5, 'Calaveras County Association of REALTORS', 1, 50),
(49, 5, 'California Desert Association of REALTORS', 1, 50),
(50, 5, 'California Regional MLS (CRMLS)', 1, 50),
(51, 5, 'Coastal Mendocino Association of REALTORS', 1, 50),
(52, 5, 'Combined LA Westside MLS (CLAW)', 1, 50),
(53, 5, 'Conejo Simi Moorpark Association of REALTORS', 1, 50),
(54, 5, 'Contra Costa Association of REALTORS', 1, 50),
(55, 5, 'CRISNet', 1, 50),
(56, 5, 'Del Norte Association of REALTORS', 1, 50),
(57, 5, 'El Dorado Board of REALTORS', 1, 50),
(58, 5, 'Fresno Association of REALTORS', 1, 50),
(59, 5, 'Greater Antelope Valley Association of REALTORS', 1, 50),
(60, 5, 'Humboldt Association of REALTORS', 1, 50),
(61, 5, 'Idyllwild Association of REALTORS', 1, 50),
(62, 5, 'Imperial County Association of REALTORS', 1, 50),
(63, 5, 'ITech MLS', 1, 50),
(64, 5, 'Kern River Lake Isabella Board of REALTORS', 1, 50),
(65, 5, 'Kings County Board of REALTORS', 1, 50),
(66, 5, 'Lassen Association of REALTORS', 1, 50),
(67, 5, 'Mammoth Lakes Board of REALTORS', 1, 50),
(68, 5, 'MetroList', 1, 50),
(69, 5, 'MLS Listings', 1, 50),
(70, 5, 'North Santa Barbara County Regional MLS', 1, 50),
(71, 5, 'Ojai Valley Board of REALTORS', 1, 50),
(72, 5, 'Ridgecrest Area Association of REALTORS', 1, 50),
(73, 5, 'Rim O The World Association of REALTORS', 1, 50),
(74, 5, 'San Diego MLS', 1, 50),
(75, 5, 'San Francisco Association of REALTORS', 1, 50),
(76, 5, 'Santa Barbara MLS', 1, 50),
(77, 5, 'Shasta Association of REALTORS', 1, 50),
(78, 5, 'Siskiyou Association of REALTORS', 1, 50),
(79, 5, 'South Tahoe Association of REALTORS', 1, 50),
(80, 5, 'Sutter-Yuba Association of REALTORS', 1, 50),
(81, 5, 'Tahoe Sierra Board of REALTORS', 1, 50),
(82, 5, 'Tehachapi Area Association of REALTORS', 1, 50),
(83, 5, 'Tehama County Association of REALTORS', 1, 50),
(84, 5, 'Trinity County Association of REALTORS', 1, 50),
(85, 5, 'Tulare County Association of REALTORS', 1, 50),
(86, 5, 'Tuolumne County Association of REALTORS', 1, 50),
(87, 5, 'Victor Valley MLS', 1, 50),
(88, 6, 'Aspen Glenwood Springs MLS', 1, 50),
(89, 6, 'Colorado Real Estate Network (CREN)', 1, 50),
(90, 6, 'Grand County Board of REALTORS', 1, 50),
(91, 6, 'Grand Junction Area REALTOR Association', 1, 50),
(92, 6, 'Information and Real Estate Services (IRES)', 1, 50),
(93, 6, 'Pikes Peak Association of REALTORS', 1, 50),
(94, 6, 'Pueblo Association of REALTORS', 1, 50),
(95, 6, 'REColorado', 1, 50),
(96, 6, 'Royal Gorge Association of REALTORS', 1, 50),
(97, 6, 'Summit Association of REALTORS', 1, 50),
(98, 6, 'Telluride MLS', 1, 50),
(99, 6, 'Vail Board of REALTORS.', 1, 50),
(100, 7, 'Darien Board of REALTORS', 1, 50),
(101, 7, 'Greenwich Association of REALTORS', 1, 50),
(102, 7, 'New Canaan Board of REALTORS Inc', 1, 50),
(103, 7, 'SMART MLS', 1, 50),
(104, 8, 'Sussex County Association of REALTORS/ Bright MLS', 1, 50),
(105, 9, 'Amelia Island Nassau County Association of REALTORS', 1, 50),
(106, 9, 'Beaches MLS Jupiter Tequesta MLS', 1, 50),
(107, 9, 'Brevard MLS', 1, 50),
(108, 9, 'Central Panhandle Association of REALTORS', 1, 50),
(109, 9, 'Daytona Beach Area Association of REALTORS', 1, 50),
(110, 9, 'Dixie-Gilchrist-Levy MLS', 1, 50),
(111, 9, 'Emerald Coast Association of REALTORS', 1, 50),
(112, 9, 'Flagler County Association of REALTORS', 1, 50),
(113, 9, 'Gainesville Alachua County Association Of Realtors', 1, 50),
(114, 9, 'Heartland Association of REALTORS', 1, 50),
(115, 9, 'Hernando County Association of REALTORS', 1, 50),
(116, 9, 'Key West Association of REALTORS', 1, 50),
(117, 9, 'Marathon and Lower Keys Association of REALTORS', 1, 50),
(118, 9, 'Marco Island Area Association of REALTORS', 1, 50),
(119, 9, 'Martin County REALTORS of the Treasure Coast', 1, 50),
(120, 9, 'Naples Area Board of REALTORS', 1, 50),
(121, 9, 'Navarre Area Board of REALTORSNew Smyrna Beach Board of REALTORS', 1, 50),
(122, 9, 'North Florida MLS (NFLMLS)', 1, 50),
(123, 9, 'Ocala/Marion County Association of REALTORS', 1, 50),
(124, 9, 'Palm Beach Board of REALTORS', 1, 50),
(125, 9, 'Pensacola Association of REALTORS', 1, 50),
(126, 9, 'REALTOR Association Of Indian River County', 1, 50),
(127, 9, 'REALTORS Association of Citrus County, Inc.', 1, 50),
(128, 9, 'REALTORS Association of Franklin And Gulf Counties', 1, 50),
(129, 9, 'Florida Gulf Coast Multiple Listing Service', 1, 50),
(130, 9, 'Sanibel and Captiva Islands Association of REALTORS', 1, 50),
(131, 9, 'SEF Shared MLS Database', 1, 50),
(132, 9, 'St. Augustine & St. Johns County Board of REALTORS', 1, 50),
(133, 9, 'Stellar MLS', 1, 50),
(134, 9, 'Florida Keys Board of REALTORS', 1, 50),
(135, 10, 'Altamaha Basin Board of REALTORS', 1, 50),
(136, 10, 'Americus Board of REALTORS', 1, 50),
(137, 10, 'Carpet Capital Association of REALTORS', 1, 50),
(138, 10, 'Central Georgia MLS (CGMLS)', 1, 50),
(139, 10, 'Classic MLS', 1, 50),
(140, 10, 'Columbus Board of REALTORS', 1, 50),
(141, 10, 'Crisp Area Board of REALTORS', 1, 50),
(142, 10, 'Douglas Coffee County Board of REALTORS', 1, 50),
(143, 10, 'Dublin Board of REALTORS', 1, 50),
(144, 10, 'First MLS (FMLS)', 1, 50),
(145, 10, 'Georgia MLS (GAMLS)', 1, 50),
(146, 10, 'Golden Isles Association of REALTORS', 1, 50),
(147, 10, 'Greater Augusta Association of REALTORS', 1, 50),
(148, 10, 'Hinesville Board of REALTORS', 1, 50),
(149, 10, 'Lake Country Board of REALTORS', 1, 50),
(150, 10, 'Middle Georgia MLS', 1, 50),
(151, 10, 'Moultrie Board of REALTORS', 1, 50),
(152, 10, 'Northeast Georgia Board of REALTORS', 1, 50),
(153, 10, 'Savannah Board of REALTORS', 1, 50),
(154, 10, 'South Georgia MLS', 1, 50),
(155, 10, 'Southwest Georgia MLS', 1, 50),
(156, 10, 'Thomasville Area Board of REALTORS', 1, 50),
(157, 10, 'Tift Area Board of REALTORS', 1, 50),
(158, 10, 'West Metro Board of REALTORS', 1, 50),
(159, 11, 'Hawaii Information Service', 1, 50),
(160, 11, 'REALTORS Association of Maui', 1, 50),
(161, 12, 'Coeur dAlene MLS', 1, 50),
(162, 12, 'Greater Pocatello Association of REALTORS', 1, 50),
(163, 12, 'Intermountain MLS (IMLS)', 1, 50),
(164, 12, 'Lewis Clark Association of REALTORS', 1, 50),
(165, 12, 'Mini-Cassia Association of REALTORS', 1, 50),
(166, 12, 'Mountain Central Association of REALTORS', 1, 50),
(167, 12, 'Selkirk Association of REALTORS', 1, 50),
(168, 12, 'Snake River Regional MLS', 1, 50),
(169, 12, 'Sun Valley Board of REALTORS', 1, 50),
(170, 13, 'Capital Area Association of REALTORS', 1, 50),
(171, 13, 'Central Illinois Board of REALTORS', 1, 50),
(172, 13, 'Logan County Board of REALTORS', 1, 50),
(173, 13, 'Midwest Real Estate Data (MRED)', 1, 50),
(174, 13, 'Quincy Association of REALTORS', 1, 50),
(175, 13, 'REALTOR Association of Northwestern Illinois', 1, 50),
(176, 13, 'Rockford Area Association of REALTORS', 1, 50),
(177, 14, 'Crossroads Association of REALTORS', 1, 50),
(178, 14, 'East Central Indiana Board of REALTORS Inc', 1, 50),
(179, 14, 'Greater Northwest Indiana Association of REALTORS', 1, 50),
(180, 14, 'Indiana Regional MLS (IRMLS)', 1, 50),
(181, 14, 'Jefferson County Board of REALTORS', 1, 50),
(182, 14, 'Metropolitan Indianapolis Board of REALTORS (MIBOR)', 1, 50),
(183, 14, 'Richmond Association of REALTORS', 1, 50),
(184, 14, 'Southeastern Indiana Board of REALTORS', 1, 50),
(185, 14, 'Southern Indiana REALTORS Association', 1, 50),
(186, 14, 'Terre Haute Area Association of REALTORS', 1, 50),
(187, 15, 'Cedar Rapids Area Association of REALTORS', 1, 50),
(188, 15, 'Central Iowa Board of REALTORS, Inc.', 1, 50),
(189, 15, 'Des Moines Area Association of REALTORS, Inc.', 1, 50),
(190, 15, 'East Central Iowa Association of REALTORS', 1, 50),
(191, 15, 'Fort Dodge Board of REALTORS', 1, 50),
(192, 15, 'Iowa Association Of Realtors', 1, 50),
(193, 15, 'Iowa City Area Association of REALTORS', 1, 50),
(194, 15, 'Iowa Great Lakes Board of REALTORS', 1, 50),
(195, 15, 'Muscatine Multiple Listing Service', 1, 50),
(196, 15, 'Northeast Iowa Regional Board of REALTORS', 1, 50),
(197, 15, 'Southwest Iowa Association of REALTORS', 1, 50),
(198, 16, 'Flint Hills Association of REALTORS', 1, 50),
(199, 16, 'Garden City Board of REALTORS', 1, 50),
(200, 16, 'Hays Board of REALTORS', 1, 50),
(201, 16, 'Heartland MLS', 1, 50),
(202, 16, 'Kansas Association of REALTORS', 1, 50),
(203, 16, 'Lawrence Board of REALTORS', 1, 50),
(204, 16, 'Mid Kansas MLS', 1, 50),
(205, 16, 'Pittsburg Board of REALTORS', 1, 50),
(206, 16, 'South Central Kansas MLS', 1, 50),
(207, 16, 'Southeast Kansas MLS', 1, 50),
(208, 16, 'Southwest Kansas Board of REALTORS', 1, 50),
(209, 16, 'Sunflower Association of REALTORS', 1, 50),
(210, 17, 'Ashland Area Board of REALTORS', 1, 50),
(211, 17, 'Central Kentucky Association of REALTORS', 1, 50),
(212, 17, 'Eastern Kentucky Association of REALTORS', 1, 50),
(213, 17, 'Greater Louisville Association of REALTORS', 1, 50),
(214, 17, 'Greater Owensboro REALTOR Association', 1, 50),
(215, 17, 'Heart of Kentucky Association of REALTORS', 1, 50),
(216, 17, 'Henderson Audubon Board of REALTORS', 1, 50),
(217, 17, 'Hopkinsville Christian & Todd County Association of REALTORS', 1, 50),
(218, 17, 'Lexington-Bluegrass Association of REALTORS', 1, 50),
(219, 17, 'Madisonville-Hopkins County Board of REALTORS', 1, 50),
(220, 17, 'Northern Kentucky Association of REALTORS', 1, 50),
(221, 17, 'Old Kentucky Home Board of REALTORS', 1, 50),
(222, 17, 'REALTOR Association of Southern Kentucky, Inc.', 1, 50),
(223, 17, 'Somerset-Lake Cumberland Board of REALTORS', 1, 50),
(224, 17, 'South Central Kentucky Association of REALTORS', 1, 50),
(225, 17, 'Western Kentucky Regional MLS (WKRMLS)', 1, 50),
(226, 18, 'Bayou Board of REALTORS', 1, 50),
(227, 18, 'Greater Baton Rouge Association of REALTORS', 1, 50),
(228, 18, 'Greater Central Louisiana REALTORS Association', 1, 50),
(229, 18, 'Greater Fort Polk Association of REALTORS', 1, 50),
(230, 18, 'Gulf South Real Estate Information Network', 1, 50),
(231, 18, 'Northeast Louisiana Association of REALTORS', 1, 50),
(232, 18, 'Northwest Louisiana Association of REALTORS', 1, 50),
(233, 18, 'REALTOR Association of Acadiana', 1, 50),
(234, 18, 'Southwest Louisiana Association of REALTORS', 1, 50),
(235, 19, 'Maine Real Estate Information System (MREIS)', 1, 50),
(236, 20, 'Bright MLS', 1, 50),
(237, 21, 'Berkshire County Board of REALTORS', 1, 50),
(238, 21, 'Cape Cod & Islands Association of REALTORS', 1, 50),
(239, 21, 'Marthas Vineyard MLS', 1, 50),
(240, 21, 'MLS Property Info Network (MLSPIN)', 1, 50),
(241, 22, 'Ann Arbor Area Board of REALTORS', 1, 50),
(242, 22, 'Battle Creek Area Association of REALTORS', 1, 50),
(243, 22, 'Branch County Association of REALTORS', 1, 50),
(244, 22, 'Clare Gladwin Board of REALTORS', 1, 50),
(245, 22, 'Eastern Upper Peninsula Board of REALTORS', 1, 50),
(246, 22, 'Greater Kalamazoo Association of REALTORS', 1, 50),
(247, 22, 'Greater Lansing Association of REALTORS', 1, 50),
(248, 22, 'Greater Regional Alliance of REALTORS', 1, 50),
(249, 22, 'Hillsdale County Board of REALTORS', 1, 50),
(250, 22, 'Jackson Area Association of REALTORS', 1, 50),
(251, 22, 'Mason-Oceana Manistee Board of REALTORS', 1, 50),
(252, 22, 'MiRealSource', 1, 50),
(253, 22, 'Montcalm County Association of REALTORS', 1, 50),
(254, 22, 'Northern Great Lakes REALTORS', 1, 50),
(255, 22, 'Northern Michigan MLS', 1, 50),
(256, 22, 'Paul Bunyan Board of REALTORS', 1, 50),
(257, 22, 'RealComp', 1, 50),
(258, 22, 'Southwestern Michigan Association of REALTORS', 1, 50),
(259, 22, 'St. Joseph County Association of REALTORS', 1, 50),
(260, 22, 'Upper Peninsula Association of REALTORS', 1, 50),
(261, 22, 'Water Wonderland Board of REALTORS', 1, 50),
(262, 22, 'West Central Association Of REALTORS', 1, 50),
(263, 22, 'West Michigan Lakeshore Association Of REALTORS', 1, 50),
(264, 23, 'Greater Alexandria Area MLS', 1, 50),
(265, 23, 'Itasca County Board of REALTORS', 1, 50),
(266, 23, 'Lake Superior Association of REALTORS', 1, 50),
(267, 23, 'Midwest Minnesota MLS', 1, 50),
(268, 23, 'Northstar MLS', 1, 50),
(269, 23, 'Northwest Minnesota Association of REALTORS', 1, 50),
(270, 23, 'Range Association of REALTORS', 1, 50),
(271, 23, 'REALTOR Association of Southern Minnesota', 1, 50),
(272, 23, 'West Central Association Of REALTORS', 1, 50),
(273, 24, 'Central Mississippi Association of REALTORS', 1, 50),
(274, 24, 'Clarksdale Board Of REALTORS', 1, 50),
(275, 24, 'East Mississippi REALTORS', 1, 50),
(276, 24, 'Four County Board Of REALTORS', 1, 50),
(277, 24, 'Golden Triangle Association of REALTORS', 1, 50),
(278, 24, 'Greenville Area Board Of Realtors', 1, 50),
(279, 24, 'Grenada Board Of Realtors', 1, 50),
(280, 24, 'Hattiesburg Area Association of REALTORS', 1, 50),
(281, 24, 'Laurel Board of REALTORS', 1, 50),
(282, 24, 'Mississippi Gulf Coast MLS (MGCMLS)', 1, 50),
(283, 24, 'Natchez Board of REALTORS', 1, 50),
(284, 24, 'North Central Mississippi REALTORS', 1, 50),
(285, 24, 'Northeast Mississippi Board of REALTORS', 1, 50),
(286, 24, 'Northwest Mississippi Association of REALTORS', 1, 50),
(287, 24, 'Pearl River County Board of REALTORS', 1, 50),
(288, 24, 'Southwest Mississippi Board of REALTORS', 1, 50),
(289, 24, 'Vicksburg-Warren County Board of REALTORS', 1, 50),
(290, 25, 'Bagnell Dam Association of REALTORS', 1, 50),
(291, 25, 'Central Missouri Board of REALTORS', 1, 50),
(292, 25, 'Columbia Board of REALTORS', 1, 50),
(293, 25, 'Five County Board Of REALTORS Inc', 1, 50),
(294, 25, 'Heart Of Missouri Board Of REALTORS', 1, 50),
(295, 25, 'Jefferson City Area Board of REALTORS', 1, 50),
(296, 25, 'Lake of the Ozarks Board of REALTORS', 1, 50),
(297, 25, 'Mid America Regional Info Systems (MARIS)', 1, 50),
(298, 25, 'Northeast Central Board of REALTORS', 1, 50),
(299, 25, 'Ozark Gateway Association of REALTORS', 1, 50),
(300, 25, 'Randolph County Board of REALTORS', 1, 50),
(301, 25, 'West Central Association of REALTORS', 1, 50),
(302, 26, 'Big Sky Country MLS', 1, 50),
(303, 26, 'Billings Association of REALTORS', 1, 50),
(304, 26, 'Helena MLS', 1, 50),
(305, 26, 'Montana Regional MLS', 1, 50),
(306, 27, 'Columbus Board Of REALTORS Of Nebraska', 1, 50),
(307, 27, 'Grand Island Board of REALTORS', 1, 50),
(308, 27, 'Great Plains Regional MLS', 1, 50),
(309, 27, 'Lincoln County Board of REALTORS', 1, 50),
(310, 27, 'Nebraska REALTORS Outstate Database & MLS Solutions', 1, 50),
(311, 27, 'Norfolk Board of REALTORS', 1, 50),
(312, 27, 'REALTORS of Greater Mid-Nebraska', 1, 50),
(313, 27, 'Western Nebraska Board of REALTORS', 1, 50),
(314, 28, 'Elko County Board of REALTORS', 1, 50),
(315, 28, 'Las Vegas REALTORS (LVR)', 1, 50),
(316, 28, 'Incline Village Board of REALTORS', 1, 50),
(317, 28, 'Northern Nevada Regional MLS (NNRMLS)', 1, 50),
(318, 29, 'New England Real Estate Network (NEREN)', 1, 50),
(319, 30, 'Cape May County Association of REALTORS', 1, 50),
(320, 30, 'Central Jersey MLS', 1, 50),
(321, 30, 'Garden State MLS', 1, 50),
(322, 30, 'Monmouth Ocean Regional REALTORS', 1, 50),
(323, 30, 'New Jersey MLS', 1, 50),
(324, 30, 'South Jersey Shore Regional MLS', 1, 50),
(325, 31, 'Southern New Mexico MLS', 1, 50),
(326, 31, 'New Mexico Mulitboard MLS', 1, 50),
(327, 31, 'Otero County Board of REALTORS', 1, 50),
(328, 31, 'Roswell Association of REALTORS', 1, 50),
(329, 31, 'Ruidoso/Lincoln County Board Of REALTORS', 1, 50),
(330, 31, 'San Juan County Board of REALTORS', 1, 50),
(331, 31, 'Santa Fe Association of REALTORS', 1, 50),
(332, 31, 'Silver City Regional MLS', 1, 50),
(333, 31, 'Southwest MLS (SWMLS)', 1, 50),
(334, 31, 'Taos County Association of REALTORS', 1, 50),
(335, 32, '', 1, 50),
(336, 32, 'Bronx-Manahattan Association of REALTORS', 1, 50),
(337, 32, 'Brooklyn Board of REALTORS', 1, 50),
(338, 32, 'Central New York Information Service', 1, 50),
(339, 32, 'Chautauqua-Cattaraugus Board of REALTORS', 1, 50),
(340, 32, 'Columbia Greene and Northern Dutchess MLS', 1, 50),
(341, 32, 'Cortland County Board of REALTORS', 1, 50),
(342, 32, 'Elmira-Corning Regional Board of REALTORS', 1, 50),
(343, 32, 'Global MLS', 1, 50),
(344, 32, 'Greater Binghamton Association of REALTORS', 1, 50),
(345, 32, 'Hudson Gateway MLS', 1, 50),
(346, 32, 'Ithaca Board of REALTORS', 1, 50),
(347, 32, 'Jefferson-Lewis Board of REALTORS', 1, 50),
(348, 32, 'Mid Hudson MLS', 1, 50),
(349, 32, 'New York State MLS', 1, 50),
(350, 32, 'OneKey MLS', 1, 50),
(351, 32, 'Otsego-Delaware Board of REALTORS', 1, 50),
(352, 32, 'Southern Adirondack REALTORS', 1, 50),
(353, 32, 'St. Lawrence County Board of REALTORS', 1, 50),
(354, 32, 'Staten Island Board of REALTORS', 1, 50),
(355, 32, 'Ulster County Board of REALTORS', 1, 50),
(356, 32, 'Upstate New York Real Estate Information Services', 1, 50),
(357, 32, 'Western New York Real Estate Information Services', 1, 50),
(358, 33, 'Alamance MLS', 1, 50),
(359, 33, 'Albemarle Area Association of REALTORS', 1, 50),
(360, 33, 'Canopy MLS (CMLS)', 1, 50),
(361, 33, 'Carolina Smokies MLS', 1, 50),
(362, 33, 'Charlottesville Area Association of REALTORS (CAAR)', 1, 50),
(363, 33, 'Cleveland County Association of REALTORS', 1, 50),
(364, 33, 'Goldsboro Wayne Country Association of REALTORS', 1, 50),
(365, 33, 'High Country Association of REALTORS', 1, 50),
(366, 33, 'Highlands Cashiers Board of REALTORS', 1, 50),
(367, 33, 'Longleaf Pine REALTORS', 1, 50),
(368, 33, 'Mid Carolina Regional Association of REALTORS.', 1, 50),
(369, 33, 'MLS Of Catawba Valley', 1, 50),
(370, 33, 'Mountain Lakes Board of REALTORS', 1, 50),
(371, 33, 'Outer Banks Association of REALTORS', 1, 50),
(372, 33, 'Roanoke Valley Lake Gaston Board of REALTORS', 1, 50),
(373, 33, 'Rutherford County Board of REALTORS', 1, 50),
(374, 33, 'Triad MLS', 1, 50),
(375, 33, 'Triangle MLS', 1, 50),
(376, 33, 'Yancey-Mitchell MLS', 1, 50),
(377, 34, 'Badlands Board Of REALTORS', 1, 50),
(378, 34, 'Bismarck-Mandan Board of REALTORS', 1, 50),
(379, 34, 'Fargo Moorhead Area Association of REALTORS', 1, 50),
(380, 34, 'Grand Forks Board of REALTORS', 1, 50),
(381, 34, 'Jamestown Board of REALTORS', 1, 50),
(382, 34, 'Minot Board of REALTORS', 1, 50),
(383, 34, 'Williston Board of REALTORS', 1, 50),
(384, 35, 'Ashland Board of REALTORS', 1, 50),
(385, 35, 'Athens County Board of REALTORS', 1, 50),
(386, 35, 'Columbus and Central Ohio Regional MLS', 1, 50),
(387, 35, 'Dayton MLS', 1, 50),
(388, 35, 'Firelands MLS', 1, 50),
(389, 35, 'Greater Portsmouth Area Board of REALTORS', 1, 50),
(390, 35, 'Knox County Board Of REALTORS', 1, 50),
(391, 35, 'Lancaster Board Of REALTORS', 1, 50),
(392, 35, 'Mansfield Board of REALTORS', 1, 50),
(393, 35, 'Marion Board of REALTORS', 1, 50),
(394, 35, 'MLS of Greater Cincinnati (CincyMLS)', 1, 50),
(395, 35, 'Northwest Ohio Regional Info Systems (NORIS)', 1, 50),
(396, 35, 'Scioto Valley Association of REALTORS', 1, 50),
(397, 35, 'West Central Association of REALTORS', 1, 50),
(398, 35, 'Western Regional Information Systems and Technology (WRIST)', 1, 50),
(399, 35, 'Yes MLS', 1, 50),
(400, 36, 'Duncan Association of REALTORS', 1, 50),
(401, 36, 'Lawton Board of REALTORS', 1, 50),
(402, 36, 'MLS Technology, Inc.', 1, 50),
(403, 36, 'MLSOK', 1, 50),
(404, 36, 'North Central Board Of REALTORS', 1, 50),
(405, 36, 'Northeast Oklahoma Board of REALTORS', 1, 50),
(406, 36, 'Northwest Oklahoma Association of REALTORS', 1, 50),
(407, 36, 'Southern Oklahoma Board of REALTORS', 1, 50),
(408, 36, 'Stillwater Board of REALTORS', 1, 50),
(409, 37, 'Central Oregon Association of REALTORS', 1, 50),
(410, 37, 'Clatsop Association of REALTORS', 1, 50),
(411, 37, 'Klamath County Association of REALTORS', 1, 50),
(412, 37, 'Lincoln County Board of REALTORS', 1, 50),
(413, 37, 'Regional Multiple Listing Service (RMLS)', 1, 50),
(414, 37, 'Southern Oregon MLS (SOMLS)', 1, 50),
(415, 37, 'Tillamook Board of REALTORS', 1, 50),
(416, 37, 'Willamette Valley MLS', 1, 50),
(417, 38, 'Allegheny Highland Association of REALTORS', 1, 50),
(418, 38, 'Allegheny Valley Board of REALTORS', 1, 50),
(419, 38, 'Bradford Sullivan Association of REALTORS', 1, 50),
(420, 38, 'Cambria Somerset Association of REALTORS', 1, 50),
(421, 38, 'Central Susquehanna Valley Board of REALTORS', 1, 50),
(422, 38, 'Centre County Association of REALTORS', 1, 50),
(423, 38, 'Clearfield Jefferson Association of REALTORS', 1, 50),
(424, 38, 'Elk Cameron Board of REALTORS', 1, 50),
(425, 38, 'Fayette Board of REALTORS', 1, 50),
(426, 38, 'Greater Erie Board of REALTORS', 1, 50),
(427, 38, 'Greater Lehigh Valley REALTORS', 1, 50),
(428, 38, 'Greater Scranton Board of REALTORS', 1, 50),
(429, 38, 'Huntingdon County Board of REALTORS', 1, 50),
(430, 38, 'Luzerne County Association of REALTORS', 1, 50),
(431, 38, 'Mckean County Association of REALTORS', 1, 50),
(432, 38, 'North Central Penn Board of REALTORS', 1, 50),
(433, 38, 'Pike/Wayne Association of REALTORS', 1, 50),
(434, 38, 'Pocono Mountains Association of REALTORS', 1, 50),
(435, 38, 'Warren County Board Of Realtors', 1, 50),
(436, 38, 'West Branch Valley Association of REALTORS', 1, 50),
(437, 38, 'West Penn Multi-List', 1, 50),
(438, 39, 'StateWide MLS', 1, 50),
(439, 40, 'Aiken MLS', 1, 50),
(440, 40, 'Cherokee County Board of REALTORS', 1, 50),
(441, 40, 'CHS Regional MLS', 1, 50),
(442, 40, 'Coastal Carolina Association of REALTORS', 1, 50),
(443, 40, 'Consolidated MLS', 1, 50),
(444, 40, 'Greater Greenville Association of REALTORS', 1, 50),
(445, 40, 'Lowcountry Regional Multiple Listing Service Inc.', 1, 50),
(446, 40, 'MLS of Hilton Head Island (HHIMLS)', 1, 50),
(447, 40, 'MLS of Greenwood', 1, 50),
(448, 40, 'Pee Dee REALTOR Association', 1, 50),
(449, 40, 'Palmetto MLS', 1, 50),
(450, 40, 'Sumter Board of REALTORS', 1, 50),
(451, 40, 'Western Upstate Association of REALTORS', 1, 50),
(452, 41, 'Aberdeen Board of REALTORS', 1, 50),
(453, 41, 'Black Hills MLS (BHMLS)', 1, 50),
(454, 41, 'Central South Dakota Board of REALTORS', 1, 50),
(455, 41, 'East Central South Dakota Board of REALTORS', 1, 50),
(456, 41, 'Lewis and Clark Board of REALTORS', 1, 50),
(457, 41, 'Mitchell Board of REALTORS', 1, 50),
(458, 41, 'Northeast South Dakota Association of REALTORS', 1, 50),
(459, 41, 'Pierre Area Multiple Listing Service', 1, 50),
(460, 41, 'REALTOR Association Of The Sioux Empire', 1, 50),
(461, 42, 'Central West Tennessee Association of REALTORS', 1, 50),
(462, 42, 'Great Smoky Mountains Association of REALTORS', 1, 50),
(463, 42, 'Greater Chattanooga Association of REALTORS', 1, 50),
(464, 42, 'Knoxville Area Association of REALTORS', 1, 50),
(465, 42, 'Lakeway Area Association of REALTORS', 1, 50),
(466, 42, 'Memphis Area Association of REALTORS', 1, 50),
(467, 42, 'RealTracs', 1, 50),
(468, 42, 'River Counties Association of REALTORS', 1, 50),
(469, 42, 'Tennessee Valley Association of REALTORS', 1, 50),
(470, 42, 'Tennessee Virginia Regional MLS (TVRMLS)', 1, 50),
(471, 42, 'Upper Cumberland Association of REALTORS', 1, 50),
(472, 43, 'Amarillo Association of REALTORS', 1, 50),
(473, 43, 'Austin Central Texas Realty Information Service (ACTRIS)', 1, 50),
(474, 43, 'Beaumont Board of REALTORS', 1, 50),
(475, 43, 'Brazoria County Board of REALTORS', 1, 50),
(476, 43, 'Brownsville-South Padre Island Board of REALTORS', 1, 50),
(477, 43, 'Bryan-College Station Association of REALTORS', 1, 50),
(478, 43, 'Central Hill Country Board of REALTORS', 1, 50),
(479, 43, 'Coastal Bend Association of REALTORS', 1, 50),
(480, 43, 'Dalhart Board of REALTORS', 1, 50),
(481, 43, 'Dumas Board of REALTORS', 1, 50),
(482, 43, 'Eagle Pass Board of REALTORS', 1, 50),
(483, 43, 'Galveston Association of REALTORS', 1, 50),
(484, 43, 'Greater El Paso Association of REALTORS', 1, 50),
(485, 43, 'Greater McAllen Association of REALTORS', 1, 50),
(486, 43, 'Greater Tyler Association of REALTORS', 1, 50),
(487, 43, 'Henderson County Board of REALTORS', 1, 50),
(488, 43, 'Highland Lakes Association of REALTORS', 1, 50),
(489, 43, 'Houston Association of REALTORS (HARMLS)', 1, 50),
(490, 43, 'Kerrville Board of REALTORS', 1, 50),
(491, 43, 'Kingsville Area Association of REALTORS', 1, 50),
(492, 43, 'Laredo Association of REALTORS', 1, 50),
(493, 43, 'Longview Area Association of REALTORS', 1, 50),
(494, 43, 'Lubbock Association of REALTORS', 1, 50),
(495, 43, 'Lufkin Association of REALTORS', 1, 50),
(496, 43, 'Matagorda County Board of REALTORS', 1, 50),
(497, 43, 'Nacogdoches County Board of REALTORS', 1, 50),
(498, 43, 'Nolan County Board of REALTORS', 1, 50),
(499, 43, 'North Texas Real Estate Info Systems (NTREIS)', 1, 50),
(500, 43, 'Odessa Board of REALTORS', 1, 50),
(501, 43, 'Palestine Association of REALTORS', 1, 50),
(502, 43, 'Pampa Board of REALTORS', 1, 50),
(503, 43, 'Permian Basin Board of REALTORS', 1, 50),
(504, 43, 'Plainview Association of REALTORS', 1, 50),
(505, 43, 'Port Neches, Port Arthur, Nederland Board of REALTORS', 1, 50),
(506, 43, 'Rio Grande Valley Multiple Listing Service', 1, 50),
(507, 43, 'Rockport Area Association of REALTORS', 1, 50),
(508, 43, 'San Angelo Association of REALTORS', 1, 50),
(509, 43, 'San Antonio Board of REALTORS (SABOR)', 1, 50),
(510, 43, 'San Patricio County Association of REALTORS', 1, 50),
(511, 43, 'South Padre Island Board of REALTORS', 1, 50),
(512, 43, 'Texas REALTORSMLS', 1, 50),
(513, 43, 'TXLS (Texas Listing Service)', 1, 50),
(514, 43, 'Uvalde Board of REALTORS', 1, 50),
(515, 43, 'Waco MLS (WACOMLS)', 1, 50),
(516, 43, 'Wichita Falls Association of REALTORS', 1, 50),
(517, 44, 'Iron County Board of REALTORS', 1, 50),
(518, 44, 'Park City Board of REALTORS', 1, 50),
(519, 44, 'Wasatch Front Regional MLS (WFRMLS)', 1, 50),
(520, 44, 'Washington County Board of REALTORS', 1, 50),
(521, 46, 'Central Virginia Regional MLS (CVRMLS)', 1, 50),
(522, 46, 'Dan River Region Association of REALTORS', 1, 50),
(523, 46, 'Eastern Shore Association of REALTORS', 1, 50),
(524, 46, 'Hamptons North Fork REALTORS Association', 1, 50),
(525, 46, 'Harrisonburg Rockingham Association of REALTORS', 1, 50),
(526, 46, 'Lynchburg Association of REALTORS', 1, 50),
(527, 46, 'Martinsville, Henry, Patrick Counties Association of REALTORS', 1, 50),
(528, 46, 'New River Valley Association of REALTORS', 1, 50),
(529, 46, 'Northern Neck Association of REALTORS', 1, 50),
(530, 46, 'Real Estate Information Network (REIN)', 1, 50),
(531, 46, 'Roanoke Valley Association of REALTORS', 1, 50),
(532, 46, 'Rockbridge Association of REALTORS', 1, 50),
(533, 46, 'South Central Association of REALTORS', 1, 50),
(534, 46, 'Southern Piedmont Land & Lake Association of REALTORS', 1, 50),
(535, 46, 'Southside Virginia Association of REALTORS', 1, 50),
(536, 46, 'Southwest Virginia Association of REALTORS', 1, 50),
(537, 46, 'Williamsburg Multiple Listing Service', 1, 50),
(538, 47, 'MLS of Yakima Association of REALTORS', 1, 50),
(539, 47, 'Northeast Washington Association of REALTORS', 1, 50),
(540, 47, 'North Central Washington MLS (NCWMLS)', 1, 50),
(541, 47, 'Northwest Multiple Listing Service (NWMLS)', 1, 50),
(542, 47, 'Olympic Listing Service', 1, 50),
(543, 47, 'Spokane Association of REALTORS', 1, 50),
(544, 47, 'Walla Walla Association of REALTORS', 1, 50),
(545, 48, 'Beckley Board of REALTORS', 1, 50),
(546, 48, 'Central West Virginia Multiple Listing Service', 1, 50),
(547, 48, 'Fayette-Nicholas Board of REALTORS', 1, 50),
(548, 48, 'Greenbrier Valley Board of REALTORS', 1, 50),
(549, 48, 'Huntington Board of REALTORS', 1, 50),
(550, 48, 'Kanawha Valley Board of REALTORS', 1, 50),
(551, 48, 'Mercer Tazewell County Board of REALTORS', 1, 50),
(552, 48, 'Mid Ohio Valley MLS (MOVMLS)', 1, 50),
(553, 48, 'North Central West Virginia Real Estate Information Network', 1, 50),
(554, 48, 'Wheeling Board of REALTORS', 1, 50),
(555, 49, 'Door County MLS', 1, 50),
(556, 49, 'Greater Northwoods MLS', 1, 50),
(557, 49, 'Marinette County Board of REALTORS (MCBOR MLS)', 1, 50),
(558, 49, 'Metro MLS', 1, 50),
(559, 49, 'REALTOR Association of Northwest Wisconsin', 1, 50),
(560, 49, 'South Central Wisconsin MLS', 1, 50),
(561, 49, 'REALTORS Association of Northeast Wisconsin', 1, 50),
(562, 50, 'Cheyenne Board of REALTORS', 1, 50),
(563, 50, 'Laramie Board of REALTORS', 1, 50),
(564, 50, 'Northeast Wyoming REALTOR Alliance (NEWRA)', 1, 50),
(565, 50, 'Northwest Wyoming Board of REALTORS', 1, 50),
(566, 50, 'Sheridan County Board of REALTORS', 1, 50),
(567, 50, 'Teton Board of REALTORS', 1, 50),
(568, 50, 'Wyoming MLS', 1, 50),
(569, 9, 'Other', 1, 50),
(570, 1, 'test', 0, 50),
(571, 2, 'test222212', 1, 50),
(572, 1, 'wdderrfe', 1, 50),
(573, 1, 'wdderrfe', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(50) NOT NULL,
  `plan_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `price_amount` double NOT NULL,
  `paid_amount` float NOT NULL,
  `currency` varchar(50) DEFAULT 'USD',
  `timestamp_from` int(50) NOT NULL,
  `timestamp_to` int(50) NOT NULL,
  `payment_method` mediumtext NOT NULL,
  `transaction_id` mediumtext DEFAULT NULL,
  `payment_info` longtext NOT NULL,
  `payment_timestamp` int(50) NOT NULL,
  `recurring` int(10) NOT NULL DEFAULT 1,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subtitle`
--

CREATE TABLE `subtitle` (
  `subtitle_id` int(11) NOT NULL,
  `videos_id` int(50) NOT NULL,
  `video_file_id` int(50) DEFAULT NULL,
  `language` varchar(250) DEFAULT NULL,
  `kind` varchar(250) DEFAULT NULL,
  `src` longtext DEFAULT NULL,
  `srclang` varchar(5) DEFAULT NULL,
  `common` int(2) DEFAULT 0,
  `status` int(2) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tvseries_subtitle`
--

CREATE TABLE `tvseries_subtitle` (
  `tvseries_subtitle_id` int(11) NOT NULL,
  `videos_id` varchar(250) DEFAULT NULL,
  `episodes_id` int(250) DEFAULT NULL,
  `language` varchar(250) DEFAULT NULL,
  `kind` varchar(250) DEFAULT NULL,
  `src` longtext DEFAULT NULL,
  `srclang` varchar(5) DEFAULT NULL,
  `common` int(2) DEFAULT 0,
  `status` int(2) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_broker_id` int(11) DEFAULT 0,
  `office_address` varchar(600) NOT NULL,
  `office_phone_number` varchar(20) NOT NULL,
  `affiliated_mls_name` int(11) NOT NULL,
  `activation_code` varchar(20) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` longtext NOT NULL,
  `state_id` int(11) NOT NULL,
  `is_password_set` int(5) NOT NULL DEFAULT 0 COMMENT '0 = unknown, 1=set, 2 =unset',
  `password` longtext NOT NULL,
  `gender` int(2) DEFAULT 1,
  `role` varchar(100) DEFAULT NULL,
  `token` mediumtext DEFAULT NULL,
  `theme` varchar(50) DEFAULT 'default',
  `theme_color` varchar(50) DEFAULT '#16163F',
  `join_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `deactivate_reason` mediumtext DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `firebase_auth_uid` varchar(250) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `dotloop_id` int(11) NOT NULL,
  `loginwith` varchar(50) NOT NULL,
  `ProfileId` int(11) NOT NULL,
  `brokerage_amount` double NOT NULL,
  `verify_otp` char(5) NOT NULL,
  `link_with_dotloop` int(1) NOT NULL DEFAULT 0,
  `link_with_room` int(1) NOT NULL DEFAULT 0,
  `license_key` varchar(100) NOT NULL,
  `broker_company` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_broker_id`, `office_address`, `office_phone_number`, `affiliated_mls_name`, `activation_code`, `slug`, `username`, `email`, `state_id`, `is_password_set`, `password`, `gender`, `role`, `token`, `theme`, `theme_color`, `join_date`, `last_login`, `deactivate_reason`, `phone`, `firebase_auth_uid`, `status`, `dotloop_id`, `loginwith`, `ProfileId`, `brokerage_amount`, `verify_otp`, `link_with_dotloop`, `link_with_room`, `license_key`, `broker_company`) VALUES
(1, 'ratnesh', 'kumars', 36, '545454qwet', '54545454', 469, '', '', 'ratneshk5000@gmail.com', 'ratneshk500@gmail.com', 42, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'admin', '1f2c28f1bebcd4c18b6ccdf618a1ed17', 'default', '#16163F', '2020-02-26 12:57:18', '2026-05-26 16:46:54', NULL, '21332323', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(2, 'ratnesh1', 'kumar1', 39, '545454', '54545454', 0, '123456789', '', NULL, 'ratnesh@yahoo.com', 44, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', 'e11e157e58c278d12c0ef78f1e78ab73', 'default', '#16163F', '2022-05-07 12:14:52', '2022-09-24 13:12:07', NULL, '21332334', NULL, 1, 0, '', 0, 12, '0', 1, 0, '', ''),
(4, 'ratnesh12', 'kumar11', 37, '545454', '54545454', 22, 'errerrt', '', NULL, 'ratnesh11112@yahoo.com', 3, 0, '96e79218965eb72c92a549dd5a330112', 1, 'agent', NULL, 'default', '#16163F', '2022-05-10 09:42:52', '2022-05-10 09:42:52', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(7, 'vinay', 'kumar', 37, 'new delhi', '54545454', 0, 'errerrt', '', NULL, 'vinay@gmail.com', 20, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-05-17 12:17:25', '2022-05-17 12:17:59', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(8, 'manita', 'jee', 0, '545454', '54545454', 0, 'errerrt', '', NULL, 'manita@gmail.com', 57, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-05-18 16:45:54', '2022-05-19 16:56:27', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(9, 'neha', 'jee', 0, 'new delhi', '5454545464634', 0, 'errerrt', '', NULL, 'neha@gmail.com', 57, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-05-19 19:04:04', '2022-05-19 19:04:36', NULL, '75778897398', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(11, 'rakesh', 'kumar', 0, '545454', '54545454', 21, '', '', NULL, 'rakesh1@gmail.com', 2, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-05-25 18:58:24', '2022-05-25 18:59:48', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(15, 'mannu', 'jee', 39, '545454', 'rrrgfgd', 18, 'AL_aGgvukMwao', '', NULL, 'mannu1@gmail.com', 1, 0, '6512bd43d9caa6e02c990b0a82652dca', 1, 'agent', NULL, 'default', '#16163F', '2022-05-26 19:15:45', '2022-05-26 19:15:45', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(16, 'manish', 'kumar', 0, 'new delhi', '54545454', 18, 'AL_p3NpZhbiKi', '', NULL, 'manish@gmail.com', 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-05-27 11:53:26', '2022-05-27 11:54:30', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(18, 'rakesh', 'kumar', 37, 'new delhi', '54545454', 1, 'ID_yqwqB0bNBx', '', NULL, 'rakesh@gmail.com', 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-05-30 11:16:39', '2026-05-26 12:03:26', NULL, '8010255769', NULL, 1, 0, '', 0, 123.2, '0', 0, 0, '', ''),
(21, 'Mc', 'Chawla', 0, '587hb', '7652w512', 20, 'AK_0e5GwZXLBc', '', NULL, 'mc05@gmail.com', 2, 0, 'c327935f0adb6bb21a117de147089608', 1, 'agent', NULL, 'default', '#16163F', '2022-06-21 14:44:57', '2022-06-21 14:46:07', NULL, '88696kn', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(22, 'Manita', 'Ch', 0, '897', '897', 36, 'AR_ZzsVCg1pGL', '', NULL, 'manitach@gmail.com', 4, 0, '0a3a606ce3a20776ae4f6ede0a408bad', 1, 'agent', NULL, 'default', '#16163F', '2022-06-21 14:53:37', '2022-06-21 14:53:55', NULL, '7890', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(24, 'qwerty', '1233', 12, 'fdcfds', '123456', 187, 'IA_tMim1d9ebZ', '', NULL, 'xyz@gmail.com', 15, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-06-27 12:54:32', '2022-06-27 12:54:59', NULL, '123456', NULL, 0, 0, '', 0, 0, '0', 0, 0, '', ''),
(25, 'rahul', 'kumar', 20, 'new delhi', '54545454', 1, 'AL_j8k6fxUc1M', '', NULL, 'rahul@gmail.com', 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-06-28 11:03:23', '2022-06-28 11:11:18', NULL, '1234567897', NULL, 1, 0, '', 0, 0, '1234', 0, 0, '', ''),
(30, 'ratnesh', 'kumar', 0, '545454', '54545454', 4, 'AL_AGojeT1GRl', '', NULL, 'ratnesh.friend@gmail.com', 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-06-29 17:46:40', '2022-09-01 12:40:59', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(35, 'kamal', 'kumar', 0, 'new delhi', '4389789754', 180, 'IN_x4jZxZFOgC', '', NULL, 'kamal@gmail.com', 14, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-07-11 18:10:22', '2022-07-13 15:59:42', NULL, '2133233444', NULL, 1, 0, '', 0, 0, '14980', 0, 0, '', ''),
(36, 'raside', 'kumar', 36, 'new delhi', '4389789754', 1, 'ME_MgwODuUxOO', '', NULL, 'raside@gmail.com', 19, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'broker_record', NULL, 'default', '#16163F', '2022-07-11 18:17:44', '2022-09-05 12:00:47', NULL, '7847894379', NULL, 1, 0, '', 0, 0, '19061', 0, 0, '', 'new company11'),
(37, 'test', 'test1', 37, 'new delhi', '5454545446', 1, '', '', NULL, 'test@gmail.com', 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'broker_record', NULL, 'default', '#16163F', '2022-07-12 18:46:56', '2022-10-27 19:37:50', NULL, '2133233468', NULL, 1, 0, '', 0, 0, '01408', 0, 0, '', 'new company'),
(38, 'NEHA', 'AGGARWAL', 0, 'dsdsdsada', '12345678', 206, '', '', NULL, 'aggarwal.nikki@gmail.com', 16, 0, '81cf2bdd809ae7758e791fe123414025', 1, 'agent', NULL, 'default', '#16163F', '2022-07-15 17:09:38', '2022-07-15 17:48:16', NULL, '1234567891', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(39, 'Juan', 'Del Sol', 39, '803 Shotgun rd suite 107 Sunrise FL', '9545701730', 569, '', '', NULL, 'juan@delsol.realtor', 9, 0, 'dc9102060481c55ae5a2f244224dd4ad', 1, 'broker_record', NULL, 'default', '#16163F', '2022-08-23 02:13:37', '2022-11-07 21:26:57', NULL, '2019706272', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', 'NextHome Vista'),
(40, 'juan', 'juan', 0, 'Bakersfield', '36736734', 43, '', '', NULL, 'juan@multipleclientlist.com', 5, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'admin', NULL, 'default', '#16163F', '2022-08-23 14:52:03', '2022-11-03 01:40:27', NULL, '21332334', NULL, 1, 0, '', 0, 0, '0', 0, 0, '', ''),
(41, 'Serge', 'VALLET', 39, '2302 Ridgewood Cir Royal Palm Beach,FL 33411', '3526319495', 569, '', '', NULL, 'slvallet@gmail.com', 9, 0, '783287841b4825d3fb9eff5b79bc0e9c', 1, 'agent', NULL, 'default', '#16163F', '2022-08-29 00:19:58', '2022-08-29 00:19:58', NULL, '3526319495', NULL, 0, 0, '', 0, 0, '0', 0, 0, '', ''),
(42, 'suresh', 'kumar', 0, 'new delhi', '5454545446', 3, '', '', NULL, 'suresh@gmail.com', 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'agent', NULL, 'default', '#16163F', '2022-09-27 12:55:55', '2022-09-29 18:12:28', NULL, '9876543211', NULL, 1, 0, '', 0, 0, '0', 2, 1, '', ''),
(47, 'ale', 'garcia', 0, '803 shotgun rd sunrise', '9548751547', 323, '', '', NULL, 'parvati21@yahoo.com', 30, 0, 'b1ede6700b4616b5d7ef5b61c3143858', 1, 'agent', NULL, 'default', '#16163F', '2022-10-10 18:02:41', '2022-10-12 20:22:46', NULL, '2019706272', NULL, 1, 0, '', 0, 0, '56935', 0, 0, '', ''),
(50, 'lallu', 'kumar', 50, 'weeererre', '6843843783', 4, '', '', NULL, 'lalluk500@gmail.com', 1, 0, 'e10adc3949ba59abbe56e057f20f883e', 1, 'broker_record', NULL, 'default', '#16163F', '2026-05-26 15:34:58', '2026-05-26 15:38:31', NULL, '3348734784', NULL, 1, 0, '', 0, 0, '0', 0, 0, '0048017239', 'anc pvt lt');

-- --------------------------------------------------------

--
-- Table structure for table `usstates11111111`
--

CREATE TABLE `usstates11111111` (
  `COL 1` varchar(10) DEFAULT NULL,
  `COL 2` varchar(23) DEFAULT NULL,
  `COL 3` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usstates11111111`
--

INSERT INTO `usstates11111111` (`COL 1`, `COL 2`, `COL 3`) VALUES
('', 'Alabama', 'AL'),
('', 'Alaska', 'AK'),
('', 'Arizona', 'AZ'),
('', 'Arkansas', 'AR'),
('', 'California', 'CA'),
('', 'Colorado', 'CO'),
('', 'Connecticut', 'CT'),
('', 'Delaware', 'DE'),
('', 'Florida', 'FL'),
('', 'Georgia', 'GA'),
('', 'Hawaii', 'HI'),
('', 'Idaho', 'ID'),
('', 'Illinois', 'IL'),
('', 'Indiana', 'IN'),
('', 'Iowa', 'IA'),
('', 'Kansas', 'KS'),
('', 'Kentucky', 'KY'),
('', 'Louisiana', 'LA'),
('', 'Maine', 'ME'),
('', 'Maryland', 'MD'),
('', 'Massachusetts', 'MA'),
('', 'Michigan', 'MI'),
('', 'Minnesota', 'MN'),
('', 'Mississippi', 'MS'),
('', 'Missouri', 'MO'),
('', 'Montana', 'MT'),
('', 'Nebraska', 'NE'),
('', 'Nevada', 'NV'),
('', 'New Hampshire', 'NH'),
('', 'New Jersey', 'NJ'),
('', 'New Mexico', 'NM'),
('', 'New York', 'NY'),
('', 'North Carolina', 'NC'),
('', 'North Dakota', 'ND'),
('', 'Ohio', 'OH'),
('', 'Oklahoma', 'OK'),
('', 'Oregon', 'OR'),
('', 'Pennsylvania', 'PA'),
('', 'Rhode Island', 'RI'),
('', 'South Carolina', 'SC'),
('', 'South Dakota', 'SD'),
('', 'Tennessee', 'TN'),
('', 'Texas', 'TX'),
('', 'Utah', 'UT'),
('', 'Vermont', 'VT'),
('', 'Virginia', 'VA'),
('', 'Washington', 'WA'),
('', 'West Virginia', 'WV'),
('', 'Wisconsin', 'WI'),
('', 'Wyoming', 'WY'),
('', 'District of Columbia', 'DC'),
('', 'Guam', 'GU'),
('', 'Marshall Islands', 'MH'),
('', 'Northern Mariana Island', 'MP'),
('', 'Puerto Rico', 'PR'),
('', 'Virgin Islands', 'VI');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `videos_id` int(11) NOT NULL,
  `imdbid` varchar(200) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `seo_title` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `stars` varchar(250) DEFAULT '',
  `director` varchar(250) DEFAULT NULL,
  `writer` varchar(250) DEFAULT NULL,
  `rating` varchar(5) DEFAULT '0',
  `release` varchar(25) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `genre` varchar(200) DEFAULT NULL,
  `video_type` varchar(50) DEFAULT NULL,
  `runtime` varchar(10) DEFAULT NULL,
  `video_quality` varchar(200) DEFAULT 'HD',
  `is_paid` int(5) NOT NULL DEFAULT 1,
  `publication` int(5) DEFAULT NULL,
  `trailer` int(5) DEFAULT 0,
  `trailler_youtube_source` mediumtext DEFAULT NULL,
  `enable_download` int(5) DEFAULT 1,
  `focus_keyword` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `tags` mediumtext DEFAULT NULL,
  `imdb_rating` varchar(5) DEFAULT NULL,
  `is_tvseries` int(11) NOT NULL DEFAULT 0,
  `total_rating` int(50) DEFAULT 1,
  `today_view` int(250) DEFAULT 0,
  `weekly_view` int(250) DEFAULT 0,
  `monthly_view` int(250) DEFAULT 0,
  `total_view` int(250) DEFAULT 1,
  `last_ep_added` datetime DEFAULT '2019-04-04 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video_file`
--

CREATE TABLE `video_file` (
  `video_file_id` int(11) NOT NULL,
  `stream_key` varchar(50) DEFAULT NULL,
  `videos_id` int(11) DEFAULT NULL,
  `file_source` varchar(200) DEFAULT NULL,
  `source_type` varchar(250) DEFAULT NULL,
  `file_url` varchar(500) DEFAULT NULL,
  `label` varchar(250) NOT NULL DEFAULT 'Server#1',
  `order` int(50) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `video_type`
--

CREATE TABLE `video_type` (
  `video_type_id` int(11) NOT NULL,
  `video_type` varchar(200) DEFAULT NULL,
  `video_type_desc` mediumtext DEFAULT NULL,
  `primary_menu` int(11) DEFAULT NULL,
  `footer_menu` int(11) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_type`
--

INSERT INTO `video_type` (`video_type_id`, `video_type`, `video_type_desc`, `primary_menu`, `footer_menu`, `slug`) VALUES
(1, 'Trending', '', NULL, NULL, 'trending'),
(2, 'Trending2', '', NULL, NULL, 'trending2');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `wish_list_id` int(11) NOT NULL,
  `wish_list_type` varchar(200) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `videos_id` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_realtor_contract`
--
ALTER TABLE `buyer_realtor_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`timezone`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `cron`
--
ALTER TABLE `cron`
  ADD PRIMARY KEY (`cron_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `download_link`
--
ALTER TABLE `download_link`
  ADD PRIMARY KEY (`download_link_id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`episodes_id`);

--
-- Indexes for table `episode_download_link`
--
ALTER TABLE `episode_download_link`
  ADD PRIMARY KEY (`episode_download_link_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `homepage_sections`
--
ALTER TABLE `homepage_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages_iso`
--
ALTER TABLE `languages_iso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_list`
--
ALTER TABLE `language_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_tv`
--
ALTER TABLE `live_tv`
  ADD PRIMARY KEY (`live_tv_id`);

--
-- Indexes for table `live_tv_category`
--
ALTER TABLE `live_tv_category`
  ADD PRIMARY KEY (`live_tv_category_id`);

--
-- Indexes for table `live_tv_url`
--
ALTER TABLE `live_tv_url`
  ADD PRIMARY KEY (`live_tv_url_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_category_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`post_comments_id`);

--
-- Indexes for table `quality`
--
ALTER TABLE `quality`
  ADD PRIMARY KEY (`quality_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `rest_logins`
--
ALTER TABLE `rest_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`seasons_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`star_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_mls`
--
ALTER TABLE `state_mls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `subtitle`
--
ALTER TABLE `subtitle`
  ADD PRIMARY KEY (`subtitle_id`);

--
-- Indexes for table `tvseries_subtitle`
--
ALTER TABLE `tvseries_subtitle`
  ADD PRIMARY KEY (`tvseries_subtitle_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videos_id`);

--
-- Indexes for table `video_file`
--
ALTER TABLE `video_file`
  ADD PRIMARY KEY (`video_file_id`);

--
-- Indexes for table `video_type`
--
ALTER TABLE `video_type`
  ADD PRIMARY KEY (`video_type_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`wish_list_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `buyer_realtor_contract`
--
ALTER TABLE `buyer_realtor_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `cron`
--
ALTER TABLE `cron`
  MODIFY `cron_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `download_link`
--
ALTER TABLE `download_link`
  MODIFY `download_link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `episodes_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `episode_download_link`
--
ALTER TABLE `episode_download_link`
  MODIFY `episode_download_link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `homepage_sections`
--
ALTER TABLE `homepage_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages_iso`
--
ALTER TABLE `languages_iso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `language_list`
--
ALTER TABLE `language_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `live_tv`
--
ALTER TABLE `live_tv`
  MODIFY `live_tv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_tv_category`
--
ALTER TABLE `live_tv_category`
  MODIFY `live_tv_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `live_tv_url`
--
ALTER TABLE `live_tv_url`
  MODIFY `live_tv_url_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `post_comments_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quality`
--
ALTER TABLE `quality`
  MODIFY `quality_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_logins`
--
ALTER TABLE `rest_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `seasons_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `star`
--
ALTER TABLE `star`
  MODIFY `star_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `state_mls`
--
ALTER TABLE `state_mls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subtitle`
--
ALTER TABLE `subtitle`
  MODIFY `subtitle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tvseries_subtitle`
--
ALTER TABLE `tvseries_subtitle`
  MODIFY `tvseries_subtitle_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `videos_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_file`
--
ALTER TABLE `video_file`
  MODIFY `video_file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_type`
--
ALTER TABLE `video_type`
  MODIFY `video_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `wish_list_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
