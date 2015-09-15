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
                <strong>列表</strong></div>
            <div class="padding border-bottom">
               <strong >查看学院:</strong>
                <select name="" id="myselect">
                    <option value="">请选择</option>
                         <?php foreach($group as $v):?>
                             <?php if ($v['belong']==$belong):?>
                                    <option value="<?php echo $v['belong'];  ?>" selected = "selected">
                              <?php else: ?>
                                    <option value="<?php echo $v['belong'];  ?>">
                              <?php endif ?>
                              <?php echo $v['belong'];  ?>
                         </option>
                    <?php endforeach ?>
                </select>
            </div>
            <table class="table table-hover">
                <tr>
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
                    <th width="150">
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;操作
                    </th>
                </tr>
                <?php foreach($newuserinfos as $v):?>
                    <tr>
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
                    <td >
                        <input type="button"  class="button button-small border-yellow mr35 Drbtn" value="导入成绩" />
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>
 <script type="text/javascript" src="statics/js/jquery.js"></script>
 <script type="text/javascript" src="statics/js/mark.js"></script>
</html>