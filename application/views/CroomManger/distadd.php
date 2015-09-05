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
    <title>考试分配【单】</title>
    <base href="<?php echo base_url(); ?>" />
    <link type="text/css" rel="stylesheet" href="statics/css/pintuer.css" />
    <link type="text/css" rel="stylesheet" href="statics/css/admin.css" />
    <script type="text/javascript" src="statics/js/jquery.js"></script>
    <script type="text/javascript" src="statics/js/distadd.js"></script>
</head>
<body>
    <div class="admin">
        <div class="panel admin-panel">
            <div class="panel-head">
                <strong>学生考试座位分配</strong></div>
            <div class="padding border-bottom">
                <strong>选择培训期数:</strong>
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
                <input type="button" id='FPbtn' class="button button-small border-yellow mr35" value="一键分配" />
                 
                <input type="button" id='getFP' class="button button-small border-yellow mr35 hideblock" value="查看分配情况" />
                
                <input type="button" id='downExcle' class="button button-small border-yellow mr35 hideblock" value="下载Excle" />


            </div>  
             <div class="padding border-bottom">
                <strong >培训期数:</strong>&nbsp;
                第&nbsp;<span id='targetspanNum'></span>&nbsp;期
                <strong class='pl35'>总人数:</strong>
                <span id='targetSNum'></span>&nbsp;人
            </div>

            <div class="padding border-bottom">
                <span id="targetrmid" class="hideblock">
                    <?php echo $id;  ?>
                </span>
                <strong>实际座位总数:</strong>
                <span id="roomrealsize"><?php echo $roomrealsize;  ?></span>
                人
                <br>
                <strong>实际座位情况:</strong>
                <span id="managerContent">
                     <?php echo $managerContent;  ?>
                </span>
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
                    <th width="120">
                       实则分配规格
                    </th>
                    <th width="200">
                        类型
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
                    <td>
                        <?php echo $v['roomrealsize'];  ?>  
                    </td>
                    <td >
                        <?php echo $v['flag'];  ?>
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>
            </div>
            
      
    </div>
</body>
</html>