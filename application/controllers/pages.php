<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index(){
		$data['sliders'] = $this->Model_Website->getSliders();
		$n['notices'] = $this->Model_Website->getNoticesforShow();
		$notices = "";

		foreach($n['notices'] as $key=>$value){
			$notices.= $value['title'];
			$notices.="&nbsp;&nbsp;&nbsp;";		
		}

		$data['notices'] = $notices;

		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/index',$data);
		$this->load->view('templates/footer');
	}

	public function contact(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/contact', $this->data);
		$this->load->view('templates/footer');
	}

	public function exam(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages');
		}else{
			$data['sets'] = $this->Model_Website->getSets();
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/exam',$data);
			$this->load->view('templates/footer');
		}
	}

	public function demoexam(){
		$data['sets'] = $this->Model_Website->getDemoSets();
		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/demoexam',$data);
		$this->load->view('templates/footer');
		
	}

	public function profile(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages');
		}else{
			$data['data'] = $this->Model_Website->getProfile();
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/profile',$data);
			$this->load->view('templates/footer');
		}
	}

	public function sendMail(){

		$from = $this->input->post('mail');
		$name = $this->input->post('name');
		$subject = $this->input->post('subject');
		$message = "Name: ".$name;
		$message .= "\n\n".$this->input->post('message');

		ini_set('SMTP', "server.com");
	    ini_set('smtp_port', "25");
	    ini_set('sendmail_from', $from);

	    $this->load->library('email');

	    $config['protocol']    = 'smtp';
	    $config['smtp_host']    = 'ssl://smtp.gmail.com';
	    $config['smtp_port']    = '465';
	    $config['smtp_timeout'] = '7';
	    $config['smtp_user']    = 'mailwork869@gmail.com';
	    $config['smtp_pass']    = '$debaroti$dollar';
	    $config['charset']    = 'utf-8';
	    $config['newline']    = "\r\n";
	    $config['mailtype'] = 'text'; // or html
	    $config['validation'] = TRUE; // bool whether to validate email or not
	    $this->email->initialize($config);

	    $this->email->set_newline("\r\n");

	    $from_email = $from;
	    $to_email = "murad.pu.dc@gmail.com";
	    //Load email library
	    $this->load->library('email');
	    $this->email->from($from_email, 'From Website');
	    $this->email->to($to_email);
	    $this->email->subject($subject);
	    $this->email->message($message);
	    //Send mail
	    if($this->email->send()){
	        $this->session->set_flashdata("email_sent","Congratulation Email Send Successfully. Check your email. We will contact you very soon.");
	    }
	    else{
	        show_error($this->email->print_debugger());
	        $this->session->set_flashdata("email_not_sent","Mail not Sent.");
	    }
	    
	    redirect('pages/contact');
	}

	public function preliminary(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/preliminary', $this->data);
		$this->load->view('templates/footer');
	}

	public function written(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/written', $this->data);
		$this->load->view('templates/footer');
	}

	public function issb(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('pages/issb', $this->data);
		$this->load->view('templates/footer');
	}



	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */