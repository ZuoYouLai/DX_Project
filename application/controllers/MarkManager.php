<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MarkManager extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MarkManagerModel','MarkManager');

		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
	}

	// 导入成绩
	public function importMark()
	{
		$belong=$this->input->get('belong');
		$user=$this->session->userdata('user');
		$role=trim($user['role'][0]['name']);
		if ($role) {
			// 这个是超级管理员
			if ($role=="超级管理员") {
				$group=$this->MarkManager->specialtNames();
				$alldata['group']=$group;
				// 条件查询的时候
				if ($belong) {
					$alldata['group']=$group;
					$alldata['belong']=$belong;
					$groupInfo=$this->MarkManager->specialtAndPeriodNamesByBelong($belong);
				}else{
					$groupInfo=$this->MarkManager->specialtAndPeriodNames();
				}
				$alldata['newuserinfos']=$groupInfo;
				$this->load->view('MarkManger/list',$alldata);
			}
		}else{
			p('你没有相应的权限...');
		}
	}


	// 进行如成绩详情导入页
	public function importMarkinfo()
	{
		$belong=$this->input->get('belong');
		$period=$this->input->get('period');
		$groupInfo=$this->MarkManager->specialtAndPeriodNamesByBAP($belong,$period);
		$alldata['newuserinfos']=$groupInfo;
		$alldata['belong']=$belong;
		$alldata['period']=$period;
		$this->load->view('MarkManger/infolist',$alldata);
		// p($groupInfo);
	}





// 	DROP TABLE IF EXISTS `dx_markangerInfo`;
// CREATE TABLE IF NOT EXISTS `dx_markangerInfo` (
//   `id` int(30) NOT NULL AUTO_INCREMENT,
//   `belong` varchar(500) DEFAULT NULL COMMENT '学院',
//   `period` varchar(50) DEFAULT NULL COMMENT '培训期数',
//    `personcount` varchar(50) DEFAULT NULL COMMENT '人数',
//   `schoolzone` varchar(500) DEFAULT NULL COMMENT '校区',
//   `inportmarkTime` varchar(500) DEFAULT NULL COMMENT '录入成绩时间',
//   `markBz` varchar(500) DEFAULT NULL COMMENT '考试备注',
//   `markcomment` varchar(100)  DEFAULT NULL COMMENT '考试说明',
//   `markInfo` text  DEFAULT NULL COMMENT '学员成绩具体情况',
//   `teachercount` int(10)  DEFAULT NULL COMMENT '老师人数',
//   `stucount` int(10)  DEFAULT NULL COMMENT '学生人数',
//   `passcount` int(30)  DEFAULT NULL COMMENT '合格人数',
//   `nopasscount` int(30)  DEFAULT NULL COMMENT '不合格人数',
//   `nopassinfo` text   DEFAULT NULL COMMENT '不合格具体情况',
//   `passinfo` text   DEFAULT NULL COMMENT '合格具体情况',
//   `passpercernt` varchar(50)  DEFAULT NULL COMMENT '合格百分数',
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='考试录入表' AUTO_INCREMENT=1 ;

	
	// 查看成绩
	public function addmarks()
	{
		// 基本接收的内容
		$targetfile=$this->ExcelMethod('Excel');
		$examname=$this->input->post('examname');
		$bz=$this->input->post('bz');
		$belong=$this->input->post('belong');
		$period=$this->input->post('period');

		// 获取第一个工作空间obj对象
		$obj=$this->getExcelObject($targetfile,1);
		// 校验Excel是否符合要求最基本的:学号  成绩
		$arr=array('学号','成绩');
		$boool=$this->IsokFirstcolum($obj[0],$arr);
		// 符合要求Excel对象
		if ($boool) 
		{
			// 进行对excel对象进行处理 user_name
			$mm=$this->DoMarkData($obj,$boool,"学号");
			// 进行对号入座的匹配
			$data=$this->MarkManager->getStuInfos($belong,$period);
			p($mm);


		}
		// 不符合要求的Excel对象
		else
		{
			success('MarkManager/importMarkinfo?belong='.$belong.'&period='.$period,'你导入的Excel不符合要求');
		}

	}


	// 不满足进行页面的详情页
	// 进行如成绩详情导入页
	// public function falsetoMarkinfo($belong,$period)
	// {
	// 	$groupInfo=$this->MarkManager->specialtAndPeriodNamesByBAP($belong,$period);
	// 	$alldata['newuserinfos']=$groupInfo;
	// 	$alldata['belong']=$belong;
	// 	$alldata['period']=$period;
	// 	$this->load->view('MarkManger/infolist',$alldata);
	// }


	// 处理除第一行的数据
	public function DoMarkData($exceldata,$bool,$tcontent)
	{
		$num=-1;
		foreach ($bool as $key => $value) {
				foreach ($value as $index => $v) {
					if ($index==$tcontent) {
							$num=$v;
					}
				}
			}

		$arr=array();
		for ($i=1; $i <count($exceldata) ; $i++) { 
			// array_push($arr, array('user_name' => $exceldata[$i][$num]));
			array_push($arr, $exceldata[$i][$num]);
		}
		return $arr;
	}



	// 校验第一行的字段值
	public function IsokFirstcolum($obj,$arr)
	{
		$flag=0;
		$alarr=array();

		$i=0;
		$markarr=array();
		foreach ($obj as $key => $value) {
			foreach ($arr as $key => $va) {
				if($va==$value)
				{
					// 检验是否存在数组中
					if (!in_array($va, $alarr)) {
						array_push($alarr, $value);
						// 进行对坐标的对入
						$tdata = array($value => $i );
						array_push($markarr, $tdata);
						$flag++;
						break;
					}
				}
			}
			$i++;
		}

		if ($flag==count($arr)) {
			return $markarr;
		}else{
			return 0;
		}
	}



	// Excel上传的方法
	public function ExcelMethod($name)
	{
		//上传对应的Excel文件
		//文件上传
		//基本配置
		$config['upload_path']='./uploads/';
		$config['allowed_types'] = 'xls|xlsx|xl';
		$config['max_size'] = '20000';
		$config['file_name'] = time() . mt_rand(1000,9999);

		//载入上传类
		$this->load->library('upload',$config);
		//执行上传
		$status=$this->upload->do_upload($name);
		$wrong=$this->upload->display_errors();
		if ($wrong) {
			error($wrong);
		}

		//返回信息
		$info=$this->upload->data();
		// p($info);
		//再进行解析对应的Excel文件
		//找到对应的文件
		$targetfile='./uploads/'.$info['file_name'];
		return $targetfile;
		//生成对应的格式
		//需要注意的是,这里的excel文件要对应好不同的格式

	}


	// Excel解析对象的方法[参数：目标文件  需要读的工作空间]
	public function getExcelObject($targetfile,$dsize)
	{
		// $objReader=IOFactory::createReader('Excel2007');
		$objReader=IOFactory::createReaderForFile($targetfile);
		//读取整个execl文件生成excel的object
		$objPHPExcel=$objReader->load($targetfile);
		//获取总的sheet数
		$size=$objPHPExcel->getSheetCount();
		// 获取第一行的数据
		if ($dsize==1) {
			$sheet=$objPHPExcel->getSheet(0);
		// 	// 获取excel对象的全部数据
			$importdata=$objPHPExcel->getActiveSheet()->toArray();
			return $importdata;
		}
	}




	// 查看成绩
	public function markInfo()
	{
		echo "..................";
	}


}