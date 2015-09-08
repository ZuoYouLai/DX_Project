<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CroomManger extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CroomMangerModel','croommanger');
		$this->load->model('AddStudentModel','addstumodel');
		$this->load->model('examAllocationModel','examAllcation');
		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
	
	}

	public function index()
	{
		$alldata['newuserinfos']=$this->croommanger->getAllData();
		$this->load->view('CroomManger/list',$alldata);
	}

	public function add()
	{
		$this->load->view('CroomManger/add');
	}

	// 添加一条数据 addOneInfo
	public function addOneInfo()
	{
		// roomname  roomtime apartment  roomsize manager  flag
		$data = array(
						'roomname' => $this->input->post('roomname'), 
						'apartment' => $this->input->post('apartment'), 
						'roomsize' => $this->input->post('roomsize'), 
						'flag' => $this->input->post('flag')
					  );
		// p($data);die();
		$this->croommanger->insertClassRoomData($data);
		$this->index();
	}

	// 删除一条数据
	public function delonedata()
	{
		$id=$this->input->get('id');
		$this->croommanger->del($id);
		$this->index();
	}

	// 考试教室数据
	public function examManger()
	{
		$alldata['newuserinfos']=$this->croommanger->getExamData();
		$this->load->view('CroomManger/examManger',$alldata);

	}

	// 上课教室数据
	public function lesssion()
	{
		$alldata['newuserinfos']=$this->croommanger->getExamData();
		$this->load->view('CroomManger/examManger',$alldata);
	}

	// 考试教室规格的分配
	public function ExamoneRoomExcel()
	{
		$id=$this->input->get('id');
		// p($id);die;
		$targetfile=$this->ExcelMethod('Excel');
		// p($targetfile);die();
		$obj=$this->getExcelObject($targetfile,1);
		$index=$this->getstateIndex($obj,'排位');
		if (count($index)>1) {
			$data=$this->doExcelObj($index['index'],$obj);
			// 查出对应id的数据
			$sdata=$this->croommanger->getExamDataToId($id);
			$sdata[0]['managerContent']=$data;
			$sdata[0]['roomrealsize']=$index['realsize'];
			$sdata[0]['id']='';
			$this->croommanger->insertClassRoomMangerInfoData($sdata[0]);
			success('CroomManger/index','成功插入'.count($sdata).'条数据成功....');
		}else{
			
		}
		
		
	}

	// 上课教室分配
	public function lesssionDistribution()
	{
		$this->index();
	}


	// 考试教室分配
	public function examrDistribution()
	{
		$alldata['newuserinfos']=$this->croommanger->ClassRoomMangerDicData('考试');
		// p($alldata);die;
		$this->load->view('CroomManger/examDlist',$alldata);
	}

	// 分配教室详情
	public function eroominfo()
	{
		$id=$this->input->get('id');
		$alldata['newuserinfos']=$this->croommanger->ClassRoomMangerDicDataAndId('考试',$id);
		$alldata['flag']=$alldata['newuserinfos'][0]['flag'];
		$this->load->view('CroomManger/eroomInfo',$alldata);
	}

	



	// 考试教室分配页
	public function examrDistriPage()
	{
		$id=$this->input->get('id');
		// p($id);die;
		$alldata['group']=$this->addstumodel->getGroup();
		$alldata['newuserinfos']=$this->croommanger->ClassRoomMangerDicDataAndId('考试',$id);
		$alldata['managerContent']=$alldata['newuserinfos'][0]['managerContent'];
		$alldata['roomrealsize']=$alldata['newuserinfos'][0]['roomrealsize'];
		$alldata['roomname']=$alldata['newuserinfos'][0]['roomname'];
		$alldata['id']=$alldata['newuserinfos'][0]['id'];
		$this->load->view('CroomManger/distadd',$alldata);
	}


	// 具体培训期数对应的人数
	public function getPxNum()
	{
		$id=$this->input->post('id');
		$arr=$this->addstumodel->getAllTotalDataPerid($id);
		echo count($arr);
	}


	// 返回具体的人数的具体的详情
	public function getPxInfo()
	{
		$id=$this->input->post('id');
		$arr=$this->addstumodel->getAllTotalDataPerid($id);
		$name='';
		$stuid='';
		$size=0;
		foreach ($arr as $key => $value) {
			if ($size) {
				$name=$value['name'].','.$name;
				$stuid=$value['user_name'].','.$stuid;
			}else{
				$name=$value['name'];
				$stuid=$value['user_name'];
			}
			$size++;
			
		}
		$content=$name.'#####'.$stuid;
		echo $content;
	}

	// 保存分配好的教室的信息
	public function saveOneData()
	{
		$bigdata=$this->input->post('bigdata');
		$classid=$this->input->post('classid');
		$stuperid=$this->input->post('stuperid');
		$realsize=$this->input->post('realsize');
		$roomname=$this->input->post('roomname');
		$perName='第'.$stuperid.'期';
		$data = array(
						'roomId' => $classid, 
						'stuId' => $stuperid, 
						'realsize' => $realsize, 
						'FpRoomname' => $roomname, 
						'perName' => $perName, 
						'parttime' => date('y-m-d',time()), 
						'bigData' => $bigdata
					 );
		
		$this->examAllcation->insertAData($data);
		success('Allocation/index','分配保存成功!');
	}


	// 分配好的页面
	// examResult
	public function examResult()
	{
		$alldata['newuserinfos']=$this->examAllcation->leftJoinRoom();
		// p($alldata);die();
		$this->load->view('CroomManger/examok',$alldata);
	}








	// 找到对应的行的某一列是否符合条件【例如找到对应的排位的字段对应的列】
	public function getstateIndex($obj,$content)
	{
		$flg='no';
		$size=count($obj[0]);
		$length=count($obj);
		for($i=0;$i<$size;$i++)
		{
			if ($obj[0][$i]==$content) {
				// $flg='yes';
				$flg = array('flg' =>'yes' , 'index'=>$i,'realsize'=>($length-1));
				break;
			}
		}
		// 这是有第一行说明，但是没有对应的数据
		if ($length==1) {
			$flg=='nocount';
		}
		return $flg;
	}

	// 解析对应的Excel对象
	public function doExcelObj($index,$obj)
	{
		$size=count($obj);
		$content='';
		for ($i=1; $i <$size; $i++) { 
			$content=$content.'  '.$obj[$i][$index];
		}
		return $content;
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
		// if ($dsize=="") {
		// 	$dsize=$size;
		// }
		// //全部数据保存在的数组
		// $alldata=array();

		// for($i=0;$i<$dsize;$i++)
		// {
		// 	//读取第一行sheet
		// 	$sheet=$objPHPExcel->getSheet($i);
		// 	//获取总行数
		// 	$hightRow=$sheet->getHighestRow();
		// 	// 取得总列数
		// 	$hightColum=$sheet->getHighestColumn(); 
		// 	//全部的excel对象数组
		// 	// p($objPHPExcel->getActiveSheet()->toArray());
		// 	// p($hightColum);
		// 	// p($hightRow);
		// 	// echo "<hr>";
		// 	// 获取excel对象的全部数据
		// 	$importdata=$objPHPExcel->getActiveSheet()->toArray();
		// 	$z=0;
		// 	// 存放字段值数组
		// 	$firstname=array();
		// 	foreach ($importdata as $key => $value) {
		// 		if ($z==0) {
		// 			$firstname=$this->toNameforArray($value);
		// 		}else{
		// 			$newinfoarr=$this->newarraydata($firstname,$value);
		// 			//生成新的数组
		// 			array_push($alldata,$newinfoarr); 
		// 		}
		// 		$z++;
		// 	}
		// }
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
		//需要注意的是,这里的excel文件要对应好不同的格式\

	}



}