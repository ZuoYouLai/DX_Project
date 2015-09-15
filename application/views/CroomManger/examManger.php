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
    <title>考试管理模块</title>
    <base href="<?php echo base_url(); ?>" />
    <link type="text/css" rel="stylesheet" href="statics/css/pintuer.css" />
    <link type="text/css" rel="stylesheet" href="statics/css/admin.css" />
    <script type="text/javascript" src="statics/js/jquery.js"></script>
    <script type="text/javascript" src="statics/js/examManger.js"></script>
</head>
<body>
    <div class="admin">
        <div class="panel admin-panel">
            <div class="panel-head">
                <strong>学生考试座位安排规格</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small border-green" value="添加教室" onclick="location.href='index.php/CroomManger/add';" />
                <input type="button" id='addAllstu' class="button button-small border-yellow" value="教室座位规格导入Excel说明" />
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="100">
                       教室名称 
                    </th>
                    <th width="120">
                        教室的栋数
                    </th>
                    <th width="120">
                        教室规格
                    </th>
                    <th width="200">
                        类型
                    </th>
                    <th width="150">
                        &ensp;&ensp;&ensp;&ensp;操作
                    </th>
                </tr>
                <?php foreach($newuserinfos as $v):?>
                    <tr>
                    <td >
                        <strong>
                            <?php echo $v['roomname'];  ?>
                        </strong>
                    </td>
                    <td >
                       <?php echo $v['apartment'];  ?>                 
                    <td>
                        <?php echo $v['roomsize'];  ?>  
                    </td>
                    <td >
                        <?php echo $v['flag'];  ?>
                    </td>
                    <td >
                        <input type="button" id='checkExcel' class="button button-small border-black" value="选择EXCEL" />
                        <input type="button" id='okExcel' class="button button-small border-blue hideblock" value="确认座位安排" idvalue="<?php echo $v['id'];  ?>"/>
                    </td>
                    </tr>
                <?php endforeach ?>
                
            </table>

        </div>
    </div>
    <!-- 隐藏域进行隐藏对应的Form操作 -->
    <form method="POST"  enctype="multipart/form-data" action="<?php echo site_url().'/CroomManger/ExamoneRoomExcel'; ?>" id="myupFormFile">
        <input type='file' name='Excel' id='myUpFile'>
        <input type='text' name='flag'  value=" <?php echo $flag;  ?>">
    </form>
</body>
</html>