<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Students extends CI_Model {

	public function add(){
		$data = array(
			'form_no' => $this->input->post('formNo'),
			'admission_date' => $this->input->post('adDate'),
			'name' => $this->input->post('name'),
			'date_of_birth' => $this->input->post('dob'),
			'occupation' => $this->input->post('occupation'),
			'ssc_ins' => $this->input->post('sscint'),
			'ssc_group' => $this->input->post('sscgroup'),
			'ssc_result' => $this->input->post('sscresult'),
			'ssc_year' => $this->input->post('sscyear'),
			'hsc_ins' => $this->input->post('hscint'),
			'hsc_group' => $this->input->post('hscgroup'),
			'hsc_result' => $this->input->post('hscresult'),
			'hsc_year' => $this->input->post('hscyear'),
			'uni_name' => $this->input->post('uniname'),
			'uni_subject' => $this->input->post('unisubject'),
			'uni_result' => $this->input->post('uniresult'),
			'uni_year' => $this->input->post('uniyear'),
			'email' => $this->input->post('email'),
			'facebook' => $this->input->post('facebookid'),
			'mobile' => $this->input->post('mobile'),
			'blood_group' => $this->input->post('bloodgroup'),
			'f_name' => $this->input->post('fname'),
			'f_mobile' => $this->input->post('fmobile'),
			'f_occu' => $this->input->post('foccu'),
			'm_name' => $this->input->post('mname'),
			'm_mobile' => $this->input->post('mmobile'),
			'm_occu' => $this->input->post('moccu'),
			'present' => $this->input->post('present'),
			'permanent' => $this->input->post('permanent'),
			'for_force' => $this->input->post('force'),
			'course' => $this->input->post('course'),
			'programme' => $this->input->post('programme'),
			'course_no' => $this->input->post('courseno'),
			'exam_date' => $this->input->post('examdate')
		);

		return $this->db->insert('students',$data);
	}

	public function getAll(){
		$this->db->order_by('id','DESC');
		$query = $this->db->get('students');
		return $query->result_array();
	}

	public function getSingle($id){
		$this->db->where('id',$id);
		$query = $this->db->get('students');
		return $query->result_array();
	}

	public function update(){
		$id = $this->input->post('id');
		$data = array(
			'form_no' => $this->input->post('formNo'),
			'admission_date' => $this->input->post('adDate'),
			'name' => $this->input->post('name'),
			'date_of_birth' => $this->input->post('dob'),
			'occupation' => $this->input->post('occupation'),
			'ssc_ins' => $this->input->post('sscint'),
			'ssc_group' => $this->input->post('sscgroup'),
			'ssc_result' => $this->input->post('sscresult'),
			'ssc_year' => $this->input->post('sscyear'),
			'hsc_ins' => $this->input->post('hscint'),
			'hsc_group' => $this->input->post('hscgroup'),
			'hsc_result' => $this->input->post('hscresult'),
			'hsc_year' => $this->input->post('hscyear'),
			'uni_name' => $this->input->post('uniname'),
			'uni_subject' => $this->input->post('unisubject'),
			'uni_result' => $this->input->post('uniresult'),
			'uni_year' => $this->input->post('uniyear'),
			'email' => $this->input->post('email'),
			'facebook' => $this->input->post('facebookid'),
			'mobile' => $this->input->post('mobile'),
			'blood_group' => $this->input->post('bloodgroup'),
			'f_name' => $this->input->post('fname'),
			'f_mobile' => $this->input->post('fmobile'),
			'f_occu' => $this->input->post('foccu'),
			'm_name' => $this->input->post('mname'),
			'm_mobile' => $this->input->post('mmobile'),
			'm_occu' => $this->input->post('moccu'),
			'present' => $this->input->post('present'),
			'permanent' => $this->input->post('permanent'),
			'for_force' => $this->input->post('force'),
			'course' => $this->input->post('course'),
			'programme' => $this->input->post('programme'),
			'course_no' => $this->input->post('courseno'),
			'exam_date' => $this->input->post('examdate')
		);
		if($id){
			$this->db->where('id', $id);
			$update = $this->db->update('students',$data);
			return ($update == true) ? true : false;
		}
	}

	public function delete($id){
		if($id){
			$sql = "DELETE FROM students WHERE id = ?";
			return $this->db->query($sql, array($id));			
		}
	}









}

/* End of file Model_Students.php */
/* Location: ./application/models/Model_Students.php */