/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : dc

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 01/03/2019 11:55:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dc_admin
-- ----------------------------
DROP TABLE IF EXISTS `dc_admin`;
CREATE TABLE `dc_admin`  (
  `id` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'id',
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户名',
  `pass` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dc_admin
-- ----------------------------
INSERT INTO `dc_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for dc_cd
-- ----------------------------
DROP TABLE IF EXISTS `dc_cd`;
CREATE TABLE `dc_cd`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fl` int(10) NOT NULL COMMENT '菜单所属分类',
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单名字',
  `money` float(10, 0) NULL DEFAULT NULL COMMENT '单价',
  `pic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片url',
  `info` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '介绍',
  `push` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '是否推荐',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dc_cd
-- ----------------------------
INSERT INTO `dc_cd` VALUES (1, 4, '北京烤鸭', 34, 'upload/img_15513759734494.jpg', '地道北京味', '0');
INSERT INTO `dc_cd` VALUES (2, 3, '红烧排骨', 16, 'upload/img_15513761994506.jpg', '鲜嫩多汁', '1');
INSERT INTO `dc_cd` VALUES (3, 2, '青菜豆腐汤', 8, 'upload/img_15513762315592.jpg', '好喝不腻', '1');
INSERT INTO `dc_cd` VALUES (4, 3, '红烧鸡公', 33, 'upload/img_15513762719728.jpg', '吃哪儿补哪儿', '0');
INSERT INTO `dc_cd` VALUES (5, 2, '紫菜蛋花汤', 7, 'upload/img_15513763134735.jpg', '海的味道', '0');
INSERT INTO `dc_cd` VALUES (6, 5, '青椒回锅肉', 16, 'upload/img_15513763482043.jpg', '肥而不腻', '0');
INSERT INTO `dc_cd` VALUES (7, 5, '青椒肉丝', 15, 'upload/img_15513763743293.jpg', '爽口不辣', '0');
INSERT INTO `dc_cd` VALUES (8, 6, '东坡肉', 20, 'upload/img_15513764014902.jpg', '看着就饱了', '0');
INSERT INTO `dc_cd` VALUES (9, 5, '糕点鱼', 56, 'upload/img_15513764351231.jpg', '鱼做的点心', '0');
INSERT INTO `dc_cd` VALUES (10, 2, '辣子鸡', 12, 'upload/img_15513770318266.jpg', '啦啦啦啦', '0');

-- ----------------------------
-- Table structure for dc_dp
-- ----------------------------
DROP TABLE IF EXISTS `dc_dp`;
CREATE TABLE `dc_dp`  (
  `id` int(10) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pic` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dc_dp
-- ----------------------------
INSERT INTO `dc_dp` VALUES (1, '北京烤鸭', 'upload/dpimg_15513756439913.jpg', '请尽快点餐，以便于为您尽快出餐！');

-- ----------------------------
-- Table structure for dc_fl
-- ----------------------------
DROP TABLE IF EXISTS `dc_fl`;
CREATE TABLE `dc_fl`  (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '分类名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dc_fl
-- ----------------------------
INSERT INTO `dc_fl` VALUES (1, '素菜类');
INSERT INTO `dc_fl` VALUES (2, '汤类');
INSERT INTO `dc_fl` VALUES (3, '烧菜');
INSERT INTO `dc_fl` VALUES (4, '凉拌菜');
INSERT INTO `dc_fl` VALUES (5, '糕点');
INSERT INTO `dc_fl` VALUES (6, '主食');

-- ----------------------------
-- Table structure for dc_order
-- ----------------------------
DROP TABLE IF EXISTS `dc_order`;
CREATE TABLE `dc_order`  (
  `id` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单号',
  `num` int(10) NOT NULL COMMENT '桌号',
  `info` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '订单内容json',
  `money` float(100, 0) NOT NULL DEFAULT 0 COMMENT '总价格',
  `pnum` int(10) NOT NULL COMMENT '人数',
  `time` date NOT NULL COMMENT '时间',
  `succ` bit(1) NOT NULL DEFAULT b'0' COMMENT '是否完成',
  `zj` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '追加订单号',
  `zjsu` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `zj`(`zj`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dc_order
-- ----------------------------
INSERT INTO `dc_order` VALUES ('1551379866112770921', 4, '{\"红烧鸡公\":1,\"红烧排骨\":1,\"紫菜蛋花汤\":1}', 56, 3, '2019-03-01', b'1', '1551379894437085138', b'0');
INSERT INTO `dc_order` VALUES ('1551410898516444958', 3, '{\"青菜豆腐汤\":1,\"红烧排骨\":1,\"紫菜蛋花汤\":1}', 31, 3, '2019-03-01', b'0', '1551410971406732887', b'0');
INSERT INTO `dc_order` VALUES ('1551379468717421884', 3, '{\"红烧鸡公\":2,\"辣子鸡\":1,\"紫菜蛋花汤\":1,\"糕点鱼\":1}', 141, 4, '2019-03-01', b'1', '1551379527401947604', b'0');
INSERT INTO `dc_order` VALUES ('1551376785157755363', 0, '{\"青菜豆腐汤\":1,\"青椒回锅肉\":1,\"东坡肉\":1,\"红烧排骨\":1}', 60, 2, '2019-03-01', b'1', '0', b'1');
INSERT INTO `dc_order` VALUES ('1551376846346146369', 0, '{\"北京烤鸭\":1,\"红烧排骨\":1,\"青菜豆腐汤\":1,\"青椒肉丝\":1,\"东坡肉\":1}', 93, 2, '2019-03-01', b'1', '0', b'1');

-- ----------------------------
-- Table structure for dc_qrcode
-- ----------------------------
DROP TABLE IF EXISTS `dc_qrcode`;
CREATE TABLE `dc_qrcode`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dc_qrcode
-- ----------------------------
INSERT INTO `dc_qrcode` VALUES (1, 'upload/qrcode_15513754632521.jpg');

-- ----------------------------
-- Table structure for dc_zj
-- ----------------------------
DROP TABLE IF EXISTS `dc_zj`;
CREATE TABLE `dc_zj`  (
  `id` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `money` float(100, 0) NULL DEFAULT 0,
  `time` datetime NULL DEFAULT NULL,
  `succ` bit(1) NULL DEFAULT b'0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dc_zj
-- ----------------------------
INSERT INTO `dc_zj` VALUES ('1551379894437085138', '{\"红烧排骨\":1}', 16, '2019-03-01 00:00:00', b'0');
INSERT INTO `dc_zj` VALUES ('1551379527401947604', '{\"红烧鸡公\":1}', 33, '2019-03-01 00:00:00', b'0');
INSERT INTO `dc_zj` VALUES ('1551410971406732887', '{\"青椒回锅肉\":1}', 16, '2019-03-01 00:00:00', b'0');

SET FOREIGN_KEY_CHECKS = 1;
