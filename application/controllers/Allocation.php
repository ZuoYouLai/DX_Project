<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Allocation extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('examAllocationModel','examAllcation');
		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
	}

	public function index()
	{
		$alldata['newuserinfos']=$this->examAllcation->leftJoinRoom();
		// p($alldata);die();
		$this->load->view('CroomManger/examok',$alldata);
	}

	public function getInfo()
	{
		$id=$this->input->get('id');
		$this->load->view('CroomManger/OnePage',$alldata);
	}

	public function deleteOne()
	{
		$id=$this->input->get('id');
		$this->load->view('CroomManger/OnePage',$alldata);
	}

	public function downExcel()
	{
		$id=$this->input->get('id');
		$data=$this->examAllcation->OneDataFromID($id);
		$fsize=count($data[0]);
		if ($fsize) {
			$target=$data[0]['bigData'];
			// $time=$data[0]['parttime'];
			// $perName=$data[0]['perName'];
			// $FpRoomname=$data[0]['FpRoomname'];
			// $title=$time.' '.$perName.'学生';
			// $ExcelTitle=$FpRoomname.' '.$time.' '.$perName.'学生';
			// $alld = array(
			// 			'num' => 11, 
			// 			'idname' => '34434', 
			// 			'username' => 'ddd4'
			// 			);
			
			$alldata=json_decode($target,true);
			// $alldata1=json_decode($target,true);
			// $alldata = array($alldata1);
			// foreach ($obj as $key => $value) {
			// 	p($value);				
				// p($alldata);
				// die();				
			// 	p($value['num']);				
			// 	p(trim($value['username']));				
			// 	// $j++;
			// }
			// // $obj=json_decode($target);
			// // p($obj);
			// die();
			// $this->ExcelMethod($test,3,$title,$ExcelTitle);


			$objPHPExcel=new PHPExcel();
		//创建了3个工作簿
		for ($i=1; $i<=3; $i++) { 
			// 新建的objPHPExcel对象就已经新建的sheet对象
			if ($i >1) {
				//创建新的内置表
				$objPHPExcel->createSheet();
			}
			//把新创建的sheet设定为当前活动sheet
			$objPHPExcel->setActiveSheetIndex($i-1);
			//获取当前活动sheet
			$objSheet=$objPHPExcel->getActiveSheet();
			// p($objSheet);die();
			//给当前活动sheet起个名称
			$objSheet->setTitle('第'.$i.'个工作簿');
			//位置居中
			$objSheet->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置excel文件默认水平垂直方向居中
			//字体的设置
			//$objSheet->getDefaultStyle()->getFont()->setSize(14)->setName("微软雅黑");//设置默认字体大小和格式
			//填充数据 [固定的数据]
			$objSheet->setCellValue("A1","姓名")->setCellValue("B1","校区")->setCellValue("C1","学院")->setCellValue("D1","专业")->setCellValue("E1","年级")->setCellValue("F1","班级")->setCellValue("G1","分组");
			$j=2;
			foreach ($alldata as $key => $value) {
				//插入具体的数据
				// $objSheet->setCellValue("A".$j,$value['user_name'])->setCellValue("B".$j,$value['school_zone'])->setCellValue("C".$j,$value['belong'])->setCellValue("D".$j,$value['specialty'])->setCellValue("E".$j,$value['ngrade'])->setCellValue("F".$j,$value['class'])->setCellValue("G".$j,$value['group']);
				$objSheet->setCellValue("A".$j,$value['num'])->setCellValue("B".$j,$value['idname'])->setCellValue("C".$j,$value['idname'])->setCellValue("D".$j,$value['idname'])->setCellValue("E".$j,$value['idname'])->setCellValue("F".$j,$value['idname'])->setCellValue("G".$j,$value['idname']);
				// p($objSheet);
				$j++;
			}
		}


			$objWriter=IOFactory::createWriter($objPHPExcel, 'Excel2007');
			// p($objWriter);
			// die();
			//在controller里面的方法的互相调用
			$this->browser_export('Excel2007','学生信息表.xlsx');//输出到浏览器
			$objWriter->save("php://output");














		}
	}

	// 数据  工作簿的个数
	public function ExcelMethod($alldata,$size,$title,$ExcelTitle)
	{
		$objPHPExcel=new PHPExcel();
		for ($i=1; $i<=$size; $i++) { 
			// 新建的objPHPExcel对象就已经新建的sheet对象
			if ($i >1) {
				//创建新的内置表
				$objPHPExcel->createSheet();
			}
			//把新创建的sheet设定为当前活动sheet
			$objPHPExcel->setActiveSheetIndex($i-1);
			//获取当前活动sheet
			$objSheet=$objPHPExcel->getActiveSheet();
			// p($objSheet);die();
			//给当前活动sheet起个名称
			$objSheet->setTitle($title);
			//位置居中
			$objSheet->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);//设置excel文件默认水平垂直方向居中
			//字体的设置
			//$objSheet->getDefaultStyle()->getFont()->setSize(14)->setName("微软雅黑");//设置默认字体大小和格式
			//填充数据 [固定的数据]
			$objSheet->setCellValue("A1","序号")->setCellValue("B1","座位")->setCellValue("C1","学号")->setCellValue("D1","姓名");
			$j=2;
			foreach ($alldata as $key => $value) {
				$objSheet->setCellValue("A".$j,'11')->setCellValue("B".$j,$value['num'])->setCellValue("C".$j,$value['idname'])->setCellValue("D".$j,trim($value['username']));
				$j++;
			}
		}
			$objWriter=IOFactory::createWriter($objPHPExcel, 'Excel2007');
			//在controller里面的方法的互相调用
			// $this->browser_export('Excel2007',$ExcelTitle.'.xlsx');//输出到浏览器
			$this->browser_export('Excel2007','11.xlsx');//输出到浏览器
			$objWriter->save("php://output");

	}


	public function browser_export($type,$filename){
		if($type=="Excel5"){
				header('Content-Type: application/vnd.ms-excel');//告诉浏览器将要输出excel03文件
		}else{
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');//告诉浏览器数据excel07文件
		}
		header('Content-Disposition: attachment;filename="'.$filename.'"');//告诉浏览器将输出文件的名称
		header('Cache-Control: max-age=0');//禁止缓存
	}
	

}