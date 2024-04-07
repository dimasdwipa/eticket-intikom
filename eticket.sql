/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : eticket

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 27/03/2023 10:35:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for complains
-- ----------------------------
DROP TABLE IF EXISTS `complains`;
CREATE TABLE `complains`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'complain',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supervisor_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `sla_request` timestamp NULL DEFAULT NULL,
  `sla_request_end` timestamp NULL DEFAULT NULL,
  `approve` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'await',
  `close_request` timestamp NULL DEFAULT NULL,
  `extend_SLA` int(11) NULL DEFAULT NULL,
  `extend_response_SLA` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 203 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of complains
-- ----------------------------
INSERT INTO `complains` VALUES (1, 1, 1, NULL, 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'Anti Virus', 'Open Ticket', '2023-03-16 10:10:35', '2023-03-16 10:10:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (2, 2, 1, NULL, 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'PC/Laptop Problem', 'Open Ticket', '2023-03-16 10:10:35', '2023-03-16 10:10:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (3, 3, 1, NULL, 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'Activation Office', 'Open Ticket', '2023-03-16 10:10:35', '2023-03-16 10:10:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (4, 4, 1, NULL, 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'PC/Laptop Problem', 'Open Ticket', '2023-03-16 10:10:35', '2023-03-16 10:10:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (5, 1, NULL, 4, 'Give assignment to agent', NULL, 'Assignment', '2023-03-16 10:13:42', '2023-03-16 10:13:42', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (6, 2, NULL, 4, 'Give assignment to agent', NULL, 'Assignment', '2023-03-16 10:14:36', '2023-03-16 10:14:36', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (7, 3, NULL, 2, 'Give assignment to agent', NULL, 'Assignment', '2023-03-16 10:16:42', '2023-03-16 10:16:42', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (8, 1, NULL, 4, 'Ada urgent Tiket', NULL, 'Unable Respond', '2023-03-16 10:25:45', '2023-03-16 10:27:41', NULL, NULL, NULL, 'aproved', NULL, NULL, 60);
INSERT INTO `complains` VALUES (9, 1, NULL, NULL, 'Request aproved with supervisor', 'Unable Respond', 'Request Aprovel', '2023-03-16 10:27:41', '2023-03-16 10:27:41', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (10, 1, NULL, 4, 'I will do this task now', NULL, 'Response', '2023-03-16 10:30:50', '2023-03-16 10:30:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (11, 2, NULL, 4, 'I will do this task now', NULL, 'Response', '2023-03-16 10:32:37', '2023-03-16 10:32:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (12, 1, NULL, 4, 'Karena butuh Ram', NULL, 'Request Repair', '2023-03-16 10:33:23', '2023-03-16 10:35:58', NULL, '2023-03-16 10:32:37', '2023-03-16 10:32:00', 'aproved', NULL, NULL, NULL);
INSERT INTO `complains` VALUES (13, 2, NULL, 4, 'test', NULL, 'Request Pending', '2023-03-16 10:34:55', '2023-03-16 10:36:03', NULL, '2023-03-16 10:34:39', NULL, 'aproved', NULL, NULL, NULL);
INSERT INTO `complains` VALUES (14, 1, NULL, NULL, 'Request aproved with supervisor', 'Request Repair', 'Request Aprovel', '2023-03-16 10:35:58', '2023-03-16 10:35:58', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (15, 2, NULL, NULL, 'Request aproved with supervisor', 'Request Pending', 'Request Aprovel', '2023-03-16 10:36:03', '2023-03-16 10:36:03', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (16, 2, NULL, 4, 'I will continue this ticket nowxcxc', NULL, 'complain', '2023-03-16 10:38:18', '2023-03-16 10:38:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (17, 2, NULL, 4, 'test', NULL, 'Extend SLA', '2023-03-16 10:40:46', '2023-03-16 10:41:22', NULL, NULL, NULL, 'aproved', NULL, 1440, NULL);
INSERT INTO `complains` VALUES (18, 2, NULL, NULL, 'Request aproved with supervisor', 'Extend SLA', 'Request Aprovel', '2023-03-16 10:41:22', '2023-03-16 10:41:22', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (19, 2, NULL, 4, 'udah nih tolong bitangnya', NULL, 'Resolved', '2023-03-16 10:50:39', '2023-03-16 10:50:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (20, 2, 1, NULL, 'Wah Belum nih', NULL, 'Complain', '2023-03-16 10:53:56', '2023-03-16 10:53:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (21, 2, NULL, 4, 'mas user nya', NULL, 'Request Close', '2023-03-16 10:55:48', '2023-03-16 10:56:49', NULL, NULL, NULL, 'aproved', '2023-03-16 10:54:16', NULL, NULL);
INSERT INTO `complains` VALUES (22, 2, NULL, NULL, 'Request aproved with supervisor', 'Request Close', 'Request Aprovel', '2023-03-16 10:56:49', '2023-03-16 10:56:49', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (23, 1, NULL, 1, 'Give task to agent', NULL, 'Assignment', '2023-03-16 12:05:57', '2023-03-16 12:05:57', 1, NULL, NULL, 'await', NULL, NULL, NULL);
INSERT INTO `complains` VALUES (24, 21, NULL, 2, 'asdasd', 'Give task to agent', 'Assignment', '2023-03-16 12:19:21', '2023-03-16 12:19:21', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (25, 22, NULL, 2, 'Data', 'Give task to agent', 'Assignment', '2023-03-16 12:20:01', '2023-03-16 12:20:01', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (27, 24, NULL, 2, 'Data', 'Give task to agent', 'Assignment', '2023-03-16 12:20:47', '2023-03-16 12:20:47', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (28, 25, NULL, 2, 'asd', 'Give task to agent', 'Assignment', '2023-03-16 12:21:52', '2023-03-16 12:21:52', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (29, 26, NULL, 2, 'Complain', 'Give task to agent', 'Assignment', '2023-03-16 12:22:44', '2023-03-16 12:22:44', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (30, 27, NULL, 2, 'asd', 'Give task to agent', 'Assignment', '2023-03-16 12:22:44', '2023-03-16 12:22:44', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (31, 28, NULL, 5, 'asd', 'Give task to agent', 'Assignment', '2023-03-16 12:23:25', '2023-03-16 12:23:25', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (32, 29, NULL, 5, 'asdasd', 'Give task to agent', 'Assignment', '2023-03-16 12:23:25', '2023-03-16 12:23:25', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (33, 30, NULL, 4, 'Serialization of \'Closure\' is not allowed', 'Give task to agent', 'Assignment', '2023-03-16 12:27:00', '2023-03-16 12:27:00', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (34, 31, NULL, 4, 'asd', 'Give task to agent', 'Assignment', '2023-03-16 12:27:25', '2023-03-16 12:27:25', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (35, 32, NULL, 4, 'asd', 'Give task to agent', 'Assignment', '2023-03-16 12:27:25', '2023-03-16 12:27:25', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (36, 33, 1, NULL, 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'PC/Laptop Problem', 'Open Ticket', '2023-03-16 13:37:37', '2023-03-16 13:37:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (37, 31, NULL, 4, 'I will do this task now', NULL, 'Response', '2023-03-17 15:10:33', '2023-03-17 15:10:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (38, 32, NULL, 4, 'I will do this task now', NULL, 'Response', '2023-03-20 16:10:16', '2023-03-20 16:10:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (39, 32, NULL, 4, 'oke', NULL, 'Resolved', '2023-03-20 16:10:25', '2023-03-20 16:10:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (40, 32, NULL, NULL, 'CLose by system', 'Close Ticket #16789444451 on 2023-03-20 16:35:31', 'Closed', '2023-03-20 16:35:31', '2023-03-20 16:35:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (41, 30, NULL, 4, 'I will do this task now', NULL, 'Response', '2023-03-20 18:18:57', '2023-03-20 18:18:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (42, 30, NULL, 4, 'Sudah Oke', NULL, 'Resolved', '2023-03-20 18:19:06', '2023-03-20 18:19:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (74, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 18:41:50', 'Closed', '2023-03-20 18:41:50', '2023-03-20 18:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (75, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 18:52:29', 'Closed', '2023-03-20 18:52:29', '2023-03-20 18:52:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (76, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 18:56:38', 'Closed', '2023-03-20 18:56:38', '2023-03-20 18:56:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (91, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:04:07', 'Closed', '2023-03-20 19:04:07', '2023-03-20 19:04:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (94, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:08:11', 'Closed', '2023-03-20 19:08:11', '2023-03-20 19:08:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (95, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:09:36', 'Closed', '2023-03-20 19:09:36', '2023-03-20 19:09:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (96, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:12:49', 'Closed', '2023-03-20 19:12:49', '2023-03-20 19:12:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (97, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:15:28', 'Closed', '2023-03-20 19:15:28', '2023-03-20 19:15:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (106, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:38:12', 'Closed', '2023-03-20 19:38:12', '2023-03-20 19:38:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (111, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:41:53', 'Closed', '2023-03-20 19:41:53', '2023-03-20 19:41:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (112, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:55:50', 'Closed', '2023-03-20 19:55:50', '2023-03-20 19:55:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (113, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:57:52', 'Closed', '2023-03-20 19:57:52', '2023-03-20 19:57:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (114, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 19:59:23', 'Closed', '2023-03-20 19:59:23', '2023-03-20 19:59:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (115, 30, NULL, NULL, 'CLose by system', 'Close Ticket #16789444200 on 2023-03-20 23:13:53', 'Closed', '2023-03-20 23:13:53', '2023-03-20 23:13:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (116, 34, 5, NULL, 'Ticket Hari Ini', 'Anti Virus x', 'Open Ticket', '2023-03-21 12:19:10', '2023-03-21 12:19:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (117, 34, NULL, 4, 'Give assignment to agent', NULL, 'Assignment', '2023-03-21 12:44:23', '2023-03-21 12:44:23', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (118, 33, NULL, 4, 'Give assignment to agent', NULL, 'Assignment', '2023-03-21 12:44:32', '2023-03-21 12:44:32', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (119, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:46:55', '2023-03-21 12:46:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (120, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:48:06', '2023-03-21 12:48:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (121, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:48:50', '2023-03-21 12:48:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (122, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:49:28', '2023-03-21 12:49:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (123, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:49:56', '2023-03-21 12:49:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (124, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:50:04', '2023-03-21 12:50:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (125, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:50:27', '2023-03-21 12:50:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (126, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:50:47', '2023-03-21 12:50:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (127, 33, 1, NULL, 'Test', NULL, 'Complain', '2023-03-21 12:51:16', '2023-03-21 12:51:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (128, 33, 1, NULL, 'asdasdasd', NULL, 'Complain', '2023-03-21 13:00:11', '2023-03-21 13:00:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (129, 33, 1, NULL, 'ty', NULL, 'Cancel', '2023-03-21 13:16:28', '2023-03-21 13:16:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (130, 3, 1, NULL, 'mask', NULL, 'Closed', '2023-03-21 13:19:53', '2023-03-21 13:19:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (131, 4, NULL, 4, 'Give assignment to agent', NULL, 'Assignment', '2023-03-21 13:22:51', '2023-03-21 13:22:51', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (132, 34, NULL, 4, 'I will do this task now', NULL, 'Response', '2023-03-21 13:23:21', '2023-03-21 13:23:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (133, 35, 1, NULL, 'asd', 'Anti Virus x', 'Open Ticket', '2023-03-21 13:37:00', '2023-03-21 13:37:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (134, 35, 1, NULL, 'tolong segra ditangani', NULL, 'Complain', '2023-03-21 13:37:30', '2023-03-21 13:37:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (135, 35, 1, NULL, 'tolong segra ditangani', NULL, 'Complain', '2023-03-21 13:38:05', '2023-03-21 13:38:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (136, 35, 1, NULL, 'asdasd', NULL, 'Complain', '2023-03-21 13:40:31', '2023-03-21 13:40:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (137, 35, 1, NULL, 'asdasdasd', NULL, 'Complain', '2023-03-21 13:42:40', '2023-03-21 13:42:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (138, 35, 1, NULL, 'asdasdasd', NULL, 'Complain', '2023-03-21 13:42:59', '2023-03-21 13:42:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (139, 35, 1, NULL, 'asdasdads', NULL, 'Complain', '2023-03-21 13:44:35', '2023-03-21 13:44:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (140, 35, 1, NULL, 'asdasdads', NULL, 'Complain', '2023-03-21 13:45:05', '2023-03-21 13:45:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (141, 35, 1, NULL, 'asdasdads', NULL, 'Complain', '2023-03-21 13:45:22', '2023-03-21 13:45:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (142, 35, 1, NULL, 'asdasdads', NULL, 'Complain', '2023-03-21 13:47:14', '2023-03-21 13:47:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (143, 35, 1, NULL, 'asdasdads', NULL, 'Complain', '2023-03-21 13:47:41', '2023-03-21 13:47:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (144, 35, 1, NULL, 'lama', NULL, 'Cancel', '2023-03-21 13:48:19', '2023-03-21 13:48:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (145, 35, 1, NULL, 'lama ya', NULL, 'Complain', '2023-03-21 13:54:20', '2023-03-21 13:54:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (146, 35, 1, NULL, 'caled aja', NULL, 'Canceled', '2023-03-21 13:54:35', '2023-03-21 13:54:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (147, 35, 1, NULL, 'asdasd', NULL, 'Canceled', '2023-03-21 13:56:40', '2023-03-21 13:56:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (148, 35, 1, NULL, 'cancel', NULL, 'Canceled', '2023-03-21 13:57:41', '2023-03-21 13:57:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (149, 35, 1, NULL, 'cancel', NULL, 'Canceled', '2023-03-21 13:57:52', '2023-03-21 13:57:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (150, 35, 1, NULL, 'cancel', NULL, 'Canceled', '2023-03-21 13:58:12', '2023-03-21 13:58:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (151, 35, 1, NULL, 'cancel', NULL, 'Canceled', '2023-03-21 13:58:48', '2023-03-21 13:58:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (152, 35, 1, NULL, 'cancel', NULL, 'Canceled', '2023-03-21 13:59:19', '2023-03-21 13:59:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (153, 35, 1, NULL, 'cancel', NULL, 'Canceled', '2023-03-21 13:59:33', '2023-03-21 13:59:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (154, 4, 1, NULL, 'asdad', NULL, 'Complain', '2023-03-21 14:00:44', '2023-03-21 14:00:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (155, 4, 1, NULL, 'asd', NULL, 'Closed', '2023-03-21 14:01:42', '2023-03-21 14:01:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (156, 36, 1, NULL, 'Testing 1', 'PC/Laptop Problem', 'Open Ticket', '2023-03-21 15:26:04', '2023-03-21 15:26:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (157, 37, 1, NULL, 'testing 2', 'PC/Laptop Problem', 'Open Ticket', '2023-03-21 15:26:04', '2023-03-21 15:26:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (158, 38, 1, NULL, 'Testing 3', 'Activation Office', 'Open Ticket', '2023-03-21 15:26:04', '2023-03-21 15:26:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (159, 39, 1, NULL, 'Testing 4', 'PC/Laptop Problem', 'Open Ticket', '2023-03-21 15:26:04', '2023-03-21 15:26:04', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (174, 36, NULL, 4, 'Give assignment to agent', NULL, 'Assignment', '2023-03-21 16:31:27', '2023-03-21 16:31:27', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (175, 40, NULL, 4, 'SIAP', 'Give task to agent', 'Assignment', '2023-03-21 16:33:13', '2023-03-21 16:33:13', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (176, 41, NULL, 4, 'Siap', 'Give task to agent', 'Assignment', '2023-03-21 16:34:11', '2023-03-21 16:34:11', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (177, 42, NULL, 2, 'Oke', 'Give task to agent', 'Assignment', '2023-03-21 16:34:14', '2023-03-21 16:34:14', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (178, 36, NULL, 4, 'I will do this task now', NULL, 'Response', '2023-03-21 16:35:35', '2023-03-21 16:35:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (179, 40, NULL, 4, 'masih bnyak kerjaan', 'masih bnyak kerjaan', 'Unable Respond', '2023-03-21 17:29:05', '2023-03-21 17:29:05', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (180, 40, NULL, 4, 'masih bnyak kerjaan', 'masih bnyak kerjaan', 'Unable Respond', '2023-03-21 17:29:42', '2023-03-21 17:29:42', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (181, 40, NULL, 4, 'masih bnyak kerjaan', 'masih bnyak kerjaan', 'Unable Respond', '2023-03-21 17:30:45', '2023-03-21 17:30:45', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (182, 40, NULL, 4, 'masih bnyak kerjaan', 'masih bnyak kerjaan', 'Unable Respond', '2023-03-21 17:31:00', '2023-03-21 17:31:00', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (183, 40, NULL, 4, 'masih bnyak kerjaan', 'masih bnyak kerjaan', 'Unable Respond', '2023-03-21 17:32:47', '2023-03-21 17:32:47', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (184, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:33:25', '2023-03-21 17:33:25', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (185, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:35:10', '2023-03-21 17:35:10', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (186, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:36:10', '2023-03-21 17:36:10', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (187, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:36:22', '2023-03-21 17:36:22', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (188, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:36:38', '2023-03-21 17:36:38', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (189, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:37:07', '2023-03-21 17:37:07', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (190, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:37:53', '2023-03-21 17:37:53', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (191, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:38:30', '2023-03-21 17:38:30', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (192, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:38:44', '2023-03-21 17:38:44', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (193, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:40:47', '2023-03-21 17:40:47', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (194, 41, NULL, 4, 'full', 'full', 'Unable Respond', '2023-03-21 17:41:43', '2023-03-21 17:41:43', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (195, 41, NULL, 4, 'data', 'data', 'Unable Respond', '2023-03-21 17:42:50', '2023-03-21 17:42:50', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (196, 41, NULL, 4, 'data', 'data', 'Unable Respond', '2023-03-21 17:43:26', '2023-03-21 17:43:26', NULL, NULL, NULL, 'await', NULL, NULL, 60);
INSERT INTO `complains` VALUES (197, 41, NULL, 4, 'Minta Penambhan Waktu', 'Minta Penambhan Waktu', 'Unable Respond', '2023-03-21 17:50:58', '2023-03-21 18:04:22', NULL, NULL, NULL, 'aproved', NULL, NULL, 60);
INSERT INTO `complains` VALUES (198, 40, NULL, 4, 'OKe', 'Data', 'Unable Respond', '2023-03-21 17:52:29', '2023-03-21 18:00:00', NULL, NULL, NULL, 'rejected', NULL, NULL, 60);
INSERT INTO `complains` VALUES (199, 36, NULL, 4, 'test', 'test', 'Request Repair', '2023-03-21 17:55:15', '2023-03-21 17:59:50', NULL, '2023-03-21 17:52:33', '2023-03-21 17:55:00', 'aproved', NULL, NULL, NULL);
INSERT INTO `complains` VALUES (200, 36, NULL, NULL, 'Request aproved with supervisor', 'Request Repair', 'Request Aprovel', '2023-03-21 17:59:50', '2023-03-21 17:59:50', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (201, 40, NULL, NULL, 'Request rejected with supervisor', 'Unable Respond', 'Request Rejected', '2023-03-21 18:00:00', '2023-03-21 18:00:00', 3, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `complains` VALUES (202, 41, NULL, NULL, 'Request aproved with supervisor', 'Unable Respond', 'Request Aprovel', '2023-03-21 18:04:22', '2023-03-21 18:04:22', 3, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for kategoris
-- ----------------------------
DROP TABLE IF EXISTS `kategoris`;
CREATE TABLE `kategoris`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategoris
-- ----------------------------
INSERT INTO `kategoris` VALUES (1, 'Software X', '2023-03-06 08:42:23', '2023-03-16 11:22:52');
INSERT INTO `kategoris` VALUES (2, 'Hardware', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `kategoris` VALUES (3, 'Office 465', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `kategoris` VALUES (4, 'Printer', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `kategoris` VALUES (5, 'Network', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `kategoris` VALUES (6, 'Other x', '2023-03-16 11:19:36', '2023-03-16 11:20:19');
INSERT INTO `kategoris` VALUES (7, 'Cataogry 1', '2023-03-21 19:04:16', '2023-03-21 19:04:16');
INSERT INTO `kategoris` VALUES (8, 'Cataogry 2', '2023-03-21 19:14:41', '2023-03-21 19:14:41');
INSERT INTO `kategoris` VALUES (9, 'asdasd asd', '2023-03-21 19:24:34', '2023-03-21 19:37:34');

-- ----------------------------
-- Table structure for logs
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `log_date` datetime NOT NULL,
  `table_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `log_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 193 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of logs
-- ----------------------------
INSERT INTO `logs` VALUES (1, 4, '2023-03-17 15:08:18', 'users', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (2, 4, '2023-03-17 15:10:33', 'tickets', 'edit', '{\"id\":31,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":3,\"tanggal\":\"2023-03-16\",\"problem\":\"asd\",\"state\":\"Request Feedback\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 12:27:25\",\"updated_at\":\"2023-03-16 12:27:25\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-16 12:27:25\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789444450\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (3, 4, '2023-03-17 15:10:33', 'complains', 'create', '{\"ticket_id\":\"31\",\"agent_id\":4,\"comment\":\"I will do this task now\",\"note\":null,\"status\":\"Response\",\"approve\":null,\"updated_at\":\"2023-03-17T08:10:33.000000Z\",\"created_at\":\"2023-03-17T08:10:33.000000Z\",\"id\":37}');
INSERT INTO `logs` VALUES (4, 4, '2023-03-20 14:32:38', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (5, 3, '2023-03-20 14:42:07', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (6, 4, '2023-03-20 16:10:04', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (7, 4, '2023-03-20 16:10:16', 'tickets', 'edit', '{\"id\":32,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":3,\"tanggal\":\"2023-03-16\",\"problem\":\"asd\",\"state\":\"Request Feedback\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 12:27:25\",\"updated_at\":\"2023-03-16 12:27:25\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-16 12:27:25\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789444451\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (8, 4, '2023-03-20 16:10:16', 'complains', 'create', '{\"ticket_id\":\"32\",\"agent_id\":4,\"comment\":\"I will do this task now\",\"note\":null,\"status\":\"Response\",\"approve\":null,\"updated_at\":\"2023-03-20T09:10:16.000000Z\",\"created_at\":\"2023-03-20T09:10:16.000000Z\",\"id\":38}');
INSERT INTO `logs` VALUES (9, 4, '2023-03-20 16:10:25', 'tickets', 'edit', '{\"id\":32,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":3,\"tanggal\":\"2023-03-16\",\"problem\":\"asd\",\"state\":\"Request Feedback\",\"status\":\"On Progress\",\"prioritas\":\"normal\",\"estimation_date\":\"2023-03-20 17:10:16\",\"resolved_date\":null,\"created_at\":\"2023-03-16 12:27:25\",\"updated_at\":\"2023-03-20 16:10:16\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-16 12:27:25\",\"sla_respone\":\"2023-03-20 16:10:16\",\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789444451\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (10, 4, '2023-03-20 16:10:25', 'complains', 'create', '{\"ticket_id\":\"32\",\"agent_id\":4,\"comment\":\"oke\",\"note\":null,\"status\":\"Resolved\",\"approve\":null,\"updated_at\":\"2023-03-20T09:10:25.000000Z\",\"created_at\":\"2023-03-20T09:10:25.000000Z\",\"id\":39}');
INSERT INTO `logs` VALUES (11, 4, '2023-03-20 18:18:57', 'tickets', 'edit', '{\"id\":30,\"lokasi_id\":1,\"katagori_id\":4,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":3,\"tanggal\":\"2023-03-16\",\"problem\":\"Serialization of \'Closure\' is not allowed\",\"state\":\"Request Feedback\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 12:27:00\",\"updated_at\":\"2023-03-16 12:27:00\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-16 12:27:00\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789444200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (12, 4, '2023-03-20 18:18:57', 'complains', 'create', '{\"ticket_id\":\"30\",\"agent_id\":4,\"comment\":\"I will do this task now\",\"note\":null,\"status\":\"Response\",\"approve\":null,\"updated_at\":\"2023-03-20T11:18:57.000000Z\",\"created_at\":\"2023-03-20T11:18:57.000000Z\",\"id\":41}');
INSERT INTO `logs` VALUES (13, 4, '2023-03-20 18:19:06', 'tickets', 'edit', '{\"id\":30,\"lokasi_id\":1,\"katagori_id\":4,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":3,\"tanggal\":\"2023-03-16\",\"problem\":\"Serialization of \'Closure\' is not allowed\",\"state\":\"Request Feedback\",\"status\":\"On Progress\",\"prioritas\":\"normal\",\"estimation_date\":\"2023-03-20 19:18:57\",\"resolved_date\":null,\"created_at\":\"2023-03-16 12:27:00\",\"updated_at\":\"2023-03-20 18:18:57\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-16 12:27:00\",\"sla_respone\":\"2023-03-20 18:18:57\",\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789444200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (14, 4, '2023-03-20 18:19:06', 'complains', 'create', '{\"ticket_id\":\"30\",\"agent_id\":4,\"comment\":\"Sudah Oke\",\"note\":null,\"status\":\"Resolved\",\"approve\":null,\"updated_at\":\"2023-03-20T11:19:06.000000Z\",\"created_at\":\"2023-03-20T11:19:06.000000Z\",\"id\":42}');
INSERT INTO `logs` VALUES (15, 4, '2023-03-21 12:11:10', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (16, 4, '2023-03-21 12:17:51', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (17, 5, '2023-03-21 12:18:30', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (18, 5, '2023-03-21 12:19:10', 'tickets', 'create', '{\"code\":\"16793759500\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":5,\"katagori_id\":\"2\",\"sub_katagori_id\":\"1\",\"problem\":\"Ticket Hari Ini\",\"updated_at\":\"2023-03-21T05:19:10.000000Z\",\"created_at\":\"2023-03-21T05:19:10.000000Z\",\"id\":34}');
INSERT INTO `logs` VALUES (19, 5, '2023-03-21 12:19:10', 'complains', 'create', '{\"ticket_id\":34,\"user_id\":5,\"comment\":\"Ticket Hari Ini\",\"note\":\"Anti Virus x\",\"status\":\"Open Ticket\",\"approve\":null,\"updated_at\":\"2023-03-21T05:19:10.000000Z\",\"created_at\":\"2023-03-21T05:19:10.000000Z\",\"id\":116}');
INSERT INTO `logs` VALUES (20, 1, '2023-03-21 12:43:34', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (21, 3, '2023-03-21 12:44:09', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (22, 3, '2023-03-21 12:44:23', 'tickets', 'edit', '{\"id\":34,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":5,\"tanggal\":\"2023-03-21\",\"problem\":\"Ticket Hari Ini\",\"state\":\"Request Feedback\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 12:19:10\",\"updated_at\":\"2023-03-21 12:19:10\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793759500\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (23, 3, '2023-03-21 12:44:23', 'complains', 'create', '{\"ticket_id\":\"34\",\"supervisor_id\":3,\"agent_id\":\"4\",\"comment\":\"Give assignment to agent\",\"status\":\"Assignment\",\"approve\":null,\"updated_at\":\"2023-03-21T05:44:23.000000Z\",\"created_at\":\"2023-03-21T05:44:23.000000Z\",\"id\":117}');
INSERT INTO `logs` VALUES (24, 3, '2023-03-21 12:44:32', 'tickets', 'edit', '{\"id\":33,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Request Feedback\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 13:37:37\",\"updated_at\":\"2023-03-16 13:37:37\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789486570\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (25, 3, '2023-03-21 12:44:32', 'complains', 'create', '{\"ticket_id\":\"33\",\"supervisor_id\":3,\"agent_id\":\"4\",\"comment\":\"Give assignment to agent\",\"status\":\"Assignment\",\"approve\":null,\"updated_at\":\"2023-03-21T05:44:32.000000Z\",\"created_at\":\"2023-03-21T05:44:32.000000Z\",\"id\":118}');
INSERT INTO `logs` VALUES (26, 1, '2023-03-21 12:46:17', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (27, 1, '2023-03-21 12:46:55', 'tickets', 'edit', '{\"id\":33,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Responded\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 13:37:37\",\"updated_at\":\"2023-03-21 12:44:32\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 12:44:32\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789486570\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (28, 1, '2023-03-21 12:46:55', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:46:55.000000Z\",\"created_at\":\"2023-03-21T05:46:55.000000Z\",\"id\":119}');
INSERT INTO `logs` VALUES (29, 1, '2023-03-21 12:48:06', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:48:06.000000Z\",\"created_at\":\"2023-03-21T05:48:06.000000Z\",\"id\":120}');
INSERT INTO `logs` VALUES (30, 1, '2023-03-21 12:48:50', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:48:50.000000Z\",\"created_at\":\"2023-03-21T05:48:50.000000Z\",\"id\":121}');
INSERT INTO `logs` VALUES (31, 1, '2023-03-21 12:49:28', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:49:28.000000Z\",\"created_at\":\"2023-03-21T05:49:28.000000Z\",\"id\":122}');
INSERT INTO `logs` VALUES (32, 1, '2023-03-21 12:49:56', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:49:56.000000Z\",\"created_at\":\"2023-03-21T05:49:56.000000Z\",\"id\":123}');
INSERT INTO `logs` VALUES (33, 1, '2023-03-21 12:50:04', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:50:04.000000Z\",\"created_at\":\"2023-03-21T05:50:04.000000Z\",\"id\":124}');
INSERT INTO `logs` VALUES (34, 1, '2023-03-21 12:50:27', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:50:27.000000Z\",\"created_at\":\"2023-03-21T05:50:27.000000Z\",\"id\":125}');
INSERT INTO `logs` VALUES (35, 1, '2023-03-21 12:50:47', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:50:47.000000Z\",\"created_at\":\"2023-03-21T05:50:47.000000Z\",\"id\":126}');
INSERT INTO `logs` VALUES (36, 1, '2023-03-21 12:51:16', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"Test\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T05:51:16.000000Z\",\"created_at\":\"2023-03-21T05:51:16.000000Z\",\"id\":127}');
INSERT INTO `logs` VALUES (37, 1, '2023-03-21 13:00:11', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"asdasdasd\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:00:11.000000Z\",\"created_at\":\"2023-03-21T06:00:11.000000Z\",\"id\":128}');
INSERT INTO `logs` VALUES (38, 1, '2023-03-21 13:15:12', 'tickets', 'edit', '{\"id\":33,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Request Feedback\",\"status\":\"On Progress\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 13:37:37\",\"updated_at\":\"2023-03-21 12:46:55\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 12:44:32\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789486570\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (39, 1, '2023-03-21 13:16:28', 'tickets', 'edit', '{\"id\":33,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Responded\",\"status\":\"Closed\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 13:37:37\",\"updated_at\":\"2023-03-21 13:15:12\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 12:44:32\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:15:12\",\"code\":\"16789486570\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (40, 1, '2023-03-21 13:16:28', 'complains', 'create', '{\"ticket_id\":\"33\",\"user_id\":1,\"comment\":\"ty\",\"status\":\"Cancel\",\"approve\":null,\"updated_at\":\"2023-03-21T06:16:28.000000Z\",\"created_at\":\"2023-03-21T06:16:28.000000Z\",\"id\":129}');
INSERT INTO `logs` VALUES (41, 1, '2023-03-21 13:19:53', 'tickets', 'edit', '{\"id\":3,\"lokasi_id\":1,\"katagori_id\":3,\"sub_katagori_id\":3,\"supervisor_id\":3,\"agent_id\":2,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Responded\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 10:10:35\",\"updated_at\":\"2023-03-16 10:16:42\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":1440,\"sla_start\":null,\"sla_assignment\":\"2023-03-16 10:16:42\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789362352\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (42, 1, '2023-03-21 13:19:53', 'complains', 'create', '{\"ticket_id\":\"3\",\"user_id\":1,\"comment\":\"mask\",\"status\":\"Closed\",\"approve\":null,\"updated_at\":\"2023-03-21T06:19:53.000000Z\",\"created_at\":\"2023-03-21T06:19:53.000000Z\",\"id\":130}');
INSERT INTO `logs` VALUES (43, 1, '2023-03-21 13:22:26', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (44, 3, '2023-03-21 13:22:40', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (45, 3, '2023-03-21 13:22:51', 'tickets', 'edit', '{\"id\":4,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Request Feedback\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 10:10:35\",\"updated_at\":\"2023-03-16 10:10:35\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789362353\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (46, 3, '2023-03-21 13:22:51', 'complains', 'create', '{\"ticket_id\":\"4\",\"supervisor_id\":3,\"agent_id\":\"4\",\"comment\":\"Give assignment to agent\",\"status\":\"Assignment\",\"approve\":null,\"updated_at\":\"2023-03-21T06:22:51.000000Z\",\"created_at\":\"2023-03-21T06:22:51.000000Z\",\"id\":131}');
INSERT INTO `logs` VALUES (47, 4, '2023-03-21 13:23:09', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (48, 4, '2023-03-21 13:23:21', 'tickets', 'edit', '{\"id\":34,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":1,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":5,\"tanggal\":\"2023-03-21\",\"problem\":\"Ticket Hari Ini\",\"state\":\"Responded\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 12:19:10\",\"updated_at\":\"2023-03-21 12:44:23\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 12:44:23\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793759500\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (49, 4, '2023-03-21 13:23:21', 'complains', 'create', '{\"ticket_id\":\"34\",\"agent_id\":4,\"comment\":\"I will do this task now\",\"note\":null,\"status\":\"Response\",\"approve\":null,\"updated_at\":\"2023-03-21T06:23:21.000000Z\",\"created_at\":\"2023-03-21T06:23:21.000000Z\",\"id\":132}');
INSERT INTO `logs` VALUES (50, 1, '2023-03-21 13:23:41', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (51, 1, '2023-03-21 13:37:00', 'tickets', 'create', '{\"code\":\"16793806200\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":1,\"katagori_id\":\"1\",\"sub_katagori_id\":\"1\",\"problem\":\"asd\",\"updated_at\":\"2023-03-21T06:37:00.000000Z\",\"created_at\":\"2023-03-21T06:37:00.000000Z\",\"id\":35}');
INSERT INTO `logs` VALUES (52, 1, '2023-03-21 13:37:00', 'complains', 'create', '{\"ticket_id\":35,\"user_id\":1,\"comment\":\"asd\",\"note\":\"Anti Virus x\",\"status\":\"Open Ticket\",\"approve\":null,\"updated_at\":\"2023-03-21T06:37:00.000000Z\",\"created_at\":\"2023-03-21T06:37:00.000000Z\",\"id\":133}');
INSERT INTO `logs` VALUES (53, 1, '2023-03-21 13:37:30', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Request Feedback\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:37:00\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (54, 1, '2023-03-21 13:37:30', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"tolong segra ditangani\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:37:30.000000Z\",\"created_at\":\"2023-03-21T06:37:30.000000Z\",\"id\":134}');
INSERT INTO `logs` VALUES (55, 1, '2023-03-21 13:38:05', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"tolong segra ditangani\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:38:05.000000Z\",\"created_at\":\"2023-03-21T06:38:05.000000Z\",\"id\":135}');
INSERT INTO `logs` VALUES (56, 1, '2023-03-21 13:40:31', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasd\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:40:31.000000Z\",\"created_at\":\"2023-03-21T06:40:31.000000Z\",\"id\":136}');
INSERT INTO `logs` VALUES (57, 1, '2023-03-21 13:42:40', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasdasd\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:42:40.000000Z\",\"created_at\":\"2023-03-21T06:42:40.000000Z\",\"id\":137}');
INSERT INTO `logs` VALUES (58, 1, '2023-03-21 13:42:59', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasdasd\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:42:59.000000Z\",\"created_at\":\"2023-03-21T06:42:59.000000Z\",\"id\":138}');
INSERT INTO `logs` VALUES (59, 1, '2023-03-21 13:44:35', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasdads\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:44:35.000000Z\",\"created_at\":\"2023-03-21T06:44:35.000000Z\",\"id\":139}');
INSERT INTO `logs` VALUES (60, 1, '2023-03-21 13:45:05', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasdads\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:45:05.000000Z\",\"created_at\":\"2023-03-21T06:45:05.000000Z\",\"id\":140}');
INSERT INTO `logs` VALUES (61, 1, '2023-03-21 13:45:22', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasdads\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:45:22.000000Z\",\"created_at\":\"2023-03-21T06:45:22.000000Z\",\"id\":141}');
INSERT INTO `logs` VALUES (62, 1, '2023-03-21 13:47:14', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasdads\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:47:14.000000Z\",\"created_at\":\"2023-03-21T06:47:14.000000Z\",\"id\":142}');
INSERT INTO `logs` VALUES (63, 1, '2023-03-21 13:47:41', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasdads\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:47:41.000000Z\",\"created_at\":\"2023-03-21T06:47:41.000000Z\",\"id\":143}');
INSERT INTO `logs` VALUES (64, 1, '2023-03-21 13:48:19', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Request Feedback\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:37:30\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (65, 1, '2023-03-21 13:48:19', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"lama\",\"status\":\"Cancel\",\"approve\":null,\"updated_at\":\"2023-03-21T06:48:19.000000Z\",\"created_at\":\"2023-03-21T06:48:19.000000Z\",\"id\":144}');
INSERT INTO `logs` VALUES (66, 1, '2023-03-21 13:54:20', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:48:19\",\"solution\":null,\"note\":null,\"comment_requestor\":\"lama\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:48:19\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (67, 1, '2023-03-21 13:54:20', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"lama ya\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T06:54:20.000000Z\",\"created_at\":\"2023-03-21T06:54:20.000000Z\",\"id\":145}');
INSERT INTO `logs` VALUES (68, 1, '2023-03-21 13:54:35', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Request Feedback\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:54:20\",\"solution\":null,\"note\":null,\"comment_requestor\":\"lama\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:48:19\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (69, 1, '2023-03-21 13:54:35', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"caled aja\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:54:35.000000Z\",\"created_at\":\"2023-03-21T06:54:35.000000Z\",\"id\":146}');
INSERT INTO `logs` VALUES (70, 1, '2023-03-21 13:56:40', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:54:35\",\"solution\":null,\"note\":null,\"comment_requestor\":\"caled aja\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:54:35\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (71, 1, '2023-03-21 13:56:40', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"asdasd\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:56:40.000000Z\",\"created_at\":\"2023-03-21T06:56:40.000000Z\",\"id\":147}');
INSERT INTO `logs` VALUES (72, 1, '2023-03-21 13:57:41', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:56:40\",\"solution\":null,\"note\":null,\"comment_requestor\":\"asdasd\",\"rating\":\"4\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:56:40\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (73, 1, '2023-03-21 13:57:41', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"cancel\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:57:41.000000Z\",\"created_at\":\"2023-03-21T06:57:41.000000Z\",\"id\":148}');
INSERT INTO `logs` VALUES (74, 1, '2023-03-21 13:57:52', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Canceled\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:57:41\",\"solution\":null,\"note\":null,\"comment_requestor\":\"cancel\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:57:41\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (75, 1, '2023-03-21 13:57:52', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"cancel\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:57:52.000000Z\",\"created_at\":\"2023-03-21T06:57:52.000000Z\",\"id\":149}');
INSERT INTO `logs` VALUES (76, 1, '2023-03-21 13:58:12', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Canceled\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:57:52\",\"solution\":null,\"note\":null,\"comment_requestor\":\"cancel\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:57:52\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (77, 1, '2023-03-21 13:58:12', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"cancel\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:58:12.000000Z\",\"created_at\":\"2023-03-21T06:58:12.000000Z\",\"id\":150}');
INSERT INTO `logs` VALUES (78, 1, '2023-03-21 13:58:48', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Canceled\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:58:12\",\"solution\":null,\"note\":null,\"comment_requestor\":\"cancel\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:58:12\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (79, 1, '2023-03-21 13:58:48', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"cancel\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:58:48.000000Z\",\"created_at\":\"2023-03-21T06:58:48.000000Z\",\"id\":151}');
INSERT INTO `logs` VALUES (80, 1, '2023-03-21 13:59:19', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Canceled\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:58:48\",\"solution\":null,\"note\":null,\"comment_requestor\":\"cancel\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:58:48\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (81, 1, '2023-03-21 13:59:19', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"cancel\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:59:19.000000Z\",\"created_at\":\"2023-03-21T06:59:19.000000Z\",\"id\":152}');
INSERT INTO `logs` VALUES (82, 1, '2023-03-21 13:59:33', 'tickets', 'edit', '{\"id\":35,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":1,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"asd\",\"state\":\"Responded\",\"status\":\"Canceled\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 13:37:00\",\"updated_at\":\"2023-03-21 13:59:19\",\"solution\":null,\"note\":null,\"comment_requestor\":\"cancel\",\"rating\":\"3\",\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":\"2023-03-21 13:59:19\",\"code\":\"16793806200\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (83, 1, '2023-03-21 13:59:33', 'complains', 'create', '{\"ticket_id\":\"35\",\"user_id\":1,\"comment\":\"cancel\",\"status\":\"Canceled\",\"approve\":null,\"updated_at\":\"2023-03-21T06:59:33.000000Z\",\"created_at\":\"2023-03-21T06:59:33.000000Z\",\"id\":153}');
INSERT INTO `logs` VALUES (84, 1, '2023-03-21 14:00:44', 'tickets', 'edit', '{\"id\":4,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Responded\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 10:10:35\",\"updated_at\":\"2023-03-21 13:22:51\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 13:22:51\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789362353\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (85, 1, '2023-03-21 14:00:44', 'complains', 'create', '{\"ticket_id\":\"4\",\"user_id\":1,\"comment\":\"asdad\",\"status\":\"Complain\",\"approve\":null,\"updated_at\":\"2023-03-21T07:00:44.000000Z\",\"created_at\":\"2023-03-21T07:00:44.000000Z\",\"id\":154}');
INSERT INTO `logs` VALUES (86, 1, '2023-03-21 14:01:42', 'tickets', 'edit', '{\"id\":4,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-16\",\"problem\":\"Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.\",\"state\":\"Request Feedback\",\"status\":\"On Progress\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-16 10:10:35\",\"updated_at\":\"2023-03-21 14:00:44\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 13:22:51\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16789362353\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (87, 1, '2023-03-21 14:01:42', 'complains', 'create', '{\"ticket_id\":\"4\",\"user_id\":1,\"comment\":\"asd\",\"status\":\"Closed\",\"approve\":null,\"updated_at\":\"2023-03-21T07:01:42.000000Z\",\"created_at\":\"2023-03-21T07:01:42.000000Z\",\"id\":155}');
INSERT INTO `logs` VALUES (88, 3, '2023-03-21 15:00:08', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (89, 3, '2023-03-21 15:20:27', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (90, 1, '2023-03-21 15:24:44', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (91, 1, '2023-03-21 15:26:04', 'tickets', 'create', '{\"code\":\"16793871640\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":1,\"katagori_id\":\"1\",\"sub_katagori_id\":\"2\",\"problem\":\"Testing 1\",\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":36}');
INSERT INTO `logs` VALUES (92, 1, '2023-03-21 15:26:04', 'complains', 'create', '{\"ticket_id\":36,\"user_id\":1,\"comment\":\"Testing 1\",\"note\":\"PC\\/Laptop Problem\",\"status\":\"Open Ticket\",\"approve\":null,\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":156}');
INSERT INTO `logs` VALUES (93, 1, '2023-03-21 15:26:04', 'tickets', 'create', '{\"code\":\"16793871641\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":1,\"katagori_id\":\"3\",\"sub_katagori_id\":\"2\",\"problem\":\"testing 2\",\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":37}');
INSERT INTO `logs` VALUES (94, 1, '2023-03-21 15:26:04', 'complains', 'create', '{\"ticket_id\":37,\"user_id\":1,\"comment\":\"testing 2\",\"note\":\"PC\\/Laptop Problem\",\"status\":\"Open Ticket\",\"approve\":null,\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":157}');
INSERT INTO `logs` VALUES (95, 1, '2023-03-21 15:26:04', 'tickets', 'create', '{\"code\":\"16793871642\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":1,\"katagori_id\":\"2\",\"sub_katagori_id\":\"3\",\"problem\":\"Testing 3\",\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":38}');
INSERT INTO `logs` VALUES (96, 1, '2023-03-21 15:26:04', 'complains', 'create', '{\"ticket_id\":38,\"user_id\":1,\"comment\":\"Testing 3\",\"note\":\"Activation Office\",\"status\":\"Open Ticket\",\"approve\":null,\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":158}');
INSERT INTO `logs` VALUES (97, 1, '2023-03-21 15:26:04', 'tickets', 'create', '{\"code\":\"16793871643\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":1,\"katagori_id\":\"2\",\"sub_katagori_id\":\"2\",\"problem\":\"Testing 4\",\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":39}');
INSERT INTO `logs` VALUES (98, 1, '2023-03-21 15:26:04', 'complains', 'create', '{\"ticket_id\":39,\"user_id\":1,\"comment\":\"Testing 4\",\"note\":\"PC\\/Laptop Problem\",\"status\":\"Open Ticket\",\"approve\":null,\"updated_at\":\"2023-03-21T08:26:04.000000Z\",\"created_at\":\"2023-03-21T08:26:04.000000Z\",\"id\":159}');
INSERT INTO `logs` VALUES (99, 4, '2023-03-21 15:26:49', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (128, 3, '2023-03-21 16:31:27', 'tickets', 'edit', '{\"id\":36,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":2,\"supervisor_id\":null,\"agent_id\":null,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"Testing 1\",\"state\":\"Request Feedback\",\"status\":\"Open\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 15:26:04\",\"updated_at\":\"2023-03-21 15:26:04\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":null,\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793871640\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (129, 3, '2023-03-21 16:31:27', 'complains', 'create', '{\"ticket_id\":\"36\",\"supervisor_id\":3,\"agent_id\":\"4\",\"comment\":\"Give assignment to agent\",\"status\":\"Assignment\",\"approve\":null,\"updated_at\":\"2023-03-21T09:31:27.000000Z\",\"created_at\":\"2023-03-21T09:31:27.000000Z\",\"id\":174}');
INSERT INTO `logs` VALUES (130, 3, '2023-03-21 16:33:13', 'tickets', 'create', '{\"code\":\"16793911930\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":3,\"supervisor_id\":3,\"katagori_id\":\"1\",\"sub_katagori_id\":\"3\",\"problem\":\"SIAP\",\"agent_id\":\"4\",\"sla_ticket_time\":\"60\",\"sla_assignment\":\"2023-03-21T09:33:13.909638Z\",\"status\":\"Awaiting Response\",\"updated_at\":\"2023-03-21T09:33:13.000000Z\",\"created_at\":\"2023-03-21T09:33:13.000000Z\",\"id\":40}');
INSERT INTO `logs` VALUES (131, 3, '2023-03-21 16:33:13', 'complains', 'create', '{\"ticket_id\":40,\"supervisor_id\":3,\"agent_id\":\"4\",\"comment\":\"SIAP\",\"note\":\"Give task to agent\",\"status\":\"Assignment\",\"approve\":null,\"updated_at\":\"2023-03-21T09:33:13.000000Z\",\"created_at\":\"2023-03-21T09:33:13.000000Z\",\"id\":175}');
INSERT INTO `logs` VALUES (132, 3, '2023-03-21 16:34:11', 'tickets', 'create', '{\"code\":\"16793912510\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":3,\"supervisor_id\":3,\"katagori_id\":\"2\",\"sub_katagori_id\":\"2\",\"problem\":\"Siap\",\"agent_id\":\"4\",\"sla_ticket_time\":\"60\",\"sla_assignment\":\"2023-03-21T09:34:11.505652Z\",\"status\":\"Awaiting Response\",\"updated_at\":\"2023-03-21T09:34:11.000000Z\",\"created_at\":\"2023-03-21T09:34:11.000000Z\",\"id\":41}');
INSERT INTO `logs` VALUES (133, 3, '2023-03-21 16:34:11', 'complains', 'create', '{\"ticket_id\":41,\"supervisor_id\":3,\"agent_id\":\"4\",\"comment\":\"Siap\",\"note\":\"Give task to agent\",\"status\":\"Assignment\",\"approve\":null,\"updated_at\":\"2023-03-21T09:34:11.000000Z\",\"created_at\":\"2023-03-21T09:34:11.000000Z\",\"id\":176}');
INSERT INTO `logs` VALUES (134, 3, '2023-03-21 16:34:14', 'tickets', 'create', '{\"code\":\"16793912541\",\"tanggal\":\"2023-03-21\",\"bu\":null,\"lokasi_id\":\"1\",\"user_id\":3,\"supervisor_id\":3,\"katagori_id\":\"1\",\"sub_katagori_id\":\"1\",\"problem\":\"Oke\",\"agent_id\":\"2\",\"sla_ticket_time\":\"60\",\"sla_assignment\":\"2023-03-21T09:34:14.505270Z\",\"status\":\"Awaiting Response\",\"updated_at\":\"2023-03-21T09:34:14.000000Z\",\"created_at\":\"2023-03-21T09:34:14.000000Z\",\"id\":42}');
INSERT INTO `logs` VALUES (135, 3, '2023-03-21 16:34:14', 'complains', 'create', '{\"ticket_id\":42,\"supervisor_id\":3,\"agent_id\":\"2\",\"comment\":\"Oke\",\"note\":\"Give task to agent\",\"status\":\"Assignment\",\"approve\":null,\"updated_at\":\"2023-03-21T09:34:14.000000Z\",\"created_at\":\"2023-03-21T09:34:14.000000Z\",\"id\":177}');
INSERT INTO `logs` VALUES (136, 4, '2023-03-21 16:35:35', 'tickets', 'edit', '{\"id\":36,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"Testing 1\",\"state\":\"Responded\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 15:26:04\",\"updated_at\":\"2023-03-21 16:31:27\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 16:31:27\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793871640\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (137, 4, '2023-03-21 16:35:35', 'complains', 'create', '{\"ticket_id\":\"36\",\"agent_id\":4,\"comment\":\"I will do this task now\",\"note\":null,\"status\":\"Response\",\"approve\":null,\"updated_at\":\"2023-03-21T09:35:35.000000Z\",\"created_at\":\"2023-03-21T09:35:35.000000Z\",\"id\":178}');
INSERT INTO `logs` VALUES (138, 3, '2023-03-21 16:47:12', 'tickets', 'edit', '{\"id\":36,\"lokasi_id\":1,\"katagori_id\":1,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"Testing 1\",\"state\":\"Responded\",\"status\":\"On Progress\",\"prioritas\":\"normal\",\"estimation_date\":\"2023-03-21 17:35:32\",\"resolved_date\":null,\"created_at\":\"2023-03-21 15:26:04\",\"updated_at\":\"2023-03-21 16:35:35\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 16:31:27\",\"sla_respone\":\"2023-03-21 16:35:32\",\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793871640\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (139, 4, '2023-03-21 17:29:05', 'complains', 'create', '{\"ticket_id\":\"40\",\"agent_id\":4,\"comment\":\"masih bnyak kerjaan\",\"note\":\"masih bnyak kerjaan\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:29:05.000000Z\",\"created_at\":\"2023-03-21T10:29:05.000000Z\",\"id\":179}');
INSERT INTO `logs` VALUES (140, 4, '2023-03-21 17:29:42', 'complains', 'create', '{\"ticket_id\":\"40\",\"agent_id\":4,\"comment\":\"masih bnyak kerjaan\",\"note\":\"masih bnyak kerjaan\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:29:42.000000Z\",\"created_at\":\"2023-03-21T10:29:42.000000Z\",\"id\":180}');
INSERT INTO `logs` VALUES (141, 4, '2023-03-21 17:30:45', 'complains', 'create', '{\"ticket_id\":\"40\",\"agent_id\":4,\"comment\":\"masih bnyak kerjaan\",\"note\":\"masih bnyak kerjaan\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:30:45.000000Z\",\"created_at\":\"2023-03-21T10:30:45.000000Z\",\"id\":181}');
INSERT INTO `logs` VALUES (142, 4, '2023-03-21 17:31:00', 'complains', 'create', '{\"ticket_id\":\"40\",\"agent_id\":4,\"comment\":\"masih bnyak kerjaan\",\"note\":\"masih bnyak kerjaan\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:31:00.000000Z\",\"created_at\":\"2023-03-21T10:31:00.000000Z\",\"id\":182}');
INSERT INTO `logs` VALUES (143, 4, '2023-03-21 17:32:47', 'complains', 'create', '{\"ticket_id\":\"40\",\"agent_id\":4,\"comment\":\"masih bnyak kerjaan\",\"note\":\"masih bnyak kerjaan\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:32:47.000000Z\",\"created_at\":\"2023-03-21T10:32:47.000000Z\",\"id\":183}');
INSERT INTO `logs` VALUES (144, 4, '2023-03-21 17:33:25', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:33:25.000000Z\",\"created_at\":\"2023-03-21T10:33:25.000000Z\",\"id\":184}');
INSERT INTO `logs` VALUES (145, 4, '2023-03-21 17:35:10', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:35:10.000000Z\",\"created_at\":\"2023-03-21T10:35:10.000000Z\",\"id\":185}');
INSERT INTO `logs` VALUES (146, 4, '2023-03-21 17:36:10', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:36:10.000000Z\",\"created_at\":\"2023-03-21T10:36:10.000000Z\",\"id\":186}');
INSERT INTO `logs` VALUES (147, 4, '2023-03-21 17:36:22', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:36:22.000000Z\",\"created_at\":\"2023-03-21T10:36:22.000000Z\",\"id\":187}');
INSERT INTO `logs` VALUES (148, 4, '2023-03-21 17:36:38', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:36:38.000000Z\",\"created_at\":\"2023-03-21T10:36:38.000000Z\",\"id\":188}');
INSERT INTO `logs` VALUES (149, 4, '2023-03-21 17:37:07', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:37:07.000000Z\",\"created_at\":\"2023-03-21T10:37:07.000000Z\",\"id\":189}');
INSERT INTO `logs` VALUES (150, 4, '2023-03-21 17:37:53', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:37:53.000000Z\",\"created_at\":\"2023-03-21T10:37:53.000000Z\",\"id\":190}');
INSERT INTO `logs` VALUES (151, 4, '2023-03-21 17:38:30', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:38:30.000000Z\",\"created_at\":\"2023-03-21T10:38:30.000000Z\",\"id\":191}');
INSERT INTO `logs` VALUES (152, 4, '2023-03-21 17:38:44', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:38:44.000000Z\",\"created_at\":\"2023-03-21T10:38:44.000000Z\",\"id\":192}');
INSERT INTO `logs` VALUES (153, 4, '2023-03-21 17:40:47', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:40:47.000000Z\",\"created_at\":\"2023-03-21T10:40:47.000000Z\",\"id\":193}');
INSERT INTO `logs` VALUES (154, 4, '2023-03-21 17:41:43', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"full\",\"note\":\"full\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:41:43.000000Z\",\"created_at\":\"2023-03-21T10:41:43.000000Z\",\"id\":194}');
INSERT INTO `logs` VALUES (155, 4, '2023-03-21 17:42:50', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"data\",\"note\":\"data\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:42:50.000000Z\",\"created_at\":\"2023-03-21T10:42:50.000000Z\",\"id\":195}');
INSERT INTO `logs` VALUES (156, 4, '2023-03-21 17:43:26', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"data\",\"note\":\"data\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:43:26.000000Z\",\"created_at\":\"2023-03-21T10:43:26.000000Z\",\"id\":196}');
INSERT INTO `logs` VALUES (157, 4, '2023-03-21 17:50:58', 'complains', 'create', '{\"ticket_id\":\"41\",\"agent_id\":4,\"comment\":\"Minta Penambhan Waktu\",\"note\":\"Minta Penambhan Waktu\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:50:58.000000Z\",\"created_at\":\"2023-03-21T10:50:58.000000Z\",\"id\":197}');
INSERT INTO `logs` VALUES (158, 4, '2023-03-21 17:52:29', 'complains', 'create', '{\"ticket_id\":\"40\",\"agent_id\":4,\"comment\":\"OKe\",\"note\":\"Data\",\"sla_request\":null,\"sla_request_end\":null,\"close_request\":null,\"extend_response_SLA\":\"60\",\"status\":\"Unable Respond\",\"updated_at\":\"2023-03-21T10:52:29.000000Z\",\"created_at\":\"2023-03-21T10:52:29.000000Z\",\"id\":198}');
INSERT INTO `logs` VALUES (159, 4, '2023-03-21 17:55:15', 'complains', 'create', '{\"ticket_id\":\"36\",\"agent_id\":4,\"comment\":\"test\",\"note\":\"test\",\"sla_request\":\"2023-03-21 17:52:33\",\"sla_request_end\":\"2023-03-21 17:55:00\",\"close_request\":null,\"extend_SLA\":null,\"status\":\"Request Repair\",\"updated_at\":\"2023-03-21T10:55:15.000000Z\",\"created_at\":\"2023-03-21T10:55:15.000000Z\",\"id\":199}');
INSERT INTO `logs` VALUES (160, 3, '2023-03-21 17:59:50', 'complains', 'edit', '{\"id\":199,\"ticket_id\":36,\"user_id\":null,\"agent_id\":4,\"comment\":\"test\",\"note\":\"test\",\"status\":\"Request Repair\",\"created_at\":\"2023-03-21 17:55:15\",\"updated_at\":\"2023-03-21 17:55:15\",\"supervisor_id\":null,\"sla_request\":\"2023-03-21 17:52:33\",\"sla_request_end\":\"2023-03-21 17:55:00\",\"approve\":\"await\",\"close_request\":null,\"extend_SLA\":null,\"extend_response_SLA\":null}');
INSERT INTO `logs` VALUES (161, 3, '2023-03-21 17:59:50', 'tickets', 'edit', '{\"id\":36,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":1,\"tanggal\":\"2023-03-21\",\"problem\":\"Testing 1\",\"state\":\"Responded\",\"status\":\"On Progress\",\"prioritas\":\"normal\",\"estimation_date\":\"2023-03-21 17:35:32\",\"resolved_date\":null,\"created_at\":\"2023-03-21 15:26:04\",\"updated_at\":\"2023-03-21 16:47:12\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 16:31:27\",\"sla_respone\":\"2023-03-21 17:45:00\",\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793871640\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (162, 3, '2023-03-21 17:59:50', 'complains', 'create', '{\"ticket_id\":36,\"supervisor_id\":3,\"comment\":\"Request aproved with supervisor\",\"note\":\"Request Repair\",\"status\":\"Request Aprovel\",\"approve\":null,\"updated_at\":\"2023-03-21T10:59:50.000000Z\",\"created_at\":\"2023-03-21T10:59:50.000000Z\",\"id\":200}');
INSERT INTO `logs` VALUES (163, 3, '2023-03-21 18:00:00', 'complains', 'edit', '{\"id\":198,\"ticket_id\":40,\"user_id\":null,\"agent_id\":4,\"comment\":\"OKe\",\"note\":\"Data\",\"status\":\"Unable Respond\",\"created_at\":\"2023-03-21 17:52:29\",\"updated_at\":\"2023-03-21 17:52:29\",\"supervisor_id\":null,\"sla_request\":null,\"sla_request_end\":null,\"approve\":\"await\",\"close_request\":null,\"extend_SLA\":null,\"extend_response_SLA\":60}');
INSERT INTO `logs` VALUES (164, 3, '2023-03-21 18:00:00', 'complains', 'create', '{\"ticket_id\":40,\"supervisor_id\":3,\"comment\":\"Request rejected with supervisor\",\"note\":\"Unable Respond\",\"status\":\"Request Rejected\",\"approve\":null,\"updated_at\":\"2023-03-21T11:00:00.000000Z\",\"created_at\":\"2023-03-21T11:00:00.000000Z\",\"id\":201}');
INSERT INTO `logs` VALUES (165, 3, '2023-03-21 18:04:22', 'complains', 'edit', '{\"id\":197,\"ticket_id\":41,\"user_id\":null,\"agent_id\":4,\"comment\":\"Minta Penambhan Waktu\",\"note\":\"Minta Penambhan Waktu\",\"status\":\"Unable Respond\",\"created_at\":\"2023-03-21 17:50:58\",\"updated_at\":\"2023-03-21 17:50:58\",\"supervisor_id\":null,\"sla_request\":null,\"sla_request_end\":null,\"approve\":\"await\",\"close_request\":null,\"extend_SLA\":null,\"extend_response_SLA\":60}');
INSERT INTO `logs` VALUES (166, 3, '2023-03-21 18:04:22', 'tickets', 'edit', '{\"id\":41,\"lokasi_id\":1,\"katagori_id\":2,\"sub_katagori_id\":2,\"supervisor_id\":3,\"agent_id\":4,\"user_id\":3,\"tanggal\":\"2023-03-21\",\"problem\":\"Siap\",\"state\":\"Request Feedback\",\"status\":\"Awaiting Response\",\"prioritas\":\"normal\",\"estimation_date\":null,\"resolved_date\":null,\"created_at\":\"2023-03-21 16:34:11\",\"updated_at\":\"2023-03-21 16:34:11\",\"solution\":null,\"note\":null,\"comment_requestor\":null,\"rating\":null,\"bu\":null,\"sla_ticket_time\":60,\"sla_start\":null,\"sla_assignment\":\"2023-03-21 16:34:11\",\"sla_respone\":null,\"sla_repair\":null,\"sla_repair_end\":null,\"sla_pending\":null,\"sla_pending_end\":null,\"sla_resolved\":null,\"sla_close\":null,\"code\":\"16793912510\",\"sla_response_time\":30}');
INSERT INTO `logs` VALUES (167, 3, '2023-03-21 18:04:22', 'complains', 'create', '{\"ticket_id\":41,\"supervisor_id\":3,\"comment\":\"Request aproved with supervisor\",\"note\":\"Unable Respond\",\"status\":\"Request Aprovel\",\"approve\":null,\"updated_at\":\"2023-03-21T11:04:22.000000Z\",\"created_at\":\"2023-03-21T11:04:22.000000Z\",\"id\":202}');
INSERT INTO `logs` VALUES (168, 3, '2023-03-21 18:58:00', '', 'login', '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/111.0.0.0 Safari\\/537.36\"}');
INSERT INTO `logs` VALUES (169, 3, '2023-03-21 18:58:44', 'lokasis', 'create', '{\"lokasi\":\"Jember 2\",\"updated_at\":\"2023-03-21T11:58:44.000000Z\",\"created_at\":\"2023-03-21T11:58:44.000000Z\",\"id\":6}');
INSERT INTO `logs` VALUES (170, 3, '2023-03-21 18:59:28', 'lokasis', 'create', '{\"lokasi\":\"Jember 2\",\"updated_at\":\"2023-03-21T11:59:28.000000Z\",\"created_at\":\"2023-03-21T11:59:28.000000Z\",\"id\":7}');
INSERT INTO `logs` VALUES (171, 3, '2023-03-21 19:03:15', 'lokasis', 'create', '{\"lokasi\":\"Jember 3\",\"updated_at\":\"2023-03-21T12:03:15.000000Z\",\"created_at\":\"2023-03-21T12:03:15.000000Z\",\"id\":8}');
INSERT INTO `logs` VALUES (172, 3, '2023-03-21 19:04:16', 'kategoris', 'create', '{\"kategori\":\"Cataogry 1\",\"updated_at\":\"2023-03-21T12:04:16.000000Z\",\"created_at\":\"2023-03-21T12:04:16.000000Z\",\"id\":7}');
INSERT INTO `logs` VALUES (173, 3, '2023-03-21 19:08:13', 'sub_kategoris', 'create', '{\"katagori_id\":\"2\",\"sub_kategori\":\"Error Software\",\"updated_at\":\"2023-03-21T12:08:13.000000Z\",\"created_at\":\"2023-03-21T12:08:13.000000Z\",\"id\":9}');
INSERT INTO `logs` VALUES (174, 3, '2023-03-21 19:09:04', 'sub_kategoris', 'create', '{\"katagori_id\":\"7\",\"sub_kategori\":\"Error Software 1\",\"updated_at\":\"2023-03-21T12:09:04.000000Z\",\"created_at\":\"2023-03-21T12:09:04.000000Z\",\"id\":10}');
INSERT INTO `logs` VALUES (175, 3, '2023-03-21 19:10:35', 'sub_kategoris', 'create', '{\"katagori_id\":\"1\",\"sub_kategori\":\"OK\",\"updated_at\":\"2023-03-21T12:10:35.000000Z\",\"created_at\":\"2023-03-21T12:10:35.000000Z\",\"id\":11}');
INSERT INTO `logs` VALUES (176, 3, '2023-03-21 19:11:06', 'sub_kategoris', 'create', '{\"katagori_id\":\"1\",\"sub_kategori\":\"OK\",\"updated_at\":\"2023-03-21T12:11:06.000000Z\",\"created_at\":\"2023-03-21T12:11:06.000000Z\",\"id\":12}');
INSERT INTO `logs` VALUES (177, 3, '2023-03-21 19:12:28', 'lokasis', 'create', '{\"lokasi\":\"Jember 4\",\"updated_at\":\"2023-03-21T12:12:28.000000Z\",\"created_at\":\"2023-03-21T12:12:28.000000Z\",\"id\":9}');
INSERT INTO `logs` VALUES (178, 3, '2023-03-21 19:14:41', 'kategoris', 'create', '{\"kategori\":\"Cataogry 2\",\"updated_at\":\"2023-03-21T12:14:41.000000Z\",\"created_at\":\"2023-03-21T12:14:41.000000Z\",\"id\":8}');
INSERT INTO `logs` VALUES (179, 3, '2023-03-21 19:16:00', 'sub_kategoris', 'create', '{\"katagori_id\":\"2\",\"sub_kategori\":\"Error Software\",\"updated_at\":\"2023-03-21T12:16:00.000000Z\",\"created_at\":\"2023-03-21T12:16:00.000000Z\",\"id\":13}');
INSERT INTO `logs` VALUES (180, 3, '2023-03-21 19:16:47', 'sub_kategoris', 'create', '{\"katagori_id\":\"2\",\"sub_kategori\":\"OK\",\"updated_at\":\"2023-03-21T12:16:47.000000Z\",\"created_at\":\"2023-03-21T12:16:47.000000Z\",\"id\":14}');
INSERT INTO `logs` VALUES (181, 3, '2023-03-21 19:21:36', 'sub_kategoris', 'create', '{\"katagori_id\":\"1\",\"sub_kategori\":\"AAA\",\"updated_at\":\"2023-03-21T12:21:36.000000Z\",\"created_at\":\"2023-03-21T12:21:36.000000Z\",\"id\":15}');
INSERT INTO `logs` VALUES (182, 3, '2023-03-21 19:22:34', 'sub_kategoris', 'create', '{\"katagori_id\":\"2\",\"sub_kategori\":\"AAAA\",\"updated_at\":\"2023-03-21T12:22:34.000000Z\",\"created_at\":\"2023-03-21T12:22:34.000000Z\",\"id\":16}');
INSERT INTO `logs` VALUES (183, 3, '2023-03-21 19:24:34', 'kategoris', 'create', '{\"kategori\":\"asdasd\",\"updated_at\":\"2023-03-21T12:24:34.000000Z\",\"created_at\":\"2023-03-21T12:24:34.000000Z\",\"id\":9}');
INSERT INTO `logs` VALUES (184, 3, '2023-03-21 19:27:12', 'lokasis', 'edit', '{\"id\":9,\"lokasi\":\"Jember 4\",\"created_at\":\"2023-03-21 19:12:28\",\"updated_at\":\"2023-03-21 19:12:28\"}');
INSERT INTO `logs` VALUES (185, 3, '2023-03-21 19:28:06', 'lokasis', 'edit', '{\"id\":9,\"lokasi\":\"Jember 6\",\"created_at\":\"2023-03-21 19:12:28\",\"updated_at\":\"2023-03-21 19:27:12\"}');
INSERT INTO `logs` VALUES (186, 3, '2023-03-21 19:30:51', 'lokasis', 'edit', '{\"id\":9,\"lokasi\":\"Jember 3\",\"created_at\":\"2023-03-21 19:12:28\",\"updated_at\":\"2023-03-21 19:28:06\"}');
INSERT INTO `logs` VALUES (187, 3, '2023-03-21 19:31:29', 'lokasis', 'edit', '{\"id\":9,\"lokasi\":\"Jember 5\",\"created_at\":\"2023-03-21 19:12:28\",\"updated_at\":\"2023-03-21 19:30:51\"}');
INSERT INTO `logs` VALUES (188, 3, '2023-03-21 19:33:00', 'lokasis', 'edit', '{\"id\":9,\"lokasi\":\"Jember 10\",\"created_at\":\"2023-03-21 19:12:28\",\"updated_at\":\"2023-03-21 19:31:29\"}');
INSERT INTO `logs` VALUES (189, 3, '2023-03-21 19:33:25', 'lokasis', 'create', '{\"lokasi\":\"Jember\",\"updated_at\":\"2023-03-21T12:33:25.000000Z\",\"created_at\":\"2023-03-21T12:33:25.000000Z\",\"id\":10}');
INSERT INTO `logs` VALUES (190, 3, '2023-03-21 19:36:44', 'lokasis', 'edit', '{\"id\":10,\"lokasi\":\"Jember\",\"created_at\":\"2023-03-21 19:33:25\",\"updated_at\":\"2023-03-21 19:33:25\"}');
INSERT INTO `logs` VALUES (191, 3, '2023-03-21 19:37:34', 'kategoris', 'edit', '{\"id\":9,\"kategori\":\"asdasd\",\"created_at\":\"2023-03-21 19:24:34\",\"updated_at\":\"2023-03-21 19:24:34\"}');
INSERT INTO `logs` VALUES (192, 3, '2023-03-21 19:38:12', 'sub_kategoris', 'edit', '{\"id\":10,\"katagori_id\":7,\"sub_kategori\":\"Error Software 1\",\"created_at\":\"2023-03-21 19:09:04\",\"updated_at\":\"2023-03-21 19:09:04\"}');

-- ----------------------------
-- Table structure for lokasis
-- ----------------------------
DROP TABLE IF EXISTS `lokasis`;
CREATE TABLE `lokasis`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lokasis
-- ----------------------------
INSERT INTO `lokasis` VALUES (1, 'Kuningan', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `lokasis` VALUES (2, 'Duren Tiga', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `lokasis` VALUES (3, 'BSD', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `lokasis` VALUES (4, 'Serpong', '2023-03-06 08:42:23', '2023-03-06 08:42:23');
INSERT INTO `lokasis` VALUES (5, 'Jember', '2023-03-16 11:19:07', '2023-03-16 11:19:07');
INSERT INTO `lokasis` VALUES (6, 'Jember 2', '2023-03-21 18:58:44', '2023-03-21 18:58:44');
INSERT INTO `lokasis` VALUES (7, 'Jember 2', '2023-03-21 18:59:28', '2023-03-21 18:59:28');
INSERT INTO `lokasis` VALUES (8, 'Jember 3', '2023-03-21 19:03:15', '2023-03-21 19:03:15');
INSERT INTO `lokasis` VALUES (9, 'Jember 11', '2023-03-21 19:12:28', '2023-03-21 19:33:00');
INSERT INTO `lokasis` VALUES (10, 'Siap', '2023-03-21 19:33:25', '2023-03-21 19:36:44');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_02_22_180850_add_ldap_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_02_23_042109_create_lokasis_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_02_23_042725_create_kategoris_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_02_23_042740_create_sub_kategoris_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_02_23_042846_create_tickets_table', 1);
INSERT INTO `migrations` VALUES (11, '2023_03_04_131811_add_close_and__complain_to_tickets_table', 2);
INSERT INTO `migrations` VALUES (12, '2023_03_04_134132_create_complains_table', 2);
INSERT INTO `migrations` VALUES (13, '2023_03_05_064637_create_profiles_table', 2);
INSERT INTO `migrations` VALUES (14, '2023_03_05_074131_add_basic_info_to_tickets_table', 2);
INSERT INTO `migrations` VALUES (15, '2023_03_05_161330_add_sla_to_tickets_table', 2);
INSERT INTO `migrations` VALUES (17, '2023_03_08_024625_add_employee_id_to_users_table', 3);
INSERT INTO `migrations` VALUES (18, '2023_03_11_204033_add_supervisor_id_to_complains_table', 4);
INSERT INTO `migrations` VALUES (19, '2023_03_12_211439_add__extend_s_l_a_to_complains_table', 4);
INSERT INTO `migrations` VALUES (20, '2023_03_13_024654_add_sla_response_time_to_tickets_table', 4);
INSERT INTO `migrations` VALUES (21, '2023_03_13_032019_add_sla_response_time_to_complains_table', 4);
INSERT INTO `migrations` VALUES (22, '2020_11_20_100001_create_log_table', 5);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for sub_kategoris
-- ----------------------------
DROP TABLE IF EXISTS `sub_kategoris`;
CREATE TABLE `sub_kategoris`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `katagori_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_kategoris
-- ----------------------------
INSERT INTO `sub_kategoris` VALUES (1, 1, 'Anti Virus x', '2023-03-06 08:54:27', '2023-03-16 11:24:12');
INSERT INTO `sub_kategoris` VALUES (2, 2, 'PC/Laptop Problem', '2023-03-06 08:55:25', '2023-03-06 08:55:30');
INSERT INTO `sub_kategoris` VALUES (3, 3, 'Activation Office', '2023-03-06 08:56:14', '2023-03-06 08:56:18');
INSERT INTO `sub_kategoris` VALUES (4, 4, 'Printer Problem', '2023-03-06 08:56:50', '2023-03-06 08:56:54');
INSERT INTO `sub_kategoris` VALUES (5, 5, 'Printer Wifi', '2023-03-06 08:58:24', '2023-03-06 08:58:27');
INSERT INTO `sub_kategoris` VALUES (6, 1, 'Installation Software', '2023-03-06 08:59:51', '2023-03-06 08:59:54');
INSERT INTO `sub_kategoris` VALUES (7, 5, 'Internet Problem', '2023-03-06 09:00:27', '2023-03-06 09:00:31');
INSERT INTO `sub_kategoris` VALUES (8, 6, 'Other x', '2023-03-16 11:20:10', '2023-03-16 11:20:29');
INSERT INTO `sub_kategoris` VALUES (9, 2, 'Error Software', '2023-03-21 19:08:13', '2023-03-21 19:08:13');
INSERT INTO `sub_kategoris` VALUES (10, 7, 'Error Software 1 Das', '2023-03-21 19:09:04', '2023-03-21 19:38:12');
INSERT INTO `sub_kategoris` VALUES (11, 1, 'OK', '2023-03-21 19:10:35', '2023-03-21 19:10:35');
INSERT INTO `sub_kategoris` VALUES (12, 1, 'OK', '2023-03-21 19:11:06', '2023-03-21 19:11:06');
INSERT INTO `sub_kategoris` VALUES (13, 2, 'Error Software', '2023-03-21 19:16:00', '2023-03-21 19:16:00');
INSERT INTO `sub_kategoris` VALUES (14, 2, 'OK', '2023-03-21 19:16:47', '2023-03-21 19:16:47');
INSERT INTO `sub_kategoris` VALUES (15, 1, 'AAA', '2023-03-21 19:21:36', '2023-03-21 19:21:36');
INSERT INTO `sub_kategoris` VALUES (16, 2, 'AAAA', '2023-03-21 19:22:34', '2023-03-21 19:22:34');

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lokasi_id` bigint(20) UNSIGNED NOT NULL,
  `katagori_id` bigint(20) UNSIGNED NOT NULL,
  `sub_katagori_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `agent_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `problem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Request Feedback',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Open',
  `prioritas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `estimation_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `resolved_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `solution` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `comment_requestor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rating` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `bu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sla_ticket_time` int(11) NOT NULL DEFAULT 60,
  `sla_start` timestamp NULL DEFAULT NULL,
  `sla_assignment` timestamp NULL DEFAULT NULL,
  `sla_respone` timestamp NULL DEFAULT NULL,
  `sla_repair` timestamp NULL DEFAULT NULL,
  `sla_repair_end` timestamp NULL DEFAULT NULL,
  `sla_pending` timestamp NULL DEFAULT NULL,
  `sla_pending_end` timestamp NULL DEFAULT NULL,
  `sla_resolved` timestamp NULL DEFAULT NULL,
  `sla_close` timestamp NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sla_response_time` int(11) NOT NULL DEFAULT 30,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES (1, 1, 1, 1, 3, 4, 1, '2023-03-16', 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'Responded', 'Closed', 'normal', '2023-03-16 13:10:50', NULL, '2023-03-16 10:10:35', '2023-03-16 10:58:25', NULL, NULL, NULL, NULL, NULL, 160, NULL, '2023-03-16 10:13:42', '2023-03-16 10:30:50', '2023-03-16 10:32:37', '2023-03-16 10:32:00', NULL, NULL, NULL, NULL, '16789362350', 30);
INSERT INTO `tickets` VALUES (2, 1, 2, 2, 3, 4, 1, '2023-03-16', 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'Responded', 'Closed', 'normal', '2023-03-18 10:32:37', NULL, '2023-03-16 10:10:35', '2023-03-16 10:56:49', 'udah nih tolong bitangnya', NULL, NULL, NULL, NULL, 2880, NULL, '2023-03-16 10:14:36', '2023-03-16 10:32:37', NULL, NULL, '2023-03-16 10:34:39', '2023-03-16 10:38:18', NULL, '2023-03-16 10:54:16', '16789362351', 30);
INSERT INTO `tickets` VALUES (3, 1, 3, 3, 3, 2, 1, '2023-03-16', 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'Responded', 'Closed', 'normal', NULL, NULL, '2023-03-16 10:10:35', '2023-03-21 13:19:53', NULL, NULL, 'mask', '3', NULL, 1440, NULL, '2023-03-16 10:16:42', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 13:19:53', '16789362352', 30);
INSERT INTO `tickets` VALUES (4, 1, 2, 2, 3, 4, 1, '2023-03-16', 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'Responded', 'Closed', 'normal', NULL, NULL, '2023-03-16 10:10:35', '2023-03-21 14:01:42', NULL, NULL, 'asd', '3', NULL, 60, NULL, '2023-03-21 13:22:51', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 14:01:42', '16789362353', 30);
INSERT INTO `tickets` VALUES (17, 1, 1, 2, NULL, 2, 3, '2023-03-16', 'data', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:03:43', '2023-03-16 12:03:43', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:03:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789430230', 30);
INSERT INTO `tickets` VALUES (18, 1, 1, 2, NULL, 2, 3, '2023-03-16', 'data', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:05:32', '2023-03-16 12:05:32', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:05:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789431320', 30);
INSERT INTO `tickets` VALUES (19, 1, 1, 1, NULL, 2, 3, '2023-03-16', 'data2', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:05:57', '2023-03-16 12:05:57', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:05:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789431570', 30);
INSERT INTO `tickets` VALUES (20, 1, 1, 2, 3, 2, 3, '2023-03-16', 'asdasd', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:16:57', '2023-03-16 12:16:57', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:16:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789438170', 30);
INSERT INTO `tickets` VALUES (21, 1, 1, 2, 3, 2, 3, '2023-03-16', 'asdasd', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:19:21', '2023-03-16 12:19:21', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:19:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789439610', 30);
INSERT INTO `tickets` VALUES (22, 1, 3, 2, 3, 2, 3, '2023-03-16', 'Data', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:20:01', '2023-03-16 12:20:01', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:20:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789440010', 30);
INSERT INTO `tickets` VALUES (24, 1, 3, 3, 3, 2, 3, '2023-03-16', 'Data', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:20:47', '2023-03-16 12:20:47', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:20:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789440470', 30);
INSERT INTO `tickets` VALUES (25, 1, 2, 3, 3, 2, 3, '2023-03-16', 'asd', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:21:52', '2023-03-16 12:21:52', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:21:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789441120', 30);
INSERT INTO `tickets` VALUES (26, 1, 3, 3, 3, 2, 3, '2023-03-16', 'Complain', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:22:44', '2023-03-16 12:22:44', NULL, NULL, NULL, NULL, NULL, 600, NULL, '2023-03-16 12:22:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789441640', 30);
INSERT INTO `tickets` VALUES (27, 1, 1, 1, 3, 2, 3, '2023-03-16', 'asd', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:22:44', '2023-03-16 12:22:44', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:22:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789441641', 30);
INSERT INTO `tickets` VALUES (28, 1, 2, 2, 3, 5, 3, '2023-03-16', 'asd', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:23:25', '2023-03-16 12:23:25', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:23:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789442050', 30);
INSERT INTO `tickets` VALUES (29, 1, 1, 1, 3, 5, 3, '2023-03-16', 'asdasd', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-16 12:23:25', '2023-03-16 12:23:25', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:23:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16789442051', 30);
INSERT INTO `tickets` VALUES (30, 1, 4, 2, 3, 4, 1, '2023-03-16', 'Serialization of \'Closure\' is not allowed', 'Responded', 'Closed', 'normal', '2023-03-20 19:18:57', NULL, '2023-03-16 12:27:00', '2023-03-20 23:13:53', 'Sudah Oke', NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:27:00', '2023-03-20 18:18:57', NULL, NULL, NULL, NULL, '2023-03-17 18:19:06', '2023-03-20 23:13:53', '16789444200', 30);
INSERT INTO `tickets` VALUES (31, 1, 1, 1, 3, 4, 3, '2023-03-16', 'asd', 'Request Feedback', 'On Progress', 'normal', '2023-03-17 16:10:33', NULL, '2023-03-16 12:27:25', '2023-03-17 15:10:33', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:27:25', '2023-03-17 15:10:33', NULL, NULL, NULL, NULL, NULL, NULL, '16789444450', 30);
INSERT INTO `tickets` VALUES (32, 1, 1, 1, 3, 4, 3, '2023-03-16', 'asd', 'Responded', 'Closed', 'normal', '2023-03-20 17:10:16', NULL, '2023-03-16 12:27:25', '2023-03-20 16:35:31', 'oke', NULL, NULL, NULL, NULL, 60, NULL, '2023-03-16 12:27:25', '2023-03-20 16:10:16', NULL, NULL, NULL, NULL, '2023-03-18 16:10:25', '2023-03-20 16:35:31', '16789444451', 30);
INSERT INTO `tickets` VALUES (33, 1, 2, 2, 3, 4, 1, '2023-03-16', 'Pythagoras adalah seorang filsuf Yunani Ionia kuno dan perintis aliran pythagoreanisme. Ajaran politik dan keagamaannya dikenal di kawasan Magna Graecia pada masanya dan telah memengaruhi pemikiran Plato dan Aristoteles, sehingga secara tidak langsung ia juga telah berdampak terhadap perkembangan filsafat Barat.', 'Responded', 'Closed', 'normal', NULL, NULL, '2023-03-16 13:37:37', '2023-03-21 13:16:28', NULL, NULL, 'ty', '3', NULL, 60, NULL, '2023-03-21 12:44:32', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 13:16:28', '16789486570', 30);
INSERT INTO `tickets` VALUES (34, 1, 2, 1, 3, 4, 5, '2023-03-21', 'Ticket Hari Ini', 'Responded', 'On Progress', 'normal', '2023-03-21 14:23:21', NULL, '2023-03-21 12:19:10', '2023-03-21 13:23:21', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-21 12:44:23', '2023-03-21 13:23:21', NULL, NULL, NULL, NULL, NULL, NULL, '16793759500', 30);
INSERT INTO `tickets` VALUES (35, 1, 1, 1, NULL, NULL, 1, '2023-03-21', 'asd', 'Responded', 'Canceled', 'normal', NULL, NULL, '2023-03-21 13:37:00', '2023-03-21 13:59:33', NULL, NULL, 'cancel', '3', NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-21 13:59:33', '16793806200', 30);
INSERT INTO `tickets` VALUES (36, 1, 2, 2, 3, 4, 1, '2023-03-21', 'Testing 1', 'Responded', 'Repairing', 'normal', '2023-03-21 17:35:32', NULL, '2023-03-21 15:26:04', '2023-03-21 17:59:50', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-21 16:31:27', '2023-03-21 17:45:00', '2023-03-21 17:52:33', '2023-03-21 17:55:00', NULL, NULL, NULL, NULL, '16793871640', 30);
INSERT INTO `tickets` VALUES (37, 1, 3, 2, NULL, NULL, 1, '2023-03-21', 'testing 2', 'Request Feedback', 'Open', 'normal', NULL, NULL, '2023-03-21 15:26:04', '2023-03-21 15:26:04', NULL, NULL, NULL, NULL, NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16793871641', 30);
INSERT INTO `tickets` VALUES (38, 1, 2, 3, NULL, NULL, 1, '2023-03-21', 'Testing 3', 'Request Feedback', 'Open', 'normal', NULL, NULL, '2023-03-21 15:26:04', '2023-03-21 15:26:04', NULL, NULL, NULL, NULL, NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16793871642', 30);
INSERT INTO `tickets` VALUES (39, 1, 2, 2, NULL, NULL, 1, '2023-03-21', 'Testing 4', 'Request Feedback', 'Open', 'normal', NULL, NULL, '2023-03-21 15:26:04', '2023-03-21 15:26:04', NULL, NULL, NULL, NULL, NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16793871643', 30);
INSERT INTO `tickets` VALUES (40, 1, 1, 3, 3, 4, 3, '2023-03-21', 'SIAP', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-21 16:33:13', '2023-03-21 16:33:13', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-21 16:33:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16793911930', 30);
INSERT INTO `tickets` VALUES (41, 1, 2, 2, 3, 4, 3, '2023-03-21', 'Siap', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-21 16:34:11', '2023-03-21 18:04:22', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-21 16:34:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16793912510', 90);
INSERT INTO `tickets` VALUES (42, 1, 1, 1, 3, 2, 3, '2023-03-21', 'Oke', 'Request Feedback', 'Awaiting Response', 'normal', NULL, NULL, '2023-03-21 16:34:14', '2023-03-21 16:34:14', NULL, NULL, NULL, NULL, NULL, 60, NULL, '2023-03-21 16:34:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16793912541', 30);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `departemen_corporate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `position_corporate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_guid_unique`(`guid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Moh Febri', 'adam', 'mohfebrinq@gmail.com', NULL, '$2y$10$4CkR4ZbjjPoTWbV/GMoPqOUlnRR2vKfk8tE4pWjrT.melmBvuIA.O', NULL, NULL, NULL, NULL, '2023-03-06 03:06:26', '2023-03-17 14:26:32', 'b1d466ac-effa-4a07-91e2-2db2e12bffdc', 'default', 'Qorik', NULL, NULL, NULL, NULL, 'user', '004');
INSERT INTO `users` VALUES (2, 'melina s', 'melina', 'mohfebrinq@gmail.com', NULL, '$2y$10$zTeoY1GjSZLCIVRXryXhSuE7EsvPlNrQ8RrQKCBH5Jvb0OcKLe3dm', NULL, NULL, NULL, NULL, '2023-03-07 10:34:17', '2023-03-17 14:26:09', '5b77bb02-959d-47bf-9810-055f8e8131ac', 'default', NULL, NULL, NULL, NULL, NULL, 'agent', '003');
INSERT INTO `users` VALUES (3, 'ceria s', 'ceria', 'mohfebrinq@gmail.com', NULL, '$2y$10$ZIfw3qCIEdPmFGeVpfp0genVvu.rvhuYVOUsNCAnqCOA4HIV7znKi', NULL, NULL, NULL, NULL, '2023-03-07 10:35:29', '2023-03-07 10:35:29', '459653df-365d-4eac-8aad-19281af4ef54', 'default', NULL, NULL, NULL, NULL, NULL, 'supervisor', NULL);
INSERT INTO `users` VALUES (4, 'eko s', 'eko', 'mohfebrinq@gmail.com', NULL, '$2y$10$p7xIqgYBKA/.jrCeZ.ojxunKUMJKhXcu3.8FQg.JbWJSxN9rGd3Ti', NULL, NULL, NULL, NULL, '2023-03-07 10:35:51', '2023-03-07 10:35:51', '2973d379-9736-4683-a6ea-776373436bc4', 'default', NULL, NULL, NULL, NULL, NULL, 'agent', NULL);
INSERT INTO `users` VALUES (5, 'riko s', 'riko', 'mohfebrinq@gmail.com', NULL, '$2y$10$TAcsxnbgUz5.KWR2EK2d6.QSakq5muvKFuUlxYG7NJaReEj0S8BsK', NULL, NULL, NULL, NULL, '2023-03-15 06:38:24', '2023-03-16 11:31:04', '8741255b-4df1-4d18-9e1e-26e43a25c4d3', 'default', NULL, NULL, NULL, NULL, NULL, 'user', '001');
INSERT INTO `users` VALUES (6, 'febri s', 'febri', 'mohfebrinq@gmail.com', NULL, '$2y$10$Z5SWO5JkCzsmhJog5RUJAe6Ka79MSkxmwNjMKjJYKz7SYWk8O5Shq', NULL, NULL, NULL, NULL, '2023-03-17 14:29:22', '2023-03-17 14:29:22', '309f395a-fedb-4d15-808a-0b60dbd58fcd', 'default', NULL, NULL, NULL, NULL, NULL, 'manager', NULL);

SET FOREIGN_KEY_CHECKS = 1;
