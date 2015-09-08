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
                <strong>分配结果</strong></div>
            <table class="table table-hover">
                <tr>
                    <th width="100">
                       教室名称 
                    </th>
                    <th width="120">
                        教室规格
                    </th>
                    <th width="120">
                        教室可座数
                    </th> 
                    
                     <th width="120">
                       分配实际人数
                    </th>
                    <th width="100">
                        学生期数
                    </th>
                    <th width="120">
                       分配日期
                    </th>
                     <th width="220">
                       分配时间
                    </th>
                    <th width="200">
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;操作
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
                       <?php echo $v['roomsize'];  ?>                 
                    <td>
                        <?php echo $v['roomrealsize'];  ?>  
                    </td> 
                   
                    <td >
                        <?php echo $v['realsize'];  ?>
                    </td>
                    <td >
                        <?php echo $v['perName'];  ?>
                    </td>
                     <td>
                        <?php echo $v['parttime'];  ?>  
                     </td>
                      <td>
                        <?php echo $v['parttimeInfo'];  ?>  
                     </td>
                    <td >
                        <input type="button" id='checkExcel' class="button button-small border-blue" value="详情"  onclick="location.href='index.php/Allocation/getInfo?id='+<?php echo $v['id'];  ?>" />
                        <input type="button" id='checkExcel' class="button button-small border-red" value="删除"  onclick="location.href='index.php/Allocation/deleteOne?id='+<?php echo $v['id'];  ?>" />
                        <input type="button" id='checkExcel' class="button button-small border-yellow" onclick="location.href='index.php/Allocation/downExcel?id='+<?php echo $v['id'];  ?>" value="打印Excel" />
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>


        </div>
    </div>
</body>
</html>