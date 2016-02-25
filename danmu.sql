/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50519
Source Host           : localhost:3306
Source Database       : danmu

Target Server Type    : MYSQL
Target Server Version : 50519
File Encoding         : 65001

Date: 2015-12-02 00:16:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `danmu`
-- ----------------------------
DROP TABLE IF EXISTS `danmu`;
CREATE TABLE `danmu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) NOT NULL,
  `danmu` text NOT NULL,
  `posttime` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of danmu
-- ----------------------------
INSERT INTO `danmu` VALUES ('141', '34', '{ \"text\":\"pppppppp\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":14}', '2015-11-30 21:57:20');
INSERT INTO `danmu` VALUES ('142', '34', '{ \"text\":\"试试行不行！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":26}', '2015-11-30 21:57:44');
INSERT INTO `danmu` VALUES ('143', '42', '{ \"text\":\"好听好听！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":43}', '2015-11-30 22:00:27');
INSERT INTO `danmu` VALUES ('144', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:24');
INSERT INTO `danmu` VALUES ('145', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:34');
INSERT INTO `danmu` VALUES ('146', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:34');
INSERT INTO `danmu` VALUES ('147', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:35');
INSERT INTO `danmu` VALUES ('148', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:37');
INSERT INTO `danmu` VALUES ('149', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:38');
INSERT INTO `danmu` VALUES ('150', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:38');
INSERT INTO `danmu` VALUES ('151', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:39');
INSERT INTO `danmu` VALUES ('152', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:40');
INSERT INTO `danmu` VALUES ('153', '42', '{ \"text\":\"我来刷屏了！！！\",\"color\":\"#ffffff\",\"size\":\"1\",\"position\":\"0\",\"time\":3}', '2015-11-30 22:12:41');
INSERT INTO `danmu` VALUES ('154', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:27');
INSERT INTO `danmu` VALUES ('155', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:28');
INSERT INTO `danmu` VALUES ('156', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:29');
INSERT INTO `danmu` VALUES ('157', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:30');
INSERT INTO `danmu` VALUES ('158', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:30');
INSERT INTO `danmu` VALUES ('159', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:31');
INSERT INTO `danmu` VALUES ('160', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:31');
INSERT INTO `danmu` VALUES ('161', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:32');
INSERT INTO `danmu` VALUES ('162', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:33');
INSERT INTO `danmu` VALUES ('163', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:33');
INSERT INTO `danmu` VALUES ('164', '42', '{ \"text\":\"测试用刷屏，勿怪！！\",\"color\":\"#f51161\",\"size\":\"1\",\"position\":\"0\",\"time\":115}', '2015-11-30 22:14:34');

-- ----------------------------
-- Table structure for `d_set`
-- ----------------------------
DROP TABLE IF EXISTS `d_set`;
CREATE TABLE `d_set` (
  `id` int(2) NOT NULL DEFAULT '1' COMMENT 'id',
  `webname` varchar(20) NOT NULL,
  `notice` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL DEFAULT '',
  `hit` double(10,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of d_set
-- ----------------------------
INSERT INTO `d_set` VALUES ('1', 'cat666弹幕网', '这是一个测试弹幕网!', 'C站,Cat666,666,弹幕,字幕,AMV,MAD,MTV,ANIME,动漫,动漫音乐,游戏,游戏解说,ACG,galgame,动画,番组,新番,初音,洛天依,vocaloid', '这是一个测试弹幕网!!!', '©2015 PJY. All rights reserved.', 'http://www.pjy.strikingly.com', '1717');

-- ----------------------------
-- Table structure for `nav`
-- ----------------------------
DROP TABLE IF EXISTS `nav`;
CREATE TABLE `nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) NOT NULL,
  `istag` int(2) NOT NULL DEFAULT '0' COMMENT '是导航还是标签',
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nav
-- ----------------------------
INSERT INTO `nav` VALUES ('1', '0', '0', '动画', '这里是动画区', '2015-11-29 13:35:42');
INSERT INTO `nav` VALUES ('2', '0', '0', '娱乐', '这里是娱乐区', '2015-11-29 13:35:53');
INSERT INTO `nav` VALUES ('3', '0', '0', '科技', '这里是科技区', '2015-11-29 13:36:03');
INSERT INTO `nav` VALUES ('4', '0', '0', '体育', '这里是体育区', '2015-11-29 13:36:31');
INSERT INTO `nav` VALUES ('5', '0', '0', '舞蹈', '这里是舞蹈区', '2015-11-29 13:36:35');
INSERT INTO `nav` VALUES ('6', '0', '0', '音乐', '这里是音乐区', '2015-11-29 13:36:39');
INSERT INTO `nav` VALUES ('7', '0', '0', '游戏', '这里是游戏区', '2015-11-29 13:36:51');
INSERT INTO `nav` VALUES ('8', '0', '0', '资讯', '这里是资讯区', '2015-11-29 13:36:56');
INSERT INTO `nav` VALUES ('9', '1', '0', 'MAD.AMW', '具有一定制作程度的动画或静画的二次创作视频', '2015-11-29 17:21:22');
INSERT INTO `nav` VALUES ('10', '1', '0', '短片', '这里是短片专区', '2015-11-29 15:40:07');
INSERT INTO `nav` VALUES ('11', '1', '0', '怀旧', '', '2015-11-29 13:37:31');
INSERT INTO `nav` VALUES ('12', '2', '0', '资讯', '', '2015-11-29 13:37:35');
INSERT INTO `nav` VALUES ('13', '2', '0', '搞笑', '', '2015-11-29 13:37:54');
INSERT INTO `nav` VALUES ('14', '2', '0', '生活', '', '2015-11-29 13:37:58');
INSERT INTO `nav` VALUES ('17', '3', '0', 'IT前沿', '', '2015-11-29 13:38:22');
INSERT INTO `nav` VALUES ('18', '3', '0', '数码', '', '2015-11-29 13:38:48');
INSERT INTO `nav` VALUES ('20', '4', '0', 'NBA', '', '2015-11-29 13:38:56');
INSERT INTO `nav` VALUES ('21', '4', '0', '足球', '', '2015-11-29 13:39:12');
INSERT INTO `nav` VALUES ('22', '5', '0', 'Poping', '', '2015-11-29 13:39:18');
INSERT INTO `nav` VALUES ('23', '5', '0', 'Breaking', '', '2015-11-29 13:39:55');
INSERT INTO `nav` VALUES ('24', '5', '0', 'Jazz', '', '2015-11-29 13:40:02');
INSERT INTO `nav` VALUES ('25', '5', '0', '御女萌妹', '', '2015-11-29 13:40:06');
INSERT INTO `nav` VALUES ('26', '5', '0', '酷男正太', '', '2015-11-29 13:40:30');
INSERT INTO `nav` VALUES ('27', '6', '0', '精选MV', '', '2015-11-29 13:40:41');
INSERT INTO `nav` VALUES ('28', '6', '0', '演唱会', '', '2015-11-29 13:41:02');
INSERT INTO `nav` VALUES ('30', '8', '0', '视频资讯', '', '2015-11-29 13:41:22');
INSERT INTO `nav` VALUES ('31', '8', '0', '图片资讯', '', '2015-11-29 13:41:38');
INSERT INTO `nav` VALUES ('32', '8', '0', '文字资讯', '', '2015-11-29 13:41:46');
INSERT INTO `nav` VALUES ('34', '9', '1', '热血', '', '2015-11-29 15:59:51');
INSERT INTO `nav` VALUES ('35', '9', '1', '泪目', '', '2015-11-29 16:14:11');
INSERT INTO `nav` VALUES ('36', '25', '1', 'IM舞室', '', '2015-11-29 16:15:30');
INSERT INTO `nav` VALUES ('37', '25', '1', '二次元舞蹈', '', '2015-11-29 16:16:03');
INSERT INTO `nav` VALUES ('38', '9', '1', '搞笑', '', '2015-11-29 17:22:42');
INSERT INTO `nav` VALUES ('39', '9', '1', '女神向', '', '2015-11-29 17:27:18');
INSERT INTO `nav` VALUES ('40', '10', '1', '音乐动画', '', '2015-11-29 17:31:04');
INSERT INTO `nav` VALUES ('41', '10', '1', '吐槽', '', '2015-11-29 17:35:39');
INSERT INTO `nav` VALUES ('42', '6', '0', '二次元', '二次元音乐动画的集合地', '2015-11-29 17:39:46');
INSERT INTO `nav` VALUES ('43', '42', '1', '翻唱', '', '2015-11-29 17:40:35');
INSERT INTO `nav` VALUES ('44', '42', '1', '二次元音乐', '', '2015-11-29 17:44:16');
INSERT INTO `nav` VALUES ('45', '6', '0', '神翻唱', '这是一个翻唱比原唱好听的地方', '2015-11-29 17:46:48');
INSERT INTO `nav` VALUES ('46', '45', '1', '中文歌日文唱', '', '2015-11-29 17:47:38');
INSERT INTO `nav` VALUES ('47', '45', '1', '深情翻唱', '', '2015-11-29 17:51:48');

-- ----------------------------
-- Table structure for `tucao`
-- ----------------------------
DROP TABLE IF EXISTS `tucao`;
CREATE TABLE `tucao` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tucao` varchar(350) NOT NULL,
  `posttime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tucao
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(3) NOT NULL DEFAULT '0' COMMENT '是否为管理员',
  `user` varchar(20) NOT NULL DEFAULT '',
  `password` char(40) NOT NULL DEFAULT '',
  `info` varchar(200) NOT NULL DEFAULT '' COMMENT 'up主简介',
  `truename` varchar(20) NOT NULL DEFAULT '',
  `sex` smallint(2) NOT NULL DEFAULT '0',
  `birth` varchar(20) NOT NULL DEFAULT '',
  `address` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '',
  `regtime` int(11) NOT NULL DEFAULT '0',
  `headpic` varchar(100) NOT NULL DEFAULT '' COMMENT '头像',
  `bigheadpic` varchar(50) NOT NULL DEFAULT '' COMMENT '头像原图',
  `level` int(3) NOT NULL DEFAULT '0' COMMENT '等级',
  `mark` int(10) NOT NULL DEFAULT '0' COMMENT '收藏视频数',
  `marked` int(10) NOT NULL DEFAULT '0' COMMENT '视频被收藏数',
  `allworks` int(5) NOT NULL DEFAULT '0' COMMENT '作品总数',
  `allarticle` int(5) NOT NULL DEFAULT '0' COMMENT '文章总数',
  `allcomments` int(6) NOT NULL DEFAULT '0' COMMENT '别人对自己作品的评论总数',
  `allcomments2` int(6) NOT NULL DEFAULT '0' COMMENT '自己发表的评论总数',
  `alldanmu` int(10) NOT NULL DEFAULT '0' COMMENT '别人对自己作品发表的弹幕总数',
  `alldanmu2` int(5) NOT NULL DEFAULT '0' COMMENT '自己发表的弹幕总数',
  `points` int(13) NOT NULL DEFAULT '0' COMMENT '战斗力',
  `experience` int(10) NOT NULL DEFAULT '0' COMMENT '经验',
  `catfood` int(10) NOT NULL DEFAULT '1' COMMENT '猫食数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('14', '0', '彭吉元', '7acb6ea34786562fb0e8ef0b77afd253', '范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德萨', '彭吉元', '0', '1994/07/24', '中国河南省安阳市宝莲寺镇', '731401082@qq.com', '15736873304', '1447051437', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `user` VALUES ('17', '666', 'pjy', '7acb6ea34786562fb0e8ef0b77afd253', '此人为风骚无比的程序猿！', '彭吉元', '0', '1994/07/24', '中国河南省安阳市宝莲寺镇', '1234567@qq.com', '15736873304', '1447057977', 'uploads/headpic/my.jpg', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `user` VALUES ('23', '0', '别让艾滋病侵蚀生活', '1d283bf95ee42cd40c6da74b7196a049', '范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德萨', '彭吉元', '0', '2222/22/22', '中国河南省安阳市宝莲寺镇', 'fd@qq.com', '15736873304', '1447076252', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `user` VALUES ('24', '0', '别让艾滋病侵蚀生活', '1d283bf95ee42cd40c6da74b7196a049', '范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德萨', '彭吉元', '0', '2222/22/22', '中国河南省安阳市宝莲寺镇', 'fd@qq.com', '15736873304', '1447076252', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `user` VALUES ('25', '0', '别让艾滋病侵蚀生活', '1d283bf95ee42cd40c6da74b7196a049', '范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德萨', '彭吉元', '0', '1111/11/22', '中国河南省安阳市宝莲寺镇', 'd2@qq.com', '15736873304', '1447076458', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `user` VALUES ('26', '0', 'fkdjskfj', '1d283bf95ee42cd40c6da74b7196a049', '范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德萨', 'peng', '0', '2222/22/22', '中国河南省安阳市宝莲寺镇', '73fds82@qq.com', '15736873304', '1447076545', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');
INSERT INTO `user` VALUES ('38', '666', '111', '7acb6ea34786562fb0e8ef0b77afd253', '范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德范德萨范德萨', '彭吉元', '0', '2222/22/22', '中国河南省安阳市宝莲寺镇', '161515@qq.com', '15736873304', '1447077385', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for `videoinfo`
-- ----------------------------
DROP TABLE IF EXISTS `videoinfo`;
CREATE TABLE `videoinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(10) NOT NULL,
  `parentid` int(5) NOT NULL COMMENT '所属标签对应id',
  `uid` int(10) unsigned NOT NULL DEFAULT '666' COMMENT '对应的up主',
  `fname` varchar(100) NOT NULL DEFAULT '' COMMENT '文件的显示名',
  `videourl` varchar(200) NOT NULL DEFAULT '' COMMENT '视频的url',
  `keywords` varchar(200) NOT NULL DEFAULT '' COMMENT '关键词',
  `impression` varchar(200) NOT NULL DEFAULT '' COMMENT '印象',
  `description` varchar(2048) NOT NULL DEFAULT '' COMMENT '文件的描述内容',
  `thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '封面图-小',
  `bigpic` varchar(200) NOT NULL DEFAULT '' COMMENT '封面原图',
  `indexpaly` int(5) NOT NULL DEFAULT '0' COMMENT '是否在首页轮播区显示',
  `thispaly` int(5) NOT NULL DEFAULT '0' COMMENT '是否在本区轮播图显示',
  `haowanpaly` int(5) NOT NULL DEFAULT '0' COMMENT '是否在好玩视频区显示',
  `uptime` varchar(50) NOT NULL DEFAULT '' COMMENT '上传时间',
  `viewcounts` int(11) NOT NULL DEFAULT '0' COMMENT '观看次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of videoinfo
-- ----------------------------
INSERT INTO `videoinfo` VALUES ('30', '1', '34', '17', '多素材综漫燃向', 'http://7xo4uz.com1.z0.glb.clouddn.com/720_donghua_2798582.mp4', '燃，热血', '逗比', '呵呵哒~~', 'uploads/videopic/20151129050316_thumb.jpg', 'uploads/videopic/20151129050316_large.jpg', '0', '1', '1', '2015-11-29 17:11:25', '24');
INSERT INTO `videoinfo` VALUES ('31', '5', '37', '17', '【晚香玉】啾！吸血鬼女孩', 'http://7xo4uz.com1.z0.glb.clouddn.com/dance_3131702%20.mp4', '二次元，吸血鬼', '萌萌哒', '萌萌哒女孩儿~', 'uploads/videopic/20151129051001_thumb.jpg', 'uploads/videopic/20151129051001_large.jpg', '0', '1', '1', '2015-11-29 17:11:56', '4');
INSERT INTO `videoinfo` VALUES ('32', '5', '36', '17', '【IM舞室】帅气妹纸Mina Myoung灵巧复古LA编舞Emotions', 'http://7xo4uz.com1.z0.glb.clouddn.com/dance_Emotions.mp4', '灵巧，酷炫，妹纸，复古', '帅气，萌萌哒', '【IM舞室】帅气妹纸Mina Myoung灵巧复古LA编舞Emotions', 'uploads/videopic/20151129051531_thumb.jpg', 'uploads/videopic/20151129051531_large.jpg', '0', '1', '1', '2015-11-29 17:13:22', '4');
INSERT INTO `videoinfo` VALUES ('33', '5', '36', '17', '【IM舞室】酷炫编舞', 'http://7xo4uz.com1.z0.glb.clouddn.com/dance_IM.mp4', '酷炫，御女', '帅气，天啦撸', '【IM舞室】酷炫编舞，哈哈哈~', 'uploads/videopic/20151129051816_thumb.jpg', 'uploads/videopic/20151129051816_large.jpg', '1', '1', '1', '2015-11-29 17:16:27', '4');
INSERT INTO `videoinfo` VALUES ('34', '1', '38', '17', '第二季是不会被玩坏的，只是这个K和你看的不一样,全程低能', 'http://7xo4uz.com1.z0.glb.clouddn.com/donghua_3114065%20.mp4', '搞笑，玩坏，高能', '笑死爹了，毫无违和感', '第二季是不会被玩坏的，只是这个K和你看的不一样,全程低能', 'uploads/videopic/20151129052421_thumb.jpg', 'uploads/videopic/20151129052421_large.jpg', '1', '1', '1', '2015-11-29 17:22:56', '74');
INSERT INTO `videoinfo` VALUES ('35', '1', '34', '17', '【全职高手】踩影etranger【全员向手书】', 'http://7xo4uz.com1.z0.glb.clouddn.com/donghua_3118795%20.mp4', '全职高手', '全职高手', '【全职高手】踩影etranger【全员向手书】', 'uploads/videopic/20151129052636_thumb.jpg', 'uploads/videopic/20151129052636_large.jpg', '0', '1', '1', '2015-11-29 17:25:05', '4');
INSERT INTO `videoinfo` VALUES ('36', '1', '39', '17', 'AMV - Pop Culture', 'http://7xo4uz.com1.z0.glb.clouddn.com/donghua_3126691%20.mp4', '女神', '萌萌哒', 'AMV - Pop Culture', 'uploads/videopic/20151129053008_thumb.jpg', 'uploads/videopic/20151129053008_large.jpg', '0', '1', '1', '2015-11-29 17:28:47', '6');
INSERT INTO `videoinfo` VALUES ('37', '6', '40', '17', '【囧菌翻唱】【万圣节】Dollhouse', 'http://7xo4uz.com1.z0.glb.clouddn.com/donghua_3133364.mp4', '万圣节，囧菌', '好听，天籁', '【囧菌翻唱】【万圣节】Dollhouse', 'uploads/videopic/20151129053423_thumb.jpg', 'uploads/videopic/20151129053423_large.jpg', '1', '1', '1', '2015-11-29 17:31:28', '54');
INSERT INTO `videoinfo` VALUES ('38', '1', '41', '17', '史上最惨boss，天堂9分钟带你看完龙珠Z复活的F', 'http://7xo4uz.com1.z0.glb.clouddn.com/donghua_3139228%20.mp4', '吐槽，天堂', '呵呵哒，这也行！', '史上最惨boss，天堂9分钟带你看完龙珠Z复活的F', 'uploads/videopic/20151129053701_thumb.jpg', 'uploads/videopic/20151129053701_large.jpg', '1', '1', '1', '2015-11-29 17:35:47', '6');
INSERT INTO `videoinfo` VALUES ('39', '1', '35', '17', '【AMV】【加速世界】如果当初没有遇见你，我又怎会懂得坚强与温柔', 'http://7xo4uz.com1.z0.glb.clouddn.com/donghua_jiasushijie.mp4', '加速世界，泪目，温柔', '虐狗，人不如猪', '【AMV】【加速世界】如果当初没有遇见你，我又怎会懂得坚强与温柔', 'uploads/videopic/20151129053910_thumb.jpg', 'uploads/videopic/20151129053910_large.jpg', '1', '1', '1', '2015-11-29 17:37:34', '108');
INSERT INTO `videoinfo` VALUES ('40', '6', '43', '17', '【数码宝贝】Butterfly--乐队Cover+8个被选中的女孩子', 'http://7xo4uz.com1.z0.glb.clouddn.com/yinyue_2386547%20.mp4', '数码宝贝，Butterfly', '泪目', '【数码宝贝】Butterfly--乐队Cover+8个被选中的女孩子--Av2386547', 'uploads/videopic/20151129054343_thumb.jpg', 'uploads/videopic/20151129054343_large.jpg', '0', '1', '1', '2015-11-29 17:41:38', '4');
INSERT INTO `videoinfo` VALUES ('41', '6', '44', '17', '太阳与向日葵【8人合唱】', 'http://7xo4uz.com1.z0.glb.clouddn.com/yinyue_2474532%20.mp4', '合唱', '太阳与向日葵', '太阳与向日葵【8人合唱】', 'uploads/videopic/20151129054550_thumb.jpg', 'uploads/videopic/20151129054550_large.jpg', '0', '1', '1', '2015-11-29 17:44:39', '4');
INSERT INTO `videoinfo` VALUES ('42', '6', '46', '17', '【凑诗】走在冷风中 日文版——《恋上你》', 'http://7xo4uz.com1.z0.glb.clouddn.com/yinyue_3115281%20.mp4', '凑诗，日文版', '走在冷风中', '【凑诗】走在冷风中 日文版——《恋上你》', 'uploads/videopic/20151129054920_thumb.jpg', 'uploads/videopic/20151129054920_large.jpg', '0', '1', '1', '2015-11-29 17:48:08', '73');
INSERT INTO `videoinfo` VALUES ('43', '6', '44', '17', 'silent wind bell', 'http://7xo4uz.com1.z0.glb.clouddn.com/yinyue_3131345%20.mp4', '二次元，片尾曲', '', 'silent wind bell', 'uploads/videopic/20151129055104_thumb.jpg', 'uploads/videopic/20151129055104_large.jpg', '0', '1', '1', '2015-11-29 17:49:50', '4');
INSERT INTO `videoinfo` VALUES ('44', '6', '47', '17', '【AMV】我好想你（华语）', 'http://7xo4uz.com1.z0.glb.clouddn.com/yinyue_3134876.mp4', '话语，我好想你', '', '【AMV】我好想你（华语）', 'uploads/videopic/20151129055349_thumb.jpg', 'uploads/videopic/20151129055349_large.jpg', '0', '1', '1', '2015-11-29 17:52:42', '4');
INSERT INTO `videoinfo` VALUES ('45', '6', '44', '17', '【洛天依X乐正绫原创曲】昙梦', 'http://7xo4uz.com1.z0.glb.clouddn.com/yinyue_3137677%20.mp4', '洛天依，乐正绫，原创', '', '【洛天依X乐正绫原创曲】昙梦', 'uploads/videopic/20151129055520_thumb.jpg', 'uploads/videopic/20151129055520_large.jpg', '0', '1', '1', '2015-11-29 17:54:06', '4');
