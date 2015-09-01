
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
	 * Enter description here ...
	 */
	function addAllFromOneExcel($data){
		$this->db->insert_batch('dx_stu_login', $data);
	}


	/**
	 * 查找全部数据
	 * Enter description here ...
	 */
	//查询全部的值
	public function getAllData()
	{
		$data=$this->db->get('dx_stu_login')->result_array();
		return $data;
	}
	
}