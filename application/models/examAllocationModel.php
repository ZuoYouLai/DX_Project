

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 课室的具体的分配内容模型
 *
 */
class examAllocationModel extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	
	//插入一条分好考试教室学生的数据
	function insertAData($data){
		$this->db->insert('dx_examAllocation', $data);
	}

	// left join的关联
	function leftJoinRoom()
	{
		$sql="select * from dx_examAllocation ea left join dx_classroomMangerInfo cm on ea.roomId = cm.id ORDER BY parttimeInfo desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// 根据id查询数据
	function OneDataFromID($id)
	{
		$data = $this->db->where(array('id'=>$id))->get('dx_examAllocation')->result_array();
		return $data;
	}

}