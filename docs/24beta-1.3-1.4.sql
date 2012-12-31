SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE `cd_post_favorite` (
  `id` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(19) unsigned NOT NULL DEFAULT '0',
  `post_id` bigint(19) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_ip` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_post_id_unique` (`user_id`,`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE `cd_user_profile` (
  `user_id` bigint(19) unsigned NOT NULL,
  `province` int(10) unsigned NOT NULL DEFAULT '0',
  `city` int(11) NOT NULL DEFAULT '0',
  `location` varchar(100) NOT NULL DEFAULT '',
  `gender` set('0','1','2') NOT NULL DEFAULT '0',
  `description` varchar(250) NOT NULL DEFAULT '',
  `website` varchar(250) NOT NULL DEFAULT '',
  `image_url` varchar(250) NOT NULL DEFAULT '',
  `avatar_large` varchar(250) NOT NULL DEFAULT '',
  `weibo_uid` varchar(50) NOT NULL DEFAULT '0',
  `qqt_uid` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
ALTER TABLE `cd_post` ADD COLUMN `favorite_nums` int UNSIGNED NOT NULL DEFAULT '0' AFTER `digg_nums`;
BEGIN;
INSERT INTO `cd_post` VALUES (null, '0', '0', '0', '24blog 正式更名为24beta，做最专业的轻cms系统', '1356937385', '60.216.87.146', '0', '0', '0', '1', '0', '0', '1', 'admin', 'http://www.24beta.com', '', '1', '0', '0', '0', '0', '1', '', '0', '', '', '', '<p>\r\n	24blog正式更名为24beta，做最专业的轻cms系统。\r\n</p>\r\n<p>\r\n	2012年12月31日，终于在2012年的最后一天发布了1.4版本，主要升级功能有两个，一是添加了相对完整的用户中心；二是添加了与用户有关的收藏功能。\r\n</p>\r\n<p>\r\n	还有大量的bug及功能改进不再一一细说，此版本程序和模板有不少改动，如果您自己修改过模板的话，升级的时候需要注意一下。\r\n</p>', '<p>\r\n	24blog正式更名为24beta，做最专业的轻cms系统。\r\n</p>\r\n<p>\r\n	2012年12月31日，终于在2012年的最后一天发布了1.4版本，主要升级功能有两个，一是添加了相对完整的用户中心；二是添加了与用户有关的收藏功能。\r\n</p>\r\n<p>\r\n	还有大量的bug及功能改进不再一一细说，此版本程序和模板有不少改动，如果您自己修改过模板的话，升级的时候需要注意一下。\r\n</p>');
COMMIT;
SET FOREIGN_KEY_CHECKS = 1;