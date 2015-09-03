$(function(){

	var 
		$addAllstu=$("#addAllstu"),
		$okAddAllstu=$("#okAddAllstu"),
		$dataids=$("#dataids"),
		$onecheck=$(".onecheck"),
		$Cancelstu=$("#Cancelstu"),
		$mydelData=$("#mydelData"),
		$Restorestu=$("#Restorestu"),
		$restoreids=$("#restoreids"),
		$myselect=$("#myselect"),
		$myrestoreData=$("#myrestoreData"),
		$checkall=$("#checkall");

	//批量添加用户 事件
	$addAllstu.click(function(){
		$("#myUpFile").click();
		$("#addAllstu").hide();
		$("#okAddAllstu").show();
	});


	// 确定添加
	$okAddAllstu.click(function(){
		$("#myupFormFile").submit();
	});



	//全选的事件的触发
	$checkall.click(function(){
		//判断全选的标准
		var isAllflag=$(this).attr("isAllflag");
		if (isAllflag=="0") {
			$(this).attr("isAllflag","1");
		}else{
			$(this).attr("isAllflag","0");
		}
		$onecheck.each(function(){
			var isflag=$(this).attr("isflag");
			if (isAllflag=="0") {
				if (isflag=="0") {
					$(this).click();
					$(this).attr("isflag","1");
				}
			}else{
				if (isflag=="1") {
					$(this).click();
					$(this).attr("isflag","0");
				}
			}
			
		});
	});



	//单选的事件
	$onecheck.click(function(){
		var isflag=$(this).attr("isflag");
		if (isflag=="0") {
			$(this).attr("isflag","1");
		}else{
			$(this).attr("isflag","0");
		}
	});


	// 批量删除进行对应选中的用户的删除
	$Cancelstu.click(function(){
		var arr=[];
		$onecheck.each(function(){
			var 
			 isflag=$(this).attr("isflag"),
			 dataid=$(this).attr("dataid");
			if(isflag=="1"){
				arr.push(dataid.trim());
			}
		});
		if (arr.length<1) {
			alert('请选择选择目标数据进行删除...');
			return;
		};
		// 表单的操作较为适合
		$dataids.val(arr.join(","));
		// 提交表单
		$mydelData.submit();
		// //提交数据
		// $.ajax({
		// url:'/studyCI/index.php/project/Authorization/ajaxTreeRoleData',
		// type:'POST',
		// success:function(data,status){
		// 	// alert(data);
		// 	var $data=JSON.parse(data);
		// 	debugger;
		// 	$.fn.zTree.init($("#treeDemo"), setting, $data);
		// },
		// error:function(){

		// }
	     // });
	});





	// 批量删除进行对应选中的用户的删除
	$Restorestu.click(function(){
		var arr=[];
		$onecheck.each(function(){
			var 
			 isflag=$(this).attr("isflag"),
			 dataid=$(this).attr("dataid");
			if(isflag=="1"){
				arr.push(dataid.trim());
			}
		});
		if (arr.length<1) {
			alert('请选择选择目标数据进行还原...');
			return;
		};
		// 表单的操作较为适合
		$restoreids.val(arr.join(","));
		// 提交表单
		$myrestoreData.submit();
	});

	// 当下拉框进行变化
	$myselect.change(function(){
		// alert($(this).val());
		var period=$(this).val();
		location.href='index.php/AddStudents/index?period='+period;
	});


});