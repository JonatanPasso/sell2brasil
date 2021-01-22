/*
 Navicat Premium Data Transfer

 Source Server         : sellbrasilcrud
 Source Server Type    : MySQL
 Source Server Version : 100500
 Source Host           : localhost:3306
 Source Schema         : sellbrasil

 Target Server Type    : MySQL
 Target Server Version : 100500
 File Encoding         : 65001

 Date: 22/01/2021 00:51:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sell_pessoas
-- ----------------------------
DROP TABLE IF EXISTS `sell_pessoas`;
CREATE TABLE `sell_pessoas`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sobrenome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `endereco` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cidade` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `estado` char(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cep` char(8) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sell_pessoas
-- ----------------------------
INSERT INTO `sell_pessoas` VALUES (3, 'Marya Clara', 'Brandão', 'mariaclara.c@gmail.com', 'Rua teste', 'Maceió', 'GO', '52412533', '2021-01-22 01:54:37', '2021-01-22 01:54:37');
INSERT INTO `sell_pessoas` VALUES (4, 'Ana Carolina', 'Brandão', 'ana.branda@gmail.com', 'teste', 'Maceió', 'AL', '5252222', '2021-01-22 01:55:23', '2021-01-22 01:55:23');

SET FOREIGN_KEY_CHECKS = 1;
