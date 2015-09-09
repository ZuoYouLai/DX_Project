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


	// 分配座位的详细信息
	public function getInfo()
	{
		$id=$this->input->get('id');
		$data=$this->examAllcation->OneDataFromID($id);
		$target=$data[0]['bigData'];
		$alldata['newuserinfos']=json_decode($target,true);
		$alldata['fpid']=$id;
		$this->load->view('CroomManger/OnePage',$alldata);
	}


	// 删除对应的id的数据
	public function deleteOne()
	{
		$id=$this->input->get('id');
		$this->examAllcation->deleteoneData($id);
		$this->index();
	}



	public function downExcel()
	{
		$id=$this->input->get('id');
		$data=$this->examAllcation->OneDataFromID($id);
		// p($data);die();
		$fsize=count($data[0]);
		if ($fsize) {
			$target=$data[0]['bigData'];
			$time=$data[0]['parttime'];
			$perName=$data[0]['perName'];
			$FpRoomname=$data[0]['FpRoomname'];
			$title=$time.' '.$perName.'学生';
			$ExcelTitle=$FpRoomname.' '.$time.' '.$perName.'学生';
			$alldata=json_decode($target,true);
			$this->ExcelMethod($alldata,1,$title,$ExcelTitle);
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
			//set width  
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

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
				$objSheet->setCellValue("A".$j,($j-1))->setCellValue("B".$j,$value['num'])->setCellValue("C".$j,$value['idname'])->setCellValue("D".$j,trim($value['username']));
				$j++;
			}
		}
			// 困扰我一直的bug在这里 
			// 由于乱码的问题导致打不开Excel文件
			ob_end_clean();
			$objWriter=IOFactory::createWriter($objPHPExcel, 'Excel2007');
			//在controller里面的方法的互相调用
			$this->browser_export('Excel2007',$ExcelTitle.'.xlsx');//输出到浏览器
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