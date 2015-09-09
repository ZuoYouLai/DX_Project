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
    <script type="text/javascript" src="statics/js/roomManger.js"></script>
</head>
<body>
    <div class="admin">
        <div class="tab">
            <div class="tab-head">
                <strong>教室管理</strong>
                 <!-- roomname  roomtime  roomsize manager  flag -->

            </div>
            <div class="tab-body">
                <br />
                <div class="tab-panel active" id="tab-set">
                    <form method="post" class="form-x" action="index.php/CroomManger/cHanOneRoom">
                     <?php foreach($newuserinfos as $v):?>
                     <input type="text" class="input hide" value=" <?php echo $v['id'];  ?>" name="id" />
                    <div class="form-group">
                        <div class="label">
                            <label for="readme">教室名称:</label></div>
                        <div class="field">
                            <input type="text" class="input" value=" <?php echo $v['roomname'];  ?>" name="roomname" size="50" placeholder="教室名称"  class="isPNull"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="sitename">栋数:</label></div>
                        <div class="field">
                            <input type="text" class="input" value=" <?php echo $v['apartment'];  ?>" name="apartment" size="50" placeholder="栋数" class="isPNull"/>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="label">
                            <label for="keywords">教室类型:</label></div>
                        <div class="field">
                        	<input type="text" class="input" value=" <?php echo $v['flag'];  ?>" name="flag" size="50" placeholder="栋数" disabled="disabled"/>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="label">
                            <label for="title">教室规格:</label></div>
                        <div class="field">
                            <input type="text" class="input" value=" <?php echo $v['roomsize'];  ?>" name="roomsize" size="1" placeholder="教室规格"  />
                        </div>
                    </div>
					 <?php endforeach ?>
                    <div class="form-button">
                        <button class="button bg-main" type="submit" id='FormId'>提交</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
