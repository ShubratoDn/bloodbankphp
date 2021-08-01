-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 08:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor_info`
--

CREATE TABLE `donor_info` (
  `id` int(11) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone1` varchar(14) NOT NULL,
  `phone2` varchar(14) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirmpass` varchar(200) NOT NULL,
  `district` varchar(50) NOT NULL,
  `upazila` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(5) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `donated_blood` int(100) NOT NULL,
  `last_donate` varchar(20) NOT NULL,
  `donation_eligibility` varchar(15) NOT NULL,
  `token` varchar(300) NOT NULL,
  `filter_bg_class` varchar(3) NOT NULL,
  `Time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_info`
--

INSERT INTO `donor_info` (`id`, `user_type`, `fname`, `lname`, `full_name`, `email`, `phone1`, `phone2`, `password`, `confirmpass`, `district`, `upazila`, `gender`, `age`, `photo`, `blood_group`, `donated_blood`, `last_donate`, `donation_eligibility`, `token`, `filter_bg_class`, `Time_stamp`) VALUES
(117, 'donor', 'Shubrato', 'Debnath ', '', 'shubratodn44985@gmail.com', '01759458961', '01875127612 ', '4a7d1ed414474e4033ac29ccb8653d9b', '0000', 'Sirajganj', 'Belkuchi', 'male ', 20, 'resources/img/donor1.jpg', 'O+', 0, '8 months', 'eligible', '9343334338bba3c5c60a55ccf3b851', 'Op', '2021-07-31 16:54:18'),
(118, 'donor', 'admin', 'admin', '', 'mycomputer44985@gmail.com', '01303544534', '0', 'b59c67bf196a4758191e42f76670ceba', '1111', 'Sirajganj', 'Belkuchi', 'male', 19, 'resources/img/female.jpg', 'AB+', 0, '1 year', 'non-eligible', '22c6203f024b437e7fc4973447be58', 'ABp', '2021-07-31 16:54:27'),
(119, 'donor', 'Arifa ', 'Khatun', '', 'arifa@gmail.com', '01755554412', '0', 'f1507aba9fc82ffa7cc7373c58f8a613', '5595', 'Sirajganj', 'Belkuchi', 'female', 20, 'resources/img/female.jpg', 'O+', 0, '', 'eligible', '49654368f901b6ffa07778b7d766ae', 'Op', '2021-07-31 16:55:17'),
(120, 'donor', 'Rafiur', 'Rahman', '', 'rafiur@gmail.com', '01501143258', '0', 'e2fc714c4727ee9395f324cd2e7f331f', 'abcd', 'Sirajganj', 'Belkuchi', 'male', 19, 'resources/img/male.jpg', 'AB+', 0, '0', 'non-eligible', 'f57ba24749ab32076d3f4fdc54e944', 'ABn', '2021-07-31 16:55:20'),
(121, 'donor', 'Suborna', 'Badhon', '', 'suborna@gmail.com', '01655887951', '0', '4ef7e70c02983547ac802a38a673110e', 'suborna', 'Sirajganj', 'Chauhali', 'female', 25, 'resources/img/female.jpg', 'B-', 0, '', 'eligible', '20c1d12499b05186ab0ba8fc4a03fd', 'Bn', '2021-07-31 16:55:03'),
(122, 'donor', 'Khandaker', 'Anik', '', 'anik@gmail.com', '01914211458', '0', '7522d28ad772d1eef7b200ebddcd08ce', 'anika', 'Sirajganj', 'Belkuchi', 'male', 65, 'resources/img/male.jpg', 'A+', 0, '', 'eligible', '1a472a1d345e53eebef0d013c582ec', 'Ap', '2021-07-31 16:55:25'),
(125, 'donor', 'Blood', 'Bank', '', 'bloodbank@gmail.com', '01769696969', '', 'b59c67bf196a4758191e42f76670ceba', '1111', 'Sirajganj', 'Belkuchi', 'Female', 22, 'resources/img/female.jpg', 'A+', 0, '--', 'eligible', '1c888f63259484799d73479f71cb6b', 'Ap', '2021-07-30 19:24:27'),
(129, 'donor', 'Test', 'Email', '', 'testemail@gmail.com', '01666666666', '', '3b712de48137572f3849aabd5666a4e3', '1122', 'Pabna', 'Chatmohar', 'Male', 25, 'uploads/0a01be18c8AxeInch2.jpg', 'B+', 0, '3 month', 'non-eligible', '79545af554ed71d69118b353b17417', 'Bp', '2021-08-01 06:21:52'),
(130, 'donor', 'test', 'email 1', '', 'email1@gmail.com', '01566666666', '', 'b59c67bf196a4758191e42f76670ceba', '1111', 'Pabna', 'Pabna Sadar', 'Male', 22, 'resources/img/female.jpg', 'B+', 0, '--', 'eligible', '4e4b82eb4e3abb7b69c372a86ca010', 'Bp', '2021-07-31 09:48:16'),
(131, 'donor', 'test', 'email 2', '', 'email2@gmail.com', '0188888888888', '', 'f1507aba9fc82ffa7cc7373c58f8a613', '5595', 'Naogaon', 'Atrai', 'Female', 35, 'resources/img/female.jpg', 'B+', 0, '2 year', 'eligible', '0ae373562ef5142aba41ca9cb99f75', 'Bp', '2021-07-31 10:24:12'),
(132, 'donor', 'Arifa', 'Khatun', '', 'arifa2@gmail.com', '01785858585', '', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'Sirajganj', 'Kamarkhanda', 'Female', 20, 'resources/img/female.jpg', 'O+', 0, '6 month', 'eligible', 'b3e89c8b1eb4c3af3ae0815e7201b9', 'Op', '2021-07-31 16:06:28'),
(133, 'donor', 'Sourav', 'Debnath', '', 'souravdeb32665@gmail.com', '01733704494', '', '4a7d1ed414474e4033ac29ccb8653d9b', '0000', 'Sirajganj', 'Chauhali', 'Male', 22, 'resources/img/female.jpg', 'O+', 0, '--', 'eligible', '78d995490df570840f892de5391ae5', 'Op', '2021-07-31 16:15:45'),
(134, 'donor', 'Hridoy ', 'Debnath', '', 'hridoy@gmail.com', '01914565912', '', '4a7d1ed414474e4033ac29ccb8653d9b', '0000', 'Naogaon', ' Raninagar', 'Male', 22, 'resources/img/female.jpg', 'AB-', 0, '--', 'eligible', '7498bd482dbfa83f2c91630113743e', 'ABn', '2021-07-31 16:23:24'),
(135, 'donor', 'Sajib', 'Debnath', '', 'sajib@gmail.com', '01622222222', '', '4a7d1ed414474e4033ac29ccb8653d9b', '0000', 'Pabna', 'Faridpur', 'Female', 21, 'uploads/be00e3cbf0MAINbusiness card-02.jpg', 'A-', 0, '5 month', 'eligible', 'd0444b0e6b17b7f4cb82935110507a', 'An', '2021-08-01 06:21:48'),
(137, 'donor', 'Subha', 'Sirat', '', 'subhasirat@gmail.com', '01696969696', '', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'Sirajganj', 'Shahjadpur', 'Female', 25, 'uploads/subha.jpg\r\n', 'AB+', 0, '--', 'eligible', '8a2835d44be3b4a284ae781442f456', 'ABp', '2021-08-01 06:44:32'),
(138, 'donor', 'Layli', 'Begum ', '', 'layli@gmail.com', '01610203040', ' ', 'b59c67bf196a4758191e42f76670ceba', '1111', 'Naogaon', 'Raninagar', 'Female ', 69, 'uploads/a263f46d0bAxeInch2.jpg', 'A-', 0, '--', 'eligible', '468f284e6ef8a32da3d320812684ea', 'An', '2021-08-01 07:19:38'),
(139, 'user', '', '', 'Tayef hossian', 'tayef@gmail.com', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '', '', '', 0, '', '', 0, '', '', '', '', '2021-08-01 07:27:56'),
(140, 'donor', 'Temp', 'Mail', '', 'gevidev294@aline9.com', '017774447747', '', '4a7d1ed414474e4033ac29ccb8653d9b', '0000', 'Sirajganj', 'Ullahpara', 'Male', 16, 'resources/img/male.jpg', 'B-', 0, '--', 'eligible', 'a062d6f57e3b9c240424bd5ebfa447', 'Bn', '2021-08-01 10:44:07'),
(141, 'donor', 'test', 'email 3', '', 'testemail3@gmail.com', '017111111235', '', 'b59c67bf196a4758191e42f76670ceba', '1111', 'Sirajganj', 'Raiganj', 'Male', 20, 'uploads/f57c6b056bBitterish.jpg', 'A-', 0, '--', 'eligible', 'f3dce513efc04accc0870a26f62792', 'An', '2021-08-01 16:28:41'),
(142, 'donor', 'Test Name', '4', '', 'testemail4@gmail.com', '01556965475', '', 'b59c67bf196a4758191e42f76670ceba', '1111', 'Sirajganj', 'Kazipur', 'Female', 50, 'uploads/05d743dddfANOTHER-LOGO-_Artboard 2.png', 'B+', 0, '--', 'eligible', 'da3e2d21cfd654921bdcd3f2c967bd', 'Bp', '2021-08-01 16:42:33'),
(144, 'donor', 'Test Name', ' 5', '', 'testemail5@gmail.com', '01222242512', '', 'b59c67bf196a4758191e42f76670ceba', '1111', 'Sirajganj', 'Chauhali', 'Male', 40, 'uploads/357d6277ebANOTHER-LOGO-_Artboard 2.png', 'AB+', 0, '--', 'eligible', 'f64cb01e391078b35fcaa94630a5d1', 'ABp', '2021-08-01 16:40:08'),
(145, 'user', '', '', 'Temp Mail 2', 'tixake3007@aline9.com', '', '', 'b59c67bf196a4758191e42f76670ceba', '1111', '', '', '', 0, '', '', 0, '', '', '0071dfbc9b246ebc709d935603dae1', '', '2021-08-01 17:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `need_blood`
--

CREATE TABLE `need_blood` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `filter_bg_class` varchar(3) NOT NULL,
  `quantity` int(5) NOT NULL,
  `time` varchar(12) NOT NULL,
  `Hospital` varchar(200) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `need_blood`
--

INSERT INTO `need_blood` (`id`, `full_name`, `blood_group`, `filter_bg_class`, `quantity`, `time`, `Hospital`, `phone`, `time_stamp`) VALUES
(11, 'subrato Dn', 'AB-', 'ABn', 1, '8 Day', 'enayetpur', '01759458961', '2021-07-27 17:40:47'),
(12, 'Akash', 'A+', 'Ap', 2, '2 Day', 'sirajganj', '01759458961', '2021-07-27 16:40:47'),
(13, 'user 2', 'B+', 'Bp', 2, '3 Day', 'khawaja yunus ali hospital', '01759458961', '2021-07-25 19:52:46'),
(14, 'user 3', 'B-', 'Bn', 5, '8 Hour', 'khawaja yunus ali hospital', '01769696969', '2021-07-26 10:19:16'),
(15, 'user 4', 'O+', 'Op', 1, '10 Day', 'khawaja yunus ali hospital', '01769696969', '2021-07-26 02:51:48'),
(16, 'user 5', 'A-', 'An', 4, '2 Hour', 'khawaja yunus ali hospital', '01744556699', '2021-07-26 10:19:16'),
(17, 'user 6', 'O-', 'On', 1, '2 Day', 'khawaja yunus ali hospital', '01744556699', '2021-07-26 10:19:16'),
(18, 'Sourav Debnath', 'AB-', 'ABn', 2, '12 Hour', 'khawaja yunus ali hospital', '01785858585', '2021-07-26 10:19:16'),
(20, 'Afrin Jue', 'B+', 'Bp', 2, '5 Day', 'khawaja yunus ali hospital', '01681815555', '2021-07-26 10:19:16'),
(21, 'Sajib Debnath', 'B+', 'Bp', 2, '5 Hour', 'khawaja yunus ali hospital', '01681815555', '2021-07-31 14:35:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_info`
--
ALTER TABLE `donor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need_blood`
--
ALTER TABLE `need_blood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_info`
--
ALTER TABLE `donor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `need_blood`
--
ALTER TABLE `need_blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
