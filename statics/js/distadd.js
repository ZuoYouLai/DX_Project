$(function(){
	
	var 
		$myselect=$('#myselect'),
		$targetspanNum=$('#targetspanNum'),
		$targetSNum=$('#targetSNum'),
		$FPbtn=$('#FPbtn'),
		$getFP=$('#getFP'),
		$downExcle=$('#downExcle'),
		$targetrmid=$('#targetrmid'),
		$managerContent=$('#managerContent'),
		$checkExcel=$('#checkExcel');

	$myselect.change(function(){
		var content=$(this).val(),
			text='第'+content+'期';
		//提交数据
		$.ajax({
		url:'index.php/CroomManger/getPxNum',
		data:{id:content},
		type:'POST',
		success:function(data,status){
			// alert(data);
			$targetspanNum.text(content);
			// var sumcount=data+'人'
			$targetSNum.text(data);
		},
		error:function(){
			alert('服务器报错...');
		}
	    });

	});


	// 一键分配
	$FPbtn.click(function(){
		var numcount=$targetspanNum.text(),
			sumcount=parseInt($targetSNum.text());
		if (!numcount) {
			alert('请选择对应的培训期数班...');
			return;
		};
		if (!sumcount) {
			alert('人数为0不能进行分配...');
			return;
		}
		else{
			// 进行对应的分配
			//提交数据
			// js进行分配
			var data={};
			// var	data.targetrmid=$targetrmid.text(),
				// data.targetSNum=$targetSNum.text(),
				// data.targetspanNum=$targetspanNum.text(),
				content=$myselect.val();
				// data.targetspanNum=$targetspanNum.text();


			$.ajax({
			url:'index.php/CroomManger/getPxInfo',
			data:{id:content},
			type:'POST',
			success:function(data,status){
				alert(data);
			},
			error:function(){
				alert('服务器报错...');
			}
		    });

		}

		


	});
		


});