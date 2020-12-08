<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

	 public function __construct(){
	    parent::__construct();
	    error_reporting(E_ALL & ~E_NOTICE);
  	}

/*	public function loadexam(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages');
		}else{
			$setid = $this->input->post('set');
			$examid = $this->Model_Exam->addRecord($setid);
			if($examid!=NULL){
				$data['questions'] = $this->Model_Exam->fetchQ($setid);
				$data['answers'] = $this->Model_Exam->getans();
				$data['examid'] = $examid;
				$this->load->view('templates/header', $this->data);
				$this->load->view('pages/takeexam2',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('pages/exam','refresh');
			}
		}
	}*/

	public function loadexam(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages');
		}else{
			$setid = $this->uri->segment('3');
			$examid = $this->Model_Exam->addRecord($setid);
			$time = $this->Model_Exam->getTimeLimit($setid);
			if($examid!=NULL){
				$data['questions'] = $this->Model_Exam->fetchQ($setid);
				$data['answers'] = $this->Model_Exam->getans();
				$data['examid'] = $examid;
				$data['time'] = $time;
				$this->load->view('templates/header', $this->data);
				$this->load->view('pages/takeexam2',$data);
				$this->load->view('templates/footer');
			}else{
				redirect('pages/exam','refresh');
			}
		}
	}

	public function loaddemoexam(){
		
		$setid = $this->uri->segment('3');
		$examid = $this->Model_Exam->addDemoRecord($setid);
		$time = $this->Model_Exam->getTimeLimit($setid);
		if($examid!=NULL){
			$data['questions'] = $this->Model_Exam->fetchQ($setid);
			$data['answers'] = $this->Model_Exam->getans();
			$data['examid'] = $examid;
			$data['time'] = $time;
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/demoExamQuestion',$data);
			$this->load->view('templates/footer');
		}else{
			redirect('pages/exam','refresh');
		}
		
	}

	public function justify(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages');
		}else{
			$examID = $this->input->post('examid');
			$this->Model_Exam->giveExam();
			if($this->Model_Exam->giveExam()){
				$setid = $this->Model_Exam->getSetID($examID);
				$data['questions'] = $this->Model_Exam->fetchQ($setid);
				$data['answers'] = $this->Model_Exam->getans();
				$data['logs'] = $this->Model_Exam->getExamData($examID);

				$this->load->view('templates/header', $this->data);
				$this->load->view('pages/result',$data);
				$this->load->view('templates/footer');
			}
		}
	}

	public function demoJustify(){
		
		$examID = $this->input->post('examid');
		$this->Model_Exam->giveExam();
		if($this->Model_Exam->giveExam()){
			$setid = $this->Model_Exam->getSetID($examID);
			$data['questions'] = $this->Model_Exam->fetchQ($setid);
			$data['answers'] = $this->Model_Exam->getans();
			$data['logs'] = $this->Model_Exam->getExamData($examID);

			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/result',$data);
			$this->load->view('templates/footer');
		}
		
	}





	

}

/* End of file exam.php */
/* Location: ./application/controllers/exam.php */