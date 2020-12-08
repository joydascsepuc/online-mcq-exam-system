<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends CI_Controller {

	public function index(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages');
		}else{
			$this->load->view('templates/header', $this->data);
			$this->load->view('pages/departments', $this->data);
			$this->load->view('templates/footer');
		}
	}

	public function getDepartments(){
		$data= $this->Model_Department->getAllDepartments();
		foreach ($data as $key => $value) {
			// button
			$buttons = '';
			
			$buttons .= '<button class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="far fa-edit"></i></button>';
		
				
			$buttons .= ' <a type="button" href = "'.base_url().'departments/deleteDept/'.$value['id'].'" class="btn"><i class="far fa-trash-alt"></i></a>';

			$buttons .= '<button type="button" class="btn btn-default" onclick="getDFunc('.$value['id'].')" data-toggle="modal" data-target="#getModal"><i class="fas fa-bars"></i></button>';

			$buttons .= '<button type="button" class="btn btn-default" onclick="setCId('.$value['id'].')" data-toggle="modal" data-target="#addDModal"><i class="fas fa-plus"></i></button>';
			

			$result['data'][$key] = array(
				$value['name'],
				$buttons
			);
		}

		echo json_encode($result);
	}

	public function deleteDept(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}else{
			$id = $this->uri->segment('3');
			$delete = $this->Model_Department->deleteDepartment($id);
			if($delete){
				$this->session->set_flashdata('dept_deleted','Department Deleted!');
				redirect('departments/index');
			}else{
				$this->session->set_flashdata('dept_not_deleted','Department not Deleted!');
				redirect('departments/index');
			}
		}
	}

	public function addDepartment(){
		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}

		$this->form_validation->set_rules('departmentName', 'DepartmentName', 'trim|required');
		if($this->form_validation->run() == TRUE){
			$data = array(
	        		'name' => $this->input->post('departmentName')
	        	);
			$add = $this->Model_Department->addDepartment($data);
			if($add){
				$this->session->set_flashdata('dept_added','Department Added!');
				redirect('departments/index');
			}else{
				$this->session->set_flashdata('dept_not_added','Department not Added!');
				redirect('departments/index');
			}
		}   
	}

	public function updateDepartmentName($id){

		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('name', 'Category name', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	$data = array(
	        		'name' => $this->input->post('name')
	        	);

	        	$update = $this->Model_Department->updateDepartmentName($id, $data);

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

	public function addDesignation(){
		$id = $this->input->post('positionID');
		if($id != ""){

			$this->form_validation->set_rules('hedaName', 'Designation name', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){

	        	$add = $this->Model_Department->addDesignation();

	        	if($add == true){
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully Added';
	        	}else{
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the complaint information';
	        	}
	        }else{
	        		$response['success'] = false;
	        		foreach ($_POST as $key => $value){
	        			$response['messages'][$key] = form_error($key);
	        		}
	        	}
			}else{
				$response['success'] = false;
				$response['messages'] = 'ID not Found!!';
			}

		echo json_encode($response);
	}








	/*Modal AJAX*/
	public function fetchDepartmentDataById($id = null){
		if($id){
			$data = $this->Model_Department->getDepartmentData($id);
			echo json_encode($data);
		}

	}

	public function fetchSubDataById($id){

		$data = $this->Model_Department->getDesignations($id);

		$html='<tr><th>Designation(s) List</th><th>Action</th></tr>';

		if(count($data)>0){
			foreach($data as $key=>$value){
				$html .= '<tr><td>'.$value['name'].'</td>
						      <td><button type="button" class="btn btn-default" onclick="editDFunc('.$value['id'].')" data-toggle="modal" data-target="#editDModal"><i class="far fa-edit"></i></button></td>
				</tr>';
			}
		}else{
			$html .= '<tr><td>None</td></tr>';
		}
		echo json_encode($html);
	}

	/*For Designation*/
	public function fetchSingleSubDataById($id = null){
		if($id){
			$data = $this->Model_Department->getSingleDesignationData($id);
			echo json_encode($data);
		}

	}

	public function updateDesignationName($id){

		if(!$this->session->userdata('logged_in')){
			redirect('pages/index');
		}

		$response = array();

		if($id){

			$this->form_validation->set_rules('d_name', 'Designation name', 'trim|required');
			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE){
	        	$data = array(
	        		'name' => $this->input->post('d_name')
	        	);

	        	$update = $this->Model_Department->updateDesignationName($id, $data);

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




}

/* End of file departments.php */
/* Location: ./application/controllers/departments.php */