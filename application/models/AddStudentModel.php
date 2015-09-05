
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 添加学生模型
 * Enter description here ...
 * @author BenBen
 *
 */
class AddStudentModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	/**
	 * 进行批量导入
	 */
	function addAllFromOneExcel($data){
		$this->db->insert_batch('dx_stu_login', $data);
	}


	/**
	 * 查找全部数据
	 */
	//查询全部的值
	public function getAllData()
	{
		// $data=$this->db->get('dx_stu_login')->result_array();
		$data = $this->db->where(array('status'=>2))->get('dx_stu_login')->result_array();
		// $data=$this->db->get_where('dx_stu_login',array('uname'=>$username))->result_array();
		return $data;
	}

	//limit限制查询
	public function getAllLimitData($index,$size)
	{
		$data = $this->db->limit($index,$size)->where(array('status'=>2))->get('dx_stu_login')->result_array();
		return $data;
	}

	//查看对应的分组
	public function getGroup()
	{
		$sql="select period from dx_stu_login  group by period";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 * 传入id进行进行修改对应数据的状态
	 */
	public function delmores($data,$cid)
	{
		$this->db->update('dx_stu_login', $data, array('id'=>$cid));
	}

	// 查出回收站的数据
	public function recycle()
	{
		$data = $this->db->where(array('status'=>0))->get('dx_stu_login')->result_array();
		return $data;
	}

	public function recycleLimitData($index,$size)
	{
		$data = $this->db->limit($index,$size)->where(array('status'=>0))->get('dx_stu_login')->result_array();
		return $data;
	}


	// 培训期数的查看
	public function getAllLimitDataPerid($index,$size,$period)
	{
		$data = $this->db->limit($index,$size)->where(array('status'=>2,'period'=>$period))->get('dx_stu_login')->result_array();
		return $data;
	}

	// 总数 -->培训总数
	public function getAllTotalDataPerid($period)
	{
		$data = $this->db->where(array('status'=>2,'period'=>$period))->get('dx_stu_login')->result_array();
		return $data;
	}
	
}