-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.6.16 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.1.0.4904
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 导出  表 test.yii_consume 结构
CREATE TABLE IF NOT EXISTS `yii_consume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `money` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '消费金额',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  test.yii_consume 的数据：~0 rows (大约)
DELETE FROM `yii_consume`;
/*!40000 ALTER TABLE `yii_consume` DISABLE KEYS */;
/*!40000 ALTER TABLE `yii_consume` ENABLE KEYS */;


-- 导出  表 test.yii_goods 结构
CREATE TABLE IF NOT EXISTS `yii_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `price` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品价格',
  `cid` int(11) NOT NULL COMMENT '分类ID',
  `status` smallint(3) NOT NULL DEFAULT '0' COMMENT '商品状态',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  test.yii_goods 的数据：~2 rows (大约)
DELETE FROM `yii_goods`;
/*!40000 ALTER TABLE `yii_goods` DISABLE KEYS */;
INSERT INTO `yii_goods` (`id`, `username`, `name`, `price`, `cid`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '商品1', '12', 0, 1, 0, 0),
	(2, 'admin', '商品2', '32', 0, 1, 1424596566, 1424596566),
	(3, 'admin', '商品3', '100', 0, 1, 1424596749, 1424596749);
/*!40000 ALTER TABLE `yii_goods` ENABLE KEYS */;


-- 导出  表 test.yii_migration 结构
CREATE TABLE IF NOT EXISTS `yii_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 正在导出表  test.yii_migration 的数据：~5 rows (大约)
DELETE FROM `yii_migration`;
/*!40000 ALTER TABLE `yii_migration` DISABLE KEYS */;
INSERT INTO `yii_migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1423489941),
	('m130524_201442_init', 1423489942),
	('m150209_124625_goods', 1423489942),
	('m150209_132737_shopping_cart', 1423489943),
	('m150209_132828_consume', 1423489943),
	('m181208_161546_mytb', 1544286679);
/*!40000 ALTER TABLE `yii_migration` ENABLE KEYS */;


-- 导出  表 test.yii_shopping_cart 结构
CREATE TABLE IF NOT EXISTS `yii_shopping_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名',
  `goodsid` int(11) NOT NULL COMMENT '商品ID',
  `quantity` smallint(6) NOT NULL DEFAULT '1' COMMENT '商品数量',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  test.yii_shopping_cart 的数据：~2 rows (大约)
DELETE FROM `yii_shopping_cart`;
/*!40000 ALTER TABLE `yii_shopping_cart` DISABLE KEYS */;
INSERT INTO `yii_shopping_cart` (`id`, `username`, `goodsid`, `quantity`, `created_at`, `updated_at`) VALUES
	(10, 'admin', 3, 1, 1424616988, 1424616988);
/*!40000 ALTER TABLE `yii_shopping_cart` ENABLE KEYS */;


-- 导出  表 test.yii_user 结构
CREATE TABLE IF NOT EXISTS `yii_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 正在导出表  test.yii_user 的数据：~2 rows (大约)
DELETE FROM `yii_user`;
/*!40000 ALTER TABLE `yii_user` DISABLE KEYS */;
INSERT INTO `yii_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(3, 'admin', 's9wgfSxkTAzTzdoMR9VFaQIuYCe3uZJd', '$2y$13$FVi2ss0YHkqUlOGos7D5qeDSXjJPLwxfmduLcdMf8NaczwXkJbB3q', NULL, 'admin@qq.com', 1, 1424584617, 1424584617),
	(4, 'dfe', 'M93zoZdO6cWvwlaQtGHgblgDHHt_fiCS', '$2y$13$u5a2aD2JirhLVlmLMgbFk..cv6ePPQpeE8tMnIkXdWmU6be2OkM8y', NULL, 'df@aa.com', 1, 1424594413, 1424594540);
/*!40000 ALTER TABLE `yii_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
