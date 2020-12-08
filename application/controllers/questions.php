<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller {

	public function addQuestion(){
		if(!$this->session->userdata('logged_in') || !in_array('createQuestions', $this->permission)){
			redirect('pages/index');
		}else{
			$data['sets'] = $this->Model_Question->getAvailableSets();
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/questions/addQuestion',$data);
			$this->load->view('templates/footer');
		}	
	}

	/*public function add(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}else{
			$post_image = "IMG_".time()."_".$_FILES['Qimg']['name'];
			$config['upload_path'] = './assets/images/questions';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = $post_image;
			$config['max_size'] = '5120';
			$config['max_width'] = '5000';
			$config['max_height'] = '5000';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('img')){
				$this->session->set_flashdata('Question_image_not_uploading','Qustion Image Not Uploading!');
				redirect('questions/addQuestion');
			}else{
				$data = array('upload_data' => $this->upload->data());
				if($data){
					$names['Qimgname'] = $post_image;
					$options = $this->input->post('options');
					for($i = 1; $i<=$options; $i++){
						$ans_image = "IMG_".time()."_".$_FILES['ansImg'][$i]['name'];
						$config['upload_path'] = './assets/images/answers';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['file_name'] = $ans_image;
						$config['max_size'] = '5120';
						$config['max_width'] = '5000';
						$config['max_height'] = '5000';
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload('img')){
							$this->session->set_flashdata('answer_image_not_uploading','Answer Images are Not Uploading!');
							redirect('questions/addQuestion');
						}else{
							$names['ansImgName'][$i] = $ans_image;
						}
					}
					$result = $this->Model_Question->add($names);
					if($result){
						$this->session->set_flashdata('question_added','Question Added!');
						redirect('questions/addQuestion');
					}else{
						$this->session->set_flashdata('question_not_added','Question Not Added!');
						redirect('questions/addQuestion');
					}
				}
			}
		}
	}*/

	public function add(){
		if(!$this->session->userdata('logged_in') || !in_array('createQuestions', $this->permission)){
			redirect('pages/index');
		}else{
			if(!empty($_FILES['Qimg']['name'])){
				$this->load->library('upload');
				$post_image = "IMG_".time()."_".$_FILES['Qimg']['name'];
				$config['upload_path'] = './assets/images/questions';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = $post_image;
				$config['max_size'] = '5120';
				$config['max_width'] = '5000';
				$config['max_height'] = '5000';
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('Qimg')){
					$this->session->set_flashdata('Question_image_not_uploading','Qustion Image Not Uploading!');
					redirect('questions/addQuestion');
				}else{
					$names['Qimgname'] = $post_image;
					$options = $this->input->post('options');
					for($i = 1; $i<=$options; $i++){
						if(!empty($_FILES['ansImg'.$i]['name'])){
							$this->load->library('upload');
							$ans_image = "IMG_".time()."_".$_FILES['ansImg'.$i]['name'];
							$config['upload_path'] = './assets/images/questions';
							$config['allowed_types'] = 'gif|jpg|png|jpeg';
							$config['file_name'] = $ans_image;
							$config['max_size'] = '5120';
							$config['max_width'] = '5000';
							$config['max_height'] = '5000';
							$this->upload->initialize($config);
							if(!$this->upload->do_upload('ansImg'.$i)){
								$this->session->set_flashdata('answer_image_not_uploading','Answer Image(s) are Not Uploading!');
								redirect('questions/addQuestion');
							}else{
								$names['ansImgName'][$i] = $ans_image;
							}
						}
					}
					$result = $this->Model_Question->addWithImage($names);
					if($result){
						$this->session->set_flashdata('question_added','Question Added!');
						redirect('questions/addQuestion');
					}else{
						$this->session->set_flashdata('question_not_added','Question Not Added!');
						redirect('questions/addQuestion');
					}
				}
			}else{
				$result = $this->Model_Question->addWithoutImage();
				if($result){
					$this->session->set_flashdata('question_added','Question Added!');
					redirect('questions/addQuestion');
				}else{
					$this->session->set_flashdata('question_not_added','Question Not Added!');
					redirect('questions/addQuestion');
				}
			}
		}
	}

	public function addSet(){
		if(!$this->session->userdata('logged_in') || !in_array('createQuestions', $this->permission)){
			redirect('pages/index');
		}else{
			$result = $this->Model_Question->addSet();
			if($result){
				$this->session->set_flashdata('set_added','Set Added Succesfully!');
				redirect('questions/addQuestion');
			}else{
				$this->session->set_flashdata('set_not_added','Set Not Added!');
				redirect('questions/addQuestion');
			}
		}
	}

	public function deleteSet(){
		if(!$this->session->userdata('logged_in') || !in_array('deleteQuestions', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$result = $this->Model_Question->deleteSet($id);
			if($result){
				$this->session->set_flashdata('set_deleted','Set Deleted Succesfully!');
				redirect('questions/addQuestion');
			}else{
				$this->session->set_flashdata('set_not_deleted','Set Not Deleted!');
				redirect('questions/addQuestion');
			}
		}
	}

	public function viewAll(){
		if(!$this->session->userdata('logged_in') || !in_array('viewQuestions', $this->permission)){
			redirect('pages/index');
		}else{
			$data['sets'] = $this->Model_Question->getSets();
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/questions/viewQuestions',$data);
			$this->load->view('templates/footer');
		}	
	}

	public function loadEditQuestion(){
		if(!$this->session->userdata('logged_in') || !in_array('updateQuestions', $this->permission)){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$data['questions'] = $this->Model_Question->getQuestionDetailsByID($id);
			$data['answers'] = $this->Model_Question->getAllAnsOfThisQuestion($id);
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/questions/editQuestion',$data);
			$this->load->view('templates/footer');
		}
	}













	/*AJAX Controllers*/
	public function getallSets(){
		$data = $this->Model_Question->getSets();
		$html='<tr><th>Set(s) List</th><th>Available</th><th>Time Limit(In Minute)</th><th>Action</th></tr>';

		if(count($data)>0){
			foreach($data as $key=>$value){
				$html .= '<tr><td>'.$value['name'].'</td><td>'.$value['available'].'</td><td>'.$value['timelimit'].'</td>
						      <td><button type="button" class="btn btn-default" onclick="editSetFunc('.$value['id'].')" data-toggle="modal" data-target="#editSet"><i class="far fa-edit"></i></button> <a class="btn" href = "'.base_url().'/questions/deleteSet/'.$value['id'].'"><i class="far fa-trash-alt"></i></a></td>
				</tr>';
			}
		}else{
			$html .= '<tr><td>None</td></tr>';
		}
		echo json_encode($html);
	}

	public function fetchSetDataById($id = null){
		if($id){
			$data = $this->Model_Question->getSingleSetData($id);
			echo json_encode($data);
		}

	}

	public function updateSetName($id){

		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('setEditName', 'EditSetName', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	$data = array(
	        		'name' => $this->input->post('setEditName')
	        	);

	        	$update = $this->Model_Question->updateSetName($id, $data);

	        	if($update == true){
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated Set Name';
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



	public function getQuestionsbySetID(){
		
		$set = $this->input->post('set');
		if($set != ''){
			$data = $this->Model_Question->getQuestionsbySetID($set);
		}

		$html='<tr>
				<th>Question</th>
				<th>Img</th>';
				if(in_array('updateQuestions', $this->permission) || in_array('deleteQuestions', $this->permission) ) {

				$html.='<th>Actions</th>';
			}
			  $html.=' </tr>';

		if(count($data)>0){
		
			foreach ($data as $key => $value) {	

				$html .= '
				<tr>
	                <td class="width-25">'.$value['name'].'</td>
	                <td class="width-25">'.'<img src = "'.base_url().'assets/images/questions/'.$value['img'].'" style = "height:30%;"></td>
	                <td class="width-25">';
				if(in_array('updateQuestions', $this->permission)) {

	                	$html.='<a type="button" class="btn btn-default" href="'.base_url().'questions/loadEditQuestion/'.$value['id'].'"><i class="far fa-edit"></i></a>';
	                }
				if( in_array('deleteQuestions', $this->permission) ) {

	                	$html.='<button type="button" class="btn btn-default" href="#"><i class="far fa-trash-alt""></i></button></td></tr>';
	                }
			}
			echo json_encode($html);
		}else{
			$html .= '';
			echo json_encode($html);
		}
		
	}


	public function fetchOptionDataById($id = null){
		if($id){
			$data = $this->Model_Question->getOptionData($id);
			echo json_encode($data);
		}
	}

	public function updateSingleOption($id){

		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('if_ans', 'IsAns', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	if(!empty($_FILES['ansImg']['name'])){
					$this->load->library('upload');
					$image = "IMG_".time()."_".$_FILES['ansImg']['name'];
					$config['upload_path'] = './assets/images/questions';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['file_name'] = $image;
					$config['max_size'] = '5120';
					$config['max_width'] = '5000';
					$config['max_height'] = '5000';
					$this->upload->initialize($config);
					if(!$this->upload->do_upload('ansImg')){
						$this->session->set_flashdata('op_updated_no','Updated Option Image is Not Uploading!');
						redirect('questions/viewQuestions');
					}else{
						$data = array(
		        			'name' => $this->input->post('name'),
		        			'img' => $image,
		        			'is_ans' => $this->input->post('if_ans')
		        		);
					}
				}else{
					$data = array(
		        		'name' => $this->input->post('name'),
		        		'is_ans' => $this->input->post('if_ans')
		        	);
				}
	        	
	        	$update = $this->Model_Question->updateOption($id, $data);

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

	public function fetchQuestionDataById($id = null){
		if($id){
			$data = $this->Model_Question->getQuestionData($id);
			echo json_encode($data);
		}
	}

	public function updateQuestion($id){

		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}

		$response = array();

		if($id){
			
        	if(!empty($_FILES['qImg']['name'])){
				$this->load->library('upload');
				$qimage = "IMG_".time()."_".$_FILES['qImg']['name'];
				$config['upload_path'] = './assets/images/questions';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = $qimage;
				$config['max_size'] = '5120';
				$config['max_width'] = '5000';
				$config['max_height'] = '5000';
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('qImg')){
					$this->session->set_flashdata('q_updated_no','Updated Question Image is Not Uploading!');
					redirect('questions/viewQuestions');
				}else{
					$data = array(
	        			'name' => $this->input->post('qname'),
	        			'img' => $qimage
	        		);
				}
			}else{
				$data = array(
	        		'name' => $this->input->post('qname')
	        	);
			}
	        	
        	$update = $this->Model_Question->updateQuestion($id, $data);

        	if($update == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully updated';
        	}else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while updated the complaint information';
        	}
       
		}else {
			$response['success'] = false;
			$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	public function addSingleOption(){

		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}

		$response = array();
    	if(!empty($_FILES['opImg']['name'])){
			$this->load->library('upload');
			$qimage = "IMG_".time()."_".$_FILES['opImg']['name'];
			$config['upload_path'] = './assets/images/questions';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name'] = $qimage;
			$config['max_size'] = '5120';
			$config['max_width'] = '5000';
			$config['max_height'] = '5000';
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('opImg')){
				$this->session->set_flashdata('op_added_no','Option Image is Not Uploading!');
				redirect('questions/viewQuestions');
			}else{
				$data = array(
					'q_id' => $this->input->post('Qid'),
        			'name' => $this->input->post('opname'),
        			'img' => $qimage,
        			'is_ans' => $this->input->post('opifans')
        		);
			}
		}else{
			$data = array(
				'q_id' => $this->input->post('Qid'),
        		'name' => $this->input->post('opname'),
        		'img' => NULL,
        		'is_ans' => $this->input->post('opifans')
        	);
		}
        	
    	$add = $this->Model_Question->addSingleOption($data);

    	if($add == true) {
    		$response['success'] = true;
    		$response['messages'] = 'Succesfully Added';
    	}else{
    		$response['success'] = false;
    		$response['messages'] = 'Error in the database while updated the complaint information';
    	}
   		echo json_encode($response);
	}




}

/* End of file questions.php */
/* Location: ./application/controllers/questions.php */