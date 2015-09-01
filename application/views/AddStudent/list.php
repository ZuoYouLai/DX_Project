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
    <script type="text/javascript" src="statics/js/pintuer.js"></script>
    <script type="text/javascript" src="statics/js/respond.js"></script>
    <script type="text/javascript" src="statics/js/addStudents.js"></script>
    <style type="text/css">
        #okAddAllstu{display: none;}
    </style>
</head>
<body>
    <div class="admin">
        <form method="post">
        <div class="panel admin-panel">
            <div class="panel-head">
                <strong>内容列表</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" checkfor="id" value="全选" />
                <input type="button" class="button button-small border-green" value="添加用户" onclick="location.href='index.php/Node/add';" />
                <input type="button" class="button button-small border-blue" value="回收站" />
            </div>
            <div class="padding border-bottom">
                <input type="button" id='addAllstu' class="button button-small border-yellow" value="批量添加用户" />
                <input type="button" id='okAddAllstu' class="button button-small border-blue" value="确定添加" />
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="45">
                        
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
                       操作
                    </th>
                </tr>
                <?php foreach($newuserinfos as $v):?>
                    <tr>
                    <td >
                        <input type="Checkbox">
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
                       详情  ||  删除
                    </td>
                    </tr>
                <?php endforeach ?>
                
            </table>
        </div>
        </form>
    </div>
    <!-- 隐藏域进行隐藏对应的Form操作 -->
    <form method="POST"  enctype="multipart/form-data" action="<?php echo site_url().'/AddStudents/addAlls'; ?>" id="myupFormFile">
        <input type='file' name='Excel' id='myUpFile'>
    </form>

</body>
</html>