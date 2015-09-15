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
                <strong>详情列表</strong></div>
            <div class="padding border-bottom">
               <div class="form-group">
                        <div class="label">
                            <label for="readme">考试名称:</label></div>
                        <div class="field">
                            <input type="text" class="input" id='examName' name="roomname" size="50" placeholder="考试名称" />
                        </div>
               </div>
               <div class="form-group">
                        <div class="label">
                            <label for="readme">备注:</label></div>
                        <div class="field">
                            <input type="text" class="input" id="examBz" name="roomname" size="50" placeholder="备注" />
                        </div>
               </div>

                <input type="button"  class="button button-small border-blue  " value="导入Excel"  id="markexcel"/>
                <input type="button"  class="button button-small border-red hide" value="确认导入" id="oksubmit"/>

            </div>
            <table class="table table-hover">
                <tr>
                    <th width="50">
                        
                    </th>
                    <th width="150">
                        学院
                    </th>
                    <th width="100">
                       培训期数 
                    </th>
                    <th width="120">
                        人数
                    </th>
                    <th width="200">
                        校区
                    </th>
                </tr>
                <?php foreach($newuserinfos as $v):?>
                    <tr>
                    <td></td>
                    <td >
                        <strong>
                            <?php echo $v['belong'];  ?>
                        </strong>
                    </td>
                    <td >
                       <?php echo $v['period'];  ?>                 
                    <td>
                        <?php echo $v['counts'];  ?>  
                    </td>
                    <td >
                       <?php echo $v['zone'];  ?>
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <!-- 隐藏域进行隐藏对应的Form操作 -->
    <form method="POST"  enctype="multipart/form-data" action="<?php echo site_url().'/MarkManager/addmarks'; ?>" id="myupFormFile">
        <input type='file' name='Excel' id='myUpFile'>
        <input type="text" name="examname" id="examvalue">
        <input type="text" name="bz" id="bzvalue">
        <input type="text" name="belong" value="<?php echo $belong ?>">
        <input type="text" name="period" value="<?php echo $period ?>">
    </form>
</body>
 <script type="text/javascript" src="statics/js/jquery.js"></script>
 <script type="text/javascript" src="statics/js/mark.js"></script>
</html>