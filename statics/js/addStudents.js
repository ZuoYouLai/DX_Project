$(function(){


	//批量添加用户 事件
	$("#addAllstu").click(function(){
		$("#myUpFile").click();
		$("#addAllstu").hide();
		$("#okAddAllstu").show();
	});


	// 确定添加
	$("#okAddAllstu").click(function(){
		$("#myupFormFile").submit();
	});

});