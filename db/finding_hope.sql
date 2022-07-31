-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 09:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finding_hope`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `AU_Id` int(11) NOT NULL,
  `AU_Name` varchar(31) NOT NULL,
  `AU_Email` varchar(31) NOT NULL,
  `AU_DOB` varchar(15) NOT NULL,
  `AU_Password` varchar(90) NOT NULL,
  `AU_OldPassword` varchar(90) NOT NULL,
  `AU_Phone` varchar(24) NOT NULL,
  `P_Name` varchar(31) NOT NULL,
  `C_Name` varchar(31) NOT NULL,
  `D_Name` varchar(31) NOT NULL,
  `AU_Address` varchar(101) NOT NULL,
  `AU_Image` varchar(100) NOT NULL,
  `AU_Role` varchar(15) NOT NULL,
  `AU_AcountStatus` varchar(15) NOT NULL,
  `AU_SecurityCode` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`AU_Id`, `AU_Name`, `AU_Email`, `AU_DOB`, `AU_Password`, `AU_OldPassword`, `AU_Phone`, `P_Name`, `C_Name`, `D_Name`, `AU_Address`, `AU_Image`, `AU_Role`, `AU_AcountStatus`, `AU_SecurityCode`) VALUES
(6, 'Muhammad Imran', 'x.imran1996@outlook.com', '15-August-1996', '$2y$10$iamadminoffindinghopeuLZAx6VF6.fBbXH/QoZqLYDnxa5tF5kq', '', '03152471997', 'Khyber Pakhtunkhwa', 'Peshawar', 'Peshawar', 'Kotla Mohsin Khan Gari Azad Merr Peshawar', 'images/admin/190506_1557156307.jpg', 'Super Admin', '1', ''),
(13, 'salman', 'x.salman095@gmail.com', '15/08/1996', '$2y$10$iamadminoffindinghopeuLZAx6VF6.fBbXH/QoZqLYDnxa5tF5kq', '', '0912323060', '', '', '', '', 'images/admin/190614_1560518157.jpg', 'Admin', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

CREATE TABLE `album_images` (
  `Img_Id` int(3) NOT NULL,
  `Img_AlbumId` int(3) NOT NULL,
  `Img_ImgLoc` varchar(101) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `B_Id` int(11) NOT NULL,
  `B_Title` varchar(32) NOT NULL,
  `AU_Id` int(11) NOT NULL,
  `B_FImage` varchar(101) NOT NULL,
  `B_Content` varchar(1000) NOT NULL,
  `B_Date` varchar(15) NOT NULL,
  `B_Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`B_Id`, `B_Title`, `AU_Id`, `B_FImage`, `B_Content`, `B_Date`, `B_Status`) VALUES
(5, 'Why We Need Finding Hope', 6, 'images/blog/190423_1556050189.jpg', 'Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.', '23-Apr-2019', 'Published'),
(7, 'how Finding Hope become successf', 6, 'images/blog/190508_1557301822.jpg', 'Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.', '08-May-2019', 'Published'),
(8, 'how Finding Hope become successf', 6, 'images/blog/190614_1560505437.jpg', 'Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.', '14-Jun-2019', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `C_Id` int(11) NOT NULL,
  `C_Name` varchar(31) NOT NULL,
  `C_Province` varchar(31) NOT NULL,
  `C_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`C_Id`, `C_Name`, `C_Province`, `C_Code`) VALUES
(1, 'Peshawar', 'Khyber Pakhtunkhwa', 1),
(2, 'Mardan', 'Khyber Pakhtunkhwa', 2),
(3, 'Lahore', 'Panjab', 3),
(4, 'Multan', 'Panjab', 4),
(5, 'Karachi', 'Sindh', 5),
(6, 'Hyderabad', 'Sindh', 6),
(7, 'Quetta', 'Balochistan', 7),
(8, 'Gwadar', 'Balochistan', 8),
(9, 'Astore', 'Gilgit Baltistan', 9),
(10, 'Skardu', 'Gilgit Baltistan', 10),
(11, 'Muzaffarabad', 'Azad Kashmir', 11),
(12, 'RawalaKot', 'Azad Kashmir', 12);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `District_Id` int(11) NOT NULL,
  `D_Name` varchar(31) NOT NULL,
  `D_City` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`District_Id`, `D_Name`, `D_City`) VALUES
(1, 'Peshawar', 'Peshawar'),
(2, 'Mardan', 'Mardan'),
(3, 'Gwadar', 'Gwadar'),
(4, 'Quetta', 'Quetta'),
(5, 'Lahore', 'Lahore'),
(6, 'Lahore', 'Lahore'),
(7, 'Hyderabad', 'Hyderabad'),
(8, 'Karachi', 'Karachi'),
(9, 'Astore', 'Astore'),
(10, 'Skardu', 'Skardu'),
(11, 'Muzaffarabad', 'Muzaffarabad'),
(12, 'Rawalakot', 'Rawalakot');

-- --------------------------------------------------------

--
-- Table structure for table `finders`
--

CREATE TABLE `finders` (
  `F_Id` int(11) NOT NULL,
  `F_Name` varchar(31) NOT NULL,
  `F_Email` varchar(31) NOT NULL,
  `F_Phone` varchar(15) NOT NULL,
  `F_Province` varchar(31) NOT NULL,
  `F_City` varchar(31) NOT NULL,
  `F_District` varchar(31) NOT NULL,
  `F_Address1` varchar(101) NOT NULL,
  `F_Address2` varchar(101) NOT NULL,
  `MC_Id` int(11) NOT NULL,
  `F_Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_album`
--

CREATE TABLE `gallery_album` (
  `GA_Id` int(3) NOT NULL,
  `GA_Name` varchar(32) NOT NULL,
  `GA_SubHeading` varchar(64) NOT NULL,
  `GA_FImage` varchar(101) NOT NULL,
  `GA_Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `M_Id` int(11) NOT NULL,
  `S_Name` varchar(31) NOT NULL,
  `S_Email` varchar(64) NOT NULL,
  `S_Subject` varchar(64) NOT NULL,
  `S_Message` varchar(500) NOT NULL,
  `M_Date` varchar(15) NOT NULL,
  `M_Reply` varchar(500) NOT NULL,
  `M_Status` varchar(15) NOT NULL,
  `R_Status` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`M_Id`, `S_Name`, `S_Email`, `S_Subject`, `S_Message`, `M_Date`, `M_Reply`, `M_Status`, `R_Status`) VALUES
(2, 'Imran', 'x.imran1099@yahoo.com', 'About my Case', 'Can you please infrom me if there is any development in my case.', '26-04-2019', 'We Are in Process of investigating your case as  soon if there is any development we will inform you.', 'Seen', 'Replied');

-- --------------------------------------------------------

--
-- Table structure for table `missing_cases`
--

CREATE TABLE `missing_cases` (
  `MC_Id` int(11) NOT NULL,
  `MC_Name` varchar(31) NOT NULL,
  `MC_FName` varchar(31) NOT NULL,
  `MC_Age` varchar(3) NOT NULL,
  `MC_Gender` varchar(15) NOT NULL,
  `MC_EyeColor` varchar(15) NOT NULL,
  `MC_HairColor` varchar(15) NOT NULL,
  `MC_MHealth` varchar(15) NOT NULL,
  `MC_Disability` varchar(10) NOT NULL,
  `MC_IdenMark` varchar(63) NOT NULL,
  `P_Name` varchar(31) NOT NULL,
  `C_Name` varchar(31) NOT NULL,
  `D_Name` varchar(31) NOT NULL,
  `MC_ImageLoc` varchar(101) NOT NULL,
  `MC_CurrentStatus` varchar(15) NOT NULL,
  `MC_ReporterName` varchar(31) NOT NULL,
  `MC_RRelation` varchar(24) NOT NULL,
  `MC_RPhone` varchar(20) NOT NULL,
  `MC_RAddress1` varchar(101) NOT NULL,
  `MC_RAddress2` varchar(101) NOT NULL,
  `MC_RCInfo` varchar(255) NOT NULL,
  `MC_ReporterEmail` varchar(31) NOT NULL,
  `MC_CaseStatus` varchar(15) NOT NULL,
  `MC_Date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_cases`
--

INSERT INTO `missing_cases` (`MC_Id`, `MC_Name`, `MC_FName`, `MC_Age`, `MC_Gender`, `MC_EyeColor`, `MC_HairColor`, `MC_MHealth`, `MC_Disability`, `MC_IdenMark`, `P_Name`, `C_Name`, `D_Name`, `MC_ImageLoc`, `MC_CurrentStatus`, `MC_ReporterName`, `MC_RRelation`, `MC_RPhone`, `MC_RAddress1`, `MC_RAddress2`, `MC_RCInfo`, `MC_ReporterEmail`, `MC_CaseStatus`, `MC_Date`) VALUES
(10, 'salman', 'saeed', '22', 'Male', 'Hazal', 'Brown', 'Disturb', 'No', 'sasadas', 'Sindh', 'Karachi', 'Karachi', 'admin/images/case/190614_1560502556.jpg', 'Missing', 'Imran', 'Sister', '03139071729', 'asdklashda', 'sadaskdasdj', 'asjdaskdhasdashd', 'x.imran96@gmail.com', 'Verifeid', '14-06-2019'),
(11, 'hamza', 'saeed', '6', 'Male', 'Brown', 'Blonde', 'Normal', 'Yes', 'sdndksdnasdddsfsfsd', 'Sindh', 'Karachi', 'Astore', 'admin/images/case/190614_1560504965.jpg', 'Missing', 'Imran', 'Uncle', 'sdfsfsdfsdfsd', 'sdfsdfdsfsdfsdfsdfsdfsfsfsd', 'sdfsdfsdfsfsdfsddfsd', 'sfsffsfsdfsdfs', 'x.imran96@gmail.com', 'Verifeid', '14-06-2019'),
(12, 'hamza', 'asdasdas', '10', 'Female', 'Green', 'Blonde', 'Disturb', 'No', 'sdasd', 'Sindh', 'Lahore', 'Lahore', 'admin/images/case/190625_1561490306.jpg', 'Missing', 'sxzsdzs', 'Cousin', '03152471993', 'zxczcxzcz', 'zx czxczxczx', 'sdasdasdasd', 'x.imran96@gmail.com', 'Un-Varifeid', '25-06-2019');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `N_Id` int(11) NOT NULL,
  `N_Title` varchar(31) NOT NULL,
  `N_Content` varchar(500) NOT NULL,
  `N_Date` varchar(15) NOT NULL,
  `N_Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`N_Id`, `N_Title`, `N_Content`, `N_Date`, `N_Status`) VALUES
(2, 'Finding Hope Sign MoU With Unic', 'Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no. Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fastidii vituperata eam no.Lorem ipsum dolor sit amet, mutat paulo simul per no, assum fas', '23-Apr-2019', 'Published'),
(9, 'Finding Hope Sign MoU With Unic', 'zcxlzscjasdoasdhiasldjasoidaksuodlas', '07-May-2019', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `P_Id` int(3) NOT NULL,
  `P_Name` varchar(31) NOT NULL,
  `P_Code` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`P_Id`, `P_Name`, `P_Code`) VALUES
(1, 'Panjab', 1),
(2, 'Sindh', 2),
(3, 'Khyber Pakhtunkhwa', 3),
(4, 'Balochistan', 4),
(6, 'Azad Kashmir', 5),
(9, 'Gilgit Baltistan', 6);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `T_Id` int(1) NOT NULL,
  `T_Name` varchar(31) NOT NULL,
  `T_File` varchar(31) NOT NULL,
  `T_Status` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`T_Id`, `T_Name`, `T_File`, `T_Status`) VALUES
(1, 'Hope', 'style1.css', 'Un-Selected'),
(2, 'Orange', 'style2.css', 'Un-Selected'),
(3, 'Blue Ivy', 'style3.css', 'Un-Selected'),
(4, 'Pink Ross', 'style4.css', 'Selected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `U_Name` varchar(31) NOT NULL,
  `U_Email` varchar(31) NOT NULL,
  `U_Phone` varchar(31) NOT NULL,
  `P_Name` varchar(31) NOT NULL,
  `C_Name` varchar(31) NOT NULL,
  `D_Name` varchar(31) NOT NULL,
  `U_Address` varchar(101) NOT NULL,
  `U_Password` varchar(90) NOT NULL,
  `U_OldPassword` varchar(90) NOT NULL,
  `U_Image` varchar(63) NOT NULL,
  `U_SecurityCode` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `U_Name`, `U_Email`, `U_Phone`, `P_Name`, `C_Name`, `D_Name`, `U_Address`, `U_Password`, `U_OldPassword`, `U_Image`, `U_SecurityCode`) VALUES
(1, 'Muhammad', 'x.imran96@gmail.com', '03139071725', 'Khyber Pakhtunkhwa', 'Peshawar', 'Peshawar', 'Peshawar kohat road peshawar', '$2y$10$iamadminoffindinghopeuHhATyA2UlQHCpfErPJ0EgAWgZQxjqem', '$2y$10$iamadminoffindinghopeuLZAx6VF6.fBbXH/QoZqLYDnxa5tF5kq', 'admin/images/users/190614_1560466302.jpg', ''),
(2, 'Muhammad Imran', 'x.imran@gmail.com', '', '', '', '', '', '$2y$10$iamadminoffindinghopeuHhATyA2UlQHCpfErPJ0EgAWgZQxjqem', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`AU_Id`);

--
-- Indexes for table `album_images`
--
ALTER TABLE `album_images`
  ADD PRIMARY KEY (`Img_Id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`B_Id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`C_Id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`District_Id`);

--
-- Indexes for table `finders`
--
ALTER TABLE `finders`
  ADD PRIMARY KEY (`F_Id`);

--
-- Indexes for table `gallery_album`
--
ALTER TABLE `gallery_album`
  ADD PRIMARY KEY (`GA_Id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`M_Id`);

--
-- Indexes for table `missing_cases`
--
ALTER TABLE `missing_cases`
  ADD PRIMARY KEY (`MC_Id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`N_Id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`T_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `AU_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `album_images`
--
ALTER TABLE `album_images`
  MODIFY `Img_Id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `B_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `C_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `District_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `finders`
--
ALTER TABLE `finders`
  MODIFY `F_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_album`
--
ALTER TABLE `gallery_album`
  MODIFY `GA_Id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `M_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `missing_cases`
--
ALTER TABLE `missing_cases`
  MODIFY `MC_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `N_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `P_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `T_Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
