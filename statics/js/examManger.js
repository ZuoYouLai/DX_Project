$(function () {
	// alert();
	var 
		$checkExcel=$('#checkExcel'),
		$myUpFile=$('#myUpFile'),
		$myupFormFile=$('#myupFormFile'),
		$okExcel=$('#okExcel');

	// 进行对每个教室进行规格的Excel文件上传
	$checkExcel.click(function(){
		$myUpFile.click();
		$(this).hide();
		$okExcel.show();
	});

	$okExcel.click(function(){
		var idvalue=$(this).attr('idvalue');
		var newcation=$myupFormFile.attr('action')+'?id='+idvalue;
		$myupFormFile.attr('action',newcation);
		$myupFormFile.submit();
	});


});