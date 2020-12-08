<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {

	public function loadAddSlider(){
		if(!$this->session->userdata('logged_in') || !in_array('createWeb', $this->permission)){
			redirect('pages/index');
		}else{
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/website/addSlider', $this->data);
			$this->load->view('templates/footer');
		}
	}

	public function addSlider(){
		if(!$this->session->userdata('logged_in') || !in_array('createWeb', $this->permission)){
			redirect('pages/index');
		}else{
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('note','Note','required');

			if($this->form_validation->run() === FALSE){
				redirect('website/loadAddSlider');
			}else{
				$post_image = "IMG_".time()."_".$_FILES['img']['name'];
				$config['upload_path'] = './assets/images/sliders';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = $post_image;
				$config['max_size'] = '5120';
				$config['max_width'] = '5000';
				$config['max_height'] = '5000';

				$this->load->library('upload',$config);

				if(!$this->upload->do_upload('img')){
					$this->session->set_flashdata('image_not_uploading','Slider Not Added!');
					redirect('pages/index');
				}else{
					$data = array('upload_data' => $this->upload->data());
					if($data){
						$result = $this->Model_Website->addSlider($post_image);
						if($result){
							$this->session->set_flashdata('slider_added','Slider Added!');
							redirect('website/loadSliders');
						}else{
							$this->session->set_flashdata('slider_not_added','Slider Not Added!');
							redirect('website/loadSliders');
						}
					}	
				}	
			}
		}
	}

	public function loadSliders(){
		if(!$this->session->userdata('logged_in') || !in_array('viewWeb', $this->permission)){
			redirect('pages/index');
		}else{
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/website/loadSliders', $this->data);
			$this->load->view('templates/footer');
		}
	}

	public function getAllSliders(){
		if(!$this->session->userdata('logged_in') || !in_array('viewWeb', $this->permission)){
			redirect('pages/index');
		}else{
			$data= $this->Model_Website->getSliders();
			foreach ($data as $key => $value) {
			// button
				$buttons = '';
				if(in_array('updateWeb', $this->permission)) {

				$buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i></button>';
				}
				if(in_array('deleteWeb', $this->permission)) {
					
				$buttons .= ' <a type="button" href = "'.base_url().'website/deleteSlider/'.$value['id'].'" class="btn btn-default"><i class="far fa-trash-alt"></i></a>';
				}

				$result['data'][$key] = array(
					$value['title'],
					$value['note'],
					'<img src = "'.base_url().'assets/images/sliders/'.$value['img'].'" style="height : 100px; width : 200px;">',

					/*$value[base_url().'assets/images/sliders/'.$value['img']],*/
					$buttons
				);
			}
		echo json_encode($result);
		}
	}

	public function updateSlider($id){
		if(!$this->session->userdata('logged_in') || !in_array('updateWeb', $this->permission)){
			redirect('pages/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('title', 'Title', 'trim|required');
			$this->form_validation->set_rules('note', 'Note', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	$data = array(
	        		'title' => $this->input->post('title'),
	        		'note' => $this->input->post('note')
	        	);

	        	$update = $this->Model_Website->updateSlider($id, $data);

	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the complaint information';
	        	}
	        }else{
	        		$response['success'] = false;
	        		foreach ($_POST as $key => $value) {
	        			$response['messages'][$key] = form_error($key);
	        		}
	        	}
			}else {
				$response['success'] = false;
				$response['messages'] = 'Error please refresh the page again!!';
			}

		echo json_encode($response);
	}

	public function manageNotices(){
		if(!$this->session->userdata('logged_in') || !in_array('viewWeb', $this->permission)){
			redirect('pages/index');
		}else{
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/website/manageNotices', $this->data);
			$this->load->view('templates/footer');
		}
	}

	public function getAllNotices(){
		if(!$this->session->userdata('logged_in') || !in_array('viewWeb', $this->permission)){
			redirect('pages/index');
		}else{
			$data= $this->Model_Website->getNotices();
			foreach ($data as $key => $value) {
			// button
				$buttons = '';
				if(in_array('updateWeb', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i></button>';
				}
				if(in_array('updateWeb', $this->permission)) {
				$buttons .= ' <a type="button" href = "'.base_url().'website/deleteNotice/'.$value['id'].'" class="btn btn-default"><i class="far fa-trash-alt"></i></a>';
				}

				$result['data'][$key] = array(
					$value['title'],
					$buttons
				);
			}
		echo json_encode($result);
		}
	}

	public function addNotice(){
		if(!$this->session->userdata('logged_in') || !in_array('createWeb', $this->permission)){
			redirect('pages/index');
		}else{
			if($this->Model_Website->addNotice()){
				$this->session->set_flashdata('notice_added','Notice Added Successfully!');
				redirect('website/manageNotices');
			}else{
				$this->session->set_flashdata('notice_not_added','Notice not added.');
				redirect('website/manageNotices');
			}
		}
	}

	public function updateNotice($id){

		if(!$this->session->userdata('logged_in') || !in_array('updateWeb', $this->permission)){
			redirect('auth/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('notice', 'notice name', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	$data = array(
	        		'title' => $this->input->post('notice')
	        	);

	        	$update = $this->Model_Website->updateNotice($id, $data);

	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the complaint information';
	        	}
	        }else{
	        		$response['success'] = false;
	        		foreach ($_POST as $key => $value) {
	        			$response['messages'][$key] = form_error($key);
	        		}
	        	}
			}else {
				$response['success'] = false;
				$response['messages'] = 'Error please refresh the page again!!';
			}

		echo json_encode($response);
	}

	public function deleteNotice(){
		if(!$this->session->userdata('logged_in') || !in_array('deleteWeb', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			if($this->Model_Website->deleteNotice($id)){
				$this->session->set_flashdata('notice_deleted','Notice Deleted Successfully!');
				redirect('website/manageNotices');
			}else{
				$this->session->set_flashdata('notice_not_deleted','Notice not deleted.');
				redirect('website/manageNotices');
			}
		}
	}


































	/*AJAX Controllers*/
	public function fetchSliderDataById($id = null){
		if($id){
			$data = $this->Model_Website->getSliderData($id);
			echo json_encode($data);
		}

	}

	public function deleteSlider($id = null){
		if($id){
			$result = $this->Model_Website->deleteSlider($id);
			if($result){
				$this->session->set_flashdata('slider_deleted','Slider Deleted!');
				redirect('website/loadSliders');
			}else{
				$this->session->set_flashdata('slider_not_deleted','Slider not Deleted!');
				redirect('website/loadSliders');
			}
		}
	}

	public function fetchNoticeDataById($id = null){
		if($id){
			$data = $this->Model_Website->getNoticeData($id);
			echo json_encode($data);
		}
	}







}

/* End of file website.php */
/* Location: ./application/controllers/website.php */