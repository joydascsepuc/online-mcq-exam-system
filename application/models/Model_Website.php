<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Website extends CI_Model {

	public function addSlider($post_image){
		$data = array(

			'title' => $this->input->post('title'),
			'note' => $this->input->post('note'),
			'img' => $post_image
		);

		return $this->db->insert('sliders',$data);
	}

	/*Get Data For View*/
	public function getSliders(){
		$this->db->order_by('sliders.id','DESC');
		$query = $this->db->get('sliders');
		return $query->result_array();
	}

	public function getSets(){
		$this->db->order_by('id','ASC');
		$this->db->where('available',0);
		$query = $this->db->get('sets');
		return $query->result_array();
	}

	public function getDemoSets(){
		$this->db->order_by('id','ASC');
		$this->db->where('available',0);
		$this->db->where('is_demo',1);
		$query = $this->db->get('sets');
		return $query->result_array();
	}

	public function getNotices(){
		$this->db->order_by('id','DESC');
		$query = $this->db->get('notices');
		return $query->result_array();
	}

	public function addNotice(){
		$data = array(
			'title' => $this->input->post('option')
		);
		return $this->db->insert('notices',$data);
	}

	public function getNoticesforShow(){
		$this->db->order_by('id','DESC');
		$query = $this->db->get('notices');
		return $query->result_array();
	}

	public function getProfile(){
		$id = $this->session->userdata('user_id');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		return $query->result_array();
	}



	/*AJAX Models*/
	public function getSliderData($id = null){

		if($id) {
			$sql = "SELECT * FROM sliders WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updateSlider($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('sliders',$data);
			return ($update == true) ? true : false;
		}
	}

	public function deleteSlider($id = null){
		if($id) {
			$sql = "DELETE FROM sliders WHERE id = ?";
			return $this->db->query($sql, array($id));			
		}
	}

	public function getNoticeData($id = null){

		if($id) {
			$sql = "SELECT * FROM notices WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updateNotice($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('notices',$data);
			return ($update == true) ? true : false;
		}
	}

	public function deleteNotice($id){
		if($id) {
			$sql = "DELETE FROM notices WHERE id = ?";
			return $this->db->query($sql, array($id));			
		}
	}














}

/* End of file Model_Website.php */
/* Location: ./application/models/Model_Website.php */