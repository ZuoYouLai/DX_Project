<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddStudents extends My_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('AddStudentModel','addstumodel');
		//进行分页的处理
		
		//导入对应的phpexcel库
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
	}

	public function index()
	{
		//获取的是培训期数
		$getperiod=$this->input->get('period');
		// p($getperiod);
		// p($getperiod=='');
		// die();
		//载入分页类
		$this->load->library('Page');
		$page=new Page();
		//把对应的参数加载到对应的分页类内
		$pageIndex=$this->input->get('page')?$this->input->get('page'):1;
		//设置的页码
		$pageSize=4;
		$beiginIndex=$pageSize*($pageIndex-1);
		if ($getperiod=='') {
			//查出了全部的数据
			$data=$this->addstumodel->getAllData();
			$totalCount=count($data);
			// 没有培训期数
			$alldata['newuserinfos']=$this->addstumodel->getAllLimitData($pageSize,$beiginIndex);
			$str_page=$page->create($pageIndex, $pageSize, $totalCount, array(), array());
		}else{
			// 具有培训期数的总数
			$Periddata=$this->addstumodel->getAllTotalDataPerid($getperiod);
			$totalCount=count($Periddata);
			// 具有培训期数
			$alldata['newuserinfos']=$this->addstumodel->getAllLimitDataPerid($pageSize,$beiginIndex,$getperiod);
			$alldata['period']=$getperiod;
			$str_page=$page->create($pageIndex, $pageSize, $totalCount, array('period'), array($getperiod));
		}
		// p($beiginIndex);
		// p($pageSize);
		// p($alldata['newuserinfos']);die;
		//产生对应页数的链接
		$alldata['page']=$str_page;
		$alldata['group']=$this->addstumodel->getGroup();
		// p($alldata['group']);die;
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
		// $objReader=IOFactory::createReader('Excel2007');
		$objReader=IOFactory::createReaderForFile($targetfile);
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
					$inportsize=$this->IstoMyExcelField($firstname);
					// 需要满足最起码的8字段值
					if ($inportsize!=8) {
						success('AddStudents/index','导入失败,你导入数据不符合规范...');
						break;
					}
				}else{
					$newinfoarr=$this->newarraydata($firstname,$value);
					//生成新的数组
					array_push($alldata,$newinfoarr); 
				}
				$z++;
			}
		}
		//批量导入问题
		// 1.校验用户是否存在
		$mynewUsers=$this->IsHaveUser($alldata);
		$sumsize=count($alldata);
		$mynewUserssize=count($mynewUsers);
		$num=$sumsize-$mynewUserssize;
		// 2.导入过滤的数据
		$this->addstumodel->addAllFromOneExcel($alldata);
		success('AddStudents/index','总共导入数据'.$sumsize.'条,成功导入'.$mynewUserssize.'条,失败'.$num.'条[原因:此用户已存在]');


	}

	// 校验用户是否存在
	public function IsHaveUser($alldata)
	{
		$newUsers=array();
		foreach ($alldata as $key => $value) {
			$userName=$value['user_name'];
			$len=$this->addstumodel->getIsoneUser($userName);
			if (!$len) {
				array_push($newUsers, $value);
			}
		}
		return $newUsers;
	}


	// 导入的Excle是否符合我需要的字段
	public function IstoMyExcelField($firstname)
	{
		$size=0;
		foreach ($firstname as $key => $value) {
			switch ($value) {
				case 'name':$size=$size+1;
					break;
			    case 'school_zone':$size=$size+1;
					break;
				case 'belong':$size=$size+1;
					break;
				case 'specialty':$size=$size+1;
					break;
				case 'ngrade':$size=$size+1;
					break;
				case 'period':$size=$size+1;
					break;
				case 'user_name':$size=$size+1;
					break;
				case 'class':$size=$size+1;
					break;
				default:
					break;
			}
		}
		return $size;
	}



	/**
	 * 传入id进行进行修改对应数据的状态
	 */
	public function delmores()
	{
		$data=$this->input->post('ids');
		$status= array(
			'status' => 0,
			'recycletime'=>date('y-m-d',time())
			);
		// 分割字符串获取对应的id值
		$arrids=explode(",",$data);
		foreach ($arrids as $key => $value) {
			// p($value);
			$this->addstumodel->delmores($status,$value);
		}
		success('AddStudents/index','成功删除'.count($arrids).'条数据成功....');
		
		
	}

	//删除一条数据
	public function delonedata()
	{
		$data=$this->input->get('id');
		// p($data);
		$status= array(
			'status' => 0,
			'recycletime'=>date('y-m-d',time())
			);
		$this->addstumodel->delmores($status,$data);
		$this->index();

	}





	//回收站
	public function recycle()
	{
		
		// //查出了全部的数据
		// $alldata['newuserinfos']=$this->addstumodel->recycle();
		// $this->load->view('AddStudent/recycle_list',$alldata);
		//查出了全部的数据
		$data=$this->addstumodel->recycle();
		$totalCount=count($data);
		//载入分页类
		$this->load->library('Page');
		//设置的页码
		$pageSize=4;
		//把对应的参数加载到对应的分页类内
		$pageIndex=$this->input->get('page')?$this->input->get('page'):1;
		$beiginIndex=$pageSize*($pageIndex-1);
		$page=new Page();
		$str_page=$page->create($pageIndex, $pageSize, $totalCount, array(), array());
		$alldata['newuserinfos']=$this->addstumodel->recycleLimitData($pageSize,$beiginIndex);
		$alldata['page']=$str_page;
		// p($beiginIndex);
		// p($pageSize);
		// p($alldata['newuserinfos']);die;
		$this->load->view('AddStudent/recycle_list',$alldata);
	}


	//回收站 还原
	public function restore()
	{
		$data=$this->input->post('restoreids');
		$status= array(
			'status' => 2,
			'recycletime'=>''
			);
		// 分割字符串获取对应的id值
		$arrids=explode(",",$data);
		foreach ($arrids as $key => $value) {
			// p($value);
			$this->addstumodel->delmores($status,$value);
		}
		success('AddStudents/recycle','成功还原'.count($arrids).'条数据....');
	}

	//单条数据进行还原
	public function restoreonedata()
	{
		$data=$this->input->get('id');
		// p($data);
		$status= array(
			'status' => 2,
			'recycletime'=>''
			);
		$this->addstumodel->delmores($status,$data);
		// success('AddStudents/recycle','成功还原1条数据....');
		$this->recycle();

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