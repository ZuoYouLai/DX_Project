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
                <strong>学生考试分配情况</strong></div>
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
                       分配时间
                    </th>
                     <th width="120">
                       分配实际人数
                    </th>
                    <th width="200">
                        学生期数
                    </th>
                    <th width="150">
                        &ensp;&ensp;&ensp;&ensp;操作
                    </th>
                </tr>


                    [id] => 1
                    [roomId] => 1
                    [stuId] => 3
                    [perName] => 第3期
                    [parttime] => 2015-09-07
                    [parttimeInfo] => 2015-09-07 22:59:49
                    [allocationcomment] => 
                    [aInstru] => 
                    [realsize] => 13
                    [bigData] => [{"no":"5QUhBQmTnruM","idname":"11234365365482","username":"搜罗","num":"1"},{"no":"7hiGO3Lz6al0","idname":"14453432","username":"潘老师","num":"3"},{"no":"8GOVepDVPSlp","idname":"1125677787","username":"配送单","num":"5"},{"no":"eTML6bN4znVk","idname":"9934u893454","username":"plsd","num":"7"},{"no":"fMBzdATGHsLa","idname":"114354330382","username":"颇多","num":"9"},{"no":"GpeZBERfrINX","idname":"11545654382","username":"普拉达","num":"12"},{"no":"Gs5eV0oGBTKQ","idname":"11123343","username":"李泽","num":"14"},{"no":"iCNTsDyQHBCl","idname":"423432543","username":"\r\n\r\n\r\n\r\n收到","num":"17"},{"no":"KcsdoN7TtL2R","idname":"112345657","username":"门呃","num":"19"},{"no":"Ki6aBOgTWBRB","idname":"1146362","username":"速度","num":"23"},{"no":"nMXoDDKelDYv","idname":"4354309090382","username":"大帝","num":"25"},{"no":"PdcXSGAHfbhE","idname":"11209090382","username":"赖豪达","num":"29"},{"no":"zeMzLwMYckGn","idname":"11345465482","username":"vd","num":"30"}]
                    [roomname] => A2-3
                    [roomtime] => 
                    [apartment] => A
                    [roomsize] => 300
                    [roomrealsize] => 23
                    [manager] => 
                    [flag] => 考试
                    [managerContent] =>   1  3  5  7  9  12  14  17  19  23  25  29  30  31  34  35  36  41  42  45  46  47  48






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
                    <td>
                        <?php echo $v['parttime'];  ?>  
                    </td>
                    <td >
                        <?php echo $v['realsize'];  ?>
                    </td>
                    <td >
                        <?php echo $v['perName'];  ?>
                    </td>
                    <td >
                        <input type="button" id='checkExcel' class="button button-small border-blue" value="详情"  onclick="location.href='index.php/Allocation/getInfo?id='+<?php echo $v['id'];  ?>" />
                        <input type="button" id='checkExcel' class="button button-small border-yellow" value="打印Excel" />
                    </td>
                    </tr>
                <?php endforeach ?>
            </table>


        </div>
    </div>
</body>
</html>