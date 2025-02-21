--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `session` varchar(32) NOT NULL,
  `user` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ip` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `browser` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`session`),
  UNIQUE KEY `sessions_unique` (`session`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
