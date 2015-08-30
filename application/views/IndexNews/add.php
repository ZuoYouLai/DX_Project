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
    <title>广东医学院党校培训系统后台管理</title>
    <base href="<?php echo base_url(); ?>" />
    <link type="text/css" rel="stylesheet" href="statics/css/pintuer.css" />
    <link type="text/css" rel="stylesheet" href="statics/css/admin.css" />
    <script type="text/javascript" src="statics/js/jquery.js"></script>
    <script type="text/javascript" src="statics/js/pintuer.js"></script>
    <script type="text/javascript" src="statics/js/respond.js"></script>
    <script type="text/javascript" src="statics/plugin/ckfinder/ckfinder.js"></script>
    <script language="javascript">
    	var $img=null;//预览图片
	    function BrowseServer(inputId){ 
		    var finder = new CKFinder() ; 
		    finder.basePath = 'statics/plugin/ckfinder/'; //导入CKFinder的路径 
		    finder.selectActionFunction = SetFileField; //设置文件被选中时的函数 
		    finder.selectActionData = inputId; //接收地址的input ID 
		    finder.popup() ; 
	    } 
	    //文件选中时执行 
	    function SetFileField(fileUrl,data){ 
	    	if($img){
				$($img).remove();
			}
	    	document.getElementById(data["selectActionData"]).value = fileUrl ; 
	    	$img=$('<img alt="" width="34" height="34" src="'+fileUrl+'">');
	    	$('.input-file').after($img);
	    }
</script>
    
</head>
<body>
    <div class="admin">
        <div class="tab">
            <div class="tab-head">
                <strong>添加首页新闻</strong>
            </div>
            <div class="tab-body">
                <br />
                <div class="tab-panel active" id="tab-set">
                    <form method="post" class="form-x" action="index.php/IndexNews/add">
                    <div style="display:none;">
	                	<input type="hidden" name="cmd" value="submit" />
	                </div>
	                <div class="form-group">
                        <div class="label"><label for="siteurl">所属栏目</label></div>
                        <div class="field">
                            <select id="pid" name="pid" class="input">
                            	<?php 
                            	if ($parent){
                            		foreach ($parent as $item){
                            			?>
                            			<option value="<?php echo $item['id']; ?>"><?php echo $item['section_name']; ?></option>
                            			<?php 
                            		}
                            	}
                            	?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label"><label for="readme">新闻标题</label></div>
                        <div class="field">
                            <input type="text" class="input" maxlength="10" id="section_name" name="section_name" size="50" placeholder="新闻标题" data-validate="required:请填写新闻标题" />
                        </div>
                    </div>
					<div class="form-group">
                        <div class="label"><label for="readme">新闻作者</label></div>
                        <div class="field">
                            <input type="text" class="input" maxlength="10" id="author" name="author" size="50" placeholder="新闻作者" data-validate="required:请填写新闻作者" />
                        </div>
                    </div>
					<div class="form-group">
                        <div class="label"><label for="readme">新闻来源</label></div>
                        <div class="field">
                            <input type="text" class="input" maxlength="10" id="source" name="source" size="50" placeholder="新闻来源" data-validate="required:请填写新闻来源" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="label">
                            <label for="desc">新闻内容</label></div>
                        <div class="field">
                            <textarea id="content" name="content" maxlength="100" class="input" rows="5" cols="50" placeholder="请填写新闻内容"></textarea>
                        </div>
                    </div>
                    <div class="form-button">
                        <button class="button bg-main" type="submit">提交</button></div>
                    </form>
                </div>
            </div>
        </div>
        <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">居俪网</a>构建</p>
    </div>
</body>
</html>
