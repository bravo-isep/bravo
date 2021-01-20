-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-01-20 14:18:47
-- 服务器版本： 10.4.16-MariaDB
-- PHP 版本： 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `bravo`
--

-- --------------------------------------------------------

--
-- 表的结构 `ac_sys`
--

CREATE TABLE `ac_sys` (
  `idac_sys` int(11) NOT NULL,
  `tempereture` int(11) NOT NULL DEFAULT 26,
  `fanspeed` int(11) NOT NULL DEFAULT -1,
  `mode` varchar(64) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'cold',
  `idroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ac_sys`
--

INSERT INTO `ac_sys` (`idac_sys`, `tempereture`, `fanspeed`, `mode`, `idroom`) VALUES
(0, 26, -1, 'cold', 601),
(1, 26, -1, 'cold', 602),
(2, 26, -1, 'cold', 603),
(3, 26, -1, 'cold', 301),
(4, 26, -1, 'cold', 302);

-- --------------------------------------------------------

--
-- 表的结构 `alarm`
--

CREATE TABLE `alarm` (
  `idalarm` int(11) NOT NULL,
  `type` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `idsensor` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `body_temperature_detection`
--

CREATE TABLE `body_temperature_detection` (
  `idbtd` int(11) NOT NULL,
  `idsensor` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `temperature` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `body_temperature_detection`
--

INSERT INTO `body_temperature_detection` (`idbtd`, `idsensor`, `iduser`, `temperature`, `time`) VALUES
(1, 25, 0, 38, '2021-01-20 21:04:15');

-- --------------------------------------------------------

--
-- 表的结构 `lighting_sys`
--

CREATE TABLE `lighting_sys` (
  `idlighting_sys` int(11) NOT NULL,
  `light_brightness` int(11) NOT NULL DEFAULT -1,
  `curtain_position` int(11) NOT NULL DEFAULT -1,
  `idroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lighting_sys`
--

INSERT INTO `lighting_sys` (`idlighting_sys`, `light_brightness`, `curtain_position`, `idroom`) VALUES
(0, -1, -1, 601),
(1, -1, -1, 602),
(2, -1, -1, 603),
(3, -1, -1, 301),
(4, -1, -1, 302);

-- --------------------------------------------------------

--
-- 表的结构 `meeting`
--

CREATE TABLE `meeting` (
  `idmeeting` int(11) NOT NULL,
  `idroom` int(11) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `meeting_user`
--

CREATE TABLE `meeting_user` (
  `idmeeting_user` int(11) NOT NULL,
  `idmeeting` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `room`
--

CREATE TABLE `room` (
  `idroom` int(11) NOT NULL,
  `type` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `room_name` varchar(64) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `room`
--

INSERT INTO `room` (`idroom`, `type`, `room_name`) VALUES
(101, 'public area', 'Front door'),
(301, 'meeting room', 'M-301'),
(302, 'meeting room', 'M-302'),
(601, 'office', 'A-601'),
(602, 'office', 'A-602'),
(603, 'office', 'A-603');

-- --------------------------------------------------------

--
-- 表的结构 `sensor`
--

CREATE TABLE `sensor` (
  `idsensor` int(11) NOT NULL,
  `type` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `value` float DEFAULT NULL,
  `idroom` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sensor`
--

INSERT INTO `sensor` (`idsensor`, `type`, `value`, `idroom`, `time`) VALUES
(0, 'temperature', 30.2, 301, '2020-12-03 09:42:01'),
(1, 'temperature', 25.9, 302, '2020-12-03 09:42:01'),
(2, 'temperature', 15.6, 601, '2020-12-03 09:42:01'),
(3, 'temperature', 14.7, 602, '2020-12-03 09:42:01'),
(4, 'temperature', 20.7, 603, '2020-12-03 09:42:01'),
(5, 'humidity', 57.3, 301, '2020-12-03 09:42:01'),
(6, 'humidity', 57.3, 302, '2020-12-03 09:42:01'),
(7, 'humidity', 75.4, 601, '2020-12-03 09:42:01'),
(8, 'humidity', 49.6, 602, '2020-12-03 09:42:01'),
(9, 'humidity', 68, 603, '2020-12-03 09:42:01'),
(10, 'brightness', 70.8, 301, '2020-12-03 09:42:01'),
(11, 'brightness', 98.1, 302, '2020-12-03 09:42:01'),
(12, 'brightness', 57.9, 601, '2020-12-03 09:42:01'),
(13, 'brightness', 28.9, 602, '2020-12-03 09:42:01'),
(14, 'brightness', 62.4, 603, '2020-12-03 09:42:01'),
(15, 'smoke', 0, 301, '2020-12-03 05:11:46'),
(16, 'smoke', 0, 302, '2020-12-03 05:11:46'),
(17, 'smoke', 0, 601, '2020-12-03 05:11:46'),
(18, 'smoke', 0, 602, '2020-12-03 05:11:47'),
(19, 'smoke', 0, 603, '2020-12-03 05:11:47'),
(20, 'Intrusion ', 0, 301, '2020-12-03 05:11:48'),
(21, 'Intrusion ', 0, 302, '2020-12-03 05:11:48'),
(22, 'Intrusion ', 0, 601, '2020-12-03 05:11:49'),
(23, 'Intrusion ', 0, 602, '2020-12-03 05:11:49'),
(24, 'Intrusion ', 0, 603, '2020-12-03 05:11:50'),
(25, 'body temperature', 36.3, 101, '2020-12-03 09:42:01');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `userlevel` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `idroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `userlevel`, `idroom`) VALUES
(0, 'employee', '30274c47903bd1bac7633bbf09743149ebab805f', 1, 601),
(1, 'manager', '30274c47903bd1bac7633bbf09743149ebab805f', 2, 602),
(2, 'administrator', '30274c47903bd1bac7633bbf09743149ebab805f', 3, 603);

--
-- 转储表的索引
--

--
-- 表的索引 `ac_sys`
--
ALTER TABLE `ac_sys`
  ADD PRIMARY KEY (`idac_sys`),
  ADD KEY `ac_sys_idroom_idx` (`idroom`);

--
-- 表的索引 `alarm`
--
ALTER TABLE `alarm`
  ADD PRIMARY KEY (`idalarm`),
  ADD KEY `alarm_idsensor_idx` (`idsensor`);

--
-- 表的索引 `body_temperature_detection`
--
ALTER TABLE `body_temperature_detection`
  ADD PRIMARY KEY (`idbtd`),
  ADD KEY `btd_idsensor_idx` (`idsensor`),
  ADD KEY `btd_iduser_idx` (`iduser`);

--
-- 表的索引 `lighting_sys`
--
ALTER TABLE `lighting_sys`
  ADD PRIMARY KEY (`idlighting_sys`),
  ADD KEY `lighting_sys_idroom_idx` (`idroom`);

--
-- 表的索引 `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`idmeeting`),
  ADD KEY `meeting_idroom_idx` (`idroom`);

--
-- 表的索引 `meeting_user`
--
ALTER TABLE `meeting_user`
  ADD PRIMARY KEY (`idmeeting_user`),
  ADD KEY `meeting_user_idmeeting_idx` (`idmeeting`),
  ADD KEY `meeting_user_iduser_idx` (`iduser`);

--
-- 表的索引 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idroom`),
  ADD UNIQUE KEY `room_name_UNIQUE` (`room_name`);

--
-- 表的索引 `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`idsensor`),
  ADD KEY `idroom_idx` (`idroom`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `iduser_UNIQUE` (`iduser`),
  ADD KEY `idroom_idx` (`idroom`);

--
-- 限制导出的表
--

--
-- 限制表 `ac_sys`
--
ALTER TABLE `ac_sys`
  ADD CONSTRAINT `ac_sys_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON UPDATE CASCADE;

--
-- 限制表 `alarm`
--
ALTER TABLE `alarm`
  ADD CONSTRAINT `alarm_idsensor` FOREIGN KEY (`idsensor`) REFERENCES `sensor` (`idsensor`) ON UPDATE CASCADE;

--
-- 限制表 `body_temperature_detection`
--
ALTER TABLE `body_temperature_detection`
  ADD CONSTRAINT `btd_idsensor` FOREIGN KEY (`idsensor`) REFERENCES `sensor` (`idsensor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `btd_iduser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON UPDATE CASCADE;

--
-- 限制表 `lighting_sys`
--
ALTER TABLE `lighting_sys`
  ADD CONSTRAINT `lighting_sys_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON UPDATE CASCADE;

--
-- 限制表 `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON UPDATE CASCADE;

--
-- 限制表 `meeting_user`
--
ALTER TABLE `meeting_user`
  ADD CONSTRAINT `meeting_user_idmeeting` FOREIGN KEY (`idmeeting`) REFERENCES `meeting` (`idmeeting`),
  ADD CONSTRAINT `meeting_user_iduser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON UPDATE CASCADE;

--
-- 限制表 `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON UPDATE CASCADE;

--
-- 限制表 `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_idroom` FOREIGN KEY (`idroom`) REFERENCES `room` (`idroom`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
