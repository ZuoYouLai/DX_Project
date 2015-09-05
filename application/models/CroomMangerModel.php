
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 添加教室管理模型
 * Enter description here ...
 * @author BenBen
 *
 */
class CroomMangerModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	/**
	 * 插入一条教室记录
	 */
	function insertClassRoomData($data){
		$this->db->insert('dx_classroom', $data);
	}

	/**
	 * 查找全部数据
	 */
	//查询全部的值
	public function getAllData()
	{
		$data = $this->db->get('dx_classroom')->result_array();
		return $data;
	}

	// 删除一条数据
	public function del($id){
		$this->db->delete('dx_classroom', array('id'=>$id));
	}

	// 找考试教室数据
	public function getExamData()
	{
		$data = $this->db->where(array('flag'=>'考试'))->get('dx_classroom')->result_array();
		return $data;
	}
	// 找考试教室数据  加上 id
	public function getExamDataToId($id)
	{
		$data = $this->db->where(array('flag'=>'考试','id'=>$id))->get('dx_classroom')->result_array();
		return $data;
	}
	
	//插入一条分好考试教室规格的数据
	function insertClassRoomMangerInfoData($data){
		$this->db->insert('dx_classroomMangerInfo', $data);
	}

	//查找分好考试,教室规格的数据
	function ClassRoomMangerDicData($name){
		$data = $this->db->where(array('flag'=>$name))->get('dx_classroomMangerInfo')->result_array();
		return $data;
	}

	//查找分好考试,教室规格的数据,单条数据
	function ClassRoomMangerDicDataAndId($name,$id){
		$data = $this->db->where(array('flag'=>$name,'id'=>$id))->get('dx_classroomMangerInfo')->result_array();
		return $data;
	}


	// 找上课教室数据
	public function getLessionData()
	{
		$data = $this->db->where(array('flag'=>'上课'))->get('dx_classroom')->result_array();
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