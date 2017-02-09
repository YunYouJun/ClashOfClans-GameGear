-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql303.idcnet.top
-- Generation Time: Dec 23, 2016 at 12:22 AM
-- Server version: 5.6.32-78.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dazh_19100823_clashofclans`
--

-- --------------------------------------------------------

--
-- Table structure for table `clan`
--

CREATE TABLE IF NOT EXISTS `clan` (
  `ClanCode` char(10) NOT NULL,
  `ClanName` varchar(30) NOT NULL,
  `MemberNum` tinyint(4) DEFAULT '1',
  `ClanLevel` tinyint(4) NOT NULL,
  `ClanPassword` varchar(20) NOT NULL,
  `ClanLeader` char(10) NOT NULL,
  `ClanGroup` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ClanCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clan`
--

INSERT INTO `clan` (`ClanCode`, `ClanName`, `MemberNum`, `ClanLevel`, `ClanPassword`, `ClanLeader`, `ClanGroup`) VALUES
('28VPJVGC', '琦开得胜', 2, 10, 'qikaidesheng', 'RGRUUVR2', '365376497'),
('LLPOGYCU', '机智一族', 2, 7, 'jizhiyizu', 'Q0V9UYCV', '');

-- --------------------------------------------------------

--
-- Table structure for table `clanmember`
--

CREATE TABLE IF NOT EXISTS `clanmember` (
  `Code` char(10) NOT NULL,
  `Password` char(20) CHARACTER SET latin1 NOT NULL,
  `VillageName` char(30) NOT NULL,
  `Position` tinyint(1) NOT NULL,
  `Level` smallint(6) NOT NULL,
  `TownHallLevel` tinyint(4) NOT NULL,
  `Star` smallint(6) NOT NULL,
  `Donation` mediumint(9) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `QQorWechat` char(20) DEFAULT NULL,
  `ClanCode` char(10) NOT NULL,
  `PKMatch` int(11) NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clanmember`
--

INSERT INTO `clanmember` (`Code`, `Password`, `VillageName`, `Position`, `Level`, `TownHallLevel`, `Star`, `Donation`, `Email`, `QQorWechat`, `ClanCode`, `PKMatch`) VALUES
('11111111', 'YUNYOU', 'YUNYOU', 0, 0, 5, 0, 1000, '101', '1010', '', 0),
('asdaasd', 'qweqwe', 'qwe', 0, 0, 0, 0, 0, 'qweqw@we', 'asda', '', 0),
('luranqin', '', 'luranqin', 0, 0, 1, 10, 0, '123@qq.com', '123', '', 0),
('Q0V9UYCaaa', 'yunyou', 'hasldakd', 0, 0, 0, 0, 0, 'asda@wasd', '910426929', '', 0),
('Q0V9UYCV', 'yunyou', '云游的小村庄', 3, 131, 9, 542, 131000, '910426929@qq.com', '910426929', 'LLPOGYCU', 19288),
('RGRUUVR2', 'qaz123456', '机智的小杨睿', 3, 162, 11, 950, 55, '770604764@qq.com', NULL, '28VPJVGC', 0),
('yunyoujun', 'yunyou', '测试', 2, 130, 8, 1000, 4534, '12311@qq.com', 'asda', '28VPJVGC', 0),
('88LLQ8GG0', 'wcw123456', 'Derick总裁', 0, 0, 0, 0, 0, '972837373@qq.com', '972830373', '28VPJVGC', 0),
('QLLP2LYR', 'qazwsxedc869537', '三爷', 0, 131, 10, 392, 126878, '450273810@qq.com', '450273810', '', 42478),
('JQL8J8LQ', 'lgm123456', '逗逼', 0, 0, 0, 0, 0, '1042527243@qq.com', NULL, '', 0),
('9YG2P9RQ8', 'zjh521314', '灬撕裂的天堂灬', 0, 0, 0, 0, 0, '1843706627@qq.com', '1843706627', '', 0),
('RQ0LY20V', 'neoxu81802500', '桥东小区', 0, 0, 0, 0, 0, '172766067@qq.com', '172766067', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clanvsclan`
--

CREATE TABLE IF NOT EXISTS `clanvsclan` (
  `ClanCode` char(10) NOT NULL,
  `ClanWarID` int(11) NOT NULL,
  `ClanWarStar` tinyint(4) NOT NULL,
  PRIMARY KEY (`ClanCode`,`ClanWarID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clanvsclan`
--

INSERT INTO `clanvsclan` (`ClanCode`, `ClanWarID`, `ClanWarStar`) VALUES
('123456789', 16, 59),
('28VPJVGC', 1, 57),
('28VPJVGC', 16, 58),
('LLPOGYCU', 1, 58);

-- --------------------------------------------------------

--
-- Table structure for table `clanwar`
--

CREATE TABLE IF NOT EXISTS `clanwar` (
  `ClanWarID` int(11) NOT NULL AUTO_INCREMENT,
  `WarTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `WarMemberNum` tinyint(2) NOT NULL,
  `WinClan` char(10) NOT NULL,
  PRIMARY KEY (`ClanWarID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `clanwar`
--

INSERT INTO `clanwar` (`ClanWarID`, `WarTime`, `WarMemberNum`, `WinClan`) VALUES
(1, '2016-12-06 15:39:39', 20, 'LLPOGYCU'),
(11, '2016-12-03 16:00:00', 10, '28VPJVGC'),
(12, '2016-12-03 16:00:00', 10, '28VPJVGC'),
(13, '2016-12-03 16:00:00', 10, '28VPJVGC'),
(14, '2016-12-03 16:00:00', 10, '123456789'),
(15, '2016-12-03 16:00:00', 10, '123456789'),
(16, '2016-12-03 16:00:00', 10, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `clanword`
--

CREATE TABLE IF NOT EXISTS `clanword` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `ClanCode` char(12) NOT NULL,
  `Code` char(12) NOT NULL,
  `Cword` tinytext NOT NULL,
  `CTIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `clanword`
--

INSERT INTO `clanword` (`CID`, `ClanCode`, `Code`, `Cword`, `CTIME`) VALUES
(2, 'LLPOGYCU', 'Q0V9UYCV', '君不见，黄河之水天上来', '2016-12-08 06:04:10'),
(3, 'LLPOGYCU', 'Q0V9UYCV', '欲状巴陵胜，千古岳之阳。洞庭在目，远衔山色俯长江。浩浩横无涯际，爽气北通巫峡，南望极潇湘。骚人与迁客，览物兴尤长。 ', '2016-12-08 06:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `defensetable`
--

CREATE TABLE IF NOT EXISTS `defensetable` (
  `DefenseID` varchar(20) NOT NULL,
  `DefenseName` varchar(20) NOT NULL,
  PRIMARY KEY (`DefenseID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `defensetable`
--

INSERT INTO `defensetable` (`DefenseID`, `DefenseName`) VALUES
('AirBombs', '空中炸弹'),
('AirDefense', '防空火箭'),
('AirSweeper', '空气炮'),
('AncientArtillery', '天鹰火炮'),
('ArcherTower', '箭塔'),
('BombTower', '炸弹塔'),
('Cannon', '加农炮'),
('GiantBombs', '巨型炸弹'),
('Inferno', '地狱塔'),
('Mortar', '迫击炮'),
('SeekingAirMines', '搜空炸弹'),
('SkeletonTraps', '骷髅陷阱'),
('SmallBombs', '小型炸弹'),
('SpringTraps', '隐形弹簧'),
('Tesla', '特斯拉电磁塔'),
('Wall', '城墙'),
('WizardTower', '法师塔'),
('Xbow', 'X连弩');

-- --------------------------------------------------------

--
-- Table structure for table `havedefense`
--

CREATE TABLE IF NOT EXISTS `havedefense` (
  `Code` char(10) NOT NULL,
  `DefenseID` varchar(20) NOT NULL,
  `DefenseLevel` tinyint(1) NOT NULL,
  `DefenseNum` smallint(6) NOT NULL,
  PRIMARY KEY (`Code`,`DefenseID`,`DefenseLevel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `havedefense`
--

INSERT INTO `havedefense` (`Code`, `DefenseID`, `DefenseLevel`, `DefenseNum`) VALUES
('Q0V9UYCV', 'AirBombs', 2, 4),
('Q0V9UYCV', 'AirDefense', 3, 3),
('Q0V9UYCV', 'AirSweeper', 3, 2),
('Q0V9UYCV', 'AncientArtillery', 1, 1),
('Q0V9UYCV', 'ArcherTower', 4, 2),
('Q0V9UYCV', 'BombTower', 2, 1),
('Q0V9UYCV', 'Cannon', 1, 4),
('Q0V9UYCV', 'GiantBombs', 2, 2),
('Q0V9UYCV', 'Inferno', 1, 1),
('Q0V9UYCV', 'Mortar', 2, 3),
('Q0V9UYCV', 'SeekingAirMines', 2, 2),
('Q0V9UYCV', 'SkeletonTraps', 2, 2),
('Q0V9UYCV', 'SmallBombs', 3, 1),
('Q0V9UYCV', 'SpringTraps', 4, 3),
('Q0V9UYCV', 'Tesla', 2, 2),
('Q0V9UYCV', 'Wall', 1, 0),
('Q0V9UYCV', 'WizardTower', 4, 2),
('Q0V9UYCV', 'Xbow', 3, 2),
('RGRUUVR2', 'AirBombs', 3, 5),
('RGRUUVR2', 'AirDefense', 3, 2),
('RGRUUVR2', 'AirSweeper', 4, 2),
('RGRUUVR2', 'AncientArtillery', 2, 1),
('RGRUUVR2', 'ArcherTower', 12, 3),
('RGRUUVR2', 'BombTower', 4, 2),
('RGRUUVR2', 'Cannon', 14, 7),
('RGRUUVR2', 'GiantBombs', 3, 4),
('RGRUUVR2', 'Inferno', 3, 2),
('RGRUUVR2', 'Mortar', 9, 2),
('RGRUUVR2', 'SeekingAirMines', 2, 4),
('RGRUUVR2', 'SkeletonTraps', 3, 3),
('RGRUUVR2', 'SmallBombs', 5, 6),
('RGRUUVR2', 'SpringTraps', 5, 6),
('RGRUUVR2', 'Tesla', 3, 3),
('RGRUUVR2', 'Wall', 6, 7),
('RGRUUVR2', 'WizardTower', 9, 5),
('RGRUUVR2', 'Xbow', 4, 4),
('JQL8J8LQ', 'Cannon', 1, 0),
('JQL8J8LQ', 'ArcherTower', 1, 0),
('JQL8J8LQ', 'Mortar', 1, 0),
('JQL8J8LQ', 'Tesla', 1, 0),
('JQL8J8LQ', 'AirDefense', 1, 0),
('JQL8J8LQ', 'AirSweeper', 1, 0),
('JQL8J8LQ', 'WizardTower', 1, 0),
('JQL8J8LQ', 'BombTower', 1, 0),
('JQL8J8LQ', 'Xbow', 1, 0),
('JQL8J8LQ', 'Inferno', 1, 0),
('JQL8J8LQ', 'AncientArtillery', 1, 0),
('JQL8J8LQ', 'Wall', 1, 0),
('JQL8J8LQ', 'AirBombs', 1, 0),
('JQL8J8LQ', 'SmallBombs', 1, 0),
('JQL8J8LQ', 'GiantBombs', 1, 0),
('JQL8J8LQ', 'SkeletonTraps', 1, 0),
('JQL8J8LQ', 'SeekingAirMines', 1, 0),
('JQL8J8LQ', 'SpringTraps', 1, 0),
('QLLP2LYR', 'SmallBombs', 6, 6),
('QLLP2LYR', 'AirBombs', 4, 5),
('QLLP2LYR', 'Wall', 11, 275),
('QLLP2LYR', 'AncientArtillery', 1, 0),
('QLLP2LYR', 'Inferno', 1, 0),
('QLLP2LYR', 'Xbow', 1, 0),
('QLLP2LYR', 'BombTower', 1, 2),
('QLLP2LYR', 'WizardTower', 8, 4),
('QLLP2LYR', 'AirSweeper', 4, 2),
('QLLP2LYR', 'AirDefense', 7, 0),
('QLLP2LYR', 'Tesla', 8, 4),
('QLLP2LYR', 'Mortar', 6, 4),
('QLLP2LYR', 'ArcherTower', 13, 7),
('QLLP2LYR', 'Cannon', 12, 6),
('QLLP2LYR', 'GiantBombs', 4, 5),
('QLLP2LYR', 'SkeletonTraps', 3, 3),
('QLLP2LYR', 'SeekingAirMines', 3, 2),
('QLLP2LYR', 'SpringTraps', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `havetechnology`
--

CREATE TABLE IF NOT EXISTS `havetechnology` (
  `Code` char(10) NOT NULL,
  `TechnologyID` char(20) NOT NULL,
  `TechnologyLevel` tinyint(2) NOT NULL,
  PRIMARY KEY (`Code`,`TechnologyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `havetechnology`
--

INSERT INTO `havetechnology` (`Code`, `TechnologyID`, `TechnologyLevel`) VALUES
('Q0V9UYCV', 'Arc', 4),
('Q0V9UYCV', 'ArcQueen', 13),
('Q0V9UYCV', 'BabyDragon', 2),
('Q0V9UYCV', 'Balloon', 5),
('Q0V9UYCV', 'Bar', 2),
('Q0V9UYCV', 'BarKing', 14),
('Q0V9UYCV', 'Bowler', 1),
('Q0V9UYCV', 'Clone', 2),
('Q0V9UYCV', 'Dragon', 2),
('Q0V9UYCV', 'EarthQuake', 2),
('Q0V9UYCV', 'Freeze', 3),
('Q0V9UYCV', 'Giant', 3),
('Q0V9UYCV', 'Goblin', 6),
('Q0V9UYCV', 'Golem', 5),
('Q0V9UYCV', 'GrandWarden', 10),
('Q0V9UYCV', 'Haste', 2),
('Q0V9UYCV', 'Healer', 2),
('Q0V9UYCV', 'Healing', 2),
('Q0V9UYCV', 'HogRider', 5),
('Q0V9UYCV', 'Jump', 2),
('Q0V9UYCV', 'LavaHound', 4),
('Q0V9UYCV', 'Lightning', 5),
('Q0V9UYCV', 'Miner', 2),
('Q0V9UYCV', 'Minion', 4),
('Q0V9UYCV', 'Pekka', 3),
('Q0V9UYCV', 'Poison', 2),
('Q0V9UYCV', 'Rage', 1),
('Q0V9UYCV', 'Skeleton', 4),
('Q0V9UYCV', 'Valkyrie', 4),
('Q0V9UYCV', 'WallBreaker', 3),
('Q0V9UYCV', 'Witch', 3),
('Q0V9UYCV', 'Wizard', 1),
('RGRUUVR2', 'Arc', 7),
('RGRUUVR2', 'ArcQueen', 18),
('RGRUUVR2', 'BabyDragon', 5),
('RGRUUVR2', 'Balloon', 4),
('RGRUUVR2', 'Bar', 7),
('RGRUUVR2', 'BarKing', 17),
('RGRUUVR2', 'Bowler', 3),
('RGRUUVR2', 'Clone', 3),
('RGRUUVR2', 'Dragon', 3),
('RGRUUVR2', 'EarthQuake', 4),
('RGRUUVR2', 'Freeze', 5),
('RGRUUVR2', 'Giant', 8),
('RGRUUVR2', 'Goblin', 7),
('RGRUUVR2', 'Golem', 4),
('RGRUUVR2', 'GrandWarden', 18),
('RGRUUVR2', 'Haste', 3),
('RGRUUVR2', 'Healer', 4),
('RGRUUVR2', 'Healing', 5),
('RGRUUVR2', 'HogRider', 6),
('RGRUUVR2', 'Jump', 3),
('RGRUUVR2', 'LavaHound', 4),
('RGRUUVR2', 'Lightning', 6),
('RGRUUVR2', 'Miner', 4),
('RGRUUVR2', 'Minion', 7),
('RGRUUVR2', 'Pekka', 3),
('RGRUUVR2', 'Poison', 4),
('RGRUUVR2', 'Rage', 5),
('RGRUUVR2', 'Skeleton', 3),
('RGRUUVR2', 'Valkyrie', 5),
('RGRUUVR2', 'WallBreaker', 4),
('RGRUUVR2', 'Witch', 3),
('RGRUUVR2', 'Wizard', 7),
('QLLP2LYR', 'Bar', 5),
('QLLP2LYR', 'Arc', 5),
('QLLP2LYR', 'Giant', 6),
('QLLP2LYR', 'Goblin', 6),
('QLLP2LYR', 'WallBreaker', 5),
('QLLP2LYR', 'Balloon', 5),
('QLLP2LYR', 'Wizard', 6),
('QLLP2LYR', 'Healer', 4),
('QLLP2LYR', 'Dragon', 3),
('QLLP2LYR', 'Pekka', 0),
('QLLP2LYR', 'BabyDragon', 1),
('QLLP2LYR', 'Miner', 2),
('QLLP2LYR', 'Minion', 1),
('QLLP2LYR', 'HogRider', 6),
('QLLP2LYR', 'Valkyrie', 5),
('QLLP2LYR', 'Golem', 4),
('QLLP2LYR', 'Witch', 1),
('QLLP2LYR', 'LavaHound', 1),
('QLLP2LYR', 'Bowler', 2),
('QLLP2LYR', 'Lightning', 5),
('QLLP2LYR', 'Healing', 6),
('QLLP2LYR', 'Rage', 5),
('QLLP2LYR', 'Jump', 2),
('QLLP2LYR', 'Freeze', 1),
('QLLP2LYR', 'Clone', 1),
('QLLP2LYR', 'Poison', 1),
('QLLP2LYR', 'EarthQuake', 1),
('QLLP2LYR', 'Haste', 1),
('QLLP2LYR', 'Skeleton', 1),
('QLLP2LYR', 'BarKing', 26),
('QLLP2LYR', 'ArcQueen', 22),
('QLLP2LYR', 'GrandWarden', 0);

-- --------------------------------------------------------

--
-- Table structure for table `joinclan`
--

CREATE TABLE IF NOT EXISTS `joinclan` (
  `Code` char(10) NOT NULL,
  `ClanCode` char(10) NOT NULL,
  PRIMARY KEY (`Code`,`ClanCode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rawdata`
--

CREATE TABLE IF NOT EXISTS `rawdata` (
  `lookup` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rawdata`
--

INSERT INTO `rawdata` (`lookup`, `name`, `level`, `weight`) VALUES
('Cannon1', 'Cannon', 1, 100),
('Cannon2', 'Cannon', 2, 199),
('Cannon3', 'Cannon', 3, 297),
('Cannon4', 'Cannon', 4, 394),
('Cannon5', 'Cannon', 5, 490),
('Cannon6', 'Cannon', 6, 585),
('Cannon7', 'Cannon', 7, 679),
('Cannon8', 'Cannon', 8, 772),
('Cannon9', 'Cannon', 9, 864),
('Cannon10', 'Cannon', 10, 955),
('Cannon11', 'Cannon', 11, 1045),
('Cannon12', 'Cannon', 12, 1134),
('Cannon13', 'Cannon', 13, 1222),
('Cannon14', 'Cannon', 14, 1309),
('ArcherTower1', 'ArcherTower', 1, 100),
('ArcherTower2', 'ArcherTower', 2, 199),
('ArcherTower3', 'ArcherTower', 3, 297),
('ArcherTower4', 'ArcherTower', 4, 394),
('ArcherTower5', 'ArcherTower', 5, 490),
('ArcherTower6', 'ArcherTower', 6, 585),
('ArcherTower7', 'ArcherTower', 7, 679),
('ArcherTower8', 'ArcherTower', 8, 772),
('ArcherTower9', 'ArcherTower', 9, 864),
('ArcherTower10', 'ArcherTower', 10, 955),
('ArcherTower11', 'ArcherTower', 11, 1045),
('ArcherTower12', 'ArcherTower', 12, 1134),
('ArcherTower13', 'ArcherTower', 13, 1222),
('WizardTower1', 'WizardTower', 1, 450),
('WizardTower2', 'WizardTower', 2, 870),
('WizardTower3', 'WizardTower', 3, 1260),
('WizardTower4', 'WizardTower', 4, 1620),
('WizardTower5', 'WizardTower', 5, 1950),
('WizardTower6', 'WizardTower', 6, 2240),
('WizardTower7', 'WizardTower', 7, 2490),
('WizardTower8', 'WizardTower', 8, 2710),
('WizardTower9', 'WizardTower', 9, 2910),
('AirDefense1', 'AirDefense', 1, 50),
('AirDefense2', 'AirDefense', 2, 100),
('AirDefense3', 'AirDefense', 3, 150),
('AirDefense4', 'AirDefense', 4, 200),
('AirDefense5', 'AirDefense', 5, 250),
('AirDefense6', 'AirDefense', 6, 300),
('AirDefense7', 'AirDefense', 7, 350),
('AirDefense8', 'AirDefense', 8, 400),
('Mortar1', 'Mortar', 1, 450),
('Mortar2', 'Mortar', 2, 890),
('Mortar3', 'Mortar', 3, 1320),
('Mortar4', 'Mortar', 4, 1740),
('Mortar5', 'Mortar', 5, 2150),
('Mortar6', 'Mortar', 6, 2550),
('Mortar7', 'Mortar', 7, 2940),
('Mortar8', 'Mortar', 8, 3320),
('Mortar9', 'Mortar', 9, 3690),
('Tesla1', 'Tesla', 1, 100),
('Tesla2', 'Tesla', 2, 200),
('Tesla3', 'Tesla', 3, 300),
('Tesla4', 'Tesla', 4, 400),
('Tesla5', 'Tesla', 5, 500),
('Tesla6', 'Tesla', 6, 600),
('Tesla7', 'Tesla', 7, 700),
('Tesla8', 'Tesla', 8, 800),
('Xbow1', 'Xbow', 1, 350),
('Xbow2', 'Xbow', 2, 675),
('Xbow3', 'Xbow', 3, 975),
('Xbow4', 'Xbow', 4, 1275),
('Inferno1', 'Inferno', 1, 2950),
('Inferno2', 'Inferno', 2, 5550),
('Inferno3', 'Inferno', 3, 7900),
('Inferno4', 'Inferno', 4, 10100),
('AirSweeper1', 'AirSweeper', 1, 20),
('AirSweeper2', 'AirSweeper', 2, 40),
('AirSweeper3', 'AirSweeper', 3, 60),
('AirSweeper4', 'AirSweeper', 4, 80),
('AirSweeper5', 'AirSweeper', 5, 100),
('AirSweeper6', 'AirSweeper', 6, 120),
('AncientArtillery1', 'AncientArtillery', 1, 5200),
('AncientArtillery2', 'AncientArtillery', 2, 9950),
('BarbarianKing1', 'BarbarianKing', 1, 23),
('BarbarianKing2', 'BarbarianKing', 2, 46),
('BarbarianKing3', 'BarbarianKing', 3, 69),
('BarbarianKing4', 'BarbarianKing', 4, 92),
('BarbarianKing5', 'BarbarianKing', 5, 117),
('BarbarianKing6', 'BarbarianKing', 6, 142),
('BarbarianKing7', 'BarbarianKing', 7, 167),
('BarbarianKing8', 'BarbarianKing', 8, 192),
('BarbarianKing9', 'BarbarianKing', 9, 217),
('BarbarianKing10', 'BarbarianKing', 10, 244),
('BarbarianKing11', 'BarbarianKing', 11, 271),
('BarbarianKing12', 'BarbarianKing', 12, 298),
('BarbarianKing13', 'BarbarianKing', 13, 325),
('BarbarianKing14', 'BarbarianKing', 14, 352),
('BarbarianKing15', 'BarbarianKing', 15, 381),
('BarbarianKing16', 'BarbarianKing', 16, 410),
('BarbarianKing17', 'BarbarianKing', 17, 439),
('BarbarianKing18', 'BarbarianKing', 18, 468),
('BarbarianKing19', 'BarbarianKing', 19, 497),
('BarbarianKing20', 'BarbarianKing', 20, 528),
('BarbarianKing21', 'BarbarianKing', 21, 559),
('BarbarianKing22', 'BarbarianKing', 22, 590),
('BarbarianKing23', 'BarbarianKing', 23, 621),
('BarbarianKing24', 'BarbarianKing', 24, 652),
('BarbarianKing25', 'BarbarianKing', 25, 685),
('BarbarianKing26', 'BarbarianKing', 26, 718),
('BarbarianKing27', 'BarbarianKing', 27, 751),
('BarbarianKing28', 'BarbarianKing', 28, 784),
('BarbarianKing29', 'BarbarianKing', 29, 817),
('BarbarianKing30', 'BarbarianKing', 30, 852),
('BarbarianKing31', 'BarbarianKing', 31, 887),
('BarbarianKing32', 'BarbarianKing', 32, 922),
('BarbarianKing33', 'BarbarianKing', 33, 957),
('BarbarianKing34', 'BarbarianKing', 34, 992),
('BarbarianKing35', 'BarbarianKing', 35, 1029),
('BarbarianKing36', 'BarbarianKing', 36, 1066),
('BarbarianKing37', 'BarbarianKing', 37, 1103),
('BarbarianKing38', 'BarbarianKing', 38, 1140),
('BarbarianKing39', 'BarbarianKing', 39, 1177),
('BarbarianKing40', 'BarbarianKing', 40, 1214),
('ArcherQueen1', 'ArcherQueen', 1, 65),
('ArcherQueen2', 'ArcherQueen', 2, 130),
('ArcherQueen3', 'ArcherQueen', 3, 195),
('ArcherQueen4', 'ArcherQueen', 4, 260),
('ArcherQueen5', 'ArcherQueen', 5, 327),
('ArcherQueen6', 'ArcherQueen', 6, 394),
('ArcherQueen7', 'ArcherQueen', 7, 461),
('ArcherQueen8', 'ArcherQueen', 8, 528),
('ArcherQueen9', 'ArcherQueen', 9, 595),
('ArcherQueen10', 'ArcherQueen', 10, 664),
('ArcherQueen11', 'ArcherQueen', 11, 733),
('ArcherQueen12', 'ArcherQueen', 12, 802),
('ArcherQueen13', 'ArcherQueen', 13, 871),
('ArcherQueen14', 'ArcherQueen', 14, 940),
('ArcherQueen15', 'ArcherQueen', 15, 1011),
('ArcherQueen16', 'ArcherQueen', 16, 1082),
('ArcherQueen17', 'ArcherQueen', 17, 1153),
('ArcherQueen18', 'ArcherQueen', 18, 1224),
('ArcherQueen19', 'ArcherQueen', 19, 1295),
('ArcherQueen20', 'ArcherQueen', 20, 1368),
('ArcherQueen21', 'ArcherQueen', 21, 1441),
('ArcherQueen22', 'ArcherQueen', 22, 1514),
('ArcherQueen23', 'ArcherQueen', 23, 1587),
('ArcherQueen24', 'ArcherQueen', 24, 1660),
('ArcherQueen25', 'ArcherQueen', 25, 1735),
('ArcherQueen26', 'ArcherQueen', 26, 1810),
('ArcherQueen27', 'ArcherQueen', 27, 1885),
('ArcherQueen28', 'ArcherQueen', 28, 1960),
('ArcherQueen29', 'ArcherQueen', 29, 2035),
('ArcherQueen30', 'ArcherQueen', 30, 2112),
('ArcherQueen31', 'ArcherQueen', 31, 2189),
('ArcherQueen32', 'ArcherQueen', 32, 2266),
('ArcherQueen33', 'ArcherQueen', 33, 2343),
('ArcherQueen34', 'ArcherQueen', 34, 2420),
('ArcherQueen35', 'ArcherQueen', 35, 2499),
('ArcherQueen36', 'ArcherQueen', 36, 2578),
('ArcherQueen37', 'ArcherQueen', 37, 2657),
('ArcherQueen38', 'ArcherQueen', 38, 2736),
('ArcherQueen39', 'ArcherQueen', 39, 2815),
('ArcherQueen40', 'ArcherQueen', 40, 2894),
('GrandWarden1', 'GrandWarden', 1, 135),
('GrandWarden2', 'GrandWarden', 2, 270),
('GrandWarden3', 'GrandWarden', 3, 405),
('GrandWarden4', 'GrandWarden', 4, 540),
('GrandWarden5', 'GrandWarden', 5, 677),
('GrandWarden6', 'GrandWarden', 6, 814),
('GrandWarden7', 'GrandWarden', 7, 951),
('GrandWarden8', 'GrandWarden', 8, 1088),
('GrandWarden9', 'GrandWarden', 9, 1225),
('GrandWarden10', 'GrandWarden', 10, 1364),
('GrandWarden11', 'GrandWarden', 11, 1503),
('GrandWarden12', 'GrandWarden', 12, 1642),
('GrandWarden13', 'GrandWarden', 13, 1781),
('GrandWarden14', 'GrandWarden', 14, 1920),
('GrandWarden15', 'GrandWarden', 15, 2061),
('GrandWarden16', 'GrandWarden', 16, 2202),
('GrandWarden17', 'GrandWarden', 17, 2343),
('GrandWarden18', 'GrandWarden', 18, 2484),
('GrandWarden19', 'GrandWarden', 19, 2625),
('GrandWarden20', 'GrandWarden', 20, 2768),
('SmallBomb1', 'SmallBomb', 1, 100),
('SmallBomb2', 'SmallBomb', 2, 200),
('SmallBomb3', 'SmallBomb', 3, 300),
('SmallBomb4', 'SmallBomb', 4, 400),
('SmallBomb5', 'SmallBomb', 5, 500),
('SmallBomb6', 'SmallBomb', 6, 600),
('GiantBomb1', 'GiantBomb', 1, 150),
('GiantBomb2', 'GiantBomb', 2, 300),
('GiantBomb3', 'GiantBomb', 3, 450),
('GiantBomb4', 'GiantBomb', 4, 600),
('SeekingAirmine1', 'SeekingAirmine', 1, 15),
('SeekingAirmine2', 'SeekingAirmine', 2, 30),
('SeekingAirmine3', 'SeekingAirmine', 3, 45),
('AirBombs1', 'AirBombs', 1, 100),
('AirBombs2', 'AirBombs', 2, 200),
('AirBombs3', 'AirBombs', 3, 300),
('AirBombs4', 'AirBombs', 4, 400),
('SkeletonTraps1', 'SkeletonTraps', 1, 80),
('SkeletonTraps2', 'SkeletonTraps', 2, 160),
('SkeletonTraps3', 'SkeletonTraps', 3, 240),
('Wall 1', 'Wall ', 1, 4),
('Wall 2', 'Wall ', 2, 8),
('Wall 3', 'Wall ', 3, 13),
('Wall 4', 'Wall ', 4, 17),
('Wall 5', 'Wall ', 5, 21),
('Wall 6', 'Wall ', 6, 25),
('Wall 7', 'Wall ', 7, 29),
('Wall 8', 'Wall ', 8, 34),
('Wall 9', 'Wall ', 9, 38),
('Wall 10', 'Wall ', 10, 42),
('Wall 11', 'Wall ', 11, 46),
('SpringTrap1', 'SpringTrap', 1, 20),
('SpringTrap2', 'SpringTrap', 2, 45),
('SpringTrap3', 'SpringTrap', 3, 71),
('SpringTrap4', 'SpringTrap', 4, 98),
('SpringTrap5', 'SpringTrap', 5, 126),
('SpringTrap6', 'SpringTrap', 6, 126),
('TownHall1', 'TownHall', 1, 10),
('TownHall2', 'TownHall', 2, 60),
('TownHall3', 'TownHall', 3, 135),
('TownHall4', 'TownHall', 4, 245),
('TownHall5', 'TownHall', 5, 415),
('TownHall6', 'TownHall', 6, 665),
('TownHall7', 'TownHall', 7, 1045),
('TownHall8', 'TownHall', 8, 1625),
('TownHall9', 'TownHall', 9, 2375),
('TownHall10', 'TownHall', 10, 3275),
('TownHall11', 'TownHall', 11, 4275);

-- --------------------------------------------------------

--
-- Table structure for table `technologytable`
--

CREATE TABLE IF NOT EXISTS `technologytable` (
  `TechnologyID` char(20) NOT NULL,
  `TechnologyName` varchar(20) NOT NULL,
  PRIMARY KEY (`TechnologyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technologytable`
--

INSERT INTO `technologytable` (`TechnologyID`, `TechnologyName`) VALUES
('Arc', '弓箭手'),
('ArcQueen', '弓箭女皇'),
('BabyDragon', '龙宝宝'),
('Balloon', '气球兵'),
('Bar', '野蛮人'),
('BarKing', '野蛮人之王'),
('Bowler', '巨石投手'),
('Clone', '镜像法术'),
('Dragon', '龙'),
('EarthQuake', '地震法术'),
('Freeze', '冰霜法术'),
('Giant', '巨人'),
('Goblin', '哥布林'),
('Golem', '石头人'),
('GrandWarden', '大守护者'),
('Haste', '急速法术'),
('Healer', '天使'),
('Healing', '治疗法术'),
('HogRider', '野猪骑士'),
('Jump', '弹跳法术'),
('LavaHound', '熔岩猎犬'),
('Lightning', '闪电法术'),
('Miner', '掘地矿工'),
('Minion', '亡灵'),
('Pekka', '皮卡超人'),
('Poison', '毒药法术'),
('Rage', '狂暴法术'),
('Skeleton', '骷髅法术'),
('Valkyrie', '瓦里基女武神'),
('WallBreaker', '炸弹人'),
('Witch', '女巫'),
('Wizard', '法师');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
