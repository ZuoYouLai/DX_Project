<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddStudents extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AddStudentModel','addstumodel');
		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
	}

	public function index()
	{
		//查出了全部的数据
		$alldata['newuserinfos']=$this->addstumodel->getAllData();
		$this->load->view('AddStudent/list',$alldata);
	}


	// 批量导入的
	public function addAlls()
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
		$status=$this->upload->do_upload('Excel');
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
		//生成对应的格式
		//需要注意的是,这里的excel文件要对应好不同的格式
		$objReader=IOFactory::createReader('Excel2007');
		//读取整个execl文件生成excel的object
		$objPHPExcel=$objReader->load($targetfile);
		//获取总的sheet数
		$size=$objPHPExcel->getSheetCount();
		//全部数据保存在的数组
		$alldata=array();
		for($i=0;$i<$size;$i++)
		{
			//读取第一行sheet
			$sheet=$objPHPExcel->getSheet($i);
			//获取总行数
			$hightRow=$sheet->getHighestRow();
			// 取得总列数
			$hightColum=$sheet->getHighestColumn(); 
			//全部的excel对象数组
			// p($objPHPExcel->getActiveSheet()->toArray());
			// p($hightColum);
			// p($hightRow);
			// echo "<hr>";
			// 获取excel对象的全部数据
			$importdata=$objPHPExcel->getActiveSheet()->toArray();
			$z=0;
			// 存放字段值数组
			$firstname=array();
			foreach ($importdata as $key => $value) {
				if ($z==0) {
					$firstname=$this->toNameforArray($value);
				}else{
					$newinfoarr=$this->newarraydata($firstname,$value);
					//生成新的数组
					array_push($alldata,$newinfoarr); 
				}
				$z++;
			}
		}
		// p($alldata);
		//批量导入问题
		$this->addstumodel->addAllFromOneExcel($alldata);
		success('AddStudents/index','批量导入'.count($alldata).'条数据成功....');


	}

	//名字进行赋值
	function toNameforArray($arr)
	{
		$newarray=array();
		$size=count($arr);
		for ($i=0; $i<$size; $i++) { 
			$needname=$this->oneByoneForName($arr[$i]);
			array_push($newarray,$needname);  
		}
		return $newarray;
	}

	//一一对应的字符串对应
	function oneByoneForName($str)
	{
		switch ($str) {
		case '姓名':return 'name';break;
		case '账号':return 'user_name';break;
		case '校区':return 'school_zone';break;
		case '培训期数':return 'period';break;
		case '学院':return 'belong';break;
		case '专业':return 'specialty';break;
		case '年级':return 'ngrade';break;
		case '班级':return 'class';break;
		case '分组':return 'group';break;
		default: return"";break;
		}
	}


	// 传入2个数组 进行拼出对应新的数组
	function newarraydata($infoarr,$miarr)
	{
		$realarr=array();
		$i=0;
		foreach ($infoarr as $key => $value) {
			$realarr[$value]=$miarr[$i];
			if ($value=="user_name") {
				//密码重新设置 名称的md5码
				$realarr['user_pwd']=md5($miarr[$i]);
				//设置id值
				// $realarr['id']=time().mt_rand(1000,9999);
			}
			$i++;
		}
		return $realarr;
	}



}