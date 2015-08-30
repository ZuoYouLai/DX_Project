<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ��ҳģ��
 * Enter description here ...
 * @author BenBen
 *
 */
class IndexNewsModel extends CI_Model {
	private $tableName='section';
	function __construct() {
		parent::__construct();
	}
	/**
	 * ���
	 * Enter description here ...
	 * @param $dataArray
	 */
	function add($dataArray){
		$this->db->insert($this->tableName, $dataArray);
		return $this->db->insert_id();
	}
	/**
	 * �޸�
	 * Enter description here ...
	 * @param $dataArray
	 * @param $where
	 */
	function edit($dataArray,$where){
		return $this->db->update($this->tableName, $dataArray,$where);
	}
	/**
	 * ɾ��
	 * Enter description here ...
	 * @param $strWhere
	 */
	function del($where){
		return $this->db->delete($this->tableName, $where);
	}
	/**
	 * ��ȡ����
	 * Enter description here ...
	 * @param unknown_type $where
	 */
	function getModel($where){
		$query=$this->db->where($where)->get($this->tableName);
		return $query->row_array();
	}
	/**
	 * ����������ѯ����
	 * Enter description here ...
	 * @param $strWhere
	 */
	function getList($strWhere){
		$sql = "SELECT * FROM dx_".$this->tableName;
		if ($strWhere != '')
		$sql .= " WHERE " . $strWhere;
			
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	/**
	 * ��ҳ����
	 * Enter description here ...
	 * @param $pageSize
	 * @param $pageIndex
	 * @param $selParam ��Ҫ��ѯ������
	 * @param $dataSet   ��ѯ�����ݼ�
	 * @param $where
	 * @param $orderBy
	 */
	function getListByPage($pageSize,$pageIndex,$selParam,$dataSet,$strWhere,$orderBy){
		if ($selParam =='')
			$selParam= "*";
		if ($dataSet =='')
			$dataSet= "dx_".$this->tableName;
		$sql = "SELECT ".$selParam." FROM ".$dataSet;
		if ($strWhere != '')
			$sql .= " WHERE " . $strWhere;
		if ($orderBy != '')
			$sql .= " ORDER BY " . $orderBy;

		$sql .= " LIMIT " . ($pageSize * $pageIndex - $pageSize) . "," . $pageSize;  //print_r($sql);exit;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	/**
	 * ����������������ȡ����
	 * Enter description here ...
	 * @param $database���ҵ����ݼ�������Ϊ�����Ӳ�ѯ��$strWhere��ѯ������
	*/
	function getListCountByWhere($dataSet,$strWhere){
		if ($dataSet =='')
			$dataSet= "dx_".$this->tableName;
		$sql = "SELECT * FROM ".$dataSet;
		if ($strWhere != '')
			$sql .= " WHERE " . $strWhere;
			
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
}