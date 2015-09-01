-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 08 月 31 日 22:30
-- 服务器版本: 5.5.38
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dx`
--

-- --------------------------------------------------------

--
-- 表的结构 `dx_access`
--

DROP TABLE IF EXISTS `dx_access`;
CREATE TABLE IF NOT EXISTS `dx_access` (
  `role_id` int(10) NOT NULL DEFAULT '0',
  `node_id` int(10) NOT NULL DEFAULT '0',
  `level` int(10) NOT NULL DEFAULT '0',
  `pid` int(10) NOT NULL DEFAULT '0',
  KEY `role_id` (`role_id`),
  KEY `node_id` (`node_id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='权限表（必需）';

--
-- 转存表中的数据 `dx_access`
--

INSERT INTO `dx_access` (`role_id`, `node_id`, `level`, `pid`) VALUES
(4, 1, 1, 0),
(4, 2, 2, 0),
(4, 3, 3, 0),
(4, 4, 3, 0),
(4, 5, 2, 0),
(4, 6, 3, 0),
(4, 7, 3, 0),
(4, 8, 2, 0),
(4, 9, 3, 0),
(4, 10, 2, 0),
(4, 11, 3, 0),
(4, 12, 1, 0),
(4, 13, 2, 0),
(4, 14, 3, 0),
(4, 15, 3, 0),
(4, 16, 2, 0),
(4, 17, 3, 0),
(4, 18, 3, 0),
(4, 29, 1, 0),
(4, 30, 2, 0),
(4, 31, 3, 0),
(4, 32, 3, 0),
(4, 33, 1, 0),
(4, 34, 2, 0),
(4, 35, 3, 0),
(4, 36, 2, 0),
(4, 37, 3, 0),
(4, 38, 2, 0),
(4, 39, 3, 0),
(4, 40, 2, 0),
(4, 41, 3, 0),
(4, 42, 1, 0),
(4, 43, 2, 0),
(4, 44, 3, 0),
(4, 45, 3, 0),
(4, 46, 2, 0),
(4, 47, 3, 0),
(4, 48, 3, 0),
(2, 1, 1, 0),
(2, 2, 2, 0),
(2, 3, 3, 0),
(2, 4, 3, 0),
(2, 5, 2, 0),
(2, 6, 3, 0),
(2, 7, 3, 0),
(2, 8, 2, 0),
(2, 9, 3, 0),
(2, 10, 2, 0),
(2, 11, 3, 0),
(2, 49, 2, 0),
(2, 50, 3, 0),
(2, 12, 1, 0),
(2, 13, 2, 0),
(2, 14, 3, 0),
(2, 15, 3, 0),
(2, 16, 2, 0),
(2, 17, 3, 0),
(2, 18, 3, 0),
(2, 19, 1, 0),
(2, 20, 2, 0),
(2, 21, 3, 0),
(2, 22, 3, 0),
(2, 23, 2, 0),
(2, 24, 3, 0),
(2, 25, 3, 0),
(2, 26, 2, 0),
(2, 27, 3, 0),
(2, 28, 3, 0),
(2, 29, 1, 0),
(2, 30, 2, 0),
(2, 31, 3, 0),
(2, 32, 3, 0),
(2, 33, 1, 0),
(2, 34, 2, 0),
(2, 35, 3, 0),
(2, 36, 2, 0),
(2, 37, 3, 0),
(2, 38, 2, 0),
(2, 39, 3, 0),
(2, 40, 2, 0),
(2, 41, 3, 0),
(2, 42, 1, 0),
(2, 43, 2, 0),
(2, 44, 3, 0),
(2, 45, 3, 0),
(2, 51, 3, 0),
(2, 46, 2, 0),
(2, 47, 3, 0),
(2, 48, 3, 0),
(3, 1, 1, 0),
(3, 2, 2, 0),
(3, 3, 3, 0),
(3, 4, 3, 0),
(3, 5, 2, 0),
(3, 6, 3, 0),
(3, 7, 3, 0),
(3, 8, 2, 0),
(3, 9, 3, 0),
(3, 10, 2, 0),
(3, 11, 3, 0),
(3, 49, 2, 0),
(3, 50, 3, 0),
(3, 12, 1, 0),
(3, 13, 2, 0),
(3, 14, 3, 0),
(3, 15, 3, 0),
(3, 16, 2, 0),
(3, 17, 3, 0),
(3, 18, 3, 0),
(3, 29, 1, 0),
(3, 30, 2, 0),
(3, 31, 3, 0),
(3, 32, 3, 0),
(3, 33, 1, 0),
(3, 34, 2, 0),
(3, 35, 3, 0),
(3, 36, 2, 0),
(3, 37, 3, 0),
(3, 38, 2, 0),
(3, 39, 3, 0),
(3, 40, 2, 0),
(3, 41, 3, 0),
(3, 42, 1, 0),
(3, 43, 2, 0),
(3, 44, 3, 0),
(3, 45, 3, 0),
(3, 51, 3, 0),
(3, 46, 2, 0),
(3, 47, 3, 0),
(3, 48, 3, 0),
(1, 1, 1, 0),
(1, 12, 1, 0),
(1, 19, 1, 0),
(1, 20, 2, 0),
(1, 21, 3, 0),
(1, 22, 3, 0),
(1, 23, 2, 0),
(1, 24, 3, 0),
(1, 25, 3, 0),
(1, 26, 2, 0),
(1, 27, 3, 0),
(1, 28, 3, 0),
(1, 29, 1, 0),
(1, 33, 1, 0),
(1, 57, 2, 0),
(1, 59, 3, 0),
(1, 60, 3, 0),
(1, 58, 2, 0),
(1, 61, 3, 0),
(1, 70, 3, 0),
(1, 71, 3, 0),
(1, 62, 2, 0),
(1, 69, 3, 0),
(1, 72, 3, 0),
(1, 73, 3, 0),
(1, 63, 2, 0),
(1, 74, 3, 0),
(1, 75, 3, 0),
(1, 64, 2, 0),
(1, 77, 3, 0),
(1, 78, 3, 0),
(1, 65, 2, 0),
(1, 79, 3, 0),
(1, 80, 3, 0),
(1, 66, 2, 0),
(1, 67, 2, 0),
(1, 81, 3, 0),
(1, 82, 3, 0),
(1, 83, 3, 0),
(1, 68, 2, 0),
(1, 42, 1, 0),
(1, 55, 1, 0),
(1, 56, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dx_college`
--

DROP TABLE IF EXISTS `dx_college`;
CREATE TABLE IF NOT EXISTS `dx_college` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '学院id',
  `pid` int(5) NOT NULL COMMENT 'pid',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '学院名称、专业名称',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='学院表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `dx_college`
--

INSERT INTO `dx_college` (`id`, `pid`, `name`) VALUES
(1, 0, '第一临床医学院');

-- --------------------------------------------------------

--
-- 表的结构 `dx_nav`
--

DROP TABLE IF EXISTS `dx_nav`;
CREATE TABLE IF NOT EXISTS `dx_nav` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '唯一ID号',
  `nav_no` int(11) DEFAULT NULL COMMENT '导航的序号',
  `nav_name` text COMMENT '导航的名字',
  `nav_url` varchar(50) DEFAULT NULL COMMENT '导航的地址',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='导航栏' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dx_news`
--

DROP TABLE IF EXISTS `dx_news`;
CREATE TABLE IF NOT EXISTS `dx_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `title_main` text COMMENT '主标题',
  `title_second` text COMMENT '二级标题',
  `content` text COMMENT '新闻内容',
  `position` text COMMENT '新闻存放位置',
  `create_time` datetime DEFAULT NULL COMMENT '新闻创建时间',
  `status` int(11) DEFAULT NULL COMMENT '是否可用；0为不可用，1为可用；',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='党校新闻表，存放党校主页面的各项新闻。' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dx_node`
--

DROP TABLE IF EXISTS `dx_node`;
CREATE TABLE IF NOT EXISTS `dx_node` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `remark` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `pid` int(10) NOT NULL DEFAULT '0',
  `level` int(10) NOT NULL DEFAULT '0',
  `type` int(10) NOT NULL DEFAULT '1' COMMENT '是否显示在左侧菜单',
  `group_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `status` (`status`),
  KEY `sort` (`sort`),
  KEY `pid` (`pid`),
  KEY `level` (`level`),
  KEY `type` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='操作节点（必需）' AUTO_INCREMENT=84 ;

--
-- 转存表中的数据 `dx_node`
--

INSERT INTO `dx_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `type`, `group_id`) VALUES
(1, 'Infomation', '我的面板', 1, '', 1, 0, 1, 1, 0),
(12, 'Special', '课室管理', 1, '', 1, 0, 1, 1, 0),
(19, 'System', '管理员设置', 1, '', 1, 0, 1, 1, 0),
(20, 'Node', '权限管理', 1, '', 1, 19, 2, 1, 0),
(21, 'index', '权限列表', 1, '', 1, 20, 3, 1, 0),
(22, 'add', '添加权限', 1, '', 1, 20, 3, 1, 0),
(23, 'Role', '角色管理', 1, '', 1, 19, 2, 1, 0),
(24, 'index', '角色列表', 1, '', 1, 23, 3, 1, 0),
(25, 'add', '添加角色', 1, '', 1, 23, 3, 1, 0),
(26, 'User', '用户管理', 1, '', 1, 19, 2, 1, 0),
(27, 'index', '用户列表', 1, '', 1, 26, 3, 1, 0),
(28, 'add', '添加用户', 1, '', 1, 26, 3, 1, 0),
(29, 'Eshop', '科室管理模块', 1, '', 1, 0, 1, 1, 0),
(33, 'Focus', '新闻管理', 1, '', 1, 0, 1, 1, 0),
(42, 'Editor', '学员管理', 1, '', 1, 0, 1, 1, 0),
(55, 'Jygl', '结业管理', 1, '', 1, 0, 1, 1, 0),
(56, 'Systemhelp', '系统帮助', 1, '', 1, 0, 1, 1, 0),
(57, 'IndexNews', '主页新闻', 1, '', 1, 33, 2, 1, 0),
(58, 'WebIntro', '网站简介', 1, ' ', 2, 33, 2, 1, 0),
(59, 'index', '主页新闻列表', 1, '', 1, 57, 3, 1, 0),
(60, 'add', '添加主页新闻', 1, '', 1, 57, 3, 1, 0),
(61, 'index  ', '网站简介列表', 1, '', 2, 58, 3, 1, 0),
(62, 'PartyIntro', '党校简介', 1, '', 4, 33, 2, 1, 0),
(63, 'ParterTrain', '党员培训', 1, '', 5, 33, 2, 1, 0),
(64, 'CadresTrain', '干部培训', 1, '', 3, 33, 2, 1, 0),
(65, 'InPartyTrain', '入党培训', 1, '', 6, 33, 2, 1, 0),
(66, 'OtherPartyLink', '分党校链接', 1, ' ', 7, 33, 2, 1, 0),
(67, 'PartyWork', '党校工作', 1, ' ', 8, 33, 2, 1, 0),
(68, 'PersonInfo', '个人信息', 1, ' ', 9, 33, 2, 1, 0),
(69, 'index', '党校简介列表', 1, ' ', 1, 62, 3, 1, 0),
(70, 'add', '添加网站简介', 1, '', 1, 58, 3, 1, 0),
(71, 'edit', '编辑网站简介', 1, ' ', 1, 58, 3, 1, 0),
(72, 'add', '添加党校简介', 1, ' ', 1, 62, 3, 1, 0),
(73, 'edit', '编辑党校简介', 1, ' ', 1, 62, 3, 1, 0),
(74, 'index', '党员培训列表', 1, '', 1, 63, 3, 1, 0),
(75, 'add', '添加党员培训', 1, ' ', 1, 63, 3, 1, 0),
(77, 'index', '干部培训列表', 1, ' ', 1, 64, 3, 1, 0),
(78, 'add', '添加干部培训', 1, ' ', 1, 64, 3, 1, 0),
(79, 'index', '入党培训列表', 1, ' ', 1, 65, 3, 1, 0),
(80, 'add', '添加入党培训', 1, ' ', 1, 65, 3, 1, 0),
(81, 'index', '党校工作列表', 1, ' ', 1, 67, 3, 1, 0),
(82, 'add', '添加党校工作', 1, ' ', 1, 67, 3, 1, 0),
(83, 'edit', '编辑党校工作', 1, ' ', 1, 67, 3, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dx_role`
--

DROP TABLE IF EXISTS `dx_role`;
CREATE TABLE IF NOT EXISTS `dx_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(10) NOT NULL DEFAULT '0',
  `status` int(10) NOT NULL DEFAULT '1',
  `level` int(10) NOT NULL DEFAULT '1',
  `remark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员角色表（必需）' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `dx_role`
--

INSERT INTO `dx_role` (`id`, `name`, `pid`, `status`, `level`, `remark`, `ename`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 0, 1, 1, NULL, NULL, 1411344010, 1411344010),
(2, '管理员', 1, 1, 2, '', NULL, 1430208182, 1430208182),
(3, '总编', 2, 1, 3, '', NULL, 1430208594, 1430208594),
(4, '小编', 3, 1, 4, '', NULL, 1430208735, 1430208735);

-- --------------------------------------------------------

--
-- 表的结构 `dx_role_user`
--

DROP TABLE IF EXISTS `dx_role_user`;
CREATE TABLE IF NOT EXISTS `dx_role_user` (
  `role_id` int(10) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  KEY `role_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色用户（保留）';

-- --------------------------------------------------------

--
-- 表的结构 `dx_section`
--

DROP TABLE IF EXISTS `dx_section`;
CREATE TABLE IF NOT EXISTS `dx_section` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `pid` int(10) NOT NULL COMMENT '二级序号',
  `section_name` text NOT NULL COMMENT '栏目名',
  `author` varchar(50) DEFAULT 'admin' COMMENT '作者',
  `source` varchar(50) DEFAULT 'admin' COMMENT '来源',
  `content` text COMMENT '新闻内容',
  `showtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发表时间',
  `readtimes` int(10) NOT NULL DEFAULT '0' COMMENT '阅读次数',
  `grade` int(1) NOT NULL COMMENT '等级：1为栏目等级，2为列表页等级，3为文章页等级',
  `level` int(10) NOT NULL COMMENT '内排序',
  `url` varchar(50) NOT NULL COMMENT '网址',
  `img_url` varchar(50) DEFAULT NULL COMMENT '图片地址',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '是否审核；0为不可见，1为可见',
  `is_del` int(1) NOT NULL DEFAULT '0' COMMENT '是否审核；0未删除，1为删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='栏目表' AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `dx_section`
--

INSERT INTO `dx_section` (`id`, `pid`, `section_name`, `author`, `source`, `content`, `showtime`, `readtimes`, `grade`, `level`, `url`, `img_url`, `status`, `is_del`) VALUES
(2, 0, '网站简介', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 2, 'http://baidu.com', NULL, 0, 0),
(3, 0, '党校简介', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 3, '', NULL, 1, 0),
(4, 0, '党员培训', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 4, '', NULL, 0, 0),
(5, 0, '干部培训', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 5, '', NULL, 0, 0),
(6, 0, '入党培训', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 6, '', NULL, 0, 0),
(7, 0, '分党校链接', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 7, '', NULL, 0, 0),
(8, 0, '学会工作', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 8, '', NULL, 0, 0),
(9, 0, '办事流程', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 9, '', NULL, 0, 0),
(19, 1, '图片新闻', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 1, '', NULL, 0, 0),
(15, 1, '党建新闻', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 2, '', NULL, 0, 0),
(11, 1, '学员风采', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 3, '', NULL, 0, 0),
(31, 3, '党校简介文章页标题', 'admin', 'admin', '党校简介正文内容区', '2015-08-29 06:04:43', 0, 3, 1, '', NULL, 1, 0),
(14, 15, '网站简介三级3', '', '', NULL, '2015-08-23 17:27:35', 0, 3, 8, '', NULL, 0, 1),
(10, 0, '个人信息', '', '', NULL, '2015-08-23 17:27:35', 0, 1, 10, '', NULL, 0, 0),
(16, 1, '分党校动态', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 4, '', NULL, 0, 0),
(17, 1, '通告', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 5, '', NULL, 0, 0),
(18, 1, '学员心得', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 6, '', NULL, 0, 0),
(1, 0, '网站首页', '', '', '', '2015-08-23 17:27:35', 0, 1, 1, '', NULL, 0, 0),
(21, 1, '学习资源', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 7, '', NULL, 0, 0),
(22, 1, '党建研究动态', '', '', NULL, '2015-08-23 17:27:35', 0, 2, 8, '', NULL, 0, 0),
(23, 15, '校党委举办社会主义协商民主专题培训 ', 'admin', 'admin', ' 5月11日，校党委举办社会主义协商民主专题培训。校党委书记高文兵、湖南省社会主义学院副院长周述杰分别作了“创新高校协商民主需要把握五大概念贯通五个环节”“加强社会主义协商民主建设”的专题报告。培训会议由校党委副书记高山主持，省委统战部副部长崔永平、省侨联原主席曹亚、省委统战部知工处处长盛完善应邀出席，我校统战工作领导小组成员、二级党组织书记、统战委员、统战干事、各民主党派基层组织和统战团体负责人、各级人大代表和政协委员共计120余人参加培训。     ', '2015-08-23 17:27:35', 0, 3, 1, '', NULL, 0, 0),
(24, 15, '学校启动“三严三实”专题教育 ', 'admin', 'admin', '今年4月，中央印发了《关于在县处级以上领导干部中开展“三严三实”专题教育方案》，随后又就开展专题教育工作提出一系列明确要求。学校党委坚决贯彻中央精神，按照从严从实要求，迅速部署开展“三严三实”专题教育工作。        ', '2015-08-23 17:29:31', 0, 3, 2, '', NULL, 0, 0),
(25, 15, '第三届全国重点高校思想政治教育本科专业协同建设研讨会在', 'admin', 'admin', '    4月25日，第三届全国重点高校思想政治教育本科专业协同建设研讨会在我校升华楼101报告厅举行。湖南省教育工委宣传部长曾力勤，我校党委副书记高山等出席了开幕仪式。来自北京师范大学、南开大学、兰州大学等20多所高校的近百名专家参加了会议。       ', '2015-08-23 17:30:09', 0, 3, 3, '', NULL, 0, 0),
(26, 15, '学校举办基层党组织书记专题培训班', 'admin', 'admin', ' 校党委常委会就如何办好专题培训班进行了认真的研究部署，强调要坚持教育培训的系统性、加强教育培训的针对性、注意教育培训形式的多样性，力求以理论学习推进实际工作。  ', '2015-08-23 17:34:26', 0, 3, 4, '', NULL, 0, 0),
(27, 15, '高文兵书记为湘雅校区分党校培训班主讲第一课', 'admin', 'admin', '“中南大学是一所有着鲜明特色与独特风格的大学，每一位中南人的内心都应该树立一种文化自信。”高书记从解读校徽、校风、校训开始，讲述了中南文化的渊源、传承和创新。在一个个历史故事的讲述中，高文兵书记生动地描述出一代代中南人撰写的中南发展历程。', '2015-08-23 17:35:34', 0, 3, 5, '', NULL, 0, 0),
(29, 15, '党建新闻测试2', '小夫', '广东省医学情报研究所', '啦啦啦啦啦啦啦', '2015-08-26 15:42:40', 0, 3, 0, '', NULL, 0, 0),
(30, 2, '网站简介文章页标题2', 'admin', 'admin', '网站简介的内容页面内容', '2015-08-29 05:49:32', 0, 3, 1, '', NULL, 0, 0),
(32, 4, '预备党员培训-通知公告', 'admin', 'admin', NULL, '2015-08-30 16:44:01', 0, 2, 1, '', NULL, 0, 0),
(33, 4, '预备党员培训-学员管理', 'admin', 'admin', NULL, '2015-08-30 16:44:51', 0, 2, 2, '', NULL, 0, 0),
(34, 4, '毕业党员培训-通知公告', 'admin', 'admin', NULL, '2015-08-30 16:46:45', 0, 2, 3, '', NULL, 0, 0),
(35, 4, '毕业党员培训-学员管理', 'admin', 'admin', NULL, '2015-08-30 16:47:15', 0, 2, 4, '', NULL, 0, 0),
(36, 4, '专项培训-通知公告', 'admin', 'admin', NULL, '2015-08-30 16:47:47', 0, 2, 5, '', NULL, 0, 0),
(37, 4, '专项培训-学员管理', 'admin', 'admin', NULL, '2015-08-30 16:48:28', 0, 2, 6, '', NULL, 0, 0),
(38, 5, '培训信息', 'admin', 'admin', NULL, '2015-08-30 16:56:26', 0, 2, 1, '', NULL, 0, 0),
(39, 5, '培训管理', 'admin', 'admin', NULL, '2015-08-30 16:57:28', 0, 2, 2, '', NULL, 0, 0),
(40, 6, '入党积极分子培训信息', 'admin', 'admin', NULL, '2015-08-30 16:58:05', 0, 2, 1, '', NULL, 0, 0),
(41, 6, '培训管理', 'admin', 'admin', NULL, '2015-08-30 16:58:24', 0, 2, 2, '', NULL, 0, 0),
(42, 8, '信息发布', 'admin', 'admin', NULL, '2015-08-30 17:00:29', 0, 2, 1, '', NULL, 0, 0),
(43, 8, '教学部工作', 'admin', 'admin', NULL, '2015-08-30 17:00:45', 0, 2, 2, '', NULL, 0, 0),
(44, 9, '办事流程页面', 'admin', 'admin', NULL, '2015-08-30 17:29:33', 0, 2, 1, '', NULL, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `dx_stu_login`
--

DROP TABLE IF EXISTS `dx_stu_login`;
CREATE TABLE IF NOT EXISTS `dx_stu_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_name` char(15) DEFAULT NULL COMMENT '登录账号，默认为学号',
  `user_pwd` char(15) DEFAULT NULL COMMENT '登录密码，默认为学号',
  `name` varchar(25) DEFAULT NULL COMMENT '学员名字',
  `ID_number` char(18) DEFAULT NULL COMMENT '身份证，找回密码用',
  `belong` text COMMENT '所属单位或班级',
  `specialty` text COMMENT '专业方向',
  `start_time` date DEFAULT NULL COMMENT '列为发展对象的时间',
  `pass_rate` text COMMENT '推优通过率',
  `class` int(11) DEFAULT NULL COMMENT '所属班别',
  `group` int(11) DEFAULT NULL COMMENT '班内分组',
  `Tel` text COMMENT '只要求正副组长要求填写，格式为正+电话号码，副组长方式类似',
  `header_status` int(11) DEFAULT '0' COMMENT '0为一般组员；1为正组长；2为副组长；',
  `status` int(11) DEFAULT '0' COMMENT '0表示未审核，1表示第一次登录，大于1表示登录次数',
  `school_zone` varchar(30) DEFAULT '广东医学院（东莞校区）' COMMENT '校区',
  `period` int(11) DEFAULT NULL COMMENT '培训期数',
  `study_class_no` varchar(20) DEFAULT NULL COMMENT '上课教室号',
  `study_seat` int(11) DEFAULT NULL COMMENT '上课座位号',
  `test_class_no` varchar(20) DEFAULT NULL COMMENT '考试教室号',
  `test_seat` int(11) DEFAULT NULL COMMENT '考试座位号',
  `score` float DEFAULT NULL COMMENT '总评成绩',
  `certificate_number` int(11) DEFAULT NULL COMMENT '结业证书号',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COMMENT='学生端登录表' AUTO_INCREMENT=2 ;



--
-- 转存表中的数据 `dx_stu_login`
--

INSERT INTO `dx_stu_login` (`id`, `user_name`, `user_pwd`, `name`, `ID_number`, `belong`, `specialty`, `start_time`, `pass_rate`, `class`, `group`, `Tel`, `header_status`, `status`, `school_zone`, `period`, `study_class_no`, `study_seat`, `test_class_no`, `test_seat`, `score`, `certificate_number`) VALUES
(1, 'lurker', 'admin', '秦琴', '11209090317', '信息工程学院', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '广东医学院（东莞校区）', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `dx_user`
--

DROP TABLE IF EXISTS `dx_user`;
CREATE TABLE IF NOT EXISTS `dx_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) NOT NULL DEFAULT '0',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_time` int(10) DEFAULT NULL,
  `last_login_ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(10) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='管理员表（必需）' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `dx_user`
--

INSERT INTO `dx_user` (`id`, `role_id`, `username`, `password`, `last_login_time`, `last_login_ip`, `status`, `email`, `remark`) VALUES
(1, 1, 'jooli', 'b88e821ca6765a2ddf6114d90cfdfec6', 1441026364, '127.0.0.1', 1, NULL, NULL),
(2, 2, 'admin', '670b14728ad9902aecba32e22fa4f6bd', 1430215497, '113.116.122.44', 1, NULL, NULL),
(3, 3, 'editor', '670b14728ad9902aecba32e22fa4f6bd', 1430216812, '113.116.122.44', 1, NULL, NULL),
(4, 4, 'editor001', '670b14728ad9902aecba32e22fa4f6bd', 1430216719, '113.116.122.44', 1, NULL, NULL),
(5, 4, 'editor002', '670b14728ad9902aecba32e22fa4f6bd', 1430216744, '113.116.122.44', 1, NULL, NULL),
(6, 4, 'editor003', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL),
(7, 4, 'editor004', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL),
(8, 4, 'editor005', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL),
(9, 4, 'editor006', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL),
(10, 4, 'editor007', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL),
(11, 4, 'editor008', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL),
(12, 4, 'editor009', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL),
(13, 4, 'editor010', '670b14728ad9902aecba32e22fa4f6bd', NULL, NULL, 1, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
