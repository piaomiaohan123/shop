/*
Navicat MySQL Data Transfer

Source Server         : shop
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-19 16:20:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `last_ip` varchar(45) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  `note` varchar(145) DEFAULT NULL,
  `created` int(11) NOT NULL,
  `ban` tinyint(1) DEFAULT NULL COMMENT '是否禁用',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'hades', 'e10adc3949ba59abbe56e057f20f883e', '', null, null, '0', null);

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(45) NOT NULL,
  `brand_name_en` varchar(45) DEFAULT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES ('1', '苹果', null, '苹果', null, 'https://www.apple.com/cn/');
INSERT INTO `brand` VALUES ('2', '联想', null, '联想', null, 'https://www.lenovo.com.cn/');
INSERT INTO `brand` VALUES ('3', '华为', null, '华为', null, 'http://www.huawei.com/cn/');
INSERT INTO `brand` VALUES ('4', '小米', null, '小米', null, 'https://www.mi.com/');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  `category_pid` int(11) DEFAULT '0',
  `keywords` varchar(45) DEFAULT NULL,
  `desc` varchar(45) DEFAULT NULL,
  `is_nav` tinyint(1) DEFAULT '0',
  `sort` smallint(6) DEFAULT NULL,
  `filter_attr` varchar(45) DEFAULT NULL COMMENT '筛选条件(1,3,5)',
  `jiage` smallint(6) DEFAULT NULL COMMENT '价格区间个数',
  `goods_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '家用电器', '0', null, null, '0', null, null, '5', null);
INSERT INTO `category` VALUES ('2', '生活电器', '0', null, null, '0', null, null, '5', null);
INSERT INTO `category` VALUES ('3', '厨房电器', '0', null, null, '0', null, null, '5', null);
INSERT INTO `category` VALUES ('4', '电脑', '0', null, null, '0', null, '11,12', '5', '2');
INSERT INTO `category` VALUES ('5', '空调', '1', null, null, '0', null, null, '5', null);
INSERT INTO `category` VALUES ('6', '手机通讯', '0', null, null, '0', null, null, '5', null);
INSERT INTO `category` VALUES ('7', '手机', '6', null, null, '0', null, '1,2,3,6,7,10', '5', '1');
INSERT INTO `category` VALUES ('8', '对讲机', '6', null, null, '0', null, null, '5', null);
INSERT INTO `category` VALUES ('9', '平板电脑1', '4', null, null, '0', null, null, '5', null);
INSERT INTO `category` VALUES ('10', '平板电脑11', '9', null, null, '0', null, null, '5', null);

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `gallery_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `small_pic` varchar(45) DEFAULT NULL,
  `medium_pic` varchar(45) DEFAULT NULL,
  `big_pic` varchar(45) DEFAULT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gallery_id`),
  KEY `fk_gallery_goods1_idx` (`goods_id`),
  CONSTRAINT `fk_gallery_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`goods_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gallery
-- ----------------------------

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_user_id` int(11) NOT NULL,
  `goods_type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `goods_name` varchar(45) DEFAULT NULL,
  `goods_style_name` varchar(45) DEFAULT NULL,
  `promote_word` varchar(45) DEFAULT '' COMMENT '推广词',
  `goods_sn` varchar(45) DEFAULT NULL COMMENT '商品编号',
  `goods_price` decimal(10,2) unsigned NOT NULL,
  `is_promote` tinyint(1) DEFAULT '1' COMMENT '是否促销',
  `promote_stime` int(11) DEFAULT NULL COMMENT '促销开始时间',
  `promote_etime` int(11) DEFAULT NULL COMMENT '促销结束时间',
  `promote_price` decimal(10,2) unsigned zerofill NOT NULL COMMENT '促销价格',
  `is_hot` tinyint(1) DEFAULT NULL COMMENT '是否热门',
  `is_first` tinyint(1) DEFAULT NULL,
  `is_well` tinyint(1) DEFAULT NULL COMMENT '是否人气',
  `is_on_sale` tinyint(1) DEFAULT NULL COMMENT ' 是否在销售状态',
  `created` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated` int(11) DEFAULT NULL COMMENT '更新时间',
  `view` smallint(6) DEFAULT NULL COMMENT '查看人数',
  `small_pic` varchar(45) DEFAULT NULL COMMENT '小图',
  `medium_pic` varchar(45) DEFAULT NULL,
  `source_pic` varchar(45) DEFAULT NULL COMMENT '原图',
  `sku` smallint(6) DEFAULT NULL COMMENT '库存',
  PRIMARY KEY (`goods_id`),
  KEY `fk_goods_admin1_idx` (`admin_user_id`),
  KEY `fk_goods_goods_type1_idx` (`goods_type_id`),
  KEY `fk_goods_brand1_idx` (`brand_id`),
  KEY `fk_goods_category1_idx` (`category_id`),
  CONSTRAINT `fk_goods_admin1` FOREIGN KEY (`admin_user_id`) REFERENCES `admin` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_goods_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_goods_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_goods_goods_type1` FOREIGN KEY (`goods_type_id`) REFERENCES `goods_type` (`goods_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '1', '1', '1', '7', '1', '1', '', '8920', '100.00', '1', null, null, '00000000.00', null, null, null, null, null, null, null, null, null, null, '100');
INSERT INTO `goods` VALUES ('4', '1', '1', '2', '1', '苹果7', null, '123', '123', '123.00', '1', null, null, '00000000.00', null, null, null, null, null, null, null, null, null, null, '123');
INSERT INTO `goods` VALUES ('5', '1', '1', '3', '7', '苹果8', null, '123', '12', '123.00', '1', null, null, '00000000.00', null, null, null, null, null, null, null, null, null, null, '123');
INSERT INTO `goods` VALUES ('6', '1', '1', '3', '7', '苹果9', null, '123', '123', '123.00', '1', null, null, '00000000.00', null, null, null, null, null, null, null, null, null, null, '123');
INSERT INTO `goods` VALUES ('7', '1', '1', '3', '7', '苹果9', null, '123', '123', '123.00', '1', null, null, '00000000.00', null, null, null, null, null, null, null, null, null, null, '123');

-- ----------------------------
-- Table structure for goods_attr_list
-- ----------------------------
DROP TABLE IF EXISTS `goods_attr_list`;
CREATE TABLE `goods_attr_list` (
  `attr_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_value` varchar(45) DEFAULT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  `goods_attr_id` int(11) NOT NULL,
  PRIMARY KEY (`attr_list_id`),
  KEY `fk_goods_attr_list_goods1_idx` (`goods_id`),
  KEY `fk_goods_attr_list_type_attr1_idx` (`goods_attr_id`),
  CONSTRAINT `fk_goods_attr_list_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`goods_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_goods_attr_list_type_attr1` FOREIGN KEY (`goods_attr_id`) REFERENCES `type_attr` (`goods_attr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_attr_list
-- ----------------------------
INSERT INTO `goods_attr_list` VALUES ('12', '5.6英寸', '7', '1');
INSERT INTO `goods_attr_list` VALUES ('13', '八核', '7', '3');
INSERT INTO `goods_attr_list` VALUES ('14', 'gsm', '7', '6');

-- ----------------------------
-- Table structure for goods_content
-- ----------------------------
DROP TABLE IF EXISTS `goods_content`;
CREATE TABLE `goods_content` (
  `goods_content_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_content` varchar(500) NOT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`goods_content_id`),
  KEY `fk_goods_content_goods1_idx` (`goods_id`),
  CONSTRAINT `fk_goods_content_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`goods_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_content
-- ----------------------------

-- ----------------------------
-- Table structure for goods_type
-- ----------------------------
DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE `goods_type` (
  `goods_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(45) NOT NULL,
  PRIMARY KEY (`goods_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_type
-- ----------------------------
INSERT INTO `goods_type` VALUES ('1', '手机');
INSERT INTO `goods_type` VALUES ('2', '电脑');
INSERT INTO `goods_type` VALUES ('3', '相机');
INSERT INTO `goods_type` VALUES ('4', '珠宝');
INSERT INTO `goods_type` VALUES ('5', '化妆品');
INSERT INTO `goods_type` VALUES ('6', '路由器');
INSERT INTO `goods_type` VALUES ('7', '台灯');
INSERT INTO `goods_type` VALUES ('8', '厨具');
INSERT INTO `goods_type` VALUES ('9', '汽车');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` smallint(5) unsigned NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `goods_sn` varchar(45) DEFAULT NULL,
  `attr_list` varchar(80) DEFAULT NULL COMMENT '规格组合 在attr_list(2g内存 -2 ,红色-3)',
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_goods1_idx` (`goods_id`),
  CONSTRAINT `fk_product_goods1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`goods_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('4', '12', '100.00', '892', '5,1,6', '1');
INSERT INTO `product` VALUES ('5', '13', '120.00', '891', '1,1,5', '1');
INSERT INTO `product` VALUES ('6', '14', '200.00', '890', '7,1,6', '1');
INSERT INTO `product` VALUES ('7', '20', '344.00', '555', '2,1,2', '5');
INSERT INTO `product` VALUES ('8', '123', '123.00', '123', '3,1,2', '7');

-- ----------------------------
-- Table structure for type_attr
-- ----------------------------
DROP TABLE IF EXISTS `type_attr`;
CREATE TABLE `type_attr` (
  `goods_attr_id` int(11) NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(45) NOT NULL,
  `attr_may_value` varchar(300) NOT NULL,
  `attr_type` tinyint(1) NOT NULL,
  `sort` smallint(6) DEFAULT NULL,
  `goods_type_id` int(11) NOT NULL,
  PRIMARY KEY (`goods_attr_id`),
  KEY `fk_type_attr_goods_type_idx` (`goods_type_id`),
  CONSTRAINT `fk_type_attr_goods_type` FOREIGN KEY (`goods_type_id`) REFERENCES `goods_type` (`goods_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type_attr
-- ----------------------------
INSERT INTO `type_attr` VALUES ('1', '屏幕尺寸', '5.6 英寸及以上\r\n5.5-5.1 英寸\r\n5.0-4.6 英寸\r\n4.5-3.1 英寸\r\n其他\r\n3.0 英寸及以下', '0', '1', '1');
INSERT INTO `type_attr` VALUES ('2', '操作系统', 'android\r\nios\r\nwphone', '0', '2', '1');
INSERT INTO `type_attr` VALUES ('3', 'cpu', '十核\r\n八核\r\n双四核\r\n四核\r\n双核\r\n单核\r\n无\r\n其他', '0', '5', '1');
INSERT INTO `type_attr` VALUES ('4', '手机价格', '0-499\r\n500-999\r\n1000-1699\r\n1700-2799\r\n2800-4499\r\n4500-11999\r\n12000以上', '0', '5', '1');
INSERT INTO `type_attr` VALUES ('5', '套餐', '套餐一\r\n套餐二\r\n套餐三\r\n套餐四\r\n套餐五\r\n套餐六', '1', '8', '1');
INSERT INTO `type_attr` VALUES ('6', '网络制式', 'GSM\r\nWCDMA\r\nTD-SCDMA', '1', '10', '1');
INSERT INTO `type_attr` VALUES ('7', '颜色', '红色\r\n蓝色\r\n粉红色\r\n绿色', '1', '11', '1');
INSERT INTO `type_attr` VALUES ('10', '电池容量', '1200mAh 以下\r\n1200mAh-1999mAh\r\n2000mAh-2999mAh\r\n3000mAh-3999mAh\r\n4000mAh-5999mAh\r\n6000mAh 及以上', '0', '2', '1');
INSERT INTO `type_attr` VALUES ('11', '内存容量', '2G\r\n4G\r\n8G\r\n16G\r\n32G\r\n其他', '0', '1', '2');
INSERT INTO `type_attr` VALUES ('12', '硬盘容量', '640GB\r\n512GB\r\n500GB\r\n320GB\r\n256GB\r\n250GB\r\n240GB\r\n160GB\r\n120GB\r\n80GB\r\n60GB\r\n32G\r\n4TB\r\n3TB\r\n2TB\r\n1.5TB\r\n1TB', '0', '1', '2');
INSERT INTO `type_attr` VALUES ('13', '芯片类型', 'GTX 1050\r\nGTX 1080\r\n', '0', '2', '2');
INSERT INTO `type_attr` VALUES ('14', '显卡', '独立显卡\r\n集成显卡\r\n核芯显卡\r\n双显卡', '0', '5', '2');
