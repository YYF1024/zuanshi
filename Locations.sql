/*
Navicat MySQL Data Transfer

Source Server         : huize
Source Server Version : 50638
Source Host           : localhost:3306
Source Database       : zuanshi

Target Server Type    : MYSQL
Target Server Version : 50638
File Encoding         : 65001

Date: 2018-05-01 13:09:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `Locations`
-- ----------------------------
DROP TABLE IF EXISTS `Locations`;
CREATE TABLE `Locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `areaname` varchar(30) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1104 DEFAULT CHARSET=utf8 COMMENT='地区位置 表';

-- ----------------------------
-- Records of Locations
-- ----------------------------
INSERT INTO `Locations` VALUES ('8', 'Canada', '0');
INSERT INTO `Locations` VALUES ('20', 'Barbuda', '0');
INSERT INTO `Locations` VALUES ('22', 'Saint Lucia', '0');
INSERT INTO `Locations` VALUES ('56', 'Diego Garcia', '0');
INSERT INTO `Locations` VALUES ('71', 'Reunion Island', '0');
INSERT INTO `Locations` VALUES ('72', 'Zimbabwe', '0');
INSERT INTO `Locations` VALUES ('73', 'Namibia', '0');
INSERT INTO `Locations` VALUES ('79', 'Comoros', '0');
INSERT INTO `Locations` VALUES ('80', 'South', '0');
INSERT INTO `Locations` VALUES ('83', 'Aruba', '0');
INSERT INTO `Locations` VALUES ('86', 'Greece', '0');
INSERT INTO `Locations` VALUES ('87', 'Netherlands', '0');
INSERT INTO `Locations` VALUES ('88', 'Belgium', '0');
INSERT INTO `Locations` VALUES ('89', 'France', '0');
INSERT INTO `Locations` VALUES ('90', 'Spain', '0');
INSERT INTO `Locations` VALUES ('94', 'Ireland', '0');
INSERT INTO `Locations` VALUES ('101', 'Hungary', '0');
INSERT INTO `Locations` VALUES ('102', 'Lithuania', '0');
INSERT INTO `Locations` VALUES ('104', 'Estonia', '0');
INSERT INTO `Locations` VALUES ('109', 'Monaco', '0');
INSERT INTO `Locations` VALUES ('111', 'Vatican City', '0');
INSERT INTO `Locations` VALUES ('112', 'Ukraine', '0');
INSERT INTO `Locations` VALUES ('118', 'Italy', '0');
INSERT INTO `Locations` VALUES ('120', 'Switzerland', '0');
INSERT INTO `Locations` VALUES ('121', 'Liechtenstein', '0');
INSERT INTO `Locations` VALUES ('122', 'Czech Republic', '0');
INSERT INTO `Locations` VALUES ('124', 'Austria', '0');
INSERT INTO `Locations` VALUES ('126', 'Denmark', '0');
INSERT INTO `Locations` VALUES ('127', 'Sweden', '0');
INSERT INTO `Locations` VALUES ('129', 'Poland', '0');
INSERT INTO `Locations` VALUES ('130', 'Germany', '0');
INSERT INTO `Locations` VALUES ('135', 'Honduras', '0');
INSERT INTO `Locations` VALUES ('159', 'Uruguay', '0');
INSERT INTO `Locations` VALUES ('160', 'Neth Antilles', '0');
INSERT INTO `Locations` VALUES ('161', 'Malaysia', '0');
INSERT INTO `Locations` VALUES ('162', 'Australia', '0');
INSERT INTO `Locations` VALUES ('163', 'Cocos-Keeling Islands', '0');
INSERT INTO `Locations` VALUES ('164', 'Indonesia', '0');
INSERT INTO `Locations` VALUES ('165', 'Philippines', '0');
INSERT INTO `Locations` VALUES ('166', 'New Zealand', '0');
INSERT INTO `Locations` VALUES ('167', 'Singapore', '0');
INSERT INTO `Locations` VALUES ('168', 'Thailand', '0');
INSERT INTO `Locations` VALUES ('183', 'Wallis And Futuna Islands', '0');
INSERT INTO `Locations` VALUES ('187', 'Western Samoa', '0');
INSERT INTO `Locations` VALUES ('195', 'Russia', '0');
INSERT INTO `Locations` VALUES ('196', 'Kazakhstan', '0');
INSERT INTO `Locations` VALUES ('199', 'Uzbekistan', '0');
INSERT INTO `Locations` VALUES ('200', 'Japan', '0');
INSERT INTO `Locations` VALUES ('201', 'South Korea', '0');
INSERT INTO `Locations` VALUES ('202', 'Vietnam', '0');
INSERT INTO `Locations` VALUES ('204', 'Hong Kong', '0');
INSERT INTO `Locations` VALUES ('206', 'Cambodia', '0');
INSERT INTO `Locations` VALUES ('207', 'Lao P.D.R.', '0');
INSERT INTO `Locations` VALUES ('208', 'China', '0');
INSERT INTO `Locations` VALUES ('215', 'Taiwan', '0');
INSERT INTO `Locations` VALUES ('216', 'Turkey', '0');
INSERT INTO `Locations` VALUES ('217', 'India', '0');
INSERT INTO `Locations` VALUES ('218', 'Pakistan', '0');
INSERT INTO `Locations` VALUES ('220', 'Sri Lanka', '0');
INSERT INTO `Locations` VALUES ('223', 'Lebanon', '0');
INSERT INTO `Locations` VALUES ('227', 'Kuwait', '0');
INSERT INTO `Locations` VALUES ('228', 'Saudi Arabia', '0');
INSERT INTO `Locations` VALUES ('229', 'Yemen', '0');
INSERT INTO `Locations` VALUES ('231', 'UAE', '0');
INSERT INTO `Locations` VALUES ('232', 'Israel', '0');
INSERT INTO `Locations` VALUES ('233', 'Bahrain', '0');
INSERT INTO `Locations` VALUES ('234', 'Qatar', '0');
INSERT INTO `Locations` VALUES ('243', 'United Kingdom', '0');
INSERT INTO `Locations` VALUES ('1100', 'USA', '0');
INSERT INTO `Locations` VALUES ('1101', 'New York City', '1100');
INSERT INTO `Locations` VALUES ('1102', 'Los Angeles', '1100');
INSERT INTO `Locations` VALUES ('1103', 'Chicago', '1100');
INSERT INTO `Locations` VALUES ('1400', 'Europe (EU)', '0');
