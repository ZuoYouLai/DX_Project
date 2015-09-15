$(function(){
	// console.log('======');
	// 单选框的对象
	var $myselect=$('#myselect'),
	// 导入成绩按钮
		$Drbtn=$('.Drbtn');



	// 选择框改变
	$myselect.change(function(){
		// alert();
		var belong=$(this).val();
		location.href="index.php/MarkManager/importMark?belong="+belong;
	});



	// 导入按钮
	for (var i = 0; i < $Drbtn.length; i++) {
		// 获取第几个对象
		// $($textallobj[i]).blur((function(j){return function(){}})(i));
		$($Drbtn[i]).click((function(j){return function(){
			var parentNode=$(this).parent().parent().children();
			var belong=parentNode.eq(0).text().trim();
			var period=parentNode.eq(1).text().trim();
			location.href="index.php/MarkManager/importMarkinfo?belong="+belong+"&period="+period;
		}})(i));
	};




	// infolist.php
	var $markexcel=$('#markexcel'),
		$oksubmit=$('#oksubmit'),
		$myupFormFile=$('#myupFormFile'),
		$examBz=$('#examBz'),
		$examName=$('#examName'),
		$myUpFile=$('#myUpFile');

	$markexcel.click(function(){
		$oksubmit.show();
		$(this).hide();
		$myUpFile.click();
	});


	// 确认按钮
	$oksubmit.click(function(){
		var bzValue=$examBz.val().trim();
		var examValue=$examName.val().trim();
		if (examValue) 
		{
			alert("请填入考试名称...");
			return;
		}
		$("#bzvalue").val(bzValue);
		$("#examvalue").val(examValue);
		$myupFormFile.submit();
	});
	





});