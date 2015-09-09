

localhost/DX_Project/

进行对数据库进行添加：
年级-->
alter table dx_stu_login add ngrade varchar(30) DEFAULT NULL COMMENT '年级'
alter table dx_stu_login add recycletime varchar(30) DEFAULT NULL COMMENT '回收站的修改时间'
用户状态--->
---0 无效用户  1 注册但没有生效  2 生效的用户  3 往期的用户
alter table  dx_stu_login modify STATUS int(11) DEFAULT '2' COMMENT '用户状态(0 无效用户  1 注册但没有生效  2 生效的用户  3 往期的用户)'


添加3级列表：


INSERT INTO dx_node(id,NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES(70,'stuManager','学生管理模块',1,1,42,2,1,0);
INSERT INTO dx_node(id,NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES(71,'stuManager','注入功能',1,1,70,3,1,0);



INSERT into dx_access(role_id ,node_id,level,pid) VALUES(1,70,2,42);
INSERT into dx_access(role_id ,node_id,level,pid) VALUES(1,71,3,70);


INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('demo1','demo1',1,1,0,1,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('demo2','demo2',1,1,72,2,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('demo3','demo3',1,1,72,2,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('demo21','demo21',1,1,73,3,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('demo22','demo22',1,1,73,3,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('demo23','demo23',1,1,73,3,1,0);



INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('StuManager','学生管理模块',1,1,0,1,1,0);

二级列表：
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('AddStudents','添加列表',1,1,90,2,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('CroomManger','座位管理',1,1,90,2,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('CroomManger','考试座位管理',1,1,90,2,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('BaiDuEditer','百度编辑器功能',1,1,90,2,1,0);



三级列表:
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('index','添加学生',1,1,95,3,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('recycle','回收站',1,1,95,3,1,0);


INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('index','座位管理',1,1,97,3,1,0);



INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('lesssion','上课安排',1,1,97,3,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('examManger','考试安排',1,1,97,3,1,0);

INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('lesssionDistribution','上课分配',1,1,97,3,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('examrDistribution','考试分配',1,1,97,3,1,0);
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('examResult','考试分配结果',1,1,97,3,1,0);





学生列表的显示：

用户的显示的字段名称：
账号  名字  校区  学院  专业  年级  班别  培训期数



查看对应的培训的期数：
select period from dx_stu_login   group by period


<?php if (condition):?>

html code to run if condition is true

<?php else: ?>

html code to run if condition is false

<?php endif ?>




这个是教室管理表：【分为上课  考试】

DROP TABLE IF EXISTS `dx_classroom`;
CREATE TABLE IF NOT EXISTS `dx_classroom` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `roomname` varchar(500) DEFAULT NULL COMMENT '教室名称',
  `roomtime` varchar(50) DEFAULT NULL COMMENT '教室的时间',
  `apartment` varchar(50) DEFAULT NULL COMMENT '教室的栋数',
  `roomsize` int(10) DEFAULT NULL COMMENT '教室的规格[存放多少座]',
  `manager` varchar(500) DEFAULT NULL COMMENT '教室管理者',
  `flag` varchar(100)  DEFAULT '教室' COMMENT 'flag上课教室 考试教室[默认是教室]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='上课与教室表' AUTO_INCREMENT=1 ;


// roomname  roomtime apartment  roomsize manager  flag


存放教室的具体信息表：
DROP TABLE IF EXISTS `dx_classroomMangerInfo`;
CREATE TABLE IF NOT EXISTS `dx_classroomMangerInfo` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `roomname` varchar(500) DEFAULT NULL COMMENT '教室名称',
  `roomtime` varchar(50) DEFAULT NULL COMMENT '使用时间',
   `apartment` varchar(50) DEFAULT NULL COMMENT '教室的栋数',
  `roomsize` int(10) DEFAULT NULL COMMENT '教室的规格[存放多少座]',
  `roomrealsize` int(10) DEFAULT NULL COMMENT '实际分配的规格',
  `manager` varchar(500) DEFAULT NULL COMMENT '教室管理者',
  `flag` varchar(100)  DEFAULT '教室' COMMENT 'flag则为上课教室 否则为考试教室[默认是教室]',
  `managerContent` text  DEFAULT NULL COMMENT '具体分配情况',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='上课与教室详情分配表' AUTO_INCREMENT=1 ;


以下就做不到了，只支持一种格式

这个格式是通吃2种Excel的格式:
$objReader=IOFactory::createReaderForFile($targetfile);




// 创建一个课室的具体的分配内容表单
DROP TABLE IF EXISTS `dx_examAllocation`;
CREATE TABLE IF NOT EXISTS `dx_examAllocation` (
  `id` int(30) NOT NULL AUTO_INCREMENT COMMENT '自增的id',
  `roomId` varchar(500) DEFAULT NULL COMMENT '教室id',
  `FpRoomname` varchar(500) DEFAULT NULL COMMENT '教室名称',
  `stuId` varchar(50) DEFAULT NULL COMMENT '期数id',
  `perName` varchar(50) DEFAULT NULL COMMENT '期数名称',
   `parttime` date DEFAULT NULL COMMENT '分配时间',
   `parttimeInfo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '具体分配时间',
  `allocationcomment` varchar(500) DEFAULT NULL COMMENT '分配说明',
  `aInstru` varchar(500) DEFAULT NULL COMMENT '额外字段',
  `realsize` varchar(50) DEFAULT NULL COMMENT '实际座拍人数',
  `fpcondition` varchar(100)  DEFAULT NULL COMMENT '分配情况[1代表是教室人数小于座位数  2代表教室人数大于座位数',
  `fpuserinfo` varchar(100)  DEFAULT NULL COMMENT '分配情况为2时,剩下的是学生个人今天信息的内容值',
  `fpuserinfocount` varchar(100)  DEFAULT NULL COMMENT '分配情况为2时,统计人数',
  `bigData` text  DEFAULT NULL COMMENT '具体分配情况',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='课室的具体的分配内容' AUTO_INCREMENT=1 ;






// 一次性进行关联3张表数据关联
select * from dx_examAllocation ea left join dx_classroomMangerInfo cm on ea.roomId = cm.id
select * from dx_examAllocation ea left join dx_classroomMangerInfo cm on ea.roomId = cm.id where ea.id=1






                    [id] => 1
                    [roomId] => 1
                    [FpRoomname] =>  A2-3
                    [stuId] => 3
                    [perName] => 第3期
                    [parttime] => 2015-09-09
                    [parttimeInfo] => 2015-09-09 00:18:57
                    [allocationcomment] => 
                    [aInstru] => 
                    [realsize] => 13
                    [bigData] => [{"no":"4aisrGAwWOE7","idname":"11345465482","username":"vd","num":"1"},{"no":"IE2hssvI2cCQ","idname":"114354330382","username":"颇多","num":"3"},{"no":"iGFM8SPbd7i9","idname":"423432543","username":"\r\n\r\n\r\n\r\n收到","num":"5"},{"no":"iPAwAmVsoaiw","idname":"11545654382","username":"普拉达","num":"7"},{"no":"NRRh2tsDcR6B","idname":"112345657","username":"门呃","num":"9"},{"no":"Ocnl8CrA3GMG","idname":"1146362","username":"速度","num":"12"},{"no":"P2XFGdAO49qm","idname":"11123343","username":"李泽","num":"14"},{"no":"t5sYndcMAGO0","idname":"11234365365482","username":"搜罗","num":"17"},{"no":"tWUmYOy64OPh","idname":"11209090382","username":"赖豪达","num":"19"},{"no":"UkCXhRD8BhtL","idname":"1125677787","username":"配送单","num":"23"},{"no":"VrSzgKsLDuim","idname":"14453432","username":"潘老师","num":"25"},{"no":"yqAWK6cqE6Vk","idname":"4354309090382","username":"大帝","num":"29"},{"no":"YWQy8UR0AzEg","idname":"9934u893454","username":"plsd","num":"30"}]
                    [roomname] => A2-3
                    [roomtime] => 
                    [apartment] => A
                    [roomsize] => 300
                    [roomrealsize] => 23
                    [manager] => 
                    [flag] => 考试
                    [managerContent] =>   1  3  5  7  9  12  14  17  19  23  25  29  30  31  34  35  36  41  42  45  46  47  48







SELECT ea.id,ea.roomId,ea.bigData,ea.realsize,ea.perName,ea.parttimeInfo,ea.parttime,cm.roomname,cm.apartment,cm.roomsize,cm.roomrealsize FROM dx_examAllocation ea LEFT JOIN dx_classroomMangerInfo cm ON ea.roomId = cm.id ORDER BY parttimeInfo desc






SELECT * FROM dx_examAllocation ea LEFT JOIN dx_classroomMangerInfo cm ON ea.roomId = cm.id ORDER BY parttimeInfo desc



SELECT * FROM dx_examAllocation ea LEFT JOIN dx_classroomMangerInfo cm ON ea.roomId = cm.id where ea.id=1 ORDER BY parttimeInfo desc






使用php自带的函数trim()

<?php
$str="aaaa";
echo trim($str);
?>