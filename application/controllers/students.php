<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function loadAdd(){
		if(!$this->session->userdata('logged_in') || !in_array('createStudents', $this->permission)){
			redirect('pages/index');
		}else{
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/students/add', $this->data);
			$this->load->view('templates/footer');
		}
	}

	public function add(){
		if(!$this->session->userdata('logged_in') || !in_array('createStudents', $this->permission)){
			redirect('pages/index');
		}else{
			$result = $this->Model_Students->add();
			if($result){
				$this->session->set_flashdata('student_added','Student Information stored Successfully!');
				redirect('students/viewAll');
			}else{
				$this->session->set_flashdata('student_not_added','Student Information not stored');
				redirect('students/loadAdd');
			}
		}
	}

	public function viewAll(){
		if(!$this->session->userdata('logged_in') || !in_array('viewStudents', $this->permission)){
			redirect('pages/index');
		}else{
			$data['students'] = $this->Model_Students->getAll();
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/students/viewAll',$data);
			$this->load->view('templates/footer');
		}
	}

	public function details(){
		if(!$this->session->userdata('logged_in') || !in_array('viewStudents', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$data['students'] = $this->Model_Students->getSingle($id);
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/students/details',$data);
			$this->load->view('templates/footer');
		}
	}

	public function edit(){
		if(!$this->session->userdata('logged_in') || !in_array('updateStudents', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$data['students'] = $this->Model_Students->getSingle($id);
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/students/edit',$data);
			$this->load->view('templates/footer');
		}
	}

	public function update(){
		if(!$this->session->userdata('logged_in') || !in_array('updateStudents', $this->permission)){
			redirect('pages/index');
		}else{
			$result = $this->Model_Students->update();
			if($result){
				$this->session->set_flashdata('student_updated','Student Information updated Successfully!');
				redirect('students/viewAll');
			}else{
				$this->session->set_flashdata('student_not_updated','Student Information not updated');
				redirect('students/viewAll');
			}
		}
	}

	public function delete(){
		if(!$this->session->userdata('logged_in') || !in_array('deleteStudents', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$result = $this->Model_Students->delete($id);
			if($result){
				$this->session->set_flashdata('student_deleted','Student Information Deleted Successfully!');
				redirect('students/viewAll');
			}else{
				$this->session->set_flashdata('student_not_deleted','Student Information not deleted');
				redirect('students/viewAll');
			}
		}
	}

}

/* End of file students.php */
/* Location: ./application/controllers/students.php */