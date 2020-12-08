<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Department extends CI_Model {

	public function getAllDepartments(){
		$query = $this->db->get('category');
		return $query->result_array();
	}
	
	public function addDepartment($data = array()){
		if($data){
			$add = $this->db->insert('category',$data);
			return ($add == true) ? true : false;
		}
	}

	public function deleteDepartment($id){
		$this->db->where('id',$id);
		$result = $this->db->delete('category');
		if($result){
			$this->db->where('category_id',$id);
			return $this->db->delete('designation');
		}

	}

	public function updateDepartmentName($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('category',$data);
			return ($update == true) ? true : false;
		}
	}

	public function addDesignation(){
		$data = array(
	        		'name' => $this->input->post('hedaName'),
	        		'category_id' => $this->input->post('positionID')
	       		);
		return $this->db->insert('designation',$data);
		// var_dump($data);
	}











	/*AJAX Models*/
	public function getDepartmentData($id = null){

		if($id) {
			$sql = "SELECT * FROM category WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function getDesignations($id){
		$this->db->where('category_id',$id);
		$query = $this->db->get('designation');
		return $query->result_array();
	}

	/*For Designation*/
	public function getSingleDesignationData($id = null){

		if($id) {
			$sql = "SELECT * FROM designation WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updateDesignationName($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('designation',$data);
			return ($update == true) ? true : false;
		}
	}	


}

/* End of file Model_Department.php */
/* Location: ./application/models/Model_Department.php */