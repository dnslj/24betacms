SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

SET NAMES UTF8;

CREATE TABLE IF NOT EXISTS `cd_adcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned NOT NULL,
  `adcode` text,
  `intro` varchar(250) NOT NULL DEFAULT '',
  `state` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM 
AUTO_INCREMENT=6 
DEFAULT CHARSET=utf8 
COLLATE = utf8_general_ci,  
COMMENT='广告';

CREATE TABLE IF NOT EXISTS `cd_advert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `solt` varchar(50) NOT NULL DEFAULT '',
  `intro` varchar(250) NOT NULL DEFAULT '',
  `state` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `token_UNIQUE` (`solt`)
) ENGINE=MyISAM 
AUTO_INCREMENT=6 
DEFAULT CHARSET=utf8 
COLLATE = utf8_general_ci, 
COMMENT='广告位';

BEGIN;
INSERT INTO `cd_config` VALUES(null, '11', 'user_required_admin_verfiy', '1', '0', '用户注册是否需要管理员审核', '用户注册是否需要管理审核'),(null, '11', 'user_required_email_verfiy', '0', '0', '用户注册是否需要邮件审核', '用户注册是否需要邮件审核'),(null, '22', 'post_list_type', '0', '0', '分类文章列表方式', '0 为跟首页一样显示概述\r\n1 为标题列表方式');
INSERT INTO `cd_adcode` VALUES ('1', '1', '<script type=\"text/javascript\"><!--\n    google_ad_client = \"ca-pub-9725980429199769\";\n    /* beta_336x280 */\n    google_ad_slot = \"9661689878\";\n    google_ad_width = 336;\n    google_ad_height = 280;\n    //-->\n</script>\n<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>', 'google adsense', '1'), ('2', '2', '<script type=\"text/javascript\"><!--\n    google_ad_client = \"ca-pub-9725980429199769\";\n    /* beta_336x280 */\n    google_ad_slot = \"9661689878\";\n    google_ad_width = 336;\n    google_ad_height = 280;\n    //-->\n</script>\n<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>', 'google adsense', '1'), ('3', '5', '<script type=\"text/javascript\"><!--\n    google_ad_client = \"ca-pub-9725980429199769\";\n    /* beta_336x280 */\n    google_ad_slot = \"9661689878\";\n    google_ad_width = 336;\n    google_ad_height = 280;\n    //-->\n</script>\n<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>', 'google adsense', '1'), ('4', '3', '<script type=\"text/javascript\"><!--\n    google_ad_client = \"ca-pub-9725980429199769\";\n    /* beta_336x280 */\n    google_ad_slot = \"9661689878\";\n    google_ad_width = 336;\n    google_ad_height = 280;\n    //-->\n</script>\n<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>', 'google adsense', '1'), ('5', '4', '<script type=\"text/javascript\"><!--\n    google_ad_client = \"ca-pub-9725980429199769\";\n    /* beta_336x280 */\n    google_ad_slot = \"9661689878\";\n    google_ad_width = 336;\n    google_ad_height = 280;\n    //-->\n</script>\n<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>', 'google adsense', '1');
INSERT INTO `cd_advert` VALUES ('1', '首页侧边栏第一个广告位', 'home_sidebar_ad_01', '位于侧边栏最顶部', '1'), ('2', '首页侧边栏第二个广告位', 'home_sidebar_ad_02', '位于最具人气排行下方', '1'), ('3', '详情页侧边栏第一个广告位', 'post_detail_sidebar_ad_01', '侧边栏热门评论下方', '1'), ('4', '其它页面侧边栏广告位', 'sidebar_ad_01', '分类文章、主题文章等其它页面侧边栏广告位', '1'), ('5', '首页侧边栏第三个广告位', 'home_sidebar_ad_03', '位于编辑推荐下方', '1');

-- v1.3
INSERT INTO `cd_config` VALUES (null, '14', 'auto_remote_image_local', '0', '0', '图片本地化', '后台发表修改文章的时候自动将内容中的图片本地化，0为关闭，1为开启');
COMMIT;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
