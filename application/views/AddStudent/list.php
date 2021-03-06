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
        .mr{margin-right: 20px;}   
        .texlf{padding-left: 30px;}  
    </style>
</head>
<body>
    <div class="admin">
        <div class="panel admin-panel">
            <div class="panel-head">
                <strong>学生列表</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" id='checkall' value="全选" isAllflag="0" />
                <input type="button" class="button button-small border-red" value="批量删除"  id="Cancelstu" />
                <input type="button" class="button button-small border-green" value="添加用户" onclick="location.href='index.php/Node/add';" />
                <strong class="texlf">查看培训期数:</strong>
                <select name="" id="myselect">
                    <option value="">请选择</option>
                    <?php foreach($group as $v):?>
                          <?php if ($v['period']==$period):?>
                                <option value="<?php echo $v['period'];  ?>" selected = "selected">
                          <?php else: ?>
                                <option value="<?php echo $v['period'];  ?>">
                          <?php endif ?>
                             第<?php echo $v['period'];  ?>期
                          </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="padding border-bottom">
                <strong>批量添加用户：</strong>
                <input type="button" id='addAllstu' class="button button-small border-yellow" value="选择EXCEL" />
                <input type="button" id='okAddAllstu' class="button button-small border-blue" value="确定添加" />
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="4
                    5" >
                        
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
                    <td >
                        <strong>
                            <?php echo $v['period'];  ?>
                        </strong>
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
                        <a href="">详情</a>
                        &nbsp;&nbsp;||&nbsp;&nbsp;
                        <a class="rfont" href="<?php echo site_url().'/AddStudents/delonedata?id='.$v['id']; ?>">删除</a>
                    </td>
                    </tr>
                <?php endforeach ?>
                
            </table>
        </div>
        <div class="panel-foot text-center">
                <?php echo $page; ?>
        </div>
    </div>
    <!-- 隐藏域进行隐藏对应的Form操作 -->
    <form method="POST"  enctype="multipart/form-data" action="<?php echo site_url().'/AddStudents/addAlls'; ?>" id="myupFormFile">
        <input type='file' name='Excel' id='myUpFile'>
    </form>
    <!-- 进行批量删除的操作 -->
    <form method="POST"  enctype="multipart/form-data" action="<?php echo site_url().'/AddStudents/delmores'; ?>" id="mydelData">
        <input type='text' name='ids' id='dataids'>
    </form>

</body>
</html>