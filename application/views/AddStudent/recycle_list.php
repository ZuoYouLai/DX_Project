<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit" />
    <title>学生添加模块</title>
    <base href="<?php echo base_url(); ?>" />
    <link type="text/css" rel="stylesheet" href="statics/css/pintuer.css" />
    <link type="text/css" rel="stylesheet" href="statics/css/admin.css" />
    <script type="text/javascript" src="statics/js/jquery.js"></script>
    <script type="text/javascript" src="statics/js/addStudents.js"></script>
    <style type="text/css">
        #okAddAllstu{display: none;}
        .hblock{display: none }
        .rfont{color: red;}        
        .bfont{color: blue;}        
        .gfont{color: green;}        
    </style>
</head>
<body>
    <div class="admin">
        <div class="panel admin-panel">
            <div class="panel-head">
                <strong>回收站</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" id='checkall' value="全选" isAllflag="0" />
                <input type="button" class="button button-small border-blue" value="批量复原"  id="Restorestu" />
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="45" >
                        
                    </th>
                    <th width="100">
                        删除时间
                    </th>
                    <th width="100">
                       培训期数 
                    </th>
                    <th width="120">
                        名字
                    </th>
                    <th width="120">
                        账号
                    </th>
                    <th width="200">
                        校区
                    </th>
                     <th width="150">
                        学院
                    </th>
                    <th width="200">
                        专业
                    </th>
                    <th width="100">
                       年级
                    </th>
                    <th width="50">
                       班别
                    </th>
                    <th width="150">
                      &nbsp; &nbsp; &nbsp; 操作
                    </th>
                </tr>
                <?php foreach($newuserinfos as $v):?>
                    <tr>
                    <td >
                        <input type="Checkbox" isflag="0" class='onecheck' dataid="<?php echo $v['id'];  ?> ">
                    </td>
                    <td class='rfont'>
                       <?php echo $v['recycletime'];  ?>
                    </td>
                     <td >
                       <?php echo $v['period'];  ?>
                    </td>
                    <td >
                       <?php echo $v['name'];  ?>                 
                    <td>
                        <?php echo $v['user_name'];  ?>  
                    </td>
                    <td >
                        <?php echo $v['school_zone'];  ?>
                    </td>
                     <td >
                        <?php echo $v['belong'];  ?>
                    </td>
                    <td >
                         <?php echo $v['specialty'];  ?>
                    </td>
                    <td >
                         <?php echo $v['ngrade'];  ?>
                    </td>
                    <td >
                       <?php echo $v['class'];  ?>
                    </td>
                    <td >
                        <a href="" class='gfont'>详情</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp;
                        <a href="<?php echo site_url().'/AddStudents/restoreonedata?id='.$v['id']; ?>" class='bfont'>还原</a>
                    </td>
                    </tr>
                <?php endforeach ?>
                
            </table>
             <div class="panel-foot text-center">
                <?php echo $page; ?>
            </div>
        </div>
    </div>
    <!-- 进行批量还原的操作 -->
    <form method="POST"  enctype="multipart/form-data" action="<?php echo site_url().'/AddStudents/restore'; ?>" id="myrestoreData">
        <input type='text' name='restoreids' id='restoreids'>
    </form>

</body>
</html>