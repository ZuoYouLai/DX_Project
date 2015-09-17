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
                <input type="button"  class="button button-small border-green" value="打印成绩单" onclick="location.href='index.php/MarkManager/onedataInfo?id='+<?php echo "==";  ?>;"/>
            </div>
            <div class="padding border-bottom">
                <input type="button"  class="button button-small border-yellow" value="合格信息" id="passInfo"/>
                <input type="button"  class="button button-small border-red" value="不合格信息" id="NopassInfo"/>
            	<input type="button"  class="button button-small border-blue" value="全部信息" id="AllpassInfo"/>
            </div>
            <table class="table table-hover">
                <tr>
                	 <th width="200">
                        考试名称
                    </th>
                    <th width="150">
                        学院
                    </th>
                    <th width="100">
                       培训期数 
                    </th>
                    <th width="50">
                        人数
                    </th>
                    <th width="150">
                        校区
                    </th>
                    <th width="80">
                        合格率
                    </th>
                    <th width="80">
                        平均分
                    </th>
                    <th width="200">
                        时间
                    </th>
                </tr>
                <?php foreach($newuserinfos as $v):?>
                    <tr>
                    <td >
                        <strong>
                            <?php echo $v['title'];  ?>
                        </strong>
                    </td>
                    <td >
                            <?php echo $v['belong'];  ?>
                    </td>
                    <td >
                       第<?php echo $v['period'];  ?>期                
                    <td>
                        <?php echo $v['personcount'];  ?>  
                    </td>
                    <td >
                       <?php echo $v['schoolzone'];  ?>
                    </td>
                     <td >
                       <?php echo $v['passpercernt']*100;  ?>%
                    </td>
					<td >
                       <?php echo $v['markcomment'];  ?>
                    </td>
                    <td >
                       <?php echo $v['inportmarkTime'];  ?>
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>

            <div class="padding border-bottom">
                
            </div>
    
            <table class="table table-hover">
                <tr>
                    <th width="100">
                       姓名 
                    </th>
                    <th width="100">
                       培训期数 
                    </th>
                    <th width="100">
                       学号 
                    </th>
                    <th width="80">
                        成绩
                    </th>
                </tr>
                <?php foreach($stuInfo as $v):?>
                    <tr>
                    <td >
                       <?php echo $v['name'];  ?>
                    </td>

                    <td >
                       第<?php echo $v['period'];  ?>期 
                    </td>               
                    
                    <td >
                       <?php echo $v['user_name'];  ?>
                    </td>
                    <td  class="markFlag">
                       <?php echo $v['mark'];  ?>
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>

        </div>
    </div>
    <div class="mainText"></div>
</body>
 <script type="text/javascript" src="statics/js/jquery.js"></script>
  <script type="text/javascript" src="statics/js/resultInfo.js"></script>
</html>