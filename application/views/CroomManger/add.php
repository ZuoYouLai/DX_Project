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
    <title>教室座位管理</title>
    <base href="<?php echo base_url(); ?>" />
    <link type="text/css" rel="stylesheet" href="statics/css/pintuer.css" />
    <link type="text/css" rel="stylesheet" href="statics/css/admin.css" />
    <script type="text/javascript" src="statics/js/jquery.js"></script>
</head>
<body>
    <div class="admin">
        <div class="tab">
            <div class="tab-head">
                <strong>教室管理</strong>
            </div>
            <div class="tab-body">
                <br />
                <div class="tab-panel active" id="tab-set">
                    <form method="post" class="form-x" action="index.php/CroomManger/addOneInfo">
                    <div style="display:none;">
	                	<input type="hidden" name="cmd" value="submit" />
	                </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="readme">教室名称:</label></div>
                        <div class="field">
                            <input type="text" class="input" id="name" name="name" size="50" placeholder="教室名称" data-validate="required:请填写英文名称" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">栋数:</label></div>
                        <div class="field">
                            <input type="text" class="input" id="title" name="title" size="50" placeholder="栋数" data-validate="required:请填写中文名称" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="title">教室规格</label></div>
                        <div class="field">
                            <input type="text" class="input" id="sort" name="sort" size="1" placeholder="教室规格" value="1" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="keywords">教室类型</label></div>
                        <div class="field">
                            <select name="" id="">
                                <option value="">请选择</option>
                                <option value="1">教室</option>
                                <option value="2">考试</option>
                            </select>
                        </div>
                    </div>
                    <input type="text" class="hideblock" value="<?php echo "===";?>"> 
                    <div class="form-button">
                        <button class="button bg-main" type="submit">提交</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
