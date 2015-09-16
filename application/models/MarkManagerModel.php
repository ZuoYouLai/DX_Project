<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 成绩分配系统
 *
 */
class MarkManagerModel extends CI_Model {
	function __construct() {
		parent::__construct();

	}

	//查出分组
	function specialtNames(){
		$sql="SELECT belong FROM dx_stu_login GROUP BY belong";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// 查出对应学院 期数  人数
	function specialtAndPeriodNames(){
		$sql="SELECT belong,COUNT(belong) AS counts,period,school_zone AS zone FROM dx_stu_login GROUP BY belong,period ORDER BY period desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// 查出对应学院 期数  人数  根据学院来进行查找
	function specialtAndPeriodNamesByBelong($belong){
		$sql="SELECT belong,COUNT(belong) AS counts,period,school_zone AS zone FROM dx_stu_login where belong='".$belong."' GROUP BY belong,period ORDER BY period desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// 根据学院  期数查对应的信息
	function specialtAndPeriodNamesByBAP($belong,$period){
		$sql="SELECT belong,COUNT(belong) AS counts,period,school_zone AS zone FROM dx_stu_login where belong='".$belong."' and  period='".$period."' GROUP BY belong,period ORDER BY period desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// 根据学院  期数查出全部的学生信息
	function getStuInfos($belong,$period)
	{
		$data = $this->db->where(array('belong'=>$belong,'period'=>$period))->get('dx_stu_login')->result_array();
		return $data;
	}


	//插入一条分好考试教室学生的数据
	function insertaddmarksData($data){
		$this->db->insert('dx_markangerInfo', $data);
	}


	// 查询考试的成绩的具体情况
	function getStuMarkResultInfo()
	{
		$sql="SELECT * FROM dx_markangerInfo ORDER BY inportmarkTime DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function getStuMarkResultInfoByBelong($belong)
	{
		$sql="SELECT * FROM dx_markangerInfo where belong='".$belong."' ORDER BY inportmarkTime DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// 删除一条数据
	function deleteOne($id)
	{
		$this->db->delete('dx_markangerInfo', array('id'=>$id));
	}


	// 根据学院  期数查出全部的学生信息
	function getOneMarkInfos($id)
	{
		$data = $this->db->where(array('id'=>$id))->get('dx_markangerInfo')->result_array();
		return $data;
	}

}