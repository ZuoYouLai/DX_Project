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
		$roomrealsize=$('#roomrealsize'),
		$checkExcel=$('#checkExcel'),
		$FPtable=$('#FPtable'),
		$downExcle=$('#downExcle'),
		$saveData=$('#saveData'),

		// 保存需要提交的3个字段
		$bigdata=$('#bigdata'),
		$classid=$('#classid'),
		$stuperid=$('#stuperid'),
		$Lrealsize=$('#Lrealsize'),
		$myupFormFile=$('#myupFormFile'),


		// html需要提交的字段
		$targetTbody=$('#targetTbody');



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
			content=$myselect.val();
			var $Encontent='1234567890abcdefghizklmnopqrstuvwsyzABCDEFGHIGKLMNOPQRSTUVWXYZ';

			$.ajax({
			url:'index.php/CroomManger/getPxInfo',
			data:{id:content},
			type:'POST',
			success:function(data,status){
				// 清空里面的数据
				$targetTbody.html('');
				// alert(data);
				// 进行开始分配
				var username=[],
					idnum=[],
					partOne=data.split('#####')[0],
					partTwo=data.split('#####')[1];
				username=partOne.split(',');
				// debugger;
				idnum=partTwo.split(',');
				// 分配的座位总数  座位的分布情况  与 总人数
				// 实际座位总数
				var realsize=parseInt($roomrealsize.text());
				// 实际座位情况
				var realContent=$managerContent.text().trim();
				var realContentArr=realContent.split('  ');
				// 总人数
				var targetSNumsize=parseInt($targetSNum.text());
				
				var alldata=[];
				var alldata1=[];

				var arr=[],narr=[],size=$Encontent.length;

				// 总人数 < 实际座位总数
				if (targetSNumsize<=realsize) {

					  for (var j=0;j<idnum.length;j++)
				      {
				      		   var studata={};
				               var infotent="";
				               for (var i = 0; i < 12; i++) 
					            {
					                    var rannum=Math.round(Math.random()*(size-1));
					                    infotent=infotent+$Encontent[rannum];
					            }
				               arr.push(infotent);
				               narr.push(infotent);
				               studata.no=infotent;
				               studata.idname=idnum[j];
				               studata.username=username[j];
				               alldata.push(studata);
				               alldata1.push(studata);
				       }

				       // 进行排序
				       // debugger;
		// 字符：字符的时候sortFunction中的项目不能像数字一样直接相减，需要调用
		// str1.localeCompare( str2 )方法来作比较，从而满足返回值。以下是多维数组的第1，2列作排序的情况。
		// 字符串比较
				       alldata.sort(function(x,y){
				       		return (x.no==y.no)?(x.no.localeCompare(y.no)):(x.no.localeCompare(y.no)); 
				       });

					// debugger;
            		var html='';
            		var zz=0;
            		$.each(alldata,function(){
            			 this.num=realContentArr[zz];
            			 var onda='<tr><td>'+this.num+'</td><td>'+this.idname+'</td><td>'+this.username+'</td></tr>';
            			 html+=onda;
            			 zz++;
            		});
            		// 显示table
            		$FPtable.show();
            		$targetTbody.append(html);

            		$downExcle.show();
            		$saveData.show();
            		// alert(JSON.stringify(alldata));
            		$('#allbigdat').text(JSON.stringify(alldata));
            		
            		// debugger;
            		// alert(JSON.parse(co));
				}else{

				}
				
			},
			error:function(){
				alert('服务器报错...');
			}
		    });
		}



		// 进行保存全部对象字符
		$saveData.click(function(){
			var co=$('#allbigdat').text().trim(),
				stuSpanNum=$targetspanNum.text().trim(),
				Lrealsize=JSON.parse(co).length,
				targetrmid=$targetrmid.text().trim();
	        $bigdata.val(co);
	        $classid.val(targetrmid);
	        $Lrealsize.val(Lrealsize);
	        $stuperid.val(stuSpanNum);
	        // 表单提交
	        $myupFormFile.submit();
			// //提交数据
			// $.ajax({
			// url:'index.php/CroomManger/saveOneData',
			// data:{data:co},
			// type:'POST',
			// success:function(data,status){
			// 	alert(data);
			// },
			// error:function(){
			// 	alert('服务器报错...');
			// }
		 	// });

		});
		


	});
		


});