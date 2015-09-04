$(function(){
		function Register()
	{
		//校验用户信息的位数
		this.checkTextContentNum=function(obj,len)
		{
			var tobj=$("#"+obj).val();
			if (tobj.length==len) {
				return true;
			}else{
				return false;
			}
		}

		//判断是否有空值
		this.checkIsEmpty=function(obj,objtip,tip)
		{
			var 
				contents=tip||"不可为空",
				$objtip=$("#"+objtip),
				$eobj=$("#"+obj).val();
			if (!$eobj) {
				$objtip
					   .text(contents)
					   .css('color','red');
			}else{
				$objtip
					   .text("ok")
					   .css('color','green');
			}
		}

	}

	var 
		$textallobj=$(':text'),
		register=new Register(),
		$roomsizetip=$("#roomsizetip");


	// 进行表单的提交
	$("#FormId").click(function(){
		// alert($textallobj.length);
		var flg=0;
		$textallobj.each(function(){
			var 
				content=$(this).val(),
			 	$targetid=$(this).attr('id'),
			 	targettipid=$targetid+'tip';
			if (!content) {
				register.checkIsEmpty($targetid,targettipid);
				flg=1;
			}else{
				// 判断数值类型
				if ($targetid=="roomsize") {
					if(!parseInt(content))
					{
						$roomsizetip.text('请填写对应的数字');
						flg=1;
					}
				};
			}
		});

		if (flg) return false;

	});





});