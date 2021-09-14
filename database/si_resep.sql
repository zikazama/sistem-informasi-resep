/*
 Navicat Premium Data Transfer

 Source Server         : xampp mysql
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : si_resep

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 15/09/2021 05:40:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for assign_bahan
-- ----------------------------
DROP TABLE IF EXISTS `assign_bahan`;
CREATE TABLE `assign_bahan`  (
  `id_assign_bahan` int NOT NULL AUTO_INCREMENT,
  `id_resep` int NULL DEFAULT NULL,
  `id_bahan_makanan` int NULL DEFAULT NULL,
  `kuantitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_assign_bahan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assign_bahan
-- ----------------------------
INSERT INTO `assign_bahan` VALUES (3, 3, 4, '1 buah');
INSERT INTO `assign_bahan` VALUES (4, 3, 5, '2 buah');
INSERT INTO `assign_bahan` VALUES (5, 3, 6, 'secukupnya');
INSERT INTO `assign_bahan` VALUES (6, 3, 7, '5 siung');
INSERT INTO `assign_bahan` VALUES (7, 3, 8, '5 siung');
INSERT INTO `assign_bahan` VALUES (8, 3, 9, 'secukupnya');
INSERT INTO `assign_bahan` VALUES (9, 3, 10, '5 helai');
INSERT INTO `assign_bahan` VALUES (10, 3, 11, 'secukupnya');
INSERT INTO `assign_bahan` VALUES (11, 3, 12, 'secukupnya');

-- ----------------------------
-- Table structure for bahan_makanan
-- ----------------------------
DROP TABLE IF EXISTS `bahan_makanan`;
CREATE TABLE `bahan_makanan`  (
  `id_bahan_makanan` int NOT NULL AUTO_INCREMENT,
  `nama_bahan_makanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_bahan_makanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bahan_makanan
-- ----------------------------
INSERT INTO `bahan_makanan` VALUES (4, 'Piring');
INSERT INTO `bahan_makanan` VALUES (5, 'Telor');
INSERT INTO `bahan_makanan` VALUES (6, 'Minyak');
INSERT INTO `bahan_makanan` VALUES (7, 'Bawang Merah');
INSERT INTO `bahan_makanan` VALUES (8, 'Bawang Putih');
INSERT INTO `bahan_makanan` VALUES (9, 'Ayam');
INSERT INTO `bahan_makanan` VALUES (10, 'Sayur Cesim');
INSERT INTO `bahan_makanan` VALUES (11, 'Kecap');
INSERT INTO `bahan_makanan` VALUES (12, 'Garam');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Main Course');
INSERT INTO `kategori` VALUES (2, 'Appertize');
INSERT INTO `kategori` VALUES (3, 'Desert');

-- ----------------------------
-- Table structure for resep
-- ----------------------------
DROP TABLE IF EXISTS `resep`;
CREATE TABLE `resep`  (
  `id_resep` int NOT NULL AUTO_INCREMENT,
  `nama_resep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kategori` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_resep`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resep
-- ----------------------------
INSERT INTO `resep` VALUES (3, 'Nasi Goreng', 1);

SET FOREIGN_KEY_CHECKS = 1;
