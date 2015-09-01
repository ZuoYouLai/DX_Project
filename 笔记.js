

localhost/DX_Project/


alter table dx_stu_login add ngrade varchar(30) DEFAULT NULL COMMENT '年级'


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
INSERT INTO dx_node(NAME,title,STATUS,sort,pid,LEVEL,TYPE,group_id) VALUES('index','添加学生',1,1,95,2,1,0);




学生列表的显示：

用户的显示的字段名称：
账号  名字  校区  学院  专业  年级  班别  培训期数