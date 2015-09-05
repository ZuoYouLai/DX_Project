

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




这个格式是通吃2种Excel的格式:
$objReader=IOFactory::createReaderForFile($targetfile);


以下就做不到了，只支持一种格式