/*
Navicat MySQL Data Transfer

Source Server         : huize
Source Server Version : 50638
Source Host           : localhost:3306
Source Database       : zuanshi

Target Server Type    : MYSQL
Target Server Version : 50638
File Encoding         : 65001

Date: 2018-05-01 13:09:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `seach_rap`
-- ----------------------------
DROP TABLE IF EXISTS `seach_rap`;
CREATE TABLE `seach_rap` (
  `id` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(1) DEFAULT '0' COMMENT '0:白色  1:精美',
  `shape` varchar(30) DEFAULT NULL COMMENT '形状',
  `size` double(4,2) DEFAULT '0.00' COMMENT '尺寸',
  `color` tinyint(4) DEFAULT '1' COMMENT '"1"=>''D'',"2"=>''E'',"3"=>''F'',"4"=>''G'', "5"=>''H'',"6"=>''I'',"7"=>''J'',"8"=>''K'',"9"=>''L'',"10"=>''M'',"11"=>''N'',"12"=>''O'',"13"=>''P'',"14"=>''Q'',"15"=>''R'',"16"=>''S'',"17"=>''T'',"18"=>''U'',"19"=>''V'',"20"=>''W'',"21"=>''X'',"22"=>''Y'',"23"=>''Z''',
  `clarity` tinyint(4) DEFAULT '1' COMMENT '净度 "1"=>''FL'',"2"=>''IF'',"3"=>''VVS1'',"4"=>''VVS2'',"5"=>''VS1'',"6"=>''VS2'',"7"=>''SI1'',"8"=>''SI2'',"9"=>''SI3'',"10"=>''I1'',"11"=>''I2'',"12"=>''I3''',
  `cut` tinyint(2) DEFAULT '1' COMMENT '切口 "1"=>''Ideal'',"2"=>''Excellent'',"3"=>''Very Good'',"4"=>''Good'',"5"=>''Fair'',"6"=>''Poor'',"7"=>''None''',
  `polish` tinyint(2) DEFAULT '1' COMMENT '抛光"1"=>''Ideal'',"2"=>''Excellent'',"3"=>''Very Good'',"4"=>''Good'',"5"=>''Fair'',"6"=>''Poor'',"7"=>''None''',
  `symmetry` tinyint(2) DEFAULT '1' COMMENT '对称"1"=>''Ideal'',"2"=>''Excellent'',"3"=>''Very Good'',"4"=>''Good'',"5"=>''Fair'',"6"=>''Poor'',"7"=>''None''',
  `FluorescenceIntensity` tinyint(2) DEFAULT '1' COMMENT '荧光强度 "1"=>''None'',"2"=>''Very Slight'',"3"=>''Faint'',"7"=>''Slight'' ,"4"=>''Medium'',"5"=>''Strong'', "6"=>''Very Strong''',
  `FluorescenceColor` tinyint(2) DEFAULT '0' COMMENT '荧光 颜色"1"=>''Blue'',"2"=>''Yellow'',"3"=>''Green'',"4"=>''Red'',"5"=>''Orange'',"6"=>''White''',
  `depth` double(5,2) DEFAULT '0.00' COMMENT '深度 %',
  `MeasLength` double(5,2) DEFAULT '0.00' COMMENT '测量长度',
  `MeasWidth` double(5,2) DEFAULT '0.00' COMMENT '测量宽度',
  `MeasDepth` double(5,2) DEFAULT '0.00' COMMENT '测量深度',
  `table` double(5,2) DEFAULT '0.00' COMMENT '台面',
  `LotNumber` varchar(30) DEFAULT '' COMMENT '批号',
  `Review` varchar(50) DEFAULT NULL COMMENT '认证评论',
  `features` varchar(50) DEFAULT NULL COMMENT '主要特征',
  `reportdate` date DEFAULT NULL COMMENT '报告日期',
  `CuletCondition` tinyint(2) DEFAULT '0' COMMENT '底面条件"1"=>''Pointed'',"2"=>''Chipped'',"3"=>''Abraded''',
  `CuletSize` tinyint(2) DEFAULT '0' COMMENT '"1"=>''None'',"5"=>''Very Small'',"4"=>''Small'',"3"=>''Medium'',"2"=>''Large''',
  `Girdle` tinyint(3) DEFAULT '1' COMMENT '腰围 "1"=>''Extr. Thin'',"2"=>''Very Thin'',"3"=>''Thin'',"4"=>''Slightly Thin'',"5"=>''Medium'',"6"=>''Slightly Thick'',"7"=>''Thick'',"8"=>''Very Thick'',"9"=>''Extr. Thick''',
  `top` varchar(30) DEFAULT NULL COMMENT '顶点',
  `stand` varchar(30) DEFAULT NULL COMMENT '展位',
  `Treatments` tinyint(4) DEFAULT NULL COMMENT '处理 ''4''=>''Irradiated'',''1''=>''Laser Drilled'',''5''=>''HPHT'',''2''=>''Clarity Enhanced'',''3''=>''Color Enhanced'',''6''=>''Other''',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `Ratio` double(5,3) DEFAULT '0.000' COMMENT '比率',
  `Starshape` varchar(30) DEFAULT NULL COMMENT '星型刻面长',
  `StockNumber` varchar(30) DEFAULT NULL COMMENT '库存',
  `Usability` varchar(30) DEFAULT NULL COMMENT '可用性',
  `Locations` varchar(30) DEFAULT NULL COMMENT '区域位置 逗号分隔 (Locations表 id)',
  `Escrow` varchar(50) DEFAULT NULL,
  `Seller` int(11) DEFAULT '0' COMMENT '卖方',
  `PriceCt` double(11,2) DEFAULT '0.00' COMMENT '$/Ct',
  `PriceTotal` double(11,2) DEFAULT '0.00' COMMENT '总计',
  `RapPercent` double(11,2) DEFAULT '0.00' COMMENT 'Rap%',
  `Brand` tinyint(4) DEFAULT '0' COMMENT '"8"=>"Hearts and Arrows","1"=>"88-Cut","2"=>"Arctic Fox","10"=>"Argyle","3"=>"CanadaMark","11"=>"Canadian Ice","5"=>"Heart''s On Fire","6"=>"Polar Bear","7"=>''Polar Ice''',
  `Grade` varchar(30) DEFAULT '' COMMENT '鉴定',
  `Inclusions` varchar(50) DEFAULT NULL,
  `comments` varchar(50) DEFAULT NULL COMMENT '会员评论',
  `updatetime` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='卖家 钻石出售表';

-- ----------------------------
-- Records of seach_rap
-- ----------------------------
