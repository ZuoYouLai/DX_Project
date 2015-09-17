$(function(){

	var $passInfo=$('#passInfo'),
		$NopassInfo=$('#NopassInfo'),
		$AllpassInfo=$('#AllpassInfo'),
		$markFlag=$('.markFlag');


	var doShowData=function(flag)
	{

		switch(flag)
		{
			case 0:
			$.each($markFlag,function(){
				var mark=parseInt($(this).text().trim());
				if (mark>=60) {
					$(this).parent().hide();
				}else{
					$(this).parent().show();
				}
			});
			break;
			case 1:
			$.each($markFlag,function(){
				var mark=parseInt($(this).text().trim());
				if (mark<60) {
					$(this).parent().hide();
				}else{
					$(this).parent().show();
				}
			});

			break;
			case 2:
			$.each($markFlag,function(){
				$(this).parent().show();
			});
			break;
		}
	}

	// 显示合格信息
	$NopassInfo.click(function(){
		doShowData(0);
	});


	// 显示不合格信息
	$passInfo.click(function(){
		doShowData(1);
	});



	// 显示全部信息
	$AllpassInfo.click(function(){
		doShowData(2);
	});
	









});