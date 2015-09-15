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
</head>
<body>
    <div class="admin">
        <div class="panel admin-panel">
            <div class="panel-head">
                <strong>学生座位分配情况</strong>  
                <input type="button" id='checkExcel' class="button button-small border-blue mr35"  onclick="location.href='index.php/Allocation/responseTohistory?flag='+'<?php echo $flag;  ?>'" value="返回" />
                <input type="button" id='checkExcel' class="button button-small border-yellow mr15"  onclick="location.href='index.php/Allocation/downExcel?id='+<?php echo $fpid;  ?>" value="打印Excel" /></div>
            <table class="table table-hover">
                <tr>
                    <th width="100">
                       序号 
                    </th>
                    <th width="100">
                       座位 
                    </th>
                    <th width="120">
                       学号
                    </th>
                    <th width="120">
                      名字
                    </th> 
                    <th width="120">
                      类型
                    </th> 
                </tr>
                <?php foreach($newuserinfos as $key => $v):?>
                    <tr>
                    <td >
                        <strong>
                            <?php echo $key+1  ?>
                        </strong>
                    </td>
                    <td >
                       <?php echo $v['num'];  ?>                 
                    <td>
                        <?php echo $v['idname'];  ?>  
                    </td> 
                    <td>
                        <?php echo $v['username'];  ?>  
                    </td>
                     <td>
                       <?php echo $flag;  ?>
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>


        </div>
    </div>
</body>
</html>