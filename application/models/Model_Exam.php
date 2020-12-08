<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Exam extends CI_Model {

	public function fetchQ($id){
		$this->db->where('set_id',$id);
		$query = $this->db->get('questions');
		return $query->result_array();
	}

	public function getans(){
		$query = $this->db->get('answers');
		return $query->result_array();
	}

	public function addRecord($setid){
		/*$year = date('Y').date('m').date('d');
	    $sec = (time() % 86400);
	    $examid = $year."-".$sec;*/

		$data = array(
			/*'exam_id' => $examid,*/
			'user_id' => $this->session->userdata('user_id'),
			'set_id' => $setid
		);

		$this->db->insert('exam_logs',$data);
		return $this->db->insert_id();
		
	}

	public function addDemoRecord($setid){
		$data = array(
			'user_id' => 0,
			'set_id' => $setid
		);

		$this->db->insert('exam_logs',$data);
		return $this->db->insert_id();
	}

	public function giveExam(){
		$total = $this->input->post('question');
		echo count($total);
		for($i=1;$i<=count($total);$i++){
			if($this->input->post('givenanswers')[$i] != ""){
				$data[$i] = array(
					'question_id' => $this->input->post('question')[$i],
					'given_ans_id' => $this->input->post('givenanswers')[$i],
					'exam_id' => $this->input->post('examid')
				);
			}
		}
		// var_dump($data);
		return $this->db->insert_batch('exam_data', $data);
	}

	public function getTimeLimit($id){
		$this->db->where('id',$id);
		$query = $this->db->get('sets');
		$ret = $query->row();
		$time = $ret->timelimit;
		return $time;
	}

/*	public function giveExam(){
		$total = $this->input->post('givenanswers');
		for($i=1;$i<=count($total);$i++){
			$data[$i] = array(
				'question_id' => $this->input->post('question')[$i],
				'given_ans_id' => $this->input->post('givenanswers')[$i],
				'exam_id' => $this->input->post('examid')
			);
		}
		var_dump($data);
		// return $this->db->insert_batch('exam_data', $data);
	}*/



/*	public function giveExam(){
		$givenanswers = $this->input->post('givenanswers');
		$question = $this->input->post('question');
		$data = array();
		foreach($givenanswers as $key=>$value) {
        $data[]  = array(
                'question_id' => $question[$key],
                'given_ans_id' => $value,
                'exam_id' => $this->input->post('examid')
            );
    	}

		var_dump($data);
		// return $this->db->insert_batch('exam_data', $data);
	}*/

	public function getSetID($id){
		$this->db->where('id',$id);
		$query = $this->db->get('exam_logs');
		$ret = $query->row();
		return $ret->set_id;
	}

	public function getExamData($id){
		$this->db->where('exam_id',$id);
		$query = $this->db->get('exam_data');
		return $query->result_array();
	}

















}

/* End of file Model_Exam.php */
/* Location: ./application/models/Model_Exam.php */