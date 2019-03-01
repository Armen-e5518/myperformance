/*
Navicat MySQL Data Transfer

Source Server         : mp
Source Server Version : 50641
Source Host           : localhost:3306
Source Database       : eworks_mp

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2018-12-07 18:29:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for behavioral
-- ----------------------------
DROP TABLE IF EXISTS `behavioral`;
CREATE TABLE `behavioral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `color` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of behavioral
-- ----------------------------
INSERT INTO `behavioral` VALUES ('21', 'Collaboration', 'I invest time and energy into getting to know colleagues, clients and those in the community to build meaningful, long-lasting relationships. I communicate clearly and concisely with people across all levels. I listen to what others have to say. I demonstrate confidence when interacting with others. I enable a positive client (internal/external) experience. I demonstrate my value by bringing together the best resources to solve problems with a consultative mind-set. I facilitate timely and thoughtful decision making. I collaborate across boundaries and understand the importance of teamwork to achieve shared goals.', '#de012f', '0167b_01-12-2018.png', '2018-12-01 16:20:00');
INSERT INTO `behavioral` VALUES ('22', 'Leadership', 'I invest in the development of others and provide meaningful, timely, balanced feedback; I want to see those I work with succeed. I motivate, inspire and guide others to be the best they can be and maximise their potential. When at work and in the community, I positively portray the Grant Thornton brand; I take pride in our work and clearly articulate its value to others. I promote the future success of the firm by growing business and recruiting top talent.', '#9bd732', '8a261_01-12-2018.png', '2018-12-01 16:20:02');
INSERT INTO `behavioral` VALUES ('23', 'Excellence', 'I seek to expand my knowledge of Grant Thornton’s service lines, industries, functional areas and clients. I am aware of the firm\'s overall strategy, the services offered, target markets and how the firm operates. I stay current on events, trends, and issues in the news relevant to my work and clients\' (internal/external) work. I share knowledge and provide valuable insight to others. I understand how I contribute to the success and profitability of Grant Thornton. I pursue professional and technical expertise; I acquire the knowledge and skills needed to be proficient in what I do. I use past experiences and lessons learned. I participate in developmental opportunities to grow and position myself as a valued person in the firm. I am intellectually curious and I ask questions and seek feedback to further my understanding and development. I take action on feedback.', '#ff7d1e', 'ddd81_03-12-2018.png', '2018-12-03 07:22:07');
INSERT INTO `behavioral` VALUES ('24', 'Agility', 'I take the initiative to make things happen. I proactively look for solutions to think ahead. I accept and seek challenges; I step beyond what I am comfortable with. I think and act strategically to drive the success of the business and enhance our client experience. I am innovative and share ideas for continuous improvement. I look for efficiencies in the way work is completed. I am flexible, and I work effectively across different types of situations to achieve goals. I navigate through unexpected issues and am responsive to others’ needs. I prioritise different work streams and balance short-term versus long-term objectives. I strive to conduct work using the firm\'s global resources.', '#00adc7', 'cb431_03-12-2018.png', '2018-12-03 07:23:10');
INSERT INTO `behavioral` VALUES ('25', 'Responsibility', 'I hold myself and others accountable for accomplishing results of high quality, monitoring as appropriate. I complete work accurately, with a high attention to detail. If a mistake is made, I own it, resolve it, and learn from it. I ensure work meets or exceeds stakeholder expectations. I look for ways to share my knowledge, make an impact, and leverage my talents; others know my specialisation or areas of expertise. I am active in Grant Thornton\'s internal and external initiatives and the community.', '#4F2D7F', 'c81cf_03-12-2018.png', '2018-12-03 07:23:22');
INSERT INTO `behavioral` VALUES ('26', 'Respect', 'I value individual differences and treat everyone with respect and kindness. I am appreciative of others; I strive for humility. I respect diverse backgrounds and ways of thinking. I listen to understand and express genuine interest in their perspectives. I strive to understand and take ownership of how my emotions and actions impact others. My actions align with my words, and others find me trustworthy. I approach my work and interactions with others with a positive attitude, and optimistic outlook. I stay composed and resilient during challenging times. I respond productively to conflict, and I have difficult conversations when needed.', '#c8beaf', '54143_03-12-2018.png', '2018-12-03 07:24:08');

-- ----------------------------
-- Table structure for behavioral_feedback
-- ----------------------------
DROP TABLE IF EXISTS `behavioral_feedback`;
CREATE TABLE `behavioral_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `behavioral_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `beh_id` (`behavioral_id`),
  KEY `men_id` (`manager_id`),
  CONSTRAINT `beh_id` FOREIGN KEY (`behavioral_id`) REFERENCES `behavioral` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `men_id` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of behavioral_feedback
-- ----------------------------
INSERT INTO `behavioral_feedback` VALUES ('40', '7', '21', '8', null, null, '2018-12-06 03:10:58', '0');

-- ----------------------------
-- Table structure for conversations
-- ----------------------------
DROP TABLE IF EXISTS `conversations`;
CREATE TABLE `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `u_id` (`user_id`),
  KEY `m_id` (`manager_id`),
  CONSTRAINT `m_id` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of conversations
-- ----------------------------
INSERT INTO `conversations` VALUES ('31', '8', '7', 'ey College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Goo', '2b364_07-12-2018.png', '2018-12-28 00:00:00', '1');
INSERT INTO `conversations` VALUES ('32', '8', '7', ' first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '433dc_07-12-2018.png', '2018-12-31 00:00:00', '1');
INSERT INTO `conversations` VALUES ('33', '7', '8', ' first line of Lorem Ipsum, \"Lorem ipsum dolor sit  first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. amet..\", comes from a line in section 1.10.32.', '0bc6a_07-12-2018.jpg', '2018-12-11 00:00:00', '1');
INSERT INTO `conversations` VALUES ('34', '13', '8', '', null, '1969-12-31 00:00:00', '3');

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES ('1', 'department 1');
INSERT INTO `departments` VALUES ('2', 'department 2');

-- ----------------------------
-- Table structure for goals
-- ----------------------------
DROP TABLE IF EXISTS `goals`;
CREATE TABLE `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `user_comment` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `uu` (`user_id`),
  CONSTRAINT `uu` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goals
-- ----------------------------
INSERT INTO `goals` VALUES ('28', '7', null, 'roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2018-12-06 03:09:39');
INSERT INTO `goals` VALUES ('29', '7', null, 'sum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset s', '', '2018-12-07 07:49:03');
INSERT INTO `goals` VALUES ('30', '7', null, 'en the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset shee \nroots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\nroots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'psum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometim\nroots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\nroots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\n\n\nroots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2018-12-06 03:09:01');
INSERT INTO `goals` VALUES ('31', '13', null, 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', '2018-12-06 03:15:16');
INSERT INTO `goals` VALUES ('32', '13', null, 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', '2018-12-06 03:11:38');

-- ----------------------------
-- Table structure for goals_feedback
-- ----------------------------
DROP TABLE IF EXISTS `goals_feedback`;
CREATE TABLE `goals_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `state` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gg` (`goal_id`),
  KEY `mm` (`manager_id`),
  KEY `uuu` (`user_id`),
  CONSTRAINT `gg` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mm` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `uuu` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goals_feedback
-- ----------------------------
INSERT INTO `goals_feedback` VALUES ('32', '29', '8', '1', 'more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometim', '2018-12-06 03:05:35', '7', '1');
INSERT INTO `goals_feedback` VALUES ('33', '29', '13', '2', 'ved not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing soft', '2018-12-06 03:06:31', '7', '1');
INSERT INTO `goals_feedback` VALUES ('34', '31', '8', null, null, '2018-12-06 03:18:33', '13', '0');
INSERT INTO `goals_feedback` VALUES ('35', '31', '7', '0', ' the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '2018-12-06 04:30:36', '13', '1');
INSERT INTO `goals_feedback` VALUES ('36', '32', '7', null, null, '2018-12-06 04:30:18', '13', '0');

-- ----------------------------
-- Table structure for impact
-- ----------------------------
DROP TABLE IF EXISTS `impact`;
CREATE TABLE `impact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `color` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of impact
-- ----------------------------
INSERT INTO `impact` VALUES ('23', 'How have I impacted others?', '', '#4F2D7F', null, '2018-12-03 07:10:43');
INSERT INTO `impact` VALUES ('24', 'How have I impacted the achievement of my team\'s objectives?', '', '#4F2D7F', null, '2018-12-03 07:11:12');
INSERT INTO `impact` VALUES ('25', 'How I have impacted the achievement of the organisation\'s objectives?', '', '#4F2D7F', null, '2018-12-03 07:11:40');
INSERT INTO `impact` VALUES ('26', 'Summary of performance and potential', 'Enter your comments below summarizing your performance during the year\r\n• the behaviours you demonstrated whilst performing your role\r\n• the overall achievement of your objectives\r\n• areas of strength and development needs\r\n', '#00adc7', null, '2018-12-03 07:12:56');
INSERT INTO `impact` VALUES ('27', 'Learning and development needs and recommended developmental assignments', 'Development actions (training courses, special assignments, etc.)', '#00adc7', null, '2018-12-03 07:16:00');

-- ----------------------------
-- Table structure for impact_feedback
-- ----------------------------
DROP TABLE IF EXISTS `impact_feedback`;
CREATE TABLE `impact_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ii` (`impact_id`),
  KEY `im` (`manager_id`),
  KEY `ui` (`user_id`),
  CONSTRAINT `ii` FOREIGN KEY (`impact_id`) REFERENCES `impact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `im` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ui` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of impact_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `de` (`department_id`),
  KEY `mee` (`manager_id`),
  CONSTRAINT `de` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `mee` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', null, '8', 'Armen ', 'Karapetyan', 'admin', 'nelIOWb6fdX-HDVnJ4Fu5LSpP8Uobr3t', '$2y$13$k3eadgtZi1c3yg5zODajXOGTj8h2nChAurAAla4v7ia4kQGRME8cm', null, 'garmen55181@gmail.com', '10', '1492005385', '1495450818', '1543672124.51.jpg', '1');
INSERT INTO `user` VALUES ('7', '1', '8', 'Davit', 'Sargsyan', 'davit', 'SvMo-xUfP1BbBa87A3uRXUgKlWCSTryJ', '$2y$13$sOPY4Et4KveJoSLDiu6dy.BUFU1NipVx3niE/JCODOaPrx98zxjKu', null, 'garmen5518@gmail.com', '10', '1543614570', '1543614570', '1544006010.5897.jpg', '0');
INSERT INTO `user` VALUES ('8', '2', '7', 'Hrant', 'Vardanyan', 'hrant', '2GxEcQ1-XLh48w6SV5z6jAFv6hIO3xK0', '$2y$13$OAtJHygJ9werdVRoYrMgU.te7HSUrOnN6wyS3RJn8a9xRX7PzQG3.', null, 'armen.vardanyan005@gmail.com', '10', '1543670364', '1543670364', '1543832685.7327.jpg', '0');
INSERT INTO `user` VALUES ('13', null, '8', 'Tigran', 'Ghatabaghtsyan', 'tigran', '', '$2y$13$Bn.88A4SPmNwCpjq0Xp5/OOzFXoJlRr5pEz/BWpHtmdsLCvjl5Pw.', null, '1993tiko1@gmail.com', '10', '1543839698', '1543840060', '1543839711.7322.jpg', '0');

-- ----------------------------
-- Table structure for user_behavioral
-- ----------------------------
DROP TABLE IF EXISTS `user_behavioral`;
CREATE TABLE `user_behavioral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `behavioral_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_comment` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bb` (`behavioral_id`),
  KEY `ub` (`user_id`),
  CONSTRAINT `bb` FOREIGN KEY (`behavioral_id`) REFERENCES `behavioral` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ub` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_behavioral
-- ----------------------------
INSERT INTO `user_behavioral` VALUES ('17', '21', '7', 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', '2018-12-06 03:09:59');
INSERT INTO `user_behavioral` VALUES ('18', '22', '7', 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu\nneed to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu\nneed to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', '2018-12-06 03:10:06');
INSERT INTO `user_behavioral` VALUES ('19', '23', '7', 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', '2018-12-06 03:10:10');

-- ----------------------------
-- Table structure for user_impact
-- ----------------------------
DROP TABLE IF EXISTS `user_impact`;
CREATE TABLE `user_impact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `impact_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_comment` text,
  `date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `iim` (`impact_id`),
  KEY `uim` (`user_id`),
  CONSTRAINT `iim` FOREIGN KEY (`impact_id`) REFERENCES `impact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `uim` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_impact
-- ----------------------------
INSERT INTO `user_impact` VALUES ('15', '23', '7', 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', '2018-12-06 03:10:21');
INSERT INTO `user_impact` VALUES ('16', '24', '7', 'need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structu', '2018-12-06 03:10:24');
