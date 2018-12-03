-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: webdb.uvm.edu
-- Generation Time: Jun 25, 2015 at 02:20 PM
-- Server version: 5.5.43-37.2-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `RERICKSO_bdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblAddress`
--

CREATE TABLE IF NOT EXISTS `tblAddress` (
`pmkAddressId` int(11) NOT NULL,
  `fldStreetAddress1` varchar(85) NOT NULL,
  `fdlStreetAddress2` varchar(85) NOT NULL,
  `fldCity` varchar(85) NOT NULL,
  `fldState` varchar(2) NOT NULL,
  `fldZipCode` varchar(12) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblAddress`
--

INSERT INTO `tblAddress` (`pmkAddressId`, `fldStreetAddress1`, `fdlStreetAddress2`, `fldCity`, `fldState`, `fldZipCode`, `fldLastUpdated`) VALUES
(1, '101 Black Dog Lane', '', 'Hyde Park', 'VT', '05655', '2014-12-31 15:10:02'),
(2, '321 Black Dog Lane', '', 'Hyde Park', 'VT', '05655', '2014-12-31 15:11:38'),
(3, '142 Black Dog Lane', '', 'Hyde Park', 'VT', '05655', '2014-12-31 15:11:54'),
(4, '575 Black Dog Lane', '', 'Hyde Park', 'VT', '05655', '2014-12-31 15:12:18'),
(5, 'norm Black Dog Lane', '', 'Hyde Park', 'VT', '05655', '2014-12-31 15:13:21'),
(6, 'jim h Black Dog Lane', '', 'Hyde Park', 'VT', '05655', '2014-12-31 15:13:36'),
(7, '160 Sunset Drive', '', 'Morrisville', 'VT', '05661', '2014-12-31 15:13:49'),
(8, 'jim c Black Dog Lane', '', 'Hyde Park', 'VT', '05655', '2014-12-31 15:18:07'),
(9, '8808 Kensington Parkway', '', 'Chevy Chase', 'MD', '20815', '2014-12-31 17:09:43'),
(10, '97 Ferry Street', '', 'Barrington', 'RI', '02806', '2014-12-31 17:09:43'),
(11, '15 Woodlawn Drive', '', 'Esse Junction', 'VT', '05452', '2014-12-31 17:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblContact`
--

CREATE TABLE IF NOT EXISTS `tblContact` (
`pmkContactId` int(11) NOT NULL,
  `fldContact` varchar(100) NOT NULL,
  `fldType` varchar(20) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblContracts`
--

CREATE TABLE IF NOT EXISTS `tblContracts` (
`pmkContractId` int(11) NOT NULL,
  `fldContract` varchar(20) NOT NULL,
  `fldType` varchar(20) NOT NULL,
  `fldParticipationRequired` tinyint(1) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblContracts`
--

INSERT INTO `tblContracts` (`pmkContractId`, `fldContract`, `fldType`, `fldParticipationRequired`, `fldLastUpdated`) VALUES
(1, 'Road Maintenance', 'As needed', 1, '2015-06-23 14:01:49'),
(2, 'Road Maintenance', 'Yearly', 0, '2015-06-23 14:01:49'),
(3, 'Pool', 'Yearly', 1, '2014-12-31 15:03:07'),
(4, 'Snow Removal', 'Per Event', 0, '2014-12-31 15:03:07'),
(5, 'Gardens', 'Yearly', 0, '2014-12-31 15:04:42'),
(6, 'Sidewalk Shoveling', 'Per Event', 1, '2014-12-31 15:04:42'),
(7, 'Tennis', 'Yearly', 1, '2014-12-31 15:06:03'),
(8, 'Dog Walking', 'Yearly', 0, '2014-12-31 15:06:03'),
(9, 'Dog Walking', 'Per Event', 0, '2014-12-31 15:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblParcel`
--

CREATE TABLE IF NOT EXISTS `tblParcel` (
`pmkParcelId` int(11) NOT NULL,
  `fldTownParcelId` varchar(20) NOT NULL,
  `fldTaxYear` year(4) NOT NULL,
  `fldAssessedValue` float NOT NULL,
  `fnkParcelAddressId` int(11) NOT NULL,
  `fldMapColor` varchar(3) NOT NULL,
  `fldMapShape` varchar(10) NOT NULL,
  `fldMapCoordinates` varchar(255) NOT NULL,
  `fldMapAlt` varchar(100) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblParcel`
--

INSERT INTO `tblParcel` (`pmkParcelId`, `fldTownParcelId`, `fldTaxYear`, `fldAssessedValue`, `fnkParcelAddressId`, `fldMapColor`, `fldMapShape`, `fldMapCoordinates`, `fldMapAlt`, `fldLastUpdated`) VALUES
(1, '05-013-58', 2012, 273700, 2, 'C', 'poly', '115,290,88,263,105,263,111,244,112,219,121,218,140,230,151,229', 'Reg', '2015-06-24 17:12:48'),
(2, '05-13-114', 2012, 350800, 4, 'B', 'poly', '50,204,59,185,100,203,109,220,109,240', 'Toby', '2015-06-24 17:08:45'),
(3, '05-13-120', 2012, 279800, 7, 'A', 'poly', '108,242,49,205,40,216,86,261,100,261', 'Mitchel', '2015-06-24 17:12:22'),
(4, '05-013-104', 2012, 175400, 5, 'E', 'poly', '129,54,59,184,100,200,112,217,120,217,120,185,147,139,190,156,216,102', 'Privy', '2015-06-23 23:58:01'),
(5, '05-013-068.100', 2012, 329500, 9, 'F', 'poly', '148,139,202,170,189,193,166,208,161,207,152,195,146,181,128,178', 'Fred', '2015-06-23 23:58:15'),
(6, '05-013-068', 2012, 283000, 11, 'D', 'poly', '129,179,121,186,122,216,143,228,154,228,161,210,150,195,144,180', 'Jim', '2015-06-23 23:57:57'),
(7, '06-013-084', 2012, 102700, 11, 'G', 'poly', '213,117,371,201,350,247,191,160', 'Jim', '2015-06-23 23:58:24'),
(8, '06-013-046', 2012, 45600, 1, 'K', 'poly', '230,273,313,317,290,363,207,319', 'Bob', '2015-06-23 23:59:14'),
(9, '06-013-094', 2012, 70000, 12, 'H', 'poly', '156,7,245,51,219,101,130,53', 'Trey', '2015-06-23 23:58:35'),
(10, 'GRR', 2012, 0, 0, 'I', 'poly', '214,116,374,201,378,190,397,198,397,1,270,1', 'State', '2015-06-23 23:58:51'),
(11, '06-013-0074', 2012, 70000, 12, 'J', 'poly', '203,169,265,204,228,271,157,232,163,211,190,198', 'Privy', '2015-06-24 17:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblParcelAddress`
--

CREATE TABLE IF NOT EXISTS `tblParcelAddress` (
  `fnkParcelId` int(11) NOT NULL,
  `fnkAddressId` int(11) NOT NULL,
  `fldType` varchar(20) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblParcelAddress`
--

INSERT INTO `tblParcelAddress` (`fnkParcelId`, `fnkAddressId`, `fldType`, `fldLastUpdated`) VALUES
(1, 1, 'Property', '2014-12-31 15:15:43'),
(2, 2, 'Property', '2014-12-31 15:15:43'),
(3, 3, 'Property', '2014-12-31 15:16:24'),
(4, 7, 'Owner', '2014-12-31 15:16:24'),
(5, 4, 'Property', '2014-12-31 15:16:56'),
(6, 6, 'Property', '2014-12-31 15:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblParcelContracts`
--

CREATE TABLE IF NOT EXISTS `tblParcelContracts` (
  `fnkParcelId` int(11) NOT NULL,
  `fnkContractId` int(11) NOT NULL,
  `fldPercent` decimal(4,3) NOT NULL,
  `fldFlatFee` int(11) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblParcelContracts`
--

INSERT INTO `tblParcelContracts` (`fnkParcelId`, `fnkContractId`, `fldPercent`, `fldFlatFee`, `fldLastUpdated`) VALUES
(1, 1, '0.000', 0, '2015-06-24 14:01:49'),
(1, 4, '0.000', 0, '2015-06-24 18:01:49'),
(2, 1, '0.143', 0, '2015-06-24 14:01:49'),
(2, 4, '0.250', 0, '2015-06-24 18:01:49'),
(3, 1, '0.143', 0, '2015-06-24 14:01:49'),
(3, 4, '0.250', 0, '2015-06-24 18:01:49'),
(4, 1, '0.143', 0, '2015-06-24 14:01:49'),
(4, 4, '0.250', 0, '2015-06-24 18:01:49'),
(5, 1, '0.143', 0, '2015-06-24 14:01:49'),
(5, 4, '0.000', 0, '2015-06-24 18:01:49'),
(6, 1, '0.143', 0, '2015-06-24 14:01:49'),
(6, 4, '0.250', 0, '2015-06-24 18:01:49'),
(7, 1, '0.143', 0, '2015-06-24 14:01:49'),
(7, 4, '0.000', 0, '2015-06-24 18:01:49'),
(8, 1, '0.143', 0, '2015-06-24 14:01:49'),
(8, 4, '0.000', 100, '2015-06-24 18:01:49'),
(9, 1, '0.143', 0, '2015-06-24 14:01:49'),
(9, 4, '0.000', 100, '2015-06-24 18:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblParcelOwner`
--

CREATE TABLE IF NOT EXISTS `tblParcelOwner` (
  `fnkParcelId` int(11) NOT NULL,
  `fnkOwnerId` int(11) NOT NULL,
  `fldOrder` int(11) NOT NULL,
  `fldOwner` tinyint(1) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblPerson`
--

CREATE TABLE IF NOT EXISTS `tblPerson` (
`pmkPersonId` int(11) NOT NULL,
  `fldFirstName` varchar(40) NOT NULL,
  `fldLastName` varchar(55) NOT NULL,
  `fldEmail` varchar(60) NOT NULL,
  `fldPassWord` varchar(128) NOT NULL,
  `fldPermissionLevel` int(11) NOT NULL DEFAULT '0' COMMENT '0 is guest, 1 ,3 ,5 web master, 7 super user',
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblPerson`
--

INSERT INTO `tblPerson` (`pmkPersonId`, `fldFirstName`, `fldLastName`, `fldEmail`, `fldPassWord`, `fldPermissionLevel`, `fldLastUpdated`) VALUES
(1, 'Robert', 'Erickson', 'rerickso@uvm.edu', '', 20, '2014-12-31 00:19:57'),
(2, 'Kevin', 'Mitchell', '', '', 0, '2014-12-31 00:19:57'),
(3, 'Bernice', 'McCuen-Mitchell', '', '', 0, '2014-12-31 00:20:57'),
(4, 'Thomas', 'Hirchak III', '', '', 0, '2014-12-31 00:20:57'),
(5, 'Norman W', 'Prive', '', '', 0, '2014-12-31 00:22:13'),
(7, 'Reginald F', 'Godin', '', '', 0, '2014-12-31 00:25:47'),
(8, 'Rev', 'Trust', '', '', 0, '2014-12-31 00:25:47'),
(9, 'Doris', 'Palumbo', '', '', 0, '2014-12-31 00:27:10'),
(10, 'Fredrick L', 'Woeckener', '', '', 0, '2014-12-31 00:27:10'),
(11, 'James', 'Merikangas', '', '', 0, '2014-12-31 14:37:18'),
(12, 'Joseph (Trey)', 'Crisco', '', '', 0, '2014-12-31 14:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblPersonAddress`
--

CREATE TABLE IF NOT EXISTS `tblPersonAddress` (
  `fnkPersonId` int(11) NOT NULL,
  `fnkAddressId` int(11) NOT NULL,
  `fldType` varchar(20) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblPersonAddress`
--

INSERT INTO `tblPersonAddress` (`fnkPersonId`, `fnkAddressId`, `fldType`, `fldLastUpdated`) VALUES
(1, 11, 'Home', '2014-12-31 17:11:22'),
(11, 9, 'Home', '2014-12-31 17:11:22'),
(12, 10, 'Home', '2014-12-31 17:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblPersonContact`
--

CREATE TABLE IF NOT EXISTS `tblPersonContact` (
  `fnkPersonId` int(11) NOT NULL,
  `fnkContactId` int(11) NOT NULL,
  `fldOrder` int(11) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblPersonProposal`
--

CREATE TABLE IF NOT EXISTS `tblPersonProposal` (
  `fnkPersonId` int(11) NOT NULL,
  `fnkProposalId` int(11) NOT NULL,
  `fldOrder` int(11) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblProposal`
--

CREATE TABLE IF NOT EXISTS `tblProposal` (
`pmkProposalId` int(11) NOT NULL,
  `fldTitle` varchar(100) NOT NULL,
  `fldDescription` text NOT NULL,
  `fldDollarAmount` int(11) NOT NULL,
  `fldFinalAmount` float NOT NULL,
  `fldDateSubmitted` datetime NOT NULL,
  `fldDateUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fldType` varchar(20) NOT NULL,
  `fldVotingClosed` datetime NOT NULL,
  `fldApproved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblProposalComment`
--

CREATE TABLE IF NOT EXISTS `tblProposalComment` (
`pmkCommentId` int(11) NOT NULL,
  `fldComment` text NOT NULL,
  `fnkPersonId` int(11) NOT NULL,
  `fnkProposalId` int(11) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblProposalDocuments`
--

CREATE TABLE IF NOT EXISTS `tblProposalDocuments` (
`pmkDocumentId` int(11) NOT NULL,
  `fnkProposalId` int(11) NOT NULL,
  `fldFileName` varchar(30) NOT NULL,
  `fldType` varchar(12) NOT NULL,
  `fldDisplayOrder` int(11) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblProposalVote`
--

CREATE TABLE IF NOT EXISTS `tblProposalVote` (
  `fnkPersonId` int(11) NOT NULL,
  `fnkProposalId` int(11) NOT NULL,
  `fldVote` tinyint(1) NOT NULL,
  `fldLastUpdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblAddress`
--
ALTER TABLE `tblAddress`
 ADD PRIMARY KEY (`pmkAddressId`);

--
-- Indexes for table `tblContact`
--
ALTER TABLE `tblContact`
 ADD PRIMARY KEY (`pmkContactId`);

--
-- Indexes for table `tblContracts`
--
ALTER TABLE `tblContracts`
 ADD PRIMARY KEY (`pmkContractId`);

--
-- Indexes for table `tblParcel`
--
ALTER TABLE `tblParcel`
 ADD PRIMARY KEY (`pmkParcelId`);

--
-- Indexes for table `tblParcelAddress`
--
ALTER TABLE `tblParcelAddress`
 ADD PRIMARY KEY (`fnkParcelId`,`fnkAddressId`), ADD KEY `fnkAddressId` (`fnkAddressId`);

--
-- Indexes for table `tblParcelContracts`
--
ALTER TABLE `tblParcelContracts`
 ADD PRIMARY KEY (`fnkParcelId`,`fnkContractId`), ADD KEY `fnkContractId` (`fnkContractId`);

--
-- Indexes for table `tblParcelOwner`
--
ALTER TABLE `tblParcelOwner`
 ADD PRIMARY KEY (`fnkParcelId`,`fnkOwnerId`,`fldOrder`), ADD KEY `fnkOwnerId` (`fnkOwnerId`);

--
-- Indexes for table `tblPerson`
--
ALTER TABLE `tblPerson`
 ADD PRIMARY KEY (`pmkPersonId`);

--
-- Indexes for table `tblPersonAddress`
--
ALTER TABLE `tblPersonAddress`
 ADD PRIMARY KEY (`fnkPersonId`,`fnkAddressId`), ADD KEY `fnkAddressId` (`fnkAddressId`);

--
-- Indexes for table `tblPersonContact`
--
ALTER TABLE `tblPersonContact`
 ADD PRIMARY KEY (`fnkPersonId`,`fnkContactId`,`fldOrder`), ADD KEY `fnkContactId` (`fnkContactId`);

--
-- Indexes for table `tblPersonProposal`
--
ALTER TABLE `tblPersonProposal`
 ADD PRIMARY KEY (`fnkPersonId`,`fnkProposalId`,`fldOrder`), ADD KEY `fnkProposalId` (`fnkProposalId`);

--
-- Indexes for table `tblProposal`
--
ALTER TABLE `tblProposal`
 ADD PRIMARY KEY (`pmkProposalId`);

--
-- Indexes for table `tblProposalComment`
--
ALTER TABLE `tblProposalComment`
 ADD PRIMARY KEY (`pmkCommentId`);

--
-- Indexes for table `tblProposalDocuments`
--
ALTER TABLE `tblProposalDocuments`
 ADD PRIMARY KEY (`pmkDocumentId`);

--
-- Indexes for table `tblProposalVote`
--
ALTER TABLE `tblProposalVote`
 ADD PRIMARY KEY (`fnkPersonId`,`fnkProposalId`), ADD KEY `fnkProposalId` (`fnkProposalId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblAddress`
--
ALTER TABLE `tblAddress`
MODIFY `pmkAddressId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblContact`
--
ALTER TABLE `tblContact`
MODIFY `pmkContactId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblContracts`
--
ALTER TABLE `tblContracts`
MODIFY `pmkContractId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblParcel`
--
ALTER TABLE `tblParcel`
MODIFY `pmkParcelId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tblPerson`
--
ALTER TABLE `tblPerson`
MODIFY `pmkPersonId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tblProposal`
--
ALTER TABLE `tblProposal`
MODIFY `pmkProposalId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblProposalComment`
--
ALTER TABLE `tblProposalComment`
MODIFY `pmkCommentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblProposalDocuments`
--
ALTER TABLE `tblProposalDocuments`
MODIFY `pmkDocumentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblParcelAddress`
--
ALTER TABLE `tblParcelAddress`
ADD CONSTRAINT `tblParcelAddress_ibfk_2` FOREIGN KEY (`fnkAddressId`) REFERENCES `tblAddress` (`pmkAddressId`),
ADD CONSTRAINT `tblParcelAddress_ibfk_3` FOREIGN KEY (`fnkParcelId`) REFERENCES `tblParcel` (`pmkParcelId`);

--
-- Constraints for table `tblParcelContracts`
--
ALTER TABLE `tblParcelContracts`
ADD CONSTRAINT `tblParcelContracts_ibfk_2` FOREIGN KEY (`fnkContractId`) REFERENCES `tblContracts` (`pmkContractId`),
ADD CONSTRAINT `tblParcelContracts_ibfk_1` FOREIGN KEY (`fnkParcelId`) REFERENCES `tblParcel` (`pmkParcelId`);

--
-- Constraints for table `tblParcelOwner`
--
ALTER TABLE `tblParcelOwner`
ADD CONSTRAINT `tblParcelOwner_ibfk_1` FOREIGN KEY (`fnkOwnerId`) REFERENCES `tblPerson` (`pmkPersonId`),
ADD CONSTRAINT `tblParcelOwner_ibfk_2` FOREIGN KEY (`fnkParcelId`) REFERENCES `tblParcel` (`pmkParcelId`);

--
-- Constraints for table `tblPersonAddress`
--
ALTER TABLE `tblPersonAddress`
ADD CONSTRAINT `tblPersonAddress_ibfk_1` FOREIGN KEY (`fnkPersonId`) REFERENCES `tblPerson` (`pmkPersonId`),
ADD CONSTRAINT `tblPersonAddress_ibfk_2` FOREIGN KEY (`fnkAddressId`) REFERENCES `tblAddress` (`pmkAddressId`);

--
-- Constraints for table `tblPersonContact`
--
ALTER TABLE `tblPersonContact`
ADD CONSTRAINT `tblPersonContact_ibfk_1` FOREIGN KEY (`fnkPersonId`) REFERENCES `tblPerson` (`pmkPersonId`),
ADD CONSTRAINT `tblPersonContact_ibfk_2` FOREIGN KEY (`fnkContactId`) REFERENCES `tblContact` (`pmkContactId`);

--
-- Constraints for table `tblPersonProposal`
--
ALTER TABLE `tblPersonProposal`
ADD CONSTRAINT `tblPersonProposal_ibfk_1` FOREIGN KEY (`fnkPersonId`) REFERENCES `tblPerson` (`pmkPersonId`),
ADD CONSTRAINT `tblPersonProposal_ibfk_2` FOREIGN KEY (`fnkProposalId`) REFERENCES `tblProposal` (`pmkProposalId`);

--
-- Constraints for table `tblProposalComment`
--
ALTER TABLE `tblProposalComment`
ADD CONSTRAINT `tblProposalComment_ibfk_1` FOREIGN KEY (`pmkCommentId`) REFERENCES `tblProposal` (`pmkProposalId`);

--
-- Constraints for table `tblProposalVote`
--
ALTER TABLE `tblProposalVote`
ADD CONSTRAINT `tblProposalVote_ibfk_2` FOREIGN KEY (`fnkPersonId`) REFERENCES `tblPerson` (`pmkPersonId`),
ADD CONSTRAINT `tblProposalVote_ibfk_1` FOREIGN KEY (`fnkProposalId`) REFERENCES `tblProposal` (`pmkProposalId`);

