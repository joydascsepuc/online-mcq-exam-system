<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Question extends CI_Model{

	public function addSet(){
		$data = array(
				'name' => $this->input->post('setName'),
				'available' => $this->input->post('limit'),
				'timelimit' => $this->input->post('timelimit'),
				'is_demo' => $this->input->post('demo')
		);
		$add = $this->db->insert('sets',$data);
		return ($add == true) ? true : false;
	}

	public function deleteSet($id){
		if($id) {
			$sql = "DELETE FROM sets WHERE id = ?";
			return $this->db->query($sql, array($id));			
		}
	}

	public function getAvailableSets(){
		$query = $this->db->query('SELECT * FROM sets WHERE available>=1');
		return $query->result_array();
	}

	public function addWithImage($names){
		$question = array(
			'name' => $this->input->post('question'),
			'set_id' => $this->input->post('set'),
			'img' => $names['Qimgname']
		);

		$rvalue = $this->input->post('if_ans');
		$result = $this->db->insert('questions',$question);
		$qid = $this->db->insert_id();

		if($result){
			$options = $this->input->post('options');
			for($i=1; $i<=$options; $i++){
				if($rvalue == $i){
					$isans = 1;
				}else{
					$isans = 0;
				}
				$data[$i] = array(
					'q_id' => $qid,
					'name' => $this->input->post('ans'.$i),
					'img' => $names['ansImgName'][$i],
					'is_ans' => $isans
					
				);
			}
			$result = $this->db->insert_batch('answers', $data);
			if($result){
				$setid = $this->input->post('set');
				$this->db->where('id',$setid);
				$query = $this->db->get('sets');
				$ret = $query->row();
				$primary = $ret->available;
				$now = $primary - 1;
				$this->db->set('available',$now);
			    $this->db->where('id', $setid);
			    $this->db->update('sets');
			    return $this->db->affected_rows();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function addWithoutImage(){
		$question = array(
			'name' => $this->input->post('question'),
			'set_id' => $this->input->post('set'),
		);

		$result = $this->db->insert('questions',$question);
		$qid = $this->db->insert_id();

		if($result){
			$rvalue = $this->input->post('if_ans');
			$options = $this->input->post('options');
			for($i=1; $i<=$options; $i++){
				if($rvalue == $i){
					$isans = 1;
				}else{
					$isans = 0;
				}
				$data[$i] = array(
					'q_id' => $qid,
					'name' => $this->input->post('ans'.$i),
					'is_ans' => $isans
				);
			}
			$result = $this->db->insert_batch('answers', $data);
			if($result){
				$setid = $this->input->post('set');
				$this->db->where('id',$setid);
				$query = $this->db->get('sets');
				$ret = $query->row();
				$primary = $ret->available;
				$now = $primary - 1;
				$this->db->set('available',$now);
			    $this->db->where('id', $setid);
			    $this->db->update('sets');
			    return $this->db->affected_rows();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function getQuestionDetailsByID($id){
		$this->db->where('id',$id);
		$query = $this->db->get('questions');
		return $query->result_array();
	}

	public function getAllAnsOfThisQuestion($id){
		$this->db->where('q_id',$id);
		$query = $this->db->get('answers');
		return $query->result_array();
	}




	/*AJAX Models*/
	public function getSets(){
		$query = $this->db->get('sets');
		return $query->result_array();
	}

	public function getSingleSetData($id = null){

		if($id) {
			$sql = "SELECT * FROM sets WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updateSetName($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('sets',$data);
			return ($update == true) ? true : false;
		}
	}

	public function getQuestionsbySetID($set){
		$this->db->where('set_id',$set);
		$query = $this->db->get('questions');
		return $query->result_array();
	}

	public function getOptionData($id = null){

		if($id) {
			$sql = "SELECT * FROM answers WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updateOption($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('answers',$data);
			return ($update == true) ? true : false;
		}
	}	
	
	public function getQuestionData($id = null){

		if($id) {
			$sql = "SELECT * FROM questions WHERE id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
	}

	public function updateQuestion($id = null, $data = array()){
		if($id && $data){
			$this->db->where('id', $id);
			$update = $this->db->update('questions',$data);
			return ($update == true) ? true : false;
		}
	}

	public function addSingleOption($data = array()){
		if($data){
			$add = $this->db->insert('answers',$data);
			return ($add == true) ? true : false;
		}
	}









}

/* End of file Model_Question.php */
/* Location: ./application/models/Model_Question.php */